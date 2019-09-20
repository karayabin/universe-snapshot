<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\BabyYamlDatabase\BabyYamlDatabase;
use Ling\BabyYamlDatabase\BabyYamlDatabaseInterface;
use Ling\Bat\ArrayTool;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The BabyYamlBaseApi class.
 */
class BabyYamlBaseApi
{

    /**
     * This property holds the configuration file for this instance.
     * @var string
     */
    protected $file;

    /**
     * This property holds the rootKey for this instance.
     * See the @page(BabyYamlDatabase) planet for more details.
     *
     * @var string
     */
    protected $rootKey;

    /**
     * This property holds the babyYamlDatabase for this instance.
     * @var BabyYamlDatabaseInterface
     */
    protected $babyYamlDatabase;

    /**
     * This property holds the table for this instance.
     * @var string
     */
    protected $table;

    /**
     * This property holds the ric for this instance.
     * @var array
     */
    protected $ric;

    /**
     * This property holds the autoIncrementedKey for this instance.
     * @var string=null
     */
    protected $autoIncrementedKey;


    /**
     * Builds the BabyYamlBaseApi instance.
     */
    public function __construct()
    {
        $this->file = null;
        $this->babyYamlDatabase = null;
        $this->rootKey = null;
        $this->table = null;
        $this->ric = [];
        $this->autoIncrementedKey = null;
    }

    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }

    /**
     * Sets the rootKey.
     *
     * @param string $rootKey
     */
    public function setRootKey(string $rootKey)
    {
        $this->rootKey = $rootKey;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the babyYamlDatabase object for this instance.
     *
     * @return BabyYamlDatabaseInterface
     */
    protected function getBabyYamlDatabase(): BabyYamlDatabaseInterface
    {
        if (null === $this->babyYamlDatabase) {
            $this->babyYamlDatabase = new BabyYamlDatabase();
            $this->babyYamlDatabase->setFile($this->file);
            $this->babyYamlDatabase->setRootKey($this->rootKey);
        }
        return $this->babyYamlDatabase;
    }


    /**
     * Returns the first row matching the given key.
     * This is a @page(lsom) method.
     *
     *
     * @param array $key
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return array|false|null
     * @throws LightUserDatabaseException
     */
    protected function getItemByKey(array $key, $default = null, bool $throwNotFoundEx = false)
    {
        $db = $this->getBabyYamlDatabase();
        $ret = $db->getItemByKey($this->table, $key);

        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new LightUserDatabaseException("Row not found in table $this->table, with " . ArrayToStringTool::toInlinePhpArray($key) . ".");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * Inserts the given item in the database.
     * This is a @page(lsom) method.
     *
     * @param array $item
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return array|bool|int|null
     * @throws \Exception
     */
    protected function insertItem(array $item, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $db = $this->getBabyYamlDatabase();

        try {
            $lastInsertId = $db->insert($this->table, $item);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            if (null !== $this->autoIncrementedKey) {
                return [
                    $this->autoIncrementedKey => $lastInsertId,
                ];
            }
            return ArrayTool::superimpose($item, array_flip($this->ric));

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }
            }
        }
        return false;
    }
}