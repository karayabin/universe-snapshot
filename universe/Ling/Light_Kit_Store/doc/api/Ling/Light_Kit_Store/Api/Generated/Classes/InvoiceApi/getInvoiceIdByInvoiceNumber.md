[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\InvoiceApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi.md)


InvoiceApi::getInvoiceIdByInvoiceNumber
================



InvoiceApi::getInvoiceIdByInvoiceNumber — Returns the id of the lks_invoice table.




Description
================


public [InvoiceApi::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoiceIdByInvoiceNumber.md)(string $invoice_number, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lks_invoice table.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- invoice_number

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns string | mixed.








Source Code
===========
See the source code for method [InvoiceApi::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/InvoiceApi.php#L272-L287)


See Also
================

The [InvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi.md) class.

Previous method: [getInvoicesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getInvoicesKey2Value.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi/getAllIds.md)<br>

