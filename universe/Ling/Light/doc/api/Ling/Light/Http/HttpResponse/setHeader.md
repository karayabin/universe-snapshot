[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)


HttpResponse::setHeader
================



HttpResponse::setHeader — Adds a header to this instance.




Description
================


public [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md)(string $name, string $value, ?bool $replace = true) : void




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
See the source code for method [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php#L170-L173)


See Also
================

The [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) class.

Previous method: [setMimeType](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setMimeType.md)<br>Next method: [setFileName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setFileName.md)<br>

