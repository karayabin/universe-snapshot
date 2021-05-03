[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The CommitWizard class
================
2019-03-13 --> 2021-03-22






Introduction
============

The CommitWizard class.



Class synopsis
==============


class <span class="pl-k">CommitWizard</span>  {

- Properties
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)|null [$output](#property-output) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [commit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commit.md)(string $planetDotName, string $commitMessage) : void
    - public [commitCurrentByPlanetDir](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitCurrentByPlanetDir.md)(string $planetDir) : void
    - private [msg](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msg.md)(string $msg) : void
    - private [msgError](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgError.md)(string $msg) : void
    - private [msgSuccess](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgSuccess.md)(string $msg) : void
    - private [error](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/error.md)(string $msg, ?int $code = null) : void
    - private [execc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/execc.md)(string $cmd) : void
    - private [getOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/getOutput.md)() : [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)

}




Properties
=============

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    



Methods
==============

- [CommitWizard::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/__construct.md) &ndash; Builds the CommitWizard instance.
- [CommitWizard::setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/setOutput.md) &ndash; Sets the output.
- [CommitWizard::commit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commit.md) &ndash; Commits the given planet with the given message.
- [CommitWizard::commitCurrentByPlanetDir](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitCurrentByPlanetDir.md) &ndash; Commits the given planet.
- [CommitWizard::msg](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msg.md) &ndash; Writes a message to the output.
- [CommitWizard::msgError](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgError.md) &ndash; Writes an error message to the output.
- [CommitWizard::msgSuccess](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/msgSuccess.md) &ndash; Writes a success message to the output.
- [CommitWizard::error](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/error.md) &ndash; Throws an exception.
- [CommitWizard::execc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/execc.md) &ndash; Executes the given command, and writes its display to the output.
- [CommitWizard::getOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/getOutput.md) &ndash; Returns the current output interface.





Location
=============
Ling\LingTalfi\Kaos\Util\CommitWizard<br>
See the source code of [Ling\LingTalfi\Kaos\Util\CommitWizard](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/CommitWizard.php)



SeeAlso
==============
Previous class: [PreferencesTool](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Tool/PreferencesTool.md)<br>Next class: [ReadmeUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil.md)<br>
