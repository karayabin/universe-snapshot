The CommentInfo class
================
2019-02-21 --> 2019-02-22




Introduction
============

The CommentInfo class.

It contains various information about a doc comment found in the code.

A doc comment is a php comment that starts with slash double star (/**).

A doc comment can be attached to a class, a method or a property.


The doc comment structure
--------------------

The doc comment is composed of two areas:

- the main text
- the tags area


The main text is the base descriptive, human friendly text which describes the commented entity.
It starts at the top of the doc comment block and ends when the tags area
starts (whenever a [block-level tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) is found).

In the main text, the [inline-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) of the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) are resolved.

Also, the special @implementation block-level tag is resolved: the tag is first replaced with the
comment of the relevant interface or abstract class comment, and then the inline tags are resolved
from that compiled comment.


The tags area is the bottom zone of the doc comment, and contains all the block level tags.



Class synopsis
==============


class <span style="color: orange;">CommentInfo</span> implements [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md) {

- Properties
    - protected string [$rawText](#property-rawText) ;
    - protected string [$mainText](#property-mainText) ;
    - protected string [$firstLine](#property-firstLine) ;
    - protected string [$firstSentence](#property-firstSentence) ;
    - protected array [$tags](#property-tags) ;
    - protected array [$seeItems](#property-seeItems) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/__construct.md)() : void
    - public [getRawText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getRawText.md)() : string
    - public [getMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getMainText.md)(array $options = []) : string
    - public [hasEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/hasEmptyMainText.md)() : bool
    - public [getTagContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTagContent.md)(?$tagName, $default = null) : mixed | null
    - public [getTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTags.md)() : array
    - public [getTagsByName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTagsByName.md)(string $tagName) : array
    - public [getTagByName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTagByName.md)(string $tagName) : string | null
    - public [hasTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/hasTag.md)(string $tagName) : bool
    - public [setRawText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setRawText.md)(?$rawText) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)
    - public [setMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setMainText.md)(?$mainText) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)
    - public [setTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setTags.md)(array $tags) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)
    - public [getFirstLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getFirstLine.md)() : string
    - public [setFirstLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setFirstLine.md)(?$firstLine) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)
    - public [getFirstSentence](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getFirstSentence.md)() : string
    - public [setFirstSentence](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setFirstSentence.md)(string $firstSentence) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)
    - public [isEmpty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/isEmpty.md)() : bool
    - public [getSeeItems](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getSeeItems.md)() : array
    - public [setSeeItems](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setSeeItems.md)(array $seeItems) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)

}




Properties
=============

- <span id="property-rawText"><b>rawText</b></span>

    This property holds the doc comment as is.
    
    

- <span id="property-mainText"><b>mainText</b></span>

    This property holds the main text (see class description for more details).
    
    

- <span id="property-firstLine"><b>firstLine</b></span>

    This property holds the first line of the main text.
    
    

- <span id="property-firstSentence"><b>firstSentence</b></span>

    This property holds the first sentence of the comment (the first sequence of characters ending with a dot, included).
    
    

- <span id="property-tags"><b>tags</b></span>

    This property holds an array of tag name => tag values.
    
    Note: a tag can be written multiple times with different values.
    
    Each time a tag is found, its value is added to the corresponding tag values array.
    In each tag value, the [inline-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) are resolved.
    
    

- <span id="property-seeItems"><b>seeItems</b></span>

    This property holds the seeItems array for this instance.
    
    See items is shorthand for "see also items".
    This array contains items that the reader should also read.
    
    See items are declared with either one of those tags:
    - "@seeClass"
    - "@seeMethod"
    
    See [the docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) for more info.
    
    
    The array structure is:
    
    - type: the type of seeItem amongst:
    - class: the class name (i.e. Jin\Log\Logger)
    - method: the method name, either using the method name (if the method is in the same class), or the
    long method name (i.e. className::methodName) if the method is not in the same class.
    - declaringClass: the declaring class name (used to reference a method in the same class)
    - value: the value, depending on the type (either the class name or the method (long)? name
    
    



Methods
==============

- [CommentInfo::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/__construct.md) &ndash; Builds the CommentInfo instance.
- [CommentInfo::getRawText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getRawText.md) &ndash; Returns the raw text.
- [CommentInfo::getMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getMainText.md) &ndash; Returns the main text.
- [CommentInfo::hasEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/hasEmptyMainText.md) &ndash; Returns whether the main text of this comment is empty.
- [CommentInfo::getTagContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTagContent.md) &ndash; Returns the body of the given $tag, or the $default value if the tag isn't defined.
- [CommentInfo::getTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTags.md) &ndash; 
- [CommentInfo::getTagsByName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTagsByName.md) &ndash; Returns all tags with the given $tagName associated with this comment.
- [CommentInfo::getTagByName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getTagByName.md) &ndash; Returns the first $tagName tag associated with this comment.
- [CommentInfo::hasTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/hasTag.md) &ndash; Returns whether the comment has the tag $tagName.
- [CommentInfo::setRawText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setRawText.md) &ndash; Sets the raw text of this comment.
- [CommentInfo::setMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setMainText.md) &ndash; Sets the main text of the comment.
- [CommentInfo::setTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setTags.md) &ndash; Sets the tags for this comment.
- [CommentInfo::getFirstLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getFirstLine.md) &ndash; Returns the first line of the main text (see class description for more details).
- [CommentInfo::setFirstLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setFirstLine.md) &ndash; Sets the first line for this comment.
- [CommentInfo::getFirstSentence](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getFirstSentence.md) &ndash; Returns the firstSentence of this instance.
- [CommentInfo::setFirstSentence](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setFirstSentence.md) &ndash; Sets the firstSentence.
- [CommentInfo::isEmpty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/isEmpty.md) &ndash; Returns whether the comment is empty.
- [CommentInfo::getSeeItems](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/getSeeItems.md) &ndash; Returns the seeItems of this instance.
- [CommentInfo::setSeeItems](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo/setSeeItems.md) &ndash; Sets the seeItems.




Location
=============
DocTools\Info\CommentInfo