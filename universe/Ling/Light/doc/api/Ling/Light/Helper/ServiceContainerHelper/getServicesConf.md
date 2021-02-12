[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ServiceContainerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md)


ServiceContainerHelper::getServicesConf
================



ServiceContainerHelper::getServicesConf — Returns the service configuration array based on files in $appDir/config/services.




Description
================


private static [ServiceContainerHelper::getServicesConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getServicesConf.md)(string $appDir, ?array $options = []) : array




Returns the service configuration array based on files in $appDir/config/services.

Available options are:
- environment: string=null, the name of the environment to use




Parameters
================


- appDir

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ServiceContainerHelper::getServicesConf](https://github.com/lingtalfi/Light/blob/master/Helper/ServiceContainerHelper.php#L128-L164)


See Also
================

The [ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md) class.

Previous method: [getInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getInstance.md)<br>Next method: [buildDarkBlueContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/buildDarkBlueContainer.md)<br>

