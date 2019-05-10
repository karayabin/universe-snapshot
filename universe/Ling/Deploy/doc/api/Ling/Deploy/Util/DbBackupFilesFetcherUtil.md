[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The DbBackupFilesFetcherUtil class
================
2019-04-03 --> 2019-05-10






Introduction
============

The DbBackupFilesFetcherUtil class.

This class helps retrieving database backup files, depending on some criteria passed by the user.


The main difference between database backup files and regular backup files is that database backup files
are organized by database identifier.

Essentially, this adds one criterion to the mix: the **database identifiers** criteria.
This criteria is always executed first, to pre-filter the resulting collection,
and then, other criteria (name or last) are applied.
In other words, it prepares the context in which the other criteria will be applied.


Also, the **last** criteria applies on a per database identifier basis.
So for instance, let's say with have the following backups:


- backup_dir/db_identifier_one/2019-03-27__15-15-03.sql
- backup_dir/db_identifier_one/2019-03-27__15-21-03.sql
- backup_dir/db_identifier_one/2019-03-27__15-24-03.sql
- backup_dir/db_identifier_two/2019-03-27__15-15-03.sql
- backup_dir/db_identifier_two/2019-03-27__15-21-03.sql
- backup_dir/db_identifier_two/2019-03-27__15-24-03.sql


Then if we fetch using last=2, we would get 4 results by default (2 per database identifier):

- backup_dir/db_identifier_one/2019-03-27__15-24-03.sql
- backup_dir/db_identifier_one/2019-03-27__15-21-03.sql
- backup_dir/db_identifier_two/2019-03-27__15-24-03.sql
- backup_dir/db_identifier_two/2019-03-27__15-21-03.sql



For more info about database backup files, see the [database backup files](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-deploy-directory-in-the-application) page.



Class synopsis
==============


class <span class="pl-k">DbBackupFilesFetcherUtil</span> extends [BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md)  {

- Properties
    - protected array|null [$databaseIdentifiers](#property-databaseIdentifiers) ;

- Inherited properties
    - protected int|null [BackupFilesFetcherUtil::$last](#property-last) ;
    - protected array|null [BackupFilesFetcherUtil::$names](#property-names) ;
    - protected string [BackupFilesFetcherUtil::$backupDir](#property-backupDir) ;
    - protected string [BackupFilesFetcherUtil::$extension](#property-extension) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/__construct.md)() : void
    - public [setDatabaseIdentifiers](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/setDatabaseIdentifiers.md)(?$identifiers) : void
    - protected [filterWithLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/filterWithLast.md)(array $nonNamed, int $last) : array
    - protected [onAllFilesReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/onAllFilesReady.md)(array &$files) : void

- Inherited methods
    - public [BackupFilesFetcherUtil::setLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setLast.md)(int $last) : void
    - public [BackupFilesFetcherUtil::setNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setNames.md)(?$names) : void
    - public [BackupFilesFetcherUtil::setBackupDir](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setBackupDir.md)(string $backupDir) : void
    - public [BackupFilesFetcherUtil::setExtension](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setExtension.md)(string $extension) : void
    - public [BackupFilesFetcherUtil::fetch](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/fetch.md)() : array
    - protected [BackupFilesFetcherUtil::filterWithNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithNames.md)(array $allFiles, array $names) : array

}




Properties
=============

- <span id="property-databaseIdentifiers"><b>databaseIdentifiers</b></span>

    This property holds the optional database identifiers array for this instance.
    
    

- <span id="property-last"><b>last</b></span>

    This property holds the optional last number for this instance.
    
    

- <span id="property-names"><b>names</b></span>

    This property holds the optional names array for this instance.
    
    

- <span id="property-backupDir"><b>backupDir</b></span>

    This property holds the backupDir for this instance.
    
    

- <span id="property-extension"><b>extension</b></span>

    This property holds the extension for this instance.
    
    



Methods
==============

- [DbBackupFilesFetcherUtil::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/__construct.md) &ndash; Builds the DbBackupFilesFetcherUtil instance.
- [DbBackupFilesFetcherUtil::setDatabaseIdentifiers](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/setDatabaseIdentifiers.md) &ndash; or by using an array.
- [DbBackupFilesFetcherUtil::filterWithLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/filterWithLast.md) &ndash; Returns the array containing at most the $last most recent non-named backups.
- [DbBackupFilesFetcherUtil::onAllFilesReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil/onAllFilesReady.md) &ndash; Hook to allow subclasses to filter the files array before default criteria are applied.
- [BackupFilesFetcherUtil::setLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setLast.md) &ndash; Sets the last option.
- [BackupFilesFetcherUtil::setNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setNames.md) &ndash; or by using an array.
- [BackupFilesFetcherUtil::setBackupDir](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setBackupDir.md) &ndash; Sets the backupDir.
- [BackupFilesFetcherUtil::setExtension](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setExtension.md) &ndash; Sets the extension.
- [BackupFilesFetcherUtil::fetch](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/fetch.md) &ndash; Returns the array of backup files matching this instance's criteria.
- [BackupFilesFetcherUtil::filterWithNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithNames.md) &ndash; Returns the array of files matching the given names.





Location
=============
Ling\Deploy\Util\DbBackupFilesFetcherUtil


SeeAlso
==============
Previous class: [BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md)<br>Next class: [DiffUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DiffUtil.md)<br>
