[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LkaRowDuplicatorHooksInterface class
================
2019-05-17 --> 2021-03-05






Introduction
============

The LkaRowDuplicatorHooksInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LkaRowDuplicatorHooksInterface</span>  {

- Methods
    - abstract public [onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface/onInsertAfter.md)(string $mainTable, string $table, array $oldRow, array $newRow, ?$lastInsertId = null) : void

}






Methods
==============

- [LkaRowDuplicatorHooksInterface::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface/onInsertAfter.md) &ndash; Is executed after a row is duplicated.





Location
=============
Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorHooksInterface<br>
See the source code of [Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorHooksInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Duplicator/LkaRowDuplicatorHooksInterface.php)



SeeAlso
==============
Previous class: [LkaMasterRowDuplicator](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator.md)<br>Next class: [LkaRowDuplicatorInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorInterface.md)<br>
