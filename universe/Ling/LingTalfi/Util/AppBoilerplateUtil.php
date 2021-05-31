<?php


namespace Ling\LingTalfi\Util;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\LingTalfi\Exception\LingTalfiException;
use Ling\UniverseTools\AssetsMapTool;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The AppBoilerplateUtil class.
 */
class AppBoilerplateUtil
{


    /**
     * This property holds the uniDir for this instance.
     * @var string
     */
    private string $uniDir;


    /**
     * This property holds the output for this instance.
     * @var OutputInterface|null
     */
    private ?OutputInterface $output;


    /**
     * Builds the AppBoilerplateUtil instance.
     */
    public function __construct()
    {
        $this->uniDir = LocalUniverseTool::getLocalUniversePath();
        $this->output = null;
    }

    /**
     * Sets the output.
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }


    /**
     * Returns the dependencies packed in the boilerplate.
     * It returns an array of planet dot names.
     * @return array
     * @throws \Exception
     */
    public function getBoilerplateDependencies(): array
    {

        $planets = [
            "Ling.BumbleBee",
            "Ling.Light_Cli",
            "Ling.Uni2",
            "Ling.Light_PlanetInstaller",
        ];
        $errors = [];
        $ret = DependencyTool::getDependencyListRecursiveByUniverseDirPlanets($this->uniDir, $planets, true, $errors, [
            "recursive" => true,
        ]);
        if ($errors) {
            throw new LingTalfiException("Some errors occurred while collecting dependencies: " . implode(PHP_EOL, $errors));
        }
        return $ret;
    }


