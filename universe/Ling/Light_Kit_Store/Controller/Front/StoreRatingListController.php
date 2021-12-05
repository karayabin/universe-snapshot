<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;


/**
 * The StoreRatingListController class.
 */
class StoreRatingListController extends StoreProductPageController
{


    /**
     * Renders the home page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {

        $itemId = $request->getGetValue("id") ?? null;
        $rating = $request->getGetValue("rating") ?? 'all';
        if (null === $itemId) {
            return $this->getRedirectResponse("404");
        }

        $item = $this->getItem($itemId, [
            'useReviews' => false,
        ]);


        if (null === $item) {
            return $this->getRedirectResponse("404_product");
        }


        $ratingFilterMap = $this->getRatingFilterMap();
        if (false === array_key_exists($rating, $ratingFilterMap)) {
            $rating = 'all';
        }


        return $this->renderPage("Ling.Light_Kit_Store/ratings", [
            "widgetVariables" => [
                "body.kitstore_ratings" => [
                    "item" => $item,
                    "orderBy" => "_default",
                    "orderByLabel" => "Most recent",
                    "orderByPublicMap" => [
                        "_default" => "Most recent",
                        "ratings" => "Highest rating",
                    ],
                    "ratingFilter" => $rating,
                    "ratingFilterLabel" => $ratingFilterMap[$rating],
                    "ratingFilterMap" => $ratingFilterMap,
                ],
            ],
            "dynamicVariables" => [
                "product_label" => "the product label",
            ]
        ]);
    }


    /**
     * This returns the array of information about ratings.
     *
     * This is an @page(alcp service).
     *
     *
     * The successful returned array is a @page(list superuseful information) array, plus the following properties:
     *
     * - nbRatings: int, the number of ratings returned by the (user driven) query
     * - nbReviews: int, the number of reviews returned by the (user driven) query
     * - ratingCrumb: string|int, its value depends on the rating selected by the user:
     *      - all: 0
     *      - 1: 1 star
     *      - 2: 2 star
     *      - ...
     *      - 5: 5 star
     * - rating: string, the rating used.
     * - sort: string, the sort used.
     * - html: string, the html to display (we use some template, and for now it's not possible to choose the template flavour)
     *
     *
     *
     * The input parameters are passed via POST:
     *
     * - item_id: int, the id of the item to extract the reviews from.
     * - page: int=1, the number of the page to display (in case there are a lot of reviews)
     * - search: string=''. An expression to filter the results. We search in the reviews titles and comments. If empty, no filter is applied.
     * - sort: string=_default, the sort used. Can be one of: _default (most recent to oldest), ratings (highest ratings desc)
     * - rating_filter: string=all, can be either the special string "all" for all ratings, or a number from 1 to 5 to filter by the rating.
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    public function renderRatings(HttpRequestInterface $request): HttpJsonResponse
    {

        $itemId = $request->getPostValue("item_id");


        $search = $request->getPostValue("search") ?? "";
        $sort = $request->getPostValue("sort") ?? "_default";
        $page = $request->getPostValue("page") ?? 1;
        $ratingFilter = $request->getPostValue("rating_filter") ?? "all";



        $ratingFilterMap = $this->getRatingFilterMap();
        if (false === array_key_exists($ratingFilter, $ratingFilterMap)) {
            $ratingFilter = 'all';
        }

        $error = null;
        $listSuperUsefulInfo = [];
        $html = '';
        try {


            $f = $this->getKitStoreService()->getFactory();
            $uriApi = $f->getUserRatesItemApi();
            $listSuperUsefulInfo = $uriApi->getUserRatesItemsListByItemId($itemId, [
                'search' => $search,
                'orderBy' => $sort,
                'page' => $page,
                'pageLength' => 8,
                'rating' => $ratingFilter,
            ]);
            $reviewItems = $listSuperUsefulInfo['rows'];
            ob_start();
            require_once $this->getContainer()->getApplicationDir() . "/templates/Ling.Light_Kit_Store/widgets/prototype/inc/review-items.php";
            $html = ob_get_clean();


        } catch (\Exception $e) {
            $error = "An exception occurred. See the logs for more information. Sorry for the inconvenience.";
            $this->logError($e);
        }


        $nbRatings = $listSuperUsefulInfo['nbItemsTotal'];
        $nbReviews = $uriApi->countReviewsByItemId($itemId);


        if (null !== $error) {
            return HttpJsonResponse::create([
                "type" => "error",
                "error" => $error,
            ]);
        }


        $ratingCrumb = (int)$ratingFilter;
        if (0 !== $ratingCrumb) {
            $ratingCrumb .= " star";
        }


        return HttpJsonResponse::create(array_merge($listSuperUsefulInfo, [
            "type" => "success",
            "nbRatings" => $nbRatings,
            "nbReviews" => $nbReviews,
            "ratingCrumb" => $ratingCrumb,
            "rating" => $ratingFilter,
            "sort" => $sort,
            "html" => $html,
        ]));


    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the rating filter map.
     * @return array
     */
    private function getRatingFilterMap(): array
    {
        return [
            'all' => 'All stars',
            '5' => '5 star only',
            '4' => '4 star only',
            '3' => '3 star only',
            '2' => '2 star only',
            '1' => '1 star only',
        ];
    }
}

