<?php


namespace Ling\DocTools\PlanetParser;


use Ling\DocTools\ClassParser\ClassParser;
use Ling\DocTools\ClassParser\ClassParserInterface;
use Ling\DocTools\Exception\PlanetParserException;
use Ling\DocTools\GenericParser\GenericParserInterface;
use Ling\DocTools\Info\InfoInterface;
use Ling\DocTools\Info\PlanetInfo;
use Ling\DocTools\Interpreter\NotationInterpreterInterface;
use Ling\DocTools\Report\ReportInterface;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The PlanetParser class.
 *
 * It will parse every classes of a planet and return a PlanetInfo object.
 *
 *
 * The planet parser speaks markdown language only.
 * The html conversion is done by the client at a later step if necessary.
 *
 */
class PlanetParser implements GenericParserInterface
{


    /**
     * This property holds a @doc(ClassParserInterface) instance.
     * @var ClassParserInterface
     */
    protected $classParser;

    /**
     * This property holds the parser report for this instance.
     * The report will only be available after the parse method has been called.
     *
     *
     * @var ReportInterface
     */
    protected $report;


    /**
     * This property holds whether @keyword(inline tags) should be resolved.
     * The default value is true.
     *
     * @var bool = true
     */
    protected $resolveInlineTags;

    /**
     * This property holds the @keyword(docTool markup language) interpreter for this instance.
     *
     * The docTool interpreter is used to resolve the inline functions of the docTool language.
     *
     * @var NotationInterpreterInterface
     */
    protected $notationInterpreter;

    /**
     * This property holds the array of className and/or className::methodName => url.
     * @var array
     */
    protected $generatedItems2Url;


    /**
     * Builds the PlanetParser instance.
     */
    public function __construct()
    {
        $this->classParser = null;
        $this->resolveInlineTags = true;
        $this->notationInterpreter = null;
        $this->report = null;
        $this->generatedItems2Url = [];
    }


    /**
     * Returns the PlanetInfo object corresponding to the parsed $planetDir,
     * and creates a PlanetReport (retrieved using the getReport method).
     *
     * Available options are:
     * - ignoreFilesStartingWith: array of prefixes to look for. If a prefix matches the beginning of a (relative) file path (relative to the planet root dir),
     *          then the file is excluded.
     *
     *
     * @param $planetDir
     * @param $options
     * @return InfoInterface
     * @throws \Exception
     * @seeMethod getReport
     */
    public function parse(string $planetDir, array $options = []): InfoInterface
    {
        if (null === $this->notationInterpreter) {
            throw new PlanetParserException("Config error. Set the notationInterpreter property first. Use the setNotationInterpreter method.");
        }

        if (is_dir($planetDir)) {


            $ignoreFilesStartingWith = $options['ignoreFilesStartingWith'] ?? [];


            $classes = PlanetTool::getClassNames($planetDir, [
                "ignoreFilesStartingWith" => $ignoreFilesStartingWith,
            ]);
            $notationInterpreter = $this->notationInterpreter;

            $classParser = new ClassParser();
            $classParser->setResolveInlineTags($this->resolveInlineTags);
            $classParser->setNotationlInterpreter($notationInterpreter);
            $classParser->setGeneratedItemsToUrl($this->generatedItems2Url);
            if (null !== $this->report) {
                $classParser->setReport($this->report);
            }


            $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            if (false !== $pInfo) {

                list($galaxy, $planetShortName) = $pInfo;
                $planetName = $galaxy . "/" . $planetShortName;

                $planetInfo = new PlanetInfo();
                $planetInfo->setName($planetName);


                $planetInfo->setDependencies(DependencyTool::getDependencyList($planetDir));
                foreach ($classes as $class) {
                    $classInfo = $classParser->parse($class);
                    $planetInfo->addClass($classInfo);
                }


                return $planetInfo;
            } else {
                throw new PlanetParserException("Invalid planet dir. See the bsr-1 document for more info: https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md.");
            }

        } else {
            throw new PlanetParserException("Planet dir not found: $planetDir");
        }
    }


    /**
     * Sets the class parser.
     *
     * @param ClassParserInterface $classParser
     */
    public function setClassParser(ClassParserInterface $classParser)
    {
        $this->classParser = $classParser;
    }

    /**
     * Sets the generatedItems2Url.
     *
     * @param array $generatedItems2Url
     */
    public function setGeneratedItemsToUrl(array $generatedItems2Url)
    {
        $this->generatedItems2Url = $generatedItems2Url;
    }


    /**
     * Returns the report.
     *
     * @return ReportInterface|null
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Sets the report.
     *
     * @param ReportInterface $report
     */
    public function setReport(ReportInterface $report)
    {
        $this->report = $report;
    }


    /**
     * Sets the resolveInlineTags.
     *
     * @param bool $resolveInlineTags
     */
    public function setResolveInlineTags(bool $resolveInlineTags)
    {
        $this->resolveInlineTags = $resolveInlineTags;
    }


    /**
     * Sets the notation interpreter.
     *
     * @param NotationInterpreterInterface $notationInterpreter
     */
    public function setNotationInterpreter(NotationInterpreterInterface $notationInterpreter)
    {
        $this->notationInterpreter = $notationInterpreter;
    }

}