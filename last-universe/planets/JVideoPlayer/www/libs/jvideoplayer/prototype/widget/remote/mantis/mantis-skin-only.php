<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <title>Html page</title>


    <!-- MANTIS AND DEPENDENCIES-->
    <script
        src="https://cdn.rawgit.com/lingtalfi/jDragSlider/master/www/libs/jdragslider/js/jdragslider.js"></script>
    <script src="https://cdn.rawgit.com/lingtalfi/VSwitch/master/www/libs/vswitch/js/vswitch.js"></script>
    <script src="/libs/jvideoplayer/widget/remote/mantis/mantis.js"></script>
    <link rel="stylesheet" href="/libs/jvideoplayer/widget/remote/mantis/style.css">

    <style>
        body {
            background: black;
        }

        #specials {
            background: white;
            width: 500px;
            height: 100px;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 1000;
        }

    </style>
</head>


<body>


<!-- START https://github.com/lingtalfi/jVideoPlayer/blob/master/www/templates/jvp.mantis.htpl -->
<div class="mantis_host">


    <div class="videoplayer"></div>

    <div class="player_controls">
        <section class="timeline">
            <label class="noselect">00:00:00</label>
            <div class="scrubber">
                <div class="progress">
                    <div class="completed"></div>
                    <div class="buffered"></div>

                    <div class="mark arrow"></div>
                    <div class="mark guide"></div>
                </div>
                <!-- Note: the handle class has been added to the .target button, because firefox otherwise "doesn't detect" the click on the handle -->
                <button class="target handle">
                    <div class="handle"></div>
                </button>
                <section class="preview noselect">
                </section>
            </div>
        </section>
        <section class="control_bar">
            <div class="control control_play_resume jvp-icon-play"></div>
            <div class="control control_pause jvp-icon-pause"></div>
            <div class="control control_volume jvp-icon-volume-high">
                <div class="menu_wrapper">
                    <div class="padder">
                        <div class="scrubber">
                            <div class="progress">
                                <div class="completed"></div>
                            </div>
                            <!-- Note: the handle class has been added to the .target button, because firefox otherwise "doesn't detect" the click on the handle -->
                            <button class="target handle vertical">
                                <div class="handle vertical"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video_title noselect"><span>Crouching Tiger, Hidden Dragon: Sword of Destiny</span></div>
            <!--            <div class="control control_config jvp-icon-cog"></div>-->
            <div class="control control_fullscreen jvp-icon-enlarge"></div>
        </section>
        <section class="bubble_bar">
            <div class="bubble">
                <label><a href="#">Skip ad</a></label>
            </div>
        </section>


    </div>
</div>
<!-- END https://github.com/lingtalfi/jVideoPlayer/blob/master/www/templates/jvp.mantis.htpl -->


<div id="specials">
    <button class="special toggle_timeline">toggle timeline</button>
    <button class="special toggle_volume">toggle_volume</button>
    <button class="special toggle_mute">toggle_mute</button>
    <button class="special toggle_bubble">toggle_bubble</button>
    <button class="special toggle_preview">toggle_preview</button>
    <button class="special hideshow_timeline">hide/show timeline</button>
</div>

<script>
    (function ($) {
        $(document).ready(function () {


            var jSurface = $('.mantis_host');


            var duration = 1000; // 1000 seconds

            var mantis = new Mantis(jSurface);

            // creating a fake thumbnail preview manually
            mantis.jTimeLinePreview.append('<time>00:00:00</time>');
            mantis.jTimeLinePreview.append('<img src="http://www.keenthemes.com/preview/metronic/theme/assets/global/plugins/jcrop/demos/demo_files/image1.jpg">');


            //------------------------------------------------------------------------------/
            // SPECIAL
            //------------------------------------------------------------------------------/
            $('#specials').on('click', '.special', function () {
                if ($(this).hasClass('toggle_timeline')) {
                    jSurface.toggleClass("hide_timeline");
                }
                else if ($(this).hasClass('toggle_volume')) {
                    jSurface.toggleClass("volume_panel");
                }
                else if ($(this).hasClass('toggle_preview')) {
                    jSurface.toggleClass("preview_mode");
                }
                else if ($(this).hasClass('hideshow_timeline')) {
                    jSurface.toggleClass("no_timeline");
                }
                else if ($(this).hasClass('toggle_mute')) {
                    var jControl = $('.control_volume');
                    if (jControl.hasClass('jvp-icon-volume-mute')) {
                        jControl
                            .addClass("jvp-icon-volume-high")
                            .removeClass("jvp-icon-volume-mute");
                    }
                    else {
                        jControl
                            .removeClass("jvp-icon-volume-high jvp-icon-volume-medium jvp-icon-volume-low")
                            .addClass("jvp-icon-volume-mute");
                    }

                }
                else if ($(this).hasClass('toggle_bubble')) {
                    jSurface.toggleClass("with_bubble");
                }
                return false;
            });
        });
    })(jQuery);
</script>
</body>
</html>