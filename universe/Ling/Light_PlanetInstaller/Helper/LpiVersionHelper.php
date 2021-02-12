<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface;
use Ling\Light_PlanetInstaller\Repository\LpiWebRepository;

/**
 * The LpiVersionHelper class.
 */
class LpiVersionHelper
{


    /**
     * Returns an information array about the given mini version expression.
     *
     * The array contains:
     * - 0: the absolute version number
     * - 1: the modifier symbol, or null if none
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     *
     * @param string $miniVersionExpr
     * @return array
     * @throws \Exception
     */
    public static function extractMiniVersion(string $miniVersionExpr): array
    {
        $modifierSymbol = substr($miniVersionExpr, -1);
        if (true === in_array($modifierSymbol, ['+', '-'], true)) {
            $versionNumber = substr($miniVersionExpr, 0, -1);
        } else {
            $versionNumber = $miniVersionExpr;
            $modifierSymbol = null;
        }
        return [
            $versionNumber,
            $modifierSymbol,
        ];
    }

    /**
     * Returns whether the given modifierSymbol is a polarity symbol.
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * @param string $modifierSymbol
     * @return bool
     */
    public static function isPolaritySymbol(string $modifierSymbol): bool
    {
        return (true === in_array($modifierSymbol, ['+', '-'], true));
    }


    /**
     * Returns whether the given real version meets the expectations of the given mini version expression.
     *
     * So, if v is the real version, and c the mini version expression challenger, we have:
     *
     * - v: 1.4.0, c: 1.6.0     => false
     * - v: 1.4.0, c: 1.4.0     => true
     * - v: 1.4.0, c: 1.2.0     => false
     *
     * - v: 1.4.0, c: 1.6.0+    => false
     * - v: 1.4.0, c: 1.4.0+    => true
     * - v: 1.4.0, c: 1.2.0+    => true
     *
     *
     * If the real version and the challenger don't have the same format, they are converted to the same format first,
     * which is the format of the longest string.
     * So for instance if v: 1.4 and c: 1.4.0, then v is first converted to 1.4.0 before the algorithm kicks in.
     *
     * The $highestVersion variable is filled with whichever version is the highest, in its non-equalized form.
     * If both versions are equal, any of them fills the $highestVersion variable.
     *
     *
     *
     * @param string $realVersion
     * @param string $miniVersionExpr
     * @param ?string $highestVersion
     * @return bool
     */
    public static function versionMeetsExpectations(string $realVersion, string $miniVersionExpr, string &$highestVersion = null): bool
    {

        $hasPlus = ("+" === substr($miniVersionExpr, -1));
        $miniVersion = rtrim($miniVersionExpr, '+');

        $originalRealVersion = $realVersion;
        $originalMiniVersion = $miniVersion;


        self::equalizeVersionNumbers($realVersion, $miniVersion);


        if (true === self::isGreaterThan($realVersion, $miniVersion)) {
            $highestVersion = $originalRealVersion;
        } else {
            $highestVersion = $originalMiniVersion;
        }


        if (false === $hasPlus) {
            return $realVersion === $miniVersion;
        }
        return $realVersion >= $miniVersion;
    }


    /**
     * Returns whether real version 1 is greater than or equal to real version 2.
     *
     *
     * @param string $v1
     * @param string $v2
     * @return bool
     */
    public static function isGreaterThan(string $v1, string $v2): bool
    {
        $p1 = explode(".", $v1);
        $p2 = explode(".", $v2);
        foreach ($p1 as $index => $number) {

            if (true === array_key_exists($index, $p2)) {
                $p2Number = $p2[$index];
            } else {
                $p2Number = 0;
            }
            if ($p2Number > $number) {
                return false;
            }
        }
        return true;
    }

    /**
     *
     * Returns whether the real version should be replaced with the challenger version expression.
     *
     * The "last" keyword is not allowed in versionExpr.
     *
     *
     *
     * In this method, the following are true:
     *
     * - 1.6.2   1.6.2+         no: the real version is ok.
     * - 1.6.4  1.6.4           no: the real version is ok
     * - 1.6.4  1.7.4
     *
     * "last" always win, except against another "last" (in which case it's a draw).
     *
     *
     * @param string $realVersion
     * @param string $versionExpr
     * @return bool
     */
    public static function shouldBeReplaced(string $realVersion, string $versionExpr): bool
    {
        $realChallenger = rtrim($versionExpr, "+");
        return self::compare($realChallenger, $realVersion);
    }


    /**
     * Returns whether version 1 is strictly greater than version 2.
     * If orEqual flag is true, returns whether v1 is greater or equal to v2.
     *
     *
     * @param string $realVersion1
     * @param string $realVersion2
     * @param bool $orEqual
     * @return bool
     */
    public static function compare(string $realVersion1, string $realVersion2, bool $orEqual = false): bool
    {
        self::equalizeVersionNumbers($realVersion1, $realVersion2);
        if (false === $orEqual) {
            return $realVersion1 > $realVersion2;
        }
        return $realVersion1 >= $realVersion2;
    }


    /**
     * Returns the first real version number of the planet that matches $versionExpr, or false if not possible.
     *
     *
     * @param string $planetDot
     * @param $versionExpr
     * @param LpiRepositoryInterface $repository
     * @return false|string
     */
    public static function getFirstMatchingVersionByRepository(string $planetDot, $versionExpr, LpiRepositoryInterface $repository)
    {
        if ('last' === $versionExpr) {
            if ($repository instanceof LpiWebRepository) {
                /**
                 * Note: we don't use the repository instance here because it doesn't have the method we want,
                 * but it doesn't matter, in the end we fetch the "last" version from the web anyway.
                 */
                return LpiWebHelper::getPlanetCurrentVersion($planetDot);
            }
            /**
             * See LpiRepositoryUtil->getFirstMatchingInfo for how it's supposed to work.
             * Basically, "last" means fetch the web.
             *
             */
            $sClass = get_class($repository);
            throw new LightPlanetInstallerException("The \"last\" keyword is only allowed with a LpiWebRepository instance, $sClass given.");
        } else {
            if ('+' === substr($versionExpr, -1)) {
                $minVersion = substr($versionExpr, 0, -1);
                return $repository->getFirstVersionWithMinimumNumber($planetDot, $minVersion);
            } else {
                $realVersion = $versionExpr;
                if (true === $repository->hasPlanet($planetDot, $realVersion)) {
                    return $realVersion;
                }
            }
        }
        return false;
    }


    /**
     * Returns whether the given versionExpression ends with the plus symbol.
     *
     * @param string $versionExpr
     * @return bool
     */
    public static function isPlus(string $versionExpr): bool
    {
        return '+' === substr($versionExpr, -1);
    }


    /**
     * Returns whether the given versionExpression ends with the minus symbol.
     *
     * @param string $versionExpr
     * @return bool
     */
    public static function isMinus(string $versionExpr): bool
    {
        return '-' === substr($versionExpr, -1);
    }


    /**
     * Removes the trailing plus symbol from the given version expression and returns the result.
     *
     * @param string $versionExpr
     * @return string
     */
    public static function removeModifierSymbol(string $versionExpr): string
    {
        return rtrim($versionExpr, "+-");
    }


    /**
     * Equalizes the two given real version numbers, so that they have the same number of dot separated components.
     *
     *
     * @param string $realVersion1
     * @param string $realVersion2
     */
    public static function equalizeVersionNumbers(string &$realVersion1, string &$realVersion2)
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

    //--------------------------------------------
    //
    //--------------------------------------------


}