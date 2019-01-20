<?php


namespace Output;


interface OutputInterface
{
    public function write($msg, $lbr = true);
}