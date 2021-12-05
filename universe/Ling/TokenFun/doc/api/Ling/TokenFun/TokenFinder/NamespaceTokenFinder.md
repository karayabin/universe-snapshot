[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The NamespaceTokenFinder class
================
2020-07-28 --> 2021-08-16






Introduction
============

The NamespaceTokenFinder class.


If finds a namespace, like

         namespace ArachnophoBee\Tool;



Class synopsis
==============


class <span class="pl-k">NamespaceTokenFinder</span> extends [RecursiveTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder.md) implements [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) {

- Inherited properties
    - protected bool [RecursiveTokenFinder::$nestedMode](#property-nestedMode) ;

- Methods
    - public [find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NamespaceTokenFinder/find.md)(array $tokens) : array

- Inherited methods
    - public [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md)() : void
    - public [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md)() : bool
    - public [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md)(bool $nestedMode) : void
    - protected [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md)($start, [Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void

}






Methods
==============

- [NamespaceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NamespaceTokenFinder/find.md) &ndash; Returns an array of match.
- [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
- [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
- [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; 
- [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md) &ndash; Hook to do something when a match is found.





Location
=============
Ling\TokenFun\TokenFinder\NamespaceTokenFinder<br>
See the source code of [Ling\TokenFun\TokenFinder\NamespaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/NamespaceTokenFinder.php)



SeeAlso
==============
Previous class: [MethodTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder.md)<br>Next class: [NewObjectTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder.md)<br>
