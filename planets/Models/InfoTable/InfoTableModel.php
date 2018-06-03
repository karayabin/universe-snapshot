<?php


namespace Models\InfoTable;


/**
 *
 * This class is appropriate to display small finite lists.
 * It's designed for lists with no order, no filters, no pagination, just a simple informative table.
 *
 *
 *
 * This is an interface to the following array:
 *
 * - headers: array of labels, if empty, means no headers
 * - rows: array of rows, each row is an array with the same structure.
 *              Note: the keys can be numeric or names, names are only required if you are using colTransformers or hidden
 *
 * - ?colTransformers: array of colName => callback, transform the entry which
 *          key is colName using the given callback.
 *          The callback has the following signature:
 *
 *
 *              fn ( value, row ): string|null
 * - ?hidden: array of colName to not display (but they will be accessible via colTransformers)
 *
 *
 *
 *
 */
class InfoTableModel
{
    protected $headers;
    protected $rows;
    protected $colTransformers;
    protected $hidden;

    public function __construct()
    {
        $this->headers = [];
        $this->rows = [];
        $this->colTransformers = [];
        $this->hidden = [];
    }

    public static function create()
    {
        return new static();
    }

    public function headers(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function rows(array $rows)
    {
        $this->rows = $rows;
        return $this;
    }

    public function colTransfomers(array $colTransformers)
    {
        $this->colTransformers = $colTransformers;
        return $this;
    }

    public function hidden(array $hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @return array
     */
    public function getColTransformers(): array
    {
        return $this->colTransformers;
    }


    /**
     * @return array
     */
    public function getHidden(): array
    {
        return $this->hidden;
    }

    public function getModel()
    {
        return [
            'headers' => $this->headers,
            'rows' => $this->rows,
            'colTransformers' => $this->colTransformers,
            'hidden' => $this->hidden,
        ];
    }

}