[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The LightDeveloperWizardService class
================
2020-06-30 --> 2020-12-03






Introduction
============

The LightDeveloperWizardService class.



Class synopsis
==============


class <span class="pl-k">LightDeveloperWizardService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light_DeveloperWizard\Util\serviceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/serviceManagerUtil.md) [$serviceManagerUtil](#property-serviceManagerUtil) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setOptions.md)(array $options) : void
    - public [setOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setOption.md)(string $key, $value) : void
    - public [getServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/getServiceManagerUtil.md)() : [ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/ServiceManagerUtil.md)
    - public [runWizard](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/runWizard.md)() : void
    - protected [getSymbolicPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/getSymbolicPath.md)(string $path) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-serviceManagerUtil"><b>serviceManagerUtil</b></span>

    This property holds the serviceManagerUtil for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options:
    - whitelist: array of [planetIds](https://github.com/karayabin/universe-snapshot#the-planet-identifier) to display
    
    Note that the gui should let you toggle between displaying only elements on the whitelist, and all elements, at least
    that's the intent.
    
    



Methods
==============

- [LightDeveloperWizardService::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/__construct.md) &ndash; Builds the LightDeveloperWizardService instance.
- [LightDeveloperWizardService::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setContainer.md) &ndash; Sets the container.
- [LightDeveloperWizardService::setOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setOptions.md) &ndash; Sets the options.
- [LightDeveloperWizardService::setOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setOption.md) &ndash; Sets an individual option.
- [LightDeveloperWizardService::getServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/getServiceManagerUtil.md) &ndash; Returns a ServiceManagerUtil instance.
- [LightDeveloperWizardService::runWizard](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/runWizard.md) &ndash; Runs the wizard.
- [LightDeveloperWizardService::getSymbolicPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/getSymbolicPath.md) &ndash; Returns the symbolic version of the given path.





Location
=============
Ling\Light_DeveloperWizard\Service\LightDeveloperWizardService<br>
See the source code of [Ling\Light_DeveloperWizard\Service\LightDeveloperWizardService](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Service/LightDeveloperWizardService.php)



SeeAlso
==============
Previous class: [DeveloperWizardLkaHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper.md)<br>Next class: [DeveloperWizardFileTool](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool.md)<br>
