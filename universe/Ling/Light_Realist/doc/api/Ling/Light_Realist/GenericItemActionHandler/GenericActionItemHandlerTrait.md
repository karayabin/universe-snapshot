[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The GenericActionItemHandlerTrait trait
================
2019-08-12 --> 2021-05-31






Introduction
============

Trait GenericActionItemHandlerTrait



Trait synopsis
==============


trait <span class="pl-k">GenericActionItemHandlerTrait</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$csrfTokenPrefix](#property-csrfTokenPrefix) ;
    - protected string [$pluginName](#property-pluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/decorateGenericActionItemByAssets.md)(string $actionName, array &$item, string $dir, ?array $options = []) : void
    - protected [getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getTableNameByRequestId.md)(string $requestId) : string
    - protected [getPlanetIdByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getPlanetIdByRequestId.md)(string $requestId) : string
    - protected [hasMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/hasMicroPermission.md)(string $microPermission) : bool
    - protected [checkMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/checkMicroPermission.md)(string $microPermission) : void
    - protected [getPluginName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getPluginName.md)() : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-csrfTokenPrefix"><b>csrfTokenPrefix</b></span>

    This property holds the csrfTokenPrefix for this instance.
    The csrf token prefix to use when csrf tokens needs to be created.
    
    

- <span id="property-pluginName"><b>pluginName</b></span>

    This property holds the pluginName for this instance.
    
    



Methods
==============

- [GenericActionItemHandlerTrait::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/__construct.md) &ndash; Builds the LightRealistBaseListActionHandler instance.
- [GenericActionItemHandlerTrait::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/setContainer.md) &ndash; Sets the container.
- [GenericActionItemHandlerTrait::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/decorateGenericActionItemByAssets.md) &ndash; the calling class source file.
- [GenericActionItemHandlerTrait::getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getTableNameByRequestId.md) &ndash; Returns the table name associated with the given requestId.
- [GenericActionItemHandlerTrait::getPlanetIdByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getPlanetIdByRequestId.md) &ndash; Returns the planetId name associated with the given requestId.
- [GenericActionItemHandlerTrait::hasMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/hasMicroPermission.md) &ndash; Returns whether the current user is granted the given micro-permission.
- [GenericActionItemHandlerTrait::checkMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/checkMicroPermission.md) &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- [GenericActionItemHandlerTrait::getPluginName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getPluginName.md) &ndash; Returns the plugin name for this instance.





Location
=============
Ling\Light_Realist\GenericItemActionHandler\GenericActionItemHandlerTrait<br>
See the source code of [Ling\Light_Realist\GenericItemActionHandler\GenericActionItemHandlerTrait](https://github.com/lingtalfi/Light_Realist/blob/master/GenericItemActionHandler/GenericActionItemHandlerTrait.php)



SeeAlso
==============
Previous class: [LightRealistException](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Exception/LightRealistException.md)<br>Next class: [DuelistHelper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/DuelistHelper.md)<br>
