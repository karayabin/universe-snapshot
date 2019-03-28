[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The InvalidContextException class
================
2019-02-26 --> 2019-03-26






Introduction
============

The InvalidContextException exception is thrown in the following cases:

- the CliTools\Io\Input object was not able to detect the argv key in the $_SERVER array,
probably meaning that it was executed from a web context instead of a cli context.



Class synopsis
==============


class <span class="pl-k">InvalidContextException</span> extends [CliToolsException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/CliToolsException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

- Inherited properties
    - protected  [Exception::$message](#property-message) =  ;
    - protected  [Exception::$code](#property-code) = 0 ;
    - protected  [Exception::$file](#property-file) ;
    - protected  [Exception::$line](#property-line) ;

}






Methods
==============






Location
=============
Ling\CliTools\Exception\InvalidContextException


SeeAlso
==============
Previous class: [CliToolsException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/CliToolsException.md)<br>Next class: [BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md)<br>
