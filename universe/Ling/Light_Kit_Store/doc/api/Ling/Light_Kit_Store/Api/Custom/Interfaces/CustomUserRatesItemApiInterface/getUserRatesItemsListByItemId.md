[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserRatesItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.md)


CustomUserRatesItemApiInterface::getUserRatesItemsListByItemId
================



CustomUserRatesItemApiInterface::getUserRatesItemsListByItemId — Returns the [list super useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-super-useful-information) array for item ratings.




Description
================


abstract public [CustomUserRatesItemApiInterface::getUserRatesItemsListByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getUserRatesItemsListByItemId.md)(string $itemId, ?array $options = []) : array




Returns the [list super useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-super-useful-information) array for item ratings.

The returned fields for each row are:

- id: int
- user_id: int
- item_id: int
- rating: int
- rating_title: string
- rating_name: string, the user's rating name
- rating_comment: string
- datetime: string, the datetime of the rating

Available options are:


- search: string='', a search filter to apply to the results (we search in rating title, rating comments and rating_name for now).
         An empty string means no search filter applied.
- orderBy: string=_default, an orderBy sort to apply to the query, can be one of:
     - _default: (by default), datetime desc
     - ratings: rating desc
- page: int=1, the number of the page to display. If null, the first page will be displayed.
- pageLength: int=50, the number of items per page
- rating: string (all|1|2|3|4|5) = all. If it's a specific number, only reviews with the specified rating will be returned.




Parameters
================


- itemId

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [CustomUserRatesItemApiInterface::getUserRatesItemsListByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.php#L63-L63)


See Also
================

The [CustomUserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.md) class.

Previous method: [getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getCustomUserRatesItemsByItemId.md)<br>Next method: [countReviewsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/countReviewsByItemId.md)<br>

