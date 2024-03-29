<?php


namespace Ling\SqlWizard\Util;


use Ling\JumboExploder\JumboExploder;
use Ling\JumboExploder\Scope\JumboExploderScope;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SimplePdoWrapper\Util\RicHelper;
use Ling\SimplePdoWrapper\Util\SimpleTypeHelper;
use Ling\SqlWizard\Exception\SqlWizardException;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;

/**
 * The MysqlStructureReader class.
 *
 * This tool can help with parsing a sql file containing CREATE TABLE statements,
 * and will extract some table information (the table name, the fields with their types, their nullability,
 * and if they have auto-incremented, the primary key,  the foreign keys, the unique indexes).
 *
 *
 * Note that this tool was created for my personal use, and therefore is by no means a complete parser of the create table syntax,
 * but just a parser of the sql features I use.
 *
 * Typically, I parse only files generated by tools such as MysqlWorkBench (which I tested).
 * Maybe it should work with the dump from phpMyAdmin (not tested).
 *
 *
 * See the @page(MysqlStructureReader example) for more info.
 *
 *
 */
class MysqlStructureReader
{


    /**
     * This is an adapter method that takes a **table info item** (see the output of
     * the MysqlStructureReader->readContent method) and returns a tableInfo array,
     * which structure is defined in the @page(Light_DatabaseInfo->getTableInfo) method.
     *
     * Important note: the hasItems property is not derived from the readerArray, but regenerated
     * using the MysqlInfoUtil->getHasItems method.
     * The reason is that I thought it would add too much complexity to this class if I wanted
     * to implement this feature, sorry.
     *
     *
     *
     *
     * @param array $readerArray
     * @param SimplePdoWrapperInterface $pdoWrapper
     * @param string|null $defaultDb
     * @return array
     * @throws \Exception
     */
    public static function readerArrayToTableInfo(array $readerArray, SimplePdoWrapperInterface $pdoWrapper, string $defaultDb = null): array
    {



        $util = new MysqlInfoUtil($pdoWrapper);

        $table = $readerArray['table'];
        $aik = $readerArray['ai'] ?? false;

        if (null === $readerArray['pk']) {
            $readerArray['pk'] = [];
        }

        $ric = RicHelper::getRicByPkAndColumnsAndUniqueIndexes($readerArray['pk'], $readerArray['columnNames'], $readerArray['uind'], false);
        $strictRic = RicHelper::getRicByPkAndColumnsAndUniqueIndexes($readerArray['pk'], $readerArray['columnNames'], $readerArray['uind'], true);

        $db = $readerArray['db'];


        if (null === $db) {
            $db = $defaultDb;
            if (null === $db) {
                /**
                 * Note that the code below returns random result (example: jindemo, employees, ...).
                 * Therefore I prefer to set it to a fixed value of "undefined", because it's easier to debug.
                 */
//                $db = $util->getDatabase();
                $db = "undefined";
            }
        }

        $fks = $readerArray['fkeys'];
        foreach ($fks as $col => $fk) {
            if (null === $fk[0]) {
                $fk[0] = $defaultDb;
            }
            $fks[$col] = $fk;
        }


        /**
         * referenced by tables, we merge the ones found by the reader (search only in a given file) with the ones found
         * by the mysqlInfoUtil (search in the whole actual database).
         */
        $rbTables = $readerArray['referencedByTables'];
        $referencedByTables = $util->getReferencedByTables($table, [$db]);
        foreach ($rbTables as $rbTable) {
            if (null === $rbTable[0]) {
                $rbTable[0] = $db;
            }
            $fullTable = $rbTable[0] . "." . $rbTable[1];
            if (false === in_array($fullTable, $referencedByTables, true)) {
                $referencedByTables[] = $fullTable;
            }
        }

        return [
            "database" => $db,
            "columns" => $readerArray['columnNames'],
            "nullables" => array_keys(array_filter($readerArray['columnNullables'])),
            "primary" => $readerArray['pk'],
            "types" => $readerArray['columnTypes'],
            "simpleTypes" => SimpleTypeHelper::getSimpleTypes($readerArray['columnTypes']),
            "ric" => $ric,
            "ricStrict" => $strictRic,
            "autoIncrementedKey" => $aik,
            "uniqueIndexes" => $readerArray['uind'],
            "foreignKeysInfo" => $fks,
            "referencedByTables" => $referencedByTables,
            "hasItems" => $util->getHasItems($table),
        ];
    }


