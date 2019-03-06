<?php


namespace Ling\Output;


interface OutputInterface
{
    public function write($msg, $lbr = true);
}