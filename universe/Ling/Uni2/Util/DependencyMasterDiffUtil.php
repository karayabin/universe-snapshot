<?php


namespace Ling\Uni2\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;

/**
 * The DependencyMasterDiffUtil class.
 * This class helps discovering differences between two dependency master files.
 * See the @page(uni-tool dependency master file) section for more info about the dependency master file.
 *
 */
class DependencyMasterDiffUtil
{


    /**
     * Collect the newest increments of the (given) newer dependency master file (compared to the
     * older dependency master file), and returns them in the form of an array.
     *
     *
     * The returned array is an array of incrementItems:
     *
     *
     * ```yaml
     * $n:
     *      planet: $galaxyName/$planetName
     *      old_version: $olderVersionNumber|null (null if the old version doesn't exist: it's a new planet)
     *      new_version: $newerVersionNumber
     * ```
     *
     *
     *
     * @param string $olderDependencyMasterFile
     * @param string $newerDependencyMasterFile
     * @return array
     */
    public function versionDiff(string $olderDependencyMasterFile, string $newerDependencyMasterFile)
    {


        $oldConf = BabyYamlUtil::readFile($olderDependencyMasterFile);
        $newConf = BabyYamlUtil::readFile($newerDependencyMasterFile);
        return $this->versionDiffByConf($oldConf, $newConf);
    }


    /**
     * Same as the versionDiff method, but takes the dependency master confs as arguments.
     *
     * @param array $oldConf
     * @param array $newConf
     * @return array
     * @method versionDiff
     */
    public function versionDiffByConf(array $oldConf, array $newConf)
    {

        $ret = [];


        $newGalaxies = $newConf['galaxies'] ?? [];
        $oldGalaxies = $oldConf['galaxies'] ?? [];
        foreach ($newGalaxies as $galaxy => $planets) {
            foreach ($planets as $planet => $item) {
                $newVersion = $item['version'] ?? null;
                if (null !== $newVersion) {

                    $oldVersion = BDotTool::getDotValue($galaxy . "." . $planet . ".version", $oldGalaxies);
                    if ($oldVersion !== $newVersion) {

                        $ret[] = [
                            "planet" => $galaxy . "/" . $planet,
                            "old_version" => $oldVersion,
                            "new_version" => $newVersion,
                        ];
                    }
                }
            }
        }

        return $ret;
    }
}