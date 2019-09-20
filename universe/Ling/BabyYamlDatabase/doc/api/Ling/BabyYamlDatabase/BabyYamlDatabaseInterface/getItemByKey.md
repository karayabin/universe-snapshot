[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabaseInterface class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)


BabyYamlDatabaseInterface::getItemByKey
================



BabyYamlDatabaseInterface::getItemByKey — Returns the first item (of the given table) matching the given key.




Description
================


abstract public [BabyYamlDatabaseInterface::getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemByKey.md)(string $table, array $key) : array | false




Returns the first item (of the given table) matching the given key.
The key is an array of key => value.

The item matches only if all of the key entries match a given item.

If not item matches, false is returned.




Parameters
================


- table

    

- key

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [BabyYamlDatabaseInterface::getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabaseInterface.php#L43-L43)


See Also
================

The [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) class.

Previous method: [insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/insert.md)<br>Next method: [getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemsByKey.md)<br>

