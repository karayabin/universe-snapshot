[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)



The WebWizardToolsProcess class
================
2020-07-06 --> 2020-12-08






Introduction
============

The WebWizardToolsProcess class.



Class synopsis
==============


abstract class <span class="pl-k">WebWizardToolsProcess</span>  {

- Properties
    - protected [Ling\WebWizardTools\Report\WebWizardToolsReport](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport.md) [$report](#property-report) ;
    - protected [Ling\WebWizardTools\Controls\WebWizardToolsControl[]](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md) [$controls](#property-controls) ;
    - protected string [$name](#property-name) ;
    - protected string [$label](#property-label) ;
    - protected string [$learnMore](#property-learnMore) ;
    - protected [Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md) [$webWizard](#property-webWizard) ;
    - protected array [$params](#property-params) ;
    - protected bool [$enabled](#property-enabled) ;
    - protected string [$disabledReason](#property-disabledReason) ;
    - protected string [$category](#property-category) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/__construct.md)() : void
    - public [prepare](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/prepare.md)() : void
    - public [getReport](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getReport.md)() : array
    - public [getControls](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getControls.md)() : [WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md)
    - public [setWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setWebWizard.md)([Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md) $webWizard) : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public [setControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setControl.md)([Ling\WebWizardTools\Controls\WebWizardToolsControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md) $control) : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public [getName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getName.md)() : string
    - public [setName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setName.md)(string $name) : [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)
    - public [getLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getLabel.md)() : string
    - public [setLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setLabel.md)(string $label) : void
    - public [getParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getParams.md)() : array
    - public [setParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setParams.md)(array $params) : void
    - public [getLearnMore](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getLearnMore.md)() : string
    - public [setLearnMore](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setLearnMore.md)(string $learnMore) : void
    - public [isEnabled](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/isEnabled.md)() : bool
    - public [setEnabled](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setEnabled.md)(bool $enabled) : void
    - public [getDisabledReason](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getDisabledReason.md)() : string
    - public [setDisabledReason](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setDisabledReason.md)(string $disabledReason) : void
    - public [getCategory](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getCategory.md)() : string
    - public [setCategory](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setCategory.md)(string $category) : self
    - public [execute](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/execute.md)(?array $options = []) : void
    - public [addLogMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/addLogMessage.md)(string $msg, string $type) : void
    - abstract protected [doExecute](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/doExecute.md)(?array $options = []) : void
    - protected [getContextVar](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getContextVar.md)(string $varName, ?$defaultValue = null, ?bool $throwEx = true) : void
    - protected [traceMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/traceMessage.md)(string $msg) : void
    - protected [infoMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/infoMessage.md)(string $msg) : void
    - protected [errorMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/errorMessage.md)(string $msg) : void
    - protected [importantMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/importantMessage.md)(string $msg) : void
    - protected [exceptionMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/exceptionMessage.md)([\Exception](http://php.net/manual/en/class.exception.php) $e) : void
    - protected [message](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/message.md)($msg, string $type) : void
    - private [error](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/error.md)(string $msg) : void

}




Properties
=============

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

- [WebWizardToolsProcess::__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
- [WebWizardToolsProcess::prepare](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/prepare.md) &ndash; An opportunity for the process to create the controls, and/or to change the label of the process dynamically.
- [WebWizardToolsProcess::getReport](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getReport.md) &ndash; Returns the report of this instance.
- [WebWizardToolsProcess::getControls](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getControls.md) &ndash; Returns the controls of this instance.
- [WebWizardToolsProcess::setWebWizard](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setWebWizard.md) &ndash; Sets the webWizard.
- [WebWizardToolsProcess::setControl](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setControl.md) &ndash; Adds a control to this process.
- [WebWizardToolsProcess::getName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getName.md) &ndash; Returns the name of this instance.
- [WebWizardToolsProcess::setName](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setName.md) &ndash; Sets the name.
- [WebWizardToolsProcess::getLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getLabel.md) &ndash; Returns the label of this instance.
- [WebWizardToolsProcess::setLabel](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setLabel.md) &ndash; Sets the label.
- [WebWizardToolsProcess::getParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getParams.md) &ndash; Returns the params of this instance.
- [WebWizardToolsProcess::setParams](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setParams.md) &ndash; Sets the params.
- [WebWizardToolsProcess::getLearnMore](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getLearnMore.md) &ndash; Returns the learnMore of this instance.
- [WebWizardToolsProcess::setLearnMore](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setLearnMore.md) &ndash; Sets the learnMore.
- [WebWizardToolsProcess::isEnabled](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/isEnabled.md) &ndash; Returns the enabled of this instance.
- [WebWizardToolsProcess::setEnabled](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setEnabled.md) &ndash; Sets the enabled.
- [WebWizardToolsProcess::getDisabledReason](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getDisabledReason.md) &ndash; Returns the disabledReason of this instance.
- [WebWizardToolsProcess::setDisabledReason](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setDisabledReason.md) &ndash; Sets the disabledReason.
- [WebWizardToolsProcess::getCategory](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getCategory.md) &ndash; Returns the category of this instance.
- [WebWizardToolsProcess::setCategory](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/setCategory.md) &ndash; Sets the category.
- [WebWizardToolsProcess::execute](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/execute.md) &ndash; Executes the process.
- [WebWizardToolsProcess::addLogMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/addLogMessage.md) &ndash; Adds a message of the given type to the log.
- [WebWizardToolsProcess::doExecute](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/doExecute.md) &ndash; Executes the process.
- [WebWizardToolsProcess::getContextVar](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getContextVar.md) &ndash; Returns a variable from the wizard context.
- [WebWizardToolsProcess::traceMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/traceMessage.md) &ndash; Adds a message of type "trace" to the process report.
- [WebWizardToolsProcess::infoMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/infoMessage.md) &ndash; Adds a message of type "info" to the process report.
- [WebWizardToolsProcess::errorMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/errorMessage.md) &ndash; Adds a message of type "error" to the process report.
- [WebWizardToolsProcess::importantMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/importantMessage.md) &ndash; Adds a message of type "important" to the process report.
- [WebWizardToolsProcess::exceptionMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/exceptionMessage.md) &ndash; Adds a message of type "exception" to the process report.
- [WebWizardToolsProcess::message](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/message.md) &ndash; Adds a message of the given type to the process report.
- [WebWizardToolsProcess::error](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/error.md) &ndash; Throws an exception.





Location
=============
Ling\WebWizardTools\Process\WebWizardToolsProcess<br>
See the source code of [Ling\WebWizardTools\Process\WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/Process/WebWizardToolsProcess.php)



SeeAlso
==============
Previous class: [WebWizardToolsException](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Exception/WebWizardToolsException.md)<br>Next class: [WebWizardToolsReport](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport.md)<br>
