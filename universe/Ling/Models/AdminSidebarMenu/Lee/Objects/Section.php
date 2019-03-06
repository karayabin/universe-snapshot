<?php


namespace Ling\Models\AdminSidebarMenu\Lee\Objects;


class Section
{

    /**
     * @var Item[]
     */
    private $items;
    private $name;
    private $label;
    private $active;

    public function __construct()
    {
        $this->items = [];
        /**
         * By default,  an item.active is null.
         * If the user sets its value to a boolean, then the boolean is returned.
         * If the user doesn't set its value, then it is automatically computed:
         *      - it will be false if none of the children has active=true
         *      - it will be true if at least one of the children has active=true
         */
        $this->active = null;
    }

    public static function create()
    {
        return new static();
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    public function addItem(Item $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * This might remove more than one item,
     * because in this implementation, it's possible
     * to have multiple items with the same name.
     */
    public function removeItem($name)
    {
        foreach ($this->items as $k => $item) {
            if ($name === $item->getName()) {
                unset($this->items[$k]);
            }
        }
        return $this;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        if (null === $this->active) {
            foreach ($this->items as $item) {
                if (true === $item->isActive()) {
                    return true;
                }
            }
            return false;
        }
        return $this->active;
    }


    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }


    public function toArray()
    {

        $items = [];
        foreach ($this->items as $item) {
            $items[] = $item->toArray();
        }

        return [
            'name' => $this->name,
            'label' => $this->label,
            'items' => $items,
            'active' => $this->getActive(),
        ];
    }
}