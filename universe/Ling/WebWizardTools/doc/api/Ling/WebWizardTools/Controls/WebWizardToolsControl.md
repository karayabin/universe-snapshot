[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)



The WebWizardToolsControl class
================
2020-07-06 --> 2021-05-31






Introduction
============

The WebWizardToolsControl class.



Class synopsis
==============


class <span class="pl-k">WebWizardToolsControl</span>  {

- Properties
    - protected string [$name](#property-name) ;
    - protected string [$label](#property-label) ;
    - protected array [$validationRules](#property-validationRules) ;
    - protected string [$error](#property-error) ;
    - protected mixed [$value](#property-value) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/__construct.md)() : void
    - public [getName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getName.md)() : string
    - public [setName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setName.md)(string $name) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [getLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getLabel.md)() : string
    - public [setLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setLabel.md)(string $label) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [getValidationRules](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getValidationRules.md)() : array
    - public [setValidationRules](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setValidationRules.md)(array $validationRules) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [getError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getError.md)() : string
    - public [setError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setError.md)(string $error) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [getValue](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getValue.md)() : mixed
    - public [setValue](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setValue.md)($value) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)

}




Properties
=============

- <span id="property-name"><b>name</b></span>

    This property holds the name for this instance.
    
    

- <span id="property-label"><b>label</b></span>

    This property holds the label for this instance.
    
    

- <span id="property-validationRules"><b>validationRules</b></span>

    This property holds the validationRules for this instance.
    It's an array of name => callback.
    
    

- <span id="property-error"><b>error</b></span>

    This property holds the error for this instance.
    
    

- <span id="property-value"><b>value</b></span>

    This property holds the value for this instance.
    
    



Methods
==============

- [WebWizardToolsControl::__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/__construct.md) &ndash; Builds the WebWizardToolsControl instance.
- [WebWizardToolsControl::getName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getName.md) &ndash; Returns the name of this instance.
- [WebWizardToolsControl::setName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setName.md) &ndash; Sets the name.
- [WebWizardToolsControl::getLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getLabel.md) &ndash; Returns the label of this instance.
- [WebWizardToolsControl::setLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setLabel.md) &ndash; Sets the label.
- [WebWizardToolsControl::getValidationRules](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getValidationRules.md) &ndash; Returns the validationRules of this instance.
- [WebWizardToolsControl::setValidationRules](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setValidationRules.md) &ndash; Sets the validationRules.
- [WebWizardToolsControl::getError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getError.md) &ndash; Returns the error of this instance.
- [WebWizardToolsControl::setError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setError.md) &ndash; Sets the error.
- [WebWizardToolsControl::getValue](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getValue.md) &ndash; Returns the value of this instance.
- [WebWizardToolsControl::setValue](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setValue.md) &ndash; Sets the value.





Location
=============
Ling\WebWizardTools\Controls\WebWizardToolsControl<br>
See the source code of [Ling\WebWizardTools\Controls\WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/Controls/WebWizardToolsControl.php)



SeeAlso
==============
Next class: [WebWizardToolsOption](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOption.md)<br>
