<?php


namespace Ling\Output;


class Output implements OutputInterface
{
    public function write($msg, $lbr = true)
    {
        echo $msg;
        if (true === $lbr) {
            echo PHP_EOL;
        }
    }

}