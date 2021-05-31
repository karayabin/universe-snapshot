WrappedString
==================
2015-11-20 -> 2021-03-05



Low level utilities to work with wrapped strings.


WrappedString is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.WrappedString
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/WrappedString
```




A wrapped string is a string wrapped by a begin symbol and an end symbol.
A wrapped string uses the escaping modes as described in 
the [quotes escaping mode convention](https://github.com/lingtalfi/ConventionGuy/blob/master/convention.quotesEscapingModes.eng.md).


When the end symbol and the begin symbol are identical, the wrapped string is called a candy string.




The wrapped string tool is described in the [WrappedStringTool documentation](https://github.com/lingtalfi/WrappedString/blob/master/WrappedStringTool.md)




Nomenclature
----------------

### candy string 

A string which is wrapped by a given symbol.
The wrapping symbol can be used literally inside of the wrapped string by using 
the [quote escape mechanism](https://github.com/lingtalfi/ConventionGuy/blob/master/convention.quotesEscapingModes.eng.md).



For instance, the following are candy strings:

- "I'm a candy string wrapped with quotes"
- "boo"
- "bo\"oo"
- bHere the wrapper char is the lower case B letterb
- \*O\*






Dependencies
------------------

- [lingtalfi/Escaper 1.4.0](https://github.com/lingtalfi/Escaper)




History Log
------------------

- 1.3.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.3.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.3.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.0 -- 2015-11-23

    - add WrappedStringTool::getNextWrappedStringInfo
    
- 1.2.0 -- 2015-11-22

    - add WrappedStringTool::isCandyString
    
- 1.1.0 -- 2015-11-21

    - add WrappedStringTool::findCandyStringEndPos
        
- 1.0.0 -- 2015-11-20

    - initial commit
    
    