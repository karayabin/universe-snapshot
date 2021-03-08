[Back to the Ling/Light_ControllerHub api](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub.md)<br>
[Back to the Ling\Light_ControllerHub\Light_PlanetInstaller\LightControllerHubPlanetInstaller class](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller.md)


LightControllerHubPlanetInstaller::onMapCopyAfter
================



LightControllerHubPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightControllerHubPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightControllerHubPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_ControllerHub/blob/master/Light_PlanetInstaller/LightControllerHubPlanetInstaller.php#L22-L29)


See Also
================

The [LightControllerHubPlanetInstaller](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller.md) class.



