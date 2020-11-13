[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The LightDeveloperWizardWebWizard class
================
2020-06-30 --> 2020-09-18






Introduction
============

The LightDeveloperWizardWebWizard class.



Class synopsis
==============


class <span class="pl-k">LightDeveloperWizardWebWizard</span> extends [WebWizardToolsDefaultWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsDefaultWebWizard.md)  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected [Ling\WebWizardTools\Controls\WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md) [WebWizardToolsWebWizard::$optionList](#property-optionList) ;
    - protected [Ling\WebWizardTools\Process\WebWizardToolsProcess[]](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) [WebWizardToolsWebWizard::$processes](#property-processes) ;
    - protected [Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md) [WebWizardToolsWebWizard::$renderer](#property-renderer) ;
    - protected array [WebWizardToolsWebWizard::$context](#property-context) ;
    - protected array [WebWizardToolsWebWizard::$triggerExtraParams](#property-triggerExtraParams) ;
    - protected string [WebWizardToolsWebWizard::$processKeyName](#property-processKeyName) ;
    - protected callable [WebWizardToolsWebWizard::$processFilter](#property-processFilter) ;
    - protected string|null [WebWizardToolsWebWizard::$onProcessSuccessMessage](#property-onProcessSuccessMessage) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard/setProcess.md)([Ling\WebWizardTools\Process\WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) $process) : [LightDeveloperWizardWebWizard](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard.md)

- Inherited methods
    - public WebWizardToolsWebWizard::render() : void
    - public WebWizardToolsWebWizard::run() : void
    - public WebWizardToolsWebWizard::getExecutedProcess() : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) | null
    - public WebWizardToolsWebWizard::getProcesses() : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public WebWizardToolsWebWizard::setTriggerExtraParams(array $triggerExtraParams) : void
    - public WebWizardToolsWebWizard::getTriggerExtraParams() : array
    - public WebWizardToolsWebWizard::getOptionList() : [WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md)
    - public WebWizardToolsWebWizard::setOptionList([Ling\WebWizardTools\Controls\WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md) $optionList) : void
    - public WebWizardToolsWebWizard::setRenderer([Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md) $renderer) : void
    - public WebWizardToolsWebWizard::setContext(array $context) : void
    - public WebWizardToolsWebWizard::getContext() : array
    - public WebWizardToolsWebWizard::getProcessKeyName() : string
    - public WebWizardToolsWebWizard::setProcessKeyName(string $processKeyName) : void
    - public WebWizardToolsWebWizard::setProcessFilter(callable $processFilter) : void
    - public WebWizardToolsWebWizard::getOnProcessSuccessMessage() : string | null
    - public WebWizardToolsWebWizard::setOnProcessSuccessMessage(string $onProcessSuccessMessage) : void
    - private WebWizardToolsWebWizard::error(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-optionList"><b>optionList</b></span>

    This property holds the optionList for this instance.
    
    

- <span id="property-processes"><b>processes</b></span>

    This property holds the processes for this instance.
    
    It's an array of processName => processInstance.
    
    

- <span id="property-renderer"><b>renderer</b></span>

    This property holds the renderer for this instance.
    
    

- <span id="property-context"><b>context</b></span>

    This property holds the context for this instance.
    
    

- <span id="property-triggerExtraParams"><b>triggerExtraParams</b></span>

    This property holds the triggerExtraParams for this instance.
    
    

- <span id="property-processKeyName"><b>processKeyName</b></span>

    This property holds the processKeyName for this instance.
    
    

- <span id="property-processFilter"><b>processFilter</b></span>

    A callable to filter processes to disable/enable.
    
    The callable signature is:
    
    - fn ( string $processName ): string|null
    
    If the callable returns a string, it's the reason why the process is disabled.
    Any other value means that the process is enabled.
    
    

- <span id="property-onProcessSuccessMessage"><b>onProcessSuccessMessage</b></span>

    This property holds the onProcessSuccessMessage for this instance.
    
    



Methods
==============

- [LightDeveloperWizardWebWizard::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard/__construct.md) &ndash; Builds the WebWizardToolsWebWizard instance.
- [LightDeveloperWizardWebWizard::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard/setContainer.md) &ndash; Sets the container.
- [LightDeveloperWizardWebWizard::setProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard/setProcess.md) &ndash; Sets a process.
- WebWizardToolsWebWizard::render &ndash; Displays the web wizard gui.
- WebWizardToolsWebWizard::run &ndash; Prepares all processes, and executes the called one if any.
- WebWizardToolsWebWizard::getExecutedProcess &ndash; Returns the currently executed process if any, or null otherwise.
- WebWizardToolsWebWizard::getProcesses &ndash; Returns the processes of this instance.
- WebWizardToolsWebWizard::setTriggerExtraParams &ndash; Sets the triggerExtraParams.
- WebWizardToolsWebWizard::getTriggerExtraParams &ndash; Returns the triggerExtraParams of this instance.
- WebWizardToolsWebWizard::getOptionList &ndash; Returns the optionList of this instance.
- WebWizardToolsWebWizard::setOptionList &ndash; Sets the optionList.
- WebWizardToolsWebWizard::setRenderer &ndash; Sets the renderer.
- WebWizardToolsWebWizard::setContext &ndash; Sets the context.
- WebWizardToolsWebWizard::getContext &ndash; Returns the context of this instance.
- WebWizardToolsWebWizard::getProcessKeyName &ndash; Returns the processKeyName of this instance.
- WebWizardToolsWebWizard::setProcessKeyName &ndash; Sets the processKeyName.
- WebWizardToolsWebWizard::setProcessFilter &ndash; Sets the processFilter.
- WebWizardToolsWebWizard::getOnProcessSuccessMessage &ndash; Returns the onProcessSuccessMessage of this instance.
- WebWizardToolsWebWizard::setOnProcessSuccessMessage &ndash; Sets the onProcessSuccessMessage.
- WebWizardToolsWebWizard::error &ndash; Throws an exception.





Location
=============
Ling\Light_DeveloperWizard\WebWizardTools\WebWizard\LightDeveloperWizardWebWizard<br>
See the source code of [Ling\Light_DeveloperWizard\WebWizardTools\WebWizard\LightDeveloperWizardWebWizard](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/WebWizardTools/WebWizard/LightDeveloperWizardWebWizard.php)



SeeAlso
==============
Previous class: [SortHooksAlphabeticallyProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/ServiceConfig/SortHooksAlphabeticallyProcess.md)<br>
