[Back to the Ling/Light_Bullsheet api](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet.md)



The LightBullsheetService class
================
2019-08-14 --> 2019-08-14






Introduction
============

The LightBullsheetService class.



Class synopsis
==============


class <span class="pl-k">LightBullsheetService</span>  {

- Properties
    - protected [Ling\Light_Bullsheet\Bullsheeter\LightBullsheeterInterface[]](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md) [$bullsheeters](#property-bullsheeters) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected bool [$silentMode](#property-silentMode) ;
    - protected array [$errors](#property-errors) ;
    - protected int [$errorCount](#property-errorCount) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/__construct.md)() : void
    - public [generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/generateRows.md)(string $identifier, int $nbRows = 50) : void
    - public [registerBullsheeter](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/registerBullsheeter.md)(string $identifier, [Ling\Light_Bullsheet\Bullsheeter\LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md) $bullsheeter) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setSilentMode](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/setSilentMode.md)(bool $silentMode) : void
    - public [getLastErrors](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/getLastErrors.md)() : array
    - public [countLastErrors](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/countLastErrors.md)() : int

}




Properties
=============

- <span id="property-bullsheeters"><b>bullsheeters</b></span>

    This property holds the bullsheeters for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-silentMode"><b>silentMode</b></span>

    This property holds the silentMode for this instance.
    Whether to ignore the bullsheeters errors, or to throw an exception when this happen.
    
    When the silent mode is activated, you can retrieve the errors using the getLastErrors method,
    and/or the countLastErrors method.
    
    

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    Array of "bullsheeter short class name" -> array of errors for this bullsheeter
    This array is re-initialized every time the generateRows method is called.
    
    

- <span id="property-errorCount"><b>errorCount</b></span>

    This property holds the errorCount for this instance.
    This is re-initialized every time the generateRows method is called.
    
    



Methods
==============

- [LightBullsheetService::__construct](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/__construct.md) &ndash; Builds the LightBullsheetService instance.
- [LightBullsheetService::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/generateRows.md) &ndash; populate its table(s) with $nbRows random rows.
- [LightBullsheetService::registerBullsheeter](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/registerBullsheeter.md) &ndash; Registers a bullsheeter to this instance.
- [LightBullsheetService::setContainer](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/setContainer.md) &ndash; Sets the container.
- [LightBullsheetService::setSilentMode](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/setSilentMode.md) &ndash; Sets the silentMode.
- [LightBullsheetService::getLastErrors](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/getLastErrors.md) &ndash; Returns the array of errors collected during the last call to the generateRows method.
- [LightBullsheetService::countLastErrors](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/countLastErrors.md) &ndash; Returns the errorCount of this instance.





Location
=============
Ling\Light_Bullsheet\Service\LightBullsheetService<br>
See the source code of [Ling\Light_Bullsheet\Service\LightBullsheetService](https://github.com/lingtalfi/Light_Bullsheet/blob/master/Service/LightBullsheetService.php)



SeeAlso
==============
Previous class: [LightBullsheeterException](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Exception/LightBullsheeterException.md)<br>
