<?php


namespace ApplicationItemManager;

use ApplicationItemManager\Exception\ApplicationItemManagerException;


/**
 * The notation for an item is the following:
 * - item: itemId | itemName
 * - itemId: repositoryId.itemName | repositoryAlias.itemName
 *
 *
 * Suggestion
 * --------------
 * When an item is imported, it is imported in a given importDirectory.
 * The item is contained in a directory named itemName, so that we can check whether or not an item
 * is imported simply by checking the existence of a directory named /importDirectory/itemName.
 *
 */
interface ApplicationItemManagerInterface
{

    /**
     * Import an item and its dependencies in the import directory.
     * If force is false, will not try to replace already imported items.
     * If force is true, will replace already imported items before importing them.
     *
     */
    public function import($item, $force = false);

    /**
     * Import all items at once.
     *
     * if repoId is specified, it constrains the import to the specified repoId(s).
     * repoId can be a string identifying a specific repository name, or an array of repository names.
     *
     *
     * @return bool, true if everything went right, and false otherwise
     */
    public function importAll($repoId = null, $force = false);

    /**
     * Install an item and its dependencies.
     * If force is false, will not try to re-install already installed items.
     * If force is true, will (re-)install all items, even those already installed.
     *
     */
    public function install($item, $force = false);


    /**
     * Install all items at once.
     *
     * if repoId is specified, it constrains the import to the specified repoId(s).
     * repoId can be a string identifying a specific repository name, or an array of repository names.
     *
     *
     * @return bool, true if everything went right, and false otherwise
     */
    public function installAll($repoId = null, $force = false);

    /**
     * Uninstall an item and its hard dependencies.
     * See documentation for more info on hard dependencies.
     */
    public function uninstall($item);


    /**
     * @return array, of available items for the repository if specified, or for all directories if repo is null.
     *
     * The type of array returned depends on the value of the keys argument:
     * - if keys is null, returns a one dimension array containing the available itemIds of every repository bound
     *          to this instance
     * - if keys is an array, it represents the keys that will be present in every entry of the returned array.
     *          If you specify a key that isn't provided by a repository, the value null will be returned instead.
     *          The deps key is not available (i.e. you cannot get the dependencies as for now with this method).
     *
     *
     *
     * @throws ApplicationItemManagerException if the repoId is not a valid repository
     */
    public function listAvailable($repoId = null, array $keys = null);


    /**
     * @return array, list of imported itemName
     */
    public function listImported();

    /**
     * @return array, list of installed itemName
     */
    public function listInstalled();

    /**
     *
     * Search should be case insensitive, although it can depend on the implementation.
     *
     *
     *
     * - keys: an array of where to search, and also what to return.
     *          If null, will search the item and return a one dimensional array containing only matching items.
     *
     *          If an array, return a multidimensional array (with keys being the itemIds) containing the specified keys.
     *          You need to specify the "item" special key in the array if you want to search in the itemName.
     *
     *          Depending on your list, you might have keys like for instance:
     *              - item
     *              - description
     *              - other things depending on what the list has
     *
     *          If a key is specified and it doesn't exist in the list, it does not return
     *          an error, but simply ignores the key, and actually returns null.
     *
     *
     * - repoId: if not null, constrain the search only to the specified repoId
     *
     */
    public function search($text, array $keys = null, $repoId = null);
}




















