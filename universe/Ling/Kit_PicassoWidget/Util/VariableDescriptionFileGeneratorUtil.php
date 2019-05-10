<?php


namespace Ling\Kit_PicassoWidget\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;

/**
 * The VariableDescriptionFileGeneratorUtil class.
 *
 *
 *
 */
class VariableDescriptionFileGeneratorUtil
{

    /**
     *
     * Reads a @page(page configuration array), and writes a base variable description file for all picasso widgets found.
     * All files created will have the following name format:
     *
     * - $widgetClassName.var_descr.prototype.byml
     *
     * Note: only widgets with the type "picasso" will be parsed.
     *
     *
     * @param string $pageConfFile
     * Path to the page configuration file in babyYaml format.
     *
     *
     * @param string $outputDir
     */
    public function generate(string $pageConfFile, string $outputDir)
    {

        $tpl = __DIR__ . "/tpl/widget.vars_descr.tpl.byml";
        $originalContent = file_get_contents($tpl);


        $conf = BabyYamlUtil::readFile($pageConfFile);
        $zones = $conf['zones'];
        $processed = [];
        foreach ($zones as $zone) {
            foreach ($zone as $widgetConf) {
                if ('picasso' === $widgetConf['type']) {
                    $p = explode('\\', $widgetConf['className']);
                    $className = array_pop($p);


                    if (false === in_array($className, $processed, true)) {


                        $sVars = $this->renderVars($widgetConf['vars']);
                        $sExample = $this->renderExample($widgetConf['vars']);

                        $content = str_replace([
                            '${widgetClassName}',
                            '${vars}',
                            '${example}',
                        ], [
                            $className,
                            $sVars,
                            $sExample,
                        ], $originalContent);
                        $outputFile = $outputDir . "/$className.vars_descr.prototype.byml";
                        FileSystemTool::mkfile($outputFile, $content);
                        $processed[] = $className;
                    }
                }
            }
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Parses the given vars in @page(widget configuration array) format, and returns the
     * corresponding base variables description formatted vars string.
     *
     * @param array $vars
     * @return string
     */
    protected function renderVars(array $vars)
    {
        $s = 'vars:' . PHP_EOL;
        foreach ($vars as $name => $value) {
            $s .= $this->renderVar($name, $value, 1);
        }
        return $s;
    }


    /**
     * Renders a variables description item recursively.
     *
     * @param string $varName
     * @param $value
     * @param int $indentBase
     * @return string
     */
    protected function renderVar(string $varName, $value, int $indentBase = 1)
    {
        $s = '';
        $type = "string";
        $defaultValue = $value;
        $description = "todo: here";

        if (1 === $indentBase && "attr" === $varName) {
            $description = "The attributes to add to the widget's container tag.";
        }

        $example = null;
        $itemProperties = null;
        $properties = null;


        if (true === $value) {
            $defaultValue = "true";
            $type = "bool";
        } elseif (false === $value) {
            $defaultValue = "false";
            $type = "bool";
        } elseif (null === $value) {
            $defaultValue = "null";
        } elseif (is_array($value)) {
            $defaultValue = "null";
            if (false === empty($value)) {
                // numeric
                if (array_key_exists("0", $value)) {
                    $item = $value[0];
                    if (is_array($item)) {
                        if (false === empty($item)) {
                            if (false === array_key_exists("0", $item)) {
                                // assuming it's an item list
                                $type = "item_list";
                                $defaultValue = "[]";
                                $itemProperties = "";
                                foreach ($item as $k => $v) {
                                    $itemProperties .= $this->renderVar($k, $v, $indentBase + 2);
                                }


                            }
                        }
                    }
                } // associative
                else {
                    $type = "array";
                    $properties = '';
                    foreach ($value as $k => $v) {
                        $properties .= $this->renderVar($k, $v, $indentBase + 2);
                    }
                }
            }
        } else {
            // string
//            $defaultValue = '""';
            $example = $value;
        }


        $indent0 = str_repeat(" ", ($indentBase) * 4);
        $indent = str_repeat(" ", ($indentBase + 1) * 4);


        $s .= $indent0 . $varName . ":" . PHP_EOL;
        $s .= $indent . "type: $type" . PHP_EOL;
        $s .= $indent . "default_value: $defaultValue" . PHP_EOL;
        $s .= $indent . "description: $description" . PHP_EOL;
        if (null !== $itemProperties) {
            $s .= $indent . "item_properties: " . PHP_EOL;
            $s .= $itemProperties;
        }

        if (null !== $properties) {
            $s .= $indent . "properties: " . PHP_EOL;
            $s .= $properties;
        }

        if (null !== $example) {
            if (strlen($example) > 75) {
                $s .= $indent . BabyYamlUtil::getBabyYamlString(["example" => $example]) . PHP_EOL;
            } else {
                $s .= $indent . "example: $example" . PHP_EOL;
            }
        }
        return $s;
    }

    /**
     * Parses the given vars in @page(widget configuration array) format, and returns a
     * variables description example out of it.
     *
     * @param array $vars
     * @return string
     */
    protected function renderExample(array $vars)
    {
        return StringTool::indent(BabyYamlUtil::getBabyYamlString($vars), 4);
    }
}