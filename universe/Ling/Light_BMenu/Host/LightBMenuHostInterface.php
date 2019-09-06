<?php


namespace Ling\Light_BMenu\Host;


use Ling\Light_BMenu\Menu\LightBMenu;

/**
 * The LightBMenuHostInterface interface.
 */
interface LightBMenuHostInterface
{

    /**
     * Returns the menu structure id for this host.
     * See the @page(conception notes) for more details.
     *
     * @return string
     */
    public function getMenuStructureId(): string;


    /**
     * Injects the base menu structure in the given menu.
     *
     * See the @page(conception notes) for more details.
     *
     *
     * @param LightBMenu $menu
     * @return mixed
     */
    public function prepareBaseMenu(LightBMenu $menu);


    /**
     * Inject menu items in the given menu structure.
     *
     * The structure of menu items is defined in the @page(conception notes).
     *
     * @param array $items
     * @param LightBMenu $menu
     * @return mixed
     */
    public function injectDefaultItems(array $items, LightBMenu $menu);


    /**
     * This method is called after the menu has been compiled.
     *
     * It provides the developer to do something like process special menu item keys for instance,
     * and change the menu structure before it is returned.
     *
     * @param array $menu
     * @return void
     */
    public function onMenuCompiled(array &$menu);


    /**
     * Sets the menu type.
     *
     * @param string $menuType
     * @return void
     */
    public function setMenuType(string $menuType);
}