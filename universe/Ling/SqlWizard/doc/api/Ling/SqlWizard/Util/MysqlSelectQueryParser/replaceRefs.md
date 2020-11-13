[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::replaceRefs
================



MysqlSelectQueryParser::replaceRefs — Returns the referenced version of the given expression if found in the given references array, or the original expression if not.




Description
================


private static [MysqlSelectQueryParser::replaceRefs](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefs.md)(string $expression, array $references) : string | null




Returns the referenced version of the given expression if found in the given references array, or the original expression if not.
If the expression is null, this method returns null.




Parameters
================


- expression

    

- references

    


Return values
================

Returns string | null.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::replaceRefs](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L464-L470)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Previous method: [getFromInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFromInfo.md)<br>Next method: [replaceRefsInString](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefsInString.md)<br>

