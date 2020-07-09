<?php


namespace Ling\JumboExploder\Scope;


/**
 * The JumboExploderScope class.
 */
class JumboExploderScope
{

    /**
     * This property holds the startExpression for this instance.
     * @var string
     */
    protected $startExpression;

    /**
     * This property holds the endExpression for this instance.
     * @var string
     */
    protected $endExpression;


    /**
     * This property holds the escapeChar for this instance.
     * @var string
     */
    protected $escapeChar;


    /**
     * Builds the JumboExploderScope instance.
     */
    public function __construct()
    {
        $this->startExpression = null;
        $this->endExpression = null;
        $this->escapeChar = null;
    }


    /**
     * Creates an instance of this class and returns it.
     * @return static
     */
    public static function create()
    {
        return new static();
    }


    /**
     * Sets the start expression of the scope, and returns the current instance.
     *
     * @param string $start
     * @return JumboExploderScope
     */
    public function setStartExpression(string $start): JumboExploderScope
    {
        $this->startExpression = $start;
        return $this;
    }

    /**
     * Sets the end expression of the scope, and returns the current instance.
     *
     * @param string $end
     * @return JumboExploderScope
     */
    public function setEndExpression(string $end): JumboExploderScope
    {
        $this->endExpression = $end;
        return $this;
    }

    /**
     * Sets the escape char of the scope, and returns the current instance.
     *
     * @param string $char
     * @return JumboExploderScope
     */
    public function setEscapeChar(string $char): JumboExploderScope
    {
        $this->escapeChar = $char;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the startExpression of this instance.
     *
     * @return string
     */
    public function getStartExpression(): string
    {
        return $this->startExpression;
    }

    /**
     * Returns the endExpression of this instance.
     *
     * @return string
     */
    public function getEndExpression(): string
    {
        return $this->endExpression;
    }

    /**
     * Returns the escapeChar of this instance.
     *
     * @return string
     */
    public function getEscapeChar(): ?string
    {
        return $this->escapeChar;
    }




}