<?php

namespace Meredith\ListButtonCode;

/**
 * LingTalfi 2015-12-28
 */
class ColvisListButtonCode extends ListButtonCode
{
    public function __construct()
    {
        parent::__construct();
        $this->text = "Columns visibility";
    }

    public function render()
    {
        $escaped = $this->escape($this->text);
        return <<<EEE
meredithButtonsFactory.colvis("$escaped")
EEE;

    }
}