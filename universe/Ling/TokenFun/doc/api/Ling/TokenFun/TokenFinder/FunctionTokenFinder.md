[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The FunctionTokenFinder class
================
2020-07-28 --> 2021-08-16






Introduction
============

The FunctionTokenFinder class.

If finds a function, like for instance:

         function(){
             echo "doo";
         }



Class synopsis
==============


class <span class="pl-k">FunctionTokenFinder</span> extends [RecursiveTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder.md) implements [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) {

- Inherited properties
    - protected bool [RecursiveTokenFinder::$nestedMode](#property-nestedMode) ;

- Methods
    - public [find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder/find.md)(array $tokens) : array

- Inherited methods
    - public [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md)() : void
    - public [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md)() : bool
    - public [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md)(bool $nestedMode) : void
    - protected [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md)($start, [Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void

}






Methods
==============

- [FunctionTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder/find.md) &ndash; Returns an array of match.
- [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
- [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
- [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; 
- [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md) &ndash; Hook to do something when a match is found.





Location
=============
Ling\TokenFun\TokenFinder\FunctionTokenFinder<br>
See the source code of [Ling\TokenFun\TokenFinder\FunctionTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/FunctionTokenFinder.php)



SeeAlso
==============
Previous class: [ClassSignatureTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassSignatureTokenFinder.md)<br>Next class: [InterfaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder.md)<br>
