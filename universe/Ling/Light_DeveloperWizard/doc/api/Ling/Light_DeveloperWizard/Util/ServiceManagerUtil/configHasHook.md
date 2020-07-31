[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Util\ServiceManagerUtil class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md)


ServiceManagerUtil::configHasHook
================



ServiceManagerUtil::configHasHook — Returns whether the service config has a hook to the given service.




Description
================


public [ServiceManagerUtil::configHasHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasHook.md)(string $serviceName, ?array $options = []) : bool




Returns whether the service config has a hook to the given service.

Available options are:
- with: array defining a method that the hook service must have (i.e. if the service doesn't have that method, this method returns false)
     It's an array with the following entries:
     - method: string, the method name
     - ?args: array of key value pairs representing the arguments that the defined method must have for this method to return true.
         If args is defined, this method returns true only if all those args are present in the config file




Parameters
================


- serviceName

    

- options

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [ServiceManagerUtil::configHasHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Util/ServiceManagerUtil.php#L513-L550)


See Also
================

The [ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md) class.

Previous method: [configHasOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasOption.md)<br>Next method: [configHasBannerComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasBannerComment.md)<br>

