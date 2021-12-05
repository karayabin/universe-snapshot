<?php


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\UriTool;
use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Helper\LightKitStoreThemeHelper;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\PaginationHelper\Paginator\Amazon2021Paginator;

$linkHoverColor = LightKitStoreThemeHelper::getLinkHoverColor();
$starColor = LightKitStoreThemeHelper::getStarColor();
$weakLinkColor = LightKitStoreThemeHelper::getWeakLinkColor();
$strongLinkColor = LightKitStoreThemeHelper::getStrongLinkColor();


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


$currentUri = UriTool::getCurrentUri();

/**
 * @var $this LightKitPrototypeWidgetHandler
 */
$search = $this->getControllerVar("StoreSearchResultsController.search");
$searchInfo = $this->getControllerVar("StoreSearchResultsController.info");
$itemTypes = $this->getControllerVar("StoreSearchResultsController.itemTypes");
$authorLabel = $this->getControllerVar("StoreSearchResultsController.authorLabel");


$container = $this->getContainer();

/**
 * @var $_rr LightReverseRouterService
 */
$_rr = $container->get("reverse_router");


$checkedCb = function (int $cbNumber) use ($itemTypes) {
    if (true === array_key_exists($cbNumber, $itemTypes)) {
        return "checked";
    }
    return "";
};


$displayCategoriesSidebar = $z['displayCategoriesSidebar'] ?? false;

?>

<style>
    .presentation-item-card {
        max-width: 275px;
    }

    .websites-list .card-title {
        color: <?php echo $strongLinkColor; ?>;
        text-decoration: none;
    }

    .websites-list .card-title:hover {
        color: <?php echo $linkHoverColor; ?>;
    }


    .websites-list .pic .price {
        font-size: 21px;
        line-height: 30px;
        cursor: pointer;
    }


    .websites-list .pic .price-symbol {
        font-size: 12px;
        position: relative;
        top: -3px;
        padding-left: 2px;
    }


    .websites-list .pic .nb-comments {
        color: <?php echo $weakLinkColor; ?>;
        margin-left: 7px;
        text-decoration: none;
        letter-spacing: initial;
        font-size: 14px;
    }


    .websites-list .pic .nb-comments:hover {
        color: <?php echo $linkHoverColor; ?>;
    }


    .websites-list .pic .author {
        font-weight: bold;
        font-size: 14px;
    }


</style>


<div id="the-item-page" class="d-lg-flex justify-content-center">

    <?php if (true === $displayCategoriesSidebar): ?>

        <?php
        $sCategories = "Categories";
        ?>

        <div class="search-result-sidebar border-end d-flex flex-column align-items-center d-lg-block">
            <div class="title mb-3">
                <strong class="d-none d-lg-block"><?php echo $sCategories; ?></strong>
                <button class="d-lg-none no-button" data-bs-target="#search-result-sidebar-items"
                        data-bs-toggle="collapse">
                    <strong><?php echo $sCategories; ?></strong>
                    <i class="bi bi-chevron-down"></i>
                </button>
            </div>
            <div class="collapse d-lg-block mb-3" id="search-result-sidebar-items">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=""
                           id="cb-cat-websites" <?php echo $checkedCb(1); ?>>
                    <label class="form-check-label" for="cb-cat-websites">
                        Websites
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=""
                           id="cb-cat-pages" <?php echo $checkedCb(2); ?>>
                    <label class="form-check-label" for="cb-cat-pages">
                        Pages
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=""
                           id="cb-cat-widgets" <?php echo $checkedCb(3); ?>>
                    <label class="form-check-label" for="cb-cat-widgets">
                        Widgets
                    </label>
                </div>
            </div>


            <?php if (null !== $authorLabel): ?>
                <div class="title mb-3">
                    <strong class="d-none d-lg-block">Author: <?php echo $authorLabel; ?></strong>
                </div>
            <?php endif; ?>


        </div>
    <?php endif; ?>


    <?php if ($items): ?>
        <div class="products-list d-flex flex-wrap justify-content-center justify-content-lg-start  websites-list mb-3 ">
            <?php foreach ($items as $item):
                $urlItem = $_rr->getUrl("lks_route-product", [
                    "id" => $item['id'],
                    "s" => $item['label'],
                ]);


                $images = BabyYamlUtil::readBabyYamlString($item['screenshots']);
                $mainImgUrl = $images[0] ?? null;
                if (null === $mainImgUrl) {
                    $mainImgUrl = "/libs/universe/Ling/Light_Kit_Store/img/kit-store-lightning.png";
                }
                ?>


                <div class="presentation-item-card pic card mb-3 ms-3 text-center p-0 position-relative">


                    <div class="row no-gutters">


                        <a href="<?php echo htmlspecialchars($urlItem); ?>" class="position-relative"><img


                                    src="<?php echo htmlspecialchars($mainImgUrl); ?>"
                                    class="card-img-top p-2 rounded-xl"
                                    alt="<?php echo htmlspecialchars($item['label']); ?>"></a>


                        <div class="card-body pt-0 ">

                            <div class="author mb-1"><?php echo $item['author_label']; ?></div>

                            <a href="<?php echo htmlspecialchars($urlItem); ?>"
                               class="h5 card-title"><?php echo $item['label']; ?></a>


                            <?php
                            require_once __DIR__ . "/product-rating.php";
                            ?>

                            <div class="price">
                                <span><?php echo $item['price_in_euro']; ?></span><span class="price-symbol">€</span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: // no items             ?>

    <div class="text-center websites-list mb-3 " style="width: 83%">
        <div class="" style="padding-right: 170px;">
            <div class="h3">
                No results for <?php echo $search; ?>
                <?php if ($itemTypes && count($itemTypes) < 3): ?>
                    <span class="text-small">
                (in
                <?php echo implode(", ", $itemTypes); ?>
                )
                    </span>
                <?php endif; ?>

                .
            </div>
            <div>
                Try checking the spelling, or use more general terms.
            </div>
        </div>
    </div>
</div>


<?php endif; ?>
</div>

<?php if ($items): ?>

    <div class="navigation d-flex justify-content-center border-top pt-4">
        <?php

        $pagUtil = new Amazon2021Paginator();
        $pagUtil->setProperties([
            "size" => 'md',
        ]);


        $fmt = UriTool::uri(null, ["page" => '{page}'], false);
        echo $pagUtil->render($searchInfo['realPage'], $searchInfo['nbPages'], $fmt);
        ?>
    </div>
<?php endif; ?>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {
            var jInputs = $('.search-result-sidebar').find('input');
            jInputs.on('change', function () {
                var itemTypes = '';
                jInputs.each(function (i) {

                    if (true === $(this).prop("checked")) {
                        itemTypes += (i + 1);
                    }
                });


                var currentUri = '<?php echo $currentUri; ?>';
                if ('' !== itemTypes) {
                    window.location.href = bee.url_merge_params(currentUri, {
                        it: itemTypes,
                    });
                } else {
                    window.location.href = bee.url_remove_params(currentUri, ["it"]);
                }
            });
        });

        var jPage = $('#the-item-page');
        jPage.on('click', ".rating-link", function () {
            window.location.href = $(this).find('a').attr('href')
            return false;
        });

    });
</script>
