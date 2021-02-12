<?php


namespace Ling\Light_PluginInstaller\TableScope;


/**
 * The TableScopeAwareInterface interface.
 */
interface TableScopeAwareInterface
{

    /**
     * Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
     *
     * @return array
     * @overrideMe
     */
    public function getTableScope(): array;
}