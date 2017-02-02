<?php


namespace Explorer\Util;


class MaculusExplorerUtil
{


    /**
     * returns an array containing the following:
     *
     * - importerType: string, the importer type
     * - universeName: string, the universe name
     * - planetName: string, the planet name
     * - versionNumber: string|null, the version number
     * - versionComment: string|null, the version comment
     *
     * @throws \Exception $e
     */
    public static function getDependencyInfo($dependency)
    {
        $p = explode('::/', $dependency, 2);
        if (2 !== count($p)) {
            throw new \Exception("Invalid dependency syntax, missing the ::/ symbol");
        }
        $versionNumber = null;
        $versionComment = null;
        $importerType = $p[0];
        $q = explode(':', $p[1], 2);
        $planetIdentifier = $q[0];
        $r = explode('/', $planetIdentifier);
        if (2 !== count($r)) {
            throw new \Exception("the planetIdentifier must contain a slash /");
        }
        $universeName = $r[0];
        $planetName = $r[1];
        if (array_key_exists(1, $q)) {
            $s = explode('(', $q[1], 2);
            $versionNumber = $s[0];
            if (2 === count($s)) {
                $versionComment = $s[1];
            }
        }
        return [
            'importerType' => $importerType,
            'universeName' => $universeName,
            'planetName' => $planetName,
            'versionNumber' => $versionNumber,
            'versionComment' => $versionComment,
        ];
    }
}



