[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The MethodHelper class
================
2019-02-21 --> 2021-05-31






Introduction
============

The MethodHelper class.
A generic helper class to help with method related problems.



Class synopsis
==============


class <span class="pl-k">MethodHelper</span>  {

- Methods
    - public static [getMethodReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper/getMethodReturnType.md)([Ling\DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) $method, array $generatedItems2Url, ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : string
    - public static [getMethodSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper/getMethodSignature.md)([Ling\DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) $method, array $generatedItems2Url, ?array $options = [], ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : string
    - private static [resolveType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper/resolveType.md)(ReflectionType $type, array $generatedItems2Url, [Ling\DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) $method, ReflectionParameter $parameter, ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : string

}






Methods
==============

- [MethodHelper::getMethodReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper/getMethodReturnType.md) &ndash; Returns the method's return type, with links to class names when possible.
- [MethodHelper::getMethodSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper/getMethodSignature.md) &ndash; Returns a method signature with links to class names when possible.
- [MethodHelper::resolveType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/MethodHelper/resolveType.md) &ndash; Returns the type documentation part for the given type.





Location
=============
Ling\DocTools\Helper\MethodHelper<br>
See the source code of [Ling\DocTools\Helper\MethodHelper](https://github.com/lingtalfi/DocTools/blob/master/Helper/MethodHelper.php)



SeeAlso
==============
Previous class: [CommentHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/CommentHelper.md)<br>Next class: [PhpClassHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/PhpClassHelper.md)<br>
