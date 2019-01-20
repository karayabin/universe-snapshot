<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\CrawlerQuery\Syntax;


/**
 * ElementSelector
 * @author Lingtalfi
 * 2015-06-24
 *
 */
class ElementSelector
{

    private $atomicSelectors;

    public function __construct()
    {
        $this->atomicSelectors = [];
    }

    public static function create()
    {
        return new static();
    }


    /**
     * @param AtomicSelector $s
     * @param null $operator , one of:
     *                  - descendant            (space)
     *                  - child                 (greaterThan)
     *                  - nextFollowingSibling  (plus)
     *                  - followingSibling      (tilde)
     *
     * @return $this
     */
    public function addAtomicSelector(AtomicSelector $s, $operator = null)
    {
        $this->atomicSelectors[] = [$s, $operator];
        return $this;
    }

    /**
     * @return array
     */
    public function getAtomicSelectors()
    {
        return $this->atomicSelectors;
    }

    
    
}
