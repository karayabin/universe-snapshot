<?php

namespace ArrayToTable;

/*
 * LingTalfi 2015-10-28
 */
class ArrayToTableUtil
{

    private static $cpt = 1;

    private $caption;

    /**
     * array of id => label
     * The header id will be used as a reference by other mechanisms
     */
    private $headers;

    /**
     * Each body is an ensemble or rows
     */
    private $bodies;
    /**
     * Structure is like a single row of a body
     */
    private $footer;

    public function __construct()
    {
        $this->bodies = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addBody(array $rows)
    {
        $this->bodies[] = $rows;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function setFooter(array $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }


    public function render()
    {

        $s = '';

        $name = (null !== $this->caption) ? $this->caption : 'Table_' . self::$cpt++;

        $s .= $this->renderTopComment($name);
        $s .= $this->renderTopTag();

        if (null !== $this->caption) {
            $s .= $this->renderCaption($this->caption);
        }
        if ($this->headers) {
            $s .= $this->renderHeader($this->headers);
        }
        if ($this->footer) {
            $s .= $this->renderFooter($this->footer);
        }

        foreach ($this->bodies as $rows) {
            $s .= $this->renderBody($rows);
        }

        $s .= $this->renderBottomTag();
        $s .= $this->renderBottomComment($name);
        return $s;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function renderTopTag()
    {
        return '<table>' . PHP_EOL;
    }

    protected function renderCaption($caption)
    {
        return "\t" . '<caption>' . $caption . '</caption>' . PHP_EOL;
    }

    protected function renderHeader(array $headers)
    {
        $s = '';
        $s .= "\t" . '<thead>' . PHP_EOL;
        $s .= "\t\t";
        $s .= '<tr>';
        foreach ($headers as $id => $label) {
            $s .= '<th>' . $label . '</th>';
        }
        $s .= '</tr>' . PHP_EOL;
        $s .= "\t" . '</thead>' . PHP_EOL;
        return $s;
    }

    protected function renderFooter(array $footer)
    {
        $s = '';
        $s .= "\t" . '<tfoot>' . PHP_EOL;
        $s .= "\t\t";
        $s .= $this->renderRow($footer, 'tfoot');
        $s .= "\t" . '</tfoot>' . PHP_EOL;
        return $s;
    }

    protected function renderBody(array $rows)
    {
        $s = '';
        $s .= "\t" . '<tbody>' . PHP_EOL;
        foreach ($rows as $row) {
            $s .= "\t\t";
            $s .= $this->renderRow($row, 'tbody');
        }
        $s .= "\t" . '</tbody>' . PHP_EOL;
        return $s;
    }

    protected function renderBottomTag()
    {
        return '</table>' . PHP_EOL;
    }


    protected function renderRow(array $row, $containerElType)
    {
        $s = '';
        $s .= '<tr>';
        foreach ($row as $v) {
            $s .= '<td>' . $v . '</td>';
        }
        $s .= '</tr>' . PHP_EOL;
        return $s;
    }
    
    protected function renderTopComment($name){
        return '<!-- START - '. $name .' -->'. PHP_EOL;
    }
    
    protected function renderBottomComment($name){
        return '<!-- END - '. $name .' -->' . PHP_EOL;
    }
}
