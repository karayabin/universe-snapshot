<?php


namespace Ling\Light_Kit_Editor\Storage;

/**
 * The v interface.
 */
interface LightKitEditorStorageInterface
{


    /**
     * Adds a page.
     *
     * The given pageConf is a [kit configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array).
     *
     * @param string $pageName
     * @param array $pageConf
     */
    public function addPage(string $pageName, array $pageConf = []);


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