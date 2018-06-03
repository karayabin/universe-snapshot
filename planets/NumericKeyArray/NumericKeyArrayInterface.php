<?php


namespace NumericKeyArray;


/**
 * This object helps updating a numeric key array.
 *
 * What's a numeric key array?
 * -----------------
 * Something like this:
 *
 *
 * - 0:
 *      - 0: $id
 *      - 1: $label
 *      - 2: $value
 *      - ?3: $type
 * - 1:
 *      - 0: $id
 *      - 1: $label
 *      - 2: $value
 *      - ?3: $type
 * - ...
 *
 *
 * So it's an array of numeric key => row, and row is a array with numeric keys.
 * Each row has the same structure, and in particular, one of the entry of the row is identifying the whole row.
 * In this case, the identifying entry is $id, identified by index=0.
 *
 * The index of the identifying row is actually used by this object to allow operations such as insertAfter...
 *
 *
 */
interface NumericKeyArrayInterface
{

    /**
     * @return array, the modified array
     */
    public function getArray(): array;


    /**
     * @param string $id
     * @return array|false, the item identified by id, or false if not found
     */
    public function getItem(string $id);


    /**
     * @param string $id
     * @return bool, whether or not the item has been removed.
     * Note that if the return is false, it just means that the "id" entry wasn't found (but probably it never existed)
     */
    public function remove(string $id);

    /**
     * @param array $item
     * @param string $id
     * @return bool, whether or not the item was inserted (false is returned if the "id" entry was not found)
     */
    public function insertAfter(array $item, string $id);

    /**
     * @param array $item
     * @param string $id
     * @return bool, whether or not the item was inserted (false is returned if the "id" entry was not found)
     */
    public function insertBefore(array $item, string $id);

    public function append(array $item);

    public function prepend(array $item);


}