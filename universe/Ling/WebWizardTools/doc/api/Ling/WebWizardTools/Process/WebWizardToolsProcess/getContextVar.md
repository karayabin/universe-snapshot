[Back to the Ling/WebWizardTools api](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools.md)<br>
[Back to the Ling\WebWizardTools\Process\WebWizardToolsProcess class](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md)


WebWizardToolsProcess::getContextVar
================



WebWizardToolsProcess::getContextVar — Returns a variable from the wizard context.




Description
================


protected [WebWizardToolsProcess::getContextVar](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/getContextVar.md)(string $varName, ?$defaultValue = null, ?bool $throwEx = true) : void




Returns a variable from the wizard context.
If the variable doesn't exist, it throws an exception by default.
or if the throwEx flag is set to false, it returns the default value instead.




Parameters
================


- varName

    

- defaultValue

    

- throwEx

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [WebWizardToolsProcess::getContextVar](https://github.com/lingtalfi/WebWizardTools/blob/master/Process/WebWizardToolsProcess.php#L378-L388)


See Also
================

The [WebWizardToolsProcess](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md) class.

Previous method: [doExecute](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/doExecute.md)<br>Next method: [traceMessage](https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess/traceMessage.md)<br>

