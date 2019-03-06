<?php


namespace Ling\Explorer\Util;


use Ling\BabyYaml\BabyYamlUtil;

class ExplorerUtil
{


    public static function getDirectDependencies($planetDir, array &$errors = [])
    {
        $ret = [];
        if (is_dir($planetDir)) {
            $packageInfoFile = $planetDir . "/package-info.yml";
            $planetName = basename($planetDir);
            if (file_exists($packageInfoFile)) {
                try {
                    $info = BabyYamlUtil::readFile($packageInfoFile);
                    if (array_key_exists('dependencies', $info)) {

                        foreach ($info['dependencies'] as $dep) {
                            $p = explode('::/', $dep, 2);
                            if (2 === count($p)) {
                                $a = explode(':', $p[1], 2);
                                $ret[] = $p[0] . '::/' . $a[0];
                            } else {
                                $errors[] = "$planetName: invalid dependency:  symbol '::/' not found";
                            }
                        }
                    }
                } catch (\Exception $e) {
                    $errors[] = $planetName . ": " . $e->getMessage();
                }
            }
        }
        return $ret;
    }

    /**
     * Return an array of planetName => $importerIdentifier::$planetIdentifier
     *
     */
    public static function getDirectDependenciesByUniverse($planetsDir, array &$errors = [])
    {
        $ret = [];
        $files = scandir($planetsDir);
        foreach ($files as $planet) {
            if ('.' !== $planet && '..' !== $planet) {
                $file = $planetsDir . "/" . $planet;
                $err = [];
                $ret[$planet] = self::getDirectDependencies($file, $err);
                $errors = array_merge($errors, $err);

            }
        }
        return $ret;
    }


}