<?php


use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;

$item = $z['item'];
//az($item);

// /libs/universe/Ling/Light_Kit_Store/img/products/76/amazon-4.jpg

//az($item);
/**
 * @var $this LightKitPrototypeWidgetHandler
 */


$this->getCopilot()->registerLibrary("kit_store_product", [
    "/libs/universe/Ling/JqZoom/jqzoom.min.js",
    "https://unpkg.com/swiper/swiper-bundle.min.js",
], [
    "/libs/universe/Ling/Light_Kit_Store/css/product.min.css",
    "/libs/universe/Ling/JqZoom/jqzoom.css",

    "https://unpkg.com/swiper/swiper-bundle.min.css",
]);


?>
<div class="text-small mb-3">

    <a class="link-dark text-underline-hover" href="#">Electronics</a>
    ›
    <a class="link-dark text-underline-hover" href="#">Computers & Accessories</a>
    ›
    <a class="link-dark text-underline-hover" href="#">Monitors</a>
</div>


<div id="product-main" class="product-main d-flex flex-column flex-lg-row">


    <div class="product-main flex-grow-1 order-lg-2">


        <div class="d-flex justify-content-between">
            <a href="#" class="text-small super-weak-link">View all products by Ling</a>
            <div class="the-ratings position-relative text-small">
                <?php
                require_once __DIR__ . "/../inc/product-rating.php";
                ?>
            </div>

        </div>
        <p class="title text-small"><?php echo $item['label']; ?></p>


    </div>


    <?php if ($item['screenshots']):
        $screenshots = $item['screenshots'];

        ?>
        <div class="product-photos d-flex order-lg-1">
            <div class="swiper-container">
                <div class="swiper-wrapper">


                    <?php foreach ($screenshots as $index => $_item): ?>

                        <div class="swiper-slide">
                                <div class="inner-block d-flex justify-content-center align-items-center h-100">
                                    <?php if ("photo" === $_item['type']): ?>
                                        <div class="jqzoom"><img
                                                    class="img-fluid"
                                                    src="<?php echo $_item['url']; ?>"
                                                    alt="<?php echo htmlspecialchars($item['label']); ?>"
                                                    jqimg="<?php echo htmlspecialchars($_item['large']); ?>"></div>
                                    <?php else: ?>
                                        <img src="<?php echo htmlspecialchars($_item['poster']); ?>"
                                             alt="<?php echo htmlspecialchars($item['label']); ?>"
                                             class="img-fluid"
                                        >
                                    <?php endif; ?>
                                </div>
                            </div>

                    <?php endforeach; ?>


                </div>
                <div class="swiper-pagination"></div>


            </div>


            <?php if (false): ?>

                <div class="thumbs d-flex flex-column me-3">
                    <?php foreach ($screenshots as $index => $_item): ?>
                        <img src="<?php echo htmlspecialchars($_item['thumb']); ?>"
                             alt="<?php echo htmlspecialchars($item['label']); ?>"

                             class="thumb-trigger"
                             data-index="<?php echo $index; ?>"
                        >
                    <?php endforeach; ?>

                </div>
                <div class="main-photo-container">

                    <?php foreach ($screenshots as $index => $_item): ?>
                        <div class="block <?php echo $_item['type']; ?>"
                            <?php if (0 !== $index): ?>
                                style="display: none"
                            <?php endif; ?>

                             data-index="<?php echo $index; ?>">
                            <div class="inner-block d-flex justify-content-center align-items-center">
                                <?php if ("photo" === $_item['type']): ?>
                                    <div class="jqzoom"><img
                                                class="img-fluid"
                                                src="<?php echo $_item['url']; ?>"
                                                alt="<?php echo htmlspecialchars($item['label']); ?>"
                                                jqimg="<?php echo htmlspecialchars($_item['large']); ?>"></div>
                                <?php else: ?>
                                    <img src="<?php echo htmlspecialchars($_item['poster']); ?>"
                                         alt="<?php echo htmlspecialchars($item['label']); ?>"
                                         width="679"
                                    >
                                <?php endif; ?>


                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>


        </div>
    <?php endif; ?>

    <div class="product-sidebar border order-3" style="min-width: 250px">
        Product sidebar
    </div>


</div>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {


            var jContainer = $('#product-main');
            var jMainPhotoContainer = jContainer.find('.main-photo-container');
            jContainer.find('.thumb-trigger').on('mouseenter', function () {
                var index = $(this).attr('data-index');
                jMainPhotoContainer.find('.block').each(function () {
                    if (index === $(this).attr('data-index')) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });


            });


            // jqzoom ---
            $(".jqzoom").jqueryzoom(
                {
                    xzoom: 500,		//zooming div default width(default width value is 200)
                    yzoom: 500,		//zooming div default width(default height value is 200)
                    offset: 10,		//zooming div default offset(default offset value is 10)
                    position: "right",  //zooming div position(default position value is "right")
                    preload: 1, // preload of images :1 by default
                    lens: 1  // lens over the image   1 by default
                }
            );


            //----------------------------------------
            // swiper
            //----------------------------------------
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                },
            });


        });
    });
</script>