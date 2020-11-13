[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::getFromInfo
================



MysqlSelectQueryParser::getFromInfo — 




Description
================


public static [MysqlSelectQueryParser::getFromInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFromInfo.md)(string $from, ?array $options = []) : array




Returns an array containing some info about the "from" clause:

- 0: database; string=null, the database if specified, or null otherwise
- 1: table; string, the actual table name used
- 2: tableAlias; string=null, the table alias is defined, null otherwise



Available options:
- keyword: string=ref, see the class comment for more details




Parameters
================


- from

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::getFromInfo](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L407-L447)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Previous method: [getFieldsInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFieldsInfo.md)<br>Next method: [replaceRefs](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefs.md)<br>

