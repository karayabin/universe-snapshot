<?php

namespace ArrayToTable;

/*
 * LingTalfi 2015-10-28
 */
use Bat\StringTool;

class StylizedArrayToTableUtil extends ArrayToTableUtil
{

    private $tableAttr;
    private $captionAttr;
    private $trAttr;

    public function __construct()
    {
        parent::__construct();
    }

    public function setTableAttr(array $attr)
    {
        $this->tableAttr = $attr;
        return $this;
    }

    public function setCaptionAttr(array $attr)
    {
        $this->captionAttr = $attr;
        return $this;
    }

    /**
     * array:attributes|false  f  ( array:row, string(tbody|tfoot):containerElementType )
     */
    public function setTrAttr(callable $f)
    {
        $this->trAttr = $f;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function renderTopTag()
    {
        return '<table' . ($this->tableAttr ? StringTool::htmlAttributes($this->tableAttr) : '') . '>' . PHP_EOL;
    }


    protected function renderCaption($caption)
    {
        $s = '';
        $s .= "\t" . '<caption' . ($this->captionAttr ? StringTool::htmlAttributes($this->captionAttr) : '') . '>' . $caption . '</caption>' . PHP_EOL;
        return $s;
    }

    protected function renderRow(array $row, $containerElType)
    {
        if (null === $this->trAttr) {
            return parent::renderRow($row, $containerElType);
        }
        $s = '';
        $attr = call_user_func($this->trAttr, $row, $containerElType);
        $sAttr = null;
        if (false === $attr) {
            $sAttr = '';
        }
        elseif (is_array($attr)) {
            $sAttr = StringTool::htmlAttributes($attr);
        }
        if (null !== $sAttr) {
            $s .= '<tr' . $sAttr . '>';
            foreach ($row as $v) {
                $s .= '<td>' . $v . '</td>';
            }
            $s .= '</tr>' . PHP_EOL;
        }
        else {
            $this->oops("The trAttr callback returned a %s, an array was expected", gettype($attr));
        }
        return $s;
    }


    protected function oops($m)
    {
        trigger_error($m, E_USER_WARNING);
    }
}
