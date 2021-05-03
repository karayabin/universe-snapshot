[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\BlockHasWidgetApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface.md)


BlockHasWidgetApiInterface::insertBlockHasWidget
================



BlockHasWidgetApiInterface::insertBlockHasWidget — Inserts the given block has widget in the database.




Description
================


abstract public [BlockHasWidgetApiInterface::insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/insertBlockHasWidget.md)(array $blockHasWidget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given block has widget in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- blockHasWidget

    

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
See the source code for method [BlockHasWidgetApiInterface::insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/BlockHasWidgetApiInterface.php#L35-L35)


See Also
================

The [BlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface.md) class.

Next method: [insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/insertBlockHasWidgets.md)<br>

