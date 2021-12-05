[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\InvoiceLineApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi.md)


InvoiceLineApi::insertInvoiceLines
================



InvoiceLineApi::insertInvoiceLines — Inserts the given invoice line rows in the database.




Description
================


public [InvoiceLineApi::insertInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/insertInvoiceLines.md)(array $invoiceLines, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given invoice line rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- invoiceLines

    

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
See the source code for method [InvoiceLineApi::insertInvoiceLines](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/InvoiceLineApi.php#L100-L111)


See Also
================

The [InvoiceLineApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi.md) class.

Previous method: [insertInvoiceLine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/insertInvoiceLine.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceLineApi/fetchAll.md)<br>

