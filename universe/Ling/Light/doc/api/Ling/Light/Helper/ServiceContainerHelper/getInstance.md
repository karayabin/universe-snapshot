[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ServiceContainerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md)


ServiceContainerHelper::getInstance
================



ServiceContainerHelper::getInstance — Returns an instance of a service container according to the given options.




Description
================


public static [ServiceContainerHelper::getInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getInstance.md)(string $appDir, array $options = []) : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)




Returns an instance of a service container according to the given options.

The options is an array with the following structure:

- type: string. Defines the type of service container to return.
- red: will return a RedOctopusServiceContainer
- blue: (default value) will return a BlueOctopusServiceContainer.
- blueMode: string. Defines how the blue service container is re-created  (only applies if type=blue).
- create: will re-create the service container every time
- frozen: (default value) will never re-create the service container once it exists
- auto: if the environment is dev: will recreate the service container only if the service configuration
has changed, and if environment is not dev, then will use the frozen mode.




Parameters
================


- appDir

    

- options

    


Return values
================

Returns [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md).


Exceptions thrown
================

- [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md).&nbsp;







See Also
================

The [ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md) class.

Next method: [getServicesConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getServicesConf.md)<br>

