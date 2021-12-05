<?php


namespace Ling\Light_Kit_Store\Api\Generated\Classes;

use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_Kit_Store\Api\Custom\Classes\CustomLightKitStoreBaseApi;
use Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceLineApiInterface;



/**
 * The InvoiceLineApi class.
 */
class InvoiceLineApi extends CustomLightKitStoreBaseApi implements InvoiceLineApiInterface
{


    /**
     * Builds the InvoiceLineApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lks_invoice_line";
    }






    /**
     * @implementation
     * @inheritDoc
     */
    public function insertInvoiceLine(array $invoiceLine, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;

        $invoiceLine = array_replace($this->getDefaultValues(), $invoiceLine);

        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $invoiceLine);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,

            ];
            return $ric;

        } catch (\PDOException $e) {
            $errorInfo = $e->errorInfo;
        } catch (SimplePdoWrapperQueryException $e) {
            $errorInfo = $e->getPrevious()->errorInfo;
        }


        if (null !== $errorInfo) {
            if ('23000' === $errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $invoiceLine);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return $res['id'];
                }
                return [
                    'id' => $res["id"],

                ];
            }
            throw $e;
        }

        return false;
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function insertInvoiceLines(array $invoiceLines, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($invoiceLines as $invoiceLine) {
            $res = $this->insertInvoiceLine($invoiceLine, $ignoreDuplicate, $returnRic);
            if (false === $res) {
                return false;
            }
            $ret[] = $res;
        }
        return $ret;
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function fetchAll(array $components = []): array
    {
        $markers = [];
        $q = '';
        $options = $this->fetchRoutine($q, $markers, $components);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }
        return $this->pdoWrapper->fetchAll($q, $markers, $fetchStyle);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function fetch(array $components = [])
    {
        $markers = [];
        $q = '';
        $options = $this->fetchRoutine($q, $markers, $components);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }
        return $this->pdoWrapper->fetch($q, $markers, $fetchStyle);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLineById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where id=:id", [
            "id" => $id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with id=$id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLine($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);


        $ret = $this->pdoWrapper->fetch($q, $markers);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                $e = new \RuntimeException("Row not found, inspect the exception for more details.");
                $e->where = $where;
                $e->q = $q;
                $e->markers = $markers;
                throw $e;
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }



    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLines($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLinesColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLinesColumns($columns, $where, array $markers = [])
    {
        $sCols = $columns;
        if (is_array($sCols)) {
            $sCols = '`' . implode("`,`", $columns) . '`';
        }
        $q = "select $sCols  from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLinesKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }




    /**
     * @implementation
     * @inheritDoc
     */
    public function getInvoiceLinesByInvoiceId(string $invoiceId, array $components = []): array
    {
        $markers = [
            ":invoice_id" => $invoiceId,
        ];
        $q = "
        select * from `$this->table`
        where `invoice_id`=:invoice_id
        ";
        $options = $this->fetchRoutine($q, $markers, $components, [
            'whereKeyword' => 'and',
        ]);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }

        return $this->pdoWrapper->fetchAll($q, $markers, $fetchStyle);
    }












    /**
     * @implementation
     * @inheritDoc
     */
    public function getAllIds(): array
    { 
         return $this->pdoWrapper->fetchAll("select id from `$this->table`", [], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function updateInvoiceLineById(int $id, array $invoiceLine, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $invoiceLine, array_merge([
            "id" => $id,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     * @inheritDoc
     */
    public function updateInvoiceLine(array $invoiceLine, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $invoiceLine, $where, $markers);
    }



    /**
     * @implementation
     * @inheritDoc
     */
    public function delete($where = null, array $markers = [])
    {
        return $this->pdoWrapper->delete($this->table, $where, $markers);

    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteInvoiceLineById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }



    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteInvoiceLineByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }




    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteInvoiceLineByInvoiceId(int $invoiceId)
    {
        $this->pdoWrapper->delete($this->table, [
            "invoice_id" => $invoiceId,
        ]);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the array of default values for this instance.
     *
     * @overrideMe
     * @return array
     */
    protected function getDefaultValues(): array
    {
        return [
        
            'id' => NULL,
            'invoice_id' => '0',
            'product_reference' => '',
            'product_name' => '',
            'quantity' => '0',
            'unit_price_in_euro' => '0.0',
        
        ];
    }

    /**
     * Appends the given components to the given query, and returns an array of options.
     *
     * The options are:
     *
     * - singleColumn: bool, whether the singleColumn mode was triggered with the Columns component
     *
     * Available options are:
     * - whereKeyword: string=where, the where keyword to use in the query.
     *
     *
     * @param string $q
     * @param array $markers
     * @param array $components
     * @param array $options
     * @return array
     * @throws \Exception
     */
    protected function fetchRoutine(string &$q, array &$markers, array $components, array $options = []): array
    {

        $whereKeyword = $options['whereKeyword'] ?? 'where';


        $sWhere = '';
        $sCols = '';
        $sOrderBy = '';
        $sLimit = '';
        $singleColumn = false;

        foreach ($components as $component) {
            if ($component instanceof Columns) {
                $component->apply($sCols);
                $mode = $component->getMode();
                if ('singleColumn' === $mode) {
                    $singleColumn = true;
                }
            } elseif ($component instanceof Where) {
                SimplePdoWrapper::addWhereSubStmt($sWhere, $markers, $component, [
                    'whereKeyword' => $whereKeyword,
                ]);
            } elseif ($component instanceof OrderBy) {
                $sOrderBy .= PHP_EOL . ' ORDER BY ';
                $component->apply($sOrderBy);
            } elseif ($component instanceof Limit) {
                $sOrderBy .= PHP_EOL . ' LIMIT ';
                $component->apply($sOrderBy);
            }
        }


        if ('' === $sCols) {
            $sCols = '*';
        }


        if ('' === $q) {
            $q = "select $sCols from `$this->table`";
        }
        if ($sWhere) {
            $q .= $sWhere;
        }
        if ($sOrderBy) {
            $q .= $sOrderBy;
        }
        if ($sLimit) {
            $q .= $sLimit;
        }


        return [
            'singleColumn' => $singleColumn,
        ];
    }


}
