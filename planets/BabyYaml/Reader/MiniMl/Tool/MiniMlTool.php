<?php


namespace BabyYaml\Reader\MiniMl\Tool;

use BabyYaml\Reader\MiniMl\Formatter\ConsoleMiniMlFormatter;
use BabyYaml\Reader\MiniMl\Formatter\HtmlMiniMlFormatter;
use BabyYaml\Reader\MiniMl\Formatter\StripMiniMlFormatter;
use BabyYaml\Reader\MiniMl\Util\MiniMlFormatterUtil;


/**
 * MiniMlTool
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class MiniMlTool
{
    private static $formatterUtil;

    /**
     * @param $string
     * @param string $format :
     *                  - strip
     *                  - html
     *                  - console
     *                  - auto (console if cli environment, or html otherwise)
     */
    public static function format($string, $format = 'auto')
    {
        if ('auto' === $format) {
            if ('cli' === PHP_SAPI) {
                $format = 'console';
            }
            else {
                $format = 'html';
            }
        }
        return self::getInst()->format($string, $format);
    }


    /**
     * @return MiniMlFormatterUtil
     */
    private static function getInst()
    {
        if (null === self::$formatterUtil) {
            self::$formatterUtil = MiniMlFormatterUtil::create()->setFormatters([
                'strip' => new StripMiniMlFormatter(),
                'html' => new HtmlMiniMlFormatter(),
                'console' => new ConsoleMiniMlFormatter(),
            ]);
        }
        return self::$formatterUtil;
    }
}
