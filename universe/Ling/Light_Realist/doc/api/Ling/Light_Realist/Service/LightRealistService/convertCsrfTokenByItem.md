[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::convertCsrfTokenByItem
================



LightRealistService::convertCsrfTokenByItem — entries to an actual csrf_token = [ name: theTokenName, value: theTokenValue ] array.




Description
================


private [LightRealistService::convertCsrfTokenByItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/convertCsrfTokenByItem.md)(array &$item, string $requestId) : void




Parses the given item, and converts csrf_token = true
entries to an actual csrf_token = [ name: theTokenName, value: theTokenValue ] array.

Note: if ajax, then the value is not generated, and a fake value is used.




Parameters
================


- item

    

- requestId

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::convertCsrfTokenByItem](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L903-L924)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareGenericActionItem.md)<br>

