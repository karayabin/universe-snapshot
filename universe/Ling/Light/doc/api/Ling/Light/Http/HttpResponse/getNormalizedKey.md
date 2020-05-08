[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)


HttpResponse::getNormalizedKey
================



HttpResponse::getNormalizedKey — Returns a normalized name for the given header name.




Description
================


private [HttpResponse::getNormalizedKey](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getNormalizedKey.md)(string $key) : string




Returns a normalized name for the given header name.
We can do this because http header are case INSENSITIVE.

https://stackoverflow.com/questions/5258977/are-http-headers-case-sensitive




Parameters
================


- key

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [HttpResponse::getNormalizedKey](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php#L380-L383)


See Also
================

The [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) class.

Previous method: [displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md)<br>

