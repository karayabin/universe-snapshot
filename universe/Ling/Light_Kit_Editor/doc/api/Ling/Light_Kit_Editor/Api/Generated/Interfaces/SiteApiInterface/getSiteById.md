[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\SiteApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface.md)


SiteApiInterface::getSiteById
================



SiteApiInterface::getSiteById — Returns the site row identified by the given id.




Description
================


abstract public [SiteApiInterface::getSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the site row identified by the given id.

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
See the source code for method [SiteApiInterface::getSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/SiteApiInterface.php#L95-L95)


See Also
================

The [SiteApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/fetch.md)<br>Next method: [getSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteByIdentifier.md)<br>

