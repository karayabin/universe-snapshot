[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The InvoiceLineApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The InvoiceLineApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">InvoiceLineApiInterface</span>  {

- Methods
    - abstract public [insertInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/insertInvoiceLine.md)(array $invoiceLine, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/insertInvoiceLines.md)(array $invoiceLines, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLineById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLine.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLines.md)($where, ?array $markers = []) : array
    - abstract public [getInvoiceLinesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getInvoiceLinesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getInvoiceLinesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getInvoiceLinesByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesByInvoiceId.md)(string $invoiceId, ?array $components = []) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getAllIds.md)() : array
    - abstract public [updateInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/updateInvoiceLineById.md)(int $id, array $invoiceLine, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/updateInvoiceLine.md)(array $invoiceLine, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineById.md)(int $id) : void
    - abstract public [deleteInvoiceLineByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineByIds.md)(array $ids) : void
    - abstract public [deleteInvoiceLineByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineByInvoiceId.md)(int $invoiceId) : void

}






Methods
==============

- [InvoiceLineApiInterface::insertInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/insertInvoiceLine.md) &ndash; Inserts the given invoice line in the database.
- [InvoiceLineApiInterface::insertInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/insertInvoiceLines.md) &ndash; Inserts the given invoice line rows in the database.
- [InvoiceLineApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [InvoiceLineApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [InvoiceLineApiInterface::getInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLineById.md) &ndash; Returns the invoice line row identified by the given id.
- [InvoiceLineApiInterface::getInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLine.md) &ndash; Returns the invoiceLine row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApiInterface::getInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLines.md) &ndash; Returns the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApiInterface::getInvoiceLinesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApiInterface::getInvoiceLinesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesColumns.md) &ndash; Returns a subset of the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApiInterface::getInvoiceLinesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesKey2Value.md) &ndash; Returns an array of $key => $value from the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApiInterface::getInvoiceLinesByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getInvoiceLinesByInvoiceId.md) &ndash; Returns the rows of the lks_invoice_line matching the given invoiceId.
- [InvoiceLineApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/getAllIds.md) &ndash; Returns an array of all invoiceLine ids.
- [InvoiceLineApiInterface::updateInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/updateInvoiceLineById.md) &ndash; Updates the invoice line row identified by the given id.
- [InvoiceLineApiInterface::updateInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/updateInvoiceLine.md) &ndash; Updates the invoice line row.
- [InvoiceLineApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/delete.md) &ndash; Deletes the invoiceLine rows matching the given where conditions, and returns the number of deleted rows.
- [InvoiceLineApiInterface::deleteInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineById.md) &ndash; Deletes the invoice line identified by the given id.
- [InvoiceLineApiInterface::deleteInvoiceLineByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineByIds.md) &ndash; Deletes the invoice line rows identified by the given ids.
- [InvoiceLineApiInterface::deleteInvoiceLineByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface/deleteInvoiceLineByInvoiceId.md) &ndash; Deletes the invoice line rows having the given invoice id.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceLineApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceLineApiInterface.php)



SeeAlso
==============
Previous class: [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md)<br>Next class: [ItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md)<br>
