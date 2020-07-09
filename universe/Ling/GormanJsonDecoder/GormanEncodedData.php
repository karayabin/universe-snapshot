<?php


namespace Ling\GormanJsonDecoder;


/**
 * The GormanEncodedData class.
 */
class GormanEncodedData
{

    /**
     * The original php array.
     * @var array
     */
    protected $arr;

    /**
     * The names of the keys to convert to js callbacks.
     * @var array
     */
    protected $callbackKeys;


    /**
     * Builds the GormanEncodedData instance.
     */
    public function __construct()
    {
        $this->arr = [];
        $this->callbackKeys = [];
    }

    /**
     * Sets the arr.
     *
     * @param array $arr
     */
    public function setPhpArray(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * Sets the callbackKeys.
     *
     * @param array $callbackKeys
     */
    public function setCallbackKeys(array $callbackKeys)
    {
        $this->callbackKeys = $callbackKeys;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the php array corresponding to this instance.
     * @return array
     */
    public function toPhpArray(): array
    {
        return $this->arr;
    }


    /**
     * Returns the js code representing this instance.
     * See the @page(GormanJsonDecoder conception notes) for more details.
     *
     *
     * @return string
     */
    public function toJsCode()
    {
        $ck = json_encode($this->callbackKeys);
        $s = '_gorman_encoded_data_ = ' . json_encode($this->arr) . ';' . PHP_EOL;
        $s .= <<<EEE
        // gorman decoding
        let callbackKeys = $ck;
        for(let key of callbackKeys){
            if(_gorman_encoded_data_.hasOwnProperty(key)){
                let callback = new Function('return ' + _gorman_encoded_data_[key] + ';');
                _gorman_encoded_data_[key] = callback();
            }
        }
EEE;
        $s .= PHP_EOL;


        return $s;
    }
}