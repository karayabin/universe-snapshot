<?php


namespace Ling\Uni2\LocalServer;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\DirScanner;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Uni2\Exception\Uni2Exception;

/**
 * The LocalServer class.
 * This class represents @page(the local server).
 *
 * By design, one should always check that the server is active (isActive method)
 * before using it.
 *
 */
class LocalServer
{


    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the active for this instance.
     * @var bool = false
     */
    protected $active;


    /**
     * Builds the LocalServer instance.
     */
    public function __construct()
    {
        $this->rootDir = null;
        $this->active = false;
    }


    /**
     * Returns whether the local server exists.
     * It exists if the rootDir has been defined, otherwise it doesn't.
     *
     *
     * @return bool
     */
    public function exists(): bool
    {
        return (null !== $this->rootDir);
    }

    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    /**
     * Returns the rootDir of this instance.
     *
     * @return string|null
     */
    public function getRootDir(): string
    {
        return $this->rootDir;
    }


    /**
     * Sets whether the root server is active.
     *
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }


    /**
     * Returns whether the local server is both configured and active.
     *
     * @return bool
     */
    public function isActive()
    {
        return (null !== $this->rootDir && true === $this->active);
    }


    /**
     * Returns whether the local server has the given item.
     *
     * @param string $dependencySystemName
     * The name of the dependency system. See the @page(dependency system page) for more details.
     *
     * @param string $packageSymbolicName
     * @throws Uni2Exception. When the root dir is not set.
     * @return bool
     */
    public function hasItem(string $dependencySystemName, string $packageSymbolicName): bool
    {
        if (null === $this->rootDir) {
            throw new Uni2Exception("Root dir not set");
        }

        $itemDir = $this->rootDir . "/$dependencySystemName/$packageSymbolicName";
        return is_dir($itemDir);
    }


    /**
     * Returns the path of an item directory in the local server.
     * The item is identified by the given $dependencySystemName and $packageSymbolicName.
     * Note: this returns a theoretical path, even if the item actually doesn't exist.
     *
     *
     * @param string $dependencySystemName
     * @param string $packageSymbolicName
     * @throws Uni2Exception. When the root dir is not set.
     * @return string
     */
    public function getItemPath(string $dependencySystemName, string $packageSymbolicName): string
    {
        if (null === $this->rootDir) {
            throw new Uni2Exception("Root dir not set");
        }
        $itemDir = $this->rootDir . "/$dependencySystemName/$packageSymbolicName";
        return $itemDir;
    }


    /**
     * Replaces an item from the application with the same item from the local server instead,
     * and returns whether the operation was successful.
     *
     *
     * @param string $applicationDstDir . The path to the application item directory to replace.
     * @param string $localServerRelativeSrcDir
     *
     * The relative path of the local server; relative to the local server's root dir.
     * It should be of the form: ```<dependencySystem> </> <itemName>```.
     *
     *
     * @return bool
     * @throws Uni2Exception. When something goes wrong.
     */
    public function replaceItem(string $localServerRelativeSrcDir, string $applicationDstDir): bool
    {
        if (null === $this->rootDir) {
            throw new Uni2Exception("Root dir not set");
        }
        $localItemDir = $this->rootDir . "/$localServerRelativeSrcDir";
        if (is_dir($localItemDir)) {
            FileSystemTool::remove($applicationDstDir);
            FileSystemTool::copyDir($localItemDir, $applicationDstDir);
            return true;
        }
        return false;
    }


    /**
     * Imports the $sourceDir directory from the application to the local server.
     * Returns true, or false if something went wrong.
     *
     * @param string $sourceDir
     * The item directory to copy from the application.
     *
     * @param string $localServerRelativeDestDir
     * The relative path to where the item should be placed on the local server.
     * This path is relative to the local server's root dir.
     *
     * @param bool $isPlanet
     *
     * @return bool
     * @throws Uni2Exception. When the root dir is not set.
     */
    public function importItem(string $sourceDir, string $localServerRelativeDestDir, bool $isPlanet): bool
    {
        if (null === $this->rootDir) {
            throw new Uni2Exception("Root dir not set");
        }

        $dstDir = $this->rootDir . "/$localServerRelativeDestDir";
        $res = FileSystemTool::copyDir($sourceDir, $dstDir);
        if (false === $isPlanet) {
            /**
             * This marker is used to mark non-planet items in the local server.
             * So that we can list non-planet items.
             */
            FileSystemTool::mkfile($dstDir . "/universe-dependency-marker.txt");
        }
        return $res;
    }


    /**
     * Returns the list of the relative directory paths for non-planet items stored in the local server.
     *
     * The paths returned are relative to the local server's root dir.
     *
     * Note: the universe-dependency-marker.txt marker is used under the hood to detect such items.
     *
     *
     * @return array
     * @throws Uni2Exception. When the root dir is not set.
     */
    public function getNonPlanetItemsDirectoryList()
    {
        if (null === $this->rootDir) {
            throw new Uni2Exception("Root dir not set");
        }
        $ret = [];
        $scanner = new DirScanner();
        $scanner->scanDir($this->rootDir, function ($path, $rPath, $level) use (&$ret) {

            $file = basename($rPath);
            if ("universe-dependency-marker.txt" === $file) {
                $ret[] = dirname($rPath);
            }
        });
        return $ret;
    }


    /**
     * Returns an array containing all the planet long names for the given galaxies.
     *
     * @param array $galaxies
     * Array of galaxy names.
     *
     * @return array
     * @throws Uni2Exception. When the root dir is not set.
     */
    public function getPlanetNames(array $galaxies)
    {
        if (null === $this->rootDir) {
            throw new Uni2Exception("Root dir not set");
        }
        $ret = [];
        foreach ($galaxies as $galaxy) {
            $galaxyDir = $this->rootDir . "/" . $galaxy;
            if (is_dir($galaxyDir)) {
                $planetDirs = YorgDirScannerTool::getDirs($galaxyDir);
                foreach ($planetDirs as $planetDir) {
                    $planetShortName = basename($planetDir);
                    $ret[] = $galaxy . "/" . $planetShortName;
                }
            }
        }
        return $ret;
    }

}