[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)



The ColdServiceResolver class
================
2019-04-25 --> 2021-03-05






Introduction
============

The ColdServiceResolver class helps creating a cold (aka static) service container: a service container
which contains methods based on the sic notation.



Note: the callable feature of the sic notation is not used (because services are not callables but instances).



Class synopsis
==============


class <span class="pl-k">ColdServiceResolver</span>  {

- Properties
    - private string [$passKey](#property-passKey) ;
    - private string [$baseVariableName](#property-baseVariableName) ;
    - private int [$cpt](#property-cpt) ;
    - private array [$stack](#property-stack) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/__construct.md)() : void
    - public [getServicePhpCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getServicePhpCode.md)(array $sicBlock) : false | string
    - protected [addServiceCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addServiceCode.md)(array $sicBlock) : string
    - protected [resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveCustomNotation.md)($value, ?$isCustomNotation = false) : mixed
    - protected [addCodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addCodeBlock.md)([Ling\SicTools\CodeBlock\CodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock.md) $codeBlock) : void
    - protected [encode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/encode.md)($expression) : string
    - protected [decode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/decode.md)(string $expression) : string
    - protected [getUniqueVariableName](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getUniqueVariableName.md)() : void
    - private [resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveArgs.md)(array $args) : array
    - private [argsToString](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/argsToString.md)(array $realArgs) : string | array | null

}




Properties
=============

- <span id="property-passKey"><b>passKey</b></span>

    This property holds the pass key.
    See sic notation for more info.
    
    

- <span id="property-baseVariableName"><b>baseVariableName</b></span>

    Sets the base variable name, which is used to create the service's references inside the code.
    
    

- <span id="property-cpt"><b>cpt</b></span>

    An auto-incremented number appended to the baseVariableName property to give the actual unique variable name
    used in the code.
    
    

- <span id="property-stack"><b>stack</b></span>

    The stack contains all the code blocks.
    Each code block basically encapsulates the service code.
    
    Using a stack/code block system allows us to manage dependencies (service1 using service2) more easily.
    
    



Methods
==============

- [ColdServiceResolver::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/__construct.md) &ndash; Builds the ColdServiceResolver instance.
- [ColdServiceResolver::getServicePhpCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getServicePhpCode.md) &ndash; Returns the php code (based on the given sic block) to put in the body of your service container's method.
- [ColdServiceResolver::addServiceCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addServiceCode.md) &ndash; and adds it to the stack.
- [ColdServiceResolver::resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveCustomNotation.md) &ndash; Parses the given value as a custom notation and returns the interpreted result.
- [ColdServiceResolver::addCodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addCodeBlock.md) &ndash; Adds a code block to the stack.
- [ColdServiceResolver::encode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/encode.md) &ndash; Encodes an expression to be interpreted as raw php.
- [ColdServiceResolver::decode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/decode.md) &ndash; Decodes the encoded expression and returns the result.
- [ColdServiceResolver::getUniqueVariableName](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getUniqueVariableName.md) &ndash; Returns a unique variable name, based on the baseVariableName.
- [ColdServiceResolver::resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveArgs.md) &ndash; Returns the given $args array, but with services resolved recursively (based on the sic notation).
- [ColdServiceResolver::argsToString](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/argsToString.md) &ndash; Returns the "inline php code" version of the passed array of arguments.





Location
=============
Ling\SicTools\ColdServiceResolver<br>
See the source code of [Ling\SicTools\ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/ColdServiceResolver.php)



SeeAlso
==============
Previous class: [CodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock.md)<br>Next class: [SicBlockWillNotResolveException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicBlockWillNotResolveException.md)<br>
