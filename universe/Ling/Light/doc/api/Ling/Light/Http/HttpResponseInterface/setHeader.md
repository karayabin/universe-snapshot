[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponseInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)


HttpResponseInterface::setHeader
================



HttpResponseInterface::setHeader — Adds a header to this instance.




Description
================


abstract public [HttpResponseInterface::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHeader.md)(string $name, string $value, ?bool $replace = true) : void




Adds a header to this instance.
In case the header already exists:
     - if the replace flag is set to true (by default), it will replace the existing header
     - if the replace flag is set to false, it will add another header with the same name




Parameters
================


- name

    

- value

    

- replace

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [HttpResponseInterface::setHeader](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php#L31-L31)


See Also
================

The [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) class.

Previous method: [send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/send.md)<br>

