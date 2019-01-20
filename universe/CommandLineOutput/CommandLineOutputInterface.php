<?php


namespace CommandLineOutput;


interface CommandLineOutputInterface
{


    public function output(string $message, bool $newLine = true);
}