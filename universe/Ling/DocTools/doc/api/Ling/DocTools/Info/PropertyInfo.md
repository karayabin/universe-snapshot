[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The PropertyInfo class
================
2019-02-21 --> 2020-04-17






Introduction
============

The PropertyInfo class represents information about a property (of a class).



Class synopsis
==============


class <span class="pl-k">PropertyInfo</span> implements [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md) {

- Properties
    - protected [Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) [$comment](#property-comment) ;
    - protected string [$name](#property-name) ;
    - protected string [$signature](#property-signature) ;
    - protected string [$visibility](#property-visibility) ;
    - protected string [$type](#property-type) ;
    - protected [\ReflectionProperty](http://php.net/manual/en/class.reflectionproperty.php) [$reflectionProperty](#property-reflectionProperty) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/__construct.md)() : void
    - public [getComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getComment.md)() : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md)
    - public [setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setComment.md)([Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment) : [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo.md)
    - public [getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getName.md)() : string
    - public [setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setName.md)(string $name) : [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo.md)
    - public [getSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getSignature.md)() : string
    - public [setSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setSignature.md)(string $signature) : [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo.md)
    - public [getVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getVisibility.md)() : string
    - public [setVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setVisibility.md)(string $visibility) : void
    - public [getDeclaringClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getDeclaringClass.md)() : string
    - public [getReflectionProperty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getReflectionProperty.md)() : [ReflectionProperty](http://php.net/manual/en/class.reflectionproperty.php)
    - public [setReflectionProperty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setReflectionProperty.md)([\ReflectionProperty](http://php.net/manual/en/class.reflectionproperty.php) $reflectionProperty) : void
    - public [getDefaultValue](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getDefaultValue.md)() : string | null
    - public [getType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getType.md)() : string | null
    - public [setType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setType.md)(string $type) : void

}




Properties
=============

- <span id="property-comment"><b>comment</b></span>

    This property holds the doc comment of the property if any.
    
    

- <span id="property-name"><b>name</b></span>

    This property holds the name of the property.
    
    

- <span id="property-signature"><b>signature</b></span>

    This property holds the signature of the property.
    
    

- <span id="property-visibility"><b>visibility</b></span>

    This property holds the visibility of this property.
    
    

- <span id="property-type"><b>type</b></span>

    This property holds the type of the property.
    The type is given by the "@var" tag.
    See [Ling\DocTools\Helper\CommentHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/CommentHelper.md)::$propertyVarTagTypes for more info.
    
    

- <span id="property-reflectionProperty"><b>reflectionProperty</b></span>

    This property holds the \ReflectionProperty instance describing this property.
    
    



Methods
==============

- [PropertyInfo::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/__construct.md) &ndash; Builds the PropertyInfo instance.
- [PropertyInfo::getComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getComment.md) &ndash; Returns the [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) instance for this property.
- [PropertyInfo::setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setComment.md) &ndash; Sets the comment.
- [PropertyInfo::getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getName.md) &ndash; Returns the name of this property.
- [PropertyInfo::setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setName.md) &ndash; Sets the name of this property.
- [PropertyInfo::getSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getSignature.md) &ndash; Returns the signature for this property.
- [PropertyInfo::setSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setSignature.md) &ndash; Sets the signature for this property.
- [PropertyInfo::getVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getVisibility.md) &ndash; Returns the visibility of this instance.
- [PropertyInfo::setVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setVisibility.md) &ndash; Sets the visibility.
- [PropertyInfo::getDeclaringClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getDeclaringClass.md) &ndash; Returns the declaringClass of this instance.
- [PropertyInfo::getReflectionProperty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getReflectionProperty.md) &ndash; Returns the reflectionProperty of this instance.
- [PropertyInfo::setReflectionProperty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setReflectionProperty.md) &ndash; Sets the reflectionProperty.
- [PropertyInfo::getDefaultValue](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getDefaultValue.md) &ndash; Returns the default value of this property, or null if there is no default value.
- [PropertyInfo::getType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/getType.md) &ndash; Returns the type of this instance.
- [PropertyInfo::setType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo/setType.md) &ndash; Sets the type.





Location
=============
Ling\DocTools\Info\PropertyInfo<br>
See the source code of [Ling\DocTools\Info\PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/Info/PropertyInfo.php)



SeeAlso
==============
Previous class: [PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md)<br>Next class: [ThrownExceptionInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ThrownExceptionInfo.md)<br>
