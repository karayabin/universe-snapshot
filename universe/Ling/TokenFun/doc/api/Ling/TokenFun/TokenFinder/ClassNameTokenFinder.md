[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The ClassNameTokenFinder class
================
2020-07-28 --> 2021-08-16






Introduction
============

The ClassTokenFinder class.

It assumes that the php code is valid.
If finds a className, like for instance if the given code is

         class Doo{
             // ...
         }

It will also match Traits.


and matches Doo.



Class synopsis
==============


class <span class="pl-k">ClassNameTokenFinder</span> extends [RecursiveTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder.md) implements [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) {

- Properties
    - protected string [$namespace](#property-namespace) ;
    - protected bool [$includeInterface](#property-includeInterface) ;

- Inherited properties
    - protected bool [RecursiveTokenFinder::$nestedMode](#property-nestedMode) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/__construct.md)() : void
    - public [setIncludeInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/setIncludeInterface.md)(bool $includeInterface) : [ClassNameTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder.md)
    - public [find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/find.md)(array $tokens) : array

- Inherited methods
    - public [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md)() : bool
    - public [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md)(bool $nestedMode) : void
    - protected [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md)($start, [Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void

}




Properties
=============

- <span id="property-namespace"><b>namespace</b></span>

    This property holds the namespace for this instance.
    
    

- <span id="property-includeInterface"><b>includeInterface</b></span>

    This property holds the includeInterface for this instance.
    
    

- <span id="property-nestedMode"><b>nestedMode</b></span>

    This property holds the nestedMode for this instance.
    
    



Methods
==============

- [ClassNameTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/__construct.md) &ndash; Builds the ClassNameTokenFinder instance.
- [ClassNameTokenFinder::setIncludeInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/setIncludeInterface.md) &ndash; Sets the includeInterface.
- [ClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/find.md) &ndash; Returns an array of match.
- [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
- [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; 
- [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md) &ndash; Hook to do something when a match is found.





Location
=============
Ling\TokenFun\TokenFinder\ClassNameTokenFinder<br>
See the source code of [Ling\TokenFun\TokenFinder\ClassNameTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/ClassNameTokenFinder.php)



SeeAlso
==============
Previous class: [ArrayReferenceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder.md)<br>Next class: [ClassPropertyTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassPropertyTokenFinder.md)<br>
