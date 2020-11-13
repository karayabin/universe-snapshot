<?php


namespace Ling\Light_DeveloperWizard\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\FileSystemTool;

/**
 * The ConfigHelper class.
 */
class ConfigHelper
{

    /**
     * Returns whether the given config file contains a @page(section comment) named $bannerName.
     *
     *
     *
     * @param string $confFile
     * @param string $bannerName
     * @return bool
     */
    public static function hasSectionComment(string $confFile, string $bannerName): bool
    {
        $s = file_get_contents($confFile);
        $x = self::getBannerContent($bannerName);
        // assuming there is no text property containing the banner comment...
        return (false !== strpos($s, $x));
    }


    /**
     * Returns a @page(section comment) named $bannerName.
     *
     * @param string $bannerName
     * @return string
     */
    public static function getBannerContent(string $bannerName): string
    {
        return <<<EEE
# --------------------------------------
# $bannerName
# --------------------------------------
EEE;
    }


    /**
     * Removes a banner from a config file.
     *
     * @param string $configFile
     * @param string $bannerName
     */
    public static function removeSectionComment(string $configFile, string $bannerName)
    {
        $bannerContent = self::getBannerContent($bannerName);
        $content = file_get_contents($configFile);
        $content = str_replace($bannerContent, '', $content);
        FileSystemTool::mkfile($configFile, $content);
    }


    /**
     * Reposition the @page(section comments) found in the given config file, so that it implements @page(the Standard service configuration file) convention.
     * @param string $configFile
     */
    public static function repositionSectionComments(string $configFile)
    {
        ConfigHelper::removeSectionComment($configFile, "hooks");
        list($config, $nodeInfoMap) = BabyYamlUtil::parseNodeInfoByFile($configFile);
        $firstHookKey = false;
        foreach ($config as $key => $node) {
            if (preg_match('!^\$[^.]+\.methods_collection$!', $key, $match)) {
                $firstHookKey = $key;
                break;
            }
        }

        if (false !== $firstHookKey) {
            $nodeInfoFirstKey = $nodeInfoMap[$firstHookKey] ?? [];
            if (false === array_key_exists('comments', $nodeInfoFirstKey)) {
                $nodeInfoFirstKey['comments'] = [];
            }
            $nodeInfoFirstKey['comments'] = array_merge([
                [
                    'block',
                    '# --------------------------------------',
                ],
                [
                    'block',
                    '# hooks',
                ],
                [
                    'block',
                    '# --------------------------------------',
                ],
            ], $nodeInfoFirstKey['comments']);

            $nodeInfoMap[str_replace('.', '\.', $firstHookKey)] = $nodeInfoFirstKey;
        }
        BabyYamlUtil::writeFile($config, $configFile, [
            "nodeInfoMap" => $nodeInfoMap,
        ]);
    }


    /**
     * Sort the hooks alphabetically (asc) in the given config file, and reposition the section comments.
     *
     * @param string $configFile
     */
    public static function sortHooks(string $configFile){


        /**
         * Limitation of this technique:
         * it assumes that only the "hooks" section can make call to methods_collection.
         * See the Light_Developer_Wizard's "Standard service configuration file section" for more details about sections.
         *
         * So if some entry in the "others" section is defined like this:
         *
         * - $myKey.methods_collection:
         *
         * It would interfere with our algorithm below.
         * Although one could argue that such a key is a hook anyway.
         * But I just want you to be aware of it.
         *
         *
         */
        list($config, $nodeInfoMap) = BabyYamlUtil::parseNodeInfoByFile($configFile);

        $newConfig = [];
        $hooks = [];
        $hookOffset = null;
        $x = 0;
        foreach ($config as $key => $node) {
            $isHook = false;
            if (preg_match('!^\$[^.]+\.methods_collection$!', $key, $match)) {
                $isHook = true;
                $hooks[$key] = $node;
            }


            if (false === $isHook) {
                $newConfig[$key] = $node;
            } else {
                if (false === array_key_exists('insert_hooks_here', $newConfig)) {
                    $newConfig['insert_hooks_here'] = 1;
                    $hookOffset = $x;
                }
            }
            $x++;
        }
        ksort($hooks);
        ArrayTool::splice($newConfig, $hookOffset, 1, $hooks);


        BabyYamlUtil::writeFile($newConfig, $configFile, [
            "nodeInfoMap" => $nodeInfoMap,
        ]);


        ConfigHelper::repositionSectionComments($configFile);

    }
}