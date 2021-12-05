[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\InvoiceApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md)


InvoiceApiInterface::insertInvoice
================



InvoiceApiInterface::insertInvoice — Inserts the given invoice in the database.




Description
================


abstract public [InvoiceApiInterface::insertInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/insertInvoice.md)(array $invoice, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given invoice in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- invoice

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [InvoiceApiInterface::insertInvoice](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/InvoiceApiInterface.php#L35-L35)


See Also
================

The [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md) class.

Next method: [insertInvoices](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface/insertInvoices.md)<br>

