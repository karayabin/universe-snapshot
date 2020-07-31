[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)



The WebWizardToolsWebWizard class
================
2020-07-06 --> 2020-07-24






Introduction
============

The WebWizardToolsWebWizard class.



Class synopsis
==============


class <span class="pl-k">WebWizardToolsWebWizard</span>  {

- Properties
    - protected [Ling\WebWizardTools\Controls\WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md) [$optionList](#property-optionList) ;
    - protected [Ling\WebWizardTools\Process\WebWizardToolsProcess[]](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) [$processes](#property-processes) ;
    - protected [Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md) [$renderer](#property-renderer) ;
    - protected array [$context](#property-context) ;
    - protected array [$triggerExtraParams](#property-triggerExtraParams) ;
    - protected string [$processKeyName](#property-processKeyName) ;
    - protected callable [$processFilter](#property-processFilter) ;
    - protected string|null [$onProcessSuccessMessage](#property-onProcessSuccessMessage) ;
    - private [Ling\WebWizardTools\Process\WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) [$currentProcess](#property-currentProcess) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/__construct.md)() : void
    - public [render](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/render.md)() : void
    - public [run](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/run.md)() : void
    - public [getExecutedProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getExecutedProcess.md)() : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) | null
    - public [getProcesses](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getProcesses.md)() : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public [setTriggerExtraParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setTriggerExtraParams.md)(array $triggerExtraParams) : void
    - public [getTriggerExtraParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getTriggerExtraParams.md)() : array
    - public [getOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getOptionList.md)() : [WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md)
    - public [setOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setOptionList.md)([Ling\WebWizardTools\Controls\WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md) $optionList) : void
    - public [setProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcess.md)([Ling\WebWizardTools\Process\WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) $process) : [WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md)
    - public [setRenderer](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setRenderer.md)([Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md) $renderer) : void
    - public [setContext](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setContext.md)(array $context) : void
    - public [getContext](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getContext.md)() : array
    - public [getProcessKeyName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getProcessKeyName.md)() : string
    - public [setProcessKeyName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcessKeyName.md)(string $processKeyName) : void
    - public [setProcessFilter](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcessFilter.md)(callable $processFilter) : void
    - public [getOnProcessSuccessMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getOnProcessSuccessMessage.md)() : string | null
    - public [setOnProcessSuccessMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setOnProcessSuccessMessage.md)(string $onProcessSuccessMessage) : void
    - private [error](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/error.md)(string $msg) : void

}




Properties
=============

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
    
    

- <span id="property-currentProcess"><b>currentProcess</b></span>

    This property holds the currentProcess for this instance.
    
    



Methods
==============

- [WebWizardToolsWebWizard::__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/__construct.md) &ndash; Builds the WebWizardToolsWebWizard instance.
- [WebWizardToolsWebWizard::render](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/render.md) &ndash; Displays the web wizard gui.
- [WebWizardToolsWebWizard::run](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/run.md) &ndash; Prepares all processes, and executes the called one if any.
- [WebWizardToolsWebWizard::getExecutedProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getExecutedProcess.md) &ndash; Returns the currently executed process if any, or null otherwise.
- [WebWizardToolsWebWizard::getProcesses](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getProcesses.md) &ndash; Returns the processes of this instance.
- [WebWizardToolsWebWizard::setTriggerExtraParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setTriggerExtraParams.md) &ndash; Sets the triggerExtraParams.
- [WebWizardToolsWebWizard::getTriggerExtraParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getTriggerExtraParams.md) &ndash; Returns the triggerExtraParams of this instance.
- [WebWizardToolsWebWizard::getOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getOptionList.md) &ndash; Returns the optionList of this instance.
- [WebWizardToolsWebWizard::setOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setOptionList.md) &ndash; Sets the optionList.
- [WebWizardToolsWebWizard::setProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcess.md) &ndash; Sets a process.
- [WebWizardToolsWebWizard::setRenderer](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setRenderer.md) &ndash; Sets the renderer.
- [WebWizardToolsWebWizard::setContext](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setContext.md) &ndash; Sets the context.
- [WebWizardToolsWebWizard::getContext](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getContext.md) &ndash; Returns the context of this instance.
- [WebWizardToolsWebWizard::getProcessKeyName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getProcessKeyName.md) &ndash; Returns the processKeyName of this instance.
- [WebWizardToolsWebWizard::setProcessKeyName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcessKeyName.md) &ndash; Sets the processKeyName.
- [WebWizardToolsWebWizard::setProcessFilter](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcessFilter.md) &ndash; Sets the processFilter.
- [WebWizardToolsWebWizard::getOnProcessSuccessMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getOnProcessSuccessMessage.md) &ndash; Returns the onProcessSuccessMessage of this instance.
- [WebWizardToolsWebWizard::setOnProcessSuccessMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setOnProcessSuccessMessage.md) &ndash; Sets the onProcessSuccessMessage.
- [WebWizardToolsWebWizard::error](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/error.md) &ndash; Throws an exception.





Location
=============
Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard<br>
See the source code of [Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/WebWizard/WebWizardToolsWebWizard.php)



SeeAlso
==============
Previous class: [WebWizardToolsDefaultWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsDefaultWebWizard.md)<br>
