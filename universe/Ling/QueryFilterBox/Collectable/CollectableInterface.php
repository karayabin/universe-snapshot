<?php


namespace Ling\QueryFilterBox\Collectable;


interface CollectableInterface
{

    /**
     * @param $param , string: a param from the usedPool
     * @param $value , string: the value corresponding to the param
     *                      Note: if the value is originally an array in the uri,
     *                      it is broken down to simple strings by the collector object,
     *                      so that the collectable object only receives a string in the end.
     * @return null|array,
     *              if null, the param is not relevant to this collectible
     *              if array, the param is relevant to this collectible.
     *                  The array:
     *                      - keyLabel: the label representing the param name
     *                      - valueLabel: the label representing the value of the param
     */
    public function collect($param, $value);
}