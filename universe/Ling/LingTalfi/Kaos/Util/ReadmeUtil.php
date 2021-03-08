<?php


namespace Ling\LingTalfi\Kaos\Util;


use Ling\Bat\FileSystemTool;
use Ling\UniverseTools\Util\StandardReadmeUtil;

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
     * This property holds the isLight for this instance.
     * @var bool
     */
    protected $isLight;


    /**
     * This property holds the serviceContent for this instance.
     * @var string
     */
    protected $serviceContent;

    /**
     * This property holds the historyLogRegex for this instance.
     * @var string
     */
    private $historyLogRegex;


    /**
     * Builds the ReadmeUtil instance.
     */
    public function __construct()
    {
        $this->errors = [];
        $this->isLight = false;
        $this->serviceContent = '';
        $this->historyLogRegex = '!History\s*Log!i';
    }

    /**
     * Sets the isLight.
     *
     * @param bool $isLight
     */
    public function setIsLight(bool $isLight)
    {
        $this->isLight = $isLight;
    }

    /**
     * Sets the serviceContent.
     *
     * @param string $serviceContent
     */
    public function setServiceContent(string $serviceContent)
    {
        $this->serviceContent = $serviceContent;
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

        if (false === $this->isLight) {
            $tpl = __DIR__ . "/../assets/README.tpl.md";
        } else {
            $tpl = __DIR__ . "/../assets/README-light.tpl.md";
        }


        $keys = [
            "Ling",
            "WebBox",
            "2019-02-22",
            "__summary_links__",
        ];
        $values = [
            $tags['galaxy'] ?? "Ling",
            $tags['planet'] ?? "WebBox",
            $tags['date'] ?? date('Y-m-d'),
            $tags['summaryLinks'] ?? "",
        ];


        if (true === $this->isLight) {
            $keys[] = "theBabyYamlHere";
            $values[] = $this->serviceContent;
        }


        $content = file_get_contents($tpl);
        $content = str_replace($keys, $values, $content);
        return FileSystemTool::mkfile($readmeFile, $content);
    }


    /**
     * Proxy to the standardReadmeUtil's getLatestVersionInfo method.
     *
     *
     * @param string $readMeFile
     * @param array $errors
     * @return array|false
     */
    public function getLatestVersionInfo(string $readMeFile, array &$errors = [])
    {
        $u = new StandardReadmeUtil();
        return $u->getLatestVersionInfo($readMeFile, $errors);

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




}