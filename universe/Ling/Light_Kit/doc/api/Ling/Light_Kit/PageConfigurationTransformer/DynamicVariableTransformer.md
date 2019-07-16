[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The DynamicVariableTransformer class
================
2019-04-25 --> 2019-07-15






Introduction
============

The DynamicVariableTransformer class.



Class synopsis
==============


class <span class="pl-k">DynamicVariableTransformer</span> implements [PageConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/PageConfigurationTransformerInterface.md), [DynamicVariableAwareInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableAwareInterface.md) {

- Properties
    - protected string [$firstSymbol](#property-firstSymbol) ;
    - protected string [$openingBracket](#property-openingBracket) ;
    - protected string [$closingBracket](#property-closingBracket) ;
    - protected [Ling\ArrayVariableResolver\ArrayVariableResolverUtil](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil.md) [$resolver](#property-resolver) ;
    - protected array [$variables](#property-variables) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/__construct.md)() : void
    - public [setFirstSymbol](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setFirstSymbol.md)(string $firstSymbol) : void
    - public [setOpeningBracket](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setOpeningBracket.md)(string $openingBracket) : void
    - public [setClosingBracket](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setClosingBracket.md)(string $closingBracket) : void
    - public [setVariables](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setVariables.md)(array $variables) : void
    - public [transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/transform.md)(array &$pageConfiguration) : void

}




Properties
=============

- <span id="property-firstSymbol"><b>firstSymbol</b></span>

    This property holds the firstSymbol for this instance.
    
    

- <span id="property-openingBracket"><b>openingBracket</b></span>

    This property holds the openingBracket for this instance.
    
    

- <span id="property-closingBracket"><b>closingBracket</b></span>

    This property holds the closingBracket for this instance.
    
    

- <span id="property-resolver"><b>resolver</b></span>

    This property holds the resolver for this instance.
    
    

- <span id="property-variables"><b>variables</b></span>

    This property holds the dynamic variables for this instance.
    
    



Methods
==============

- [DynamicVariableTransformer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/__construct.md) &ndash; Builds the DynamicVariableTransformer instance.
- [DynamicVariableTransformer::setFirstSymbol](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setFirstSymbol.md) &ndash; Sets the firstSymbol.
- [DynamicVariableTransformer::setOpeningBracket](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setOpeningBracket.md) &ndash; Sets the openingBracket.
- [DynamicVariableTransformer::setClosingBracket](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setClosingBracket.md) &ndash; Sets the closingBracket.
- [DynamicVariableTransformer::setVariables](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/setVariables.md) &ndash; Sets the dynamic variables into the instance.
- [DynamicVariableTransformer::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableTransformer/transform.md) &ndash; Transforms the given page configuration array in place.





Location
=============
Ling\Light_Kit\PageConfigurationTransformer\DynamicVariableTransformer


SeeAlso
==============
Previous class: [DynamicVariableAwareInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/DynamicVariableAwareInterface.md)<br>Next class: [MethodCallResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md)<br>
