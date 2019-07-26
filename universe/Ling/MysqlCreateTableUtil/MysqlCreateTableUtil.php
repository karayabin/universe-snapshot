<?php


namespace Ling\MysqlCreateTableUtil;


use Ling\MysqlCreateTableUtil\Column\Column;
use Ling\MysqlCreateTableUtil\Exception\MysqlCreateTableUtilException;

/**
 * The MysqlCreateTableUtil class.
 */
class MysqlCreateTableUtil
{


    /**
     * This property holds the database for this instance.
     * If null, the database name will be omitted.
     * @var string|null
     */
    protected $database;

    /**
     * This property holds the table for this instance.
     * @var string
     */
    protected $table;


    /**
     * This property holds the engine for this instance.
     * The available engine types are:
     *
     * - innodb
     * - myisam
     * - memory
     * - csv
     * - archive
     * - example
     * - federated
     * - heap
     * - merge
     * - ndb
     *
     *
     *
     *
     * @var string = innodb
     */
    protected $engine;


    /**
     * This property holds the defaultCharset for this instance.
     * @var string = utf8
     */
    protected $defaultCharset;

    /**
     * This property holds the columns for this instance.
     * @var Column[]
     */
    protected $columns;


    /**
     * Builds the MysqlCreateTableUtil instance.
     */
    protected function __construct()
    {
        $this->database = null;
        $this->table = null;
        $this->engine = "innodb";
        $this->defaultCharset = "utf8";
        $this->columns = [];
    }


    /**
     * Creates and returns an instance of MysqlCreateTableUtil.
     *
     * @param string $table
     * @param string|null $database
     * @return MysqlCreateTableUtil
     */
    public static function create(string $table, string $database = null): MysqlCreateTableUtil
    {
        $ret = new static();
        $ret->database = $database;
        $ret->table = $table;
        return $ret;
    }

    /**
     * Sets the engine.
     *
     * @param string $engine
     * @return MysqlCreateTableUtil
     */
    public function setEngine(string $engine): MysqlCreateTableUtil
    {
        $this->engine = $engine;
        return $this;
    }

    /**
     * Sets the defaultCharset.
     *
     * @param string $defaultCharset
     * @return MysqlCreateTableUtil
     */
    public function setDefaultCharset(string $defaultCharset): MysqlCreateTableUtil
    {
        $this->defaultCharset = $defaultCharset;
        return $this;
    }

