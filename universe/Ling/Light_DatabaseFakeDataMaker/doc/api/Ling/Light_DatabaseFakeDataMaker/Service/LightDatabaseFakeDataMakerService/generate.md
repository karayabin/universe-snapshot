[Back to the Ling/Light_DatabaseFakeDataMaker api](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker.md)<br>
[Back to the Ling\Light_DatabaseFakeDataMaker\Service\LightDatabaseFakeDataMakerService class](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService.md)


LightDatabaseFakeDataMakerService::generate
================



LightDatabaseFakeDataMakerService::generate — Generate $nbRows rows into the given table, using the given generator, and returns an array of inserted data.




Description
================


public [LightDatabaseFakeDataMakerService::generate](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/generate.md)(string $fullTable, int $nbRows, [Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGeneratorInterface](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface.md) $generator, ?array $options = []) : array




Generate $nbRows rows into the given table, using the given generator, and returns an array of inserted data.

The returned array is an array of index => insertedData,

where:

- index is a self auto-incremented index
- insertedData is either the array of inserted data, or an exception object


The table is given as a [full table](https://github.com/lingtalfi/TheBar/blob/master/discussions/full-table.md).

If a generator is not defined for a particular column, a default value will be inserted.


Available options are:
- stopOnException: bool=false. If true, this method stops as soon as it encounters an exception, and it throws the exception at you.
         If false, the exception is silently ignored, and the exception instance is available in the return of this method.
         For instance, if a duplicate entry is detected, this will throw an exception depending on your pdo settings (we use Ling.Light_Database under the hood).




Parameters
================


- fullTable

    

- nbRows

    

- generator

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightDatabaseFakeDataMakerService::generate](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/Service/LightDatabaseFakeDataMakerService.php#L128-L247)


See Also
================

The [LightDatabaseFakeDataMakerService](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService.md) class.

Previous method: [getOption](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getOption.md)<br>Next method: [getFunctionFullTable](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getFunctionFullTable.md)<br>

