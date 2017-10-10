<?php


namespace Models\AdminSidebarMenu\Lee;


use Models\AdminSidebarMenu\AdminSidebarMenuModel;
use Models\AdminSidebarMenu\Exception\AdminSidebarMenuException;
use Models\AdminSidebarMenu\Lee\Objects\Section;

/**
 * Implementation recommended for small menus (10-30 items like the user account menu of an e-commerce
 * for instance).
 *
 *
 * HOW TO
 * =========
 * $model = LeeAdminSidebarMenuModel::create()
 * ->addSection(Section::create()->setName("section1")->setLabel("Section 1")
 * ->addItem(Item::create()->setName("item1")->setLabel("Item 1")->setLink("#"))
 * ->addItem(Item::create()->setName("item2")->setLabel("Item 2")->setLink("#")
 * ->addItem(Item::create()->setName("subitem1")->setLabel("subItem 1")->setLink("#"))
 * )
 * )
 * ->addSection(Section::create()->setName("section-fruit")->setLabel("Section Fruit")
 * ->addItem(Item::create()->setName("item-apple")->setLabel("Item Apple")->setLink("#"))
 * ->addItem(Item::create()->setName("item-banana")->setLabel("Item Banana")->setLink("#"))
 * );
 *
 *
 * a($model->getArray());
 * $model->getSection('section-fruit')->removeItem('item-apple');
 * a($model->getArray());
 *
 *
 * az("ok");
 *
 *
 */
class LeeAdminSidebarMenuModel extends AdminSidebarMenuModel
{

    /**
     * @var Section[]
     */
    private $sections;


    public function __construct()
    {
        parent::__construct();
        $this->sections = [];
    }


    public function addSection(Section $section)
    {
        $this->sections[] = $section;
        return $this;
    }

    /**
     * This might remove more than one section,
     * because in this implementation, it's possible
     * to have multiple sections with the same name.
     */
    public function removeSection($name)
    {
        foreach ($this->sections as $k => $section) {
            if ($name === $section->getName()) {
                unset($this->sections[$k]);
            }
        }
        return $this;
    }

    /**
     *
     * @param $default :
     *                  What to do if the section with the given name doesn't exist.
     *                  if false, an exception is thrown if the section doesn't exist.
     *                  Otherwise, the value of $default is returned if the section doesn't exist.
     *
     *
     * @return Section|mixed
     * @throws AdminSidebarMenuException
     */
    public function getSection($name, $default = false)
    {
        foreach ($this->sections as $section) {
            if ($name === $section->getName()) {
                return $section;
            }
        }
        if (false === $default) {
            throw new AdminSidebarMenuException("Section not found: $name");
        }
        return $default;
    }

    public function getArray()
    {
        $arr = [];
        foreach ($this->sections as $section) {
            $arr[] = $section->toArray();
        }
        return $arr;
    }


}