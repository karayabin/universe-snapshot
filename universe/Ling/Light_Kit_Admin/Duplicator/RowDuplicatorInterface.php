<?php


namespace Ling\Light_Kit_Admin\Duplicator;

/**
 * The RowDuplicatorInterface interface.
 */
interface RowDuplicatorInterface
{

    /**
     * Duplicate the rows which @page(rics) are given.
     *
     * Available options are:
     *
     * - deep: bool=false, whether to perform a deep duplication. By default, a simple duplication is performed.
     *
     *
     *
     * @param array $rics
     * @param array $options
     * @return mixed
     */
    public function duplicate(array $rics, array $options = []);
}