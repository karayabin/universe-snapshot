<?php


namespace Ling\Light_BMenu\MenuModifier;

/**
 * The MenuModifierInterface interface.
 */
interface MenuModifierInterface
{

    /**
     * Update the items of the menu.
     *
     * @param string $menuName
     * @param array $items
     * @return void
     */
    public function updateItems(string $menuName, array &$items): void;
}