[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::replaceRefsInString
================



MysqlSelectQueryParser::replaceRefsInString — Replaces all the references by their values in the given expression, and returns the result.




Description
================


private static [MysqlSelectQueryParser::replaceRefsInString](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefsInString.md)(string $expression, array $references) : string | null




Replaces all the references by their values in the given expression, and returns the result.
Returns null if the given expression is null.

Note: this method wraps the values with the backticks, so that you get the original
expression as written.




Parameters
================


- expression

    

- references

    


Return values
================

Returns string | null.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::replaceRefsInString](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L485-L496)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Previous method: [replaceRefs](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefs.md)<br>Next method: [error](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/error.md)<br>

