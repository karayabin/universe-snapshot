<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyYaml\IndentedLines;

use BeeFramework\Notation\File\IndentedLines\NodeTreeBuilder\NodeTreeBuilder;


/**
 * BabyYamlNodeTreeBuilder
 * @author Lingtalfi
 * 2015-02-28
 *
 */
class BabyYamlNodeTreeBuilder extends NodeTreeBuilder
{


    public function __construct(array $options = [])
    {
        $options['indentChar'] = ' ';
        $options['nbIndentCharPerLevel'] = 4;
        $options['hasLeadingIndentChar'] = false;
        parent::__construct($options);
    }


}
