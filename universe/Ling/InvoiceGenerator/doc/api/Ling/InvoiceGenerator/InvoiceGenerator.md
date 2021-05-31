[Back to the Ling/InvoiceGenerator api](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator.md)



The InvoiceGenerator class
================
2021-05-07 --> 2021-05-31






Introduction
============

The InvoiceGenerator class.



Class synopsis
==============


class <span class="pl-k">InvoiceGenerator</span>  {

- Methods
    - public static [generate](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/generate.md)(array $data, string $templateId, string $dst, ?string &$html = null, ?array $options = []) : void
    - private static [captureTemplateContent](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/captureTemplateContent.md)(string $__file, array $data) : string
    - private static [error](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/error.md)(string $msg, ?int $code = null) : void

}






Methods
==============

- [InvoiceGenerator::generate](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/generate.md) &ndash; Generates a pdf invoice based on the given parameters.
- [InvoiceGenerator::captureTemplateContent](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/captureTemplateContent.md) &ndash; Renders the template and returns its output.
- [InvoiceGenerator::error](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/InvoiceGenerator/error.md) &ndash; Throws an exception.





Location
=============
Ling\InvoiceGenerator\InvoiceGenerator<br>
See the source code of [Ling\InvoiceGenerator\InvoiceGenerator](https://github.com/lingtalfi/InvoiceGenerator/blob/master/InvoiceGenerator.php)



SeeAlso
==============
Previous class: [InvoiceGeneratorException](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator/Exception/InvoiceGeneratorException.md)<br>
