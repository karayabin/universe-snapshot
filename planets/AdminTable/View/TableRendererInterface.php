<?php


namespace AdminTable\View;

use AdminTable\Table\ListParameters;

interface TableRendererInterface
{
    public function renderTable(ListParameters $p);
}