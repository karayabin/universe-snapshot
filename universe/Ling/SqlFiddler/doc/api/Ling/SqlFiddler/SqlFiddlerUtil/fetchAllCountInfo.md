[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::fetchAllCountInfo
================



SqlFiddlerUtil::fetchAllCountInfo — Returns an array of information about the given query.




Description
================


public [SqlFiddlerUtil::fetchAllCountInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/fetchAllCountInfo.md)(Ling\SimplePdoWrapper\SimplePdoWrapperInterface $pdoWrapper, string $preparedQuery, array $markers, int $desiredPage, int $pageLength, ?bool $useWrap = false) : array




Returns an array of information about the given query.

The returned information looks like this:

- nbPages: int
- desiredPage: int
- realPage: int
- nbItems: int
- nbItemsTotal: int
- firstItemIndex: int
- lastItemIndex: int
- rows: array


See more details in the [SqlFiddler conception notes](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md).

Note that the limit portion is rewritten entirely by this function, based on the given page/pageLength.
In other words, it doesn't matter what you have in your limit clause in the given query.




Parameters
================


- pdoWrapper

    

- preparedQuery

    

- markers

    

- desiredPage

    

- pageLength

    

- useWrap

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [SqlFiddlerUtil::fetchAllCountInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L354-L414)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [fetchAllCount](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/fetchAllCount.md)<br>Next method: [getOrderByInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getOrderByInfo.md)<br>

