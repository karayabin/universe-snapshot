[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ThrownExceptionInfo class
================
2019-02-21 --> 2020-04-17






Introduction
============

The ThrownExceptionInfo class represents information about a "@throws" tag,
written in a method.



Class synopsis
==============


class <span class="pl-k">ThrownExceptionInfo</span> implements [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md) {

- Properties
    - protected string [$shortName](#property-shortName) ;
    - protected string [$longName](#property-longName) ;
    - protected string [$url](#property-url) ;
    - protected string [$text](#property-text) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/__construct.md)() : void
    - public [getShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getShortName.md)() : string
    - public [setShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setShortName.md)(string $shortName) : void
    - public [getLongName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getLongName.md)() : string
    - public [setLongName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setLongName.md)(string $longName) : void
    - public [getUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getUrl.md)() : string
    - public [setUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setUrl.md)(string $url) : void
    - public [getText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getText.md)() : string
    - public [setText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setText.md)(string $text) : void

}




Properties
=============

- <span id="property-shortName"><b>shortName</b></span>

    This property holds the shortName of the exception.
    
    

- <span id="property-longName"><b>longName</b></span>

    This property holds the longName of the exception.
    
    

- <span id="property-url"><b>url</b></span>

    This property holds the url to the documentation page for this exception.
    
    

- <span id="property-text"><b>text</b></span>

    This property holds the comment text associated with this exception.
    
    



Methods
==============

- [ThrownExceptionInfo::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/__construct.md) &ndash; Builds the ThrownExceptionInfo instance.
- [ThrownExceptionInfo::getShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getShortName.md) &ndash; Returns the shortName of this instance.
- [ThrownExceptionInfo::setShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setShortName.md) &ndash; Sets the shortName.
- [ThrownExceptionInfo::getLongName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getLongName.md) &ndash; Returns the longName of this instance.
- [ThrownExceptionInfo::setLongName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setLongName.md) &ndash; Sets the longName.
- [ThrownExceptionInfo::getUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getUrl.md) &ndash; Returns the url of this instance.
- [ThrownExceptionInfo::setUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setUrl.md) &ndash; Sets the url.
- [ThrownExceptionInfo::getText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/getText.md) &ndash; Returns the text of this instance.
- [ThrownExceptionInfo::setText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo/setText.md) &ndash; Sets the text.





Location
=============
Ling\DocTools\Info\ThrownExceptionInfo<br>
See the source code of [Ling\DocTools\Info\ThrownExceptionInfo](https://github.com/lingtalfi/DocTools/blob/master/Info/ThrownExceptionInfo.php)



SeeAlso
==============
Previous class: [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo.md)<br>Next class: [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md)<br>
