<?php


namespace Ling\StepFormBuilder;


class PrototypeStepFormBuilder extends StepFormBuilder
{

    public function debug()
    {
        a($_POST);
        a($this->getPool()->getPool());
    }


    protected function onStepsCompletedAfter(array $allData) // override me
    {
        a("all steps have been successfully completed");
        a($allData);
    }
}