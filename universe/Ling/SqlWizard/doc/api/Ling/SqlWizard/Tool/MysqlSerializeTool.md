[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)



The MysqlSerializeTool class
================
2019-07-23 --> 2021-03-05






Introduction
============

The MysqlSerializeTool class.

Sometimes, we need to store arrays, or even objects in the database.
This tool uses a serialization technique in order to convert those arrays/objects into a string which
fits the database, and back from the database to their original form.



Class synopsis
==============


class <span class="pl-k">MysqlSerializeTool</span>  {

- Methods
    - public static [serialize](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool/serialize.md)(array &$arr, array $keys) : void
    - public static [unserialize](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool/unserialize.md)(array &$arr, array $keys) : void

}






Methods
==============

- [MysqlSerializeTool::serialize](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool/serialize.md) &ndash; Serializes the $keys found in the given array in place.
- [MysqlSerializeTool::unserialize](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool/unserialize.md) &ndash; Un-serializes the $keys found in the given array in place.





Location
=============
Ling\SqlWizard\Tool\MysqlSerializeTool<br>
See the source code of [Ling\SqlWizard\Tool\MysqlSerializeTool](https://github.com/lingtalfi/SqlWizard/blob/master/Tool/MysqlSerializeTool.php)



SeeAlso
==============
Previous class: [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)<br>Next class: [MysqlStructureReaderTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlStructureReaderTool.md)<br>
