[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabaseInterface class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)


BabyYamlDatabaseInterface::getItemsByKey
================



BabyYamlDatabaseInterface::getItemsByKey — Returns an array of items (of the given table) matching the given key.




Description
================


abstract public [BabyYamlDatabaseInterface::getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemsByKey.md)(string $table, array $key) : array




Returns an array of items (of the given table) matching the given key.

The key is an array of key => value.
The item matches only if all of the key entries match a given item.




Parameters
================


- table

    

- key

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [BabyYamlDatabaseInterface::getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabaseInterface.php#L55-L55)


See Also
================

The [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) class.

Previous method: [getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemByKey.md)<br>Next method: [updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/updateItemByKey.md)<br>

