<?php

namespace PermsHiker\Filter;

/*
 * LingTalfi 2016-06-22
 */
interface PermsHikerFilterInterface
{
    /**
     * @param string $s, the current (old) lines to write to the perms map file 
     * @return string, the modified (new) lines to write to the perms map file
     */
    public function filter($s);
}
