Ling/Light_Bullsheet
================
2019-08-14 --> 2020-12-08




Table of contents
===========

- [LightAbstractBullsheeter](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter.md) &ndash; The LightAbstractBullsheeter interface.
    - [LightAbstractBullsheeter::__construct](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter/__construct.md) &ndash; Builds the LightAbstractBullsheeter instance.
    - [LightAbstractBullsheeter::setContainer](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter/setContainer.md) &ndash; Sets the light service container interface.
    - [LightBullsheeterInterface::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface/generateRows.md) &ndash; Populates the database with $nbRows random rows in the appropriate table(s).
- [LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md) &ndash; The LightBullsheeterInterface interface.
    - [LightBullsheeterInterface::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface/generateRows.md) &ndash; Populates the database with $nbRows random rows in the appropriate table(s).
- [LightBullsheeterException](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Exception/LightBullsheeterException.md) &ndash; The LightBullsheeterException class.
- [LightBullsheetService](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService.md) &ndash; The LightBullsheetService class.
    - [LightBullsheetService::__construct](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/__construct.md) &ndash; Builds the LightBullsheetService instance.
    - [LightBullsheetService::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/generateRows.md) &ndash; populate its table(s) with $nbRows random rows.
    - [LightBullsheetService::registerBullsheeter](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/registerBullsheeter.md) &ndash; Registers a bullsheeter to this instance.
    - [LightBullsheetService::setContainer](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/setContainer.md) &ndash; Sets the container.
    - [LightBullsheetService::setSilentMode](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/setSilentMode.md) &ndash; Sets the silentMode.
    - [LightBullsheetService::getLastErrors](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/getLastErrors.md) &ndash; Returns the array of errors collected during the last call to the generateRows method.
    - [LightBullsheetService::countLastErrors](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Service/LightBullsheetService/countLastErrors.md) &ndash; Returns the errorCount of this instance.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Bat](https://github.com/lingtalfi/Bat)


