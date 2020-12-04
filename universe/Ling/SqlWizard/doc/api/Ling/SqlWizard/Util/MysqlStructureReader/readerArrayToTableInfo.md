[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::readerArrayToTableInfo
================



MysqlStructureReader::readerArrayToTableInfo — which structure is defined in the [Light_DatabaseInfo->getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) method.




Description
================


public static [MysqlStructureReader::readerArrayToTableInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readerArrayToTableInfo.md)(array $readerArray, Ling\SimplePdoWrapper\SimplePdoWrapperInterface $pdoWrapper, ?string $defaultDb = null) : array




This is an adapter method that takes a **table info item** (see the output of
the MysqlStructureReader->readContent method) and returns a tableInfo array,
which structure is defined in the [Light_DatabaseInfo->getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) method.

Important note: the hasItems property is not derived from the readerArray, but regenerated
using the MysqlInfoUtil->getHasItems method.
The reason is that I thought it would add too much complexity to this class if I wanted
to implement this feature, sorry.




Parameters
================


- readerArray

    

- pdoWrapper

    

- defaultDb

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlStructureReader::readerArrayToTableInfo](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L58-L118)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Next method: [readFile](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readFile.md)<br>

