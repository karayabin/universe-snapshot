[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelper class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)


GemHelper::getCustomConfigValue
================



GemHelper::getCustomConfigValue — Returns the custom config value corresponding to the given key.




Description
================


public [GemHelper::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfigValue.md)(string $key, ?bool $throwEx = true) : mixed




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
See the source code for method [GemHelper::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php#L341-L351)


See Also
================

The [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) class.

Previous method: [getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfig.md)<br>Next method: [executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeNameValidationRule.md)<br>

