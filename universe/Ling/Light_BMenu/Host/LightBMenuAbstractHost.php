<?php


namespace Ling\Light_BMenu\Host;


use Ling\Light_BMenu\Menu\LightBMenu;

/**
 * The LightBMenuAbstractHost class.
 */
abstract class LightBMenuAbstractHost implements LightBMenuHostInterface
{

    /**
     * This property holds the menuStructureId for this instance.
     * @var string
     */
    protected $menuStructureId;

    /**
     * This property holds the menuType for this instance.
     * @var string
     */
    protected $menuType;

    /**
     * This property holds the defaultItemsParentPath for this instance.
     * Where to inject the default items.
     * Null means at the root of the menu.
     * @page(Bdot notation) can be used.
     *
     *
     * @var string|null=null
     */
    protected $defaultItemsParentPath;


    /**
     * Builds the LightBMenuAbstractHost instance.
     */
    public function __construct()
    {
        $this->menuStructureId = "";
        $this->menuType = "";
        $this->defaultItemsParentPath = null;
    }


    /**
     * @implementation
     */
    public function getMenuStructureId(): string
    {
        return $this->menuStructureId;
    }

    /**
     * @implementation
     */
    public function injectDefaultItems(array $items, LightBMenu $menu)
    {
        foreach ($items as $item) {
            $menu->appendItem($item, $this->defaultItemsParentPath);
        }
    }

    /**
     * @implementation
     */
    public function onMenuCompiled(array &$menu)
    {

    }

    /**
     * @implementation
     */
    public function setMenuType(string $menuType)
    {
        $this->menuType = $menuType;
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Sets the menuStructureId.
     *
     * @param string $menuStructureId
     */
    public function setMenuStructureId(string $menuStructureId)
    {
        $this->menuStructureId = $menuStructureId;
    }

    /**
     * Sets the defaultItemsParentPath.
     *
     * @param string|null $defaultItemsParentPath
     */
    public function setDefaultItemsParentPath(?string $defaultItemsParentPath)
    {
        $this->defaultItemsParentPath = $defaultItemsParentPath;
    }


}