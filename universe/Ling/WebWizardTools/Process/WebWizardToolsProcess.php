<?php


namespace Ling\WebWizardTools\Process;


use Ling\WebWizardTools\Controls\WebWizardToolsControl;
use Ling\WebWizardTools\Exception\WebWizardToolsException;
use Ling\WebWizardTools\Report\WebWizardToolsReport;
use Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard;

/**
 * The WebWizardToolsProcess class.
 */
abstract class WebWizardToolsProcess
{

    /**
     * This property holds the report for this instance.
     * @var WebWizardToolsReport
     */
    protected $report;


    /**
     * The controls for this instance.
     *
     * It's an array of controlName => controlInstance.
     *
     * @var WebWizardToolsControl[]
     */
    protected $controls;

    /**
     * This property holds the name for this instance.
     * @var string
     */
    protected $name;

    /**
     * This property holds the label for this instance.
     * @var string
     */
    protected $label;

    /**
     * This property holds the learnMore for this instance.
     * @var string
     */
    protected $learnMore;

    /**
     * This property holds the webWizard for this instance.
     * @var WebWizardToolsWebWizard
     */
    protected $webWizard;

    /**
     * The params for this instance.
     * See the @page(WebWizardTools conception notes) for more details.
     *
     * @var array
     */
    protected $params;


    /**
     * This property holds the enabled for this instance.
     * @var bool = true
     */
    protected $enabled;

    /**
     * This property holds the disabledReason for this instance.
     * @var string
     */
    protected $disabledReason;

    /**
     * This property holds the category for this instance.
     * @var string
     */
    protected $category;


    /**
     * Builds the WebWizardToolsProcess instance.
     */
    public function __construct()
    {
        $this->name = null;
        $this->label = "undefined label";
        $this->learnMore = "";
        $this->disabledReason = "";
        $this->report = new WebWizardToolsReport();
        $this->controls = [];
        $this->params = [];
        $this->webWizard = null;
        $this->enabled = true;


        // default vategory
        $class = get_class($this);
        $p = explode('\\', $class);
        array_pop($p);
        $category = array_pop($p);
        $this->category = $category;

    }


    /**
     * An opportunity for the process to create the controls, and/or to change the label of the process dynamically.
     *
     * @overrideme
     */
    public function prepare()
    {

    }


    /**
     * Returns the report of this instance.
     *
     * @return array
     */
    public function getReport(): WebWizardToolsReport
    {
        return $this->report;
    }

    /**
     * Returns the controls of this instance.
     *
     * @return WebWizardToolsControl[]
     */
    public function getControls(): array
    {
        return $this->controls;
    }

    /**
     * Sets the webWizard.
     *
     * @param WebWizardToolsWebWizard $webWizard
     * @return $this
     */
    public function setWebWizard(WebWizardToolsWebWizard $webWizard): self
    {
        $this->webWizard = $webWizard;
        return $this;
    }


    /**
     * Adds a control to this process.
     *
     * @param WebWizardToolsControl $control
     * @return $this
     */
    public function setControl(WebWizardToolsControl $control): self
    {
        $this->controls[$control->getName()] = $control;
        return $this;
    }

    /**
     * Returns the name of this instance.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name.
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the label of this instance.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Sets the label.
     *
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * Returns the params of this instance.
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Sets the params.
     *
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * Returns the learnMore of this instance.
     *
     * @return string
     */
    public function getLearnMore(): string
    {
        return $this->learnMore;
    }

    /**
     * Sets the learnMore.
     *
     * @param string $learnMore
     */
    public function setLearnMore(string $learnMore)
    {
        $this->learnMore = $learnMore;
    }

    /**
     * Returns the enabled of this instance.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Sets the enabled.
     *
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Returns the disabledReason of this instance.
     *
     * @return string
     */
    public function getDisabledReason(): string
    {
        return $this->disabledReason;
    }

    /**
     * Sets the disabledReason.
     *
     * @param string $disabledReason
     */
    public function setDisabledReason(string $disabledReason)
    {
        $this->enabled = false;
        $this->disabledReason = $disabledReason;
    }

    /**
     * Returns the category of this instance.
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Sets the category.
     *
     * @param string $category
     * @return self
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }










    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Executes the process.
     *
     * @param array $options
     */
    public function execute(array $options = [])
    {
        $this->infoMessage("Executing process " . $this->name);
        try {
            $this->doExecute($options);
        } catch (\Exception $e) {
            $this->exceptionMessage($e);
        }
    }


    /**
     * Adds a message of the given type to the log.
     *
     *
     * @param string $msg
     * @param string $type
     */
    public function addLogMessage(string $msg, string $type)
    {
        $this->message($msg, $type);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes the process.
     *
     * Options depends on the process.
     *
     * @param $options
     * @return void
     */
    abstract protected function doExecute(array $options = []);




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a variable from the wizard context.
     * If the variable doesn't exist, it throws an exception by default.
     * or if the throwEx flag is set to false, it returns the default value instead.
     *
     *
     * @param string $varName
     * @param null $defaultValue
     * @param bool $throwEx
     */
    protected function getContextVar(string $varName, $defaultValue = null, bool $throwEx = true)
    {
        $context = $this->webWizard->getContext();
        if (array_key_exists($varName, $context)) {
            return $context[$varName];
        }
        if (true === $throwEx) {
            $this->error("Undefined context variable $varName");
        }
        return $defaultValue;
    }


    /**
     * Returns the context vars for this instance.
     * @return array
     */
    protected function getContextVars(): array
    {
        return $this->webWizard->getContext();
    }



    //--------------------------------------------
    // REPORT MESSAGES
    //--------------------------------------------
    /**
     * Adds a message of type "trace" to the process report.
     *
     * @param string $msg
     */
    protected function traceMessage(string $msg)
    {
        $this->message($msg, "trace");
    }

    /**
     * Adds a message of type "info" to the process report.
     *
     * @param string $msg
     */
    protected function infoMessage(string $msg)
    {
        $this->message($msg, "info");
    }

    /**
     * Adds a message of type "error" to the process report.
     *
     * @param string $msg
     */
    protected function errorMessage(string $msg)
    {
        $this->message($msg, "error");
    }

    /**
     * Adds a message of type "important" to the process report.
     *
     * @param string $msg
     */
    protected function importantMessage(string $msg)
    {
        $this->message($msg, "important");
    }


    /**
     * Adds a message of type "exception" to the process report.
     *
     * @param \http\Exception\ $e
     */
    protected function exceptionMessage(\Exception $e)
    {
        $this->message($e, 'exception');
    }


    /**
     * Adds a message of the given type to the process report.
     * @param string|\Exception $msg
     * @param string $type
     */
    protected function message($msg, string $type)
    {
        switch ($type) {
            case "trace":
                $this->report->addTrace($msg);
                break;
            case "info":
                $this->report->addInfo($msg);
                break;
            case "error":
                $this->report->addError($msg);
                break;
            case "important":
                $this->report->addImportant($msg);
                break;
            case "exception":
                $this->report->addException($msg);
                break;
            default:
                $this->error("Unknown message type \"$type\".");
                break;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new WebWizardToolsException($msg);
    }
}