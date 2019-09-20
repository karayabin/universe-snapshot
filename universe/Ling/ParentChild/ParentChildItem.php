<?php


namespace Ling\ParentChild;


/**
 * The ParentChildItem class.
 */
class ParentChildItem
{

    /**
     * This property holds the name for this instance.
     * @var string
     */
    protected $name;

    /**
     * This property holds the children for this instance.
     * @var ParentChildItem[]
     */
    protected $children;


    /**
     * Builds the ParentChildItem instance.
     */
    public function __construct()
    {
        $this->name = "";
        $this->children = [];
    }

    /**
     * Sets the name.
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the name of this instance.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * Adds a child to this instance.
     *
     * @param ParentChildItem $item
     */
    public function addChild(ParentChildItem $item)
    {
        $this->children[] = $item;
    }

    /**
     * Returns the children of this instance.
     *
     * @return ParentChildItem[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }
}