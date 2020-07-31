<?php


namespace Ling\SimplePdoWrapper\Util;


/**
 * The Limit class.
 *
 */
class Limit
{


    /**
     * This property holds the offset for this instance.
     * @var int
     */
    protected $offset;

    /**
     * This property holds the rowCount for this instance.
     * @var int
     */
    protected $rowCount;


    /**
     * Builds the Limit instance.
     */
    public function __construct()
    {
        $this->offset = 0;
        $this->rowCount = 0;
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
     * Sets the offset and rowcount, and returns itself for chaining.
     *
     * @param int $offset
     * @param int $rowCount
     * @return $this
     */
    public function set(int $offset, int $rowCount): self
    {
        $this->offset = $offset;
        $this->rowCount = $rowCount;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Appends the relevant sql to the given query.
     *
     * Note: the "LIMIT" keyword is NOT appended by this method.
     *
     * Note2: the mysql flavour is assumed.
     *
     *
     * @param string $query
     * @param string|null $flavour
     */
    public function apply(string &$query, string $flavour = null)
    {
        if (null === $flavour) {
            $flavour = 'mysql'; // I only used mysql so far, so, don't need to do anything yet...
        }
        $query .= ' ' . $this->offset . ", " . $this->rowCount;
    }

    /**
     * Returns the offset of this instance.
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Returns the rowCount of this instance.
     *
     * @return int
     */
    public function getRowCount(): int
    {
        return $this->rowCount;
    }


}