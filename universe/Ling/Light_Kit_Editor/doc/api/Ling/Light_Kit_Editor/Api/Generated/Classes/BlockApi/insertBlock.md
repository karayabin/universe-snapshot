[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\BlockApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi.md)


BlockApi::insertBlock
================



BlockApi::insertBlock — Inserts the given block in the database.




Description
================


public [BlockApi::insertBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/insertBlock.md)(array $block, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given block in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- block

    

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
See the source code for method [BlockApi::insertBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/BlockApi.php#L42-L93)


See Also
================

The [BlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/__construct.md)<br>Next method: [insertBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/insertBlocks.md)<br>

