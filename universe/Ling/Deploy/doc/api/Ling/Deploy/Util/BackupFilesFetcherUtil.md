[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The BackupFilesFetcherUtil class
================
2019-04-03 --> 2020-12-08






Introduction
============

The BackupFilesFetcherUtil class.
This class helps retrieving backup files, depending on some criteria passed by the user.

The possible criteria are:

- names: array. An array of backup names. If set, the resulting collection will only contain the backup files which name
             match those of the array. This criteria has precedence over the **last** criteria.
- last: int>0.  The max number of (most recent) non-named backups to return.
             If set, the resulting collection will contain the n most recent non-named backups (with n=last).
             This criterion is only effective if the **names** criterion is not set.



For more info about backup files, see the [backup files](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-deploy-directory-in-the-application) page.



Class synopsis
==============


class <span class="pl-k">BackupFilesFetcherUtil</span>  {

- Properties
    - protected int|null [$last](#property-last) ;
    - protected array|null [$names](#property-names) ;
    - protected string [$backupDir](#property-backupDir) ;
    - protected string [$extension](#property-extension) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/__construct.md)() : void
    - public [setLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setLast.md)(int $last) : void
    - public [setNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setNames.md)($names) : void
    - public [setBackupDir](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setBackupDir.md)(string $backupDir) : void
    - public [setExtension](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setExtension.md)(string $extension) : void
    - public [fetch](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/fetch.md)() : array
    - protected [filterWithNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithNames.md)(array $allFiles, array $names) : array
    - protected [filterWithLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithLast.md)(array $nonNamed, int $last) : array
    - protected [onAllFilesReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/onAllFilesReady.md)(array &$files) : void

}




Properties
=============

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

- [BackupFilesFetcherUtil::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/__construct.md) &ndash; Builds the BackupFilesFetcherUtil instance.
- [BackupFilesFetcherUtil::setLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setLast.md) &ndash; Sets the last option.
- [BackupFilesFetcherUtil::setNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setNames.md) &ndash; or by using an array.
- [BackupFilesFetcherUtil::setBackupDir](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setBackupDir.md) &ndash; Sets the backupDir.
- [BackupFilesFetcherUtil::setExtension](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/setExtension.md) &ndash; Sets the extension.
- [BackupFilesFetcherUtil::fetch](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/fetch.md) &ndash; Returns the array of backup files matching this instance's criteria.
- [BackupFilesFetcherUtil::filterWithNames](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithNames.md) &ndash; Returns the array of files matching the given names.
- [BackupFilesFetcherUtil::filterWithLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithLast.md) &ndash; Returns the array containing at most the $last most recent non-named backups.
- [BackupFilesFetcherUtil::onAllFilesReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/onAllFilesReady.md) &ndash; Hook to allow subclasses to filter the files array before default criteria are applied.





Location
=============
Ling\Deploy\Util\BackupFilesFetcherUtil<br>
See the source code of [Ling\Deploy\Util\BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/Util/BackupFilesFetcherUtil.php)



SeeAlso
==============
Previous class: [ScpHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper.md)<br>Next class: [DbBackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DbBackupFilesFetcherUtil.md)<br>
