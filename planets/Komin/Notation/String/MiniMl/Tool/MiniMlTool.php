<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Notation\String\MiniMl\Tool;

use Komin\Notation\String\MiniMl\Formatter\ConsoleMiniMlFormatter;
use Komin\Notation\String\MiniMl\Formatter\HtmlMiniMlFormatter;
use Komin\Notation\String\MiniMl\Formatter\StripMiniMlFormatter;
use Komin\Notation\String\MiniMl\Util\MiniMlFormatterUtil;


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
