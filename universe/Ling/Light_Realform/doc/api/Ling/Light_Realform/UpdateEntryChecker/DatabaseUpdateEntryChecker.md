[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The DatabaseUpdateEntryChecker class
================
2019-10-21 --> 2021-05-31






Introduction
============

The DatabaseUpdateEntryChecker class.



Class synopsis
==============


class <span class="pl-k">DatabaseUpdateEntryChecker</span> implements [LightNuggetSecurityHandlerInterface](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/SecurityHandler/LightNuggetSecurityHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [isGranted](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/isGranted.md)(?array $params = []) : bool
    - private [error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [DatabaseUpdateEntryChecker::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/__construct.md) &ndash; Builds the DatabaseUpdateEntryChecker instance.
- [DatabaseUpdateEntryChecker::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/setContainer.md) &ndash; Sets the light service container interface.
- [DatabaseUpdateEntryChecker::isGranted](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/isGranted.md) &ndash; Returns whether the current user is granted an action defined the given parameters.
- [DatabaseUpdateEntryChecker::error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Realform\UpdateEntryChecker\DatabaseUpdateEntryChecker<br>
See the source code of [Ling\Light_Realform\UpdateEntryChecker\DatabaseUpdateEntryChecker](https://github.com/lingtalfi/Light_Realform/blob/master/UpdateEntryChecker/DatabaseUpdateEntryChecker.php)



SeeAlso
==============
Previous class: [ToDatabaseSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler.md)<br>
