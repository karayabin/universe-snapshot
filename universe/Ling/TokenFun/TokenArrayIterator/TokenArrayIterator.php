<?php


namespace Ling\TokenFun\TokenArrayIterator;


use Ling\TokenFun\Tool\TokenTool;


/**
 * The TokenArrayIterator class.
 *
 */
class TokenArrayIterator implements TokenArrayIteratorInterface
{

    /**
     * This property holds the array for this instance.
     * @var array
     */
    protected $array;


    /**
     * Builds the TokenArrayIterator instance.
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS TokenArrayIteratorInterface
    //------------------------------------------------------------------------------/
    /**
     * @implementation
     */
    public function key()
    {
        if (null !== $r = key($this->array)) {
            return $r;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function current()
    {
        return current($this->array);
    }

    /**
     * @implementation
     */
    public function next()
    {
        if (false !== next($this->array)) {
            return true;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function prev()
    {
        if (false !== prev($this->array)) {
            return true;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function valid()
    {
        return (null !== key($this->array));
    }


    /**
     * @implementation
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
     * @implementation
     */
    public function getArray()
    {
        return $this->array;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Displays the token explicit names of the tokens parsed by this iterator.
     *
     * If the fromCurrent flag is set to false, all tokens will be dumped,
     * otherwise if it's set to true, only the tokens from the current position to the end
     * will be dumped.
     *
     *
     * @param bool $fromCurrent
     */
    public function dump($fromCurrent = false)
    {
        if (false === $fromCurrent) {
            var_dump(TokenTool::explicitTokenNames($this->getArray()));
        } else {
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
