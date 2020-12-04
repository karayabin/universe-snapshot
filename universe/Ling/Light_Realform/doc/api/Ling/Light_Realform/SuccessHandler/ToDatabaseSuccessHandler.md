[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The ToDatabaseSuccessHandler class
================
2019-10-21 --> 2020-12-01






Introduction
============

The ToDatabaseSuccessHandler class.

This success handler will save the data to a database table, which you define before hand.

We use the [crud service](https://github.com/lingtalfi/Light_Crud) under the hood, so that the app can benefit the events hooks.

This class has two operation modes:

- insert (default), will (try to) create a new row
- update, will (try to) update an already existing row

To use the update mode, you need to provide the updateRic with the options (see the processData method for more info).
The updateRic is an array of key/value pairs representing the ric identifying the (old) row to update.


As a design choice, this class doesn't handle permission problem: I believe it's better to handle the permission
problems separately.


This handler can handle [the form multiplier pattern](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md).



Class synopsis
==============


class <span class="pl-k">ToDatabaseSuccessHandler</span> implements [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [execute](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/execute.md)(array $data, ?array $options = []) : mixed
    - private [error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [ToDatabaseSuccessHandler::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md) &ndash; Builds the ToDatabaseSuccessHandler instance.
- [ToDatabaseSuccessHandler::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md) &ndash; Sets the light service container interface.
- [ToDatabaseSuccessHandler::execute](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/execute.md) &ndash; Process the given data, and throws an exception if something unexpected happens.
- [ToDatabaseSuccessHandler::error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler<br>
See the source code of [Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/SuccessHandler/ToDatabaseSuccessHandler.php)



SeeAlso
==============
Previous class: [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)<br>Next class: [DatabaseUpdateEntryChecker](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/UpdateEntryChecker/DatabaseUpdateEntryChecker.md)<br>
