<?php


namespace Ling\Deploy\Util;


use Ling\Deploy\Helper\OptionHelper;

/**
 * The DbBackupFilesFetcherUtil class.
 *
 * This class helps retrieving database backup files, depending on some criteria passed by the user.
 *
 *
 * The main difference between database backup files and regular backup files is that database backup files
 * are organized by database identifier.
 *
 * Essentially, this adds one criterion to the mix: the **database identifiers** criteria.
 * This criteria is always executed first, to pre-filter the resulting collection,
 * and then, other criteria (name or last) are applied.
 * In other words, it prepares the context in which the other criteria will be applied.
 *
 *
 * Also, the **last** criteria applies on a per database identifier basis.
 * So for instance, let's say with have the following backups:
 *
 *
 * - backup_dir/db_identifier_one/2019-03-27__15-15-03.sql
 * - backup_dir/db_identifier_one/2019-03-27__15-21-03.sql
 * - backup_dir/db_identifier_one/2019-03-27__15-24-03.sql
 * - backup_dir/db_identifier_two/2019-03-27__15-15-03.sql
 * - backup_dir/db_identifier_two/2019-03-27__15-21-03.sql
 * - backup_dir/db_identifier_two/2019-03-27__15-24-03.sql
 *
 *
 * Then if we fetch using last=2, we would get 4 results by default (2 per database identifier):
 *
 * - backup_dir/db_identifier_one/2019-03-27__15-24-03.sql
 * - backup_dir/db_identifier_one/2019-03-27__15-21-03.sql
 * - backup_dir/db_identifier_two/2019-03-27__15-24-03.sql
 * - backup_dir/db_identifier_two/2019-03-27__15-21-03.sql
 *
 *
 *
 * For more info about database backup files, see the @page(database backup files) page.
 *
 *
 *
 */
class DbBackupFilesFetcherUtil extends BackupFilesFetcherUtil
{


    /**
     * This property holds the optional database identifiers array for this instance.
     * @var array|null
     */
    protected $databaseIdentifiers;


    /**
     * Builds the DbBackupFilesFetcherUtil instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->databaseIdentifiers = null;
    }

    /**
     * Sets the database identifiers, either by using a comma separated list of database identifiers,
     * or by using an array.
     *
     * @param array|string $identifiers
     */
    public function setDatabaseIdentifiers($identifiers)
    {
        if (is_string($identifiers)) {
            $identifiers = OptionHelper::csvToArray($identifiers);
        }
        $this->databaseIdentifiers = $identifiers;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function filterWithLast(array $nonNamed, int $last)
    {
        $ret = [];
        $groupedByDbId = [];
        foreach ($nonNamed as $file) {
            $dbIdentifier = basename(dirname($file));
            if (false === array_key_exists($dbIdentifier, $groupedByDbId)) {
                $groupedByDbId[$dbIdentifier] = [];
            }
            $groupedByDbId[$dbIdentifier][] = $file;
        }


        foreach ($groupedByDbId as $dbId => $files) {
            $ret = array_merge($ret, array_slice($files, 0, $last));
        }
        return $ret;
    }


    /**
     * @overrides
     */
    protected function onAllFilesReady(array &$files)
    {
        // filtering database identifiers
        if (null !== $this->databaseIdentifiers) {
            $files = array_filter($files, function ($v) {
                $dbIdentifier = basename(dirname($v));
                return in_array($dbIdentifier, $this->databaseIdentifiers, true);
            });
        }
    }

}