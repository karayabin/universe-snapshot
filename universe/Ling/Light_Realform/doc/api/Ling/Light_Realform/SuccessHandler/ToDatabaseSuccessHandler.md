[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The ToDatabaseSuccessHandler class
================
2019-10-21 --> 2020-02-28






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


class <span class="pl-k">ToDatabaseSuccessHandler</span> implements [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md) {

- Properties
    - protected string [$table](#property-table) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$pluginName](#property-pluginName) ;
    - protected array [$multiplier](#property-multiplier) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md)() : void
    - public [processData](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/processData.md)(array $data, ?array $options = []) : mixed
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTable](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setTable.md)(string $table) : void
    - public [setPluginName](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setPluginName.md)(string $pluginName) : void
    - public [setMultiplier](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setMultiplier.md)(array $multiplier) : void

}




Properties
=============

- <span id="property-table"><b>table</b></span>

    This property holds the table in which the data will be saved.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-pluginName"><b>pluginName</b></span>

    This property holds the pluginName for this instance.
    It's the name of the plugin used as a handler for the crud service.
    
    

- <span id="property-multiplier"><b>multiplier</b></span>

    This property holds the multiplier array for this instance.
    See more details in [the form multiplier trick document](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md).
    
    



Methods
==============

- [ToDatabaseSuccessHandler::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md) &ndash; Builds the ToDatabaseSuccessHandler instance.
- [ToDatabaseSuccessHandler::processData](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/processData.md) &ndash; - ?updateRic: the array of key => value pairs representing the row to update (i.e.
- [ToDatabaseSuccessHandler::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md) &ndash; Sets the container.
- [ToDatabaseSuccessHandler::setTable](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setTable.md) &ndash; Sets the table.
- [ToDatabaseSuccessHandler::setPluginName](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setPluginName.md) &ndash; Sets the pluginName.
- [ToDatabaseSuccessHandler::setMultiplier](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setMultiplier.md) &ndash; Sets the multiplier.





Location
=============
Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler<br>
See the source code of [Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/SuccessHandler/ToDatabaseSuccessHandler.php)



SeeAlso
==============
Previous class: [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)<br>
