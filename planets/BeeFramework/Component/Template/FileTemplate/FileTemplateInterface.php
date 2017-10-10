<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Template\FileTemplate;


/**
 * FileTemplateInterface
 * @author Lingtalfi
 * 2015-03-07
 *
 */
interface FileTemplateInterface
{

    public function getContent(array $tags=[]);
}
