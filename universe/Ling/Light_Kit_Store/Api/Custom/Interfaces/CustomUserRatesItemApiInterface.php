<?php


namespace Ling\Light_Kit_Store\Api\Custom\Interfaces;

use Ling\Light_Kit_Store\Api\Generated\Interfaces\UserRatesItemApiInterface;


/**
 * The CustomUserRatesItemApiInterface interface.
 */
interface CustomUserRatesItemApiInterface extends UserRatesItemApiInterface
{


    /**
     * Returns the rows of the lks_user_rates_item matching the given itemId.
     *
     * Each row contains the following extra properties:
     * - rating_name: the user rating name
     *
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param string $itemId
     * @param array $components
     * @return array
     */
    public function getCustomUserRatesItemsByItemId(string $itemId, array $components = []): array;


    /**
     * Returns the @page(list super useful information) array for item ratings.
     *
     * The returned fields for each row are:
     *
     * - id: int
     * - user_id: int
     * - item_id: int
     * - rating: int
     * - rating_title: string
     * - rating_name: string, the user's rating name
     * - rating_comment: string
     * - datetime: string, the datetime of the rating
     *
     * Available options are:
     *
     *
     * - search: string='', a search filter to apply to the results (we search in rating title, rating comments and rating_name for now).
     *          An empty string means no search filter applied.
     * - orderBy: string=_default, an orderBy sort to apply to the query, can be one of:
     *      - _default: (by default), datetime desc
     *      - ratings: rating desc
     * - page: int=1, the number of the page to display. If null, the first page will be displayed.
     * - pageLength: int=50, the number of items per page
     * - rating: string (all|1|2|3|4|5) = all. If it's a specific number, only reviews with the specified rating will be returned.
     *
     *
     *
     * @param string $itemId
     * @param array $options
     * @return array
     */
    public function getUserRatesItemsListByItemId(string $itemId, array $options = []): array;

    /**
     * Returns the number of reviews written for the given item.
     *
     * @param int $itemId
     * @return int
     */
    public function countReviewsByItemId(int $itemId): int;
}
