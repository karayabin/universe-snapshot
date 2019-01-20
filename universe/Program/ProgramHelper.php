<?php


namespace Program;


use CommandLineInput\CommandLineInputInterface;
use Output\ProgramOutputInterface;

class ProgramHelper
{


    public static function indent($text)
    {
        $nbSpaces = 4;
        $p = explode(PHP_EOL, $text);
        $sp = str_repeat(" ", $nbSpaces);
        return $sp . implode(PHP_EOL . $sp, $p);
    }


    public static function getParameter($number, $name, CommandLineInputInterface $input, ProgramOutputInterface $output)
    {
        if (null !== ($param = $input->getParameter($number))) {
            return $param;
        }
        if (null !== $name) {
            $msg = "Param $number ($name) not found";
        } else {
            $msg = "Param $number not found";
        }
        $output->error($msg);
        return false;
    }

    public static function highlight($text, $search)
    {
        $ret = $text;
        $positions = [];


        $offset = 0;
        $len = mb_strlen($search);
        while (false !== ($pos = mb_stripos($text, $search, $offset))) {
            $positions[] = $pos;
            $offset = $pos + 1;
        }
        rsort($positions);

        if (count($positions) > 0) {
            foreach ($positions as $pos) {
                $s = "";
                $s .= mb_substr($ret, 0, $pos);
                $s .= "\033[1;37m\033[44m" . mb_substr($text, $pos, $len) . "\033[0m";
//                        $s .= "[" . mb_substr($ret, $pos, $len) . "]";
                $s .= mb_substr($ret, $pos + $len);
                $ret = $s;
            }
        }
        return $ret;
    }

}