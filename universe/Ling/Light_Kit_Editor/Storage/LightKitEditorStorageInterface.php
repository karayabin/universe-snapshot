<?php


namespace Ling\Light_Kit_Editor\Storage;

/**
 * The v interface.
 */
interface LightKitEditorStorageInterface
{


    /**
     * Adds a page, or replaces it if it already exist.
     *
     * The given pageConf is a [kit configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array),
     * without the zones part (i.e. zones must be added separately).
     *
     *
     * Throws an exception if something is wrong.
     *
     * @param string $pageName
     * @param array $pageConf
     * @throws \Exception
     */
    public function addPage(string $pageName, array $pageConf = []);

    /**
     * Adds a block if it doesn't already exist.
     * Throws an exception if something is wrong.
     * See the @page(Light_Kit_Editor conception notes) for more details.
     *
     * @param string $identifier
     * @throws \Exception
     */
    public function addBlock(string $identifier);


    /**
     *
     * Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.
     * If a problem occurs, the errors can be retrieved using the getErrors method.
     *
     *
     * @param string $pageName
     * @return array|false
     */
    public function getPageConf(string $pageName): array|false;

    /**
     * Returns the errors that can occur during the execution of certain methods.
     * @return array
     *
     */
    public function getErrors(): array;
}