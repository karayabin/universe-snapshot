[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceLineApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface.md)


InvoiceLineApiInterface::getInvoiceLinesColumns
================



InvoiceLineApiInterface::getInvoiceLinesColumns — Returns a subset of the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [InvoiceLineApiInterface::getInvoiceLinesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [InvoiceLineApiInterface::getInvoiceLinesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceLineApiInterface.php#L159-L159)


See Also
================

The [InvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface.md) class.

Previous method: [getInvoiceLinesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesColumn.md)<br>Next method: [getInvoiceLinesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesKey2Value.md)<br>

