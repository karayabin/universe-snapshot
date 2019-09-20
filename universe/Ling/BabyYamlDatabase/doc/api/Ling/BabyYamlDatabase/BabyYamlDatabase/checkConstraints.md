[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabase class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md)


BabyYamlDatabase::checkConstraints
================



BabyYamlDatabase::checkConstraints — Checks that the given row is valid, and throws an exception otherwise.




Description
================


protected [BabyYamlDatabase::checkConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/checkConstraints.md)(string $table, array &$row, array $tableArr, array $options = []) : void




Checks that the given row is valid, and throws an exception otherwise.
See more details in the [constraints checking](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/pages/conception-notes.md#constraints-checks) section of the conception notes.

This method will also add the auto-incremented key to the given row if necessary, if the row doesn't
already specifies one.


The options array:
- checkDuplicate: bool=true, whether to check for duplicates




Parameters
================


- table

    

- row

    

- tableArr

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlDatabase::checkConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabase.php#L336-L415)


See Also
================

The [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md) class.

Previous method: [keyMatches](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/keyMatches.md)<br>Next method: [sortTable](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/sortTable.md)<br>

