[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Util\ServiceManagerUtil class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md)


ServiceManagerUtil::addConfigOption
================



ServiceManagerUtil::addConfigOption — Adds the option with the given name and value to the "setOptions" method in the service configuration file.




Description
================


public [ServiceManagerUtil::addConfigOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigOption.md)(string $name, $value, ?array $options = []) : void




Adds the option with the given name and value to the "setOptions" method in the service configuration file.

Available options are:
- inlineComment: string=null, a comment to add inline, next to the value. Its first non-whitespace char must be a hash.




Parameters
================


- name

    

- value

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ServiceManagerUtil::addConfigOption](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Util/ServiceManagerUtil.php#L602-L627)


See Also
================

The [ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md) class.

Previous method: [configHasBannerComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/configHasBannerComment.md)<br>Next method: [addConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addConfigHook.md)<br>

