[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The InvoiceLineApi class
================
2021-04-06 --> 2021-08-02






Introduction
============

The InvoiceLineApi class.



Class synopsis
==============


class <span class="pl-k">InvoiceLineApi</span> extends [CustomLightKitStoreBaseApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomLightKitStoreBaseApi.md) implements [InvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceLineApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/__construct.md)() : void
    - public [insertInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/insertInvoiceLine.md)(array $invoiceLine, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/insertInvoiceLines.md)(array $invoiceLines, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetch.md)(?array $components = []) : array
    - public [getInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLineById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLine.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLines.md)($where, ?array $markers = []) : array
    - public [getInvoiceLinesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getInvoiceLinesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getInvoiceLinesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getInvoiceLinesByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesByInvoiceId.md)(string $invoiceId, ?array $components = []) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getAllIds.md)() : array
    - public [updateInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/updateInvoiceLineById.md)(int $id, array $invoiceLine, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/updateInvoiceLine.md)(array $invoiceLine, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/deleteInvoiceLineById.md)(int $id) : void
    - public [deleteInvoiceLineByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/deleteInvoiceLineByIds.md)(array $ids) : void
    - public [deleteInvoiceLineByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/deleteInvoiceLineByInvoiceId.md)(int $invoiceId) : void
    - protected [getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getDefaultValues.md)() : array
    - protected [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetchRoutine.md)(string &$q, array &$markers, array $components, ?array $options = []) : array

- Inherited methods
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [InvoiceLineApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/__construct.md) &ndash; Builds the InvoiceLineApi instance.
- [InvoiceLineApi::insertInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/insertInvoiceLine.md) &ndash; Inserts the given invoice line in the database.
- [InvoiceLineApi::insertInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/insertInvoiceLines.md) &ndash; Inserts the given invoice line rows in the database.
- [InvoiceLineApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [InvoiceLineApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [InvoiceLineApi::getInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLineById.md) &ndash; Returns the invoice line row identified by the given id.
- [InvoiceLineApi::getInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLine.md) &ndash; Returns the invoiceLine row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApi::getInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLines.md) &ndash; Returns the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApi::getInvoiceLinesColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApi::getInvoiceLinesColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesColumns.md) &ndash; Returns a subset of the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApi::getInvoiceLinesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesKey2Value.md) &ndash; Returns an array of $key => $value from the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [InvoiceLineApi::getInvoiceLinesByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getInvoiceLinesByInvoiceId.md) &ndash; Returns the rows of the lks_invoice_line matching the given invoiceId.
- [InvoiceLineApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getAllIds.md) &ndash; Returns an array of all invoiceLine ids.
- [InvoiceLineApi::updateInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/updateInvoiceLineById.md) &ndash; Updates the invoice line row identified by the given id.
- [InvoiceLineApi::updateInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/updateInvoiceLine.md) &ndash; Updates the invoice line row.
- [InvoiceLineApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/delete.md) &ndash; Deletes the invoiceLine rows matching the given where conditions, and returns the number of deleted rows.
- [InvoiceLineApi::deleteInvoiceLineById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/deleteInvoiceLineById.md) &ndash; Deletes the invoice line identified by the given id.
- [InvoiceLineApi::deleteInvoiceLineByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/deleteInvoiceLineByIds.md) &ndash; Deletes the invoice line rows identified by the given ids.
- [InvoiceLineApi::deleteInvoiceLineByInvoiceId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/deleteInvoiceLineByInvoiceId.md) &ndash; Deletes the invoice line rows having the given invoice id.
- [InvoiceLineApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/getDefaultValues.md) &ndash; Returns the array of default values for this instance.
- [InvoiceLineApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Classes\InvoiceLineApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Classes\InvoiceLineApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/InvoiceLineApi.php)



SeeAlso
==============
Previous class: [InvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi.md)<br>Next class: [ItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi.md)<br>
