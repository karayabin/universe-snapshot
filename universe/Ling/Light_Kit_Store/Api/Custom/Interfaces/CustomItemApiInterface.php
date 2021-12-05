<?php


namespace Ling\Light_Kit_Store\Api\Custom\Interfaces;

use Ling\Light_Kit_Store\Api\Generated\Interfaces\ItemApiInterface;


/**
 * The CustomItemApiInterface interface.
 */
interface CustomItemApiInterface extends ItemApiInterface
{


    /**
     * Returns the @page(list useful information) array for a product query, with some extra properties added to it.
     * The extra properties are:
     * - orderByPublicMap: an array of key => label. The keys can be used to trigger different sorting of the query (see the implementation source code for more details).
     *      The label is just a human friendly string describing the effect of the sort.
     * - orderByReal: string, the orderBy really used by the query. That's because the user can give us unexpected orderby values.
     *
     *
     *
     * The returned rows are optimized for displaying in a product list page.
     *
     * The returned fields are:
     *
     * aliases used:
     *  - lks_item = i
     *  - lks_author = a
     *
     *
     * - i.id
     * - i.label
     * - i.slug
     * - i.reference
     * - i.price_in_euro
     * - i.screenshots
     *
     * - a.label as author_label
     * - a.author_name as author_name
     * - ratings, string|null: a csv string where each components is a rating/nb_rating colon separated key/value pair (i.e., 1:2, 2:2, 3:1, 5:4)
     * - avg_rating: string|null, the average rating value for this item, or null if this item has no rating
     * - nb_ratings: string|null, the number of ratings on this item, or null if no ratings
     *
     *
     *
     * Available options are:
     *
     *
     * - author: string=null, the author_name. If set, will return only items owned by the specified author.
     * - status: string=1, the status of the items to return (see our conception notes for more details)
     * - search: string='', a search filter to apply to the results (we search in i.label and i.reference for now).
     *          An empty string means no search filter applied.
     * - orderBy: string=_default, an orderBy sort to apply to the query, can be one of:
     *      - _default: (by default), ordered by i.front_importance desc, i.id asc
     *      - newest: the newest first, based on their i.post_datetime value
     *      - price_increasing: self explanatory
     *      - price_decreasing: self explanatory
     *      - avg_rating: self explanatory
     * - page: int=1, the number of the page to display. If null, the first page will be displayed.
     * - pageLength: int=50, the number of items per page
     * - itemTypes: array|string=*: the item types to search in. If *, then all types are searched in
     *
     *
     *
     *
     *
     * @param array $options
     * @return array
     */
    public function getProductListItems(array $options = []): array;


    /**
     * Returns information about the product.
     *
     * The returned fields are:
     *
     * - id
     * - label
     * - slug
     * - description
     * - reference
     * - price_in_euro
     * - screenshots: @page(smart screenshots)
     * - author_label: string, the author label
     * - author_name: string, the author name
     * - ratings, string|null: a csv string where each components is a rating/nb_rating colon separated key/value pair (i.e., 1:2, 2:2, 3:1, 5:4)
     * - avg_rating: the average rating value for this item, or null if this item has no rating
     * - avg_rating: string|null, the average rating value for this item, or null if this item has no rating
     * - nb_ratings: string|null, the number of ratings on this item, or null if no ratings
 *
     *
     * Available options are:
     * - imageSizes: bool=false. If true, the screenshots array items are augmented with the following properties for type=photo:
     *      - largeWidth: width of the large image in pixel, or 0 if the file is not found
     *      - largeHeight: height of the large image in pixel, or 0 if the file is not found
     *
     *
     *
     * @param int $itemId
     * @param array $options
     * @return array
     */
    public function getProductInfoById(int $itemId, array $options = []): array;
}
