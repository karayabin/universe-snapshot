[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Command\ExploreConflictsCommand class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand.md)


ExploreConflictsCommand::stepMain
================



ExploreConflictsCommand::stepMain — Prints the main step gui.




Description
================


private [ExploreConflictsCommand::stepMain](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepMain.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void




Prints the main step gui.

Available options are:
- invalid: bool=false. If true, the prompt will tell the user that his answer is invalid and ask to try again.
         If true, by default, the prompt will ask the user for a number (of the planet to investigate).
         This is a trick I use which allows me to clean the console screen, and let the user know that his answer was wrong, and that he should try again.




Parameters
================


- output

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ExploreConflictsCommand::stepMain](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/ExploreConflictsCommand.php#L118-L171)


See Also
================

The [ExploreConflictsCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand.md) class.

Previous method: [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/getParameters.md)<br>Next method: [stepConflictDetail](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepConflictDetail.md)<br>

