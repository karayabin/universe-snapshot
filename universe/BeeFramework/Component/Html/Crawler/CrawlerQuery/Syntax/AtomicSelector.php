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
 * AtomicSelector
 * @author Lingtalfi
 * 2015-06-24
 *
 */
class AtomicSelector
{

    private $name;
    private $attributesConds;
    private $contains;
    private $cssClasses;
    /**
     * @var array of:
     *      0: string, type of position amongst:
     *                  - firstChild
     *                  - lastChild
     *                  - nthChild
     *                  - nthLastChild
     * 
     *                  - firstOfType
     *                  - lastOfType
     *                  - nthOfType
     *                  - nthLastOfType
     *      1: the nth number if any
     */
    private $positionFilter;
    /**
     * @var array of:
     *      0: string, type of position amongst:
     *                  - first
     *                  - last
     *                  - nth
     *      1: the nth number if any
     */
    private $collectionPositionFilter;
    private $notPhrases;

    // some cache variable
    private $hasPredicate;

    public function __construct()
    {
        $this->name = '*';
        $this->attributesConds = [];
        $this->cssClasses = [];
        $this->contains = [];
        $this->notPhrases = [];
        $this->hasPredicate = false;
    }

    public static function create()
    {
        return new static();
    }

    public function getAttributesConditions()
    {
        return $this->attributesConds;
    }

    /**
     * @param string $name , the attribute on which to put a condition on (class, href, ...)
     * @param string $operator , one of:
     *          - exists (default)
     *          - equals
     *          - notEquals
     *          - contains
     *          - startsWith
     *          - endsWith
     */
    public function setAttributeCondition($name, $operator = 'exists', $value = null)
    {
        $this->attributesConds[] = [$name, $operator, $value];
        $this->hasPredicate = true;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    public function addCssClass($c)
    {
        $this->cssClasses[] = $c;
        $this->hasPredicate = true;
        return $this;
    }

    public function getCssClasses()
    {
        return $this->cssClasses;
    }


    public function addContainsFilter($text, $recursive = false)
    {
        $this->contains[] = [$text, $recursive];
        $this->hasPredicate = true;
        return $this;
    }


    public function getContainsFilter()
    {
        return $this->contains;
    }

    public function getPositionFilter()
    {
        return $this->positionFilter;
    }

    public function setPositionFilter($type, $nth = null)
    {
        $this->positionFilter = [$type, $nth];
        $this->hasPredicate = true;
        return $this;
    }

    public function getCollectionPositionFilter()
    {
        return $this->collectionPositionFilter;
    }

    public function setCollectionPositionFilter($type, $nth = null)
    {
        $this->collectionPositionFilter = [$type, $nth];
        return $this;
    }


    /**
     * @return Phrase[]
     */
    public function getNotPhrases()
    {
        return $this->notPhrases;
    }

    public function addNotPhrase(Phrase $notPhrase)
    {
        $this->notPhrases[] = $notPhrase;
        return $this;
    }


    public function hasPredicate()
    {
        return $this->hasPredicate;
    }
}
