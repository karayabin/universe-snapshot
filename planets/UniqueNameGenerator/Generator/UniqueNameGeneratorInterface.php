<?php

namespace UniqueNameGenerator\Generator;

/*
 * LingTalfi 2016-01-07
 */
interface UniqueNameGeneratorInterface
{

    /**
     * @param $name
     * @return string, a unique name
     */
    public function generate($name);
}
