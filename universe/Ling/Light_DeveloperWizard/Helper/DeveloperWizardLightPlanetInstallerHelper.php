<?php


namespace Ling\Light_DeveloperWizard\Helper;

use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\UniverseTools\PlanetTool;

/**
 * The DeveloperWizardLightPlanetInstallerHelper class.
 */
class DeveloperWizardLightPlanetInstallerHelper
{


    /**
     * Creates a planet installer for the given planet.
     *
     * By default, the planet installer extends the LightDatabaseBasePlanetInstaller class.
     *
     *
     *
     * @param string $galaxy
     * @param string $planet
     * @param string $appDir
     * @param array $options
     */
    public static function createPlanetInstaller(string $galaxy, string $planet, string $appDir, array $options = [])
    {
        $tpl = __DIR__ . "/../assets/class-templates/Light_PlanetInstaller/LightKitStorePlanetInstaller.phptpl";
        $tplContent = file_get_contents($tpl);


        $className = PlanetTool::getTightPlanetName($planet) . "PlanetInstaller";


        $tplContent = str_replace([
            "Ling\Light_Kittt_Store",
            "LightKitttStorePlanetInstaller",
        ], [
            "$galaxy\\$planet",
            $className,
        ], $tplContent);


        $dstFile = $appDir . "/universe/$galaxy/$planet/Light_PlanetInstaller/$className.php";
        if (true === file_exists($dstFile)) {

            $sPath = DeveloperWizardGenericHelper::getSymbolicPath($dstFile, $appDir);
            throw new LightDeveloperWizardException("Light_PlanetInstaller class already exists at $sPath. It will <b>NOT</b> be overwritten.");
        }

        FileSystemTool::mkfile($dstFile, $tplContent);
    }

}