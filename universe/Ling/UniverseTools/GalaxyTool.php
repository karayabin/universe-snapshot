<?php

namespace Ling\UniverseTools;


use Ling\BabyYaml\BabyYamlUtil;

/**
 * The GalaxyTool class.
 *
 *
 */
class GalaxyTool
{


    /**
     * Returns the array of known galaxies.
     *
     *
     * @return array
     * @throws \Exception
     */
    public static function getKnownGalaxies()
    {

        $file = "https://raw.githubusercontent.com/lingtalfi/universe-naive-importer/master/universe-meta.byml";
        if (false !== ($content = file_get_contents($file))) {
            $conf = BabyYamlUtil::readBabyYamlString($content);
            $importers = $conf['importers'] ?? [];
            if ($importers) {
                return array_filter(array_keys($importers), function ($v) {
                    return ctype_upper(substr($v, 0, 1));
                });
            }
        }

        return ["Ling"];
    }

}