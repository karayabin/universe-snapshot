[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)



The FormatterInterface class
================
2019-02-26 --> 2019-02-26






Introduction
============

The FormatterInterface interface.

A formatter is used to interpret custom notations: it parses a usually high-level notation and renders it as a generally more low-level string.



Class synopsis
==============


abstract class <span class="pl-k">FormatterInterface</span>  {

- Methods
    - abstract public [format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/FormatterInterface/format.md)(string $expression) : string

}






Methods
==============

- [FormatterInterface::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/FormatterInterface/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.





Location
=============
CliTools\Formatter\FormatterInterface