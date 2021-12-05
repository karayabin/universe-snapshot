<?php


namespace Ling\UniverseTools\Util;

use Ling\Bat\FileSystemTool;
use Ling\UniverseTools\Exception\UniverseToolsException;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The StandardReadmeUtil class.
 */
class StandardReadmeUtil
{


    /**
     * This property holds the errors for this instance.
     * @var array
     */
    protected array $errors;


    /**
     * This property holds the historyLogRegex for this instance.
     * @var string
     */
    private string $historyLogRegex;


    /**
     * Builds the ReadmeUtil instance.
     */
    public function __construct()
    {
        $this->errors = [];
        $this->historyLogRegex = '!History\s*Log!i';
    }


    /**
     * Returns information about the latest version found in the **History Log**
     * section of the given README file.
     *
     * Returns false if a problem occurred, in which case errors are accessible via the getErrors method.
     *
     * In case of success, the array has the following structure:
     *
     * - 0: version
     * - 1: text
     * - 2: isDoubleDash (bool)
     *
     *
     * Errors, if any, are put in the errors array.
     *
     *
     * Available options are:
     *
     * - considerDoubleDash: bool=false, if true, the first version found might be a double dash. If false (by default),
     *      the first version found can never be a double dash version.
     *
     * Note: double dash is a convention I use to indicate that the planet needs to be committed (like a todo hint).
     *
     *
     * @param string $readMeFile
     * @param array $errors
     * @param array $options
     * @return array|false
     */
    public function getLatestVersionInfo(string $readMeFile, array &$errors = [], array $options = []): array|false
    {
        $this->errors = [];
        $useDoubleDash = $options['considerDoubleDash'] ?? false;

        if (false === $useDoubleDash) {
            $lineRegex = '!^(- )([0-9]+\.[0-9]+(\.[0-9]+)?) -- [0-9]{4}-[0-9]{2}-[0-9]{2}!';
        } else {
            $lineRegex = '!^(--? )([0-9]+\.[0-9]+(\.[0-9]+)?) -- [0-9]{4}-[0-9]{2}-[0-9]{2}!';
        }

        $ret = false;
        if (file_exists($readMeFile)) {

            $lines = file($readMeFile);

            // assuming the last version is at the top

            $historyLogSectionFound = false;
            $versionFound = false;
            $isDoubleDash = false;
            $version = null;
            $text = null;
            foreach ($lines as $line) {
                if (true === $historyLogSectionFound) {
                    if (false === $versionFound) {
                        if (preg_match($lineRegex, $line, $match)) {

                            $dash = trim($match[1]);
                            $isDoubleDash = ('--' === $dash);
                            $version = $match[2];
                            $versionFound = true;
                        }
                    } else {
                        if (preg_match('!^\s+- (.*)!', $line, $match)) {
                            $text = $match[1];
                            break;
                        }
                    }
                } else {
                    if ('History Log' === trim($line)) {
                        $historyLogSectionFound = true;
                    }
                }
            }

            if (false === $historyLogSectionFound) {
                $this->addError("No \"History Log\" section found in this README file ($readMeFile).");
            } elseif (null !== $version && null !== $text) {
                $ret = [
                    $version,
                    $text,
                    $isDoubleDash,
                ];
            } else {
                $this->addError("Could not find the version and/or the commit text from the \"History Log\" section (in $readMeFile).");
            }

        } else {
            $this->addError("This entry is not a file: $readMeFile.");
        }
        $errors = $this->errors;
        return $ret;
    }


    /**
     * Returns the errors of this instance.
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }


    /**
     *
     * Adds an history entry to the given "read me" file, with the given message, date and version.
     * Throws an exception if it fails.
     *
     * @param string $readmePath
     * @param string $version
     * @param string $date
     * @param string $message
     */
    public function addHistoryLogEntry(string $readmePath, string $version, string $date, string $message)
    {
        $lines = file($readmePath, FILE_SKIP_EMPTY_LINES);
        //--------------------------------------------
        // FIRST COLLECT HISTORY LINES
        //--------------------------------------------
        $started = false;
        $index = null;
        foreach ($lines as $k => $line) {
            $line = trim($line);
            if (true === $started) {
                if (preg_match('!- [0-9].*!', $line, $match)) {
                    $index = $k - 1;
                    break;
                }
            } else {
                if (preg_match($this->historyLogRegex, $line, $match)) {
                    $started = true;
                }
            }
        }

        if (null !== $index) {
            array_splice($lines, $index, 1, [
                '' . PHP_EOL,
                "- $version -- $date" . PHP_EOL,
                '' . PHP_EOL,
                "    - $message" . PHP_EOL,
                '' . PHP_EOL,
            ]);
            FileSystemTool::mkfile($readmePath, implode('', $lines));
        } else {
            throw new UniverseToolsException("Didn't find a log entry section for this README file: $readmePath.");
        }
    }


