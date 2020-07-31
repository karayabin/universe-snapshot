<?php


namespace Ling\TokenFun\TokenArrayIterator;


/**
 * The TokenArrayIteratorInterface interface
 *
 */
interface TokenArrayIteratorInterface
{
    /**
     * Returns the current key, or false if the cursor is out of bounds.
     * @return mixed|false
     */
    public function key();

    /**
     * Returns the current value, or false if the cursor is out of bounds.
     * @return mixed|false
     */
    public function current();

    /**
     * Moves the internal pointer forward by one step.
     *
     * Returns whether the new pointer position references an existing element.
     * If false, it means that there is no element (i.e. out of bounds).
     *
     *
     * @return bool
     */
    public function next();


    /**
     * Moves the internal pointer backward by one step.
     *
     * Returns whether the new pointer position references an existing element.
     * If false, it means that there is no element (i.e. out of bounds).
     *
     * @return bool
     *
     */
    public function prev();

    /**
     * Returns whether or not the current position is valid.
     * @return bool
     */
    public function valid();


    /**
     * Seeks to index, and returns whether the method has succeeded in positioning the cursor at the given index.
     *
     * If index is not found, does not move the cursor, and returns false.
     *
     * @param $index
     * @return bool
     */
    public function seek($index);

    /**
     * Returns the inner array.
     *
     * @return array
     */
    public function getArray();
}