    /**
     * Adds a column to this instance, and returns itself.
     *
     * @param Column $column
     * @return MysqlCreateTableUtil
     */
    public function addColumn(Column $column): MysqlCreateTableUtil
    {
        $this->columns[] = $column;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the create table statement for this instance.
     *
     * Note: the statement is based on my observation of the MysqlWorkBench utility.
     * So for instance, when you create a foreign key, it also creates an index.
     *
     * @return string
     * @throws MysqlCreateTableUtilException
     */
    public function render(): string
    {

        if (null === $this->table) {
            throw new MysqlCreateTableUtilException("Table is null.");
        }

        $table = "`$this->table`";
        if (null !== $this->database) {
            $table = "`$this->database`.$table";
        }

        $s = "CREATE TABLE IF NOT EXISTS $table (" . PHP_EOL;

        //--------------------------------------------
        // COLUMNS
        //--------------------------------------------
        $lines = [];
        $primaryKey = [];
        $uniqueIndexesOneCol = [];
        $uniqueIndexesMultiCol = [];
        $foreignKeys = [];
        foreach ($this->columns as $column) {
            $this->checkColumn($column);
            $name = $column->getName();
            $type = strtoupper($column->getType());
            $typeSize = $column->getTypeSize();
            $nullable = ($column->isNullable()) ? "NULL" : "NOT NULL";

            if (null !== $typeSize) {
                $typeSize = '(' . $typeSize . ')';
            }
            $line = "`$name` $type" . $typeSize . " $nullable";
            if ($column->isAutoIncrement()) {
                $line .= " AUTO_INCREMENT";
            }
            $lines[] = $line;


            if ($column->isPrimaryKey()) {
                $primaryKey[] = "`$name`";
            }

            if ($column->isUniqueIndex()) {
                $indexId = $column->getUniqueIndexId();
                if (null === $indexId) {
                    $uniqueIndexesOneCol[] = $name;
                } else {
                    $uniqueIndexesMultiCol[$indexId][] = $name;
                }
            }

            if ($column->isForeignKey()) {
                $foreignKeys[$name] = [
                    'refSchema' => $column->getForeignKeyReferencedSchema(),
                    'refTable' => $column->getForeignKeyReferencedTable(),
                    'refColumn' => $column->getForeignKeyReferencedColumn(),
                    'onDelete' => $column->getOnDelete(),
                    'onUpdate' => $column->getOnUpdate(),
                ];
            }
        }


        //--------------------------------------------
        // PRIMARY KEY
        //--------------------------------------------
        if ($primaryKey) {
            $sPrimaryKey = implode(', ', $primaryKey);
            $lines[] = "PRIMARY KEY ($sPrimaryKey)";
        }


        //--------------------------------------------
        // UNIQUE INDEXES
        //--------------------------------------------
        foreach ($uniqueIndexesOneCol as $name) {
            $nameUnique = "$name" . "_UNIQUE";
            $lines[] = "UNIQUE INDEX `$nameUnique` (`$name` ASC)";
        }

        foreach ($uniqueIndexesMultiCol as $indexId => $names) {
            reset($names);
            $firstName = current($names);
            $nameUnique = "$firstName" . "_UNIQUE";
            $sLine = "";
            $c = 0;
            foreach ($names as $name) {
                if (0 !== $c) {
                    $sLine .= ", ";
                }
                $sLine .= "`$name` ASC";
                $c++;
            }
            $lines[] = "UNIQUE INDEX `$nameUnique` ($sLine)";
        }




        //--------------------------------------------
        // FOREIGN KEY INDEXES
        //--------------------------------------------
        $c = 0;
        foreach ($foreignKeys as $name => $fk) {
            $one = (0 === $c) ? "" : "1"; // I don't know why, but I observed that in MysqlWorkBench
            $fkName = "fk_" . $this->table . "_" . $fk['refTable'] . $one . "_idx";
            $foreignKeys[$name]['fkName'] = $fkName;
            $lines[] = "INDEX `$fkName` (`$name` ASC)";
            $c++;
        }

        //--------------------------------------------
        // FOREIGN KEY CONSTRAINTS
        //--------------------------------------------
        foreach ($foreignKeys as $name => $fk) {

            $refTable = $fk['refTable'];
            $refSchema = $fk['refSchema'];
            if (null === $refSchema) {
                $refSchema = $this->database;
            }

            $sRefTable = "`$refTable`";
            if (null !== $refSchema) {
                $sRefTable = "`$refSchema`." . $sRefTable;
            }
            $refColumn = $fk['refColumn'];

            $onDelete = $this->sanitizeReferentialAction($fk['onDelete']);
            $onUpdate = $this->sanitizeReferentialAction($fk['onUpdate']);


            $fkName = $fk['fkName'];
            $t = "CONSTRAINT `$fkName`" . PHP_EOL;
            $t .= "FOREIGN KEY (`$name`)" . PHP_EOL;
            $t .= "REFERENCES $sRefTable (`$refColumn`)" . PHP_EOL;
            $t .= "ON DELETE $onDelete" . PHP_EOL;
            $t .= "ON UPDATE $onUpdate" . PHP_EOL;
            $lines[] = $t;
        }

        $s .= implode("," . PHP_EOL, $lines);
        $s .= ')' . PHP_EOL;

        //--------------------------------------------
        // ENGINE
        //--------------------------------------------
        $engine = strtolower($this->engine);
        switch ($engine) {
            case "innodb":
                $engine = "InnoDB";
                break;
            case "myisam":
                $engine = "MyISAM";
                break;
            case "memory":
                $engine = "Memory";
                break;
            case "csv":
                $engine = "CSV";
                break;
            case "merge":
                $engine = "Merge";
                break;
            case "archive":
                $engine = "Archive";
                break;
            case "federated":
                $engine = "Federated";
                break;
            case "blackhole":
                $engine = "Blackhole";
                break;
            case "example":
                $engine = "Example";
                break;
        }
        $s .= "ENGINE = " . $engine . PHP_EOL;


        //--------------------------------------------
        // CHARACTER SET
        //--------------------------------------------
        $s .= "DEFAULT CHARACTER SET = " . $this->defaultCharset;


        //--------------------------------------------
        //
        //--------------------------------------------
        $s .= ";";
        return $s;
    }


    /**
     * Checks that the given column can be rendered, and throws an exception otherwise.
     * A column is valid if it contains at least the following:
     * - name
     * - type
     *
     *
     * @param Column $column
     * @throws \Exception
     */
    protected function checkColumn(Column $column)
    {
        if (null === $column->getName()) {
            throw new MysqlCreateTableUtilException("This column doesn't have a name.");
        }

        if (null === $column->getType()) {
            $name = $column->getName();
            throw new MysqlCreateTableUtilException("The column $name doesn't have a type.");
        }
    }

    /**
     * Returns a proper referential action, valid inside a create table statement.
     * Valid referential actions are (https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html):
     *
     * - CASCADE
     * - SET NULL
     * - RESTRICT
     * - NO ACTION
     * - SET DEFAULT
     *
     *
     * @param string $action
     * @return string
     */
    protected function sanitizeReferentialAction(string $action): string
    {
        $action = strtolower($action);
        switch ($action) {
            case "setnull":
                $action = "SET NULL";
                break;
            case "noaction":
                $action = "NO ACTION";
                break;
            case "setdefault":
                $action = "SET DEFAULT";
                break;
            default:
                $action = strtoupper($action);
                break;
        }
        return $action;
    }
}