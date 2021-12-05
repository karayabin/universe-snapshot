[Back to the Ling/Light_DatabaseFakeDataMaker api](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker.md)<br>
[Back to the Ling\Light_DatabaseFakeDataMaker\Service\LightDatabaseFakeDataMakerService class](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService.md)


LightDatabaseFakeDataMakerService::getOption
================



LightDatabaseFakeDataMakerService::getOption — Returns the option value corresponding to the given key.




Description
================


public [LightDatabaseFakeDataMakerService::getOption](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void




Returns the option value corresponding to the given key.
If the option is not found, the return depends on the throwEx flag:

- if set to true, an exception is thrown
- if set to false, the default value is returned




Parameters
================


- key

    

- default

    

- throwEx

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabaseFakeDataMakerService::getOption](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/Service/LightDatabaseFakeDataMakerService.php#L83-L92)


See Also
================

The [LightDatabaseFakeDataMakerService](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setOptions.md)<br>Next method: [generate](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/generate.md)<br>

