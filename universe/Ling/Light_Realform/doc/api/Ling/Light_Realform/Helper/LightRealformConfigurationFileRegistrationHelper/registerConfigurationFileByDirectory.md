[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Helper\LightRealformConfigurationFileRegistrationHelper class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Helper/LightRealformConfigurationFileRegistrationHelper.md)


LightRealformConfigurationFileRegistrationHelper::registerConfigurationFileByDirectory
================



LightRealformConfigurationFileRegistrationHelper::registerConfigurationFileByDirectory — Registers the planet by copying the given dir content to the expected location.




Description
================


public static [LightRealformConfigurationFileRegistrationHelper::registerConfigurationFileByDirectory](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Helper/LightRealformConfigurationFileRegistrationHelper/registerConfigurationFileByDirectory.md)(Ling\CliTools\Output\OutputInterface $output, string $appDir, string $planetDotName, string $dir) : void




Registers the planet by copying the given dir content to the expected location.

See more details in the [Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md).

The given dir should contain only babyYaml files representing realform config files.
Sub-directories are allowed, but only files will be copied.




Parameters
================


- output

    

- appDir

    

- planetDotName

    

- dir

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightRealformConfigurationFileRegistrationHelper::registerConfigurationFileByDirectory](https://github.com/lingtalfi/Light_Realform/blob/master/Helper/LightRealformConfigurationFileRegistrationHelper.php#L32-L49)


See Also
================

The [LightRealformConfigurationFileRegistrationHelper](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Helper/LightRealformConfigurationFileRegistrationHelper.md) class.

Next method: [unregisterConfigurationFileByDirectory](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Helper/LightRealformConfigurationFileRegistrationHelper/unregisterConfigurationFileByDirectory.md)<br>

