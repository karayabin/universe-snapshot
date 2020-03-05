<?php


namespace Ling\Light_BMenu\Tool;

use Ling\Bat\ArrayTool;

/**
 * The LightBMenuTool class.
 */
class LightBMenuTool
{


    /**
     * Parses the given menu item, and returns an array with the following structure:
     *
     * - 0: bool, isActive. Whether the menu item is active (true only if it's a leaf and the url of the
     *      item matches the given currentUri)
     * - 1: bool, isOpened. True only if the item is a parent which contains an active menu item.
     *
     *
     * @param array $item
     * @param string $currentUri
     * The current uri, as returned by the @page(HttpRequest->getUri method).
     *
     * @return array
     */
    public static function getActiveOpenInfo(array $item, string $currentUri): array
    {
        $url = $item['url'] ?? "";
        $isActive = self::menuItemIsActive($url, $currentUri);
        $isOpened = false;
        $arr = [$item];


        ArrayTool::walkRowsRecursive($arr, function ($child) use (&$isOpened, $currentUri) {
            $url = $child['url'] ?? "";
            if (true === self::menuItemIsActive($url, $currentUri)) {
                $isOpened = true;
            }
        }, 'children', false);


        return [
            $isActive,
            $isOpened,
        ];
    }


    /**
     * Returns whether the menu item (which url is given) matches the given currentUri.
     *
     * Note: I didn't want to go too much in details and compare all arguments, which would be more stable,
     * but would cost more performances. I don't know if I made a wise choice, can always come back later and
     * fine tune this...
     *
     * With the current method, at least I got rid of the problem with the given url...
     *
     * - /hub?plugin=Light_Kit_Admin&controller=Generated/LudUserController&m=f&id=2
     *
     * ...not matching
     *
     * - /hub?plugin=Light_Kit_Admin&controller=Generated/LudUserController
     *
     *
     *
     * @param string $url
     * @param $currentUri
     * @return bool
     */
    private static function menuItemIsActive(string $url, $currentUri): bool
    {
        if ($url) {
            return (0 === strpos($currentUri, $url));
        }
        return false;
    }
}