[Back to the Ling/Light_JimToolbox api](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox.md)



The LightJimToolboxService class
================
2021-07-08 --> 2021-07-27






Introduction
============

The LightJimToolboxService class.



Class synopsis
==============


class <span class="pl-k">LightJimToolboxService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void
    - public [getJimToolboxItems](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItems.md)(?array $options = []) : array
    - public [getTemplatePath](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getTemplatePath.md)(?string $name = null) : string
    - public [getTemplateFlavours](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getTemplateFlavours.md)() : array
    - public [getJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItem.md)(string $key) : array | false
    - public [registerJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/registerJimToolboxItem.md)(string $key, array $item) : void
    - public [unregisterJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/unregisterJimToolboxItem.md)(string $key) : bool
    - private [error](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/error.md)(string $msg) : void
    - private [getJimToolboxItemsFile](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItemsFile.md)() : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_JimToolbox conception notes](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightJimToolboxService::__construct](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/__construct.md) &ndash; Builds the LightJimToolboxService instance.
- [LightJimToolboxService::setContainer](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setContainer.md) &ndash; Sets the container.
- [LightJimToolboxService::setOptions](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setOptions.md) &ndash; Sets the options.
- [LightJimToolboxService::getOption](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getOption.md) &ndash; Returns the option value corresponding to the given key.
- [LightJimToolboxService::getJimToolboxItems](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItems.md) &ndash; Returns the array of jim toolbox items.
- [LightJimToolboxService::getTemplatePath](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getTemplatePath.md) &ndash; Returns the location of our default template.
- [LightJimToolboxService::getTemplateFlavours](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getTemplateFlavours.md) &ndash; Returns an array of the template names (to use with the getTemplatePath method) available to the user.
- [LightJimToolboxService::getJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItem.md) &ndash; Returns the information about the jimtoolbox item identified by the given key, or false otherwise.
- [LightJimToolboxService::registerJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/registerJimToolboxItem.md) &ndash; Registers a jim toolbox item.
- [LightJimToolboxService::unregisterJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/unregisterJimToolboxItem.md) &ndash; Unregisters a jim toolbox item, and returns whether the given key was actually registered.
- [LightJimToolboxService::error](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/error.md) &ndash; Throws an exception.
- [LightJimToolboxService::getJimToolboxItemsFile](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItemsFile.md) &ndash; Returns the path to the jim toolbox items file.





Location
=============
Ling\Light_JimToolbox\Service\LightJimToolboxService<br>
See the source code of [Ling\Light_JimToolbox\Service\LightJimToolboxService](https://github.com/lingtalfi/Light_JimToolbox/blob/master/Service/LightJimToolboxService.php)



SeeAlso
==============
Previous class: [JimToolboxItemHandlerInterface](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md)<br>
