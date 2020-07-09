[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\Where class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)


Where::operator
================



Where::operator — and returns this instance for chaining.




Description
================


public [Where::operator](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/operator.md)(string $operator, ?$value = null, ?$option = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)




Adds a condition list item using the current key and the given operator and value,
and returns this instance for chaining.



The option is used only by the following operators:

- for like/not like: string|null = null.
     The list of wild chars allowed (i.e. interpreted as such) inside the given value.

     The possible wild chars in mysql are:
         - _ (underscore)
         - % (percent)

     If null (by default), then none of the wild chars (% and _) will be interpreted.


- for between and not_between operators: mixed.
     The second value of the between comparison.




Parameters
================


- operator

    

- value

    

- option

    


Return values
================

Returns [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [Where::operator](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/Where.php#L467-L481)


See Also
================

The [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md) class.

Previous method: [isNotNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNotNull.md)<br>Next method: [or](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/or.md)<br>

