[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\BlockHasWidgetApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi.md)


BlockHasWidgetApi::getBlockHasWidgetById
================



BlockHasWidgetApi::getBlockHasWidgetById — Returns the block has widget row identified by the given id.




Description
================


public [BlockHasWidgetApi::getBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the block has widget row identified by the given id.

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
See the source code for method [BlockHasWidgetApi::getBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/BlockHasWidgetApi.php#L144-L158)


See Also
================

The [BlockHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetch.md)<br>Next method: [getBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidget.md)<br>

