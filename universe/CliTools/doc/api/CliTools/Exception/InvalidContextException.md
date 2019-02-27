[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)



The InvalidContextException class
================
2019-02-26 --> 2019-02-27






Introduction
============

The InvalidContextException exception is thrown in the following cases:

- the CliTools\Io\Input object was not able to detect the argv key in the $_SERVER array,
probably meaning that it was executed from a web context instead of a cli context.



Class synopsis
==============


class <span class="pl-k">InvalidContextException</span> extends [CliToolsException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Exception/CliToolsException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

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
CliTools\Exception\InvalidContextException