<?php


namespace Ling\AdminTable\View;

use Ling\AdminTable\Table\ListParameters;

interface TableRendererInterface
{
    public function renderTable(ListParameters $p);
}