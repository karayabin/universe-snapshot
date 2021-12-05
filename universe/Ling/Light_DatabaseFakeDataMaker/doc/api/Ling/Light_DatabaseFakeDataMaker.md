Ling/Light_DatabaseFakeDataMaker
================
2021-07-02 --> 2021-07-30




Table of contents
===========

- [LightDatabaseFakeDataMakerException](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Exception/LightDatabaseFakeDataMakerException.md) &ndash; The LightDatabaseFakeDataMakerException class.
- [LightDatabaseFakeDataGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator.md) &ndash; The LightDatabaseFakeDataGenerator class.
    - [LightDatabaseFakeDataGenerator::__construct](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/__construct.md) &ndash; Builds the LightDatabaseFakeDataGenerator instance.
    - [LightDatabaseFakeDataGenerator::addColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/addColumnGenerator.md) &ndash; Adds a column generator to this instance.
    - [LightDatabaseFakeDataGenerator::getColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/getColumnGenerator.md) &ndash; Returns a column generator, or null if no generator is defined for this column.
- [LightDatabaseFakeDataGeneratorInterface](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface.md) &ndash; The LightDatabaseFakeDataGeneratorInterface interface.
    - [LightDatabaseFakeDataGeneratorInterface::getColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface/getColumnGenerator.md) &ndash; Returns a column generator, or null if no generator is defined for this column.
- [LightDatabaseFakeDataMakerService](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService.md) &ndash; The LightDatabaseFakeDataMakerService class.
    - [LightDatabaseFakeDataMakerService::__construct](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/__construct.md) &ndash; Builds the LightDatabaseFakeDataMakerService instance.
    - [LightDatabaseFakeDataMakerService::setContainer](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setContainer.md) &ndash; Sets the container.
    - [LightDatabaseFakeDataMakerService::setOptions](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setOptions.md) &ndash; Sets the options.
    - [LightDatabaseFakeDataMakerService::getOption](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getOption.md) &ndash; Returns the option value corresponding to the given key.
    - [LightDatabaseFakeDataMakerService::generate](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/generate.md) &ndash; Generate $nbRows rows into the given table, using the given generator, and returns an array of inserted data.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_SqlWizard](https://github.com/lingtalfi/Light_SqlWizard)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)


