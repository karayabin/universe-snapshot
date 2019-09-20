[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabaseInterface class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)


BabyYamlDatabaseInterface::updateItemByKey
================



BabyYamlDatabaseInterface::updateItemByKey — and returns whether there was a match.




Description
================


abstract public [BabyYamlDatabaseInterface::updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/updateItemByKey.md)(string $table, array $key, array $values) : bool




Updates the first item matching the given key,
and returns whether there was a match.

The [constraints checking](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/pages/conception-notes.md#constraints-checks) applies.




Parameters
================


- table

    

- key

    

- values

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [BabyYamlDatabaseInterface::updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabaseInterface.php#L68-L68)


See Also
================

The [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) class.

Previous method: [getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemsByKey.md)<br>Next method: [deleteItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/deleteItemByKey.md)<br>