    /**
     * Same as the readContent method, but takes a file as argument.
     *
     * @param string $file
     * @return array
     * @throws \Exception
     */
    public function readFile(string $file): array
    {
        if (false === file_exists($file)) {
            throw new SqlWizardException("File not found: $file.");
        }
        return $this->readContent(file_get_contents($file));
    }


    /**
     * Reads the given content and returns an array containing **table info items**, each of which having the following structure.
     *
     * - db: string|null, the name of the database, or null if not specified
     * - table: string, the name of the table
     * - pk: array, the names of the columns of the primary key (or an empty array by default)
     * - uind: array, the unique indexes. Each entry of the array is itself an array representing one index.
     *     Each index is an array of column names composing the index.
     * - uindDetails: array, the unique indexes details. Same structure as the **indexes** property. See below for more details.
     * - indexes: array, the indexes details. The array contains items, each of which has the following entries:
     *      - name: string, the name of the index
     *      - keys: an array of the index keys, each of which being an array with the following entries:
     *          - colName: string, the name of the index column
     *          - ascDesc: ASC|DESC|null, a keyword indicating whether the index column is asc or desc or not set.
     *
     *
     * - fkeys: array, the foreign keys. It's an array of foreign key => references, with references being an array with
     *     the following structure:
     *     - 0: the referenced database, or null if it was not specified
     *     - 1: the referenced table
     *     - 2: the referenced column
     *
     *      Note: this property is only useful if your foreign key is composed of one column and references one column.
     *      If your foreign key is composed of multiple columns and/or references multiple columns, consider using
     *      the fkeyDetails property instead.
     *
     *
     * - fkeyDetails: array, the array representing the foreign key details. It's an array of constraintName => fkInfo,
     *          with constraintName being the name of the foreign key constraint, and fkInfo being the following
     *          array:
     *          - fks: array of foreign key columns
     *          - references: (array)
     *              - table: the referenced table
     *              - columns: array, the referenced columns
     *          - onDelete: null | string(RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT) = null, the keyword associated with the ON DELETE option
     *          - onUpdate: null | string(RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT) = null, the keyword associated with the ON UPDATE option
     *
     *
     *
     *
     * - columnNames: array, the array of column names for this table
     * - columnTypes: array, the array of column name => column type. Each type is in lower string, and contains
     *     the information in parenthesis if any (for instance int, or varchar(64), or char(1), etc...)
     * - columnNullables: array, the array of column name => boolean (whether the column is nullable)
     * - ai: string|null = null, the name of the auto-incremented column if any
     * - referencedByTables: array of the tables defined in the given content that have a foreign key referencing this table.
     *      It's an array of "rb" items, each of which having the following structure:
     *      - 0: database, string or null
     *      - 1: table
     *
     * - engine: string|null, the engine for this table
     *
     *
     *
     * @param string $content
     * @return array
     * @throws \Exception
     */
    public function readContent(string $content): array
    {

        $content = SqlWizardGeneralTool::removeDoubleDashComments($content);

        $tables = [];

        if (preg_match_all('!CREATE\s+TABLE\s+(.*);$!msU', $content, $matches)) {
            foreach ($matches[0] as $match) {


                //--------------------------------------------
                // update to parse constraint details.
                // Note this it's redundant with the existing code, but hey it works...
                //--------------------------------------------
                if (preg_match('!([^(]*)\((.*)\)(.*)!s', $match, $blocks)) {


                    $firstLine = $blocks[1];
                    $operationsContent = $blocks[2];

                    /**
                     * Note: I'm assuming that table options don't contain parenthesis,
                     * which is ok for my own use of mysql, but obviously wrong if you are using
                     * more advanced features of mysql.
                     */
                    $tableOptions = trim($blocks[3]);


                    $operations = JumboExploder::explode(',', $operationsContent, [
                        JumboExploderScope::create()->setStartExpression("(")->setEndExpression(')')
                    ]);



                    $db = null;
                    $table = null;
                    $primaryKey = null;
                    $engine = null;
                    $uniqueIndexes = [];
                    $uniqueIndexesDetails = [];
                    $regularIndexes = [];
                    $fKeys = [];
                    $fkeyDetails = [];
                    $columnNames = [];
                    $columnTypes = [];
                    $columnNulls = [];
                    $ai = null;


                    list($db, $table) = $this->getDatabaseAndTableFromLine($firstLine);





                    //--------------------------------------------
                    // create_definition
                    //--------------------------------------------
                    foreach ($operations as $op) {
                        if ('`' === substr($op, 0, 1)) {
                            $colInfo = $this->extractRegularColumnInfo($op);


                            if (false !== $colInfo) {

                                $columnNames[] = $colInfo[0];
                                $columnTypes[$colInfo[0]] = $colInfo[1];
                                $columnNulls[$colInfo[0]] = $colInfo[2];

                                if (true === $colInfo[3]) {
                                    $ai = $colInfo[0];
                                }
                            }
                        } elseif (0 === strpos($op, "PRIMARY KEY")) {
                            $primaryKey = $this->extractColumns($op);
                        } elseif (0 === strpos($op, "UNIQUE INDEX")) {
                            $indexInfo = $this->extractIndexInfo($op);
                            $indexKeys = $indexInfo['keys'];
                            $indexes = [];
                            foreach ($indexKeys as $indexKey) {
                                $indexes[] = $indexKey['colName'];
                            }
                            $uniqueIndexes[] = $indexes;
                            $uniqueIndexesDetails[] = $indexInfo;
                        } elseif (0 === strpos($op, "INDEX")) {
                            $indexInfo = $this->extractIndexInfo($op);
                            $regularIndexes[] = $indexInfo;
                        } elseif (0 === strpos($op, "CONSTRAINT")) {

                            $p1 = explode('FOREIGN KEY', $op, 2);
                            if (2 === count($p1)) {

                                list($constraintLine, $rest) = $p1;
                                $constraintName = $this->extractColumn($constraintLine);

                                $p2 = explode('REFERENCES', $rest);
                                if (2 === count($p2)) {

                                    list($fkLine, $rest) = $p2;


                                    $fkNames = $this->extractColumns($fkLine);
                                    $fkName = $fkNames[0];

                                    $references = $this->extractColumns($rest);
                                    $referencedTable = array_shift($references);
                                    $referencedColumns = $references;


                                    $fKeys[$fkName] = [null, $referencedTable, $referencedColumns[0]];


                                    list($onDelete, $onUpdate) = $this->extractOnDeleteUpdateInfo($rest);

                                    $fkeyDetails[$constraintName] = [
                                        'fks' => $fkNames,
                                        'references' => [
                                            "table" => $referencedTable,
                                            "columns" => $referencedColumns,
                                        ],
                                        'onDelete' => $onDelete,
                                        'onUpdate' => $onUpdate,
                                    ];

                                } else {
                                    throw new SqlWizardException("Invalid foreign key definition, missing the REFERENCES keyword.");
                                }
                            } else {
                                throw new SqlWizardException("Don't know yet how to parse a constraint that's not a foreign key, sorry.");
                            }

                        } else {
                            //--------------------------------------------
                            // REGULAR COLUMN PARSING
                            //--------------------------------------------
                            $colInfo = $this->extractRegularColumnInfo($op);
                            if (false !== $colInfo) {

                                $columnNames[] = $colInfo[0];
                                $columnTypes[$colInfo[0]] = $colInfo[1];
                                $columnNulls[$colInfo[0]] = $colInfo[2];

                                if (true === $colInfo[3]) {
                                    $ai = $colInfo[0];
                                }
                            }
                        }
                    }

                    //--------------------------------------------
                    // table options
                    //--------------------------------------------
                    if ($tableOptions) {
                        $tableOptions = rtrim($tableOptions, ';');
                        $engine = $this->extractEngine($tableOptions);
                    }


                    //--------------------------------------------
                    //
                    //--------------------------------------------
                    $tables[$table] = [
                        "db" => $db,
                        "table" => $table,
                        "pk" => $primaryKey,
                        "uind" => $uniqueIndexes,
                        "uindDetails" => $uniqueIndexesDetails,
                        "indexes" => $regularIndexes,
                        "fkeys" => $fKeys,
                        "fkeyDetails" => $fkeyDetails,
                        "columnNames" => $columnNames,
                        "columnTypes" => $columnTypes,
                        "columnNullables" => $columnNulls,
                        "ai" => $ai,
                        "referencedByTables" => [],
                        "engine" => $engine,
                    ];

                }
            }


            //--------------------------------------------
            // REFERENCED BY TABLES
            //--------------------------------------------
            foreach ($tables as $table => $tableInfo) {

                $fkeys = $tableInfo['fkeys'];
                foreach ($fKeys as $fKey) {
                    $fkTable = $fKey[1];
                    if (array_key_exists($fkTable, $tables)) {
                        $tables[$fkTable]["referencedByTables"][] = [
                            $tableInfo["db"],
                            $table,
                        ];
                    }
                }
                $tables[$table] = $tableInfo;

            }

        }


        return $tables;
    }


