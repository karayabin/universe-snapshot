[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md)


CustomItemApiInterface::getProductListItems
================



CustomItemApiInterface::getProductListItems — Returns the [list useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-useful-information) array for a product query, with some extra properties added to it.




Description
================


abstract public [CustomItemApiInterface::getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductListItems.md)(?array $options = []) : array




Returns the [list useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-useful-information) array for a product query, with some extra properties added to it.
The extra properties are:
- orderByPublicMap: an array of key => label. The keys can be used to trigger different sorting of the query (see the implementation source code for more details).
     The label is just a human friendly string describing the effect of the sort.
- orderByReal: string, the orderBy really used by the query. That's because the user can give us unexpected orderby values.



The returned rows are optimized for displaying in a product list page.

The returned fields are:

aliases used:
 - lks_item = i
 - lks_author = a


- i.id
- i.label
- i.slug
- i.reference
- i.price_in_euro
- i.screenshots

- a.label as author_label
- a.author_name as author_name
- ratings, string|null: a csv string where each components is a rating/nb_rating colon separated key/value pair (i.e., 1:2, 2:2, 3:1, 5:4)
- avg_rating: string|null, the average rating value for this item, or null if this item has no rating
- nb_ratings: string|null, the number of ratings on this item, or null if no ratings



Available options are:


- author: string=null, the author_name. If set, will return only items owned by the specified author.
- status: string=1, the status of the items to return (see our conception notes for more details)
- search: string='', a search filter to apply to the results (we search in i.label and i.reference for now).
         An empty string means no search filter applied.
- orderBy: string=_default, an orderBy sort to apply to the query, can be one of:
     - _default: (by default), ordered by i.front_importance desc, i.id asc
     - newest: the newest first, based on their i.post_datetime value
     - price_increasing: self explanatory
     - price_decreasing: self explanatory
     - avg_rating: self explanatory
- page: int=1, the number of the page to display. If null, the first page will be displayed.
- pageLength: int=50, the number of items per page
- itemTypes: array|string=*: the item types to search in. If *, then all types are searched in




Parameters
================


- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [CustomItemApiInterface::getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomItemApiInterface.php#L73-L73)


See Also
================

The [CustomItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md) class.

Next method: [getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductInfoById.md)<br>

