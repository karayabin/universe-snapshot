<?php


namespace Ling\SimplePdoWrapper\Util;


use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperException;

/**
 * The OrderBy class.
 *
 */
class OrderBy
{


    /**
     * An array of the col/dir pairs.
     *
     * @var array
     */
    private array $colDirs;


    /**
     * Array of sort by clauses.
     * @var array
     */
    private array $cols;


    /**
     * Builds the OrderBy instance.
     */
    public function __construct()
    {
        $this->colDirs = [];
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
     * Adds a column/direction info to this instance, and returns itself for chaining.
     *
     * The direction must be one of: asc|desc.
     *
     *
     *
     *
     * @param string $col
     * @param string $dir
     * @return $this
     */
    public function add(string $col, string $dir): self
    {
        if (false === in_array($dir, ['asc', 'desc'])) {
            $this->error("The direction must be either asc or desc (\"$dir\" given).");
        }
        $this->colDirs[] = [$col, $dir];
        return $this;
    }


    /**
     * Adds an orderBy expression, and returns itself for chaining.
     *
     * @param string $orderByExpression
     * @return $this
     */
    public function addExpression(string $orderByExpression): self
    {
        $this->cols[] = $orderByExpression;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Appends the relevant sql to the given query.
     *
     * Note: the "ORDER BY" keyword is NOT appended by this method.
     *
     *
     * @param string $query
     */
    public function apply(string &$query)
    {

        $n = false;
        foreach ($this->colDirs as $colDir) {
            if (true === $n) {
                $query .= ', ';
            }
            list($col, $dir) = $colDir;
            $query .= '`' . $col . '` ' . $dir;
            $n = true;
        }

        $n = false;
        foreach ($this->cols as $expr) {
            if (true === $n) {
                $query .= ', ';
            }
            $query .= $expr;
            $n = true;
        }
    }

    /**
     * Returns the colDirs of this instance.
     *
     * @return array
     */
    public function getColDirs(): array
    {
        return $this->colDirs;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new SimplePdoWrapperException($msg);
    }
}