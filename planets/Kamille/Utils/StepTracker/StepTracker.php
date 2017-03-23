<?php


namespace Kamille\Utils\StepTracker;


class StepTracker implements StepTrackerInterface
{

    protected $steps;
    protected $onStepStartCb;
    protected $onStepStopCb;


    public function __construct()
    {
        $this->steps = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getList()
    {
        return $this->steps;
    }

    public function startStep($stepId)
    {
        call_user_func($this->onStepStartCb, $stepId);
    }

    public function stopStep($stepId, $state = "done")
    {
        call_user_func($this->onStepStopCb, $stepId, $state);
    }

    public function setSteps(array $steps)
    {
        $this->steps = $steps;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * fn ( stepId )
     */
    public function setOnStepStartCallback(callable $fn)
    {
        $this->onStepStartCb = $fn;
        return $this;
    }

    /**
     * fn ( stepId, state )
     *          state:done|aborted
     */
    public function setOnStepStopCallback(callable $fn)
    {
        $this->onStepStopCb = $fn;
        return $this;
    }
}