    /**
     * Upgrades the boilerplate for the Light_AppBoilerplate planet.
     *
     * @throws \Exception
     *
     */
    public function upgradeBoilerplate()
    {
        $uniDir = $this->uniDir;
        $zipFileDst = $uniDir . "/Ling/Light_AppBoilerplate/assets/light-app-boilerplate.zip";
        if (true === file_exists($zipFileDst)) {


            $dir = FileSystemTool::mkTmpDir();


            //--------------------------------------------
            // CACHE
            //--------------------------------------------
            $cacheFile = __DIR__ . "/../assets/last-zipped-planets.byml";
            $this->msg("Cache file: $cacheFile" . PHP_EOL);
            if (true === file_exists($cacheFile)) {
                $cachedPlanets = BabyYamlUtil::readFile($cacheFile);
                foreach ($cachedPlanets as $k => $v) {
                    $cachedPlanets[$k] = (string)$v; // bat 1.307 is interpreted as float 1.307
                }
            } else {
                $cachedPlanets = [];
            }


            //--------------------------------------------
            // PLANETS
            //--------------------------------------------
            $planetsInfo = [];
            $uniDir = $this->uniDir;
            $deps = $this->getBoilerplateDependencies();


            if ($deps) {


                $c = 1;
                foreach ($deps as $pDotName) {

                    $pSlashName = PlanetTool::getPlanetSlashNameByDotName($pDotName);
                    $planetDir = $uniDir . "/" . $pSlashName;
                    $planetVersion = MetaInfoTool::getVersion($planetDir);

//                    $sizeHuman = ConvertTool::convertBytes(FileSystemTool::getDirectorySize($planetDir), 'h');

                    $alreadyLatest = false;

                    if (true === array_key_exists($pDotName, $cachedPlanets)) {
                        $cachedVersion = $cachedPlanets[$pDotName];
                        if ($cachedVersion === $planetVersion) {
                            $alreadyLatest = true;
                        }
                    }

                    flush();
                    if (true === is_dir($planetDir)) {
                        $planetsInfo[$pDotName] = [$planetVersion, $alreadyLatest];
                    } else {
                        throw new LingTalfiException("Planet dir not found: $planetDir.");
                    }
                    $c++;
                }
            }


            //--------------------------------------------
            // PROCESSING PLANETS THAT CHANGED SINCE LAST TIME
            //--------------------------------------------
            $max = count($planetsInfo);
            $c = 0;
            foreach ($planetsInfo as $planetDot => $info) {
                $c++;

                list($version, $alreadyLatest) = $info;

                $this->msg("Processing $planetDot ($c/$max)...");
                if (true === $alreadyLatest) {
                    $this->msg("already latest version in zip, skipping." . PHP_EOL);
                    continue;
                }

                flush();


                $cachedPlanets[$planetDot] = $version;


                $pSlashName = PlanetTool::getPlanetSlashNameByDotName($planetDot);
                $planetDir = $uniDir . "/" . $pSlashName;


                // first remove the assets/map from the zip
                $assetsMapDir = AssetsMapTool::getAssetMapDirByPlanetDir($planetDir);
                $assetMapFiles = AssetsMapTool::getAssets($assetsMapDir);

                if ($assetMapFiles) {
                    // remove the assets from the zip
                    foreach ($assetMapFiles as $relFile) {
                        $absFile = $assetsMapDir . "/" . $relFile;
                        $isDir = is_dir($absFile);
                        ZipTool::deleteFromZip($zipFileDst, $relFile, $isDir);
                    }
                }

                // remove planet from zip
                $dstName = "universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDot);
                ZipTool::deleteFromZip($zipFileDst, $dstName, true);


                // importing asset/map files
                PlanetTool::importPlanetByExternalDir($planetDot, $planetDir, $dir, [
                    "assets" => true,
                ]);


                $srcPath = $dir . "/" . $dstName;

                ZipTool::addToZip($zipFileDst, $srcPath, $dstName);


                foreach ($assetMapFiles as $relPath) {
                    $srcPath = $assetsMapDir . "/" . $relPath;
                    ZipTool::addToZip($zipFileDst, $srcPath, $relPath);
                }

                $this->msg("ok" . PHP_EOL);

            }


            $this->msg("Updating cache file" . PHP_EOL);
            BabyYamlUtil::writeFile($cachedPlanets, $cacheFile);


        } else {
            $this->newArchive();
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Creates a brand new zip archive containing the light app boilerplate.
     *
     * @throws \Exception
     */
    private function newArchive()
    {
        $dir = FileSystemTool::mkTmpDir();


//        FileSystemTool::mkdir($dir);


        //--------------------------------------------
        // BASIC FILES
        //--------------------------------------------
        $boilerplateDir = __DIR__ . "/../assets/light-app-boilerplate";
        $otherFiles = [
            "config/services/_zzz.byml",
            "universe/bigbang.php",
            "www/index.php",
            "www/.htaccess",
        ];
        foreach ($otherFiles as $rpath) {
            $file = $boilerplateDir . "/$rpath";
            $dst = $dir . "/$rpath";
            FileSystemTool::copyFile($file, $dst);
        }


        //--------------------------------------------
        // PLANETS
        //--------------------------------------------
        $uniDir = $this->uniDir;
        $deps = $this->getBoilerplateDependencies();


        if ($deps) {

            $nbDeps = count($deps);

            $c = 1;
            foreach ($deps as $pDotName) {

                $pSlashName = PlanetTool::getPlanetSlashNameByDotName($pDotName);
                $planetDir = $uniDir . "/" . $pSlashName;
                $sizeHuman = ConvertTool::convertBytes(FileSystemTool::getDirectorySize($planetDir), 'h');


                $this->msg("Processing planet $pDotName ($c/$nbDeps) ($sizeHuman)" . PHP_EOL);
                flush();


                if (true === is_dir($planetDir)) {
                    PlanetTool::importPlanetByExternalDir($pDotName, $planetDir, $dir, [
                        "assets" => true,
                    ]);
                } else {
                    throw new LingTalfiException("Planet dir not found: $planetDir.");
                }
                $c++;
            }
        }


        //--------------------------------------------
        // CREATE ZIP ARCHIVE
        //--------------------------------------------

        $this->msg("Creating zip archive..." . PHP_EOL);
        flush();


        $zipFile = $dir . ".zip";
        ZipTool::zip($dir, $zipFile, [
            "ignoreName" => [
                ".git",
                ".gitignore",
            ]
        ]);
        FileSystemTool::remove($dir);


        $zipFileDst = $uniDir . "/Ling/Light_AppBoilerplate/assets/light-app-boilerplate.zip";
        $this->msg("moving zip file to $zipFileDst." . PHP_EOL);
        FileSystemTool::move($zipFile, $zipFileDst);

    }


    /**
     * Writes the message to the output.
     * @param string $message
     */
    private function msg(string $message)
    {
        $this->output->write($message);
    }
}

