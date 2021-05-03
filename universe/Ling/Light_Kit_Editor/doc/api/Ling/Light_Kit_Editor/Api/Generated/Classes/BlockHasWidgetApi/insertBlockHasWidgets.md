[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\BlockHasWidgetApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi.md)


BlockHasWidgetApi::insertBlockHasWidgets
================



BlockHasWidgetApi::insertBlockHasWidgets — Inserts the given block has widget rows in the database.




Description
================


public [BlockHasWidgetApi::insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/insertBlockHasWidgets.md)(array $blockHasWidgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given block has widget rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- blockHasWidgets

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BlockHasWidgetApi::insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/BlockHasWidgetApi.php#L98-L109)


See Also
================

The [BlockHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi.md) class.

Previous method: [insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/insertBlockHasWidget.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetchAll.md)<br>

