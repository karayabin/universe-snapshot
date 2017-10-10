<?php


namespace Dir2Symlink;


use Output\ProgramOutputAwareInterface;
use Output\ProgramOutputInterface;


class ProgramOutputAwareDir2Symlink extends Dir2Symlink implements ProgramOutputAwareInterface
{

    private $output;

    public function setProgramOutput(ProgramOutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }


    protected function writeError($type, $msg)
    {
        $this->output->$type($msg);
    }
}