<?php


namespace HybridList\SqlRequest;


use HybridList\Exception\HybridListException;
use SqlQuery\SqlQuery;

class SqlRequest extends SqlQuery implements SqlRequestInterface
{
    protected function error($msg)
    {
        throw new HybridListException($msg);
    }
}