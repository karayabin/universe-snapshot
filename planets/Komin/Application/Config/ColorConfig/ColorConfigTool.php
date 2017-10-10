<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\Config\ColorConfig;

use BeeFramework\Application\Config\Util\FeeConfig;
use BeeFramework\Notation\PhpArray\ArrayWithSelfReferences\ArrayWithSelfReferences;


/**
 * ColorConfigTool
 * @author Lingtalfi
 * 2014-12-06
 * [komin: colorConfig™]
 *
 */
class ColorConfigTool
{


    /**
     * @return array|false, false is only returned when an error occurred.
     */
    public static function parseFile($f, array $options = [])
    {
        $options = array_replace([
            '_varsKey' => '_vars',
            '_varsSymbol' => '§',
        ], $options);

        if (false !== $c = FeeConfig::readFile($f)) {


            // variable "color"
            $varKey = $options['_varsKey'];
            if (array_key_exists($varKey, $c)) {
                $vars = $c[$varKey];
                // resolve self references
                $awsr = ArrayWithSelfReferences::create(['symbol' => $options['_varsSymbol']]);
                $vars = $awsr->resolve($vars);
                unset($c[$varKey]);
                $awsr->apply($vars, $c);
            }


            return $c;
        }
        return false;
    }


}
