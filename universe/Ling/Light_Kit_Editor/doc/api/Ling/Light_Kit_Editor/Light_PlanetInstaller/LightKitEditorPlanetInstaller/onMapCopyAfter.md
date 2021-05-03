[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Light_PlanetInstaller\LightKitEditorPlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_PlanetInstaller/LightKitEditorPlanetInstaller.md)


LightKitEditorPlanetInstaller::onMapCopyAfter
================



LightKitEditorPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitEditorPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_PlanetInstaller/LightKitEditorPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitEditorPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Light_PlanetInstaller/LightKitEditorPlanetInstaller.php#L21-L33)


See Also
================

The [LightKitEditorPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_PlanetInstaller/LightKitEditorPlanetInstaller.md) class.