    /**
     * Returns the array of the planet dot names to commit.
     *
     * This is based on a little convention I use: I put a double dash to the first commit line (in the History section of the readme file),
     * to indicate that this planet needs to be committed later.
     *
     *
     *
     * @param string $appDir
     * @return array
     */
    public function getPlanetsToCommitListByAppDir(string $appDir): array
    {
        $ret = [];
        $uniDir = $appDir . "/universe";
        $planetDirs = PlanetTool::getPlanetDirs($uniDir);
        $options = [
            "considerDoubleDash" => true,
        ];
        foreach ($planetDirs as $planetDir) {
            $readmeFile = $planetDir . "/README.md";
            $errors = [];
            $arr = $this->getLatestVersionInfo($readmeFile, $errors, $options);

            if (false !== $arr) {

                if (true === $arr[2]) {
                    $planetDotName = PlanetTool::getPlanetDotNameByPlanetDir($planetDir);
                    $ret[] = $planetDotName;
                }
            }
        }
        return $ret;
    }

    /**
     * Adds a commit message to the history log section of the README files for each planet in the given universeDir.
     * The version number is incremented from the last version found, using a minor version number increment.
     * The date is set to the current date.
     *
     *
     *
     * @param string $universeDir
     * @param string $message
     */
    public function addCommitMessageByUniverseDir(string $universeDir, string $message)
    {
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planetDirs as $planetDir) {
            $this->addCommitMessageByPlanetDir($planetDir, $message, ['increment' => true]);
        }
    }


    /**
     * Updates the date of the README.md file.
     * The date:
     * - must be on line 3
     * - must start at the beginning of the line
     * - the last char of the line must be part of a date
     * - can have a first/last date separator being either: -> or -->
     * - both first and last component must have the mysql date format (i.e. 2021-03-05)
     *
     * This method always updates the "last" part of the date.
     *
     *
     * @param string $readMeFile
     * @param string|null $date
     */
    public function updateDate(string $readMeFile, string $date = null)
    {
        if (null === $date) {
            $date = date("Y-m-d");
        }
        $lines = file($readMeFile);
        if (true === array_key_exists(2, $lines)) {
            $line = $lines[2];
            if (preg_match('!^([0-9]{4}-[0-9]{2}-[0-9]{2})(:?\s*-{1,2}>\s*([0-9]{4}-[0-9]{2}-[0-9]{2}))?$!', $line, $match)) {
                if (true === array_key_exists(3, $match)) {
                    $lines[2] = str_replace($match[3], $date, $lines[2]);
                } else {
                    $lines[2] = trim($lines[2]) . ' -> ' . $date . PHP_EOL;
                }
                file_put_contents($readMeFile, implode('', $lines));
            }
        }
    }

    /**
     * Adds a commit message to the history log section of the README files for the given planet..
     * The version number is incremented from the last version found, using a minor version number increment.
     * The date is set to the current date.
     *
     * Available options are:
     *
     * - increment: bool=false, whether to increment the version number in the readme's "history log" section
     *
     *
     *
     *
     * @param string $planetDir
     * @param string $message
     * @param array $options
     */
    public function addCommitMessageByPlanetDir(string $planetDir, string $message, array $options = [])
    {

        $increment = $options['increment'] ?? false;

        $date = date("Y-m-d");
        $lastVersion = MetaInfoTool::getVersion($planetDir);

        if (true === $increment) {
            $p = explode(".", $lastVersion);
            $lastComponent = (int)array_pop($p);
            $lastComponent++;
            $p[] = $lastComponent;
            $version = implode('.', $p);
        } else {
            $version = $lastVersion;
        }

        $readmePath = $planetDir . "/README.md";
        $this->addHistoryLogEntry($readmePath, $version, $date, $message);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds a message error.
     *
     * @param string $msg
     */
    protected function addError(string $msg)
    {
        $this->errors[] = $msg;
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the array of all version numbers found in the README.md of the given planetDir.
     *
     *
     * @param string $planetDir
     * @return array
     */
    public static function getReadmeVersionsByPlanetDir(string $planetDir): array
    {
        $ret = [];
        $readmePath = $planetDir . "/README.md";
        if (file_exists($readmePath)) {
            $ret = self::getAllVersionNumbers($readmePath);
        }
        return $ret;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array of all version numbers found in the in the "History Log" section of the "read me" file.
     * @param string $readmePath
     * @return array
     */
    private static function getAllVersionNumbers(string $readmePath): array
    {
        $lines = file($readmePath, FILE_SKIP_EMPTY_LINES);
        $historyLogRegex = '!History\s*Log!i';

        //--------------------------------------------
        // FIRST COLLECT HISTORY LINES
        //--------------------------------------------
        $started = false;
        $historyLines = [];
        foreach ($lines as $line) {
            $line = trim($line);

            if (true === $started) {
                $historyLines[] = $line;
            } else {
                if (preg_match($historyLogRegex, $line, $match)) {
                    $started = true;
                }
            }
        }

        //--------------------------------------------
        // NOW COLLECT THE VERSION NUMBERS
        //--------------------------------------------
        $versionNumbers = [];
        foreach ($historyLines as $line) {
            if (preg_match('!-\s([0-9][^-]+)\s-+\s[0-9]{4}-[0-9]{2}-[0-9]{2}!', $line, $match)) {
                $versionNumbers[] = $match[1];
            }
        }

        natsort($versionNumbers);
        return $versionNumbers;
    }


}