[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\Where class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)


Where::apply
================



Where::apply — and appends it to the given query, and update the given markers accordingly.




Description
================


public [Where::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/apply.md)(string &$query, ?array &$markers = []) : void




Prepares the query portion and the markers corresponding to the actual condition list,
and appends it to the given query, and update the given markers accordingly.

Note: the WHERE keyword is not appended by this method, nor are parenthesis.

Note2: the query portion returned by this method is sql safe (i.e. protected against sql injection by
using :markers).

Note3: the appended query parts are separated using the AND combination operator by default.




Parameters
================


- query

    

- markers

    


Return values
================

Returns void.


Exceptions thrown
================

- [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md).&nbsp;







Source Code
===========
See the source code for method [Where::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/Where.php#L601-L755)


See Also
================

The [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md) class.

Previous method: [cp](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/cp.md)<br>Next method: [getConditions](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/getConditions.md)<br>

