[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabase class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md)


BabyYamlDatabase::sortTable
================



BabyYamlDatabase::sortTable — Sorts the given table items.




Description
================


protected [BabyYamlDatabase::sortTable](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/sortTable.md)(array &$tableItems) : void




Sorts the given table items.

This is only called by the insert and update operations.
This method is called after the checkConstraints method has been called.

That's because the checkConstraints method will define the ak value used inside this method.




Parameters
================


- tableItems

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [BabyYamlDatabase::sortTable](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabase.php#L430-L439)


See Also
================

The [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md) class.

Previous method: [checkConstraints](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/checkConstraints.md)<br>Next method: [haveSameRic](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/haveSameRic.md)<br>

