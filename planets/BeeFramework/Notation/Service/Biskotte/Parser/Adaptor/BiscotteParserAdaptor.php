<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\Adaptor;


/**
 * BiscotteParserAdaptor
 * @author Lingtalfi
 * 2015-06-10
 *
 *
 *
 */
abstract class BiscotteParserAdaptor implements BiscotteParserAdaptorInterface
{

    abstract protected function getName();

    abstract protected function getContent($content);

    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS BiscotteParserAdaptorInterface
    //------------------------------------------------------------------------------/
    public function adapt(&$v)
    {
        if (
            '@' === $v[0] &&
            preg_match('!^@([a-zA-Z0-9_]+)\>(.+)$!', $v, $m)
        ) {
            $name = $m[1];
            $content = $m[2];
            if ($this->getName() === $name) {
                $v = $this->getContent($content);
            }
        }
    }
}
