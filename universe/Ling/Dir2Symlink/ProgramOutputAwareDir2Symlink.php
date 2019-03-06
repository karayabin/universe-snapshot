<?php


namespace Ling\Dir2Symlink;


use Ling\Output\ProgramOutputAwareInterface;
use Ling\Output\ProgramOutputInterface;


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