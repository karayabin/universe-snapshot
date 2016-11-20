<?php


namespace TokenFun\TokenArrayIterator;


/**
 * TokenArrayIteratorInterface
 * @author Lingtalfi
 * 2016-01-02
 *
 */
interface TokenArrayIteratorInterface
{

    /**
     * @return mixed|false, the current array key (is the same as index),
     *                  false is returned if the internal pointer is beyond the inner array.
     */
    public function key();

    /**
     * @return mixed|false, the current array value,
     *                  false is returned if the internal pointer is beyond the inner array.
     */
    public function current();

    /**
     * @return bool, moves the internal array pointer forward one place.
     *                  Returns true, or false if there is no more element after the current pointer.
     */
    public function next();


    /**
     * @return bool, moves the internal array pointer backward one place.
     *                  Returns true, or false if there is no more element before the current pointer.
     */
    public function prev();

    /**
     * @return bool, whether or not the current position is valid.
     *              This method can be use to loop through the array entries.
     */
    public function valid();


    /**
     * Seek to index.
     * If index is not found, does not move the cursor, and returns false.
     *
     * @return bool, whether or not the method has succeeded in positioning the cursor at the given index.
     */
    public function seek($index);

    /**
     * @return array, the inner array.
     */
    public function getArray();
}
