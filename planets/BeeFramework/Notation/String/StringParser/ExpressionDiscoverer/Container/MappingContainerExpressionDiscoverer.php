<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container;

use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * MappingContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 *
 * 
 * 
 * By default:
 * A mapping contains entries separated by a comma (,)
 * Each entry is composed of a key and a value separated by a colon (:)
 * A mapping starts with the open bracket symbol ({)
 * A mapping ends with the close bracket symbol (})
 *
 * By default, implicit values are accepted and equals null, implicit keys are not accepted.
 *
 * You can modify this behaviour with setImplicit...() methods, or maybe change
 *                  the default values of null (involves extending this class)
 *
 *
 * By default, accepted expressions are:
 *
 *  - another mapping
 *  - quoted string with simple escape
 *  - hybrid
 *
 * 
 *
 * 
 *
 */
class MappingContainerExpressionDiscoverer extends MandatoryKeyContainerExpressionDiscoverer
{

    public function __construct()
    {
        parent::__construct();

        $this
            ->setBeginSep('{')
            ->setEndSep('}')
            ->setKeyValueSep(':')
            ->setValueSep(',')
            ->setNotSignificantSymbols([' ', "\t"])
            ->setImplicitValues(true)
            ->setImplicitKeys(false);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getDiscoverers()
    {
        if (empty(parent::getDiscoverers())) {
            $this->setDiscoverers($this->getDefaultDiscoverers());
        }
        return parent::getDiscoverers();
    }

    public function getKeyDiscoverers()
    {
        if (empty(parent::getKeyDiscoverers())) {
            $this->setKeyDiscoverers($this->getDefaultKeyDiscoverers());
        }
        return parent::getKeyDiscoverers();
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getDefaultKeyDiscoverers()
    {
        $quote = new SimpleQuoteExpressionDiscoverer();
        return [
            $quote,
            HybridExpressionDiscoverer::create(),
        ];
    }

    private function getDefaultDiscoverers()
    {
        $modelMap = new ExpressionDiscovererModel($this);
        $quote = new SimpleQuoteExpressionDiscoverer();
        return [
            $modelMap,
            $quote,
            HybridExpressionDiscoverer::create(),
        ];
    }

}
