[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::synchronize
================



LightDbSynchronizerService::synchronize — and returns whether the synchronization was perfectly executed.




Description
================


public [LightDbSynchronizerService::synchronize](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronize.md)(string $createFile, ?array $options = []) : bool




Synchronize the database with the given create file,
and returns whether the synchronization was perfectly executed.

If not, details of problems are available via logs, or via the getLogErrorMessages/getLogDebugMessages methods.


See more details in the [Light_DbSynchronizer conception notes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md).

The available options are:

- scope: array, an array of table names which our tool might potentially alter or delete.
     Our tool can either add, remove or update tables.
     The scope doesn't affect the add operations.
     Note: we add this property to prevent accidents (no delete table operation will be executed on the actual database unless this array is set).
     and efficiency (to know which table to alter, we only parse the scope tables rather than the whole database tables).

     Note2: if you don't define this property, no alter or delete action will be executed by this method.


- useDelete: bool=true.
     If false, no tables will be removed from the database.
- deleteMode: string( natural | flags | empty )=flags.

         This only applies if useDelete=true.

         The behaviour to use when deleting a table.

         With the "natural" option, we just call a simple drop statement.
         The db engine might respond with foreign key constraint violation error which would result in the table NOT being removed.

         If you want to force the removal of the table, you can use the other options.
         With the "flags" options, which is the default and recommended option, this method will add
         the necessary necessary mysql? variables (flags?) so that the fk constraints will be ignored when
         the drop statement is executed.
         Note that this might lead to structure inconsistencies.
         However, on the positive side, it won't delete any rows.

         Another option, which only makes sense if you are using the ON DELETE CASCADE and ON UPDATE CASCADE modes,
         is the "empty" option.
         With the "empty" option, this tool will execute a simple drop (which again might fail),
         but it will try to delete all the rows first.
         The rationale being that if you are using the CASCADE modes, deleting the rows will actually remove all the
         rows of the table, and their "dependencies", and keep the consistency of the database, then removing the
         table should be no problem (as it should be empty by now, at least if there was no other problems while removing the rows).

         Note: often though, the problem will also come from the order in which the tables to delete are called.
         Note2: we don't recommend using this method, as it will lead to removal of rows, which you generally don't want.
         Rather, you generally prefer to remove the tables all at once and resolve the inconsistencies manually, as this is less
         destructive.






The database by default is the one provided with the [Light_Database plugin](https://github.com/lingtalfi/Light_Database), which our service depends on by default (unless you provide
a substitute, but this is not implemented yet).




Parameters
================


- createFile

    

- options

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightDbSynchronizerService::synchronize](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L187-L351)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setOptions.md)<br>Next method: [getLogErrorMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogErrorMessages.md)<br>

