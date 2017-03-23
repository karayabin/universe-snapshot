<?php


namespace Kamille\Module;


use Kamille\Utils\StepTracker\StepTrackerAwareInterface;
use Kamille\Utils\StepTracker\StepTrackerInterface;

abstract class StepTrackerAwareModule implements ModuleInterface, StepTrackerAwareInterface
{
    /**
     * @var StepTrackerInterface $stepTracker
     */
    protected $stepTracker;

    public function setStepTracker(StepTrackerInterface $stepTracker)
    {
        $this->stepTracker = $stepTracker;
        return $this;
    }

    public function getStepTracker()
    {
        return $this->stepTracker;
    }
}