    /**
     * Parse the given content and returns an array of tableName => createStatement.
     * With:
     *      - tableName: string, the table name.
     *      - createStatement: string, the create statement for this table.
     *
     *
     * @param string $content
     * @return array
     */
    public function getCreateStatementsFromContent(string $content): array
    {
        $content = SqlWizardGeneralTool::removeDoubleDashComments($content);
        $statements = [];

        if (preg_match_all('!CREATE\s+TABLE\s+(.*);$!msU', $content, $matches)) {
            foreach ($matches[0] as $match) {
                if (preg_match('!([^(]*)\((.*)\)(.*)!s', $match, $blocks)) {
                    $firstLine = $blocks[1];
                    list($db, $table) = $this->getDatabaseAndTableFromLine($firstLine);
                    $statements[$table] = $match;
                }
            }
        }
        return $statements;
    }

    /**
     * Returns an array containing the database and the table name from the given line.
     * Note: the database will be null if not found in the line.
     *
     * The returned array will look like this:
     *
     * - 0: $database
     * - 1: $table
     *
     *
     *
     * @param string $line
     * @return array
     */
    protected function getDatabaseAndTableFromLine(string $line): array
    {
        $db = null;
        $table = null;
        if (preg_match('!`(.*)`!', $line, $match)) {
            $tmp = str_replace('`', '', $match[1]);
            $p = explode(".", $tmp);
            if (count($p) > 1) {
                $db = array_shift($p);
                $table = implode(".", $p);
            } else {
                $table = $tmp;
            }
        }
        return [
            $db,
            $table,
        ];
    }


