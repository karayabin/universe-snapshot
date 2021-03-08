[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)<br>
[Back to the Ling\Light_AjaxHandler\Light_PlanetInstaller\LightAjaxHandlerPlanetInstaller class](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Light_PlanetInstaller/LightAjaxHandlerPlanetInstaller.md)


LightAjaxHandlerPlanetInstaller::onMapCopyAfter
================



LightAjaxHandlerPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightAjaxHandlerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Light_PlanetInstaller/LightAjaxHandlerPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightAjaxHandlerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Light_PlanetInstaller/LightAjaxHandlerPlanetInstaller.php#L22-L29)


See Also
================

The [LightAjaxHandlerPlanetInstaller](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Light_PlanetInstaller/LightAjaxHandlerPlanetInstaller.md) class.



