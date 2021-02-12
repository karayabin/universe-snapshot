<?php


namespace Ling\Light_Cli\Util;

use Ling\Bat\StringTool;
use Ling\CliTools\Helper\BashtmlStringTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface;
use Ling\Light_Cli\Exception\LightCliException;
use Ling\Light_Cli\Helper\LightCliFormatHelper;

/**
 * The LightCliCommandDocUtility class.
 */
class LightCliCommandDocUtility
{

    /**
     * This property holds the indentInc for this instance.
     * @var int
     */
    private $indentInc;

    /**
     * This property holds the listCache for this instance.
     * @var array
     */
    private $listCache;


    /**
     * Builds the LightCliCommandDocUtility instance.
     */
    public function __construct()
    {
        $this->indentInc = 4;
        $this->listCache = null;
    }

    /**
     * Prints the list of commands for the given app(s) to the output.
     *
     * The apps array is an array of appId => LightCliApplicationInterface instance.
     *
     * For more details about appId, read the @page(Light_Cli conception notes).
     *
     *
     *
     * Available options are:
     * - filter: string|int = null. A filter to apply to the list result. Only the results that match the filter (if defined) will be displayed.
     *      - If the filter is null, by default, the whole list of commands will be displayed
     *      - If the filter is an int, it will match only one command by its index (where index=given int)
     *      - If the filter is a string, the list will contain only results which match that string.
     *          We search in commands and aliases (see our conception notes for more details).
     *          By default, the filter matches if it's contained anywhere in the string.
     *          The special dollar symbol ($), when positioned at the beginning of the filter, indicates that the filter
     *          should match only if the rest of the filter is found at the beginning of the command name/alias.
     *          So for instance:
     *
     *          - don will match "abandon" and "donut"
     *          - $don will match only "donut"
     *
     * - verbose: bool=false. If true, the list will display all the information available about the command(s).
     * - displayIndexes: bool=true. Whether to display index numbers before the command names.
     * - displayAliases: bool=true. Whether to display alias commands.
     * - includeAppId: bool=true. Whether to prefix the appId in the command name (and a space separator).
     *
     *
     *
     * @param array $apps
     * @param OutputInterface $output
     * @param array $options
     * @throws \Exception
     */
    public function printListByApp(array $apps, OutputInterface $output, array $options = [])
    {

        $filter = $options['filter'] ?? null;
        $verbose = $options['verbose'] ?? false;
        $displayIndexes = $options['displayIndexes'] ?? true;
        $displayAliases = $options['displayAliases'] ?? true;
        $includeAppId = $options['includeAppId'] ?? true;


        //--------------------------------------------
        //
        //--------------------------------------------
        $cmdFmt = LightCliFormatHelper::getCommandFmt();
        $pmtFmt = LightCliFormatHelper::getCommandLineParameterFmt();
        $optionFmt = LightCliFormatHelper::getCommandLineOptionFmt();
        $flagFmt = LightCliFormatHelper::getCommandLineFlagFmt();
        $headerFmt = LightCliFormatHelper::getHeaderFmt();

        $ind = str_repeat(" ", $this->indentInc);
        $ind2 = str_repeat(" ", $this->indentInc * 2);
        $ind3 = str_repeat(" ", $this->indentInc * 3);
        $ind4 = str_repeat(" ", $this->indentInc * 4);

        $list = LightCliCommandDocUtility::buildListFromCliApps($apps, [
            'includeAppId' => $includeAppId,
        ]);
        $this->listCache = $list;


        $hasStringFilter = false;
        if (null !== $filter && false === is_numeric($filter)) {
            $hasStringFilter = true;
        }


        //--------------------------------------------
        // USER CHOOSES AN INDEX
        //--------------------------------------------
        if (null !== $filter && is_numeric($filter)) {
            if (array_key_exists($filter, $list)) {
                $list = [$list[$filter]];
            }
        }


        //--------------------------------------------
        // DISPLAY THE LIST
        //--------------------------------------------
        foreach ($list as $item) {
            $line = '';
            $index = $item['index'];
            $type = $item['type'];
            $name = $item['name'];
            $description = $item['description'] ?? null;
            $parameters = $item['parameters'] ?? [];
            $options = $item['options'] ?? [];
            $flags = $item['flags'] ?? [];


            if (true === $hasStringFilter) {
                if (false === $this->filterMatch($filter, $name)) {
                    continue;
                }
            }


            switch ($type) {
                case "appCommand":


                    if (true === $displayIndexes) {
                        $line = "<b>$index</b>. ";
                    } else {
                        $line = '- ';
                    }

                    $line .= "<$cmdFmt>$name</$cmdFmt>";
                    foreach ($parameters as $parameter => $info) {
                        list($desc, $isMandatory) = $info;
                        $line .= " <$pmtFmt><$parameter>";
                        if (false === $isMandatory) {
                            $line .= '?';
                        }
                        $line .= "</$pmtFmt>";
                    }


                    foreach ($flags as $name => $desc) {
                        $isLong = (strlen($name) > 1);
                        $dashPrefix = '-';
                        if (true === $isLong) {
                            $dashPrefix .= '-';
                        }
                        $line .= " <$flagFmt>$dashPrefix" . $name . "</$flagFmt>";
                    }


                    if ($options) {
                        $line .= " (opts=";
                        $c = 0;
                        foreach ($options as $name => $info) {
                            if (0 !== $c) {
                                $line .= ", ";
                            }
                            $line .= "<$optionFmt>$name</$optionFmt>";
                            $c++;
                        }
                        $line .= ")";
                    }


                    if (false === $verbose) {
                        $description = str_replace(PHP_EOL, " ", $this->trimLongText($description));
                        $line .= ": " . trim($this->indent($description, 1)) . PHP_EOL;
                    } else {
                        $line .= PHP_EOL;
                    }

                    if (true === $verbose) {

                        $line .= "$ind<$headerFmt>Description</$headerFmt>:" . PHP_EOL;
                        $line .= StringTool::indent($description, 2 * $this->indentInc) . PHP_EOL;


                        if ($parameters) {
                            $line .= "$ind<$headerFmt>Parameters</$headerFmt>:" . PHP_EOL;
                            foreach ($parameters as $parameter => $info) {
                                list($desc, $isMandatory) = $info;
                                $line .= $this->indent("<$pmtFmt>$parameter</$pmtFmt>: $desc", 2) . PHP_EOL;
                            }
                        }
                        if ($options) {

                            $line .= "$ind<$headerFmt>Options</$headerFmt>:" . PHP_EOL;
                            foreach ($options as $option => $info) {

                                $desc = $info['desc'] ?? '';
                                $values = $info['values'] ?? [];
                                $line .= $this->indent("<$optionFmt>$option</$optionFmt>: $desc", 2) . PHP_EOL;

                                if ($values) {
                                    $line .= $this->indent("Possible values are:", 3) . PHP_EOL;
                                    foreach ($values as $itemName => $itemDesc) {
                                        $line .= "$ind4- <b>$itemName</b>";
                                        if (null !== $itemDesc) {
                                            $line .= ": $itemDesc";
                                        }
                                        $line .= PHP_EOL;
                                    }
                                }
                            }
                        }
                        if ($flags) {
                            $line .= "$ind<$headerFmt>Flags</$headerFmt>:" . PHP_EOL;
                            foreach ($flags as $name => $desc) {
                                $nbDash = 1;
                                if (strlen($name) > 1) {
                                    $nbDash = 2;
                                }
                                $line .= $this->indent("<$flagFmt>" . str_repeat('-', $nbDash) . "$name</$flagFmt>: $desc", 2) . PHP_EOL;
                            }
                        }
                    }
                    break;
                case "alias":
                    if (true === $displayAliases) {
                        $dest = $item['dest'];
                        $dstIndex = $this->getIndexByCommand($dest, $this->listCache);
                        if (true === $displayIndexes) {
                            $line = "<b>$index</b>. ";
                        } else {
                            $line = '- ';
                        }
                        $line .= "<$cmdFmt>$name</$cmdFmt>: an alias to the <$cmdFmt>$dest</$cmdFmt> command (<b>#$dstIndex</b>)." . PHP_EOL;
                    }
                    break;
                default:
                    $this->error("Unknown list type: $type.");
                    break;
            }
            $output->write($line);
        }


    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Builds and returns a list of all appId command and aliases.
     *
     * The array is the one described in the conception notes, it basically contains all information.
     *
     * It's an array of trigger id (an int) => item, each item has the following structure:
     * - index: int, the index number for this command
     * - type: string (alias|appCommand), the type of the trigger
     * - name: string, the name of the appCommand or alias
     * - ?dest: string, only for alias: the full command the alias is referring to
     * - ?description: string, the description of the appCommand. This is just for appCommands, aliases don't have a description.
     *
     * The extra properties below are only available when options.args=true, and for appCommands only (i.e. not aliases)
     *
     * - flags: array of name => description
     * - options: array of name => description|list, with list an array of name => ?description.
     * - parameters: array of name => description
     *
     *
     * Available options are:
     * - includeAppId: bool=true, whether to include the appId in the command name.
     *
     *
     *
     *
     * @param array $cliApps
     * @param array $options
     * @return array
     */
    public static function buildListFromCliApps(array $cliApps, array $options = []): array
    {

        $includeAppId = $options['includeAppId'] ?? true;
        $args = true;


        $ret = [];
        $triggerId = 1;
        foreach ($cliApps as $app) {
            /**
             * @var $app LightCliApplicationInterface
             */
            $appId = $app->getAppId();
            $commands = $app->getCommands();
            foreach ($commands as $command) {
                $name = $command->getName();
                $description = $command->getDescription();
                $aliases = $command->getAliases();


                if (true === $args) {
                    $flags = $command->getFlags();
                    $cmdOptions = $command->getOptions();
                    $parameters = $command->getParameters();
                }


                $cmdName = $name;
                if (true === $includeAppId) {
                    $cmdName = $appId . " " . $cmdName;
                }


                $ret[$triggerId] = [
                    'index' => $triggerId,
                    'type' => 'appCommand',
                    'name' => $cmdName,
                    'description' => $description,
                ];
                if (true === $args) {
                    $ret[$triggerId]["flags"] = $flags;
                    $ret[$triggerId]["options"] = $cmdOptions;
                    $ret[$triggerId]["parameters"] = $parameters;
                }

                foreach ($aliases as $alias => $aliasDst) {
                    $triggerId++;

                    $ret[$triggerId] = [
                        'index' => $triggerId,
                        'type' => 'alias',
                        'name' => $alias,
                        'dest' => $aliasDst,
                    ];
                }


                $triggerId++;
            }
        }
        return $ret;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the given string with the first line indented by the given indentLevel, and subsequent lines indented with the given number + $indentInc.
     *
     *
     * @param string $s
     * @param int $indentLevel
     * @return string
     */
    private function indent(string $s, int $indentLevel): string
    {
        return str_repeat(' ', $indentLevel * $this->indentInc) . trim(StringTool::indent($s, ($indentLevel + 1) * $this->indentInc));
    }


    /**
     * Returns a trimmed version of the given description.
     *
     * @param string|null $description
     * @return string
     */
    private function trimLongText(string $description = null): string
    {
        if (null === $description) {
            return "";
        }
        $trimLength = 100;
        if (mb_strlen($description) > $trimLength) {
            $description = substr($description, 0, $trimLength) . "...";
            $description = BashtmlStringTool::fixTrimmedStringFormatting($description);
        }
        return $description;
    }


    /**
     * Returns the index number of the given command.
     *
     * @param string $cmdName
     * @param array $list
     * @return int
     * @throws \Exception
     */
    private function getIndexByCommand(string $cmdName, array $list): int
    {
        foreach ($list as $item) {
            if ($cmdName === $item['name']) {
                return (int)$item['index'];
            }
        }
        $this->error("Command not found in the given list: $cmdName.");
    }


    /**
     * Returns whether the given filter matches the given expression.
     * If the dollar symbol ($) is the first char, it means that the expression must start with the rest of the filter.
     * Otherwise, it means that the expression must contain the filter.
     *
     *
     *
     * @param string $filter
     * @param string $expr
     * @return bool
     */
    private function filterMatch(string $filter, string $expr): bool
    {
        if ('$' === substr($filter, 0, 1)) {
            $filter = substr($filter, 1);
            return (0 === strpos($expr, $filter));
        } else {
            return (false !== strpos($expr, $filter));
        }
    }

    /**
     * Throws an exception.
     *
     * @param string $msg
     */
    private function error(string $msg)
    {
        throw new LightCliException($msg);
    }
}