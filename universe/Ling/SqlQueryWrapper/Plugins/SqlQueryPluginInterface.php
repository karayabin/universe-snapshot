<?php


namespace Ling\SqlQueryWrapper\Plugins;


use Ling\SqlQuery\SqlQueryInterface;

interface SqlQueryPluginInterface
{
    public function onQueryReady(SqlQueryInterface $sqlQuery);

    public function prepareQuery(SqlQueryInterface $sqlQuery);

    public function prepareModel(int $nbItems, array $rows);

    public function getModel(): array;
}