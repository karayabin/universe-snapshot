<?php


namespace Ling\WebWizardTools\Report;

/**
 * The WebWizardToolsReport class.
 */
class WebWizardToolsReport
{

    /**
     * This property holds the trace messages for this instance.
     * @var array
     */
    protected $trace;

    /**
     * This property holds the info messages for this instance.
     * @var array
     */
    protected $info;

    /**
     * This property holds the error messages for this instance.
     * @var array
     */
    protected $error;

    /**
     * This property holds the important messages for this instance.
     * @var array
     */
    protected $important;

    /**
     * This property holds the exception messages for this instance.
     * @var array
     */
    protected $exception;


    /**
     * Builds the WebWizardToolsReport instance.
     */
    public function __construct()
    {
        $this->trace = [];
        $this->info = [];
        $this->error = [];
        $this->important = [];
        $this->exception = [];
    }


    /**
     * Returns whether the report is successful.
     * A successful report is a report with 0 error messages, and 0 exception messages.
     *
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return (
            0 === count($this->error) &&
            0 === count($this->exception)
        );
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the trace of this instance.
     *
     * @return array
     */
    public function getTraceMessages(): array
    {
        return $this->trace;
    }

    /**
     * Returns the info of this instance.
     *
     * @return array
     */
    public function getInfoMessages(): array
    {
        return $this->info;
    }


    /**
     * Returns the error of this instance.
     *
     * @return array
     */
    public function getErrorMessages(): array
    {
        return $this->error;
    }


    /**
     * Returns the important of this instance.
     *
     * @return array
     */
    public function getImportantMessages(): array
    {
        return $this->important;
    }


    /**
     * Returns the exception of this instance.
     *
     * @return array
     */
    public function getExceptionMessages(): array
    {
        return $this->exception;
    }


    /**
     * Adds a "trace" message to the report.
     * @param string $msg
     */
    public function addTrace(string $msg)
    {
        $this->trace[] = $msg;
    }

    /**
     * Adds an "info" message to the report.
     * @param string $msg
     */
    public function addInfo(string $msg)
    {
        $this->info[] = $msg;
    }

    /**
     * Adds an "error" message to the report.
     * @param string $msg
     */
    public function addError(string $msg)
    {
        $this->error[] = $msg;
    }

    /**
     * Adds an "important" message to the report.
     * @param string $msg
     */
    public function addImportant(string $msg)
    {
        $this->important[] = $msg;
    }

    /**
     * Adds an exception to the report.
     * @param \Exception $e
     */
    public function addException(\Exception $e)
    {
        $this->exception[] = $e;
    }

}