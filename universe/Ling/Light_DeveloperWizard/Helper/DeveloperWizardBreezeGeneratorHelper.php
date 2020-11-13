<?php


namespace Ling\Light_DeveloperWizard\Helper;


use Ling\Bat\ArrayTool;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;

/**
 * The DeveloperWizardBreezeGeneratorHelper class.
 */
class DeveloperWizardBreezeGeneratorHelper
{


    /**
     * Create a new breeze generator configuration file, based on an internal model.
     * If the file already exists, it will be overwritten.
     *
     * The generated file will be written at the given destination, and filled with the given parameters.
     *
     * Parameters are:
     *
     * - galaxyName: string, the name of the galaxy.
     * - planetName: string, the name of the planet (light plugin)
     * - createFilePath: string, the absolute path to the create file.
     * - prefix: string, the table prefix
     * - ?otherPrefixes: array, other prefixes to use (apart from the given table prefix), see the @page(ling breeze generator 2 documentation) for more info
     *
     *
     * See the @page(Light_DeveloperWizard conception notes) for more details.
     *
     *
     *
     *
     *
     *
     * @param string $dst
     * @param array $params
     * @throws \Exception
     */
    public static function spawnConfFile(string $dst, array $params = [])
    {
        $missingKeys = [];
        ArrayTool::arrayKeyExistAll([
            "galaxyName",
            "planetName",
            "createFilePath",
            "prefix",
        ], $params, false, $missingKeys);
        if ($missingKeys) {
            throw new LightDeveloperWizardException("Missing keys: " . implode(", ", $missingKeys));
        }


        $galaxyName = $params['galaxyName'];
        $planetName = $params['planetName'];
        $createFilePath = $params['createFilePath'];
        $prefix = $params['prefix'];
        $otherPrefixes = $params["otherPrefixes"] ?? [];
        $apiName = CaseTool::toFlexiblePascal($planetName);

        $sOtherPrefixes = '';
        if ($otherPrefixes) {
            foreach ($otherPrefixes as $otherPrefix) {
                $sOtherPrefixes .= str_repeat(' ', 12) . '- ' . $otherPrefix . PHP_EOL;
            }
        }


        $tpl = __DIR__ . "/../assets/conf-template/data/Light_BreezeGenerator/breeze-conf.byml";
        $content = file_get_contents($tpl);
        $content = str_replace([
            '$file',
            '$prefix',
            '# $otherprefixes',
            '$galaxyName',
            '$planetName',
            '$apiName',
        ], [
            $createFilePath,
            $prefix,
            $sOtherPrefixes,
            $galaxyName,
            $planetName,
            $apiName,
        ], $content);


        FileSystemTool::mkfile($dst, $content);
    }


}