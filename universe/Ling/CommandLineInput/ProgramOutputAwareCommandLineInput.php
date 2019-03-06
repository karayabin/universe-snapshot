<?php


namespace Ling\CommandLineInput;


use Ling\Output\ProgramOutputAwareInterface;
use Ling\Output\ProgramOutputInterface;

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