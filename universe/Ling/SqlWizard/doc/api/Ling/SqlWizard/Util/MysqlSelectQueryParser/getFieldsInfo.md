[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::getFieldsInfo
================



MysqlSelectQueryParser::getFieldsInfo — Returns an array containing some info about the given fields.




Description
================


public static [MysqlSelectQueryParser::getFieldsInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFieldsInfo.md)(string $fields, ?array $options = []) : array




Returns an array containing some info about the given fields.

It's an array of fieldItems representing the fields used in the query.


Each fieldItem is an array containing:
- column: string, the actual column from the table
- tableAlias: string=null, the table alias used for this column, or null if no table alias was used
- alias: string=null, the alias used for this column, or null if no alias was used


Note: I didn't put the column as the key since with inner joins, two different tables could use the same column name
which would lead to conflicts.



Available options:
- keyword: string=ref, see the class comment for more details




Parameters
================


- fields

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::getFieldsInfo](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L331-L384)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Previous method: [getQueryParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getQueryParts.md)<br>Next method: [getFromInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFromInfo.md)<br>

