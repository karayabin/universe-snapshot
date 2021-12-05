[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The VariableAssignmentTokenFinder class
================
2020-07-28 --> 2021-08-16






Introduction
============

The VariableAssignmentTokenFinder class.

If finds a variable assignment, like for instance:

         - $o = 6;
         - $o = $p;
         - $o = $p + 4;
         - $o = "pou";
         - $o = "pou" . "poo";
         - $o = <<<EOF
                     blabla
           EOF;
         - $o = <<<'EOF'
                     blabla
           EOF;
         - $o = array();
         - $o = ["apple" => 'juice'];
         - $o = new \Poo();
         - $o = 6 + 4 / 78;


With some options, it can also find more:

         - $o['oo'] = 6;
         - $o['oo'][987] = 6;
         - $$dyn = 6;
         - $$$$dyn = 6;



Note:
     assignments via ternary operator are not handled.



Nested elements can also be found with nestedMode enabled (disabled by default).
This happens only if a variable instantiation contains other variables instantiation, like in the following example:

         $o = function(){
                $p = 4;
              };



Variables instantiation inside class are not parsed by default.
Set the skipClass flag to false (true by default) to override this behaviour.

         class DOO{
                protected $do = 6;

                 public function __construct(){
                     $this->do = 7;
                     $p = 8;
                 }
         }



     Personal note:
             This class is not designed to parse variables from a class, instead, you should create another
             more specialized class if that's what you are looking for.



Variables instantiation inside regular (not assigned to a variable) function are not parsed by default.
Set the skipFunction flag to false (true by default) to override this behaviour.

         function poo(){
             $x = 5;
         }




Variables inside for loops conditions are skipped by default.
Set the skipForLoopCondition flag to false (true by default) to override this behaviour.

         for( $i=0; $i <= 10; $i++ ){
             // do something
         }



Variables inside statements-group of control structure are parsed by default.
Set the skipControlStructure flag to true (false by default) to override this behaviour.

             if(true){
                 $o = 6;
             }

             while(true){
                 $o = 6;
             }

             switch ($o){
                 case "pou":
                     $p = 9;
                 break;
             }

             foreach($doom as $do){
                 $p = 8;
             }

             for($i=0; $i<=10; $i++){
                 $p = 8;
             }

             ...



Array affectations are not parsed by default.
Set the allowArrayAffectation flag to true (false by default) to override this behaviour.


             $p["pou"] = 6;
             $p["pou"]["dii"] = 6;



By default, dynamic variables (on the left part of the equal symbol) are not parsed.
Set the allowDynamic flag to true (false by default) to override this behaviour.


             $$dyn = 6;
             $$$$$dyn = 6;



Class synopsis
==============


class <span class="pl-k">VariableAssignmentTokenFinder</span> extends [RecursiveTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder.md) implements [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) {

- Properties
    - protected bool [$skipClass](#property-skipClass) ;
    - protected bool [$skipFunction](#property-skipFunction) ;
    - protected bool [$skipForLoopCondition](#property-skipForLoopCondition) ;
    - protected bool [$skipControlStructure](#property-skipControlStructure) ;
    - protected bool [$allowArrayAffectation](#property-allowArrayAffectation) ;
    - protected bool [$allowDynamic](#property-allowDynamic) ;

- Inherited properties
    - protected bool [RecursiveTokenFinder::$nestedMode](#property-nestedMode) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/__construct.md)() : void
    - public [find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/find.md)(array $tokens) : array
    - public [isSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipClass.md)() : bool
    - public [setSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipClass.md)(bool $skipClass) : void
    - public [isSkipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipFunction.md)() : bool
    - public [setSkipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipFunction.md)(bool $skipFunction) : void
    - public [isSkipForLoopCondition](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipForLoopCondition.md)() : bool
    - public [setSkipForLoopCondition](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipForLoopCondition.md)(bool $skipForLoopCondition) : void
    - public [isSkipControlStructure](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipControlStructure.md)() : bool
    - public [setSkipControlStructure](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipControlStructure.md)(bool $skipControlStructure) : void
    - public [isAllowArrayAffectation](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isAllowArrayAffectation.md)() : bool
    - public [setAllowArrayAffectation](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setAllowArrayAffectation.md)(bool $allowArrayAffectation) : void
    - public [isAllowDynamic](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isAllowDynamic.md)() : bool
    - public [setAllowDynamic](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setAllowDynamic.md)(bool $allowDynamic) : void

- Inherited methods
    - public [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md)() : bool
    - public [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md)(bool $nestedMode) : void
    - protected [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md)($start, [Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void

}




Properties
=============

- <span id="property-skipClass"><b>skipClass</b></span>

    This property holds the skipClass for this instance.
    
    

- <span id="property-skipFunction"><b>skipFunction</b></span>

    This property holds the skipFunction for this instance.
    
    

- <span id="property-skipForLoopCondition"><b>skipForLoopCondition</b></span>

    This property holds the skipForLoopCondition for this instance.
    
    

- <span id="property-skipControlStructure"><b>skipControlStructure</b></span>

    This property holds the skipControlStructure for this instance.
    
    

- <span id="property-allowArrayAffectation"><b>allowArrayAffectation</b></span>

    This property holds the allowArrayAffectation for this instance.
    
    

- <span id="property-allowDynamic"><b>allowDynamic</b></span>

    This property holds the allowDynamic for this instance.
    
    

- <span id="property-nestedMode"><b>nestedMode</b></span>

    This property holds the nestedMode for this instance.
    
    



Methods
==============

- [VariableAssignmentTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/__construct.md) &ndash; Builds the VariableAssignmentTokenFinder instance.
- [VariableAssignmentTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/find.md) &ndash; Returns an array of match.
- [VariableAssignmentTokenFinder::isSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipClass.md) &ndash; Returns the skipClass of this instance.
- [VariableAssignmentTokenFinder::setSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipClass.md) &ndash; Sets the skipClass.
- [VariableAssignmentTokenFinder::isSkipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipFunction.md) &ndash; Returns the skipFunction of this instance.
- [VariableAssignmentTokenFinder::setSkipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipFunction.md) &ndash; Sets the skipFunction.
- [VariableAssignmentTokenFinder::isSkipForLoopCondition](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipForLoopCondition.md) &ndash; Returns the skipForLoopCondition of this instance.
- [VariableAssignmentTokenFinder::setSkipForLoopCondition](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipForLoopCondition.md) &ndash; Sets the skipForLoopCondition.
- [VariableAssignmentTokenFinder::isSkipControlStructure](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipControlStructure.md) &ndash; Returns the skipControlStructure of this instance.
- [VariableAssignmentTokenFinder::setSkipControlStructure](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipControlStructure.md) &ndash; Sets the skipControlStructure.
- [VariableAssignmentTokenFinder::isAllowArrayAffectation](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isAllowArrayAffectation.md) &ndash; Returns the allowArrayAffectation of this instance.
- [VariableAssignmentTokenFinder::setAllowArrayAffectation](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setAllowArrayAffectation.md) &ndash; Sets the allowArrayAffectation.
- [VariableAssignmentTokenFinder::isAllowDynamic](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isAllowDynamic.md) &ndash; Returns the allowDynamic of this instance.
- [VariableAssignmentTokenFinder::setAllowDynamic](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setAllowDynamic.md) &ndash; Sets the allowDynamic.
- [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
- [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; 
- [RecursiveTokenFinder::onMatchFound](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/onMatchFound.md) &ndash; Hook to do something when a match is found.





Location
=============
Ling\TokenFun\TokenFinder\VariableAssignmentTokenFinder<br>
See the source code of [Ling\TokenFun\TokenFinder\VariableAssignmentTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/VariableAssignmentTokenFinder.php)



SeeAlso
==============
Previous class: [UseStatementsTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/UseStatementsTokenFinder.md)<br>Next class: [TokenTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool.md)<br>
