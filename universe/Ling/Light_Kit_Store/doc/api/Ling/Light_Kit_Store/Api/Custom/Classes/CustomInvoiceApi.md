[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The CustomInvoiceApi class
================
2021-04-06 --> 2021-08-02






Introduction
============

The CustomInvoiceApi class.



Class synopsis
==============


class <span class="pl-k">CustomInvoiceApi</span> extends [InvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi.md) implements [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md), [CustomInvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomInvoiceApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomInvoiceApi/__construct.md)() : void

- Inherited methods
    - public [InvoiceApi::insertInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/insertInvoice.md)(array $invoice, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [InvoiceApi::insertInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/insertInvoices.md)(array $invoices, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [InvoiceApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/fetchAll.md)(?array $components = []) : array
    - public [InvoiceApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/fetch.md)(?array $components = []) : array
    - public [InvoiceApi::getInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [InvoiceApi::getInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceByInvoiceNumber.md)(string $invoice_number, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [InvoiceApi::getInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoice.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [InvoiceApi::getInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoices.md)($where, ?array $markers = []) : array
    - public [InvoiceApi::getInvoicesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [InvoiceApi::getInvoicesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [InvoiceApi::getInvoicesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [InvoiceApi::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceIdByInvoiceNumber.md)(string $invoice_number, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [InvoiceApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getAllIds.md)() : array
    - public [InvoiceApi::updateInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/updateInvoiceById.md)(int $id, array $invoice, ?array $extraWhere = [], ?array $markers = []) : void
    - public [InvoiceApi::updateInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/updateInvoiceByInvoiceNumber.md)(string $invoice_number, array $invoice, ?array $extraWhere = [], ?array $markers = []) : void
    - public [InvoiceApi::updateInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/updateInvoice.md)(array $invoice, ?$where = null, ?array $markers = []) : void
    - public [InvoiceApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [InvoiceApi::deleteInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceById.md)(int $id) : void
    - public [InvoiceApi::deleteInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceByInvoiceNumber.md)(string $invoice_number) : void
    - public [InvoiceApi::deleteInvoiceByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceByIds.md)(array $ids) : void
    - public [InvoiceApi::deleteInvoiceByInvoiceNumbers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceByInvoiceNumbers.md)(array $invoice_numbers) : void
    - protected [InvoiceApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getDefaultValues.md)() : array
    - protected [InvoiceApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/fetchRoutine.md)(string &$q, array &$markers, array $components, ?array $options = []) : array
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomInvoiceApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomInvoiceApi/__construct.md) &ndash; Builds the CustomInvoiceApi instance.
- [InvoiceApi::insertInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/insertInvoice.md) &ndash; Inserts the given invoice in the database.
- [InvoiceApi::insertInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/insertInvoices.md) &ndash; Inserts the given invoice rows in the database.
- [InvoiceApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [InvoiceApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [InvoiceApi::getInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceById.md) &ndash; Returns the invoice row identified by the given id.
- [InvoiceApi::getInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceByInvoiceNumber.md) &ndash; Returns the invoice row identified by the given invoice_number.
- [InvoiceApi::getInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoice.md) &ndash; Returns the invoice row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApi::getInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoices.md) &ndash; Returns the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApi::getInvoicesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApi::getInvoicesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesColumns.md) &ndash; Returns a subset of the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApi::getInvoicesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesKey2Value.md) &ndash; Returns an array of $key => $value from the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceApi::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceIdByInvoiceNumber.md) &ndash; Returns the id of the lks_invoice table.
- [InvoiceApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getAllIds.md) &ndash; Returns an array of all invoice ids.
- [InvoiceApi::updateInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/updateInvoiceById.md) &ndash; Updates the invoice row identified by the given id.
- [InvoiceApi::updateInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/updateInvoiceByInvoiceNumber.md) &ndash; Updates the invoice row identified by the given invoice_number.
- [InvoiceApi::updateInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/updateInvoice.md) &ndash; Updates the invoice row.
- [InvoiceApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/delete.md) &ndash; Deletes the invoice rows matching the given where conditions, and returns the number of deleted rows.
- [InvoiceApi::deleteInvoiceById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceById.md) &ndash; Deletes the invoice identified by the given id.
- [InvoiceApi::deleteInvoiceByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceByInvoiceNumber.md) &ndash; Deletes the invoice identified by the given invoice_number.
- [InvoiceApi::deleteInvoiceByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceByIds.md) &ndash; Deletes the invoice rows identified by the given ids.
- [InvoiceApi::deleteInvoiceByInvoiceNumbers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/deleteInvoiceByInvoiceNumbers.md) &ndash; Deletes the invoice rows identified by the given invoice_numbers.
- [InvoiceApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getDefaultValues.md) &ndash; Returns the array of default values for this instance.
- [InvoiceApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Custom\Classes\CustomInvoiceApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Custom\Classes\CustomInvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Classes/CustomInvoiceApi.php)



SeeAlso
==============
Previous class: [CustomAuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomAuthorApi.md)<br>Next class: [CustomInvoiceLineApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomInvoiceLineApi.md)<br>
