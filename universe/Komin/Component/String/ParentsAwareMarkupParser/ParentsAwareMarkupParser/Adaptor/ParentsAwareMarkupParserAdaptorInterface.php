<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\String\ParentsAwareMarkupParser\ParentsAwareMarkupParser\Adaptor;


/**
 * ParentsAwareMarkupParserAdaptorInterface
 * @author Lingtalfi
 * 2015-05-21
 *
 */
interface ParentsAwareMarkupParserAdaptorInterface
{


    public function getStartTagValue($identifier, array $parents);

    public function getStopTagValue($identifier, array $parents);
}
