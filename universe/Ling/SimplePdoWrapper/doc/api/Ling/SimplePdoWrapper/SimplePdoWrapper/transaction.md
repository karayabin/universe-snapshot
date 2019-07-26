[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::transaction
================



SimplePdoWrapper::transaction — Executes a transaction, and returns whether it was successful.




Description
================


public [SimplePdoWrapper::transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/transaction.md)(callable $transactionCallback, [\Exception](http://php.net/manual/en/class.exception.php) &$e = null) : bool




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
See the source code for method [SimplePdoWrapper::transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L113-L145)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/getError.md)<br>Next method: [insert](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/insert.md)<br>

