<?php


namespace Ling\Light_Kit_Admin\Duplicator;

/**
 * The RowDuplicatorProviderInterface interface.
 */
interface RowDuplicatorProviderInterface
{

    /**
     * Provides the duplicator object for the given table.
     *
     * @param string $table
     * @return RowDuplicatorInterface
     */
    public function getProvider(string $table): RowDuplicatorInterface;
}