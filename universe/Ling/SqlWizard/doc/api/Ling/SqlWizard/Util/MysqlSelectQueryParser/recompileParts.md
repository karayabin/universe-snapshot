[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::recompileParts
================



MysqlSelectQueryParser::recompileParts — Takes a queryParts array, and recompiles it into an executable sql select query; returns the recompiled result.




Description
================


public static [MysqlSelectQueryParser::recompileParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/recompileParts.md)(array $queryParts) : string




Takes a queryParts array, and recompiles it into an executable sql select query; returns the recompiled result.

Note: the queryParts array is the outcome of the **getQueryParts** method of this class.




Parameters
================


- queryParts

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::recompileParts](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L49-L77)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Next method: [combineWhere](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/combineWhere.md)<br>

