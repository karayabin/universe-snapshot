<?php


namespace Ling\DotMenu;

use Ling\Bat\BDotTool;
use Ling\DotMenu\Exception\DotMenuException;

/**
 * The DotMenu class.
 *
 * This class let you create a menu using @page(bdot notation).
 *
 * An item is an array which must contain at least the following keys:
 *
 * - children: an array of items (to allow nesting recursively)
 * - id: the identifier of the item (to allow targeting with bdot notation)
 *
 * Note: the "children" and "id" names can be changed with the configuration.
 *
 * Also, sibling items should not have the same identifier (otherwise results will be unpredictable).
 *
 *
 *
 *
 */
class DotMenu
{


    /**
     * This property holds the childrenKey for this instance.
     * @var string = children
     */
    protected $childrenKey;


    /**
     * This property holds the idKey for this instance.
     * @var string = id
     */
    protected $idKey;

    /**
     * This property holds the items for this instance.
     * @var array
     */
    protected $items;

    /**
     * This property holds the strictMode for this instance.
     * When the strict mode is activated, an exception is thrown whenever the addItem is called
     * but the parentPath couldn't be found.
     * By default, the strict mode is not enabled, and so we just ignore such calls.
     *
     *
     *
     * @var bool = false
     */
    protected $strictMode;


    /**
     * Builds the DotMenu instance.
     */
    public function __construct()
    {
        $this->childrenKey = "children";
        $this->idKey = "id";
        $this->items = [];
        $this->strictMode = false;
    }


    /**
     * Appends an item to the menu, the parent of this item being the parent identified
     * by the given $parentPath, which is a bdot path.
     *
     * If the parent path is null, the item is appended to the root.
     *
     *
     *
     *
     * @param array $item
     * @param string|null $parentPath
     * @throws DotMenuException
     */
    public function appendItem(array $item, string $parentPath = null)
    {
        if (null === $parentPath) {
            $this->items[$item[$this->idKey]] = $item;
        } else {

            // let's find the real parent path
            $components = BDotTool::getPathComponents($parentPath);
            array_walk($components, function (&$v) {
                $v .= "." . $this->childrenKey;
            });
            $realParentPath = implode('.', $components);





            // now let's append the item
            $parent = BDotTool::getDotValue($realParentPath, $this->items, null);

            if (null !== $parent) {
                $parent[$item[$this->idKey]] = $item;
                BDotTool::setDotValue($realParentPath, $parent, $this->items);
            } else {
                // parentPath not found
                if (true === $this->strictMode) {
                    throw new DotMenuException("Parent path not found: $parentPath ($realParentPath).");
                }
            }
        }
    }


    /**
     * Return the items.
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Sets the items.
     *
     * @param array $items
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            $this->items[$item[$this->idKey]] = $item;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the childrenKey.
     *
     * @param string $childrenKey
     */
    public function setChildrenKey(string $childrenKey)
    {
        $this->childrenKey = $childrenKey;
    }

    /**
     * Sets the idKey.
     *
     * @param string $idKey
     */
    public function setIdKey(string $idKey)
    {
        $this->idKey = $idKey;
    }

    /**
     * Sets the strictMode.
     *
     * @param bool $strictMode
     */
    public function setStrictMode(bool $strictMode)
    {
        $this->strictMode = $strictMode;
    }


}