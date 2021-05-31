[Back to the Ling/InvoiceGenerator api](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator.md)<br>
[Back to the Ling\InvoiceGenerator\InvoiceGenerator class](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator.md)


InvoiceGenerator::generate
================



InvoiceGenerator::generate — Generates a pdf invoice based on the given parameters.




Description
================


public static [InvoiceGenerator::generate](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/generate.md)(array $data, string $templateId, string $dst, ?string &$html = null, ?array $options = []) : void




Generates a pdf invoice based on the given parameters.

The html parameter will be fed with the html of the invoice.

Available options are:

- bin: string, path to the binary of the wkhtmltopdf program. Default is /usr/local/bin/wkhtmltopdf
- htmlOnly: bool=false, if true will not generate the pdf, only the html part (accessible via the html parameter)




Parameters
================


- data

    

- templateId

    

- dst

    

- html

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [InvoiceGenerator::generate](https://github.com/lingtalfi/InvoiceGenerator/blob/master/InvoiceGenerator.php#L36-L77)


See Also
================

The [InvoiceGenerator](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator.md) class.

Next method: [captureTemplateContent](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/captureTemplateContent.md)<br>

