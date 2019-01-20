<?php


namespace FileCreator;


class FileCreator
{

    private $lines;

    public function __construct()
    {
        $this->lines = [];
    }


    public function line($m, $carriage = true)
    {
        if (true === $carriage) {
            $m .= PHP_EOL;
        }
        $this->lines[] = $m;
        return $this;
    }

    public function block($content)
    {
        $this->lines[] = $content;
        return $this;
    }

    public function space($n)
    {
        $this->lines[] = str_repeat(PHP_EOL, $n);
        return $this;
    }

    public function render()
    {
        return implode('', $this->lines);
    }
}