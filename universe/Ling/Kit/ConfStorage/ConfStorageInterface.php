<?php


namespace Ling\Kit\ConfStorage;


/**
 * The ConfStorageInterface interface.
 */
interface ConfStorageInterface
{

    /**
     * Returns the page conf array for the given $pageName, or false if a problem occurs.
     * If a problem occurs, the errors can be retrieved using the getErrors method.
     *
     * The returned array is the @page(page configuration array).
     *
     *
     * @param string $pageName
     * @return array|false
     */
    public function getPageConf(string $pageName): array|false;


    /**
     * Returns the errors that occurred during the last method call.
     *
     * @return array
     */
    public function getErrors(): array;
}