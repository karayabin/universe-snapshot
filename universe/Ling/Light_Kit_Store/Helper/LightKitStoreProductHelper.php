<?php

namespace Ling\Light_Kit_Store\Helper;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;

/**
 * The LightKitStoreProductHelper class.
 */
class LightKitStoreProductHelper
{


    /**
     * Returns the url to the item, based on the given format.
     *
     * Note: this is designed to be used across the whole application for consistency purpose (i.e. use this any
     * time you need to link to a product).
     *
     * @param string $urlFmt
     * @param array $item
     * @return string
     */
    public static function getUrlItemByFormatAndItem(string $urlFmt, array $item): string
    {
        return sprintf($urlFmt, $item['label'], $item['id']);
    }


    /**
     * Returns the product link format.
     *
     * Note: this is designed to be used across the whole application for consistency purpose (i.e. use this any
     * time you need to link to a product).
     * Then use the LightKitStoreProductHelper::getUrlItemByFormatAndItem method to convert to a link.
     *
     * @return string
     * @throws \Exception
     */
    public static function getProductLinkFormat(LightServiceContainerInterface $container): string
    {
        /**
         * @var $_rr LightReverseRouterService
         */
        $_rr = $container->get("reverse_router");
        $useAbsolute = false;
        return $_rr->getUrl("lks_route-product", [
            's' => "%s",
            'id' => "%s",
        ], $useAbsolute);
    }


}