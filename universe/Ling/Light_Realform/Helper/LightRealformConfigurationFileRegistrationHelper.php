<?php


namespace Ling\Light_Realform\Helper;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The LightRealformConfigurationFileRegistrationHelper class.
 */
class LightRealformConfigurationFileRegistrationHelper
{


    /**
     * Registers the planet by copying the given dir content to the expected location.
     *
     * See more details in the @page(Light_Realform conception notes).
     *
     * The given dir should contain only babyYaml files representing realform config files.
     * Sub-directories are allowed, but only files will be copied.
     *
     *
     * @param OutputInterface $output
     * @param string $appDir
     * @param string $planetDotName
     * @param string $dir
     */
    public static function registerConfigurationFileByDirectory(OutputInterface $output, string $appDir, string $planetDotName, string $dir)
    {
        if (true === is_dir($dir)) {

            $relPaths = YorgDirScannerTool::getFilesWithExtension($dir, "byml", false, true, true);
            $dstDir = $appDir . "/config/open/Ling.Light_Realform/$planetDotName";
            if ($relPaths) {

                $nb = count($relPaths);
                $output->write("Copying <b>$nb</b> configuration file(s) to <blue>$dstDir</blue>." . PHP_EOL);
                foreach ($relPaths as $path) {
                    $dstFile = $dstDir . "/$path";
                    FileSystemTool::copyFile($dir . "/$path", $dstFile);
                }
            }
        }

    }


    /**
     * Unregisters the planet by removing the given dir content from the expected location.
     *
     * See more details in the @page(Light_Realform conception notes).
     *
     *
     *
     * @param OutputInterface $output
     * @param string $appDir
     * @param string $planetDotName
     * @param string $dir
     */
    public static function unregisterConfigurationFileByDirectory(OutputInterface $output, string $appDir, string $planetDotName, string $dir)
    {
        if (true === is_dir($dir)) {

            $relPaths = YorgDirScannerTool::getFilesWithExtension($dir, "byml", false, true, true);
            $dstDir = $appDir . "/config/open/Ling.Light_Realform/$planetDotName";
            if ($relPaths) {

                $n = 0;
                foreach ($relPaths as $path) {
                    $dstFile = $dstDir . "/$path";
                    if (true === file_exists($dstFile)) {
                        FileSystemTool::remove($dstFile);
                        $n++;
                    }
                }
                $output->write("Removed <b>$n</b> configuration file(s) from <blue>$dstDir</blue>." . PHP_EOL);
            }
        }
    }

}