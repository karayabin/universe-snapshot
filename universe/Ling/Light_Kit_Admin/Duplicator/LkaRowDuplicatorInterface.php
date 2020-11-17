<?php


namespace Ling\Light_Kit_Admin\Duplicator;

/**
 * The LkaRowDuplicatorInterface interface.
 */
interface LkaRowDuplicatorInterface
{

    /**
     * Duplicate the rows from the given table, which @page(extended rics) are given.
     *
     * Available options are:
     *
     * - deep: bool=false, whether to perform a deep duplication. By default, a simple duplication is performed.
     * - ...add your own options
     *
     *
     *
     * @param string $table
     * @param array $rics
     * @param array $options
     * @return void
     */
    public function duplicate(string $table, array $rics, array $options = []);
}