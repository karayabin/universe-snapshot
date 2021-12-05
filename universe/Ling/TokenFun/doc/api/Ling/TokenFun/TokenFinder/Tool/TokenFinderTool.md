[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The TokenFinderTool class
================
2020-07-28 --> 2021-08-16






Introduction
============

The TokenFinderTool class.



Class synopsis
==============


class <span class="pl-k">TokenFinderTool</span>  {

- Methods
    - public static [matchesToString](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/matchesToString.md)(array &$matches, array $tokens) : void
    - public static [getClassNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassNames.md)(array $tokens, ?$withNamespaces = true, ?array $options = []) : array
    - public static [getClassPropertyBasicInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassPropertyBasicInfo.md)(string $className) : array
    - public static [getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getParentClassName.md)(array $tokens, ?$fullName = true) : string | false
    - public static [getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassSignatureInfo.md)(array $tokens) : array
    - public static [getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getInterfaces.md)(array $tokens, ?$fullName = true) : array
    - public static [getMethodsInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getMethodsInfo.md)(array $tokens) : array
    - public static [getNamespace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getNamespace.md)(array $tokens) : false | string
    - public static [getUseDependencies](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependencies.md)(array $tokens, ?array $options = []) : array
    - public static [getUseDependenciesByFolder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByFolder.md)(string $dir) : array
    - public static [getUseDependenciesByReflectionClasses](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByReflectionClasses.md)(array $reflectionClasses) : array
    - public static [removePhpComments](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/removePhpComments.md)(string $str, ?bool $preserveWhiteSpace = true) : string

}






Methods
==============

- [TokenFinderTool::matchesToString](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/matchesToString.md) &ndash; Replace the matches with their actual content.
- [TokenFinderTool::getClassNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassNames.md) &ndash; Returns the class names found in the given tokens, prefixed with namespace if $withNamespaces=true.
- [TokenFinderTool::getClassPropertyBasicInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassPropertyBasicInfo.md) &ndash; Returns an array of basic information for every class properties of the given class.
- [TokenFinderTool::getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getParentClassName.md) &ndash; Returns the parent class name, or false if no parent was found.
- [TokenFinderTool::getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassSignatureInfo.md) &ndash; Returns an array containing info about the first class signature found in the tokens, or false if no class signature was found.
- [TokenFinderTool::getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getInterfaces.md) &ndash; Returns the interfaces found in the given tokens.
- [TokenFinderTool::getMethodsInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getMethodsInfo.md) &ndash; Returns some info about the methods found in the given tokens.
- [TokenFinderTool::getNamespace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getNamespace.md) &ndash; Returns the first namespace found in the given tokens, or false otherwise.
- [TokenFinderTool::getUseDependencies](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependencies.md) &ndash; Returns an array of use statements' class names found in the given tokens.
- [TokenFinderTool::getUseDependenciesByFolder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByFolder.md) &ndash; Returns an array of use statements' class names inside the given directory.
- [TokenFinderTool::getUseDependenciesByReflectionClasses](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByReflectionClasses.md) &ndash; Returns an array of all the use statements used by the given reflection classes.
- [TokenFinderTool::removePhpComments](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/removePhpComments.md) &ndash; Removes the php comments from the given valid php string, and returns the result.





Location
=============
Ling\TokenFun\TokenFinder\Tool\TokenFinderTool<br>
See the source code of [Ling\TokenFun\TokenFinder\Tool\TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php)



SeeAlso
==============
Previous class: [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md)<br>Next class: [UseStatementsTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/UseStatementsTokenFinder.md)<br>
