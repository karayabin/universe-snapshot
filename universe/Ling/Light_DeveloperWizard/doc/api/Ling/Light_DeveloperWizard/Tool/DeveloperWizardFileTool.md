[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The DeveloperWizardFileTool class
================
2020-06-30 --> 2020-07-07






Introduction
============

The DeveloperWizardFileTool class.

Manages the developer-wizard preferences file.
See the [Light_DeveloperWizard conception notes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conception-notes.md) for more details.



Class synopsis
==============


class <span class="pl-k">DeveloperWizardFileTool</span>  {

- Methods
    - public static [hasFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/hasFile.md)(string $planetDir) : bool
    - public static [rewriteFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/rewriteFile.md)(string $planetDir, ?array $conf = []) : void
    - public static [getPreferences](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/getPreferences.md)(string $planetDir) : array
    - public static [updateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/updateFile.md)(string $planetDir, ?array $conf = []) : void
    - public static [getFilePath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/getFilePath.md)(string $planetDir) : string

}






Methods
==============

- [DeveloperWizardFileTool::hasFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/hasFile.md) &ndash; Returns whether the preferences file exists under the given planet directory.
- [DeveloperWizardFileTool::rewriteFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/rewriteFile.md) &ndash; Rewrites the preferences file entirely with the given conf.
- [DeveloperWizardFileTool::getPreferences](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/getPreferences.md) &ndash; Returns the array of preferences for the given planetDir.
- [DeveloperWizardFileTool::updateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/updateFile.md) &ndash; Updates the preferences file partially, based on the given conf array.
- [DeveloperWizardFileTool::getFilePath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Tool/DeveloperWizardFileTool/getFilePath.md) &ndash; Returns the absolute path to the preferences file.





Location
=============
Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool<br>
See the source code of [Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Tool/DeveloperWizardFileTool.php)



SeeAlso
==============
Previous class: [LightDeveloperWizardService](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/LightDeveloperWizardService.md)<br>Next class: [AddStandardPermissionsProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/AddStandardPermissionsProcess.md)<br>
