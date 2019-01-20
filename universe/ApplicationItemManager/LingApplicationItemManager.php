<?php


namespace ApplicationItemManager;


use Output\ProgramOutputInterface;

class LingApplicationItemManager extends LocalAwareApplicationItemManager implements LocalAwareApplicationItemManagerInterface, ProgramOutputAwareApplicationItemManagerInterface
{
    protected $output;


    public function setOutput(ProgramOutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }

    public function getOutput()
    {
        return $this->output;
    }

    protected function write($msg, $type)
    {
        echo $this->output->$type($msg);
    }



}