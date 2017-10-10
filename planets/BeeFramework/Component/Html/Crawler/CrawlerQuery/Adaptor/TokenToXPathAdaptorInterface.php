<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\CrawlerQuery\Adaptor;


/**
 * TokenToXPathAdaptorInterface
 * @author Lingtalfi
 * 2015-06-19
 *
 */
interface TokenToXPathAdaptorInterface
{


    /**
     * @param array $tokens
     * @return string
     */
    public function adapt(array $tokens);

}
