[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabase class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md)


BabyYamlDatabase::getIndexByKey
================



BabyYamlDatabase::getIndexByKey — or null if no rows of the array matches the given key.




Description
================


protected [BabyYamlDatabase::getIndexByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getIndexByKey.md)(array $array, array $key) : mixed




Returns the index of the row identified by the given key, in the given array,
or null if no rows of the array matches the given key.

The key notation is explained in the [conception notes](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/pages/conception-notes.md).




Parameters
================


- array

    

- key

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlDatabase::getIndexByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabase.php#L270-L278)


See Also
================

The [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md) class.

Previous method: [getTableConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getTableConstraints.md)<br>Next method: [keyMatches](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/keyMatches.md)<br>

