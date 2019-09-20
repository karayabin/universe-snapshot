[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabase class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md)


BabyYamlDatabase::getItemByKey
================



BabyYamlDatabase::getItemByKey — Returns the first item (of the given table) matching the given key.




Description
================


public [BabyYamlDatabase::getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemByKey.md)(string $table, array $key) : array | false




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
See the source code for method [BabyYamlDatabase::getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabase.php#L97-L106)


See Also
================

The [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md) class.

Previous method: [insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/insert.md)<br>Next method: [getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemsByKey.md)<br>

