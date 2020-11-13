[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The ServiceManagerUtil class
================
2020-06-30 --> 2020-09-18






Introduction
============

The ServiceManagerUtil class.



Class synopsis
==============


class <span class="pl-k">ServiceManagerUtil</span>  {

- Properties
    - protected string [$galaxy](#property-galaxy) ;
    - protected string [$planet](#property-planet) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\ClassCooker\ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) [$cooker](#property-cooker) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/__construct.md)() : void
    - public [setPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/setPlanet.md)(string $planet, ?string $galaxy = null) : void
    - public [setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [addMethod](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addMethod.md)(string $methodName, string $content) : void
    - public [addPropertyByTemplate](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addPropertyByTemplate.md)(string $propertyName, string $templateContent, ?array $options = []) : void
    - public [addUseStatements](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addUseStatements.md)($useStatements) : void
    - public [updatePropertyComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/updatePropertyComment.md)(string $propertyName, callable $fn, ?array $options = []) : void
    - public [getGalaxyName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getGalaxyName.md)() : string
    - public [getPlanetName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getPlanetName.md)() : string
    - public [getPlanetIdentifier](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getPlanetIdentifier.md)() : string
    - public [getServiceName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getServiceName.md)() : string
    - public [getBasicServiceClassPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBasicServiceClassPath.md)() : string
    - public [getBasicServiceExceptionPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBasicServiceExceptionPath.md)() : string
    - public [getBasicServiceConfigPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBasicServiceConfigPath.md)() : string
    - public [getCreateFilePath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getCreateFilePath.md)() : string
    - public [getTightPlanetName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getTightPlanetName.md)() : string
    - public [getHumanPlanetName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getHumanPlanetName.md)() : string
    - public [hasBasicServiceClassFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/hasBasicServiceClassFile.md)() : bool
    - public [hasBasicServiceExceptionFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/hasBasicServiceExceptionFile.md)() : bool
    - public [hasBasicServiceConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/hasBasicServiceConfigFile.md)() : bool
    - public [serviceHasMethod](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/serviceHasMethod.md)(string $methodName) : bool
    - public [serviceHasProperty](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/serviceHasProperty.md)(string $property) : bool
    - public [serviceHasUseStatement](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/serviceHasUseStatement.md)(string $useStatement) : bool
    - public [configHasOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasOption.md)(string $optionName) : bool
    - public [configHasHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasHook.md)(string $serviceName, ?array $options = []) : bool
    - public [configHasBannerComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasBannerComment.md)($bannerName) : bool
    - public [addConfigOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigOption.md)(string $name, $value, ?array $options = []) : void
    - public [addConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigHook.md)(string $serviceName, array $methodItem) : void
    - public [getCooker](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getCooker.md)() : [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)
    - private [error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/error.md)(string $msg) : void
    - private [getBannerContent](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBannerContent.md)(string $bannerName) : string
    - private [specialError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/specialError.md)(string $msg, string $msgType, ?$onError = null, ?[Ling\WebWizardTools\Process\WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) $process = null) : void

}




Properties
=============

- <span id="property-galaxy"><b>galaxy</b></span>

    This property holds the galaxy name for this instance.
    
    

- <span id="property-planet"><b>planet</b></span>

    This property holds the planet name for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-cooker"><b>cooker</b></span>

    This property holds the cooker for this instance.
    
    



Methods
==============

- [ServiceManagerUtil::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/__construct.md) &ndash; Builds the ServiceManagerUtil instance.
- [ServiceManagerUtil::setPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/setPlanet.md) &ndash; Sets the planet and galaxy for this instance.
- [ServiceManagerUtil::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/setContainer.md) &ndash; Sets the container.
- [ServiceManagerUtil::addMethod](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addMethod.md) &ndash; Adds a method to the service class, if it's not there already.
- [ServiceManagerUtil::addPropertyByTemplate](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addPropertyByTemplate.md) &ndash; Adds the given property to the service class, and optionally with its initialization and accessor methods.
- [ServiceManagerUtil::addUseStatements](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addUseStatements.md) &ndash; Adds the given use statement(s) to the service class, if it/they doesn't exist.
- [ServiceManagerUtil::updatePropertyComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/updatePropertyComment.md) &ndash; Proxy to the ClassCooker->updatePropertyComment method.
- [ServiceManagerUtil::getGalaxyName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getGalaxyName.md) &ndash; Returns the galaxy of this instance.
- [ServiceManagerUtil::getPlanetName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getPlanetName.md) &ndash; Returns the planet of this instance.
- [ServiceManagerUtil::getPlanetIdentifier](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getPlanetIdentifier.md) &ndash; Returns the [planet identifier](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#planet-identifier).
- [ServiceManagerUtil::getServiceName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getServiceName.md) &ndash; Returns the service name.
- [ServiceManagerUtil::getBasicServiceClassPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBasicServiceClassPath.md) &ndash; Returns the absolute path to the [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) class path.
- [ServiceManagerUtil::getBasicServiceExceptionPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBasicServiceExceptionPath.md) &ndash; Returns the absolute path to the [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) exception path.
- [ServiceManagerUtil::getBasicServiceConfigPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBasicServiceConfigPath.md) &ndash; Returns the absolute path to the [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) config path.
- [ServiceManagerUtil::getCreateFilePath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getCreateFilePath.md) &ndash; Returns the path to the create file for this service.
- [ServiceManagerUtil::getTightPlanetName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getTightPlanetName.md) &ndash; Returns the [tight planet name](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name).
- [ServiceManagerUtil::getHumanPlanetName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getHumanPlanetName.md) &ndash; Returns a human version of the planet name.
- [ServiceManagerUtil::hasBasicServiceClassFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/hasBasicServiceClassFile.md) &ndash; Returns whether there is a [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) class file for the planet.
- [ServiceManagerUtil::hasBasicServiceExceptionFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/hasBasicServiceExceptionFile.md) &ndash; Returns whether there is a [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) exception file for the planet.
- [ServiceManagerUtil::hasBasicServiceConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/hasBasicServiceConfigFile.md) &ndash; Returns whether there is a [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) config file for the planet.
- [ServiceManagerUtil::serviceHasMethod](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/serviceHasMethod.md) &ndash; Returns whether the service class has the given method.
- [ServiceManagerUtil::serviceHasProperty](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/serviceHasProperty.md) &ndash; Returns whether the service class has the given property.
- [ServiceManagerUtil::serviceHasUseStatement](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/serviceHasUseStatement.md) &ndash; Returns whether the service class has the given use statement.
- [ServiceManagerUtil::configHasOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasOption.md) &ndash; Returns whether the service config file has an option of the given name defined with the setOptions method.
- [ServiceManagerUtil::configHasHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasHook.md) &ndash; Returns whether the service config has a hook to the given service.
- [ServiceManagerUtil::configHasBannerComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasBannerComment.md) &ndash; Returns whether the service config file contains the banner comment which name is given.
- [ServiceManagerUtil::addConfigOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigOption.md) &ndash; Adds the option with the given name and value to the "setOptions" method in the service configuration file.
- [ServiceManagerUtil::addConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigHook.md) &ndash; Adds a hook to the given service name, with the given methodItem.
- [ServiceManagerUtil::getCooker](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getCooker.md) &ndash; Returns a cooker instance.
- [ServiceManagerUtil::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/error.md) &ndash; Throws an exception.
- [ServiceManagerUtil::getBannerContent](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getBannerContent.md) &ndash; Returns a banner comment.
- [ServiceManagerUtil::specialError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/specialError.md) &ndash; Do something with the given error.





Location
=============
Ling\Light_DeveloperWizard\Util\ServiceManagerUtil<br>
See the source code of [Ling\Light_DeveloperWizard\Util\ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Util/ServiceManagerUtil.php)



SeeAlso
==============
Previous class: [DeveloperWizardFileTool](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool.md)<br>Next class: [AddStandardPermissionsProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Database/AddStandardPermissionsProcess.md)<br>
