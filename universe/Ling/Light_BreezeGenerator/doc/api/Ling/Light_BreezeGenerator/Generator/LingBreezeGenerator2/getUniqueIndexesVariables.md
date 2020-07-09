[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2 class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md)


LingBreezeGenerator2::getUniqueIndexesVariables
================



LingBreezeGenerator2::getUniqueIndexesVariables — Returns an array of useful variables sets based on the unique indexes array (one set per unique indexes entry is returned).




Description
================


protected [LingBreezeGenerator2::getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUniqueIndexesVariables.md)(array $uniqueIndexes, array $types) : array




Returns an array of useful variables sets based on the unique indexes array (one set per unique indexes entry is returned).


Each set contains the following entries:

- byString: the string to append to a method name based on unique indexes.
        Ex:
             - ByRealName
             - ByPseudoAndPassWord
- argString: the string representing the arguments in the method signature.
        Ex:
             - string $realName
             - string $pseudo, string $password
- variableString: the string representing the debug array in comments.
        Ex:
             - realName=$realName
             - pseudo=$pseudo, password=$password
- markerString: the string representing the arguments in the the where clause of the mysql query.
        Ex:
             - realName=:realName
             - pseudo=:pseudo and password=:password
- markerLines: an array of lines representing the $markers variable to inject into the pdo wrapper fetch method.
        Ex:
             -
                 "realName" => $realName,
             -
                 "pseudo" => $pseudo,
                 "password" => $password,

- calledVariables: the string representing a comma separated variable names. We use it as method arguments when invoking a method.
         Ex:
             - $id
             - $firstName, $lastName


The types array is an array of columnName => mysql type.

A mysql type looks like this: int(11), or varchar(128) for instance.




Parameters
================


- uniqueIndexes

    

- types

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LingBreezeGenerator2::getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator2.php#L1075-L1189)


See Also
================

The [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md) class.

Previous method: [getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getRicVariables.md)<br>Next method: [getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getRicMethod.md)<br>

