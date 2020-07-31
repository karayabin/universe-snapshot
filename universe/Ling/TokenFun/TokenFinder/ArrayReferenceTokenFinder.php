<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The ArrayReferenceTokenFinder class.
 *
 * If finds an array reference, like for instance:
 *
 *          - $a["doo"]
 *          - $a[5]
 *          - $a[5 + 3]
 *          - $a["doo" . "pp"]
 *          - $a[$po()]
 *          - $a[$po[doo()]]
 *
 */
class ArrayReferenceTokenFinder extends RecursiveTokenFinder
{


    /**
     * @implementation
     */
    public function find(array $tokens)
    {
        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        $start = null;
        while ($tai->valid()) {
            $cur = $tai->current();
            if (null === $start) {
                if (TokenTool::match(T_VARIABLE, $cur)) {
                    $start = $tai->key();
                }
            }
            else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                if (TokenTool::match('[', $tai->current())) {
                    if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                        $found = true;
                        $ret[] = [$start, $tai->key()];
                        $this->onMatchFound($start, $tai);
                        $start = null;
                    }
                }
                if (false === $found) {
                    $start = null;
                }
            }
            $tai->next();
        }

        return $ret;
    }
}
