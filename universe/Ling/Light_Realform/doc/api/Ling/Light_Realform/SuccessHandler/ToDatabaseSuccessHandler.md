[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The ToDatabaseSuccessHandler class
================
2019-10-21 --> 2019-11-01






Introduction
============

The ToDatabaseSuccessHandler class.

This success handler will save the data to a database table, which you define before hand.

This class has two operation modes:

- insert (default), will (try to) create a new row
- update, will (try to) update an already existing row

To use the update mode, you need to provide the updateRic with the options (see the processData method for more info).
The updateRic is an array of key/value pairs representing the ric identifying the (old) row to update.


As a design choice, this class doesn't handle permission problem: I believe it's better to handle the permission
problems separately.



Class synopsis
==============


class <span class="pl-k">ToDatabaseSuccessHandler</span> implements [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md) {

- Properties
    - protected string [$table](#property-table) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string|null [$microPermissionPluginName](#property-microPermissionPluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md)() : void
    - public [processData](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/processData.md)(array $data, ?array $options = []) : mixed
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTable](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setTable.md)(string $table) : void
    - public [setMicroPermissionPluginName](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setMicroPermissionPluginName.md)(string $microPermissionPluginName) : void
    - protected [checkMicroPermission](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/checkMicroPermission.md)(string $microPermission) : void

}




Properties
=============

- <span id="property-table"><b>table</b></span>

    This property holds the table in which the data will be saved.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-microPermissionPluginName"><b>microPermissionPluginName</b></span>

    This property holds the microPermissionPluginName for this instance.
    If null (by default), the micro permission system will not be used.
    If set to a plugin name, the micro permission system will be using that plugin name.
    We use the [recommended micro-permission notation for database](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md).
    
    



Methods
==============

- [ToDatabaseSuccessHandler::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md) &ndash; Builds the ToDatabaseSuccessHandler instance.
- [ToDatabaseSuccessHandler::processData](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/processData.md) &ndash; - ?updateRic: the array of key => value pairs representing the row to update (i.e.
- [ToDatabaseSuccessHandler::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md) &ndash; Sets the container.
- [ToDatabaseSuccessHandler::setTable](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setTable.md) &ndash; Sets the table.
- [ToDatabaseSuccessHandler::setMicroPermissionPluginName](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setMicroPermissionPluginName.md) &ndash; Sets the microPermissionPluginName.
- [ToDatabaseSuccessHandler::checkMicroPermission](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/checkMicroPermission.md) &ndash; Ensures that the current user has the given micro-permission.





Location
=============
Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler<br>
See the source code of [Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/SuccessHandler/ToDatabaseSuccessHandler.php)



SeeAlso
==============
Previous class: [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)<br>
