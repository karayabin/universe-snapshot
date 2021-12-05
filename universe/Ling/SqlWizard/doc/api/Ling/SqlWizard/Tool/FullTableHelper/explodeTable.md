[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Tool\FullTableHelper class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/FullTableHelper.md)


FullTableHelper::explodeTable
================



FullTableHelper::explodeTable — Returns an array containing the db and the table extracted from the given full table.




Description
================


public static [FullTableHelper::explodeTable](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/FullTableHelper/explodeTable.md)(string $fullTable) : array




Returns an array containing the db and the table extracted from the given full table.

See the [full table](https://github.com/lingtalfi/TheBar/blob/master/discussions/full-table.md) definition for more details.


Note: if not specified in the given fulltable, the database is set to null.




Parameters
================


- fullTable

    


Return values
================

Returns array.


Exceptions thrown
================

- [InvalidTableNameException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/InvalidTableNameException.md).&nbsp;







Source Code
===========
See the source code for method [FullTableHelper::explodeTable](https://github.com/lingtalfi/SqlWizard/blob/master/Tool/FullTableHelper.php#L30-L104)


See Also
================

The [FullTableHelper](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/FullTableHelper.md) class.



