[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Command\InstallInit2Command class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit2Command.md)


InstallInit2Command::doRun
================



InstallInit2Command::doRun — Executes the init 2 phase of the install procedure.




Description
================


protected [InstallInit2Command::doRun](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit2Command/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : int




Executes the init 2 phase of the install procedure.

See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.

If an exception is thrown during this process, we catch it and write it at the root of the session dir,
in file named:

- init2.error.txt

If such an error is written, this method return the code 34 (otherwise if no problem it returns 0).




Parameters
================


- input

    

- output

    


Return values
================

Returns int.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [InstallInit2Command::doRun](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/InstallInit2Command.php#L45-L49)


See Also
================

The [InstallInit2Command](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit2Command.md) class.

Next method: [getDescription](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit2Command/getDescription.md)<br>

