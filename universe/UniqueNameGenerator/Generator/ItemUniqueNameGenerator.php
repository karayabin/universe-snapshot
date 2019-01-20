<?php

namespace UniqueNameGenerator\Generator;

/*
 * LingTalfi 2017-02-21
 */
class ItemUniqueNameGenerator extends BaseUniqueNameGenerator
{
    private $namePool;
    private $generateAffixCb;
    private $base;


    public function __construct()
    {
        $this->namePool = [];
    }

    public function generate($name)
    {
        if (null === $this->generateAffixCb) {
            $this->generateAffixCb = function ($n) {
                return '-' . ++$n;
            };
        }
        $this->base = $name;
        return parent::generate($name);
    }


    public function setNamePool($namePool)
    {
        $this->namePool = $namePool;
        return $this;
    }

    protected function generateName($name, $n)
    {
        return $this->base . call_user_func($this->generateAffixCb, $n);
    }

    protected function exist($name)
    {
        return in_array($name, $this->namePool, true);
    }

    public function setGenerateAffixCb(callable $generateAffixCb)
    {
        $this->generateAffixCb = $generateAffixCb;
        return $this;
    }

}
