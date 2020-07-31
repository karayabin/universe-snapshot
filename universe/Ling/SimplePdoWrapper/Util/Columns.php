<?php


namespace Ling\SimplePdoWrapper\Util;


/**
 * The Columns class.
 *
 */
class Columns
{


    /**
     * This property holds the mode.
     *
     * The mode can be one of:
     * - default
     * - singleColumn
     *
     *
     * In default mode, the query shall reduce the rows to a single column, which name is defined
     * with the columns property.
     *
     *
     *
     * @var string
     */
    protected $mode;


    /**
     * This property holds the columns for this instance.
     * @var array
     */
    protected $columns;


    /**
     * Builds the Columns instance.
     */
    public function __construct()
    {
        $this->columns = [];
        $this->mode = 'default';
    }


    /**
     * Creates a new instance and returns it.
     * @return static
     */
    public static function inst()
    {
        return new static();
    }


    /**
     * Sets the columns, and returns itself for chaining.
     *
     * The columns can be either a string representing the column,
     * or an array of columns.
     *
     *
     * @param array|string $columns
     * @return $this
     */
    public function set($columns): self
    {
        if (false === is_array($columns)) {
            $columns = [$columns];
        }

        $this->columns = $columns;
        return $this;
    }


    /**
     * Sets the mode to singleColumn, and returns itself for chaining.
     *
     * @return $this
     */
    public function singleColumn(): self
    {
        $this->mode = 'singleColumn';
        return $this;
    }

    /**
     * Returns the columns of this instance.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Appends the relevant sql to the given query, and returns itself for chaining.
     *
     *
     * @param string $query
     */
    public function apply(string &$query): self
    {
        $query .= implode(', ', $this->columns);
        return $this;
    }

    /**
     * Returns the mode of this instance.
     *
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }


}