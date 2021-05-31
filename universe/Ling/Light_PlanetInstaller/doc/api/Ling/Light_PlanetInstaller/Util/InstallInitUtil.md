[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The InstallInitUtil class
================
2020-12-08 --> 2021-05-31






Introduction
============

The InstallInitUtil class.



Class synopsis
==============


class <span class="pl-k">InstallInitUtil</span>  {

- Methods
    - public [installInit](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/installInit.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $appDir, string $sessionDir, string $planetDotName) : int
    - private [exec](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/exec.md)(string $command) : int
    - private [processInitError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/processInitError.md)(string $errorType, string $sessionDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/error.md)(string $msg, ?int $code = null) : void

}






Methods
==============

- [InstallInitUtil::installInit](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/installInit.md) &ndash; See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.
- [InstallInitUtil::exec](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/exec.md) &ndash; Executes the given command, and returns the unix code.
- [InstallInitUtil::processInitError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/processInitError.md) &ndash; Writes an error message to the output, depending on the given error type.
- [InstallInitUtil::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Util\InstallInitUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\InstallInitUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/InstallInitUtil.php)



SeeAlso
==============
Previous class: [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)<br>Next class: [TimConflictsReader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader.md)<br>
