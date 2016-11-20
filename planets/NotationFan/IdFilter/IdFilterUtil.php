<?php

namespace NotationFan\IdFilter;

/*
 * LingTalfi 2015-10-05
 */
class IdFilterUtil
{

    public $sep;
    public $rangeSep;

    public function __construct()
    {
        $this->sep = ',';
        $this->rangeSep = '-';
    }


    public function getSelectedIds($string)
    {
        $ret = [];
        if (is_string($string)) {
            $parts = explode($this->sep, $string);
            foreach ($parts as $p) {
                $parts2 = explode($this->rangeSep, $p, 2);
                if (2 === count($parts2)) {
                    $min = (int)min($parts2);
                    $max = (int)max($parts2);
                    for ($i = $min; $i <= $max; $i++) {
                        $ret[] = $i;
                    }
                }
                else {
                    $ret[] = (int)$p;
                }
            }
        }
        else {
            throw new \InvalidArgumentException("string argument must be a string, %s given", gettype($string));
        }
        $ret = array_unique($ret);
        return $ret;
    }

}
