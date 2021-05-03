[Back to the Ling/Light_LingHooks api](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks.md)<br>
[Back to the Ling\Light_LingHooks\Light_PlanetInstaller\LightLingHooksPlanetInstaller class](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller.md)


LightLingHooksPlanetInstaller::onMapCopyAfter
================



LightLingHooksPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightLingHooksPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightLingHooksPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_LingHooks/blob/master/Light_PlanetInstaller/LightLingHooksPlanetInstaller.php#L22-L33)


See Also
================

The [LightLingHooksPlanetInstaller](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller.md) class.



