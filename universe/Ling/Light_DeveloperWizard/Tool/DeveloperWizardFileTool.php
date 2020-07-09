<?php


namespace Ling\Light_DeveloperWizard\Tool;

use Ling\BabyYaml\BabyYamlUtil;

/**
 * The DeveloperWizardFileTool class.
 *
 * Manages the developer-wizard preferences file.
 * See the @page(Light_DeveloperWizard conception notes) for more details.
 *
 */
class DeveloperWizardFileTool
{


    /**
     * Returns whether the preferences file exists under the given planet directory.
     *
     * @param string $planetDir
     * @return bool
     */
    public static function hasFile(string $planetDir): bool
    {
        return file_exists(self::getFilePath($planetDir));
    }

    /**
     * Rewrites the preferences file entirely with the given conf.
     *
     * The file is created if it doesn't exist.
     *
     *
     * @param string $planetDir
     * @param array $conf
     */
    public static function rewriteFile(string $planetDir, array $conf = [])
    {
        BabyYamlUtil::writeFile($conf, self::getFilePath($planetDir));
    }


    /**
     * Returns the array of preferences for the given planetDir.
     *
     * @param string $planetDir
     * @return array
     */
    public static function getPreferences(string $planetDir): array
    {
        $file = self::getFilePath($planetDir);
        if (true === file_exists($file)) {
            return BabyYamlUtil::readFile($file);
        }
        return [];
    }

    /**
     * Updates the preferences file partially, based on the given conf array.
     *
     *
     * @param string $planetDir
     * @param array $conf
     */
    public static function updateFile(string $planetDir, array $conf = [])
    {
        $path = self::getFilePath($planetDir);
        if (file_exists($path)) {
            $_conf = BabyYamlUtil::readFile($path);
            $conf = array_replace($_conf, $conf);
        }
        BabyYamlUtil::writeFile($conf, $path);
    }


    /**
     * Returns the absolute path to the preferences file.
     *
     * @param string $planetDir
     * @return string
     */
    public static function getFilePath(string $planetDir): string
    {
        return $planetDir . "/developer-wizard.byml";
    }
}