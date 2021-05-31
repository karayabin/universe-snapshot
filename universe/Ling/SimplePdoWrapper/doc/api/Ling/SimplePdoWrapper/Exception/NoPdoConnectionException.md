[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The NoPdoConnectionException class
================
2019-07-22 --> 2021-05-31






Introduction
============

The NoPdoConnectionException class is thrown to indicate that the SimplePdoWrapper instance doesn't have
a connection (php PDO object) to work with.
The problem is generally fixed by setting the connection with the setConnection method.



Class synopsis
==============


class <span class="pl-k">NoPdoConnectionException</span> extends [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php), [\Stringable](https://wiki.php.net/rfc/stringable) {

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
Ling\SimplePdoWrapper\Exception\NoPdoConnectionException<br>
See the source code of [Ling\SimplePdoWrapper\Exception\NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/NoPdoConnectionException.php)



SeeAlso
==============
Previous class: [MysqlInfoUtilException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/MysqlInfoUtilException.md)<br>Next class: [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md)<br>
