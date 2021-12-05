<?php


use Ling\Bat\StringTool;
use Ling\Bat\UriTool;
use Ling\Light_ControllerHub\Helper\LightControllerHubHelper;
use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Helper\LightKitStorePhotosHelper;
use Ling\Light_Kit_Store\Helper\LightKitStorePriceHelper;


/**
 * todo: finish ajax branching for ratings...
 */


/**
 * todo: commit LightPlanetInstaller when commands.init1 functionality is implemented
 * todo: commit LightPlanetInstaller when commands.init1 functionality is implemented
 * todo: commit LightPlanetInstaller when commands.init1 functionality is implemented
 * todo: commit LightPlanetInstaller when commands.init1 functionality is implemented
 */

/**
 * todo: continue ajax handling with new formCollect custom type....
 * todo: continue ajax handling with new formCollect custom type....
 * todo: continue ajax handling with new formCollect custom type....
 * todo: continue ajax handling with new formCollect custom type....
 */

/**
 * todo: ajax behaviour for fetching reviews dynamically, then mobile ui
 * todo: ajax behaviour for fetching reviews dynamically, then mobile ui
 * todo: ajax behaviour for fetching reviews dynamically, then mobile ui
 * todo: ajax behaviour for fetching reviews dynamically, then mobile ui
 * todo: ajax behaviour for fetching reviews dynamically, then mobile ui
 * todo: ajax behaviour for fetching reviews dynamically, then mobile ui
 */


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


$item = $z['item'];
//az($item);

$mainPhotoItem = LightKitStorePhotosHelper::getFirstPhotoByItem($item['screenshots']);


/**
 * @var $controller StoreBaseController
 */
$controller = $this->getControllerVar("controller");
$urlRatings = $controller->getLink(LightControllerHubHelper::getRouteName(), [
    'execute' => "Ling\\\Light_Kit_Store\\\Controller\\\Front\\\StoreRatingListController->renderRatings",
]);


$item['price_in_euro'] = LightKitStorePriceHelper::formatPrice($item['price_in_euro']);


$rand = rand(0, 100000);
$this->getCopilot()->registerLibrary("kit_store_product", [
    "/libs/universe/Ling/JqZoom/jqzoom.min.js",
    "https://unpkg.com/swiper/swiper-bundle.min.js",
    "/libs/universe/Ling/JFormCollect/form-collect.js",
], [
    "/libs/universe/Ling/Light_Kit_Store/css/product.min.css?it=$rand",
    "/libs/universe/Ling/Light_Kit_Store/css/rating.min.css?it=$rand",
    "/libs/universe/Ling/JqZoom/jqzoom.css",

    "https://unpkg.com/swiper/swiper-bundle.min.css",
]);


$urlAuthorProducts = $controller->getLink("lks_route-search", [
    "search" => '',
    "author" => $item['author_name'],
]);


$orderByLabel = "Most Recent";
$orderByPublicMap = [
    "key" => 'label',
    "key2" => 'label 2',
];
$currentUri = "some-uri";

$obf = function (string $key) use ($orderByPublicMap, $currentUri): string {
    return UriTool::uri($currentUri, [
        "orderby" => $key,
    ], false);
};


?>

