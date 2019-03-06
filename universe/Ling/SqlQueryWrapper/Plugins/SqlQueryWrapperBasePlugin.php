<?php


namespace Ling\SqlQueryWrapper\Plugins;


use Ling\SqlQuery\SqlQueryInterface;

abstract class SqlQueryWrapperBasePlugin implements SqlQueryPluginInterface
{

    protected $model;
    protected $context;

    public function __construct()
    {
        $this->model = [];
        $this->context = $_GET;
    }


    public static function create()
    {
        return new static();
    }

    public function onQueryReady(SqlQueryInterface $sqlQuery)
    {

    }

    public function prepareQuery(SqlQueryInterface $sqlQuery)
    {

    }

    public function prepareModel(int $nbItems, array $rows)
    {

    }

    public function getModel(): array
    {
        return $this->model;
    }

    public function setContext(array $context)
    {
        $this->context = $context;
        return $this;
    }

}