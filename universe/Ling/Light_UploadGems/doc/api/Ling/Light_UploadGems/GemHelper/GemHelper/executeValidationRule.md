[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelper class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)


GemHelper::executeValidationRule
================



GemHelper::executeValidationRule — and return a boolean result.




Description
================


private [GemHelper::executeValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeValidationRule.md)(string $validationRuleName, $parameter, string $path, ?string &$errorMessage = null) : bool




Check whether the file (which path is given) is valid according to the given rule name and parameter,
and return a boolean result.

If the file is not valid, the error message is set to explain the cause of the validation problem.




Parameters
================


- validationRuleName

    

- parameter

    

- path

    

- errorMessage

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [GemHelper::executeValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php#L384-L419)


See Also
================

The [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) class.

Previous method: [executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeNameValidationRule.md)<br>Next method: [getTransformedName](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getTransformedName.md)<br>

