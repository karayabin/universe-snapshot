[Back to the Ling/Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md)<br>
[Back to the Ling\Light_404Logger\Logger\Light404LoggerListener class](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener.md)


Light404LoggerListener::executeFilters
================



Light404LoggerListener::executeFilters — whether the given http request passes the filters or is discarded.




Description
================


protected [Light404LoggerListener::executeFilters](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/executeFilters.md)(Ling\Light\Http\HttpRequestInterface $request) : bool




Pass the given http request through the filters defined in the configuration, and returns
whether the given http request passes the filters or is discarded.




Parameters
================


- request

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [Light404LoggerListener::executeFilters](https://github.com/lingtalfi/Light_404Logger/blob/master/Logger/Light404LoggerListener.php#L109-L155)


See Also
================

The [Light404LoggerListener](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener.md) class.

Previous method: [listen](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/listen.md)<br>Next method: [formatHttpRequestMessage](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/formatHttpRequestMessage.md)<br>

