<?php

namespace AssetLoader\Registry;

/*
 * LingTalfi 2016-01-30
 */
use AssetLoader\Tool\ManifestReaderTool;

class AssetLoaderRegistry
{


    private static $itemNames = [];
    private static $items2Assets = [];
    private static $onErrorCb;

    public static function useItems(array $names)
    {
        foreach ($names as $name) {
            self::useItem($name);
        }
    }

    public static function useItem($name)
    {
        if (!in_array($name, self::$itemNames, true)) {
            self::$itemNames[] = $name;
        }
    }


    public static function getItems()
    {
        return self::$itemNames;
    }


    //------------------------------------------------------------------------------/
    // STATIC WORKFLOW
    //------------------------------------------------------------------------------/
    /**
     * This is a traditional robust static workflow:
     * - readManifest (execute in your init)
     * - ... useItem(s) when needed... order IS important ... be smart ...
     * - writeAssets (execute this in your html head)
     */
    public static function readManifest($manifestPath)
    {
        self::$items2Assets = ManifestReaderTool::fetchItems($manifestPath);
    }

    public static function writeAssets()
    {
        foreach (self::$itemNames as $item) {
            if (array_key_exists($item, self::$items2Assets)) {
                foreach (self::$items2Assets[$item] as $asset) {
                    if ('.js' === substr($asset, -3)) {
                        echo '<script src="' . $asset . '"></script>' . PHP_EOL;
                    }
                    elseif ('.css' === substr($asset, -4)) {
                        echo '<link rel="stylesheet" href="' . $asset . '">' . PHP_EOL;
                    }
                    else {
                        self::devError("Invalid extension for asset: $asset");
                    }
                }
            }
            else {
                self::devError("Item not registered: $item");
            }
        }
    }


    public static function setOnErrorCb(callable $f)
    {
        self::$onErrorCb = $f;
    }


    private static function devError($m)
    {
        if (null !== self::$onErrorCb) {
            call_user_func(self::$onErrorCb, $m);
        }
        else {
            trigger_error($m, E_USER_WARNING);
        }
    }
}
