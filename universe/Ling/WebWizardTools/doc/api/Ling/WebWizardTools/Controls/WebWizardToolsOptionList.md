[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)



The WebWizardToolsOptionList class
================
2020-07-06 --> 2020-07-09






Introduction
============

The WebWizardToolsOptionList class.



Class synopsis
==============


class <span class="pl-k">WebWizardToolsOptionList</span> extends [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)  {

- Properties
    - protected [Ling\WebWizardTools\Controls\WebWizardToolsOption[]](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOption.md) [$options](#property-options) ;

- Inherited properties
    - protected string [WebWizardToolsControl::$name](#property-name) ;
    - protected string [WebWizardToolsControl::$label](#property-label) ;
    - protected array [WebWizardToolsControl::$validationRules](#property-validationRules) ;
    - protected string [WebWizardToolsControl::$error](#property-error) ;
    - protected mixed [WebWizardToolsControl::$value](#property-value) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/__construct.md)() : void
    - public static [inst](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/inst.md)() : [WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md)
    - public [setOption](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/setOption.md)([Ling\WebWizardTools\Controls\WebWizardToolsOption](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOption.md) $option) : [WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md)
    - public [setOptionStatus](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/setOptionStatus.md)(string $id, bool $isChecked) : void
    - public [getOptions](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/getOptions.md)() : array

- Inherited methods
    - public [WebWizardToolsControl::getName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getName.md)() : string
    - public [WebWizardToolsControl::setName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setName.md)(string $name) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [WebWizardToolsControl::getLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getLabel.md)() : string
    - public [WebWizardToolsControl::setLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setLabel.md)(string $label) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [WebWizardToolsControl::getValidationRules](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getValidationRules.md)() : array
    - public [WebWizardToolsControl::setValidationRules](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setValidationRules.md)(array $validationRules) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [WebWizardToolsControl::getError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getError.md)() : string
    - public [WebWizardToolsControl::setError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setError.md)(string $error) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [WebWizardToolsControl::getValue](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/getValue.md)() : mixed
    - public [WebWizardToolsControl::setValue](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl/setValue.md)($value) : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)

}




Properties
=============

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    It's an array of id => optionInstance.
    
    

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

- [WebWizardToolsOptionList::__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/__construct.md) &ndash; Builds the WebWizardToolsOptionList instance.
- [WebWizardToolsOptionList::inst](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/inst.md) &ndash; Returns a new instance of this class.
- [WebWizardToolsOptionList::setOption](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/setOption.md) &ndash; Adds an option to the list, and returns the optionList instance.
- [WebWizardToolsOptionList::setOptionStatus](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/setOptionStatus.md) &ndash; Sets an option's checked status to either true or false.
- [WebWizardToolsOptionList::getOptions](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList/getOptions.md) &ndash; Returns the options of this instance.
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
Ling\WebWizardTools\Controls\WebWizardToolsOptionList<br>
See the source code of [Ling\WebWizardTools\Controls\WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/Controls/WebWizardToolsOptionList.php)



SeeAlso
==============
Previous class: [WebWizardToolsOption](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOption.md)<br>Next class: [WebWizardToolsException](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Exception/WebWizardToolsException.md)<br>
