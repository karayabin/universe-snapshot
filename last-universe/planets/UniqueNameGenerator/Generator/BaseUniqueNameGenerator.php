<?php

namespace UniqueNameGenerator\Generator;

/*
 * LingTalfi 2016-01-07
 */
abstract class BaseUniqueNameGenerator implements UniqueNameGeneratorInterface
{


    public function generate($name)
    {
        $n = 1;
        while (true === $this->exist($name)) {
            $name = $this->generateName($name, $n);
            $n++;
        }
        return $name;
    }

    public static function create()
    {
        return new static();
    }

    protected function exist($name)
    {
        return false;
    }

    /**
     * @param $name
     * @param $n , an auto-incremented number, starting at 1
     * @return string
     */
    abstract protected function generateName($name, $n);
}