    /**
     * Returns the value protected inside backticks from the given line,
     * or throws an exception if it doesn't find one.
     *
     * @param string $line
     * @return string
     * @throws \Exception
     */
    protected function extractColumn(string $line): string
    {
        if (preg_match('!`([^`]*)`!', $line, $match)) {
            return $match[1];
        }
        throw new SqlWizardException("No value inside backticks found in the given line \"$line\".");
    }

    /**
     * Returns the values protected inside backticks from the given line,
     * or throws an exception if it doesn't find any.
     *
     * @param string $line
     * @return array
     * @throws \Exception
     */
    protected function extractColumns(string $line): array
    {
        if (preg_match_all('!`([^`]*)`!', $line, $matches)) {
            return $matches[1];
        }
        throw new SqlWizardException("No value inside backticks found in the given column \"$line\".");
    }


    /**
     * Returns the unique index information from the given line,
     * or throws an exception if it doesn't find any.
     *
     * The returned array contains the following information:
     *
     * - name: string, the name of the unique index
     * - keys: array, each item being an array:
     *      - colName: the name of the column
     *      - ascDesc: ASC|DESC|null, the direction keyword associated to this index key
     *
     *
     *
     *
     *
     * @param string $line
     * @return array
     * @throws \Exception
     */
    protected function extractIndexInfo(string $line): array
    {

        $p = explode('(', $line, 2);
        if (2 !== count($p)) {
            throw new SqlWizardException("Unexpected index syntax, no opening parenthesis found with line: $line.");
        }

        list($namePart, $keyParts) = $p;
        $name = $this->extractColumn($namePart);
        $keys = [];

        $q = explode(',', $keyParts);
        foreach ($q as $keyPart) {
            if (empty($keyPart)) { // happens if the comma is at the end of the line
                continue;
            }
            $colName = $this->extractColumn($keyPart);
            $ascDesc = null;
            if (0 !== strpos($keyParts, ' ASC)')) {
                $ascDesc = 'ASC';
            } elseif (0 !== strpos($keyParts, ' DESC)')) {
                $ascDesc = 'DESC';
            }
            $keys[] = [
                'colName' => $colName,
                'ascDesc' => $ascDesc,
            ];
        }


        return [
            "name" => $name,
            "keys" => $keys,
        ];
    }


