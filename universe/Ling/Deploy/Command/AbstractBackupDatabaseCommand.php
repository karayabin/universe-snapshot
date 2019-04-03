<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\Deploy\Util\DbBackupFilesFetcherUtil;

/**
 * The AbstractBackupDatabaseCommand class.
 *
 * A parent class for subclasses who need to create a database backup zip archive.
 *
 * createArchive
 * ---------------
 * This method is the same as the AbstractBackupCommand->createArchive method,
 * but it adds the following extra criteria:
 * - the **db** option
 *
 * The **db** option defines which database identifiers will be parsed (database backups are
 *      organized by database identifiers).
 *      This option is executed before the **name** and **last** option.
 *
 *
 * Also, the **last** option allows you to define the number of the non-named backups PER DATABASE IDENTIFIER to archive.
 *
 */
abstract class AbstractBackupDatabaseCommand extends AbstractBackupCommand
{
    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->backupDirName = "backup-db";
        $this->extension = "sql";
    }

    /**
     * @overrides
     */
    protected function getFetcherUtilInstance(InputInterface $input)
    {
        $dbOption = $input->getOption('db');
        $o =  new DbBackupFilesFetcherUtil();
        if (null !== $dbOption) {
            $o->setDatabaseIdentifiers($dbOption);
        }
        return $o;
    }
}