[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Util\BackupFilesFetcherUtil class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md)


BackupFilesFetcherUtil::onAllFilesReady
================



BackupFilesFetcherUtil::onAllFilesReady — Hook to allow subclasses to filter the files array before default criteria are applied.




Description
================


protected [BackupFilesFetcherUtil::onAllFilesReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/onAllFilesReady.md)(array &$files) : void




Hook to allow subclasses to filter the files array before default criteria are applied.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- files

    


Return values
================

Returns void.








See Also
================

The [BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md) class.

Previous method: [filterWithLast](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil/filterWithLast.md)<br>

