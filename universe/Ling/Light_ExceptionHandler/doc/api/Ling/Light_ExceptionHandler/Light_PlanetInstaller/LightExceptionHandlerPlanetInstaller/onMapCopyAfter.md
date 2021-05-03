[Back to the Ling/Light_ExceptionHandler api](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler.md)<br>
[Back to the Ling\Light_ExceptionHandler\Light_PlanetInstaller\LightExceptionHandlerPlanetInstaller class](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller.md)


LightExceptionHandlerPlanetInstaller::onMapCopyAfter
================



LightExceptionHandlerPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightExceptionHandlerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
It was first designed to allow  plugin authors to configure their light's service's conf file before the "logic installs" starts.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- appDir

    

- output

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightExceptionHandlerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller.php#L22-L35)


See Also
================

The [LightExceptionHandlerPlanetInstaller](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller.md) class.



