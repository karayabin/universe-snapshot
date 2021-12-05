[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\Front\StoreSearchResultsController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreSearchResultsController.md)


StoreSearchResultsController::prepareRender
================



StoreSearchResultsController::prepareRender — Returns the items part of the [list super useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-super-useful-information) array for a product list query, and set some common controller variables.




Description
================


protected [StoreSearchResultsController::prepareRender](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreSearchResultsController/prepareRender.md)(Ling\Light\Http\HttpRequestInterface $request, ?array $options = []) : array




Returns the items part of the [list super useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-super-useful-information) array for a product list query, and set some common controller variables.

Available options are:
- itemTypes: a string containing the item types to filter the query with. For instance: 1, 12, 13 123, ...




Parameters
================


- request

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [StoreSearchResultsController::prepareRender](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/Front/StoreSearchResultsController.php#L54-L104)


See Also
================

The [StoreSearchResultsController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreSearchResultsController.md) class.

Previous method: [render](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreSearchResultsController/render.md)<br>Next method: [itemTypesToArray](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreSearchResultsController/itemTypesToArray.md)<br>

