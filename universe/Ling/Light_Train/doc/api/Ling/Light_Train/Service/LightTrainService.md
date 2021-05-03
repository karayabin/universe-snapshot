[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)



The LightTrainService class
================
2021-02-01 --> 2021-03-15






Introduction
============

The LightTrainService class.



Class synopsis
==============


class <span class="pl-k">LightTrainService</span> extends LightLingStandardService01 implements PluginInstallerInterface {

- Properties
    - protected Ling\Light\ServiceContainer\LightServiceContainerInterface [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_Train\Api\Custom\CustomLightTrainApiFactory](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/CustomLightTrainApiFactory.md) [$factory](#property-factory) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/setContainer.md)(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/setOptions.md)(array $options) : void
    - public [getFactory](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/getFactory.md)() : [CustomLightTrainApiFactory](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/CustomLightTrainApiFactory.md)

- Inherited methods
    - public LightLingStandardService01::install() : void
    - public LightLingStandardService01::isInstalled() : bool
    - public LightLingStandardService01::uninstall() : void
    - public LightLingStandardService01::getDependencies() : array
    - public LightLingStandardService01::logDebug($msg) : void
    - protected LightLingStandardService01::error(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_Train conception notes](https://github.com/lingtalfi/Light_Train/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    



Methods
==============

- [LightTrainService::__construct](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/__construct.md) &ndash; Builds the LightTrainService instance.
- [LightTrainService::setContainer](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/setContainer.md) &ndash; Sets the container.
- [LightTrainService::setOptions](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/setOptions.md) &ndash; Sets the options.
- [LightTrainService::getFactory](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- LightLingStandardService01::install &ndash; Installs the plugin in the light application.
- LightLingStandardService01::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
- LightLingStandardService01::uninstall &ndash; Uninstalls the plugin.
- LightLingStandardService01::getDependencies &ndash; Returns the array of dependencies.
- LightLingStandardService01::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- LightLingStandardService01::error &ndash; Throws an exception.





Location
=============
Ling\Light_Train\Service\LightTrainService<br>
See the source code of [Ling\Light_Train\Service\LightTrainService](https://github.com/lingtalfi/Light_Train/blob/master/Service/LightTrainService.php)



SeeAlso
==============
Previous class: [LightTrainPluginInstaller](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Light_PluginInstaller/LightTrainPluginInstaller.md)<br>Next class: [TestClass](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/TestClass.md)<br>
