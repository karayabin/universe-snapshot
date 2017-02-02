<?php


namespace AssetsList;

use Bat\StringTool;


/**
 * The AssetsList helps registering assets.
 *
 * Library dependencies resolution is left to the user.
 *
 * This class ultimately displays the assets in the order in which they are called.
 *
 * An asset will only be displayed once (i.e. this class will automatically ignore duplicates).
 *
 * Detection of duplicate assets is based solely on the url path of the asset.
 *
 *
 * There is also a mechanism that allows to not include a library if it has already been included (use the
 * third argument libName of the js or css method).
 *
 *
 *
 *
 *
 * Personal notes:
 * Therefore, it's a good idea to agree on which url to call;
 * using internal url (starting with / as opposed to those starting with http) can be specially useful
 * for the duplicate problem.
 * Also, considering creating a generic /libs/jquery.js file might help in order to resolve
 * the problem of the same library called with different version numbers.
 *
 */
class AssetsList
{

    /**
     * array of url => item.
     * Each item is an array containing the following:
     *      - 0: assetType=js|css
     *      - ?1: html attributes=array|null(default)   (StringTool::htmlAttributes notation)
     *      - ?2: libName=string|null(default)   if set to a string, will only include the asset if the
     *                                      library was not previously called before (using the third argument of the js or css method)
     *
     * Note: using the url as the key IS the "avoid duplicates" mechanism implementation
     */
    private static $list = [];


    public static function css($url, $libName = null, array $htmlAttributes = null)
    {
        self::$list[$url] = ['css', $htmlAttributes, $libName];
    }

    public static function js($url, $libName = null, array $htmlAttributes = null)
    {
        self::$list[$url] = ['js', $htmlAttributes, $libName];
    }

    public static function displayList()
    {
        $cssLibs = [];
        $jsLibs = [];
        foreach (self::$list as $url => $item) {
            $s = (null === $item[1]) ? '' : StringTool::htmlAttributes($item[1]);
            $lib = $item[2];
            if ('css' === $item[0]) {
                if (null !== $lib) {
                    if (false === array_key_exists($lib, $cssLibs)) {
                        $cssLibs[$lib] = true;
                    } else {
                        continue;
                    }
                }
                ?>
                <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>" <?php echo $s; ?>>
                <?php
            } else {
                if (null !== $lib) {
                    if (false === array_key_exists($lib, $jsLibs)) {
                        $jsLibs[$lib] = true;
                    } else {
                        continue;
                    }
                }
                ?>
                <script src="<?php echo htmlspecialchars($url); ?>" <?php echo $s; ?>></script>
                <?php
            }
        }
    }

}