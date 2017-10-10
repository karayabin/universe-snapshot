<?php


namespace Output;

class WebProgramOutput extends Output implements ProgramOutputInterface
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

    public function write($msg, $lbr = true)
    {
        echo nl2br($msg);
        if (true === $lbr) {
            echo '<br>';
        }
    }

    public function success($msg, $lbr = true)
    {
        $this->writeMessage('success', $msg, "green", $lbr);
    }

    public function error($msg, $lbr = true)
    {
        $this->writeMessage('error', $msg, "red", $lbr);
    }

    public function warn($msg, $lbr = true)
    {
        $this->writeMessage('warn', $msg, "orange", $lbr);
    }

    public function info($msg, $lbr = true)
    {
        $this->writeMessage('info', $msg, "blue", $lbr);
    }

    public function notice($msg, $lbr = true)
    {
        $this->writeMessage('notice', $msg, "black", $lbr);
    }

    public function debug($msg, $lbr = true)
    {
        $this->writeMessage('debug', $msg, "gray", $lbr);
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
        $msg = '<span style="color: ' . $colorCode . '">' . $msg . '</span>';
        $this->write($msg, $lbr);
    }

}