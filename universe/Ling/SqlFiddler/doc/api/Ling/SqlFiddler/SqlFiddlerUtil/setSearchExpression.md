[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::setSearchExpression
================



SqlFiddlerUtil::setSearchExpression — Sets the searchExpression.




Description
================


public [SqlFiddlerUtil::setSearchExpression](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/setSearchExpression.md)(string $searchExpression, string $markerName, ?string $searchMode = %%) : [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)




Sets the searchExpression.


The markerName will be injected in the markers automatically when you call the getSearchExpression method.



The injected value is decorated, depending on the search mode, which can be one of the followings:

- %%: %like%
- %like%: %like%

- %: %like
- %like: %like
- %s: %like

- s%: like%
- like%: like%

- none: (the value of the marker is exactly what you pass to the getSearchExpression)
- n: alias of none


The default value is %%, assuming that you search using the %like% mode.





Note: by default, for all "like" modes (i.e. a mode containing %), we escape the % and _ chars from the value, assuming that you are using mysql (those are special search symbols in mysql),
and assuming that your search value don't use those wildcards.




Parameters
================


- searchExpression

    

- markerName

    

- searchMode

    


Return values
================

Returns [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md).








Source Code
===========
See the source code for method [SqlFiddlerUtil::setSearchExpression](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L109-L115)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [__construct](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/__construct.md)<br>Next method: [setOrderByMap](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/setOrderByMap.md)<br>

