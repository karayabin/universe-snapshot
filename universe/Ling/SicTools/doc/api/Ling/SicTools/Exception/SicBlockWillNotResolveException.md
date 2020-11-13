[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)



The SicBlockWillNotResolveException class
================
2019-04-25 --> 2020-08-17






Introduction
============

The SicBlockWillNotResolveException indicates that a sic block cannot resolve into a service.

This exception is thrown:

- by the SicTools\HotServiceResolver->getService method when the given sic block cannot be resolved into a service.



Class synopsis
==============


class <span class="pl-k">SicBlockWillNotResolveException</span> extends [SicToolsException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicToolsException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

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
Ling\SicTools\Exception\SicBlockWillNotResolveException<br>
See the source code of [Ling\SicTools\Exception\SicBlockWillNotResolveException](https://github.com/lingtalfi/SicTools/blob/master/Exception/SicBlockWillNotResolveException.php)



SeeAlso
==============
Previous class: [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)<br>Next class: [SicToolsException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicToolsException.md)<br>
