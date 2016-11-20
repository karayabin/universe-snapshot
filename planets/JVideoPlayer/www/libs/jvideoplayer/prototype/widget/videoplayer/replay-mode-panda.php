<?php


use VideoSubtitles\Srt\SrtToArrayTool;

require_once "bigbang.php"; // start the local universe
$f = __DIR__ . "/assets/kungfupanda2.srt";
$subtitles = SrtToArrayTool::getArrayByFile($f, [
    'startEndUnit' => 'ms',
    'defaultItem' => ['type' => 'cue'],
]);


?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <!-- http://code.jquery.com/jquery-2.2.2.min.js -->
    <script src="/libs/jquery/jquery-2.2.2.min.js"></script>


    <script src="/libs/tim/js/tim.js"></script>


    <!-- https://cdn.rawgit.com/lingtalfi/JFullScreen/master/www/libs/jfullscreen/js/jfullscreen.js -->
    <script src="/libs/jfullscreen/js/jfullscreen.js"></script>
    <script src="/libs/jvideoplayer/js/video-element/html5-video-element.js"></script>
    <script src="/libs/jvideoplayer/js/eventsqueue/eventsqueue.js"></script>
    <script src="/libs/jvideoplayer/widget/layered-manager/layered-manager.js"></script>
    <link rel="stylesheet" href="/libs/jvideoplayer/widget/layered-manager/layered-manager.css">

    <script src="/libs/jvideoplayer/widget/video-player/video-player.js"></script>


    <script src="/libs/jvideoplayer/widget/video-player/plugin/plugin.debughelper.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.minplay.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.skipadbutton.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/innerqueue/plugin.innerqueue.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/innerqueue/innerqueue.handler.cue.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/innerqueue/innerqueue.handler.ad.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.timeelapsed.js"></script>
    <!--    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.thumbnailpreview.js"></script>-->
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.clonethumbnailpreview.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.timelinemark.js"></script>

    <script src="/libs/jvideoplayer/widget/video-player/plugin/live/plugin.live.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/live/plugin.live.fetcher.tim.js"></script>

    <script src="/libs/jvideoplayer/js/util/video-events-watcher.js"></script>


    <!-- MANTIS AND DEPENDENCIES-->
    <!-- https://cdn.rawgit.com/lingtalfi/jDragSlider/master/www/libs/jdragslider/js/jdragslider.js -->
    <script src="/libs/jdragslider/js/jdragslider.js"></script>
    <!-- https://cdn.rawgit.com/lingtalfi/VSwitch/master/www/libs/vswitch/js/vswitch.js -->
    <script src="/libs/vswitch/js/vswitch.js"></script>
    <link rel="stylesheet" href="/libs/jvideoplayer/widget/remote/mantis/style.css">
    <script src="/libs/jvideoplayer/widget/remote/mantis/mantis.js"></script>


    <title>Replay mode default example</title>
</head>

<body>


<style>

    .loaderimage {
        position: absolute;
        top: 0;
        z-index: 500;
        width: 100%;
        height: 100%;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>
<div class="loaderimage" style="background-image: url(/img/panda.jpg)">
    <img src="/img/default.svg">
</div>


<?php echo file_get_contents("templates/jvp.mantis.htpl"); ?>


<script>

    (function ($) {
        $(document).ready(function () {


            /**
             * In replay mode, ads and cues are tied to the main video.
             * This is because when you scrub the main video's timeline,
             * you want the cues and ads to play at the relative time where you set them:
             *
             * it makes no sense to use absolute time on ads and cues unless you are in a live mode with no pause functionality.
             *
             *
             * The inner queue represents the main video's inner relative timeline, to which ads ands cues (and other things if you want)
             * will be attached.
             *
             */




            var adsEvents = [
                {
                    title: "Advertising: drink some coffee",
                    start: 5 * 60 * 1000,
                    url: '/video/matrix.mp4',
                    minplay: 3,
                },
                {
                    start: 19 * 60 * 1000,
                    title: "Advertising: Late for work",
                    url: '/video/late-for-work.mp4',
                    minplay: 3,
                },
            ];
            var cuesEvents = <?php echo json_encode($subtitles); ?>;
            var jSurface = $('.mantis_host');
            var jLoaderImage = $('.loaderimage');

            var jVideoPlayer = $('> .videoplayer', jSurface);
            var innerQueue = new pluginInnerQueue({
                matchVideo: function (videoInfo) {
                    return (videoInfo.id === 1);
                }
            });
            innerQueue.registerHandler(new pluginInnerQueueHandlerCue(), cuesEvents);
            innerQueue.registerHandler(new pluginInnerQueueHandlerAd({
                plugins: [
                    new pluginAdMinPlay(),
                ],
            }), adsEvents, true);


            var vp = new videoPlayer({
                element: jVideoPlayer,
                plugins: [
                    new pluginDebugHelper({
                        mode: 'triggered', blackList: [
                            "progress",
                            "timeupdate",
                            "createlayer",
                            "videoloaded",
                            "setcurrentvideo",
                            "scrublimit",
                        ]
                    }),
                    new pluginAdSkipAdButton({
                        text: "Skip this ad",
                    }),
                    innerQueue,
                    new pluginMantis({
                        mantis: new Mantis(jSurface),
                        plugins: [
                            new pluginMantisTimeElapsed(),
//                            new pluginMantisThumbnailPreview({
//                                urlFormat: '/video/screenshots/panda1s/img_{n}.png',
//                                timeInterval: 1,
//                            }),
                            new pluginMantisCloneThumbnailPreview(),
                            new pluginMantisTimelineMark({
                                marks: adsEvents,
                                matchVideo: function (vInfo) {
                                    return (vInfo.type && 'main' === vInfo.type);
                                },
                            }),
                        ],
                    }),
                ]
            });


            // replay mode
            var videoInfo = {
                id: 1,
                type: 'main',
                url: "/video/rose.mp4",
                url: "/video/panda.mp4",
                title: "KungFu Panda 2",
            };
            vp.prepareVideo(videoInfo, [0, 0], {
                playAfter: function () {
                    jLoaderImage.hide();
                },
            });


        });
    })(jQuery);

</script>


</body>
</html>