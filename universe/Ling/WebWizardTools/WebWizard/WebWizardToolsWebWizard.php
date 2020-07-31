<?php


namespace Ling\WebWizardTools\WebWizard;

use Ling\WebWizardTools\Controls\WebWizardToolsOptionList;
use Ling\WebWizardTools\Exception\WebWizardToolsException;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;
use Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface;

/**
 * The WebWizardToolsWebWizard class.
 */
class WebWizardToolsWebWizard
{

    /**
     * This property holds the optionList for this instance.
     * @var WebWizardToolsOptionList = null
     */
    protected $optionList;

    /**
     * This property holds the processes for this instance.
     *
     * It's an array of processName => processInstance.
     *
     * @var WebWizardToolsProcess[]
     */
    protected $processes;


    /**
     * This property holds the renderer for this instance.
     * @var WebWizardToolsWebWizardRendererInterface
     */
    protected $renderer;

    /**
     * This property holds the context for this instance.
     * @var array
     */
    protected $context;

    /**
     * This property holds the triggerExtraParams for this instance.
     * @var array
     */
    protected $triggerExtraParams;

    /**
     * This property holds the processKeyName for this instance.
     * @var string = process
     */
    protected $processKeyName;

    /**
     * A callable to filter processes to disable/enable.
     *
     * The callable signature is:
     *
     * - fn ( string $processName ): string|null
     *
     * If the callable returns a string, it's the reason why the process is disabled.
     * Any other value means that the process is enabled.
     *
     *
     *
     * @var callable
     */
    protected $processFilter;


    /**
     * This property holds the onProcessSuccessMessage for this instance.
     * @var string|null
     */
    protected $onProcessSuccessMessage;


    /**
     * This property holds the currentProcess for this instance.
     * @var WebWizardToolsProcess = null
     */
    private $currentProcess;


    /**
     * Builds the WebWizardToolsWebWizard instance.
     */
    public function __construct()
    {
        $this->optionList = null;
        $this->processes = [];
        $this->renderer = null;
        $this->context = [];
        $this->triggerExtraParams = [];
        $this->processKeyName = "process";
        $this->processFilter = function ($pName) {
            return true;
        };
        $this->onProcessSuccessMessage = null;
        $this->currentProcess = null;
    }


    /**
     * Displays the web wizard gui.
     */
    public function render()
    {
        $this->renderer->render($this);
    }


//    /**
//     * Executes the process which id is given.
//     *
//     * @param string $processId
//     */
//    public function execute(string $processId)
//    {
//        if (array_key_exists($processId, $this->processes)) {
//            $this->processes[$processId]->execute();
//        } else {
//            $this->error("Process with id \"$processId\" was not defined.");
//        }
//    }


    /**
     * Prepares all processes, and executes the called one if any.
     *
     */
    public function run()
    {
        $this->currentProcess = null;

        /**
         * Basically the idea is to let processes set the default values for controls.
         * Those values might be overridden by the process when we call the execute method (in the next block).
         * And so when the rendering occurs, we will be able to display either the default value, or the overridden value.
         *
         * This assumes that the run method is called before the render method.
         */
        foreach ($this->processes as $process) {
            $process->prepare($this);
        }


        if (array_key_exists($this->processKeyName, $_POST)) {
            $processName = $_POST[$this->processKeyName];

            if (array_key_exists($processName, $this->processes)) {
                $process = $this->processes[$processName];
                $process->setParams($_POST);
                $options = []; // ?
                $process->execute($options);
                $this->currentProcess = $process;
                return $this->processes[$processName];
            } else {
                $this->error("Undefined process $processName.");
            }


        }
        return null;
    }


    /**
     * Returns the currently executed process if any, or null otherwise.
     *
     * @return WebWizardToolsProcess|null
     */
    public function getExecutedProcess(): ?WebWizardToolsProcess
    {
        return $this->currentProcess;
    }


    /**
     * Returns the processes of this instance.
     *
     * @return WebWizardToolsProcess[]
     */
    public function getProcesses(): array
    {
        foreach ($this->processes as $process) {
            $res = call_user_func($this->processFilter, $process->getName());
            if (is_string($res)) {
                $process->setDisabledReason($res);
            }
        }
        return $this->processes;
    }


//    /**
//     * Returns whether the option (which id is given) is checked.
//     *
//     * @param string $optionId
//     * @return bool
//     */
//    protected function hasOption(string $optionId): bool
//    {
//        $options = $this->optionList->getOptions();
//        if (array_key_exists($optionId, $options)) {
//            return $options[$optionId]->isChecked();
//        }
//        return false;
//    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the triggerExtraParams.
     *
     * @param array $triggerExtraParams
     */
    public function setTriggerExtraParams(array $triggerExtraParams)
    {
        $this->triggerExtraParams = $triggerExtraParams;
    }

    /**
     * Returns the triggerExtraParams of this instance.
     *
     * @return array
     */
    public function getTriggerExtraParams(): array
    {
        return $this->triggerExtraParams;
    }


    /**
     * Returns the optionList of this instance.
     *
     * @return WebWizardToolsOptionList
     */
    public function getOptionList(): WebWizardToolsOptionList
    {
        return $this->optionList;
    }

    /**
     * Sets the optionList.
     *
     * @param WebWizardToolsOptionList $optionList
     */
    public function setOptionList(WebWizardToolsOptionList $optionList)
    {
        $this->optionList = $optionList;
    }


    /**
     * Sets a process.
     *
     *
     * @param WebWizardToolsProcess $process
     * @return $this
     */
    public function setProcess(WebWizardToolsProcess $process): self
    {
        $this->processes[$process->getName()] = $process->setWebWizard($this);
        return $this;
    }


    /**
     * Sets the renderer.
     *
     * @param WebWizardToolsWebWizardRendererInterface $renderer
     */
    public function setRenderer(WebWizardToolsWebWizardRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Sets the context.
     *
     * @param array $context
     */
    public function setContext(array $context)
    {
        $this->context = $context;
    }

    /**
     * Returns the context of this instance.
     *
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }


    /**
     * Returns the processKeyName of this instance.
     *
     * @return string
     */
    public function getProcessKeyName(): string
    {
        return $this->processKeyName;
    }

    /**
     * Sets the processKeyName.
     *
     * @param string $processKeyName
     */
    public function setProcessKeyName(string $processKeyName)
    {
        $this->processKeyName = $processKeyName;
    }

    /**
     * Sets the processFilter.
     *
     * @param callable $processFilter
     */
    public function setProcessFilter(callable $processFilter)
    {
        $this->processFilter = $processFilter;
    }

    /**
     * Returns the onProcessSuccessMessage of this instance.
     *
     * @return string|null
     */
    public function getOnProcessSuccessMessage(): ?string
    {
        return $this->onProcessSuccessMessage;
    }

    /**
     * Sets the onProcessSuccessMessage.
     *
     * @param string|null $onProcessSuccessMessage
     */
    public function setOnProcessSuccessMessage(?string $onProcessSuccessMessage)
    {
        $this->onProcessSuccessMessage = $onProcessSuccessMessage;
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