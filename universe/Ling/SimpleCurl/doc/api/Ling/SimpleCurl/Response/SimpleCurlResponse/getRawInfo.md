[Back to the Ling/SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md)<br>
[Back to the Ling\SimpleCurl\Response\SimpleCurlResponse class](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse.md)


SimpleCurlResponse::getRawInfo
================



SimpleCurlResponse::getRawInfo — Returns the raw info returned by the curl curl_getinfo function.




Description
================


public [SimpleCurlResponse::getRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getRawInfo.md)() : array




Returns the raw info returned by the curl curl_getinfo function.
Example of output:

array(26) {
["url"] => string(23) "http://www.example.com/"
["content_type"] => string(24) "text/html; charset=UTF-8"
["http_code"] => int(200)
["header_size"] => int(322)
["request_size"] => int(54)
["filetime"] => int(-1)
["ssl_verify_result"] => int(0)
["redirect_count"] => int(0)
["total_time"] => float(0.233953)
["namelookup_time"] => float(0.020366)
["connect_time"] => float(0.126439)
["pretransfer_time"] => float(0.126468)
["size_upload"] => float(0)
["size_download"] => float(1270)
["speed_download"] => float(5450)
["speed_upload"] => float(0)
["download_content_length"] => float(1270)
["upload_content_length"] => float(-1)
["starttransfer_time"] => float(0.233559)
["redirect_time"] => float(0)
["redirect_url"] => string(0) ""
["primary_ip"] => string(13) "93.184.216.34"
["certinfo"] => array(0) {
}
["primary_port"] => int(80)
["local_ip"] => string(12) "192.168.1.60"
["local_port"] => int(59572)
}




Parameters
================

This method has no parameters.


Return values
================

Returns array.








See Also
================

The [SimpleCurlResponse](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse.md) class.

Previous method: [getBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getBody.md)<br>Next method: [setHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setHeaders.md)<br>

