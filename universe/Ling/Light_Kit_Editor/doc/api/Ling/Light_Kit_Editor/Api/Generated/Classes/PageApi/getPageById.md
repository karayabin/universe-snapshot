[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\PageApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi.md)


PageApi::getPageById
================



PageApi::getPageById — Returns the page row identified by the given id.




Description
================


public [PageApi::getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the page row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PageApi::getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/PageApi.php#L144-L158)


See Also
================

The [PageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/fetch.md)<br>Next method: [getPageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageByIdentifier.md)<br>

