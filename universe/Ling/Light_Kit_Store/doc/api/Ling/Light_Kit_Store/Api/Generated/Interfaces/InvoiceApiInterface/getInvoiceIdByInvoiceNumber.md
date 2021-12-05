[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md)


InvoiceApiInterface::getInvoiceIdByInvoiceNumber
================



InvoiceApiInterface::getInvoiceIdByInvoiceNumber — Returns the id of the lks_invoice table.




Description
================


abstract public [InvoiceApiInterface::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoiceIdByInvoiceNumber.md)(string $invoice_number, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




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
See the source code for method [InvoiceApiInterface::getInvoiceIdByInvoiceNumber](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceApiInterface.php#L204-L204)


See Also
================

The [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md) class.

Previous method: [getInvoicesKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getInvoicesKey2Value.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/getAllIds.md)<br>

