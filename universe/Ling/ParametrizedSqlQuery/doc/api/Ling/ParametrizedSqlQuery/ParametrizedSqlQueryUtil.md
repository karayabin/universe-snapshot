[Back to the Ling/ParametrizedSqlQuery api](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery.md)



The ParametrizedSqlQueryUtil class
================
2019-08-12 --> 2019-09-05






Introduction
============

The ParametrizedSqlQueryUtil class.

See [conception notes](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/pages/conception-notes.md) for more details.



Class synopsis
==============


class <span class="pl-k">ParametrizedSqlQueryUtil</span>  {

- Properties
    - protected static string [$regMarker](#property-regMarker) = !:([a-z%A-Z_0-9]+)! ;
    - protected static string [$regVariable](#property-regVariable) = !\$([a-zA-Z_0-9]+)! ;
    - protected static array [$operators](#property-operators) = ['=','>','>=','<','<=','!=','like','%like%','%like','like%','not_like','%not_like%','%not_like','not_like%','in','not_in','between','not_between','null','is_not_null'] ;
    - private array [$_options](#property-_options) ;
    - protected array [$_markers](#property-_markers) ;
    - protected array [$_fields](#property-_fields) ;
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php) [$logger](#property-logger) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/__construct.md)() : void
    - public [getSqlQuery](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/getSqlQuery.md)(array $requestDeclaration, array $tags = []) : [SqlQuery](https://github.com/lingtalfi/SqlQuery)
    - public [setLogger](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/setLogger.md)([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php) $logger) : void
    - protected [log](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/log.md)(?$message, string $channel = debug) : void
    - protected [error](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/error.md)(string $message) : void
    - protected [prepareExpression](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/prepareExpression.md)(string $expr, string $tagName, array $tagVariables, array $tagOptions) : string
    - protected [resolveInternalMarkerPercent](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/resolveInternalMarkerPercent.md)(string $internalMarkerName, ?$value, array $tagOptions) : string
    - protected [applyOperatorAndValueRoutine](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/applyOperatorAndValueRoutine.md)(string &$expression, array $transformLikeOptions, array &$tags, array $tagOptions) : void
    - protected [getNewMarkerName](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/getNewMarkerName.md)(string $marker) : string
    - protected [combineWhere](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/combineWhere.md)(array $whereGroups) : string

}




Properties
=============

- <span id="property-regMarker"><b>regMarker</b></span>

    This property holds the regex for an inner marker.
    
    

- <span id="property-regVariable"><b>regVariable</b></span>

    This property holds the regex for a variable.
    
    

- <span id="property-operators"><b>operators</b></span>

    This property holds the list of available operators (by default) for this instance.
    This list is defined by [the open admin protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md).
    
    

- <span id="property-_options"><b>_options</b></span>

    This property holds temporarily the routines for this instance.
    
    

- <span id="property-_markers"><b>_markers</b></span>

    This property holds the markers used by this instance.
    I use it to avoid repetition of markers.
    It's used only in the context of the getSqlQuery method.
    
    

- <span id="property-_fields"><b>_fields</b></span>

    This property holds the fields for this instance.
    It's used only in the context of the getSqlQuery method.
    
    

- <span id="property-logger"><b>logger</b></span>

    This property holds the logger for this instance.
    
    



Methods
==============

- [ParametrizedSqlQueryUtil::__construct](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/__construct.md) &ndash; Builds the ParametrizedSqlQueryUtil instance.
- [ParametrizedSqlQueryUtil::getSqlQuery](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/getSqlQuery.md) &ndash; Returns an SqlQuery instance parametrized using the given request declaration and params.
- [ParametrizedSqlQueryUtil::setLogger](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/setLogger.md) &ndash; Sets the logger.
- [ParametrizedSqlQueryUtil::log](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/log.md) &ndash; Logs a message if a logger has been set.
- [ParametrizedSqlQueryUtil::error](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/error.md) &ndash; Throws an exception.
- [ParametrizedSqlQueryUtil::prepareExpression](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/prepareExpression.md) &ndash; and stores the markers (if any) in the _markers array.
- [ParametrizedSqlQueryUtil::resolveInternalMarkerPercent](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/resolveInternalMarkerPercent.md) &ndash; Resolves the percent symbol in internal marker notation, and returns the result.
- [ParametrizedSqlQueryUtil::applyOperatorAndValueRoutine](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/applyOperatorAndValueRoutine.md) &ndash; Applies the transformIfLike routine to the given expression.
- [ParametrizedSqlQueryUtil::getNewMarkerName](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/getNewMarkerName.md) &ndash; Returns a unique marker name that's not already in the _markers array.
- [ParametrizedSqlQueryUtil::combineWhere](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/combineWhere.md) &ndash; Combines the where fragment to inject in the sql query (depending on the configuration options), and returns it.





Location
=============
Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil<br>
See the source code of [Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/ParametrizedSqlQueryUtil.php)



SeeAlso
==============
Previous class: [ParametrizedSqlQueryException](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/Exception/ParametrizedSqlQueryException.md)<br>
