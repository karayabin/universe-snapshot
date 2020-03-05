[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapperInterface class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)


SimplePdoWrapperInterface::replace
================



SimplePdoWrapperInterface::replace — Executes the replace statement and returns the lastInsertId.




Description
================


abstract public [SimplePdoWrapperInterface::replace](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/replace.md)($table, ?array $fields = [], ?array $options = []) : false | string




Executes the replace statement and returns the lastInsertId.

Note that **replace** is a mysql extension of the sql standard.

Note: at least in mysql a replace statement always create a new record,
and potentially delete the old record (based on primary key or unique index detection)
if it gets in the way.




Parameters
================


- table

    

- fields

    

- options

    


Return values
================

Returns false | string.


Exceptions thrown
================

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [SimplePdoWrapperInterface::replace](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php#L97-L97)


See Also
================

The [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) class.

Previous method: [insert](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/insert.md)<br>Next method: [update](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/update.md)<br>

