[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The ServiceContainerHelper class
================
2019-04-09 --> 2020-02-24






Introduction
============

The ServiceContainerHelper class.



Class synopsis
==============


class <span class="pl-k">ServiceContainerHelper</span>  {

- Methods
    - public static [getInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getInstance.md)(string $appDir, ?array $options = []) : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - private static [getServicesConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getServicesConf.md)(string $appDir) : array
    - private static [buildDarkBlueContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/buildDarkBlueContainer.md)(string $appDir, array $conf) : void
    - private static [getDarkBlueContainerPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getDarkBlueContainerPath.md)(string $appDir) : string
    - private static [getDarkBlueInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getDarkBlueInstance.md)(string $appDir) : [BlueOctopusServiceContainer](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/BlueOctopusServiceContainer.php)
    - private static [createHashMap](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/createHashMap.md)(string $appDir, string $dstFile) : void

}






Methods
==============

- [ServiceContainerHelper::getInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getInstance.md) &ndash; Returns an instance of a service container according to the given options.
- [ServiceContainerHelper::getServicesConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getServicesConf.md) &ndash; Returns the service configuration array based on files in $appDir/config/services.
- [ServiceContainerHelper::buildDarkBlueContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/buildDarkBlueContainer.md) &ndash; Builds the dark blue service container.
- [ServiceContainerHelper::getDarkBlueContainerPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getDarkBlueContainerPath.md) &ndash; Returns the path to the dark blue service container.
- [ServiceContainerHelper::getDarkBlueInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getDarkBlueInstance.md) &ndash; 
- [ServiceContainerHelper::createHashMap](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/createHashMap.md) &ndash; Creates a hash map for the given services configuration files (in $appDir/config/services).





Location
=============
Ling\Light\Helper\ServiceContainerHelper<br>
See the source code of [Ling\Light\Helper\ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/Helper/ServiceContainerHelper.php)



SeeAlso
==============
Previous class: [LightHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper.md)<br>Next class: [HttpAttachmentResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse.md)<br>
