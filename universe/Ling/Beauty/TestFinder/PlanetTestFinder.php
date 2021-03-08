<?php

namespace Ling\Beauty\TestFinder;


use Ling\Bat\UriTool;
use Ling\Beauty\Exception\BeautyException;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The PlanetTestFinder class.
 * https://github.com/lingtalfi/Beauty/blob/master/personal/mydoc/pages/conception-notes.md#bnb-planet-system
 *
 */
class PlanetTestFinder implements TestFinderInterface
{


    /**
     * This property holds the extensions for this instance.
     * @var array
     */
    private array $extensions;


    /**
     * This property holds the uniDir for this instance.
     * @var string | null
     */
    private ?string $uniDir;

    /**
     * This property holds the gui url for this instance.
     * @var string|null
     */
    private ?string $guiTestUrl;


    /**
     * This property holds the useHttps for this instance.
     * @var bool = true
     */
    private bool $useHttps;

    public function __construct()
    {
        $this->extensions = [];
        $this->uniDir = null;
        $this->guiTestUrl = null;
    }


    /**
     * Sets the universe directory.
     *
     * @param string $uniDir
     */
    public function setUniverseDir(string $uniDir)
    {
        $this->uniDir = $uniDir;
    }


    /**
     * Adds an extension to look for.
     *
     * @param string $extension
     * @return $this
     */
    public function addExtension(string $extension)
    {
        $this->extensions [] = $extension;
        return $this;
    }

    /**
     * Sets the guiTestUrl.
     *
     * @param string $guiTestUrl
     */
    public function setGuiTestUrl(string $guiTestUrl)
    {
        $this->guiTestUrl = $guiTestUrl;
    }








    //------------------------------------------------------------------------------/
    // IMPLEMENTS TestFinderInterface
    //------------------------------------------------------------------------------/
    /**
     * @implementation
     */
    public function getTestPageUrls()
    {

        if (null === $this->uniDir) {
            throw new BeautyException("uniDir cannot be null.");
        }

        $tests = [];
        $files = YorgDirScannerTool::getFilesWithExtension($this->uniDir, $this->extensions, false, true, true, true);


        foreach ($files as $file) {
            $p = explode(DIRECTORY_SEPARATOR, $file);

            $galaxy = array_shift($p);
            $planet = array_shift($p);
            $bnbDir = array_shift($p);
            $relPath = implode(DIRECTORY_SEPARATOR, $p);


            if (false === array_key_exists($galaxy, $tests)) {
                $tests[$galaxy] = [];
            }
            if (false === array_key_exists($planet, $tests[$galaxy])) {
                $tests[$galaxy][$planet] = [];
            }
            $tests[$galaxy][$planet][] = $this->toUrl($galaxy, $planet, $relPath);


        }


        return $tests;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Converts the given elements to one url suitable for the "bnb planet gui".
     *
     * The script for the bnb planet gui is in "demo-planet.php".
     *
     * @param string $galaxy
     * @param string $planet
     * @param string $relPath
     * @return string
     */
    private function toUrl(string $galaxy, string $planet, string $relPath): string
    {

        return UriTool::appendParams($this->guiTestUrl, [
            "pdot" => $galaxy . "." . $planet,
            "rpath" => $relPath,
        ]);
    }
}
