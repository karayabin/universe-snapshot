[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Util\ServiceManagerUtil class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md)


ServiceManagerUtil::addConfigHook
================



ServiceManagerUtil::addConfigHook — Adds a hook to the given service name, with the given methodItem.




Description
================


public [ServiceManagerUtil::addConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigHook.md)(string $serviceName, array $methodItem) : void




Adds a hook to the given service name, with the given methodItem.
It assumes a [standard service config file](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#standard-service-configuration-file) environment.

The methodItem structure:

- method: string, the name of the method (we will use the methods_collection technique see the [Light documentation](https://github.com/lingtalfi/Light) for more info).
- ?args: array of arguments, if any, for the aforementioned method




Parameters
================


- serviceName

    

- methodItem

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ServiceManagerUtil::addConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Util/ServiceManagerUtil.php#L625-L663)


See Also
================

The [ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md) class.

Previous method: [addConfigOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigOption.md)<br>Next method: [getCooker](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/getCooker.md)<br>

