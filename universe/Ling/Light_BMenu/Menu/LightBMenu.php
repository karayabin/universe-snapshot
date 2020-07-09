<?php


namespace Ling\Light_BMenu\Menu;


use Ling\DotMenu\DotMenu;

/**
 * The LightBMenu class.
 */
class LightBMenu extends DotMenu
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setStrictMode(true);
    }


}