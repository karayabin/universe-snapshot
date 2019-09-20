[Back to the Ling/BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md)<br>
[Back to the Ling\BabyYamlDatabase\BabyYamlDatabase class](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md)


BabyYamlDatabase::insert
================



BabyYamlDatabase::insert — if it exists, or null otherwise.




Description
================


public [BabyYamlDatabase::insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/insert.md)(string $table, array $row) : int | null




Inserts the given row in the given table,
and returns either the last inserted auto-incremented key value
if it exists, or null otherwise.

The [constraints checking](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/pages/conception-notes.md#constraints-checks) applies.




Parameters
================


- table

    

- row

    


Return values
================

Returns int | null.


Exceptions thrown
================

- [InconsistentRowException](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/Exception/InconsistentRowException.md).&nbsp;







Source Code
===========
See the source code for method [BabyYamlDatabase::insert](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/BabyYamlDatabase.php#L75-L92)


See Also
================

The [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase.md) class.

Previous method: [__construct](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/__construct.md)<br>Next method: [getItemByKey](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabase/getItemByKey.md)<br>

