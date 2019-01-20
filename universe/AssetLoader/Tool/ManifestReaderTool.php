<?php

namespace AssetLoader\Tool;

/*
 * LingTalfi 2016-01-30
 */
use AssetLoader\Exception\AssetLoaderException;

class ManifestReaderTool
{


    public static function fetchItems($manifestPath)
    {
        $ret = [];
        if (file_exists($manifestPath)) {
            $text = file_get_contents($manifestPath);

            // strip comments
            $text = preg_replace('!^\s*#.*$!m','', $text);
            
            $items = preg_split('!\n\s*\n+!', $text);
            $items = array_filter($items);
            foreach ($items as $item) {
                $p = explode(PHP_EOL, trim($item));
                $name = rtrim(trim(array_shift($p)), ':');
                $ret[$name] = $p;
            }
        }
        else {
            throw new AssetLoaderException("manifest path not found: $manifestPath");
        }
        return $ret;
    }
}
