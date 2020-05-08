[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\PhpStormMeta\PhpStormMetaHelper class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/PhpStormMeta/PhpStormMetaHelper.md)


PhpStormMetaHelper::getPhpStormMetaMapString
================



PhpStormMetaHelper::getPhpStormMetaMapString — $container->get("my_service")-> // phpstorm will autocomplete with the methods of that service...




Description
================


public static [PhpStormMetaHelper::getPhpStormMetaMapString](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/PhpStormMeta/PhpStormMetaHelper/getPhpStormMetaMapString.md)(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : string




This method generates the content of a .phpstorm.meta.php file that maps the service names of the given container
to the corresponding class, thus allowing us to do this:

$container->get("my_service")-> // phpstorm will autocomplete with the methods of that service...



See https://www.jetbrains.com/help/phpstorm/ide-advanced-metadata.html#map for more details.




Parameters
================


- container

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [PhpStormMetaHelper::getPhpStormMetaMapString](https://github.com/lingtalfi/LingTalfi/blob/master/PhpStormMeta/PhpStormMetaHelper.php#L36-L98)


See Also
================

The [PhpStormMetaHelper](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/PhpStormMeta/PhpStormMetaHelper.md) class.



