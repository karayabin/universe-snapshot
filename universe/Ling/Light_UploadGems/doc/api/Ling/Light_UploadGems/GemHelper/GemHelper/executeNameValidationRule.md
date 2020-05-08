[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelper class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)


GemHelper::executeNameValidationRule
================



GemHelper::executeNameValidationRule — and return a boolean result.




Description
================


private [GemHelper::executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeNameValidationRule.md)(string $validationRuleName, $parameter, string $filename, ?string &$errorMessage = null) : bool




Check whether the given filename is valid according to the given rule name and parameter,
and return a boolean result.

If not valid, the error message is set to explain the cause of the validation problem.




Parameters
================


- validationRuleName

    

- parameter

    

- filename

    

- errorMessage

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [GemHelper::executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php#L329-L367)


See Also
================

The [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) class.

Previous method: [getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfigValue.md)<br>Next method: [executeValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeValidationRule.md)<br>

