<?php


namespace Output;


/**
 * All methods write messages to the output.
 */
interface ProgramOutputInterface extends OutputInterface
{

    public function success($msg, $lbr = true);

    public function error($msg, $lbr = true);

    public function warn($msg, $lbr = true);

    public function info($msg, $lbr = true);

    public function notice($msg, $lbr = true);

    public function debug($msg, $lbr = true);
}