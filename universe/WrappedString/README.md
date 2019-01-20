WrappedString
==================
2015-11-20



Low level utilities to work with wrapped strings.


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
    
- 1.3.0 -- 2015-11-23

    - add WrappedStringTool::getNextWrappedStringInfo
    
- 1.2.0 -- 2015-11-22

    - add WrappedStringTool::isCandyString
    
- 1.1.0 -- 2015-11-21

    - add WrappedStringTool::findCandyStringEndPos
        
- 1.0.0 -- 2015-11-20

    - initial commit
    
    