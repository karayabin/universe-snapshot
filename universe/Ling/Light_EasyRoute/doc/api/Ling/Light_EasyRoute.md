Ling/Light_EasyRoute
================
2019-08-21 --> 2021-07-27




Table of contents
===========

- [LightEasyRouteException](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Exception/LightEasyRouteException.md) &ndash; The LightEasyRouteException class.
- [LightEasyRouteHelper](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper.md) &ndash; The LightEasyRouteHelper class.
    - [LightEasyRouteHelper::guessRoutePrefix](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/guessRoutePrefix.md) &ndash; A route prefix is a namespace that your planet uses to distinguish its routes from other planets' routes.
    - [LightEasyRouteHelper::writeRouteToPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/writeRouteToPluginFile.md) &ndash; Writes a route to the plugin file.
    - [LightEasyRouteHelper::getPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getPluginFile.md) &ndash; Returns the expected plugin file for registering routes with our open registration system.
    - [LightEasyRouteHelper::copyRoutesFromPluginToMaster](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/copyRoutesFromPluginToMaster.md) &ndash; Merges the planet's route declaration file (if it exists) into the master.
    - [LightEasyRouteHelper::removeRoutesFromMaster](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/removeRoutesFromMaster.md) &ndash; Removes the planet's route declaration file (if it exists) into the master.
    - [LightEasyRouteHelper::getMasterPath](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getMasterPath.md) &ndash; Returns the path to the routes master declaration file.
    - [LightEasyRouteHelper::getMasterRelativePath](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getMasterRelativePath.md) &ndash; Returns the relative path (from the app root dir) to the master.
- [LightEasyRouteService](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService.md) &ndash; The LightEasyRouteService class.
    - [LightEasyRouteService::__construct](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/__construct.md) &ndash; Builds the LightEasyRouteService instance.
    - [LightEasyRouteService::setContainer](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/setContainer.md) &ndash; Sets the container.
    - [LightEasyRouteService::initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/initialize.md) &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightEasyRouteService::registerBundleFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerBundleFile.md) &ndash; Adds a bundle file.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [Digger](https://github.com/lingtalfi/Digger)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Vars](https://github.com/lingtalfi/Light_Vars)


