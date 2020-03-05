[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md)


LightChloroformExtensionService::getTableListItems
================



LightChloroformExtensionService::getTableListItems — Returns an array of rows based on the given tableListIdentifier.




Description
================


public [LightChloroformExtensionService::getTableListItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListItems.md)(string $tableListIdentifier, ?string $userQuery = , ?bool $valueAsIndex = true) : array




Returns an array of rows based on the given tableListIdentifier.
The returned array structure depends on the valueAsIndex flag.

If valueAsIndex=true, then it's an array of value => label.
If valueAsIndex=false, then it's an array of rows, each of which containing:
     - value: the value
     - label: the label




Parameters
================


- tableListIdentifier

    

- userQuery

    

- valueAsIndex

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightChloroformExtensionService::getTableListItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Service/LightChloroformExtensionService.php#L106-L120)


See Also
================

The [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md) class.

Previous method: [getTableListNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListNumberOfItems.md)<br>Next method: [getTableListLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListLabel.md)<br>

