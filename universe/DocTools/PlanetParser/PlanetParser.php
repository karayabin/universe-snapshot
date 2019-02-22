<?php


namespace DocTools\PlanetParser;


use DocTools\ClassParser\ClassParser;
use DocTools\ClassParser\ClassParserInterface;
use DocTools\Exception\PlanetParserException;
use DocTools\GenericParser\GenericParserInterface;
use DocTools\Info\InfoInterface;
use DocTools\Info\PlanetInfo;
use DocTools\Interpreter\NotationInterpreterInterface;
use DocTools\Report\ReportInterface;
use UniverseTools\DependencyTool;
use UniverseTools\PlanetTool;


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
     * Builds the PlanetParser instance.
     */
    public function __construct()
    {
        $this->classParser = null;
        $this->resolveInlineTags = true;
        $this->notationInterpreter = null;
        $this->report = null;
    }


    /**
     * Returns the PlanetInfo object corresponding to the parsed $planetDir,
     * and creates a PlanetReport (retrieved using the getReport method).
     *
     *
     * @param $planetDir
     * @return InfoInterface
     * @throws \Exception
     * @seeMethod getReport
     */
    public function parse(string $planetDir): InfoInterface
    {

        if (null === $this->notationInterpreter) {
            throw new PlanetParserException("Config error. Set the notationInterpreter property first. Use the setNotationInterpreter method.");
        }


        if (is_dir($planetDir)) {

            $classes = PlanetTool::getClassNames($planetDir);
            $notationInterpreter = $this->notationInterpreter;

            $classParser = new ClassParser();
            $classParser->setResolveInlineTags($this->resolveInlineTags);
            $classParser->setNotationlInterpreter($notationInterpreter);
            if (null !== $this->report) {
                $classParser->setReport($this->report);
            }


            $planetInfo = new PlanetInfo();
            $planetInfo->setName(basename($planetDir));


            $planetInfo->setDependencies(DependencyTool::getDependencyList($planetDir));
            foreach ($classes as $class) {
                $classInfo = $classParser->parse($class);
                $planetInfo->addClass($classInfo);
            }


            return $planetInfo;

        }
        else {
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