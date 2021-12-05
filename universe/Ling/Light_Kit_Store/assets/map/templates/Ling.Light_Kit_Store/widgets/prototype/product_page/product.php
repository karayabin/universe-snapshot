<?php


use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Helper\LightKitStorePriceHelper;


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


$item = $z['item'];


/**
 * @var $controller StoreBaseController
 */
$controller = $this->getControllerVar("controller");


$item['price_in_euro'] = LightKitStorePriceHelper::formatPrice($item['price_in_euro']);


$rand = rand(0, 100000);
$this->getCopilot()->registerLibrary("kit_store_product", [
    "/libs/universe/Ling/JqZoom/jqzoom.min.js",
    "https://unpkg.com/swiper/swiper-bundle.min.js",
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


?>


<?php if (false === "breadcrumb"): ?>
    <div class="breadcrumb text-small mb-3">

        <a class="link-dark text-underline-hover me-1" href="#">Electronics</a>
        ›
        <a class="link-dark text-underline-hover mx-1" href="#">Computers & Accessories</a>
        ›
        <a class="link-dark text-underline-hover mx-1" href="#">Monitors</a>
    </div>
<?php endif; ?>


<div id="product-main" class="product-main mt-3">


    <div class="product-sidebar d-none d-lg-block float-lg-end border rounded-4 p-3">
        <div class="price-euro mb-2"><?php echo $item['price_in_euro']; ?></div>

        <button class="d-block btn btn-add-to-cart mb-2 rounded-pill">Add to Cart</button>
        <button class="d-block btn btn-buy-now mb-2 rounded-pill">Buy Now</button>


    </div>


    <div class="top d-block d-lg-flex">


        <div class="d-flex justify-content-center">
            <?php if ($item['screenshots']):
                $screenshots = $item['screenshots'];

                ?>
                <div class="product-photos d-block d-lg-flex d-lg-none" id="gallery--simple">
                    <?php require_once __DIR__ . "/../inc/mobile-photo-carousel.php"; ?>
                </div>


                <div class="product-photos d-none d-lg-flex">
                    <?php require_once __DIR__ . "/../inc/desktop-photo-carousel.php"; ?>
                </div>
            <?php endif; ?>
        </div>


        <div class="main-info px-lg-2">


            <h1 class="product-title text-small text-lg-1"><?php echo $item['label']; ?></h1>


            <div class="product-header d-flex d-lg-block justify-content-between">
                <a href="<?php echo $urlAuthorProducts; ?>" class="text-small super-weak-link">View all products
                    by <?php echo $item['author_label']; ?></a>
                <div class="the-ratings position-relative text-small">
                    <?php
                    require_once __DIR__ . "/../inc/product-rating.php";
                    ?>
                </div>

            </div>

            <div class="product-price mb-3 mt-lg-2">
                Price: <span class="price-euro"><?php echo $item['price_in_euro']; ?></span>
            </div>


            <div class="buy-buttons d-flex justify-content-center mb-3 d-lg-none">
                <button class="btn btn-add-to-cart me-2">Add to Cart</button>
                <button class="btn btn-buy-now ms-2">Buy Now</button>
            </div>

        </div>


    </div>
    <div class="bottom mt-3">

        <div class="customer-reviews">
            <h2 class="text-lg-1">Customer reviews</h2>
            <h3 class="text-lg-2">Last reviews</h3>
            <div class="customer-review-items">
                <?php
                $reviewItems = $item['reviews'];
                require_once __DIR__ . "/../inc/review-items.php";
                ?>
            </div>

            <div class="mb-5 py-3 border-top border-bottom">
                <a href="#" class="strong-link fw-bold fs-7 d-flex">
                    <span class="flex-grow-1">See all reviews</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

        </div>
    </div>


</div>


<?php

/**
 * modals for small devices
 */
foreach ($screenshots as $index => $item): ?>
    <?php if ("video/youtube" === $item['type']): ?>
        <div class="modal" tabindex="-1" id="video-yt-modal-<?php echo $index; ?>">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--                        <h5 class="modal-title">Modal title</h5>-->
                        <button title="close modal" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="ratio ratio-16x9 embed-responsive-item">
                            <div id="yt-player-<?php echo $index; ?>"></div>
                        </div>
                        <div class="custom-player-controls d-flex justify-content-center">
                            <i class="btn-player-backward bi bi-skip-backward-circle"></i>
                            <i class="btn-player-play bi bi-play-circle" style="display: none"></i>
                            <i class="btn-player-pause bi bi-pause-circle"></i>
                            <i class="btn-player-forward bi bi-skip-forward-circle"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php elseif ("video/mp4" === $item['type']): ?>
        <div class="modal" tabindex="-1" id="video-html5-modal-<?php echo $index; ?>">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--                        <h5 class="modal-title">Modal title</h5>-->
                        <button title="close modal" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="ratio ratio-16x9 embed-responsive-item">
                            <video id="html5-player-<?php echo $index; ?>" controls>
                                <source src="<?php echo $item['url']; ?>" type="video/mp4">
                                <p>Your browser doesn't support HTML5 video. Here is a <a
                                            href="<?php echo $item['url']; ?>">link to the video</a> instead.</p>
                            </video>
                        </div>
                        <div class="custom-player-controls d-flex justify-content-center">
                            <i class="btn-player-backward bi bi-skip-backward-circle"></i>
                            <i class="btn-player-play bi bi-play-circle" style="display: none"></i>
                            <i class="btn-player-pause bi bi-pause-circle"></i>
                            <i class="btn-player-forward bi bi-skip-forward-circle"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


    var lastClickedYtVideoIndex = null;
    var players = {};


    function onPlayerStateChange(event) {
        var jModal = $("#video-yt-modal-" + lastClickedYtVideoIndex);
        if (event.data == YT.PlayerState.PLAYING) {
            jModal.find('.btn-player-play').hide();
            jModal.find('.btn-player-pause').show();
        } else {
            jModal.find('.btn-player-play').show();
            jModal.find('.btn-player-pause').hide();
        }
    }


    function onYouTubeIframeAPIReady() {
        <?php
        foreach ($screenshots as $i => $item) {
        if('video/youtube' === $item['type']){
        ?>
        players["<?php echo $i; ?>"] = new YT.Player('yt-player-<?php echo $i; ?>', {
            height: '390',
            width: '640',
            videoId: '<?php echo str_replace("'", "\'", $item['videoId']); ?>',
            playerVars: {
                'playsinline': 1
            },
            events: {
                onStateChange: onPlayerStateChange,
            },
        });

        <?php
        }
        }
        ?>
    }


    // sync html5 video controls with custom controls (play/pause button)
    var player;
    <?php
    foreach ($screenshots as $i => $item) {
    if('video/mp4' === $item['type']){
    ?>

    player = window.document.getElementById('html5-player-<?php echo $i; ?>');
    player.addEventListener('play', function () {
        html5PlayerPlay();
    });
    player.addEventListener('pause', function () {
        html5PlayerPause();
    });

    <?php
    }
    }
    ?>





    function getCurrentYtPlayer() {
        if (lastClickedYtVideoIndex in players) {
            return players[lastClickedYtVideoIndex];
        }
        return false;
    }

    function getCurrentHtml5Player() {
        return window.document.getElementById('html5-player-' + lastClickedYtVideoIndex);
    }

    function ytPlayerPlay() {
        var jModal = $('#video-yt-modal-' + lastClickedYtVideoIndex);
        jModal.find('.btn-player-play').hide();
        jModal.find('.btn-player-pause').show();
        getCurrentYtPlayer().playVideo();
    }

    function ytPlayerPause() {
        var jModal = $('#video-yt-modal-' + lastClickedYtVideoIndex);
        jModal.find('.btn-player-play').show();
        jModal.find('.btn-player-pause').hide();
        getCurrentYtPlayer().pauseVideo();
    }


    function html5PlayerPlay() {
        var jModal = $('#video-html5-modal-' + lastClickedYtVideoIndex);
        jModal.find('.btn-player-play').hide();
        jModal.find('.btn-player-pause').show();
        getCurrentHtml5Player().play();
    }

    function html5PlayerPause() {
        var jModal = $('#video-html5-modal-' + lastClickedYtVideoIndex);
        jModal.find('.btn-player-play').show();
        jModal.find('.btn-player-pause').hide();
        getCurrentHtml5Player().pause();
    }


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


            //----------------------------------------
            // video modal
            //----------------------------------------
            var jProductPhotos = $('.product-photos');

            var jYtModal, jHtml5Modal;

            <?php foreach($screenshots as $index => $item): ?>
            <?php if("video/youtube" === $item['type']): ?>
            jYtModal = $('#video-yt-modal-<?php echo $index; ?>');
            jYtModal[0].addEventListener('shown.bs.modal', function (event) {
                ytPlayerPlay();
            });
            jYtModal[0].addEventListener('hidden.bs.modal', function (event) {
                ytPlayerPause();
            });

            jYtModal.on('click', function (e) {

                var jTarget = $(e.target);
                if (jTarget.hasClass('btn-player-pause')) {
                    ytPlayerPause();
                    return false;
                } else if (jTarget.hasClass('btn-player-play')) {
                    ytPlayerPlay();
                    return false;
                } else if (jTarget.hasClass('btn-player-forward')) {
                    var player = getCurrentYtPlayer();
                    var time = player.getCurrentTime();
                    time += 15;
                    player.seekTo(time);
                    return false;
                } else if (jTarget.hasClass('btn-player-backward')) {
                    var player = getCurrentYtPlayer();
                    var time = player.getCurrentTime();
                    time -= 15;
                    player.seekTo(time);
                    return false;
                }


            });



            <?php elseif("video/mp4" === $item['type']): ?>
            jHtml5Modal = $('#video-html5-modal-<?php echo $index; ?>');
            jHtml5Modal[0].addEventListener('shown.bs.modal', function (event) {
                html5PlayerPlay();
            });
            jHtml5Modal[0].addEventListener('hidden.bs.modal', function (event) {
                html5PlayerPause();
            });


            jHtml5Modal.on('click', function (e) {

                var jTarget = $(e.target);
                if (jTarget.hasClass('btn-player-pause')) {
                    html5PlayerPause();
                    return false;
                } else if (jTarget.hasClass('btn-player-play')) {
                    html5PlayerPlay();
                    return false;
                } else if (jTarget.hasClass('btn-player-forward')) {
                    var player = getCurrentHtml5Player();
                    var time = player.currentTime;
                    time += 15;
                    player.currentTime = time;
                    return false;
                } else if (jTarget.hasClass('btn-player-backward')) {
                    var player = getCurrentHtml5Player();
                    var time = player.currentTime;
                    time -= 15;
                    player.currentTime = time;
                    if (true === player.paused) {
                        player.play();
                    }
                    return false;
                }


            });





            <?php endif; ?>
            <?php endforeach; ?>



            jProductPhotos.on('click', '.video-yt-open-modal-trigger', function () {
                lastClickedYtVideoIndex = $(this).attr("data-index");
                var videoYtModal = new bootstrap.Modal(window.document.getElementById("video-yt-modal-" + lastClickedYtVideoIndex));
                videoYtModal.show();
                return false;
            });


            jProductPhotos.on('click', '.video-html5-open-modal-trigger', function () {
                lastClickedYtVideoIndex = $(this).attr("data-index");
                var videoHtml5Modal = new bootstrap.Modal(window.document.getElementById("video-html5-modal-" + lastClickedYtVideoIndex));
                videoHtml5Modal.show();
                return false;
            });


        });
    })
    ;
</script>

<?php
/**
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 * todo: here... pswp gallery show 4 links instead of 3... (new beta version?)...
 */


?>
<script type="module">
    // Include Lightbox
    import PhotoSwipeLightbox from '/libs/universe/Ling/JPhotoSwipe/5/photoswipe-lightbox.esm.js';

    const lightbox = new PhotoSwipeLightbox({
        // may select multiple "galleries"
        gallerySelector: '#gallery--simple',

        // Elements within gallerySelector (slides)
        childSelector: '.pswp-link',

        // Include PhotoSwipe Core
        // and use absolute path (that starts with http(s)://)
        pswpModule: '/libs/universe/Ling/JPhotoSwipe/5/photoswipe.esm.js',

        // Include CSS file,
        // (if you haven't included in via <link>)
        pswpCSS: '/libs/universe/Ling/JPhotoSwipe/5/photoswipe.css'
    });
    lightbox.init();

</script>