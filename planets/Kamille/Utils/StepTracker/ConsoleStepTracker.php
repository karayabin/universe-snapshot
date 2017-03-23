<?php


namespace Kamille\Utils\StepTracker;


class ConsoleStepTracker extends StepTracker
{
    public function __construct()
    {
        parent::__construct();

        $this->setOnStepStartCallback(function ($stepId) {
            $label = $this->steps[$stepId];
            $info = $this->getStepNumberInfo($stepId);


            $label = "step $info: $label ...";
            $this->printToOutput($label, false);
        });

        $this->setOnStepStopCallback(function ($stepId, $state) {


            if ('done' === $state) {
                $state = "\033[0;32m$state" . "\033[0m";
            } else {
                $state = "\033[0;31m$state" . "\033[0m";
            }

            $this->printToOutput(" " . $state, true);
        });
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    private function printToOutput($msg, $newLine = false)
    {
        echo $msg;
        if (true === $newLine) {
            echo PHP_EOL;
        }
    }


    private function getStepNumberInfo($stepId)
    {
        $i = 1;
        $found = false;
        foreach ($this->steps as $id => $label) {
            if ($id === $stepId) {
                $found = true;
                break;
            }
            $i++;
        }

        if (true === $found) {
            $n = count($this->steps);
            return $i . "/" . $n;
        } else {
            throw new \RuntimeException("step not found: $stepId");
        }
    }
}


