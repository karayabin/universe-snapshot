<?php


namespace Ling\PlanetSitemap;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The PlanetSitemapHelper class.
 */
class PlanetSitemapHelper
{


    /**
     * Creates a simple sitemap in txt format at the root of the given $planetDir,
     * and returns whether the sitemap was created successfully.
     *
     * The created sitemap will have the name "sitemap.txt".
     * If the file already exists it will be replaced.
     *
     *
     * The method will proceed as follow:
     *
     * - if the planetDir contains the doc/api directory, it assumes that a @page(DocTools) doc is available,
     *      and will create an appropriate sitemap
     * - otherwise, it will parse all md files and create a sitemap entry for each of them
     *
     *
     *
     *
     *
     *
     * @param string $planetDir
     * @param string $baseUrl
     * The url of the github account.
     * Example: https://github.com/lingtalfi
     *
     *
     * @return bool
     */
    public static function createGithubSitemap(string $planetDir, string $baseUrl)
    {

        $docApiDir = $planetDir . "/doc/api";


        $sitemapFile = $planetDir . "/sitemap.txt";
        $urls = [];
        $planetName = basename($planetDir); // short name


        if (is_dir($docApiDir)) {


            //--------------------------------------------
            // DOCTOOLS STYLE
            //--------------------------------------------
            // first include  the README.md if any
            $readmeFile = $planetDir . "/README.md";
            if (file_exists($readmeFile)) {
                $urls[] = $baseUrl . "/$planetName/blob/master/README.md";
            }


            // then collect md files in the doc/api directory
            $files = YorgDirScannerTool::getFilesWithExtension($docApiDir, "md", false, true, true);
            foreach ($files as $file) {
                $urls[] = "$baseUrl/$planetName/blob/master/doc/api/$file";
            }

            // then collect pages if any
            $docPagesDir = $planetDir . "/doc/pages";
            if (is_dir($docPagesDir)) {
                $files = YorgDirScannerTool::getFilesWithExtension($docPagesDir, "md", false, true, true);
                foreach ($files as $file) {
                    $urls[] = "$baseUrl/$planetName/blob/master/doc/pages/$file";
                }
            }
        } else {
            //--------------------------------------------
            // REGULAR PLANET
            //--------------------------------------------
            /**
             * We parse only md files
             */
            $files = YorgDirScannerTool::getFilesWithExtension($planetDir, "md", false, true, true);
            foreach ($files as $file) {
                $urls[] = $baseUrl . "/$planetName/blob/master/$file";
            }
        }


        $content = implode(PHP_EOL, $urls) . PHP_EOL;
        return FileSystemTool::mkfile($sitemapFile, $content);
    }

}