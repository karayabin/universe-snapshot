[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The InvalidTableNameException class
================
2019-07-22 --> 2020-03-10






Introduction
============

The InvalidTableNameException class is thrown when a syntax error occurs with the table name.

The table name should be using backticks to escape either the table name and/or the database name.


The possible combinations of valid table names look like this:

- `my_db`.`my_table`
- `my_db`.my_table
- my_db.`my_table`
- my_db.my_table
- `my_table`
- my_table


Anything not formatted with the above list will result in throwing the **InvalidTableNameException** exception.



Class synopsis
==============


class <span class="pl-k">InvalidTableNameException</span> extends [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

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
Ling\SimplePdoWrapper\Exception\InvalidTableNameException<br>
See the source code of [Ling\SimplePdoWrapper\Exception\InvalidTableNameException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/InvalidTableNameException.php)



SeeAlso
==============
Next class: [MysqlInfoUtilException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/MysqlInfoUtilException.md)<br>
