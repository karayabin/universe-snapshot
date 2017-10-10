<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Text\TextConvertor;

use BeeFramework\Component\Text\TextConvertor\Filter\TextConvertorFilterInterface;


/**
 * TextConvertor
 * @author Lingtalfi
 * 2014-08-29
 *
 */
class TextConvertor implements TextConvertorInterface
{


    protected $filters;

    public function __construct()
    {
        $this->filters = [];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TextConvertorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return string
     */
    public function convert($string)
    {
        foreach ($this->filters as $filter) {
            /**
             * @var TextConvertorFilterInterface $filter
             */
            $string = $filter->filter($string);
        }
        return $string;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setFilter(TextConvertorFilterInterface $filter)
    {
        $this->filters[] = $filter;
    }

    public function getFilters()
    {
        return $this->filters;
    }


}
