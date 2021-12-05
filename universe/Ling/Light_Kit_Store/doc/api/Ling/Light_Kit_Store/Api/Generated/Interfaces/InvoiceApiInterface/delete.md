[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md)


InvoiceApiInterface::delete
================



InvoiceApiInterface::delete — Deletes the invoice rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [InvoiceApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the invoice rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [InvoiceApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceApiInterface.php#L277-L277)


See Also
================

The [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md) class.

Previous method: [updateInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoice.md)<br>Next method: [deleteInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceById.md)<br>

