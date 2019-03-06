<?php


namespace Ling\HybridList\SqlRequest;


use Ling\HybridList\Exception\HybridListException;
use Ling\SqlQuery\SqlQuery;

class SqlRequest extends SqlQuery implements SqlRequestInterface
{
    protected function error($msg)
    {
        throw new HybridListException($msg);
    }
}