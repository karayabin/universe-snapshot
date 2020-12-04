[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)



The WebWizardToolsReport class
================
2020-07-06 --> 2020-11-23






Introduction
============

The WebWizardToolsReport class.



Class synopsis
==============


class <span class="pl-k">WebWizardToolsReport</span>  {

- Properties
    - protected array [$trace](#property-trace) ;
    - protected array [$info](#property-info) ;
    - protected array [$error](#property-error) ;
    - protected array [$important](#property-important) ;
    - protected array [$exception](#property-exception) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/__construct.md)() : void
    - public [isSuccessful](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/isSuccessful.md)() : bool
    - public [getTraceMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getTraceMessages.md)() : array
    - public [getInfoMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getInfoMessages.md)() : array
    - public [getErrorMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getErrorMessages.md)() : array
    - public [getImportantMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getImportantMessages.md)() : array
    - public [getExceptionMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getExceptionMessages.md)() : array
    - public [addTrace](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addTrace.md)(string $msg) : void
    - public [addInfo](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addInfo.md)(string $msg) : void
    - public [addError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addError.md)(string $msg) : void
    - public [addImportant](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addImportant.md)(string $msg) : void
    - public [addException](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addException.md)([\Exception](http://php.net/manual/en/class.exception.php) $e) : void

}




Properties
=============

- <span id="property-trace"><b>trace</b></span>

    This property holds the trace messages for this instance.
    
    

- <span id="property-info"><b>info</b></span>

    This property holds the info messages for this instance.
    
    

- <span id="property-error"><b>error</b></span>

    This property holds the error messages for this instance.
    
    

- <span id="property-important"><b>important</b></span>

    This property holds the important messages for this instance.
    
    

- <span id="property-exception"><b>exception</b></span>

    This property holds the exception messages for this instance.
    
    



Methods
==============

- [WebWizardToolsReport::__construct](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/__construct.md) &ndash; Builds the WebWizardToolsReport instance.
- [WebWizardToolsReport::isSuccessful](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/isSuccessful.md) &ndash; Returns whether the report is successful.
- [WebWizardToolsReport::getTraceMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getTraceMessages.md) &ndash; Returns the trace of this instance.
- [WebWizardToolsReport::getInfoMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getInfoMessages.md) &ndash; Returns the info of this instance.
- [WebWizardToolsReport::getErrorMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getErrorMessages.md) &ndash; Returns the error of this instance.
- [WebWizardToolsReport::getImportantMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getImportantMessages.md) &ndash; Returns the important of this instance.
- [WebWizardToolsReport::getExceptionMessages](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/getExceptionMessages.md) &ndash; Returns the exception of this instance.
- [WebWizardToolsReport::addTrace](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addTrace.md) &ndash; Adds a "trace" message to the report.
- [WebWizardToolsReport::addInfo](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addInfo.md) &ndash; Adds an "info" message to the report.
- [WebWizardToolsReport::addError](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addError.md) &ndash; Adds an "error" message to the report.
- [WebWizardToolsReport::addImportant](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addImportant.md) &ndash; Adds an "important" message to the report.
- [WebWizardToolsReport::addException](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport/addException.md) &ndash; Adds an exception to the report.





Location
=============
Ling\WebWizardTools\Report\WebWizardToolsReport<br>
See the source code of [Ling\WebWizardTools\Report\WebWizardToolsReport](https://github.com/lingtalfi/WebWizardTools/blob/master/Report/WebWizardToolsReport.php)



SeeAlso
==============
Previous class: [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)<br>Next class: [WebWizardToolsDefaultWebWizardRenderer](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsDefaultWebWizardRenderer.md)<br>
