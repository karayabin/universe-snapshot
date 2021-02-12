[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)



The MysqlSelectQueryParser class
================
2019-07-23 --> 2021-01-22






Introduction
============

The SelectQueryParser class.


Warning, read the section below before using this class.


The keyword option
--------------

Some methods of this class use the "keyword" option.
This is because there is a limitation in the technique I used to parse the queries: it will work only if your query doesn't contain
an expression with the following format:

- __ref1__

Where 1 can be replaced by any number.
That's because we internally use those references to parse the query.

If your query does actually use such references, use the keyword option to replace the ref keyword with
one that's not in your query.



Class synopsis
==============


class <span class="pl-k">MysqlSelectQueryParser</span>  {

- Methods
    - public static [recompileParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/recompileParts.md)(array $queryParts) : string
    - public static [combineWhere](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/combineWhere.md)(array &$queryParts, string $where, ?$mode = and) : void
    - public static [getQueryParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getQueryParts.md)(string $query, ?array $options = []) : array
    - public static [getFieldsInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFieldsInfo.md)(string $fields, ?array $options = []) : array
    - public static [getFromInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFromInfo.md)(string $from, ?array $options = []) : array
    - private static [replaceRefs](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefs.md)(string $expression, array $references) : string | null
    - private static [replaceRefsInString](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefsInString.md)(string $expression, array $references) : string | null
    - private static [error](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/error.md)(string $msg) : void

}






Methods
==============

- [MysqlSelectQueryParser::recompileParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/recompileParts.md) &ndash; Takes a queryParts array, and recompiles it into an executable sql select query; returns the recompiled result.
- [MysqlSelectQueryParser::combineWhere](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/combineWhere.md) &ndash; Takes the given queryParts, and adds the "where" part to it, based on the given mode.
- [MysqlSelectQueryParser::getQueryParts](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getQueryParts.md) &ndash; Returns an array containing the different parts of the given mysql query.
- [MysqlSelectQueryParser::getFieldsInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFieldsInfo.md) &ndash; Returns an array containing some info about the given fields.
- [MysqlSelectQueryParser::getFromInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/getFromInfo.md) &ndash; 
- [MysqlSelectQueryParser::replaceRefs](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefs.md) &ndash; Returns the referenced version of the given expression if found in the given references array, or the original expression if not.
- [MysqlSelectQueryParser::replaceRefsInString](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/replaceRefsInString.md) &ndash; Replaces all the references by their values in the given expression, and returns the result.
- [MysqlSelectQueryParser::error](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser/error.md) &ndash; Throws an exception.





Location
=============
Ling\SqlWizard\Util\MysqlSelectQueryParser<br>
See the source code of [Ling\SqlWizard\Util\MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlSelectQueryParser.php)



SeeAlso
==============
Previous class: [SqlWizardGeneralTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool.md)<br>Next class: [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)<br>
