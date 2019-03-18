[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The CommentHelper class
================
2019-02-21 --> 2019-03-14






Introduction
============

The CommentHelper class.
This is a generic helper class to help with the comments (doc comments, or [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md)).



Class synopsis
==============


class <span class="pl-k">CommentHelper</span>  {

- Properties
    - public static array [$propertyVarTagTypes](#property-propertyVarTagTypes) = ['int','float','bool','mixed','null','array','callable','string'] ;
    - public static array [$propertyReturnTagTypes](#property-propertyReturnTagTypes) = ['int','mixed','object','float','bool','false','true','null','array','callable','string','void'] ;

- Methods
    - public static [displaySeeAlsoItemsSentence](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/CommentHelper/displaySeeAlsoItemsSentence.md)([Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment) : string | null

}




Properties
=============

- <span id="property-propertyVarTagTypes"><b>propertyVarTagTypes</b></span>

    This property holds the php types (i.e. not including custom user class) allowed
    for a @var tag in DocTools.
    
    

- <span id="property-propertyReturnTagTypes"><b>propertyReturnTagTypes</b></span>

    This property holds the php types (i.e. not including custom user class) allowed
    for a "@return" tag in DocTools.
    
    



Methods
==============

- [CommentHelper::displaySeeAlsoItemsSentence](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/CommentHelper/displaySeeAlsoItemsSentence.md) &ndash; Returns a human sentence out of the see items collected into the given CommentInfo instance.





Location
=============
Ling\DocTools\Helper\CommentHelper


SeeAlso
==============
Previous class: [ClassNameHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/ClassNameHelper.md)<br>Next class: [MethodHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper.md)<br>