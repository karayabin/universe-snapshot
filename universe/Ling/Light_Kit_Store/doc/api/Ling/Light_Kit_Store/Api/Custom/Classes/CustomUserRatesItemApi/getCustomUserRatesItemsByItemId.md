[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserRatesItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserRatesItemApi.md)


CustomUserRatesItemApi::getCustomUserRatesItemsByItemId
================



CustomUserRatesItemApi::getCustomUserRatesItemsByItemId — Returns the rows of the lks_user_rates_item matching the given itemId.




Description
================


public [CustomUserRatesItemApi::getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserRatesItemApi/getCustomUserRatesItemsByItemId.md)(string $itemId, ?array $components = []) : array




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
See the source code for method [CustomUserRatesItemApi::getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Classes/CustomUserRatesItemApi.php#L30-L51)


See Also
================

The [CustomUserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserRatesItemApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserRatesItemApi/__construct.md)<br>Next method: [getUserRatesItemsListByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserRatesItemApi/getUserRatesItemsListByItemId.md)<br>

