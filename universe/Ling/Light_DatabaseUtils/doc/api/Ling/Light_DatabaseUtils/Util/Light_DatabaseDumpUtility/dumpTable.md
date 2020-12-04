[Back to the Ling/Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md)<br>
[Back to the Ling\Light_DatabaseUtils\Util\Light_DatabaseDumpUtility class](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility.md)


Light_DatabaseDumpUtility::dumpTable
================



Light_DatabaseDumpUtility::dumpTable — in the targetDir.




Description
================


public [Light_DatabaseDumpUtility::dumpTable](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/dumpTable.md)(string $table, string $targetDir, ?array $options = []) : mixed




Creates a dump (aka backup) of the given table, and writes it to the filesystem,
in the targetDir.
By default, the file name is the name of the table with the sql extension.

We can change the file name using the fileName option.



The available options are:

- fileName: string=null, the file name (the extension should be included too)
- useNullForAutoIncrementedKey: bool=false.
     If true, the generated insert statements will use the null value if the column is an auto-incremented column.
- returnAsString: bool=false.
     If true, the method will not write the file to the filesystem, but instead return it
     as a string.
- ignore: bool=false, whether to use the insert ignore statements
- disableFkCheck: bool=false, whether to disable fk checks




Parameters
================


- table

    

- targetDir

    

- options

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [Light_DatabaseDumpUtility::dumpTable](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/Util/Light_DatabaseDumpUtility.php#L72-L178)


See Also
================

The [Light_DatabaseDumpUtility](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/setContainer.md)<br>

