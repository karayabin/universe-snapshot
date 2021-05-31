<?php


namespace Ling\Light_PlanetInstaller\Helper;

/**
 * The LpiVersionHelper class.
 */
class LpiVersionHelper
{


    /**
     * Compares the two given version numbers, and returns the mathematical symbol indicating the relationship between those numbers.
     * Possible outputs are:
     *
     * - > ( version1 > version2)
     * - < ( version1 < version2)
     * - = ( version1 = version2)
     *
     *
     *
     * @param string $versionNumber1
     * @param $versionNumber2
     * @return string
     */
    public static function compare(string $versionNumber1, $versionNumber2): string
    {
        self::equalizeVersionNumbers($versionNumber1, $versionNumber2);


        $p1 = explode(".", $versionNumber1);
        $p2 = explode(".", $versionNumber2);

        $f = function ($v) {
            return (int)$v;
        };
        $p1 = array_map($f, $p1);
        $p2 = array_map($f, $p2);


        foreach ($p1 as $k => $n1) {
            $n2 = $p2[$k];

            if ($n1 > $n2) {
                return '>';
            } elseif ($n1 < $n2) {
                return '<';
            }
        }
        return '=';
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Equalizes the two given real version numbers, so that they have the same number of dot separated components.
     *
     *
     * @param string $realVersion1
     * @param string $realVersion2
     */
    private static function equalizeVersionNumbers(string &$realVersion1, string &$realVersion2)
    {
        $p1 = explode(".", $realVersion1);
        $p2 = explode(".", $realVersion2);
        $c1 = count($p1);
        $c2 = count($p2);


        /**
         * equalizing, just in case two version numbers don't have the same subnumbers (i.e. 1.4.5 vs 1.4)
         */
        if ($c1 !== $c2) {
            if ($c1 > $c2) {
                $offset = $c1 - $c2;
                for ($i = 0; $i < $offset; $i++) {
                    $p2[] = "0";
                }
            } else {
                $offset = $c2 - $c1;
                for ($i = 0; $i < $offset; $i++) {
                    $p1[] = "0";
                }
            }
        }

        $realVersion1 = implode('.', $p1);
        $realVersion2 = implode('.', $p2);
    }


}