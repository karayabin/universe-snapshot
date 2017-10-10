<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Matcher\NodeMatcher;


/**
 * NodeMatcher
 * @author Lingtalfi
 * 2015-02-01
 *
 */
class NodeMatcher implements NodeMatcherInterface
{

    /**
     * callback to execute on each node, returns a boolean
     */
    protected $nodeMatcher;
    protected $nodes;

    public function __construct(array $nodes, $nodeMatcher = null)
    {
        if (!is_callable($nodeMatcher)) {
            $nodeMatcher = function (array $props, array $node) {
                return false;
            };
        }
        $this->setNodeMatcher($nodeMatcher);
        $this->nodes = $nodes;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS NodeMatcherInterface
    //------------------------------------------------------------------------------/
    public function match(array $props)
    {
        foreach ($this->nodes as $node) {
            if (true === call_user_func($this->nodeMatcher, $props, $node)) {
                return $node;
            }
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setNodeMatcher($nodeMatcher)
    {
        if (is_callable($nodeMatcher)) {
            $this->nodeMatcher = $nodeMatcher;
        }
        else {
            throw new \InvalidArgumentException("nodeMatcher must be a callable");
        }
    }


}
