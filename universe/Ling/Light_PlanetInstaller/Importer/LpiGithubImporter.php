<?php


namespace Ling\Light_PlanetInstaller\Importer;


use Ling\Bat\ConsoleTool;
use Ling\Bat\HttpTool;
use Ling\Bat\OsTool;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiGithubImporter class.
 *
 * Warning, this importer uses git under the hood, which means you need to have it installed on your machine
 * before you can use this importer.
 *
 * Configuration:
 *
 * - ?verbose: bool=false, whether to display the executed commands. By default, it's quiet (i.e. no message display).
 * - account: string. The name of the github.com account (which is displayed in the url).
 *
 *
 *
 */
class LpiGithubImporter extends LpiBaseImporter
{


    /**
     * @implementation
     */
    public function importItem(string $planetIdentifier, string $version, string $dstDir, array &$warnings = [])
    {

        $isVerbose = $this->getConfigValue("verbose", false, false);


        $account = $this->getConfigValue("account");
        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetIdentifier);

        if (false === OsTool::hasProgram("git")) {
            $this->error("The git program is required and was not found on this machine. Aborting.");
        }


        if (true === $isVerbose) {
            $cmd = "git clone https://github.com/$account/$planet.git \"$dstDir\" 2>&1 && cd \"$dstDir\" && git checkout \"$version\" 2>&1";
        } else {
            $cmd = "git clone https://github.com/$account/$planet.git \"$dstDir\" --quiet 2>&1 && cd \"$dstDir\" && git checkout \"$version\" --quiet 2>&1";
        }


        $outputLines = [];
        $return = 0;
        $result = ConsoleTool::exec($cmd, $outputLines, $return);


        if ($outputLines) {
            $firstLine = $outputLines[0];
            if ("fatal: destination path '$dstDir' already exists and is not an empty directory." === $firstLine) {
                $warnings[] = "The destination directory already exists (and is not empty): <b>" . $dstDir . '</b>' . PHP_EOL;
            } else {


                if (true === $result) {


                    $ignoreWarning = false;


                    $suppressDetachedHeadWarning = true;
                    if (true === $suppressDetachedHeadWarning) {
                        // annoying warnings, suppress them from here.
                        $line0 = $outputLines[0] ?? null;
                        $line1 = $outputLines[1] ?? null;
                        $line3 = $outputLines[3] ?? null;

                        if (
                            0 === strpos($line0, 'Cloning into') &&
                            0 === strpos($line1, 'Note: checking out') &&
                            "You are in 'detached HEAD' state. You can look around, make experimental" === $line3
                        ) {
                            $ignoreWarning = true;
                        }


                    }


                    if (false === $ignoreWarning) {
                        $warnings[] = implode(PHP_EOL, $outputLines);
                    }

                } else {
                    // unknown or bad error
                    throw new LightPlanetInstallerException(implode(PHP_EOL, $outputLines));
                }
            }
        }

    }


    /**
     * @implementation
     */
    public function hasItem(string $planetIdentifier, string $version): bool
    {

        $account = $this->getConfigValue("account");
        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetIdentifier);


        $url = "https://github.com/$account/$planet/releases/tag/$version";

        $code = HttpTool::getHttpResponseCode($url);

        if (in_array($code, [
            200,
        ], true)) {
            return true;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function getCurrentVersion(string $planetIdentifier): string
    {
        $account = $this->getConfigValue("account");
        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetIdentifier);
        $rawMetaInfoUrl = "https://raw.githubusercontent.com/$account/$planet/master/meta-info.byml";
        $version = MetaInfoTool::getVersionByUrl($rawMetaInfoUrl);
        if (null === $version) {
            throw new LightPlanetInstallerException("Version not defined for planet $planetIdentifier, are you sure it exists?");
        }
        return $version;
    }

    /**
     * @implementation
     */
    public function getLpiDependencies(string $planetIdentifier): array
    {
        $account = $this->getConfigValue("account");
        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetIdentifier);
        $url = "https://raw.githubusercontent.com/$account/$planet/master/lpi-deps.byml";
        return LpiDepsFileHelper::getLpiDepsContentByLocation($url);
    }

    /**
     * @implementation
     */
    public function getUniDependencies(string $planetIdentifier): array
    {
        $account = $this->getConfigValue("account");
        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetIdentifier);
        $url = "https://raw.githubusercontent.com/$account/$planet/master/dependencies.byml";
        return LpiHelper::uniDependenciesToPlanetDotList(DependencyTool::getDependencyListByFile($url));
    }


    /**
     * @implementation
     */
    public function getAllVersions(string $planetIdentifier): array
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetId($planetIdentifier);
        $account = $this->getConfigValue("account");
        $url = "https://github.com/$account/$planet";
        $cmd = 'git ls-remote --tags ' . $url . ' 2>&1';
        $outputLines = [];
        $return = 0;
        $result = ConsoleTool::exec($cmd, $outputLines, $return);
        $ret = [];
        if (true === $result) {
            foreach ($outputLines as $line) {
                $p = explode('/', $line);
                $ret[] = rtrim(array_pop($p), '^{}');
            }
        } else {
            throw new LightPlanetInstallerException("An error occurred with cmd: $cmd. The error message was: " . PHP_EOL . implode(PHP_EOL, $outputLines));
        }

        $ret = array_unique($ret);
        natsort($ret);
        return $ret;
    }


}