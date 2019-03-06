<?php


namespace Ling\ApplicationItemManager;



use Ling\Output\ProgramOutputInterface;

interface ProgramOutputAwareApplicationItemManagerInterface
{

    public function setOutput(ProgramOutputInterface $output);

    /**
     * @return ProgramOutputInterface
     */
    public function getOutput();


}