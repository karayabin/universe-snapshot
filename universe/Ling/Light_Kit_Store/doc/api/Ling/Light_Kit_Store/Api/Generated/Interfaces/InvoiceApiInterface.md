[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The InvoiceApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The InvoiceApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">InvoiceApiInterface</span>  {

- Methods
    - abstract public [insertInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/insertInvoice.md)(array $invoice, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/insertInvoices.md)(array $invoices, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceByInvoiceNumber.md)(string $invoice_number, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoice.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoices.md)($where, ?array $markers = []) : array
    - abstract public [getInvoicesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getInvoicesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getInvoicesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceIdByInvoiceNumber.md)(string $invoice_number, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getAllIds.md)() : array
    - abstract public [updateInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoiceById.md)(int $id, array $invoice, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoiceByInvoiceNumber.md)(string $invoice_number, array $invoice, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoice.md)(array $invoice, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceById.md)(int $id) : void
    - abstract public [deleteInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceByInvoiceNumber.md)(string $invoice_number) : void
    - abstract public [deleteInvoiceByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceByIds.md)(array $ids) : void
    - abstract public [deleteInvoiceByInvoiceNumbers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceByInvoiceNumbers.md)(array $invoice_numbers) : void

}






Methods
==============

- [InvoiceApiInterface::insertInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/insertInvoice.md) &ndash; Inserts the given invoice in the database.
- [InvoiceApiInterface::insertInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/insertInvoices.md) &ndash; Inserts the given invoice rows in the database.
- [InvoiceApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [InvoiceApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [InvoiceApiInterface::getInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceById.md) &ndash; Returns the invoice row identified by the given id.
- [InvoiceApiInterface::getInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceByInvoiceNumber.md) &ndash; Returns the invoice row identified by the given invoice_number.
- [InvoiceApiInterface::getInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoice.md) &ndash; Returns the invoice row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApiInterface::getInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoices.md) &ndash; Returns the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApiInterface::getInvoicesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApiInterface::getInvoicesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesColumns.md) &ndash; Returns a subset of the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApiInterface::getInvoicesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesKey2Value.md) &ndash; Returns an array of $key => $value from the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApiInterface::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceIdByInvoiceNumber.md) &ndash; Returns the id of the lks_invoice table.
- [InvoiceApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getAllIds.md) &ndash; Returns an array of all invoice ids.
- [InvoiceApiInterface::updateInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoiceById.md) &ndash; Updates the invoice row identified by the given id.
- [InvoiceApiInterface::updateInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoiceByInvoiceNumber.md) &ndash; Updates the invoice row identified by the given invoice_number.
- [InvoiceApiInterface::updateInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/updateInvoice.md) &ndash; Updates the invoice row.
- [InvoiceApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/delete.md) &ndash; Deletes the invoice rows matching the given where conditions, and returns the number of deleted rows.
- [InvoiceApiInterface::deleteInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceById.md) &ndash; Deletes the invoice identified by the given id.
- [InvoiceApiInterface::deleteInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceByInvoiceNumber.md) &ndash; Deletes the invoice identified by the given invoice_number.
- [InvoiceApiInterface::deleteInvoiceByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceByIds.md) &ndash; Deletes the invoice rows identified by the given ids.
- [InvoiceApiInterface::deleteInvoiceByInvoiceNumbers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/deleteInvoiceByInvoiceNumbers.md) &ndash; Deletes the invoice rows identified by the given invoice_numbers.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceApiInterface.php)



SeeAlso
==============
Previous class: [AuthorApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface.md)<br>Next class: [InvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface.md)<br>
