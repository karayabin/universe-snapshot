<?php


namespace TokenFun\TokenArrayIterator;


use TokenFun\Tool\TokenTool;



/**
 * TokenArrayIterator
 * @author Lingtalfi
 * 2016-01-02
 *
 */
class TokenArrayIterator implements TokenArrayIteratorInterface
{

    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS TokenArrayIteratorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return mixed|false, the current array key,
     *                  false is returned if the internal pointer is beyond the inner array.
     */
    public function key()
    {
        if (null !== $r = key($this->array)) {
            return $r;
        }
        return false;
    }

    /**
     * @return mixed|false, the current array value,
     *                  false is returned if the internal pointer is beyond the inner array.
     */
    public function current()
    {
        return current($this->array);
    }

    /**
     * @return bool, moves the internal array pointer forward one place.
     *                  Returns true, or false if there is no more element after the current pointer.
     */
    public function next()
    {
        if (false !== next($this->array)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool, moves the internal array pointer backward one place.
     *                  Returns true, or false if there is no more element before the current pointer.
     */
    public function prev()
    {
        if (false !== prev($this->array)) {
            return true;
        }
        return false;
    }


    public function valid()
    {
        return (null !== key($this->array));
    }


    /**
     * Seek to index.
     * If index is not found, does not move the cursor, and returns false.
     *
     * @return bool, whether or not the method has succeeded in positioning the cursor at the given index.
     */
    public function seek($index)
    {
        if (array_key_exists($index, $this->array)) {
            reset($this->array);
            while ($index !== key($this->array)) {
                if (false === next($this->array)) {
                    break;
                }
            }
        }
        return false;
    }

    /**
     * @return array, the inner array.
     */
    public function getArray()
    {
        return $this->array;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function dump($fromCurrent = false)
    {
        if (false === $fromCurrent) {
            var_dump(TokenTool::explicitTokenNames($this->getArray()));
        }
        else {
            $debug = $this->getArray();
            $key = $this->key();
            if (false !== $key) {
                if (false !== $offset = array_search($key, array_keys($debug))) {
                    $debug = array_slice($debug, $offset);
                    var_dump(TokenTool::explicitTokenNames($debug));
                }

            }
        }
    }

}
