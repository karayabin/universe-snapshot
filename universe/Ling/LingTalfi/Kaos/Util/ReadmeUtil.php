<?php


namespace Ling\LingTalfi\Kaos\Util;


use Ling\Bat\FileSystemTool;

/**
 * The ReadmeUtil class.
 */
class ReadmeUtil
{

    /**
     * This property holds the errors for this instance.
     * @var array
     */
    protected $errors;


    /**
     * Builds the ReadmeUtil instance.
     */
    public function __construct()
    {
        $this->errors = [];
    }


    /**
     * Writes a basic README file at the given location, and returns whether the creation of the file
     * was successful.
     *
     *
     *
     * @param $readmeFile
     * @param array $tags
     * Must contains the following tags:
     *
     * - galaxy: the name of the galaxy
     * - planet: the name of the planet
     * - ?date: the starting (mysql) date of the project (the current date will be used by default)
     *
     *
     * @return bool
     */
    public function createBasicReadmeFile($readmeFile, array $tags)
    {
        $tpl = __DIR__ . "/../assets/README.tpl.md";
        $content = file_get_contents($tpl);
        $content = str_replace([
            "Ling",
            "WebBox",
            "2019-02-22",
            "__summary_links__",
        ], [
            $tags['galaxy'] ?? "Ling",
            $tags['planet'] ?? "WebBox",
            $tags['date'] ?? date('Y-m-d'),
            $tags['summaryLinks'] ?? "",
        ], $content);
        return FileSystemTool::mkfile($readmeFile, $content);
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
     *
     *
     *
     *
     * @param string $readMeFile
     * @return array|false
     */
    public function getLatestVersionInfo(string $readMeFile)
    {
        $this->errors = [];
        $ret = false;
        if (file_exists($readMeFile)) {

            $lines = file($readMeFile);

            // assuming the last version is at the top

            $historyLogSectionFound = false;
            $versionFound = false;
            $version = null;
            $text = null;
            foreach ($lines as $line) {
                if (true === $historyLogSectionFound) {
                    if (false === $versionFound) {
                        if (0 === strpos($line, '- ')) {
                            if (preg_match('!([0-9]+\.[0-9]+(\.[0-9]+)?) -- [0-9]{4}-[0-9]{2}-[0-9]{2}!', $line, $match)) {
                                $version = $match[1];
                                $versionFound = true;
                            }
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
                ];
            } else {
                $this->addError("Could not find the version and/or the commit text from the \"History Log\" section (in $readMeFile).");
            }

        } else {
            $this->addError("This entry is not a file: $readMeFile.");
        }
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
}