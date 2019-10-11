[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\PlanetParser\PlanetParser class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser.md)


PlanetParser::parse
================



PlanetParser::parse — and creates a PlanetReport (retrieved using the getReport method).




Description
================


public [PlanetParser::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/parse.md)(string $planetDir, array $options = []) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)




Returns the PlanetInfo object corresponding to the parsed $planetDir,
and creates a PlanetReport (retrieved using the getReport method).

Available options are:
- ignoreFilesStartingWith: array of prefixes to look for. If a prefix matches the beginning of a (relative) file path (relative to the planet root dir),
         then the file is excluded.

See also [the PlanetParser::getReport method](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/getReport.md)


Parameters
================


- planetDir

    

- options

    


Return values
================

Returns [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PlanetParser::parse](https://github.com/lingtalfi/DocTools/blob/master/PlanetParser/PlanetParser.php#L101-L152)


See Also
================

The [PlanetParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser.md) class.

Previous method: [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/__construct.md)<br>Next method: [setClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setClassParser.md)<br>

