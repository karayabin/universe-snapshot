<?php


namespace ApplicationItemManager;



use Output\ProgramOutputInterface;

interface ProgramOutputAwareApplicationItemManagerInterface
{

    public function setOutput(ProgramOutputInterface $output);

    /**
     * @return ProgramOutputInterface
     */
    public function getOutput();


}