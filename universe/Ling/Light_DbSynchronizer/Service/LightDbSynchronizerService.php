<?php


namespace Ling\Light_DbSynchronizer\Service;


use Ling\Bat\ArrayTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Exception\LightDbSynchronizerException;
use Ling\Light_Logger\LightLoggerService;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;
use Ling\SqlWizard\Util\MysqlStructureReader;

/**
 * The LightDbSynchronizerService class.
 */
class LightDbSynchronizerService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the logErrorMessages for this instance.
     * @var array
     */
    protected $logErrorMessages;

    /**
     * This property holds the logDebugMessages for this instance.
     * @var array
     */
    protected $logDebugMessages;


    /**
     * This property holds the mysqlInfoUtil for this instance.
     * @var MysqlInfoUtil
     */
    private $mysqlInfoUtil;


    /**
     * This property holds the mysqlStructureReader for this instance.
     * @var MysqlStructureReader
     */
    private $mysqlStructureReader;


    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     * - useDebug: bool=true.
     *      Whether to allow debug log (if it's configured).
     *
     * - stopAtFirstError: bool=false.
     *      If true, this method stops its execution whenever the first error is encountered.
     *      If false, it keeps going until the end (unless an unexpected exception is thrown).
     *
     *
     *
     *
     *
     * @var array
     */
    private $options;


    /**
     * Builds the LightDbSynchronizerService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->mysqlInfoUtil = null;
        $this->mysqlStructureReader = null;
        $this->options = [];
        $this->logErrorMessages = [];
        $this->logDebugMessages = [];

    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Synchronize the database with the given create file,
     * and returns whether the synchronization was perfectly executed.
     *
     * If not, details of problems are available via logs, or via the getLogErrorMessages/getLogDebugMessages methods.
     *
     *
     * See more details in the @page(Light_DbSynchronizer conception notes).
     *
     * The available options are:
     *
     * - scope: array, an array of table names which our tool might potentially alter or delete.
     *      Our tool can either add, remove or update tables.
     *      The scope doesn't affect the add operations.
     *      Note: we add this property to prevent accidents (no delete table operation will be executed on the actual database unless this array is set).
     *      and efficiency (to know which table to alter, we only parse the scope tables rather than the whole database tables).
     *
     *      Note2: if you don't define this property, no alter or delete action will be executed by this method.
     *
     *
     * - useDelete: bool=true.
     *      If false, no tables will be removed from the database.
     * - deleteMode: string( natural | flags | empty )=flags.
     *
     *          This only applies if useDelete=true.
     *
     *          The behaviour to use when deleting a table.
     *
     *          With the "natural" option, we just call a simple drop statement.
     *          The db engine might respond with foreign key constraint violation error which would result in the table NOT being removed.
     *
     *          If you want to force the removal of the table, you can use the other options.
     *          With the "flags" options, which is the default and recommended option, this method will add
     *          the necessary necessary mysql? variables (flags?) so that the fk constraints will be ignored when
     *          the drop statement is executed.
     *          Note that this might lead to structure inconsistencies.
     *          However, on the positive side, it won't delete any rows.
     *
     *          Another option, which only makes sense if you are using the ON DELETE CASCADE and ON UPDATE CASCADE modes,
     *          is the "empty" option.
     *          With the "empty" option, this tool will execute a simple drop (which again might fail),
     *          but it will try to delete all the rows first.
     *          The rationale being that if you are using the CASCADE modes, deleting the rows will actually remove all the
     *          rows of the table, and their "dependencies", and keep the consistency of the database, then removing the
     *          table should be no problem (as it should be empty by now, at least if there was no other problems while removing the rows).
     *
     *          Note: often though, the problem will also come from the order in which the tables to delete are called.
     *          Note2: we don't recommend using this method, as it will lead to removal of rows, which you generally don't want.
     *          Rather, you generally prefer to remove the tables all at once and resolve the inconsistencies manually, as this is less
     *          destructive.
     *
     *
     *
     *
     *
     *
     * The database by default is the one provided with the @page(Light_Database plugin), which our service depends on by default (unless you provide
     * a substitute, but this is not implemented yet).
     *
     *
     *
     *
     *
     * @param string $createFile
     * @param array $options
     * @return bool
     */
    public function synchronize(string $createFile, array $options = []): bool
    {
        $_stmt = null;
        try {


            $this->logDebug("--clean--");
            $this->logDebug("Starting synchronization with createFile \"$createFile\".");


            if (false === file_exists($createFile)) {
                $this->error("File doesn't exist: $createFile.");
            }

            $createFileContent = file_get_contents($createFile);


            $renamedItems = $this->getRenamedItems($createFileContent);


            $scope = $options['scope'] ?? [];
            $useDelete = $options['useDelete'] ?? true;
            $deleteMode = $options['deleteMode'] ?? 'flags';
            $dbTables = $this->container->get("database_info")->getTables();


            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get("database");
            $reader = $this->getMysqlStructureReader();
            $info = $reader->readContent($createFileContent);
            $tables = array_keys($info);


            // adding table rename markers to the scope
            $renamedTables = $renamedItems['table'] ?? [];
            $renameStmts = [];
            foreach ($renamedTables as $old => $new) {
                $scope[] = $old;
                $scope[] = $new;

                $renameStmts[] = "`$old` TO `$new`";
            }

            //--------------------------------------------
            // RENAMING TABLES
            //--------------------------------------------
            if ($renameStmts) {
                $this->logDebug(count($renameStmts) . " table(s) to rename.");
                $stmt = 'RENAME TABLE ' . implode(', ', $renameStmts) . ";";
                $this->executeStatement($stmt);
            }


            $scope = array_unique($scope);
            $tablesToAdd = array_diff($tables, $dbTables);

            //--------------------------------------------
            // REMOVE
            //--------------------------------------------
            if ($scope) {
                $effectiveScope = array_intersect($scope, $dbTables);
                $tablesToRemove = array_diff($effectiveScope, $tables);


                foreach ($renamedTables as $oldTable => $newTable) {
                    if (
                        false !== ($index1 = array_search($oldTable, $tablesToRemove)) &&
                        false !== ($index2 = array_search($newTable, $tablesToAdd))
                    ) {
                        unset($tablesToRemove[$index1]);
                        unset($tablesToAdd[$index2]);
                    }
                }


                if (true === $useDelete) {

                    $this->logDebug(count($tablesToRemove) . " table(s) to remove.");

                    foreach ($tablesToRemove as $table) {

                        $this->logDebug("Removing table $table.");
                        $_stmt = 'DROP TABLE `' . $table . '`;';


                        if ('flags' === $deleteMode) {
                            $_stmt = SqlWizardGeneralTool::statementDisableFkChecksUqChecks($_stmt);
                        } elseif ('empty' === $deleteMode) {
                            $db->delete($table);
                        }
                        $db->executeStatement($_stmt);
                    }
                }
            } else {
                $tablesToRemove = [];
            }


            //--------------------------------------------
            // ADD
            //--------------------------------------------
            /**
             * Tables that we can add straight from the create definition,
             * since they don't even exist in the actual database.
             */
            $tableStatements = $reader->getCreateStatementsFromContent($createFileContent);

            $this->logDebug(count($tablesToAdd) . " table(s) to add.");

            foreach ($tablesToAdd as $table) {
                if (array_key_exists($table, $tableStatements)) {
                    $this->logDebug("Adding table $table.");
                    $_stmt = $tableStatements[$table];
                    $db->executeStatement($_stmt);
                } else {
                    $this->error("Create statement for table $table not found in the given \"create file\".");
                }
            }


            //--------------------------------------------
            // UPDATE
            //--------------------------------------------
            $addRemoveTables = array_merge($tablesToAdd, $tablesToRemove);

            if ($scope) {

                $unchangedTables = array_diff($effectiveScope, $addRemoveTables);

                if ($unchangedTables) {

                    $this->logDebug(count($unchangedTables) . " more table(s) to scan.");
                    foreach ($unchangedTables as $table) {
                        if (array_key_exists($table, $info)) {
                            $infoTable = $info[$table];
                            $options = [
                                'tableStatements' => $tableStatements,
                                'renamedItems' => $renamedItems,
                            ];
                            $this->synchronizeTableByInfoArray($table, $infoTable, $options);
                        } else {
                            $this->error("Info array not found for table $table.");
                        }
                    }
                } else {
                    $this->logDebug("No more tables to scan.");
                }
            }


        } catch (\PDOException $e) {
            $this->logError("Statement failed. An exception was caught with message: " . $e->getMessage() . ". The statement was: --" . PHP_EOL . $_stmt . PHP_EOL . "--" . PHP_EOL);
            return false;
        } catch (\Exception $e) {
            $this->logError("An exception was caught with message: " . $e->getMessage());
            return false;
        }
        return true;
    }

    /**
     * Returns the logErrorMessages of this instance.
     *
     * @return array
     */
    public function getLogErrorMessages(): array
    {
        return $this->logErrorMessages;
    }

    /**
     * Returns the logDebugMessages of this instance.
     *
     * @return array
     */
    public function getLogDebugMessages(): array
    {
        return $this->logDebugMessages;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Synchronizes a table by the given info array.
     *
     *
     *
     * The available options are:
     *
     * - tableStatements: an array of tableName => tableCreateStatement
     *      This is actually mandatory.
     *
     * - renamedItems: an array of renamed items, see the @page(getRenamedItems method's comments) for more details.
     *
     *
     *
     *
     *
     * @param string $table
     * @param string $fileInfo
     * @param array $options
     * @throws \Exception
     */
    protected function synchronizeTableByInfoArray(string $table, array $fileInfo, array $options)
    {
        $tableStatements = $options['tableStatements'];
        $renamedItems = $options['renamedItems'] ?? [];


        $forceChangeAlgo = true; // let this to false, unless you know what you are doing
        $hasChangeInColumns = false;

        $this->logDebug("Scanning table $table for changes...");

        $alterStmts = [];

        $mysqlInfoUtil = $this->getMysqlInfoUtil();

        $columnNames = $mysqlInfoUtil->getColumnNames($table);
        $fileColumnNames = $fileInfo['columnNames'];
        $currentEngine = $mysqlInfoUtil->getEngine($table);


        //--------------------------------------------
        // COLUMN CHANGES
        //--------------------------------------------
        $columnsToAdd = array_diff($fileColumnNames, $columnNames);
        $columnsToAdd = array_unique($columnsToAdd);
        $columnsToRemove = array_diff($columnNames, $fileColumnNames);
        $columnsToRemove = array_unique($columnsToRemove);

        $columnsToModify = [];


        // detect type changes
        $columnTypes = $mysqlInfoUtil->getColumnTypes($table, true);
        $columnTypes = $this->cleanColumnTypes($columnTypes);


        foreach ($fileInfo['columnTypes'] as $col => $type) {
            if (array_key_exists($col, $columnTypes)) {
                if ($columnTypes[$col] !== $type) {
                    $columnsToModify[] = $col;
                }
            }
        }


        // detect nullability changes
        $columnNullables = $mysqlInfoUtil->getColumnNullabilities($table);
        foreach ($fileInfo['columnNullables'] as $col => $type) {
            if (array_key_exists($col, $columnNullables)) {
                if ($columnNullables[$col] !== $type) {
                    $columnsToModify[] = $col;
                }
            }
        }


        // detect auto-increment changes
        $ai = $mysqlInfoUtil->getAutoIncrementedKey($table);
        if (false === $ai) {
            $ai = null;
        }


        if ($fileInfo['ai'] !== $ai) {
            if (null === $fileInfo['ai']) {
                $columnsToModify[] = $ai;
            } else {
                $columnsToModify[] = $fileInfo['ai'];
            }
        }


        // APPLY CHANGES
        //--------------------------------------------
        $columnsToModify = array_diff($columnsToModify, $columnsToAdd, $columnsToRemove);
        $columnsToModify = array_unique($columnsToModify);
        $alterColRename = [];
        if (array_key_exists("column", $renamedItems)) {
            $renamedColumns = $renamedItems['column'];
            foreach ($renamedColumns as $renamedTable => $items) {
                if ($table === $renamedTable) {
                    foreach ($items as $col => $val) {


                        if (
                            false !== ($index1 = array_search($val, $columnsToAdd)) &&
                            false !== ($index2 = array_search($col, $columnsToRemove))
                        ) {


                            $alterColRename[$col] = $this->getColDefinition($val, $fileInfo, "rename", [
                                "oldName" => $col,
                            ]);
                            $hasChangeInColumns = true;

                            unset($columnsToAdd[$index1]);
                            unset($columnsToRemove[$index2]);

                        }
                    }
                }
            }
        }


        $alterColAdd = [];
        $alterColRemove = [];
        $alterColUpdate = [];


        /**
         * Starting with drop in case you change the auto_incremented key, to make
         * sure you don't try to add a second auto_incremented key.
         * (not sure if it works like that, just a random guess).
         */
        foreach ($columnsToRemove as $col) {
            $colDef = 'DROP COLUMN `' . $col . '`';
            $alterStmts[] = $colDef;
            $alterColRemove[$col] = $colDef;
            $hasChangeInColumns = true;
        }
        foreach ($columnsToAdd as $col) {
            $colDef = $this->getColDefinition($col, $fileInfo);
            $alterStmts[] = $colDef;
            $alterColAdd[$col] = $colDef;
            $hasChangeInColumns = true;

        }
        foreach ($columnsToModify as $col) {
            $colDef = $this->getColDefinition($col, $fileInfo, "update");
            $alterStmts[] = $colDef;
            $alterColUpdate[$col] = $colDef;
            $hasChangeInColumns = true;
        }


        //--------------------------------------------
        // PRIMARY KEY CHANGE
        //--------------------------------------------
        $alterPrimary = [];
        $newPrimaryKey = null; // if array, then alter, if null do nothing
        $dropPrimaryKey = false;
        $pk = $mysqlInfoUtil->getPrimaryKey($table);
        if ($pk !== $fileInfo['pk']) {
            if (null === $fileInfo['pk']) {
                $dropPrimaryKey = true;
            } else {
                $newPrimaryKey = $fileInfo['pk'];
            }
        }

        if (null !== $newPrimaryKey || true === $dropPrimaryKey) {
            $s = "DROP PRIMARY KEY";
            $alterStmts[] = $s;
            $alterPrimary[] = $s;
        }

        if (null !== $newPrimaryKey) {
            $s = "ADD PRIMARY KEY (`" . implode('`,`', $newPrimaryKey) . "`)";
            $alterStmts[] = $s;
            $alterPrimary[] = $s;
        }


        //--------------------------------------------
        // UNIQUE INDEXES CHANGES
        //--------------------------------------------
        $alterUniqueIndexes = [];
        $uids = $mysqlInfoUtil->getUniqueIndexesDetails($table);
        list($uidToAdd, $uidToRemove, $uidToModify) = $this->getIndexDiff($uids, $fileInfo['uindDetails']);

        $this->addStatementsForIndex($uidToAdd, $uidToRemove, $uidToModify, $alterUniqueIndexes, true);
        $alterStmts = array_unique(array_merge($alterStmts, $alterUniqueIndexes));


        //--------------------------------------------
        // INDEXES CHANGES
        //--------------------------------------------
        $alterIndexes = [];
        $ids = $mysqlInfoUtil->getIndexesDetails($table);
        list($idToAdd, $idToRemove, $idToModify) = $this->getIndexDiff($ids, $fileInfo['indexes']);
        $this->addStatementsForIndex($idToAdd, $idToRemove, $idToModify, $alterIndexes, false);
        $alterStmts = array_unique(array_merge($alterStmts, $alterIndexes));


        //--------------------------------------------
        // FOREIGN KEY CHANGES
        //--------------------------------------------
        $alterFks = [];
        $currentInfo = $this->getMysqlStructureReader()->readContent($mysqlInfoUtil->getCreateStatement($table) . ';');
        $fks = $currentInfo[$table]['fkeyDetails'];
        $fileFks = $fileInfo['fkeyDetails'];
        $cNames = array_keys($fks);
        $fileCNames = array_keys($fileFks);


        $fkNamesToAdd = array_diff($fileCNames, $cNames);

        $fksToAdd = [];
        $fksToRemove = array_diff($cNames, $fileCNames);
        $fksToModify = [];


        foreach ($fkNamesToAdd as $cName) {
            if (array_key_exists($cName, $fileFks)) {
                $fksToAdd[$cName] = $fileFks[$cName];
            } else {
                $this->error("Foreign key constraint not found: $cName.");
            }
        }

        $unchanged = array_diff($fileCNames, array_merge($fksToRemove, $fkNamesToAdd));


        foreach ($unchanged as $name) {
            if (array_key_exists($name, $fileFks)) {

                if (array_key_exists($name, $fks)) {

                    $fileFkInfo = $fileFks[$name];
                    $fkInfo = $fks[$name];


                    // detect fk name changes
                    if (false === ArrayTool::isIdentical($fileFkInfo, $fkInfo)) {
                        $fksToModify[$name] = $fileFkInfo;
                    }


                } else {
                    $this->error("Foreign key constraint not found in target array: $name.");
                }

            } else {
                $this->error("Foreign key constraint not found in source array: $name.");
            }
        }


        $toRemove = array_unique(array_merge($fksToRemove, array_keys($fksToModify)));
        $toAdd = array_merge($fksToAdd, array_keys($fksToModify));

        foreach ($toRemove as $cName) {
            $s = "DROP FOREIGN KEY `$cName`";
            $alterStmts[] = $s;
            $alterFks[] = $s;
        }

        foreach ($toAdd as $cName => $_fkInfo) {
            $stmt = "ADD FOREIGN KEY `$cName`";

            $stmt .= ' (`' . implode('`,`', $_fkInfo['fks']) . '`)';
            $stmt .= ' REFERENCES `' . $_fkInfo['references']["table"] . '` (`' . implode('`,`', $_fkInfo['references']["columns"]) . '`)';
            if (null !== $_fkInfo['onDelete']) {
                $stmt .= ' ON DELETE ' . $_fkInfo['onDelete'];
            }
            if (null !== $_fkInfo['onUpdate']) {
                $stmt .= ' ON UPDATE ' . $_fkInfo['onUpdate'];
            }
            $alterStmts[] = $stmt;
            $alterFks[] = $stmt;
        }


        //--------------------------------------------
        // ENGINE CHANGES
        //--------------------------------------------
        $alterEngine = [];
        if ($currentEngine !== $fileInfo['engine']) {
            $s = 'ENGINE = ' . $fileInfo['engine'];
            $alterStmts[] = $s;
            $alterEngine[] = $s;
        }


        //--------------------------------------------
        // SYNCHRONIZATION ALGORITHM
        //--------------------------------------------
        $atLeastOneChange = (count($alterStmts) > 0);
        if (true === $atLeastOneChange) {

            $this->logDebug("Changes detected for table $table.");

            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get('database');


            // does the actual table contain rows?
            $row = $db->fetch("select count(*) as count from `$table`");
            if (false !== $row) {

                $hasRows = ('0' !== $row['count']);

                if (false === $forceChangeAlgo && false === $hasRows) {

                    $this->logDebug("Table $table is empty, will try to drop it and recreate it.");
                    // the table is empty, let's drop it and recreate it

                    $stmtCreate = $tableStatements[$table];


                    $stmtDrop = "DROP TABLE `$table`;";
                    $stmtDrop = SqlWizardGeneralTool::statementDisableFkChecksUqChecks($stmtDrop);

                    $this->executeStatement($stmtDrop, "drop statement");
                    $this->executeStatement($stmtCreate, "create statement");

                } else {


                    $this->logDebug("Table $table is not empty, resuming analysis...");

                    //--------------------------------------------
                    // DETECT COLUMN CHANGES
                    //--------------------------------------------
                    if (true === $hasChangeInColumns) {

                        $this->logDebug("Column changes detected.");


                        //--------------------------------------------
                        // ALTERING COLUMN WHICH NAME DIDN'T CHANGE
                        //--------------------------------------------
                        if ($alterColUpdate) {
                            $this->logDebug("Properties have changed for column(s): " . implode(', ', array_keys($alterColUpdate)) . ".");
                            $this->executeAlter($table, $alterColUpdate);
                        }


                        //--------------------------------------------
                        // REMOVING COLUMNS
                        //--------------------------------------------
                        if ($alterColRemove) {
                            $this->logDebug(count($alterColRemove) . " new column(s) to remove: " . implode(', ', array_keys($alterColRemove)) . ".");
                            // all the columns from the old structure are still in the new structure
                            $this->executeAlter($table, $alterColRemove);
                        }


                        //--------------------------------------------
                        // ADDING COLUMNS
                        //--------------------------------------------
                        if ($alterColAdd) {
                            $this->logDebug(count($alterColAdd) . " new column(s) to add: " . implode(', ', array_keys($alterColAdd)) . ".");
                            // all the columns from the old structure are still in the new structure
                            $this->executeAlter($table, $alterColAdd);
                        }


                        //--------------------------------------------
                        // RENAMING COLUMNS
                        //--------------------------------------------
                        if ($alterColRename) {
                            $this->logDebug(count($alterColRename) . " column(s) to rename: " . implode(', ', array_keys($alterColRename)) . ".");
                            // all the columns from the old structure are still in the new structure
                            $this->executeAlter($table, $alterColRename);
                        }


                    } else {
                        $this->logDebug("No column changes detected.");
                    }


                    //--------------------------------------------
                    // PRIMARY KEY
                    //--------------------------------------------
                    if ($alterPrimary) {
                        $this->logDebug("Primary key change detected.");

                        /**
                         * Note to myself:
                         * this was not tested thoroughly since most primary key changes will lead to errors,
                         * such as:
                         *
                         * - SQLSTATE[HY000]: General error: 1553 Cannot drop index 'PRIMARY': needed in a foreign key constraint
                         *
                         * which require the change in other plugins' tables in order to be fixed.
                         * Since I'm using the point of view of one plugin author (which doesn't have access to the
                         * other plugins tables), I didn't take the time to test all the cases
                         * for the primary key.
                         *
                         * Change this when necessary.
                         *
                         *
                         */
                        $this->executeStatementByArray($table, $alterPrimary);
                    } else {
                        $this->logDebug("No primary key changes detected.");
                    }


                    //--------------------------------------------
                    // UNIQUE INDEXES
                    //--------------------------------------------
                    if ($alterUniqueIndexes) {
                        $this->logDebug("Unique index changes detected.");
                        $this->executeStatementByArray($table, $alterUniqueIndexes);
                    } else {
                        $this->logDebug("No unique index changes detected.");
                    }

                    //--------------------------------------------
                    // REGULAR INDEXES
                    //--------------------------------------------
                    if ($alterIndexes) {
                        $this->logDebug("Regular index changes detected.");
                        $this->executeStatementByArray($table, $alterIndexes);
                    } else {
                        $this->logDebug("No regular index changes detected.");
                    }


                    //--------------------------------------------
                    // FOREIGN KEYS
                    //--------------------------------------------
                    if ($alterFks) {
                        $this->logDebug("Foreign key changes detected.");
                        $this->executeStatementByArray($table, $alterFks);
                    } else {
                        $this->logDebug("No foreign key changes detected.");
                    }

                    //--------------------------------------------
                    // ENGINE
                    //--------------------------------------------
                    if ($alterEngine) {
                        $this->logDebug("Engine change detected.");
                        $this->executeStatementByArray($table, $alterEngine);
                    } else {
                        $this->logDebug("No engine change detected.");
                    }


                }
            } else {
                $this->logError("Cannot detect whether the `$table` table is empty. The fetch count statement failed.");
            }
        } else {
            $this->logDebug("No changes detected for table $table.");
        }

    }


    /**
     * Execute the given statements.
     *
     * @param string $table
     * @param array $stmts
     */
    private function executeStatementByArray(string $table, array $stmts)
    {
        $this->executeStatement('ALTER TABLE `' . $table . '` ' . PHP_EOL . implode(',' . PHP_EOL, $stmts));
    }

    /**
     * Executes the given statement, and logs it if necessary.
     *
     * @param string $stmt
     * @param string|null $statementLabel
     */
    private function executeStatement(string $stmt, string $statementLabel = null)
    {
        if (null === $statementLabel) {
            $statementLabel = "statement";
        }
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');
        try {
            $this->logDebug("Executing $statementLabel: " . PHP_EOL . "--" . PHP_EOL . $stmt . PHP_EOL . "--" . PHP_EOL);
            $db->executeStatement($stmt);
        } catch (\Exception $e) {
            $this->logError("Statement failed, exception was caught with message: " . $e->getMessage());
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception,
     * and optionally logs the error message (if the useDebug option is set to true).
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        $this->logDebug("Unexpected error: " . $msg);
        throw new LightDbSynchronizerException($msg);
    }


    /**
     * Returns a MysqlStructureReader instance.
     *
     * @return MysqlStructureReader
     */
    private function getMysqlStructureReader(): MysqlStructureReader
    {
        if (null === $this->mysqlStructureReader) {
            $this->mysqlStructureReader = new MysqlStructureReader();
        }
        return $this->mysqlStructureReader;
    }


    /**
     * Returns a MysqlInfoUtil instance.
     *
     * @return MysqlInfoUtil
     */
    private function getMysqlInfoUtil(): MysqlInfoUtil
    {
        if (null === $this->mysqlInfoUtil) {
            $this->mysqlInfoUtil = new MysqlInfoUtil();
            $this->mysqlInfoUtil->setWrapper($this->container->get('database'));
        }
        return $this->mysqlInfoUtil;
    }


    /**
     * Returns the diff array for the given indexes.
     *
     * The returned array has the following entries:
     *
     * - 0: indexes to add. It's an array of indexName => indexCols
     * - 1: indexes to remove. It's an array of index names.
     * - 2: indexes to modify. It's an array of indexName => indexCols
     *
     * The $uids parameter is the array resulting from the call to the @page(mysqlInfoUtil->getUniqueIndexesDetails method).
     * The $fileUids parameter is the "indexes" property of the array resulting from the call to the readContent method of this class.
     *
     *
     *
     *
     *
     *
     *
     * @param array $uids
     * @param array $fileUids
     * @return array
     */
    private function getIndexDiff(array $uids, array $fileUids): array
    {
        $uidToAdd = [];
        $uidToModify = [];

        $fileUidNames = [];
        foreach ($fileUids as $uidInfo) {
            $uidName = $uidInfo['name'];
            $fileUidNames[] = $uidName;
            $uidKeys = $uidInfo['keys'];
            if (array_key_exists($uidName, $uids)) {
                $keys = $uids[$uidName];
                if (false === ArrayTool::isIdentical($keys, $uidKeys)) {
                    $uidToModify[$uidName] = $uidKeys;
                }

            } else {
                $uidToAdd[$uidName] = $uidKeys;
            }

        }
        $uidNames = array_keys($uids);
        $uidToRemove = array_diff($uidNames, $fileUidNames);


        return [
            $uidToAdd,
            $uidToRemove,
            $uidToModify,
        ];
    }


    /**
     * Returns a cleaned columnTypes array.
     * By cleaned, I mean: the maximum display width specification is removed from
     * the int types except for tinyInt(1).
     *
     *
     * The reason is explained below:
     * https://docs.oracle.com/cd/E17952_01/mysql-8.0-relnotes-en/news-8-0-19.html
     *
     * display width specification for int type is deprecated as of MySQL 8.0.17,
     * with exception of tinyInt(1) (which acts as a boolean column).
     *
     *
     * @param array $columnTypes
     * @return array
     */
    private function cleanColumnTypes(array $columnTypes): array
    {
        $ret = [];
        foreach ($columnTypes as $col => $type) {
            if (preg_match('!([^(]+)\(([0-9]+)\)!', $type, $match)) {
                $baseType = $match[1];
                $maxDisplayWidth = $match[2];
                switch ($baseType) {
                    case "int":
                    case "smallint":
                    case "mediumint":
                    case "bigint":
                        $type = $baseType;
                        break;
                    case "tinyint":
                        if ('1' !== $maxDisplayWidth) {
                            $type = $baseType;
                        }
                        break;
                }
            }
            $ret[$col] = $type;
        }
        return $ret;
    }


    /**
     * Returns the column definition to use in an alter statement for the given column.
     *
     * The type defines which type of alter function to call.
     * The possible values are:
     *
     * - add: to add the column (default value)
     * - update: to update the column
     * - rename: to rename the column, in which case the newName option must be defined.
     *
     *
     * Available options are:
     *
     * - oldName: string, the name of the renamed column (if type=rename) before the renaming
     *
     *
     * @param string $col
     * @param array $fileInfo
     * @param string $type
     * @param array $options
     * @return string
     * @throws \Exception
     */
    private function getColDefinition(string $col, array $fileInfo, string $type = 'add', array $options = []): string
    {
        $s = '';
        if (array_key_exists($col, $fileInfo['columnTypes'])) {
            if (array_key_exists($col, $fileInfo['columnNullables'])) {
                if ('add' === $type) {
                    $s .= 'ADD COLUMN ';
                } elseif ('update' === $type) {
                    $s .= 'MODIFY COLUMN ';
                } elseif ('rename' === $type) {
                    $s .= 'CHANGE COLUMN ';
                }

                if ('rename' === $type) {
                    $s .= '`' . $options['oldName'] . '` ';
                }


                $s .= '`' . $col . '`';


                $s .= ' ' . strtoupper($fileInfo['columnTypes'][$col]);
                if (true === $fileInfo['columnNullables'][$col]) {
                    $s .= ' NULL';
                } else {
                    $s .= ' NOT NULL';
                }

                if ($col === $fileInfo['ai']) {
                    $s .= ' AUTO_INCREMENT';
                }
                return $s;
            }
        }
        $this->error("Invalid fileInfo structure with column \"$col\", missing either columnTypes or columnNullables property.");
    }


    /**
     * Adds the alter statements for index (regular or unique).
     *
     *
     * @param array $uidToAdd
     * @param array $uidToRemove
     * @param array $uidToModify
     * @param array $alterStmts
     * @param bool $isUnique
     * @throws \Exception
     */
    private function addStatementsForIndex(array $uidToAdd, array $uidToRemove, array $uidToModify, array &$alterStmts, bool $isUnique = false)
    {

        $uidsToDrop = array_merge($uidToRemove, array_keys($uidToModify));
        $uidsToDrop = array_unique($uidsToDrop);
        foreach ($uidsToDrop as $uidName) {
            $alterStmts[] = 'DROP INDEX `' . $uidName . '`';
        }
        $newUids = array_merge($uidToAdd, $uidToModify);
        foreach ($newUids as $idName => $keys) {
            $flatKeys = array_map(function (array $key) {
                $s = '`' . $key['colName'] . '`';
                if (null !== $key['ascDesc']) {
                    $s .= ' ' . $key['ascDesc'];
                }
                return $s;
            }, $keys);


            $stmt = 'ADD';
            if (true === $isUnique) {
                $stmt .= ' UNIQUE';
            }
            if (empty($flatKeys)) {
                $this->error("The keys of the index cannot be empty.");
            }
            $stmt .= ' INDEX `' . $idName . '` (' . implode(',', $flatKeys) . ')';
            $alterStmts[] = $stmt;


        }
    }


    /**
     * Adds an error to the error log.
     * See the @page(Light_DbSynchronizer conception notes) for more details.
     *
     * @param string $msg
     */
    private function logError(string $msg)
    {
        $this->logDebug("Error: " . $msg);
        /**
         * @var $logger LightLoggerService
         */
        if (true === $this->container->has('logger')) {
            $logger = $this->container->get("logger");
            $logger->log($msg, "db_synchronizer.error");
            $this->logErrorMessages[] = $msg;

        }

        $stopAtFirstError = $this->options['stopAtFirstError'] ?? false;
        if (true === $stopAtFirstError) {
            throw new LightDbSynchronizerException("Interrupting execution of the script, by configuration (stopAtFirstError=true).");
        }
    }


    /**
     * Adds an error to the debug log, if the useDebug option is true.
     *
     *
     * @param string $msg
     */
    private function logDebug(string $msg)
    {
        $useDebug = $this->options['useDebug'] ?? false;
        if (true === $useDebug) {
            if (true === $this->container->has('logger')) {
                /**
                 * @var $logger LightLoggerService
                 */
                $logger = $this->container->get("logger");
                $logger->log($msg, "db_synchronizer.debug");
            }
        }
        $this->logDebugMessages[] = $msg;
    }


    /**
     * Executes the given array of alter statements.
     *
     * @param string $table
     * @param array $alterStmts
     */
    private function executeAlter(string $table, array $alterStmts)
    {
        $alterStmt = "ALTER TABLE `$table`" . PHP_EOL;
        $alterStmt .= implode("," . PHP_EOL, $alterStmts);
        $this->executeStatement($alterStmt);
    }


    /**
     * Returns the renamed items found in the given content.
     *
     * The returned array has the following structure:
     *
     * - $renameType => $renamedItemsForType
     *
     *
     * The $renameType can be one of:
     * - table (a table has been renamed)
     * - column (a column has been renamed)
     *
     * The $renamedItemsForType depends on the type.
     *
     * For the table type, the $renamedItemsForType is an array of oldName => newName:
     * For the column type, the $renamedItemsForType is an array of tableName => oldName => newName:
     *
     *
     *
     *
     *
     *
     *
     *
     *
     * See the @page(Light_DbSynchronizer conception notes) for more details.
     *
     *
     * @param string $content
     * @return array
     */
    private function getRenamedItems(string $content): array
    {
        $ret = [];
        if (preg_match_all('!^-- @rename (?:(table|column)\s)?(.+)->(.*)!m', $content, $matches, \PREG_SET_ORDER)) {
            foreach ($matches as $match) {


                $type = $match[1];
                $body = $match[2];
                $renamed = $match[3];
                if ('' === $type) {
                    $type = 'column';
                }
                if (false === array_key_exists($type, $ret)) {
                    $ret[$type] = [];
                }

                switch ($type) {
                    case "column":

                        $p = explode(":", $body, 2);
                        if (2 === count($p)) {
                            $table = array_shift($p);
                            $column = trim(array_shift($p));
                            if (false === array_key_exists($table, $ret[$type])) {
                                $ret[$type][$table] = [];
                            }
                            $ret[$type][$table][$column] = $renamed;
                        }
                        break;
                    case "table":
                        $ret[$type][$body] = $renamed;
                        break;
                }
            }
        }
        return $ret;
    }
}