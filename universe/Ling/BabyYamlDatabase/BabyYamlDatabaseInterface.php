<?php


namespace Ling\BabyYamlDatabase;

use Ling\BabyYamlDatabase\Exception\InconsistentRowException;

/**
 * The BabyYamlDatabaseInterface interface.
 */
interface BabyYamlDatabaseInterface
{

    /**
     * Inserts the given row in the given table,
     * and returns either the last inserted auto-incremented key value
     * if it exists, or null otherwise.
     *
     * The @page(constraints checking) applies.
     *
     *
     * @param string $table
     * @param array $row
     * @return int|null
     * @throws InconsistentRowException
     */
    public function insert(string $table, array $row);


    /**
     * Returns the first item (of the given table) matching the given key.
     * The key is an array of key => value.
     *
     * The item matches only if all of the key entries match a given item.
     *
     * If not item matches, false is returned.
     *
     *
     * @param string $table
     * @param array $key
     * @return array|false
     */
    public function getItemByKey(string $table, array $key);

    /**
     * Returns an array of items (of the given table) matching the given key.
     *
     * The key is an array of key => value.
     * The item matches only if all of the key entries match a given item.
     *
     * @param string $table
     * @param array $key
     * @return array
     */
    public function getItemsByKey(string $table, array $key): array;

    /**
     * Updates the first item matching the given key,
     * and returns whether there was a match.
     *
     * The @page(constraints checking) applies.
     *
     * @param string $table
     * @param array $key
     * @param array $values
     * @return bool
     */
    public function updateItemByKey(string $table, array $key, array $values): bool;

    /**
     * Deletes the first item matching the given key,
     * and returns whether there was a match.
     *
     * @param string $table
     * @param array $key
     * @return bool
     */
    public function deleteItemByKey(string $table, array $key): bool;


}