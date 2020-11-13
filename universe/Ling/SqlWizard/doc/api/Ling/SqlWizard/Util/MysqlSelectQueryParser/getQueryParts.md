[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlSelectQueryParser class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)


MysqlSelectQueryParser::getQueryParts
================



MysqlSelectQueryParser::getQueryParts — Returns an array containing the different parts of the given mysql query.




Description
================


public static [MysqlSelectQueryParser::getQueryParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getQueryParts.md)(string $query, ?array $options = []) : array




Returns an array containing the different parts of the given mysql query.

The available parts are:

- fields, the part just after the "select" keyword
- from, the part just after the "from" keyword
- where
- joins, the part containing the joins (including the join keyword for you to investigate the join type).
     The following types of joins are handled so far:
     - inner join
     - left join
     - right join
- groupBy, the part just after the "group by" keyword
- having
- orderBy, the part just after the "order by" keyword
- limit


The returned array contains all the above parts as the key, and the value is either null if the part is not defined,
or a string corresponding to the part otherwise.



More details about the select syntax: https://dev.mysql.com/doc/refman/8.0/en/select.html.


Warning: this doesn't handle subqueries.




Available options:
- keyword: string=ref, see the class comment for more details




Parameters
================


- query

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlSelectQueryParser::getQueryParts](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php#L159-L300)


See Also
================

The [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md) class.

Previous method: [combineWhere](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/combineWhere.md)<br>Next method: [getFieldsInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFieldsInfo.md)<br>

