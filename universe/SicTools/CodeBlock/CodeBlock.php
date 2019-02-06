<?php

namespace SicTools\CodeBlock;


/**
 * The CodeBlock class is a container for php code.
 *
 */
class CodeBlock
{

    /**
     * This property holds the array of statements for this code block instance.
     * @var array
     */
    private $statements;


    /**
     * Builds the CodeBlock instance.
     */
    public function __construct()
    {
        $this->statements = [];
    }


    /**
     * Adds a statement to the code block.
     * @param $statement
     */
    public function addStatement($statement)
    {
        $this->statements[] = $statement;
    }

    /**
     * Returns all the statements attached to this code block.
     *
     * @return array
     */
    public function getStatements()
    {
        return $this->statements;
    }
}