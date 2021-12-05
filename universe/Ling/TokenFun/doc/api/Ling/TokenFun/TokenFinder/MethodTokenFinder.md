[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The MethodTokenFinder class
================
2020-07-28 --> 2021-08-16






Introduction
============

The MethodTokenFinder class.

If finds a method, like for instance:

         public function Shoo(){
             echo "doo";
         }


Note: this implementation might also match a regular function, like

         function my_function(){
             echo "doo";
         }


Therefore, one should be aware of the context.



Class synopsis
==============


class <span class="pl-k">MethodTokenFinder</span> extends [RecursiveTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder.md) implements [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) {

- Inherited properties
    - protected bool [RecursiveTokenFinder::$nestedMode](#property-nestedMode) ;

- Methods
    - public [find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder/find.md)(array $tokens) : array

- Inherited methods
    - public [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md)() : void
    - public [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md)() : bool
    - public [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md)(bool $nestedMode) : void
    - protected [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md)($start, [Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void

}






Methods
==============

- [MethodTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder/find.md) &ndash; Returns an array of match.
- [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
- [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
- [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; 
- [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md) &ndash; Hook to do something when a match is found.





Location
=============
Ling\TokenFun\TokenFinder\MethodTokenFinder<br>
See the source code of [Ling\TokenFun\TokenFinder\MethodTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/MethodTokenFinder.php)



SeeAlso
==============
Previous class: [InterfaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder.md)<br>Next class: [NamespaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NamespaceTokenFinder.md)<br>
