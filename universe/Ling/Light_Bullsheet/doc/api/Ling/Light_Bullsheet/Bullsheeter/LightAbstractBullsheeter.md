[Back to the Ling/Light_Bullsheet api](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet.md)



The LightAbstractBullsheeter class
================
2019-08-14 --> 2021-03-05






Introduction
============

The LightAbstractBullsheeter interface.



Class synopsis
==============


abstract class <span class="pl-k">LightAbstractBullsheeter</span> implements [LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - abstract public [LightBullsheeterInterface::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface/generateRows.md)(int $nbRows, ?array $options = []) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightAbstractBullsheeter::__construct](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter/__construct.md) &ndash; Builds the LightAbstractBullsheeter instance.
- [LightAbstractBullsheeter::setContainer](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter/setContainer.md) &ndash; Sets the light service container interface.
- [LightBullsheeterInterface::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface/generateRows.md) &ndash; Populates the database with $nbRows random rows in the appropriate table(s).





Location
=============
Ling\Light_Bullsheet\Bullsheeter\LightAbstractBullsheeter<br>
See the source code of [Ling\Light_Bullsheet\Bullsheeter\LightAbstractBullsheeter](https://github.com/lingtalfi/Light_Bullsheet/blob/master/Bullsheeter/LightAbstractBullsheeter.php)



SeeAlso
==============
Next class: [LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md)<br>
