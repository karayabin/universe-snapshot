[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The CommitWizard class
================
2019-03-13 --> 2021-12-02






Introduction
============

The CommitWizard class.


When you use this class, I recommend using it from a terminal.

- php -f myscript.php

(and in the myscript.php use the CommitWizard tool)


blabla
---------
I tried to use it from a web browser, but it failed to actually commit the planets to github.com.
I believe its because the php process (invoked by apache) doesn't have the same access the terminal does (i.e. the terminal
being using the user's configuration like .bashrc and .profile, ...).
Also maybe the fact that we are using ssh keys to access github might play a role in this problem.

Any way, all the commit commands have a display intended for the terminal in the first place.



Class synopsis
==============


class <span class="pl-k">CommitWizard</span>  {

- Properties
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)|null [$output](#property-output) ;
    - private string [$applicationPath](#property-applicationPath) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [commitListFromFile](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitListFromFile.md)(string $filePath, string $commitMsg, ?array $options = []) : void
    - public [commitPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitPlanets.md)(array $planetDotNames, string $commitMsg, ?array $options = []) : void
    - public [commit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commit.md)(string $planetDotName, string $commitMessage, ?array $options = []) : void
    - public [commitByPlanetDir](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitByPlanetDir.md)(string $planetDir, ?string $appPath = null) : void
    - private [msg](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msg.md)(string $msg) : void
    - private [msgError](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgError.md)(string $msg) : void
    - private [msgSuccess](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgSuccess.md)(string $msg) : void
    - private [error](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/error.md)(string $msg, ?int $code = null) : void
    - private [getOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/getOutput.md)() : [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)
    - private static [commitAllPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitAllPlanets.md)(string $universeDir) : void

}




Properties
=============

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    

- <span id="property-applicationPath"><b>applicationPath</b></span>

    This property holds the applicationPath for this instance.
    
    



Methods
==============

- [CommitWizard::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/__construct.md) &ndash; Builds the CommitWizard instance.
- [CommitWizard::setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/setOutput.md) &ndash; Sets the output.
- [CommitWizard::commitListFromFile](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitListFromFile.md) &ndash; Commits all planets listed in the given file, with the given commit message.
- [CommitWizard::commitPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitPlanets.md) &ndash; Commits all the given planets with the given commit message.
- [CommitWizard::commit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commit.md) &ndash; Commits the given planet with the given message.
- [CommitWizard::commitByPlanetDir](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitByPlanetDir.md) &ndash; Commits (and pushes to github.com) the given planet, using the actual last commit message from the readme's history log section.
- [CommitWizard::msg](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msg.md) &ndash; Writes a message to the output.
- [CommitWizard::msgError](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgError.md) &ndash; Writes an error message to the output.
- [CommitWizard::msgSuccess](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgSuccess.md) &ndash; Writes a success message to the output.
- [CommitWizard::error](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/error.md) &ndash; Throws an exception.
- [CommitWizard::getOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/getOutput.md) &ndash; Returns the current output interface.
- [CommitWizard::commitAllPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitAllPlanets.md) &ndash; Commit all planets using the kpp routine.





Location
=============
Ling\LingTalfi\Kaos\Util\CommitWizard<br>
See the source code of [Ling\LingTalfi\Kaos\Util\CommitWizard](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/CommitWizard.php)



SeeAlso
==============
Previous class: [PreferencesTool](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Tool/PreferencesTool.md)<br>Next class: [ReadmeUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil.md)<br>
