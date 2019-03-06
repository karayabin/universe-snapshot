<?php


namespace Ling\CommandLineOutput;


interface CommandLineOutputInterface
{


    public function output(string $message, bool $newLine = true);
}