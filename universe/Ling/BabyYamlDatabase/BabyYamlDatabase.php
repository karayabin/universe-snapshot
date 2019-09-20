<?php


namespace Ling\BabyYamlDatabase;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\BabyYamlDatabase\Exception\BabyYamlDatabaseException;
use Ling\BabyYamlDatabase\Exception\DuplicateRowException;
use Ling\BabyYamlDatabase\Exception\InconsistentRowException;
use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;

/**
 * The BabyYamlDatabase class.
 */
class BabyYamlDatabase implements BabyYamlDatabaseInterface
{

    /**
     * This property holds the file for this instance.
     * @var string
     */
    protected $file;

    /**
     * This property holds the rootKey for this instance.
     * The @page(bdot) path identifying the key holding all the tables.
     *
     * Null means the root of the config array.
     *
     * @var string=null
     */
    protected $rootKey;


    /**
     * This property holds the tableConstraints cache for this instance.
     * It's an array of table => constraints.
     * @var array
     */
    protected $tableConstraints;

    /**
     * This property holds the configuration cache for this instance.
     * @var array
     */
    protected $conf;


    /**
     * This property holds the temporary auto-incremented key for this instance.
     *
     * @var string
     */
    private $_ak;

    /**
     * Builds the BabyYamlDatabase instance.
     */
    public function __construct()
    {
        $this->file = null;
        $this->rootKey = null;
        $this->tableConstraints = [];
        $this->conf = null;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function insert(string $table, array $row)
    {
        $ret = null;
        $tableArr = $this->getTableArray($table);
        $this->checkConstraints($table, $row, $tableArr);
        array_push($tableArr, $row);
        $this->sortTable($tableArr);
        $this->setTableArray($table, $tableArr);


        $ak = $this->_ak;

        if ($ak) {
            $ret = $row[$this->_ak] ?? null;
        }

        return $ret;
    }

    /**
     * @implementation
     */
    public function getItemByKey(string $table, array $key)
    {
        $items = $this->getTableArray($table);
        foreach ($items as $item) {
            if (true === $this->keyMatches($key, $item)) {
                return $item;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getItemsByKey(string $table, array $key): array
    {
        $ret = [];
        $items = $this->getTableArray($table);
        foreach ($items as $item) {
            if (true === $this->keyMatches($key, $item)) {
                $ret[] = $item;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function updateItemByKey(string $table, array $key, array $values): bool
    {
        $tableArr = $this->getTableArray($table);
        $index = $this->getIndexByKey($tableArr, $key);
        if (null !== $index) {
            $row = $tableArr[$index];
            $newRow = ArrayTool::superimpose($values, $row);

            $tableConstraints = $this->getTableConstraints($table);
            $ric = $tableConstraints['ric'] ?? [];
            $checkDuplicate = (false === $this->haveSameRic($row, $newRow, $ric));

            $tableArr[$index] = $newRow;
            $this->checkConstraints($table, $newRow, $tableArr, [
                "checkDuplicate" => $checkDuplicate,
            ]);

            $this->sortTable($tableArr);
            $this->setTableArray($table, $tableArr);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @implementation
     */
    public function deleteItemByKey(string $table, array $key): bool
    {
        $ret = false;
        $tableArr = $this->getTableArray($table);
        $index = $this->getIndexByKey($tableArr, $key);
        if (null !== $index) {
            unset($tableArr[$index]);

            $ret = true;
        }
        $tableArr = array_merge($tableArr);

        $this->setTableArray($table, $tableArr);
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
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
     * @param string|null $rootKey
     */
    public function setRootKey(?string $rootKey)
    {
        $this->rootKey = $rootKey;
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the array corresponding to the given table.
     * If the table doesn't exist yet, an empty array is returned.
     *
     * @param string $table
     * @return array
     */
    protected function getTableArray(string $table): array
    {
        $arr = $this->getConfiguration();
        $path = '';
        if (null !== $this->rootKey) {
            $path .= $this->rootKey . ".";
        }
        $path .= "tables.$table";
        return BDotTool::getDotValue($path, $arr, []);
    }


    /**
     * Replaces the array representing the given table.
     *
     * @param string $table
     * @param array $arr
     */
    protected function setTableArray(string $table, array $arr)
    {
        $conf = $this->getConfiguration();
        $path = '';
        if (null !== $this->rootKey) {
            $path .= $this->rootKey . ".";
        }
        $path .= "tables.$table";
        BDotTool::setDotValue($path, $arr, $conf);
        BabyYamlUtil::writeFile($conf, $this->file);

        $this->conf = $conf; // update the configuration cache
    }


    /**
     * Returns the array corresponding to the given table's constraints.
     *
     * @param string $table
     * @return array
     */
    protected function getTableConstraints(string $table): array
    {
        if (false === array_key_exists($table, $this->tableConstraints)) {
            $arr = $this->getConfiguration();
            $path = '';
            if (null !== $this->rootKey) {
                $path .= $this->rootKey . ".";
            }
            $path .= "config.constraints.$table";
            $this->tableConstraints[$table] = BDotTool::getDotValue($path, $arr, []);
        }
        return $this->tableConstraints[$table];
    }


    /**
     * Returns the index of the row identified by the given key, in the given array,
     * or null if no rows of the array matches the given key.
     *
     * The key notation is explained in the @page(conception notes).
     *
     * @param array $array
     * @param array $key
     * @return mixed
     * @throws  \Exception
     */
    protected function getIndexByKey(array $array, array $key)
    {
        foreach ($array as $index => $item) {
            if (true === $this->keyMatches($key, $item)) {
                return $index;
            }
        }
        return null;
    }


    /**
     * Returns whether the given key matches the given item.
     * The key notation is explained in the @page(conception notes).
     *
     *
     * @param array $key
     * @param array $item
     * @return bool
     * @throws \Exception
     */
    protected function keyMatches(array $key, array $item): bool
    {
        $allMatch = true;
        foreach ($key as $col => $val) {
            $operator = "===";
            if (array_key_exists($col, $item)) {
                switch ($operator) {
                    case "===":
                        if ($val !== $item[$col]) {
                            $allMatch = false;
                            break 2;
                        }
                        break;
                    default:
                        throw new BabyYamlDatabaseException("Unknown operator $operator.");
                        break;
                }
            } else {
                $allMatch = false;
                break;
            }
        }
        return $allMatch;
    }


    /**
     * Checks that the given row is valid, and throws an exception otherwise.
     * See more details in the @page(constraints checking) section of the conception notes.
     *
     * This method will also add the auto-incremented key to the given row if necessary, if the row doesn't
     * already specifies one.
     *
     *
     * The options array:
     * - checkDuplicate: bool=true, whether to check for duplicates
     *
     *
     *
     * @param string $table
     * @param array $row
     * @param array $tableArr
     * @param array $options
     * @throws \Exception
     */
    protected function checkConstraints(string $table, array &$row, array $tableArr, array $options = [])
    {

        if (empty($row)) {
            throw new InconsistentRowException("Empty rows cannot be inserted/updated in the babyYaml database.");
        }

        $checkDuplicate = $options['checkDuplicate'] ?? true;

        $tableInfo = $this->getTableConstraints($table);
        $ric = $tableInfo['ric'] ?? null;
        $ak = $tableInfo['auto_incremented_key'] ?? null;


        //--------------------------------------------
        // CHECK ROW INCONSISTENCY
        //--------------------------------------------
        $maxKey = 0;
        if (null !== $ric) {
            $ricVals = [];

            // check that the row contains the ric
            foreach ($ric as $col) {
                if (true === array_key_exists($col, $row)) {
                    if ($ak === $col) {
                        $row[$col] = (int)$row[$col];
                    }
                    $ricVals[$col] = $row[$col];
                } else {
                    if ($ak === $col) {
                        $ricVals[$col] = null;
                    } else {
                        throw new InconsistentRowException("Inconsistent row: the column $col is required to insert/update a row in table $table.");
                    }
                }
            }


            if (true === $checkDuplicate) {

                // now check for duplicates
                foreach ($tableArr as $item) {

                    if (null !== $ak) {
                        $akVal = $item[$ak] ?? 0;
                        if ((int)$akVal > $maxKey) {
                            $maxKey = (int)$akVal;
                        }
                    }


                    $itemMatched = true;
                    foreach ($ricVals as $k => $v) {
                        if (array_key_exists($k, $item)) {
                            if ($v !== $item[$k]) {
                                $itemMatched = false;
                                break;
                            }
                        } else {
                            // we do not check for corrupted rows, we let the developer figure them out...
                            $itemMatched = false;
                            break;
                        }
                    }
                    if (true === $itemMatched) {
                        throw new DuplicateRowException("A row already exists with the same ric: " . ArrayToStringTool::toInlinePhpArray($ricVals));
                    }
                }
            }
        }

        //--------------------------------------------
        // AUTO-INCREMENTED KEY BEHAVIOUR
        //--------------------------------------------
        if (null !== $ak && false === array_key_exists($ak, $row)) {
            $row[$ak] = $maxKey + 1;
        }

        $this->_ak = $ak; // use this in sortTable method.
    }


    /**
     * Sorts the given table items.
     *
     * This is only called by the insert and update operations.
     * This method is called after the checkConstraints method has been called.
     *
     * That's because the checkConstraints method will define the ak value used inside this method.
     *
     *
     *
     * @param array $tableItems
     */
    protected function sortTable(array &$tableItems)
    {
        $ak = $this->_ak;
        // sort the array if necessary
        if (null !== $ak) {
            usort($tableItems, function ($row1, $row2) use ($ak) {
                return $row1[$ak] > $row2[$ak];
            });
        }
    }


    /**
     * Returns whether the given item1 and item2 both have the same ric values.
     *
     * @param array $item1
     * @param array $item2
     * @param array $ric
     * @return bool
     */
    protected function haveSameRic(array $item1, array $item2, array $ric): bool
    {
        foreach ($ric as $col) {
            if (
                true === array_key_exists($col, $item1) &&
                true === array_key_exists($col, $item2) &&
                $item1[$col] === $item2[$col]
            ) {

            } else {
                return false;
            }
        }

        return true;
    }


    /**
     * Returns the configuration for the current instance.
     *
     * @return array
     */
    protected function getConfiguration(): array
    {
        if (null === $this->conf) {
            $this->conf = BabyYamlUtil::readFile($this->file);
        }
        return $this->conf;
    }
}