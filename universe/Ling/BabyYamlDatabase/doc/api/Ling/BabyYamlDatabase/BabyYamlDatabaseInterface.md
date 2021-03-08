[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)



The BabyYamlDatabaseInterface class
================
2019-09-16 --> 2021-03-05






Introduction
============

The BabyYamlDatabaseInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">BabyYamlDatabaseInterface</span>  {

- Methods
    - abstract public [insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/insert.md)(string $table, array $row) : int | null
    - abstract public [getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemByKey.md)(string $table, array $key) : array | false
    - abstract public [getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemsByKey.md)(string $table, array $key) : array
    - abstract public [updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/updateItemByKey.md)(string $table, array $key, array $values) : bool
    - abstract public [deleteItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/deleteItemByKey.md)(string $table, array $key) : bool

}






Methods
==============

- [BabyYamlDatabaseInterface::insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/insert.md) &ndash; if it exists, or null otherwise.
- [BabyYamlDatabaseInterface::getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemByKey.md) &ndash; Returns the first item (of the given table) matching the given key.
- [BabyYamlDatabaseInterface::getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/getItemsByKey.md) &ndash; Returns an array of items (of the given table) matching the given key.
- [BabyYamlDatabaseInterface::updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/updateItemByKey.md) &ndash; and returns whether there was a match.
- [BabyYamlDatabaseInterface::deleteItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface/deleteItemByKey.md) &ndash; and returns whether there was a match.





Location
=============
Ling\BabyYamlDatabase\BabyYamlDatabaseInterface<br>
See the source code of [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabaseInterface.php)



SeeAlso
==============
Previous class: [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md)<br>Next class: [BabyYamlDatabaseException](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/Exception/BabyYamlDatabaseException.md)<br>
