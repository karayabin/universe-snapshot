<?php


namespace DocTools\DocBuilder;


use DocTools\Exception\DocBuilderException;
use DocTools\Report\ReportInterface;

/**
 * The DocBuilder class.
 *
 * This class builds the documentation pages.
 *
 *
 * The main idea is that you create a DocBuilder class tailored to your needs (encapsulating all your settings and preferences
 * for documentation generation), so that in production you can just call the builder any time you want to generate your documentation
 * with a few lines of code.
 *
 * *
 * This is arguably the most important object in the DocTools planet as it's your interface to generate your documentation.
 *
 * There is no particular rule about how code should be organized inside a DocBuilder, but the classes from the DocTools planet
 * might help you, and there is a main synopsis.
 *
 *
 *
 * Synopsis
 * -----------
 *
 *
 * ```txt
 * builder->prepare ( options )
 * builder->buildDoc()
 * builder->showReport()        // The report is a diagnose tool that helps you creating the perfect doc (it will tell you which methods don't have comments, etc...)
 *
 * ```
 *
 *
 * For a concrete implementation, see the @kw(LingGitPhpPlanetDocBuilder) class.
 *
 *
 *
 *
 *
 *
 */
abstract class DocBuilder
{


    /**
     * This property holds the parser report.
     *
     * @var ReportInterface
     */
    protected $report;


    /**
     * Prepares the doc builder instance.
     * After the call to this method, you should be able to call the showReport method and/or
     * the buildDoc method directly.
     *
     * The content of this method should generally:
     *
     * - define a parser (class parser or planet parser).
     * - use the setReport method to define a parser report (DocTools\Report\ReportInterface).
     *
     * - trigger the parser to obtain the info object (DocTools\Info\InfoInterface) and fill the report.
     *      The info object should be stored and re-used in the buildDoc method.
     *
     * @param array $settings
     *
     */
    abstract public function prepare(array $settings = []);

    /**
     * Creates the documentation pages according to the configuration of the instance,
     * and according to the writeMode property.
     *
     *
     * @return void
     */
    abstract public function buildDoc();


    /**
     * Displays the report.
     * This method should be called only after a call to the prepare method of this instance.
     *
     *
     * @throws DocBuilderException
     */
    public function showReport()
    {
        if (null === $this->report) {
            throw new DocBuilderException("Report is not set. Have you called the prepare method yet? ");
        }
        echo $this->report;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the report object.
     * @param ReportInterface $report
     */
    protected function setReport(ReportInterface $report)
    {
        $this->report = $report;
    }
}