[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)



The WebWizardToolsDefaultWebWizard class
================
2020-07-06 --> 2021-05-31






Introduction
============

The WebWizardToolsDefaultWebWizard class.



Class synopsis
==============


class <span class="pl-k">WebWizardToolsDefaultWebWizard</span> extends [WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md)  {

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
    - public [__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsDefaultWebWizard/__construct.md)() : void

- Inherited methods
    - public [WebWizardToolsWebWizard::render](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/render.md)() : void
    - public [WebWizardToolsWebWizard::run](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/run.md)() : void
    - public [WebWizardToolsWebWizard::getExecutedProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getExecutedProcess.md)() : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) | null
    - public [WebWizardToolsWebWizard::getProcesses](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getProcesses.md)() : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public [WebWizardToolsWebWizard::setTriggerExtraParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setTriggerExtraParams.md)(array $triggerExtraParams) : void
    - public [WebWizardToolsWebWizard::getTriggerExtraParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getTriggerExtraParams.md)() : array
    - public [WebWizardToolsWebWizard::getOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getOptionList.md)() : [WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md)
    - public [WebWizardToolsWebWizard::setOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setOptionList.md)([Ling\WebWizardTools\Controls\WebWizardToolsOptionList](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md) $optionList) : void
    - public [WebWizardToolsWebWizard::setProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcess.md)([Ling\WebWizardTools\Process\WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) $process) : [WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md)
    - public [WebWizardToolsWebWizard::setRenderer](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setRenderer.md)([Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md) $renderer) : void
    - public [WebWizardToolsWebWizard::setContext](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setContext.md)(array $context) : void
    - public [WebWizardToolsWebWizard::getContext](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getContext.md)() : array
    - public [WebWizardToolsWebWizard::getProcessKeyName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getProcessKeyName.md)() : string
    - public [WebWizardToolsWebWizard::setProcessKeyName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcessKeyName.md)(string $processKeyName) : void
    - public [WebWizardToolsWebWizard::setProcessFilter](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setProcessFilter.md)(callable $processFilter) : void
    - public [WebWizardToolsWebWizard::getOnProcessSuccessMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/getOnProcessSuccessMessage.md)() : string | null
    - public [WebWizardToolsWebWizard::setOnProcessSuccessMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard/setOnProcessSuccessMessage.md)(string $onProcessSuccessMessage) : void

}






Methods
==============

- [WebWizardToolsDefaultWebWizard::__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsDefaultWebWizard/__construct.md) &ndash; Builds the WebWizardToolsWebWizard instance.
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





Location
=============
Ling\WebWizardTools\WebWizard\WebWizardToolsDefaultWebWizard<br>
See the source code of [Ling\WebWizardTools\WebWizard\WebWizardToolsDefaultWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/WebWizard/WebWizardToolsDefaultWebWizard.php)



SeeAlso
==============
Previous class: [WebWizardToolsWebWizardRendererInterface](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md)<br>Next class: [WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md)<br>
