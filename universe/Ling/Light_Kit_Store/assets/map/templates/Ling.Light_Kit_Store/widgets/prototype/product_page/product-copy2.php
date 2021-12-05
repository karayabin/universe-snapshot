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


    <div class="flex-grow-1 order-lg-2">


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
        <div class="product-photos d-flex order-lg-1" id="gallery--simple">
            <?php require_once __DIR__ . "/../inc/mobile-photo-carousel.php" ?>
            <!--            --><?php //require_once __DIR__ . "/../inc/tmp-lg-photo-carousel.php"
            ?>
        </div>


    <?php endif; ?>

    <div class="product-sidebar border order-3" style="min-width: 250px">
        Product sidebar
    </div>

</div>

<!-- MODALS -->
<div class="modal" tabindex="-1" id="video-modal">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="ratio ratio-16x9 embed-responsive-item">
                    <div id="yt-player"></div>
                </div>
                <div class="youtube-player-controls d-flex justify-content-center">
                    <i class="btn-yt-backward bi bi-skip-backward-circle"></i>
                    <i class="btn-yt-play bi bi-play-circle" style="display: none"></i>
                    <i class="btn-yt-pause bi bi-pause-circle"></i>
                    <i class="btn-yt-forward bi bi-skip-forward-circle"></i>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    <?php

        // https://stackoverflow.com/questions/2068344/how-do-i-get-a-youtube-video-thumbnail-from-the-youtube-api
    $id = "M7lc1UVf-VE";
    $id = "1mTn6Ko_riI";
    $id = "zpOULjyy-n8";

    // https://img.youtube.com/vi/zpOULjyy-n8/hqdefault.jpg
    // https://img.youtube.com/vi/M7lc1UVf-VE/hqdefault.jpg
    // https://img.youtube.com/vi/1mTn6Ko_riI/hqdefault.jpg

    ?>
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('yt-player', {
            height: '390',
            width: '640',
            videoId: '<?php echo $id; ?>',
            playerVars: {
                'playsinline': 1
            }
        });
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
            var jModal = $('#video-modal');
            var videoModal = new bootstrap.Modal(jModal[0]);
            jModal[0].addEventListener('shown.bs.modal', function (event) {
                ytPlayerPlay();

            })

            function ytPlayerPlay() {
                jModal.find('.btn-yt-play').hide();
                jModal.find('.btn-yt-pause').show();
                player.playVideo();
            }

            function ytPlayerPause() {
                jModal.find('.btn-yt-play').show();
                jModal.find('.btn-yt-pause').hide();
                player.pauseVideo();
            }

            jModal.on('click', function (e) {

                var jTarget = $(e.target);
                if (jTarget.hasClass('btn-yt-pause')) {
                    ytPlayerPause();
                    return false;
                } else if (jTarget.hasClass('btn-yt-play')) {
                    ytPlayerPlay();
                    return false;
                } else if (jTarget.hasClass('btn-yt-forward')) {
                    var time = player.getCurrentTime();
                    time += 15;
                    player.seekTo(time);
                    return false;
                } else if (jTarget.hasClass('btn-yt-backward')) {
                    var time = player.getCurrentTime();
                    time -= 15;
                    player.seekTo(time);
                    return false;
                }


            });


            jProductPhotos.on('click', '.video-player-slide-item', function () {
                videoModal.show();
            });
        });
    })
    ;
</script>


<script type="module">
    // Include Lightbox
    import PhotoSwipeLightbox from '/libs/universe/Ling/JPhotoSwipe/5/photoswipe-lightbox.esm.js';

    const lightbox = new PhotoSwipeLightbox({
        // may select multiple "galleries"
        gallerySelector: '#gallery--simple',

        // Elements within gallerySelector (slides)
        childSelector: 'a',

        // Include PhotoSwipe Core
        // and use absolute path (that starts with http(s)://)
        pswpModule: '/libs/universe/Ling/JPhotoSwipe/5/photoswipe.esm.js',

        // Include CSS file,
        // (if you haven't included in via <link>)
        pswpCSS: '/libs/universe/Ling/JPhotoSwipe/5/photoswipe.css'
    });
    lightbox.init();

</script>