<div class="main-container px-3 py-2">
    <h1 class="d-none d-lg-block">
        <div class="breadcrumb text-small mb-3">

            <a class="link-dark text-underline-hover me-1"
               href="#"><?php echo StringTool::cutAtWordBoundary($item['label'], 70); ?></a>
            ›
            &nbsp;
            <span class="color-alt">Customer reviews</span>
        </div>
    </h1>
    <div class="mobile-title border-bottom">
        <?php echo $item['label']; ?>
    </div>

    <div id="product-main " class="product-main mt-3">

        <div class="rating-top-container">

            <div class="float-start w-100">


                <div class="rating-top-container-inner">


                    <div class="ratings ratings-customer-reviews float-none float-lg-start">
                        <h2 class="customer-reviews-title">Customer reviews</h2>
                        <?php
                        $showDisplayAllCommentsLink = false;
                        ?>
                        <?php require_once __DIR__ . "/../inc/rating-summary.php"; ?>

                        <div class="text-center p-2">
                            <a class="btn white-button-link" href="#">Write a review</a>
                        </div>
                    </div>


                    <div class="float-start w-100 d-none d-lg-block">

                        <img
                                class="float-start me-3"
                                width="60"
                                src="<?php echo htmlspecialchars($mainPhotoItem['thumb']); ?>"
                                alt="<?php echo htmlspecialchars($item['label']); ?>">


                        <h1 class="rating-product-title text-truncate">
                            <a class="weak-link" href="#"><?php echo $item['label']; ?></a>
                        </h1>
                        <div>
                            by <a href="#" class="weak-link"><?php echo $item['author_label']; ?></a>
                        </div>

                    </div>


                </div>
            </div>

            <div class="rating-sidebar float-start d-none d-lg-block border rounded-4 p-3">
                <a href="#" class="d-block btn orange-button-link">See All Buying Options</a>
            </div>


        </div>


        <div class="clearfix"></div>
        <div class="bottom mt-3">

            <div id="customer-reviews" class="customer-reviews">

                <div class="position-relative mb-3 search-box">
                    <i class="bi bi-search position-absolute" style="left: 10px;top: 4px;"></i>
                    <input type="text" class="form-control form-control-sm d-inline-block form-collect search-input"
                           name="search"
                           style="padding-left:34px; " placeholder="Search customer reviews"
                           aria-label="Username"
                           aria-describedby="basic-addon1">

                    <button class="btn black-button-link btn-sm d-inline-block fc-trigger">Search</button>
                </div>


                <div class="bbox float-start">
                    <div class="mini-title fw-bold text-mini text-uppercase">Sort by</div>
                    <div class="element ms-auto pe-4" style="padding-top: 6px;">
                        <div class="dropdown">
                            <a class="btn btn-lightgray btn-xs dropdown-toggle shadow-sm form-collect" href="#"
                               role="button"
                               data-type="custom"
                               data-name="sort"
                               data-value="<?php echo htmlspecialchars($z['orderBy']); ?>"
                               id="dropdown-customer-reviews-sortby"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $z['orderByLabel']; ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdown-customer-reviews-sortby">
                                <?php foreach ($z['orderByPublicMap'] as $key => $label): ?>
                                    <li><span class="dropdown-item" data-key="<?php echo htmlspecialchars($key); ?>"
                                        ><?php echo $label; ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="bbox float-start">
                    <div class="mini-title fw-bold text-mini text-uppercase">Filter by</div>
                    <div class="element ms-auto pe-4" style="padding-top: 6px;">
                        <div class="dropdown">
                            <a class="btn btn-lightgray btn-xs dropdown-toggle shadow-sm form-collect" href="#"
                               role="button"
                               data-type="custom"
                               data-name="rating-filter"
                               data-value="<?php echo htmlspecialchars($z['ratingFilter']); ?>"
                               id="dropdown-customer-reviews-rating-filter"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $z['ratingFilterLabel']; ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdown-customer-reviews-rating-filter">
                                <?php foreach ($z['ratingFilterMap'] as $key => $label): ?>
                                    <li><span class="dropdown-item" data-key="<?php echo htmlspecialchars($key); ?>"
                                        ><?php echo $label; ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>

                <div class="filter-info border-bottom mt-3 pb-3">

                    <div class="fw-bold text-secondary text-uppercase text-small">FILTERED BY</div>
                    <div class="line text-small mt-1">
                        <span class="fw-bold filter-crumb-rating"></span>
                        <a href="#" class="weak-link fc-trigger clear-filter">Clear filter</a>
                    </div>
                    <div class="line mt-1 text-small rows-info"></div>

                </div>


                <div class="customer-review-items pt-3">
                    <h2 class="text-lg-1">
                        Reviews
                        <span class="spinner-border spinner-border-sm the-loader" role="status"
                              style="display: none"><span
                                    class="visually-hidden">Loading...</span></span>
                    </h2>

                    <div class="alert alert-danger alert-dismissible fade show the-error" role="alert"
                         style="display: none">
                        <span class="the-error-message"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="customer-review-items-list">

                    </div>
                </div>
            </div>

        </div>


    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {


            var jContext = $('#customer-reviews');
            var jRowsInfo = jContext.find('.rows-info');
            var jFilterInfo = jContext.find('.filter-info');
            var jDropdownSortby = jContext.find('#dropdown-customer-reviews-sortby');
            var jDropdownRatingFilter = jContext.find('#dropdown-customer-reviews-rating-filter');


            var orderByPublicMap = <?php echo json_encode($z['orderByPublicMap']); ?>;
            var ratingFilterMap = <?php echo json_encode($z['ratingFilterMap']); ?>;


            var url = '<?php echo $urlRatings; ?>';
            var itemId = "<?php echo $item['id']; ?>";

            var fn = AlcpHelper.getContextualPostCallback(jContext, {
                success: function (jTheSuccessMsg, response, textStatus, jqXHR) {


                    var content = response.html;
                    if (0 === response.nbItemsTotal) {
                        content = "No results for this request.";
                    }
                    jContext.find('.customer-review-items-list').html(content);


                    var s = '';
                    s += response.nbRatings + ' ratings | ' + response.nbReviews + " customer reviews";
                    jRowsInfo.html(s);


                    if (0 === response.ratingCrumb) {
                        jFilterInfo.hide();
                    } else {
                        jFilterInfo.show();
                        jFilterInfo.find('.filter-crumb-rating').text(response.ratingCrumb);
                    }

                    jDropdownRatingFilter.attr("data-value", response.rating);
                    jDropdownRatingFilter.text(ratingFilterMap[response.rating]);


                    jDropdownSortby.attr("data-value", response.sort);
                    jDropdownSortby.text(orderByPublicMap[response.sort]);

                },
            });


            function requestReviews(options) {
                var vars = FormCollect.collect({
                    context: jContext,
                });




                var values = {
                    item_id: itemId,
                    search: vars.search,
                    page: 1,
                    sort: vars.sort,
                    rating_filter: vars['rating-filter'],
                };

                if(options && true === options.clearFilter){
                    values.rating_filter = 0;
                }


                fn(url, values);
                return values;
            }


            jContext.on('click', '.fc-trigger', function () {


                var options = {};
                if ($(this).hasClass("clear-filter")) {
                    options.clearFilter = true;
                }

                requestReviews(options);
                return false;
            });


            jDropdownSortby.on('hidden.bs.dropdown', function (e, x) {
                var key = $(e.clickEvent.target).attr('data-key');
                $(this).attr("data-value", key);
                requestReviews();
            });

            jDropdownRatingFilter.on('hidden.bs.dropdown', function (e) {
                var key = $(e.clickEvent.target).attr('data-key');
                $(this).attr("data-value", key);
                requestReviews();
            });


            requestReviews();
        });
    });
</script>
