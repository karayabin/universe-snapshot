[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserRatesItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.md)


CustomUserRatesItemApiInterface::getCustomUserRatesItemsByItemId
================



CustomUserRatesItemApiInterface::getCustomUserRatesItemsByItemId — Returns the rows of the lks_user_rates_item matching the given itemId.




Description
================


abstract public [CustomUserRatesItemApiInterface::getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getCustomUserRatesItemsByItemId.md)(string $itemId, ?array $components = []) : array




Returns the rows of the lks_user_rates_item matching the given itemId.

Each row contains the following extra properties:
- rating_name: the user rating name

The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).




Parameters
================


- itemId

    

- components

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [CustomUserRatesItemApiInterface::getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.php#L28-L28)


See Also
================

The [CustomUserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.md) class.

Next method: [getUserRatesItemsListByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getUserRatesItemsListByItemId.md)<br>

