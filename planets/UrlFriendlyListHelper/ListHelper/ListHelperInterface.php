<?php

namespace UrlFriendlyListHelper\ListHelper;

/*
 * LingTalfi 2015-11-02
 * 
 */
use UrlFriendlyListHelper\Router\ListRouterInterface;

interface ListHelperInterface
{


    /**
     * @return ListRouterInterface
     */
    public function getRouter();

    public function getSuffix();

}