    /**
     * Parse the given line and returns an array containing the following info:
     *
     * - 0: column name
     * - 1: column type (including information in parenthesis if any), in lowercase
     * - 2: is null (bool)
     * - 3: is auto-incremented (bool)
     *
     * Returns false if the line is not recognized as a column definition.
     *
     *
     * @param string $line
     * @return array|false
     * @throws \Exception
     */
    protected function extractRegularColumnInfo(string $line)
    {


        if (preg_match('!^`([^`]*)`\s+(.*)!s', $line, $match)) {
            $name = $match[1];
            $restOfLine = strtolower($match[2]);
            $isNull = true;
            $isAi = false;


            if(true === str_contains($restOfLine, "not null")){
                $restOfLine = str_replace("not null", "", $restOfLine);
                $isNull = false;
            }
            if(true === str_contains($restOfLine, "null")){
                $restOfLine = str_replace("null", "", $restOfLine);
            }
            if(true === str_contains($restOfLine, "auto_increment")){
                $restOfLine = str_replace("auto_increment", "", $restOfLine);
                $isAi = true;
            }
            $restOfLine = trim($restOfLine);
            $type = $restOfLine;


            return [
                $name,
                $type,
                $isNull,
                $isAi,
            ];
        }
        return false;
    }


    /**
     * Returns an array containing the following:
     *
     * - 0: onDelete (null|string), the keyword associated to the "ON DELETE" constraint.
     * - 1: onUpdate (null|string), the keyword associated to the "ON UPDATE" constraint.
     *
     * For both keys, if it's a string, it's one of: RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT.
     *
     *
     * https://dev.mysql.com/doc/refman/8.0/en/create-table.html#create-table-options
     *
     *
     * @param string $s
     * @return array
     */
    protected function extractOnDeleteUpdateInfo(string $s): array
    {
        $onDelete = null;
        $onUpdate = null;

        if (preg_match('!ON DELETE\s+(RESTRICT|CASCADE|SET NULL|NO ACTION|SET DEFAULT)!i', $s, $match)) {
            $onDelete = $match[1];
        }
        if (preg_match('!ON UPDATE\s+(RESTRICT|CASCADE|SET NULL|NO ACTION|SET DEFAULT)!i', $s, $match)) {
            $onUpdate = $match[1];
        }

        return [
            $onDelete,
            $onUpdate,
        ];
    }

    /**
     * Returns the value of the engine from the given line, or null otherwise.
     *
     * @param string $line
     * @return string|null
     */
    protected function extractEngine(string $line): ?string
    {
        if (preg_match('!ENGINE\s*=\s*(InnoDB|MyISAM|MEMORY|CSV|ARCHIVE|EXAMPLE|FEDERATED|HEAP|MERGE|NDB)!i', $line, $match)) {

            return $match[1];
        }
        return null;
    }
}