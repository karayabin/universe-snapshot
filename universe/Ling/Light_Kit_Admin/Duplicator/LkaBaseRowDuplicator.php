<?php


namespace Ling\Light_Kit_Admin\Duplicator;

/**
 * The LkaBaseRowDuplicator class.
 */
class LkaBaseRowDuplicator implements RowDuplicatorInterface
{


    /**
     * This property holds the table for this instance.
     * @var string
     */
    protected $table;


    /**
     * Builds the LkaBaseRowDuplicator instance.
     */
    public function __construct()
    {
        $this->table = null;
    }

    /**
     * Sets the table.
     *
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
    }



    //--------------------------------------------
    // RowDuplicatorInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function duplicate(array $rics, array $options = [])
    {

    }


}