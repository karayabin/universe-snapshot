[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::getTablesByNamespace
================



It4DbParserTool::getTablesByNamespace — Returns the tables starting with the given namespace's prefix and followed by an underscore.




Description
================


public [It4DbParserTool::getTablesByNamespace](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTablesByNamespace.md)(string $namespace) : array




Returns the tables starting with the given namespace's prefix and followed by an underscore.

If the namespace happens to be a table too, it's also included in the results.




Parameters
================


- namespace

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [It4DbParserTool::getTablesByNamespace](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L410-L423)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [getRelatedTablesByTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getRelatedTablesByTables.md)<br>Next method: [getPotentialNamespaces](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getPotentialNamespaces.md)<br>

