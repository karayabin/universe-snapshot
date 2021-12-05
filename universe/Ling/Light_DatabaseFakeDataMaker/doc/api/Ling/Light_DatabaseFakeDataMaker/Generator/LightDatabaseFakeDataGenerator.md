[Back to the Ling/Light_DatabaseFakeDataMaker api](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker.md)



The LightDatabaseFakeDataGenerator class
================
2021-07-02 --> 2021-07-30






Introduction
============

The LightDatabaseFakeDataGenerator class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseFakeDataGenerator</span> implements [LightDatabaseFakeDataGeneratorInterface](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface.md) {

- Properties
    - private array [$columnGenerators](#property-columnGenerators) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/__construct.md)() : void
    - public [addColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/addColumnGenerator.md)(string $column, $generator) : [LightDatabaseFakeDataGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator.md)
    - public [getColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/getColumnGenerator.md)(string $column) : mixed

}




Properties
=============

- <span id="property-columnGenerators"><b>columnGenerators</b></span>

    This property holds the columnGenerators for this instance.
    
    



Methods
==============

- [LightDatabaseFakeDataGenerator::__construct](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/__construct.md) &ndash; Builds the LightDatabaseFakeDataGenerator instance.
- [LightDatabaseFakeDataGenerator::addColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/addColumnGenerator.md) &ndash; Adds a column generator to this instance.
- [LightDatabaseFakeDataGenerator::getColumnGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGenerator/getColumnGenerator.md) &ndash; Returns a column generator, or null if no generator is defined for this column.





Location
=============
Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGenerator<br>
See the source code of [Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGenerator](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/Generator/LightDatabaseFakeDataGenerator.php)



SeeAlso
==============
Previous class: [LightDatabaseFakeDataMakerException](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Exception/LightDatabaseFakeDataMakerException.md)<br>Next class: [LightDatabaseFakeDataGeneratorInterface](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface.md)<br>
