[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceLineApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface.md)


InvoiceLineApiInterface::delete
================



InvoiceLineApiInterface::delete — Deletes the invoiceLine rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [InvoiceLineApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the invoiceLine rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [InvoiceLineApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceLineApiInterface.php#L245-L245)


See Also
================

The [InvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface.md) class.

Previous method: [updateInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/updateInvoiceLine.md)<br>Next method: [deleteInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineById.md)<br>

