<?php


namespace Output;


/**
 *
 * This output is made for a cli program.
 *
 *
 *
 * Foreground
 * ----------------
 * black: 0;30
 * blue: 0;34
 * green: 0;32
 * cyan: 0;36    (light blue)
 * red: 0;31
 * purple: 0;35
 * brown: 0;33
 * yellow: 1;33
 * light gray: 0;37
 * white: 1;37
 *
 *
 * dark gray: 1;30
 * light blue: 1;34
 * light green: 1;32
 * light cyan: 1;36
 * light red: 1;31
 * light purple: 1;35
 * light gray: 0;37
 *
 *
 * Background
 * ----------------
 * black: 40
 * red: 41
 * green: 42
 * yellow: 43
 * blue: 44
 * magenta: 45
 * cyan: 46
 * light gray: 47
 *
 */
class ProgramOutput extends Output implements ProgramOutputInterface
{

    private $dampened;

    public function __construct()
    {
        $this->dampened = [];
    }

    public static function create()
    {
        return new static();
    }

    public function success($msg, $lbr = true)
    {
        $this->writeMessage('success', $msg, "0;32", $lbr);
    }

    public function error($msg, $lbr = true)
    {
        $this->writeMessage('error', $msg, "0;31", $lbr);
    }

    public function warn($msg, $lbr = true)
    {
        $this->writeMessage('warn', $msg, "1;33", $lbr);
    }

    public function info($msg, $lbr = true)
    {
        $this->writeMessage('info', $msg, "0;34", $lbr);
    }

    public function notice($msg, $lbr = true)
    {
        $this->writeMessage('notice', $msg, "0;30", $lbr);
    }

    public function debug($msg, $lbr = true)
    {
        $this->writeMessage('debug', $msg, "0;33", $lbr);
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    public function setDampened(array $dampened)
    {
        $this->dampened = $dampened;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function writeMessage($type, $msg, $colorCode, $lbr = true)
    {
        // is dampened?
        if (in_array($type, $this->dampened, true)) {
            return;
        }
        $msg = "\e[" . $colorCode . "m$msg\e[0m";
        $this->write($msg, $lbr);
    }

}