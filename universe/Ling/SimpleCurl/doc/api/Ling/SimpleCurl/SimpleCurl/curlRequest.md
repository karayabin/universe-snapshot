[Back to the Ling/SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md)<br>
[Back to the Ling\SimpleCurl\SimpleCurl class](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl.md)


SimpleCurl::curlRequest
================



SimpleCurl::curlRequest — and returns a SimpleCurlResponse, or false in case of failure.




Description
================


protected [SimpleCurl::curlRequest](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/curlRequest.md)(string $url, ?array $curlOptions = []) : [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md) | false




Executes the curl request on the given $url with the given $curlOptions,
and returns a SimpleCurlResponse, or false in case of failure.

Note: by default the following options will be set (you might override them using
the $curlOptions):

- CURLOPT_URL
- CURLOPT_RETURNTRANSFER
- CURLOPT_HEADERFUNCTION




Parameters
================


- url

    

- curlOptions

    


Return values
================

Returns [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md) | false.


Exceptions thrown
================

- [SimpleCurlException](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Exception/SimpleCurlException.md).&nbsp;







Source Code
===========
See the source code for method [SimpleCurl::curlRequest](https://github.com/lingtalfi/SimpleCurl/blob/master/SimpleCurl.php#L92-L172)


See Also
================

The [SimpleCurl](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl.md) class.

Previous method: [getErrors](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/getErrors.md)<br>Next method: [addError](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/addError.md)<br>

