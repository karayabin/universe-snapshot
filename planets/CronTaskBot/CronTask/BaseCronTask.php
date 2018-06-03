<?php


namespace CronTaskBot\CronTask;


use CronTaskBot\Exception\CronTaskBotException;


class BaseCronTask implements CronTaskInterface
{

    protected $label;
    /**
     * @var callable $task , a callable executing the task,
     *          it returns a boolean: whether or not the task was successful.
     *          It takes two arguments passed by reference: array infoMessages and array errorMessages
     *
     *
     *          bool        fn ( array &infoMessages=[], array &errorMessages=[] )
     *
     */
    protected $taskCallback;


    private $successful;
    private $infoMessages;
    private $errorMessages;


    public function __construct()
    {
        $this->label = "";
        $this->taskCallback = null;
        $this->successful = false;
        $this->infoMessages = [];
        $this->errorMessages = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getLabel()
    {
        return $this->label;
    }

    public function execute()
    {
        if (null !== $this->taskCallback) {

            $infoMessages = [];
            $errorMessages = [];


            $this->successful = call_user_func_array($this->taskCallback, [&$infoMessages, &$errorMessages]);
            $this->infoMessages = $infoMessages;
            $this->errorMessages = $errorMessages;
        } else {
            throw new CronTaskBotException("taskCallback not set");
        }
    }

    //--------------------------------------------
    // AFTER EXECUTION ONLY
    //--------------------------------------------
    public function isSuccessful()
    {
        return $this->successful;
    }

    /**
     * @return array of info level messages
     */
    public function getInfoMessages()
    {
        return $this->infoMessages;
    }

    /**
     * @return array of error level messages
     */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }



    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    public function setTaskCallback(callable $taskCallback)
    {
        $this->taskCallback = $taskCallback;
        return $this;
    }
}