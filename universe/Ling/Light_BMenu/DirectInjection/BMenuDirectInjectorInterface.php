<?php


namespace Ling\Light_BMenu\DirectInjection;


use Ling\Light_BMenu\Menu\LightBMenu;

/**
 * The BMenuDirectInjectorInterface interface.
 */
interface BMenuDirectInjectorInterface
{

    /**
     * Injects menu fragments in the given menu, knowing the "menuStructureId" context.
     *
     * More info about the menuStructureId in the @page(conception notes).
     *
     * @param string $menuStructureId
     * @param LightBMenu $menu
     * @return void
     */
    public function inject(string $menuStructureId, LightBMenu $menu);
}