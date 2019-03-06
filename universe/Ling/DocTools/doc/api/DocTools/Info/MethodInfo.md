[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)



The MethodInfo class
================
2019-02-21 --> 2019-03-05






Introduction
============

The MethodInfo class represents information about a method (of a class).



Class synopsis
==============


class <span class="pl-k">MethodInfo</span> implements [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md) {

- Properties
    - protected string [$visibility](#property-visibility) ;
    - protected [DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) [$comment](#property-comment) ;
    - protected string [$signature](#property-signature) ;
    - protected string [$name](#property-name) ;
    - protected string [$returnType](#property-returnType) ;
    - protected string [$returnDescription](#property-returnDescription) ;
    - protected [\ReflectionMethod](http://php.net/manual/en/class.reflectionmethod.php) [$reflectionMethod](#property-reflectionMethod) ;
    - protected [DocTools\Info\ParameterInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ParameterInfo.md) [$parameters](#property-parameters) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/__construct.md)() : void
    - public [getVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getVisibility.md)() : string
    - public [setVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setVisibility.md)(string $visibility) : [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)
    - public [getComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getComment.md)() : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)
    - public [setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setComment.md)([DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) $comment) : [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)
    - public [getSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getSignature.md)() : string
    - public [setSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setSignature.md)(string $signature) : [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)
    - public [getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getName.md)() : null
    - public [setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setName.md)(string $name) : [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)
    - public [getReflectionMethod](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getReflectionMethod.md)() : [ReflectionMethod](http://php.net/manual/en/class.reflectionmethod.php)
    - public [setReflectionMethod](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setReflectionMethod.md)([\ReflectionMethod](http://php.net/manual/en/class.reflectionmethod.php) $reflectionMethod) : void
    - public [getDeclaringClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getDeclaringClass.md)() : string
    - public [getReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getReturnType.md)() : string
    - public [setReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setReturnType.md)(string $returnType) : void
    - public [setReturnDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setReturnDescription.md)(string $returnDescription) : void
    - public [hasParameters](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/hasParameters.md)() : bool
    - public [addParameter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/addParameter.md)([DocTools\Info\ParameterInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ParameterInfo.md) $param) : void
    - public [getParameters](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getParameters.md)() : [ParameterInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ParameterInfo.md)
    - public [getReturnDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getReturnDescription.md)() : string

}




Properties
=============

- <span id="property-visibility"><b>visibility</b></span>

    This property holds the visibility of the method.
    
    

- <span id="property-comment"><b>comment</b></span>

    This property holds a <[CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) instance.
    
    

- <span id="property-signature"><b>signature</b></span>

    This property holds the signature for this instance.
    
    

- <span id="property-name"><b>name</b></span>

    This property holds the name for this instance.
    
    

- <span id="property-returnType"><b>returnType</b></span>

    This property holds the return type of the method.
    The return type is given by the "@return" tag.
    
    See [DocTools\Helper\CommentHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Helper/CommentHelper.md)::$propertyReturnTagTypes for more info.
    
    The default value is void.
    
    

- <span id="property-returnDescription"><b>returnDescription</b></span>

    This property holds the return description of the method, given by the "@return" tag.
    
    

- <span id="property-reflectionMethod"><b>reflectionMethod</b></span>

    This property holds the reflection method associated with this class.
    
    

- <span id="property-parameters"><b>parameters</b></span>

    This property holds the parameters for this instance.
    
    



Methods
==============

- [MethodInfo::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/__construct.md) &ndash; Builds the MethodInfo instance.
- [MethodInfo::getVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getVisibility.md) &ndash; Returns the visibility of the method.
- [MethodInfo::setVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setVisibility.md) &ndash; Sets the visibility for this method.
- [MethodInfo::getComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getComment.md) &ndash; Returns the [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) instance.
- [MethodInfo::setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setComment.md) &ndash; Sets the comment for this instance.
- [MethodInfo::getSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getSignature.md) &ndash; Returns the signature of this method.
- [MethodInfo::setSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setSignature.md) &ndash; Sets the signature.
- [MethodInfo::getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getName.md) &ndash; Returns the name of the method.
- [MethodInfo::setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setName.md) &ndash; Sets the name of the method.
- [MethodInfo::getReflectionMethod](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getReflectionMethod.md) &ndash; Returns the reflectionMethod of this instance.
- [MethodInfo::setReflectionMethod](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setReflectionMethod.md) &ndash; Sets the reflectionMethod.
- [MethodInfo::getDeclaringClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getDeclaringClass.md) &ndash; Returns the declaringClass of this instance.
- [MethodInfo::getReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getReturnType.md) &ndash; Returns the returnType of this instance.
- [MethodInfo::setReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setReturnType.md) &ndash; Sets the returnType.
- [MethodInfo::setReturnDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/setReturnDescription.md) &ndash; Sets the returnDescription.
- [MethodInfo::hasParameters](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/hasParameters.md) &ndash; Returns whether the method has at least one parameter.
- [MethodInfo::addParameter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/addParameter.md) &ndash; Adds a DocTools\Info\ParameterInfo to this instance.
- [MethodInfo::getParameters](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getParameters.md) &ndash; Returns the parameters of this instance.
- [MethodInfo::getReturnDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo/getReturnDescription.md) &ndash; Returns the returnDescription of this instance.





Location
=============
DocTools\Info\MethodInfo


SeeAlso
==============
Previous class: [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md)<br>Next class: [ParameterInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ParameterInfo.md)<br>
