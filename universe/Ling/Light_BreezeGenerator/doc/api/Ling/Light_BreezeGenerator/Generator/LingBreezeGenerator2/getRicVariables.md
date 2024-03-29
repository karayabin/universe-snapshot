[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2 class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md)


LingBreezeGenerator2::getRicVariables
================



LingBreezeGenerator2::getRicVariables — Returns some useful variables based on the ric array.




Description
================


protected [LingBreezeGenerator2::getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getRicVariables.md)(array $ric, array $types) : array




Returns some useful variables based on the ric array.

It returns at least the following entries (see the source code for all details):

- byString: the string to append to a method name based on ric.
        Ex:
             - ById
             - ByFirstnameAndLastname
- argString: the string representing the "ric" arguments in the method signature.
        Ex:
             - int $id
             - string $firstName, string $lastName
- variableString: the string representing the "ric" debug array in comments.
        Ex:
             - id=$id
             - firstName=$firstName, lastName=$lastName
- markerString: the string representing the "ric" arguments in the the where clause of the mysql query.
        Ex:
             - id=:id
             - first_name=:first_name and last_name=:last_name
- markerLines: an array of lines representing the $markers variable to inject into the pdo wrapper fetch method.
        Ex:
             -
                 "id" => $id,
             -
                 "first_name" => $first_name,
                 "last_name" => $last_name,

- calledVariables: the string representing a comma separated variable names. We use it as method arguments when invoking a method.
         Ex:
             - $id
             - $firstName, $lastName



The types array is an array of columnName => mysql type.

A mysql type looks like this: int(11), or varchar(128) for instance.




Parameters
================


- ric

    

- types

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LingBreezeGenerator2::getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator2.php#L1058-L1176)


See Also
================

The [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md) class.

Previous method: [getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassNameFromTable.md)<br>Next method: [getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUniqueIndexesVariables.md)<br>

