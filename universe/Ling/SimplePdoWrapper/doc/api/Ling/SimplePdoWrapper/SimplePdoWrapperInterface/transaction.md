[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapperInterface class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)


SimplePdoWrapperInterface::transaction
================



SimplePdoWrapperInterface::transaction — Executes a transaction, and returns whether it was successful.




Description
================


abstract public [SimplePdoWrapperInterface::transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/transaction.md)(callable $transactionCallback, ?[\Exception](http://php.net/manual/en/class.exception.php) &$e = null) : bool




Executes a transaction, and returns whether it was successful.
If an error occurred during the transaction, the error will be available in the form
of an exception passed to the second argument ($e).




Parameters
================


- transactionCallback

    

- e

    


Return values
================

Returns bool.


Exceptions thrown
================

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md).&nbsp;
When the connexion is not set






Source Code
===========
See the source code for method [SimplePdoWrapperInterface::transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php#L202-L202)


See Also
================

The [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) class.

Previous method: [executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/executeStatement.md)<br>Next method: [setConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/setConnexion.md)<br>

