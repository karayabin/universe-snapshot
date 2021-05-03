[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)



The LightDbSynchronizerService class
================
2020-06-19 --> 2021-04-06






Introduction
============

The LightDbSynchronizerService class.



Class synopsis
==============


class <span class="pl-k">LightDbSynchronizerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$logErrorMessages](#property-logErrorMessages) ;
    - protected array [$logDebugMessages](#property-logDebugMessages) ;
    - private [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) [$mysqlInfoUtil](#property-mysqlInfoUtil) ;
    - private [Ling\SqlWizard\Util\MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) [$mysqlStructureReader](#property-mysqlStructureReader) ;
    - private array [$options](#property-options) ;
    - private array [$fileColumnNames](#property-fileColumnNames) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setOptions.md)(array $options) : void
    - public [synchronize](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronize.md)(string $createFile, ?array $options = []) : bool
    - public [getLogErrorMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogErrorMessages.md)() : array
    - public [getLogDebugMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogDebugMessages.md)() : array
    - protected [synchronizeTableByInfoArray](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronizeTableByInfoArray.md)(string $table, array $fileInfo, array $options) : void
    - private [executeStatement](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/executeStatement.md)(string $stmt, ?string $statementLabel = null) : void
    - private [error](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/error.md)(string $msg) : void
    - private [getMysqlStructureReader](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getMysqlStructureReader.md)() : [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)
    - private [getMysqlInfoUtil](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getMysqlInfoUtil.md)() : [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)
    - private [getIndexDiff](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getIndexDiff.md)(array $uids, array $fileUids) : array
    - private [cleanColumnTypes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/cleanColumnTypes.md)(array $columnTypes) : array
    - private [getColDefinition](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getColDefinition.md)(string $col, array $fileInfo, ?string $type = add, ?array $options = []) : string
    - private [addStatementsForIndex](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/addStatementsForIndex.md)(array $uidToAdd, array $uidToRemove, array $uidToModify, array &$alterStmts, ?bool $isUnique = false) : void
    - private [logError](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/logError.md)(string $msg) : void
    - private [logDebug](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/logDebug.md)(string $msg) : void
    - private [executeAlter](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/executeAlter.md)(string $table, array $alterStmts) : void
    - private [getRenamedItems](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getRenamedItems.md)(string $content) : array

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-logErrorMessages"><b>logErrorMessages</b></span>

    This property holds the logErrorMessages for this instance.
    
    

- <span id="property-logDebugMessages"><b>logDebugMessages</b></span>

    This property holds the logDebugMessages for this instance.
    
    

- <span id="property-mysqlInfoUtil"><b>mysqlInfoUtil</b></span>

    This property holds the mysqlInfoUtil for this instance.
    
    

- <span id="property-mysqlStructureReader"><b>mysqlStructureReader</b></span>

    This property holds the mysqlStructureReader for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    - useDebug: bool=true.
         Whether to allow debug log (if it's configured).
    
    - stopAtFirstError: bool=false.
         If true, this method stops its execution whenever the first error is encountered.
         If false, it keeps going until the end (unless an unexpected exception is thrown).
    
    

- <span id="property-fileColumnNames"><b>fileColumnNames</b></span>

    An internal cache for column names, in desired order.
    
    



Methods
==============

- [LightDbSynchronizerService::__construct](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/__construct.md) &ndash; Builds the LightDbSynchronizerService instance.
- [LightDbSynchronizerService::setContainer](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setContainer.md) &ndash; Sets the container.
- [LightDbSynchronizerService::setOptions](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setOptions.md) &ndash; Sets the options.
- [LightDbSynchronizerService::synchronize](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronize.md) &ndash; and returns whether the synchronization was perfectly executed.
- [LightDbSynchronizerService::getLogErrorMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogErrorMessages.md) &ndash; Returns the logErrorMessages of this instance.
- [LightDbSynchronizerService::getLogDebugMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogDebugMessages.md) &ndash; Returns the logDebugMessages of this instance.
- [LightDbSynchronizerService::synchronizeTableByInfoArray](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronizeTableByInfoArray.md) &ndash; Synchronizes a table by the given info array.
- [LightDbSynchronizerService::executeStatement](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/executeStatement.md) &ndash; Executes the given statement, and logs it if necessary.
- [LightDbSynchronizerService::error](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/error.md) &ndash; and optionally logs the error message (if the useDebug option is set to true).
- [LightDbSynchronizerService::getMysqlStructureReader](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getMysqlStructureReader.md) &ndash; Returns a MysqlStructureReader instance.
- [LightDbSynchronizerService::getMysqlInfoUtil](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getMysqlInfoUtil.md) &ndash; Returns a MysqlInfoUtil instance.
- [LightDbSynchronizerService::getIndexDiff](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getIndexDiff.md) &ndash; Returns the diff array for the given indexes.
- [LightDbSynchronizerService::cleanColumnTypes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/cleanColumnTypes.md) &ndash; Returns a cleaned columnTypes array.
- [LightDbSynchronizerService::getColDefinition](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getColDefinition.md) &ndash; Returns the column definition to use in an alter statement for the given column.
- [LightDbSynchronizerService::addStatementsForIndex](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/addStatementsForIndex.md) &ndash; Adds the alter statements for index (regular or unique).
- [LightDbSynchronizerService::logError](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/logError.md) &ndash; Adds an error to the error log.
- [LightDbSynchronizerService::logDebug](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/logDebug.md) &ndash; Adds an error to the debug log, if the useDebug option is true.
- [LightDbSynchronizerService::executeAlter](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/executeAlter.md) &ndash; Executes the given array of alter statements.
- [LightDbSynchronizerService::getRenamedItems](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getRenamedItems.md) &ndash; Returns the renamed items found in the given content.





Location
=============
Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService<br>
See the source code of [Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php)



SeeAlso
==============
Previous class: [LightDbSynchronizerHelper](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper.md)<br>
