<?php


namespace Ling\LingTalfi\Kaos\Tool;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ConsoleTool;

/**
 * The PreferencesTool class.
 */
class PreferencesTool
{


    /**
     * Returns the kaos preferences.
     *
     * See the @page(LingTalfi conception notes) for more details.
     *
     * @return array
     */
    public static function getPreferences(): array
    {
        $ret = [];
        $home = ConsoleTool::getUserHomeDirectory();
        if (null !== $home) {
            $f = "$home/kaos.byml";
            if (file_exists($f)) {
                $ret = BabyYamlUtil::readFile($f);
            }
        }
        return $ret;
    }
}