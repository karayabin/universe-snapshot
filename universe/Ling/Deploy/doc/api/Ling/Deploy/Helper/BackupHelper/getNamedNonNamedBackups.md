[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Helper\BackupHelper class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/BackupHelper.md)


BackupHelper::getNamedNonNamedBackups
================



BackupHelper::getNamedNonNamedBackups — Returns an array of named and non-named backups for the given $backupDir.




Description
================


public static [BackupHelper::getNamedNonNamedBackups](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/BackupHelper/getNamedNonNamedBackups.md)(string $backupDir, string $extension) : array




Returns an array of named and non-named backups for the given $backupDir.

A named backup is a backup which name was given explicitly by the user.
A non-named backup is a backup automatically created by the deploy system; it is based on the datetime
and look like this:

```txt
2019-03-26__08-49-17.$extension
```

The non-named backups are ordered from the most recent to the oldest.

The returned array has the following structure:

- 0: array of named backup file paths
- 1: array of ordered non-named backup file paths




Parameters
================


- backupDir

    

- extension

    


Return values
================

Returns array.


Exceptions thrown
================

- [DeployException](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Exception/DeployException.md).&nbsp;







Source Code
===========
See the source code for method [BackupHelper::getNamedNonNamedBackups](https://github.com/lingtalfi/Deploy/blob/master/Helper/BackupHelper.php#L43-L70)


See Also
================

The [BackupHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/BackupHelper.md) class.



