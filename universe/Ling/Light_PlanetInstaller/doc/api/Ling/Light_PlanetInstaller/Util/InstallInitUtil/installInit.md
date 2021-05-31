[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\InstallInitUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil.md)


InstallInitUtil::installInit
================



InstallInitUtil::installInit — See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.




Description
================


public [InstallInitUtil::installInit](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/installInit.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $appDir, string $sessionDir, string $planetDotName) : int




Triggers the init phases (init1, init 2, init3) in order for the given planetDotName, and return a unix status code:

- 0: everything ok
- 41: init 3 failed
- 42: init 2 failed
- 43: init 1 failed


See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- output

    

- appDir

    

- sessionDir

    

- planetDotName

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [InstallInitUtil::installInit](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/InstallInitUtil.php#L36-L73)


See Also
================

The [InstallInitUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil.md) class.

Next method: [exec](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil/exec.md)<br>

