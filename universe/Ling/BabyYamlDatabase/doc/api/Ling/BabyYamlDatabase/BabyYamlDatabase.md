[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)



The BabyYamlDatabase class
================
2019-09-16 --> 2019-09-16






Introduction
============

The BabyYamlDatabase class.



Class synopsis
==============


class <span class="pl-k">BabyYamlDatabase</span> implements [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) {

- Properties
    - protected string [$file](#property-file) ;
    - protected string [$rootKey](#property-rootKey) ;
    - protected array [$tableConstraints](#property-tableConstraints) ;
    - protected array [$conf](#property-conf) ;
    - private string [$_ak](#property-_ak) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/__construct.md)() : void
    - public [insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/insert.md)(string $table, array $row) : int | null
    - public [getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemByKey.md)(string $table, array $key) : array | false
    - public [getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemsByKey.md)(string $table, array $key) : array
    - public [updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/updateItemByKey.md)(string $table, array $key, array $values) : bool
    - public [deleteItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/deleteItemByKey.md)(string $table, array $key) : bool
    - public [setFile](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/setFile.md)(string $file) : void
    - public [setRootKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/setRootKey.md)(?string $rootKey) : void
    - protected [getTableArray](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getTableArray.md)(string $table) : array
    - protected [setTableArray](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/setTableArray.md)(string $table, array $arr) : void
    - protected [getTableConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getTableConstraints.md)(string $table) : array
    - protected [getIndexByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getIndexByKey.md)(array $array, array $key) : mixed
    - protected [keyMatches](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/keyMatches.md)(array $key, array $item) : bool
    - protected [checkConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/checkConstraints.md)(string $table, array &$row, array $tableArr, array $options = []) : void
    - protected [sortTable](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/sortTable.md)(array &$tableItems) : void
    - protected [haveSameRic](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/haveSameRic.md)(array $item1, array $item2, array $ric) : bool
    - protected [getConfiguration](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getConfiguration.md)() : array

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file for this instance.
    
    

- <span id="property-rootKey"><b>rootKey</b></span>

    This property holds the rootKey for this instance.
    The [bdot](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md) path identifying the key holding all the tables.
    
    Null means the root of the config array.
    
    

- <span id="property-tableConstraints"><b>tableConstraints</b></span>

    This property holds the tableConstraints cache for this instance.
    It's an array of table => constraints.
    
    

- <span id="property-conf"><b>conf</b></span>

    This property holds the configuration cache for this instance.
    
    

- <span id="property-_ak"><b>_ak</b></span>

    This property holds the temporary auto-incremented key for this instance.
    
    



Methods
==============

- [BabyYamlDatabase::__construct](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/__construct.md) &ndash; Builds the BabyYamlDatabase instance.
- [BabyYamlDatabase::insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/insert.md) &ndash; if it exists, or null otherwise.
- [BabyYamlDatabase::getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemByKey.md) &ndash; Returns the first item (of the given table) matching the given key.
- [BabyYamlDatabase::getItemsByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemsByKey.md) &ndash; Returns an array of items (of the given table) matching the given key.
- [BabyYamlDatabase::updateItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/updateItemByKey.md) &ndash; and returns whether there was a match.
- [BabyYamlDatabase::deleteItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/deleteItemByKey.md) &ndash; and returns whether there was a match.
- [BabyYamlDatabase::setFile](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/setFile.md) &ndash; Sets the file.
- [BabyYamlDatabase::setRootKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlDatabase::getTableArray](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getTableArray.md) &ndash; Returns the array corresponding to the given table.
- [BabyYamlDatabase::setTableArray](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/setTableArray.md) &ndash; Replaces the array representing the given table.
- [BabyYamlDatabase::getTableConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getTableConstraints.md) &ndash; Returns the array corresponding to the given table's constraints.
- [BabyYamlDatabase::getIndexByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getIndexByKey.md) &ndash; or null if no rows of the array matches the given key.
- [BabyYamlDatabase::keyMatches](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/keyMatches.md) &ndash; Returns whether the given key matches the given item.
- [BabyYamlDatabase::checkConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/checkConstraints.md) &ndash; Checks that the given row is valid, and throws an exception otherwise.
- [BabyYamlDatabase::sortTable](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/sortTable.md) &ndash; Sorts the given table items.
- [BabyYamlDatabase::haveSameRic](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/haveSameRic.md) &ndash; Returns whether the given item1 and item2 both have the same ric values.
- [BabyYamlDatabase::getConfiguration](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getConfiguration.md) &ndash; Returns the configuration for the current instance.





Location
=============
Ling\BabyYamlDatabase\BabyYamlDatabase<br>
See the source code of [Ling\BabyYamlDatabase\BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabase.php)



SeeAlso
==============
Next class: [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)<br>
