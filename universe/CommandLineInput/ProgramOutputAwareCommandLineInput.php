<?php


namespace CommandLineInput;


use Output\ProgramOutputAwareInterface;
use Output\ProgramOutputInterface;

class ProgramOutputAwareCommandLineInput extends CommandLineInput implements ProgramOutputAwareInterface
{

    /**
     * @var ProgramOutputInterface
     */
    protected $output;


    /**
     * @return ProgramOutputAwareCommandLineInput
     */
    public function setProgramOutput(ProgramOutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }

    protected function writeError($msg)
    {
        $this->output->error($msg);
    }


}