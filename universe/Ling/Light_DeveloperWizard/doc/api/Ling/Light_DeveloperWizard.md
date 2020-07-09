Ling/Light_DeveloperWizard
================
2020-06-30 --> 2020-07-07




Table of contents
===========

- [LightDeveloperWizardException](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Exception/LightDeveloperWizardException.md) &ndash; The LightDeveloperWizardException class.
- [DeveloperWizardBreezeGeneratorHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardBreezeGeneratorHelper.md) &ndash; The DeveloperWizardBreezeGeneratorHelper class.
    - [DeveloperWizardBreezeGeneratorHelper::spawnConfFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardBreezeGeneratorHelper/spawnConfFile.md) &ndash; Create a new breeze generator configuration file, based on an internal model.
- [LightDeveloperWizardService](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService.md) &ndash; The LightDeveloperWizardService class.
    - [LightDeveloperWizardService::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/__construct.md) &ndash; Builds the LightDeveloperWizardService instance.
    - [LightDeveloperWizardService::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/setContainer.md) &ndash; Sets the container.
    - [LightDeveloperWizardService::runWizard](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService/runWizard.md) &ndash; Runs the wizard.
- [DeveloperWizardFileTool](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool.md) &ndash; The DeveloperWizardFileTool class.
    - [DeveloperWizardFileTool::hasFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/hasFile.md) &ndash; Returns whether the preferences file exists under the given planet directory.
    - [DeveloperWizardFileTool::rewriteFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/rewriteFile.md) &ndash; Rewrites the preferences file entirely with the given conf.
    - [DeveloperWizardFileTool::getPreferences](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/getPreferences.md) &ndash; Returns the array of preferences for the given planetDir.
    - [DeveloperWizardFileTool::updateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/updateFile.md) &ndash; Updates the preferences file partially, based on the given conf array.
    - [DeveloperWizardFileTool::getFilePath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/getFilePath.md) &ndash; Returns the absolute path to the preferences file.
- [AddStandardPermissionsProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/AddStandardPermissionsProcess.md) &ndash; The AddStandardPermissionsProcess class.
    - [AddStandardPermissionsProcess::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/AddStandardPermissionsProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
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
    - WebWizardToolsProcess::execute &ndash; Executes the process.
- [GenerateBreezeApiProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/GenerateBreezeApiProcess.md) &ndash; The GenerateBreezeApiProcess class.
    - [GenerateBreezeApiProcess::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/GenerateBreezeApiProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
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
    - WebWizardToolsProcess::execute &ndash; Executes the process.
- [GenerateLkaPlanetProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/GenerateLkaPlanetProcess.md) &ndash; The GenerateLkaPlanetProcess class.
    - [GenerateLkaPlanetProcess::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/GenerateLkaPlanetProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
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
    - WebWizardToolsProcess::execute &ndash; Executes the process.
- [LightDeveloperWizardBaseProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess.md) &ndash; The LightDeveloperWizardBaseProcess class.
    - [LightDeveloperWizardBaseProcess::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
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
    - WebWizardToolsProcess::execute &ndash; Executes the process.
- [SynchronizeDbProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/SynchronizeDbProcess.md) &ndash; The SynchronizeDbProcess class.
    - [SynchronizeDbProcess::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/SynchronizeDbProcess/__construct.md) &ndash; Builds the WebWizardToolsProcess instance.
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
    - WebWizardToolsProcess::execute &ndash; Executes the process.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [UniverseTools](https://github.com/lingtalfi/UniverseTools)
- [WebWizardTools](https://github.com/lingtalfi/WebWizardTools)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)
- [Light_DatabaseInfo](https://github.com/lingtalfi/Light_DatabaseInfo)
- [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [Light_ControllerHub](https://github.com/lingtalfi/Light_ControllerHub)
- [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin)
- [Jquery](https://github.com/lingtalfi/Jquery)


