[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The ExecuteLkaGeneratorProcess class
================
2020-06-30 --> 2020-08-10






Introduction
============

The ExecuteLkaGeneratorProcess class.



Class synopsis
==============


class <span class="pl-k">ExecuteLkaGeneratorProcess</span> extends [GenerateLkaPluginProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected array [$configFiles](#property-configFiles) ;

- Inherited properties
    - protected bool [GenerateLkaPluginProcess::$checkCreateFileExists](#property-checkCreateFileExists) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightDeveloperWizardCommonProcess::$container](#property-container) ;
    - protected [Ling\Light_DeveloperWizard\Util\ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md) [LightDeveloperWizardCommonProcess::$util](#property-util) ;
    - protected [Ling\WebWizardTools\Report\WebWizardToolsReport](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport.md) [WebWizardToolsProcess::$report](#property-report) ;
    - protected [Ling\WebWizardTools\Controls\WebWizardToolsControl[]](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md) [WebWizardToolsProcess::$controls](#property-controls) ;
    - protected string [WebWizardToolsProcess::$name](#property-name) ;
    - protected string [WebWizardToolsProcess::$label](#property-label) ;
    - protected string [WebWizardToolsProcess::$learnMore](#property-learnMore) ;
    - protected [Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md) [WebWizardToolsProcess::$webWizard](#property-webWizard) ;
    - protected array [WebWizardToolsProcess::$params](#property-params) ;
    - protected bool [WebWizardToolsProcess::$enabled](#property-enabled) ;
    - protected string [WebWizardToolsProcess::$disabledReason](#property-disabledReason) ;
    - protected string [WebWizardToolsProcess::$category](#property-category) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess/__construct.md)() : void
    - public [prepare](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess/prepare.md)() : void
    - protected [doExecute](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess/doExecute.md)(?array $options = []) : void

- Inherited methods
    - protected [GenerateLkaPluginProcess::generateLkaPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/generateLkaPlanet.md)(array $params, ?array $options = []) : void
    - protected [GenerateLkaPluginProcess::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/createLkaGeneratorConfigFile.md)(array $params, ?array $options = []) : void
    - protected [GenerateLkaPluginProcess::getTablesByCreateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getTablesByCreateFile.md)(string $createFile) : array
    - protected [GenerateLkaPluginProcess::getLkaOriginPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaOriginPlanet.md)(string $lkaPlanetName) : string
    - protected [GenerateLkaPluginProcess::getLkaServiceNameByPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaServiceNameByPlanet.md)(string $planet) : string
    - protected [GenerateLkaPluginProcess::getPlanetId](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getPlanetId.md)($planet) : string
    - protected [GenerateLkaPluginProcess::getLkaPlanetNameByPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaPlanetNameByPlanet.md)(string $planet) : string
    - protected [GenerateLkaPluginProcess::executeGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/executeGeneratorConfigFile.md)(string $path, ?array $options = []) : void
    - public [LightDeveloperWizardCommonProcess::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardCommonProcess/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightDeveloperWizardBaseProcess::getSymbolicPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/getSymbolicPath.md)(string $path) : string
    - protected [LightDeveloperWizardBaseProcess::isLightPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/isLightPlanet.md)(string $planet) : bool
    - protected [LightDeveloperWizardBaseProcess::getTablePrefix](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/getTablePrefix.md)(string $planetDir, string $createFile) : string
    - protected [LightDeveloperWizardBaseProcess::getFryingPanForService](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/getFryingPanForService.md)(string $file) : [FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md)
    - protected [LightDeveloperWizardBaseProcess::addServiceOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceOptions.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan, string $planetName) : void
    - protected [LightDeveloperWizardBaseProcess::addServiceContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceContainer.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan) : void
    - protected [LightDeveloperWizardBaseProcess::addServiceFactory](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceFactory.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan, string $galaxyName, string $planetName) : void
    - protected [LightDeveloperWizardBaseProcess::addServiceConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceConfigHook.md)(string $serviceName, array $methodItem, ?array $ifArgs = null) : void
    - protected [LightDeveloperWizardBaseProcess::setLearnMoreByHash](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/setLearnMoreByHash.md)(string $hash) : void
    - protected [LightDeveloperWizardBaseProcess::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/error.md)(string $msg) : void
    - public WebWizardToolsProcess::getReport() : array
    - public WebWizardToolsProcess::getControls() : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public WebWizardToolsProcess::setWebWizard([Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md) $webWizard) : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public WebWizardToolsProcess::setControl([Ling\WebWizardTools\Controls\WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md) $control) : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public WebWizardToolsProcess::getName() : string
    - public WebWizardToolsProcess::setName(string $name) : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public WebWizardToolsProcess::getLabel() : string
    - public WebWizardToolsProcess::setLabel(string $label) : void
    - public WebWizardToolsProcess::getParams() : array
    - public WebWizardToolsProcess::setParams(array $params) : void
    - public WebWizardToolsProcess::getLearnMore() : string
    - public WebWizardToolsProcess::setLearnMore(string $learnMore) : void
    - public WebWizardToolsProcess::isEnabled() : bool
    - public WebWizardToolsProcess::setEnabled(bool $enabled) : void
    - public WebWizardToolsProcess::getDisabledReason() : string
    - public WebWizardToolsProcess::setDisabledReason(string $disabledReason) : void
    - public WebWizardToolsProcess::getCategory() : string
    - public WebWizardToolsProcess::setCategory(string $category) : self
    - public WebWizardToolsProcess::execute(?array $options = []) : void
    - public WebWizardToolsProcess::addLogMessage(string $msg, string $type) : void
    - protected WebWizardToolsProcess::getContextVar(string $varName, ?$defaultValue = null, ?bool $throwEx = true) : void
    - protected WebWizardToolsProcess::traceMessage(string $msg) : void
    - protected WebWizardToolsProcess::infoMessage(string $msg) : void
    - protected WebWizardToolsProcess::errorMessage(string $msg) : void
    - protected WebWizardToolsProcess::importantMessage(string $msg) : void
    - protected WebWizardToolsProcess::exceptionMessage([\Exception](http://php.net/manual/en/class.exception.php) $e) : void
    - protected WebWizardToolsProcess::message($msg, string $type) : void

}




Properties
=============

- <span id="property-configFiles"><b>configFiles</b></span>

    This property holds the configFiles for this instance.
    It contains the lka generator config files found for the planet in this order:
    
    - $appDir/config/data/$planetName/Light_Kit_Admin_Generator/$serviceName.byml
    - $appDir/config/data/$planetName/Light_Kit_Admin_Generator/$serviceName.generated.byml
    
    If a config file is not found, it's value is set to false.
    
    

- <span id="property-checkCreateFileExists"><b>checkCreateFileExists</b></span>

    This property holds the checkCreateFileExists for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-util"><b>util</b></span>

    This property holds the util for this instance.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the report for this instance.
    
    

- <span id="property-controls"><b>controls</b></span>

    The controls for this instance.
    
    It's an array of controlName => controlInstance.
    
    

- <span id="property-name"><b>name</b></span>

    This property holds the name for this instance.
    
    

- <span id="property-label"><b>label</b></span>

    This property holds the label for this instance.
    
    

- <span id="property-learnMore"><b>learnMore</b></span>

    This property holds the learnMore for this instance.
    
    

- <span id="property-webWizard"><b>webWizard</b></span>

    This property holds the webWizard for this instance.
    
    

- <span id="property-params"><b>params</b></span>

    The params for this instance.
    See the [WebWizardTools conception notes](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-enabled"><b>enabled</b></span>

    This property holds the enabled for this instance.
    
    

- <span id="property-disabledReason"><b>disabledReason</b></span>

    This property holds the disabledReason for this instance.
    
    

- <span id="property-category"><b>category</b></span>

    This property holds the category for this instance.
    
    



Methods
==============

- [ExecuteLkaGeneratorProcess::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
- [ExecuteLkaGeneratorProcess::prepare](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess/prepare.md) &ndash; An opportunity for the process to create the controls, and/or to change the label of the process dynamically.
- [ExecuteLkaGeneratorProcess::doExecute](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess/doExecute.md) &ndash; Executes the process.
- [GenerateLkaPluginProcess::generateLkaPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/generateLkaPlanet.md) &ndash; Generate the Lka planet from the given params.
- [GenerateLkaPluginProcess::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/createLkaGeneratorConfigFile.md) &ndash; Creates the lka generator config file, and returns its path.
- [GenerateLkaPluginProcess::getTablesByCreateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getTablesByCreateFile.md) &ndash; Returns the name of the tables found in the given create file.
- [GenerateLkaPluginProcess::getLkaOriginPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaOriginPlanet.md) &ndash; Returns the name of the planet from which the given lka planet originates from.
- [GenerateLkaPluginProcess::getLkaServiceNameByPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaServiceNameByPlanet.md) &ndash; Returns the lka service name corresponding to the given planet name.
- [GenerateLkaPluginProcess::getPlanetId](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getPlanetId.md) &ndash; Returns the planetId corresponding to the given planet name.
- [GenerateLkaPluginProcess::getLkaPlanetNameByPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaPlanetNameByPlanet.md) &ndash; Returns the lka planet name for the given planet.
- [GenerateLkaPluginProcess::executeGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/executeGeneratorConfigFile.md) &ndash; Executes the given generator config file path, using the [Light_Kit_Admin_Generator](https://github.com/lingtalfi/Light_Kit_Admin_Generator) plugin.
- [LightDeveloperWizardCommonProcess::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardCommonProcess/setContainer.md) &ndash; Sets the light service container interface.
- [LightDeveloperWizardBaseProcess::getSymbolicPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/getSymbolicPath.md) &ndash; Returns the given absolute path, with the application directory replaced by a symbol if found.
- [LightDeveloperWizardBaseProcess::isLightPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/isLightPlanet.md) &ndash; Returns whether the given planet is a light planet.
- [LightDeveloperWizardBaseProcess::getTablePrefix](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/getTablePrefix.md) &ndash; Returns the table prefix from either the preferences (if found), or guessed from the given createFile otherwise.
- [LightDeveloperWizardBaseProcess::getFryingPanForService](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/getFryingPanForService.md) &ndash; Returns a FryingPan instance configured to work with the given file.
- [LightDeveloperWizardBaseProcess::addServiceOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceOptions.md) &ndash; Adds incrementally the options property, the options variable init, and the setOptions method to the service container class.
- [LightDeveloperWizardBaseProcess::addServiceContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceContainer.md) &ndash; Adds incrementally the container property, the container variable init, the setContainer method, and the necessary use statements, to the service container class.
- [LightDeveloperWizardBaseProcess::addServiceFactory](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceFactory.md) &ndash; Adds incrementally the factory property, the factory variable init, the getFactory method, and the necessary use statements.
- [LightDeveloperWizardBaseProcess::addServiceConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceConfigHook.md) &ndash; Adds a service config hook, only if it doesn't already exist.
- [LightDeveloperWizardBaseProcess::setLearnMoreByHash](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/setLearnMoreByHash.md) &ndash; Sets the learnMore property based on the given hash.
- [LightDeveloperWizardBaseProcess::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/error.md) &ndash; Throws an exception.
- WebWizardToolsProcess::getReport &ndash; Returns the report of this instance.
- WebWizardToolsProcess::getControls &ndash; Returns the controls of this instance.
- WebWizardToolsProcess::setWebWizard &ndash; Sets the webWizard.
- WebWizardToolsProcess::setControl &ndash; Adds a control to this process.
- WebWizardToolsProcess::getName &ndash; Returns the name of this instance.
- WebWizardToolsProcess::setName &ndash; Sets the name.
- WebWizardToolsProcess::getLabel &ndash; Returns the label of this instance.
- WebWizardToolsProcess::setLabel &ndash; Sets the label.
- WebWizardToolsProcess::getParams &ndash; Returns the params of this instance.
- WebWizardToolsProcess::setParams &ndash; Sets the params.
- WebWizardToolsProcess::getLearnMore &ndash; Returns the learnMore of this instance.
- WebWizardToolsProcess::setLearnMore &ndash; Sets the learnMore.
- WebWizardToolsProcess::isEnabled &ndash; Returns the enabled of this instance.
- WebWizardToolsProcess::setEnabled &ndash; Sets the enabled.
- WebWizardToolsProcess::getDisabledReason &ndash; Returns the disabledReason of this instance.
- WebWizardToolsProcess::setDisabledReason &ndash; Sets the disabledReason.
- WebWizardToolsProcess::getCategory &ndash; Returns the category of this instance.
- WebWizardToolsProcess::setCategory &ndash; Sets the category.
- WebWizardToolsProcess::execute &ndash; Executes the process.
- WebWizardToolsProcess::addLogMessage &ndash; Adds a message of the given type to the log.
- WebWizardToolsProcess::getContextVar &ndash; Returns a variable from the wizard context.
- WebWizardToolsProcess::traceMessage &ndash; Adds a message of type "trace" to the process report.
- WebWizardToolsProcess::infoMessage &ndash; Adds a message of type "info" to the process report.
- WebWizardToolsProcess::errorMessage &ndash; Adds a message of type "error" to the process report.
- WebWizardToolsProcess::importantMessage &ndash; Adds a message of type "important" to the process report.
- WebWizardToolsProcess::exceptionMessage &ndash; Adds a message of type "exception" to the process report.
- WebWizardToolsProcess::message &ndash; Adds a message of the given type to the process report.





Location
=============
Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators\ExecuteLkaGeneratorProcess<br>
See the source code of [Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators\ExecuteLkaGeneratorProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/WebWizardTools/Process/Generators/ExecuteLkaGeneratorProcess.php)



SeeAlso
==============
Previous class: [SynchronizeDbProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Database/SynchronizeDbProcess.md)<br>Next class: [GenerateBreezeApiProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateBreezeApiProcess.md)<br>
