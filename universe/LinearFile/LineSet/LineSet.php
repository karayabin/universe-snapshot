<?php


namespace LinearFile\LineSet;


class LineSet implements LineSetInterface
{
    private $name;
    private $startLine;
    private $endLine;
    private $content;


    public static function create()
    {
        return new static();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStartLine()
    {
        return $this->startLine;
    }

    public function getEndLine()
    {
        return $this->endLine;
    }

    public function toString()
    {
        return $this->content;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setStartLine($startLine)
    {
        $this->startLine = $startLine;
        return $this;
    }


    public function setEndLine($endLine)
    {
        $this->endLine = $endLine;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}