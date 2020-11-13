[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::combineWhere
================



MysqlSelectQueryParser::combineWhere — Takes the given queryParts, and adds the "where" part to it, based on the given mode.




Description
================


public static [MysqlSelectQueryParser::combineWhere](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/combineWhere.md)(array &$queryParts, string $where, ?$mode = and) : void




Takes the given queryParts, and adds the "where" part to it, based on the given mode.

If queryParts.where is null, then the "where" argument replaces that null value.
If queryParts.where is defined, then the "where" argument is added to queryParts.where depending on the mode.
- if mode=and (default), then the new where will look like this:
     - newWhere: ($queryParts.where) and $where
- if mode=or, then the new where will look like this:
     - newWhere: ($queryParts.where) or $where

Notice that for the "and" and "or" modes, an extra parenthesis pair is wrapped around the existing queryParts.where.




Parameters
================


- queryParts

    

- where

    

- mode

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::combineWhere](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L99-L114)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Previous method: [recompileParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/recompileParts.md)<br>Next method: [getQueryParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getQueryParts.md)<br>

