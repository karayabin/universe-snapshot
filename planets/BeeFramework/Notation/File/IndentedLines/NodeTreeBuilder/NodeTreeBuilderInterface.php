<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\NodeTreeBuilder;

use BeeFramework\Notation\File\IndentedLines\Node\NodeInterface;


/**
 * NodeTreeBuilderInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface NodeTreeBuilderInterface
{
    /**
     * @return NodeInterface|false
     *
     *          false is returned in case of failure, in which case the errors
     *          are available through getErrors.
     */
    public function buildByFile($file);

    /**
     * @return NodeInterface|false
     *
     *          false is returned in case of failure, in which case the errors
     *          are available through getErrors.
     */
    public function buildByString($string);

    /**
     * @var array of codifiedError.
     *      codifiedError:
     *          0: code
     *          1: plain english message (tags are translated already)
     *          2: raw english message (tags are not translated yet)
     *          3: tags, as passed by the user
     */
    public function getErrors();
}
