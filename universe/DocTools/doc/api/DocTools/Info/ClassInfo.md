The ClassInfo class
================
2019-02-21 --> 2019-02-22




Introduction
============

The ClassInfo class.



Class synopsis
==============


class <span style="color: orange;">ClassInfo</span> implements [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md) {

- Properties
    - protected [DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) [$comment](#property-comment) ;
    - protected [DocTools\Info\PropertyInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PropertyInfo.md) [$properties](#property-properties) ;
    - protected [DocTools\Info\MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) [$methods](#property-methods) ;
    - protected string [$name](#property-name) ;
    - protected string [$shortName](#property-shortName) ;
    - protected string [$signature](#property-signature) ;
    - protected array [$interfaces](#property-interfaces) ;
    - protected [\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) [$reflectionClass](#property-reflectionClass) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/__construct.md)() : void
    - public [getComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getComment.md)() : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) | null
    - public [getProperties](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getProperties.md)($filter = null) : [PropertyInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PropertyInfo.md)
    - public [getMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getMethods.md)($filter = null) : [MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)
    - public [getOwnMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getOwnMethods.md)($filter = null) : [MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)
    - public [setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setComment.md)([DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) $comment) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [addProperty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/addProperty.md)([DocTools\Info\PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PropertyInfo.md) $property) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [addMethod](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/addMethod.md)([DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) $method) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getName.md)() : string
    - public [setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setName.md)(?$name) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [getSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getSignature.md)() : null
    - public [setSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setSignature.md)(?$signature) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [getShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getShortName.md)() : null
    - public [setShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setShortName.md)(?$shortName) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [getInterfaces](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getInterfaces.md)() : array
    - public [setInterfaces](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setInterfaces.md)(array $interfaces) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)
    - public [getReflectionClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getReflectionClass.md)() : [ReflectionClass](http://php.net/manual/en/class.reflectionclass.php)
    - public [setReflectionClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setReflectionClass.md)([\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) $reflectionClass) : void
    - public [hasProperties](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/hasProperties.md)() : bool

}




Properties
=============

- <span id="property-comment"><b>comment</b></span>

    This property holds a [commentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) object.
    
    

- <span id="property-properties"><b>properties</b></span>

    This property holds an array of [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PropertyInfo.md) objects.
    
    

- <span id="property-methods"><b>methods</b></span>

    This property holds an array of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) objects.
    
    

- <span id="property-name"><b>name</b></span>

    This property holds the name of the class.
    
    

- <span id="property-shortName"><b>shortName</b></span>

    This property holds the shortName of the class.
    
    

- <span id="property-signature"><b>signature</b></span>

    This property holds the signature of the class.
    
    

- <span id="property-interfaces"><b>interfaces</b></span>

    This property holds an array of interfaces (class names) of the implemented interfaces.
    
    

- <span id="property-reflectionClass"><b>reflectionClass</b></span>

    This property holds the \ReflectionClass instance for this class.
    
    



Methods
==============

- [ClassInfo::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/__construct.md) &ndash; Builds the ClassInfo instance.
- [ClassInfo::getComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getComment.md) &ndash; Returns the comment, or null if the comment doesn't exist.
- [ClassInfo::getProperties](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getProperties.md) &ndash; Returns an array of [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PropertyInfo.md).
- [ClassInfo::getMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getMethods.md) &ndash; Returns an array of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md).
- [ClassInfo::getOwnMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getOwnMethods.md) &ndash; Returns the list of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) declared by this class (i.e.
- [ClassInfo::setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setComment.md) &ndash; Sets the comment.
- [ClassInfo::addProperty](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/addProperty.md) &ndash; Adds a property.
- [ClassInfo::addMethod](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/addMethod.md) &ndash; Adds a method to this classInfo instance.
- [ClassInfo::getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getName.md) &ndash; Returns the name of the class.
- [ClassInfo::setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setName.md) &ndash; Sets the name.
- [ClassInfo::getSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getSignature.md) &ndash; Returns the signature.
- [ClassInfo::setSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setSignature.md) &ndash; Sets the signature.
- [ClassInfo::getShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getShortName.md) &ndash; Returns the class short name.
- [ClassInfo::setShortName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setShortName.md) &ndash; Sets the class short name.
- [ClassInfo::getInterfaces](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getInterfaces.md) &ndash; Returns the interface class names.
- [ClassInfo::setInterfaces](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setInterfaces.md) &ndash; Sets the interface class names.
- [ClassInfo::getReflectionClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getReflectionClass.md) &ndash; Returns the reflectionClass of this instance.
- [ClassInfo::setReflectionClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/setReflectionClass.md) &ndash; Sets the reflectionClass.
- [ClassInfo::hasProperties](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/hasProperties.md) &ndash; Returns whether the class has (direct) properties.




Location
=============
DocTools\Info\ClassInfo