<?php


namespace Ling\Light_Kit_Store\Api\Generated\Classes;

use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_Kit_Store\Api\Custom\Classes\CustomLightKitStoreBaseApi;
use Ling\Light_Kit_Store\Api\Generated\Interfaces\ItemApiInterface;



/**
 * The ItemApi class.
 */
class ItemApi extends CustomLightKitStoreBaseApi implements ItemApiInterface
{


    /**
     * Builds the ItemApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lks_item";
    }






    /**
     * @implementation
     * @inheritDoc
     */
    public function insertItem(array $item, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;

        $item = array_replace($this->getDefaultValues(), $item);

        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $item);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $item);
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
    public function insertItems(array $items, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($items as $item) {
            $res = $this->insertItem($item, $ignoreDuplicate, $returnRic);
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
    public function getItemById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getItemByProviderAndIdentifier(string $provider, string $identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where provider=:provider and identifier=:identifier", [
            "provider" => $provider,
				"identifier" => $identifier,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with provider=$provider, identifier=$identifier.");
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
    public function getItemByReference(string $reference, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where reference=:reference", [
            "reference" => $reference,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with reference=$reference.");
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
    public function getItem($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getItems($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getItemsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getItemsColumns($columns, $where, array $markers = [])
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
    public function getItemsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function getItemIdByProviderAndIdentifier(string $provider, string $identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where provider=:provider and identifier=:identifier", [
            "provider" => $provider,
			"identifier" => $identifier,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with provider=$provider, identifier=$identifier.");
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
    public function getItemIdByReference(string $reference, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where reference=:reference", [
            "reference" => $reference,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with reference=$reference.");
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
    public function getItemsByAuthorId(string $authorId, array $components = []): array
    {
        $markers = [
            ":author_id" => $authorId,
        ];
        $q = "
        select * from `$this->table`
        where `author_id`=:author_id
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
    public function updateItemById(int $id, array $item, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $item, array_merge([
            "id" => $id,

        ], $extraWhere), $markers);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function updateItemByProviderAndIdentifier(string $provider, string $identifier, array $item, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $item, array_merge([
            "provider" => $provider,
			"identifier" => $identifier,

        ], $extraWhere), $markers);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function updateItemByReference(string $reference, array $item, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $item, array_merge([
            "reference" => $reference,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     * @inheritDoc
     */
    public function updateItem(array $item, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $item, $where, $markers);
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
    public function deleteItemById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteItemByProviderAndIdentifier(string $provider, string $identifier)
    {
        $this->pdoWrapper->delete($this->table, [
            "provider" => $provider,
			"identifier" => $identifier,

        ]);
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteItemByReference(string $reference)
    {
        $this->pdoWrapper->delete($this->table, [
            "reference" => $reference,

        ]);
    }



    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteItemByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteItemByProvidersAndIdentifiers(array $providers)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("provider")->in($providers));
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteItemByReferences(array $references)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("reference")->in($references));
    }




    /**
     * @implementation
     * @inheritDoc
     */
    public function deleteItemByAuthorId(int $authorId)
    {
        $this->pdoWrapper->delete($this->table, [
            "author_id" => $authorId,
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
            'author_id' => '0',
            'label' => '',
            'reference' => '',
            'item_type' => '0',
            'provider' => '',
            'identifier' => '',
            'description' => '',
            'post_datetime' => '2021-08-13 08:37:58',
            'price_in_euro' => '0.0',
            'screenshots' => '',
            'status' => '0',
            'front_importance' => '0',
        
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
