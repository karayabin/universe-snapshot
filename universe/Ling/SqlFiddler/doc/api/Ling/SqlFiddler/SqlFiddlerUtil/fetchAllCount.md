[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::fetchAllCount
================



SqlFiddlerUtil::fetchAllCount — Returns an array containing the rows of the prepared query and the total number of rows when limit is removed from that query.




Description
================


public [SqlFiddlerUtil::fetchAllCount](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/fetchAllCount.md)(Ling\SimplePdoWrapper\SimplePdoWrapperInterface $pdoWrapper, string $preparedQuery, ?array $markers = [], ?bool $useWrap = false) : array




Returns an array containing the rows of the prepared query and the total number of rows when limit is removed from that query.

The returned array has the following structure:

- 0: the rows of the prepared query
- 1: the total number of rows of that query when limit is removed

See the [SqlFiddler conception notes](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md) for more details about the prepared query.

If your query uses a "group by" clause, you might want to set the useWrap flag to true.
The useWrap flag wraps the whole query with an extra "select count(*) from ($yourQuery) as tmp" request,
which might/might not be what you want when using group by statements.




Parameters
================


- pdoWrapper

    

- preparedQuery

    

- markers

    

- useWrap

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [SqlFiddlerUtil::fetchAllCount](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L296-L320)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [getPageLength](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getPageLength.md)<br>Next method: [fetchAllCountInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/fetchAllCountInfo.md)<br>

