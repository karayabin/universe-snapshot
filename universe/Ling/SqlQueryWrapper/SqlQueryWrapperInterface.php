<?php


namespace Ling\SqlQueryWrapper;


use Ling\SqlQuery\SqlQueryInterface;
use Ling\SqlQueryWrapper\Plugins\SqlQueryPluginInterface;

/**
 * A list is separated between the sqlQuery on the model side, and the list widget on the view side.
 *
 * A plugin has a foot on each side, it's an element that:
 *      - listens to uri params and interacts with the sqlQuery on the model side
 *      - provides a model (i.e. array of properties) for the view side
 *
 * The SqlQuery by default should be such as the rows it returns are not filtered (no pagination, no order, no filters),
 * it basically just focuses on returning the right row structure.
 *
 * The list pagination, order and filters are provided by the plugins.
 *
 */
interface SqlQueryWrapperInterface
{


    //--------------------------------------------
    // MODEL METHODS
    //--------------------------------------------
    /**
     * This method will execute the following 3 steps in order:
     *
     * - call the plugins onQueryReady method, so that plugins can initialize themselves using the original (not modified) sqlQuery
     * - call the plugins prepareQuery method, so that plugins can interact with the sqlQuery before it's executed
     * - execute the sqlQuery, this yields the items, and the number of items
     * - call the plugins prepareModel method, so that plugins can prepare their model,
     *              having the items and numberOfItems in their context
     *
     *
     * @return static
     */
    public function prepare();


    public function getSqlQuery(): SqlQueryInterface;

    /**
     * @return SqlQueryPluginInterface[]
     */
    public function getPlugins(): array;

    /**
     * @param string $name
     * @return false|SqlQueryPluginInterface
     */
    public function getPlugin(string $name);

    public function setPlugin(string $name, SqlQueryPluginInterface $plugin);

    //--------------------------------------------
    // VIEW METHODS
    //--------------------------------------------
    public function getRows();

    /**
     * @return int, you must call the prepare method first before calling this method.
     */
    public function getNumberOfItems();

    public function getModel(string $pluginName);


}