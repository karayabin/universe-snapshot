The MethodHelper class
================
2019-02-21 --> 2019-02-25




Introduction
============

The MethodHelper class.
A generic helper class to help with method related problems.



Class synopsis
==============


class <span class="pl-k">MethodHelper</span>  {

- Methods
    - public static [getMethodReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Helper/MethodHelper/getMethodReturnType.md)([DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) $method, array $generatedItems2Url, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : string
    - public static [getMethodSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Helper/MethodHelper/getMethodSignature.md)([DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) $method, array $generatedItems2Url, array $options = [], [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : string

}






Methods
==============

- [MethodHelper::getMethodReturnType](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Helper/MethodHelper/getMethodReturnType.md) &ndash; Returns the method's return type, with links to class names when possible.
- [MethodHelper::getMethodSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Helper/MethodHelper/getMethodSignature.md) &ndash; Returns a method signature with links to class names when possible.




Location
=============
DocTools\Helper\MethodHelper