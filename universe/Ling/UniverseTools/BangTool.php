<?php


namespace Ling\UniverseTools;


use Ling\Bat\FileSystemTool;

/**
 *
 * The BangTool class.
 *
 *
 */
class BangTool
{


    /**
     * Bangs the universe directory.
     *
     * See https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#bang for more details.
     *
     * @param string $universeDir
     */
    public static function bang(string $universeDir)
    {
        $bigBangSrc = __DIR__ . '/assets/universe-basic-2021-05-25/bigbang.php';
        $bigBangDst = $universeDir . "/bigbang.php";
        $bumbleBeeSrc = __DIR__ . '/assets/universe-basic-2021-05-25/BumbleBee';
        $bumbleBeeDst = $universeDir . '/Ling/BumbleBee';

        if (false === is_file($bigBangDst)) {
            $content = file_get_contents($bigBangSrc);
            FileSystemTool::mkfile($bigBangDst, $content);
        }

        if (false === is_dir($bumbleBeeDst)) {
            FileSystemTool::copyDir($bumbleBeeSrc, $bumbleBeeDst);
        }
    }


    /**
     * Bangs the given application directory.
     *
     * See https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#bang for more details.
     *
     * @param string $appDir
     */
    public static function bangApp(string $appDir)
    {
        $uniDir = $appDir . "/universe";
        if (false === is_dir($uniDir)) {
            FileSystemTool::mkdir($uniDir);
        }
        self::bang($uniDir);
    }
}