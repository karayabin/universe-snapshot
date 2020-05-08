[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperInterface class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)


GemHelperInterface::getCustomConfigValue
================



GemHelperInterface::getCustomConfigValue — Returns the custom config value corresponding to the given key.




Description
================


abstract public [GemHelperInterface::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfigValue.md)(string $key, ?bool $throwEx = true) : mixed




Returns the custom config value corresponding to the given key.

If the key doesn't exist:
- it throws an exception if the throwEx flag is set to true
- it returns null if the throwEx flag is set to false




Parameters
================


- key

    

- throwEx

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [GemHelperInterface::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php#L41-L41)


See Also
================

The [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) class.

Previous method: [getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfig.md)<br>Next method: [applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameTransform.md)<br>

