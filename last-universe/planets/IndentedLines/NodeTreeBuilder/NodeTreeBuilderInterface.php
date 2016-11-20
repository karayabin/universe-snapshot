<?php


namespace IndentedLines\NodeTreeBuilder;

use IndentedLines\Node\NodeInterface;


/**
 * NodeTreeBuilderInterface
 * @author Lingtalfi
 * 2015-11-19
 * 
 * 
 * 
 * Read a string of "indented lines" and returns the corresponding Node object.
 * 
 * 
 *
 */
interface NodeTreeBuilderInterface
{

    /**
     * @return NodeInterface|false
     *          false is returned in case of failure.
     *          Syntax error is always considered a failure.
     */
    public function buildNode($string);
}
