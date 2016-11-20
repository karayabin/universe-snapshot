(function () {

    /**
     *
     * This plugins connects the remote to a video player,
     * and possibly other video player third party plugins.
     *
     *
     * Events
     * ============
     *
     * triggered
     * ----------------
     *
     * - settime: via vp.setTime, when the user finishes scrubbing the time line
     * - resume: via vp.resume, when the user click the mantis play/resume button
     * - pause: via vp.pause, when the user click the mantis pause button
     * - setvolume: via vp.pause, when the user drags the volume slider
     *
     *
     * listened to
     * ----------------
     *
     * - setcurrentvideo: prepare the mantis remote to play the new video (visual appearance and texts)
     * - timeupdate: update the timeline of mantis
     * - progress: update buffered ranges in the timeline
     * - resume: to sync the play button with the video player state, if necessary
     * - pause: to sync the pause button with the video player state, if necessary
     * - setvolume: to sync the volume slider with the video player state, if necessary
     * - bubblehide: hide the bubble (originally designed to show the "skip ad button")
     * - bubbleshow: show the bubble
     * - bubblesettext: set the text of the bubble
     * - scrublimit: set the maximum scrubbable value on the timeline (above which the user can't scrub)
     *
     *
     */

    window.pluginMantis = function (options) {
        this.d = $.extend({
            /**
             * A mantis remote instance
             */
            mantis: null,
            plugins: [],
        }, options);
    };

    pluginMantis.prototype = {
        prepare: function (vp) {

            var mantis = this.d.mantis;
            var zis = this;


            //------------------------------------------------------------------------------/
            // TRIGGERED
            //------------------------------------------------------------------------------/
            mantis.on('timelineupdated', function (p) {
                var curVideo = vp.getCurrentVideo();
                if (null !== curVideo) {
                    /**
                     * In live mode, the curVideo ùight
                     */
                    vp.setTime(curVideo.getDuration() * p / 100);
                }
            });
            mantis.on('play', function () {
                vp.resume();
            });
            mantis.on('pause', function () {
                vp.pause();
            });
            mantis.on('volumedrag', function (p) {
                vp.setVolume(p / 100);
            });
            mantis.on('enterfullscreen', function () {
                this.vswitch.kickIn('fullscreen');
                fs.requestFullscreen(mantis.getSurface()[0]);
            });
            mantis.on('exitfullscreen', function () {
                this.vswitch.kickOut('fullscreen');
                fs.exitFullscreen();
            });


            //------------------------------------------------------------------------------/
            // LISTENED TO
            //------------------------------------------------------------------------------/
            vp.on('setcurrentvideo', function (info) {
                mantis.setTitle(info.title);
                mantis.setDuration(info.duration);
            });

            vp.on('timeupdate', function () {
                if (false === mantis.isPlayHeadDragging()) {
                    var time = vp.getCurrentVideo().getTime();
                    mantis.setPlayHeadPositionByTime(time, false);
                }
            });
            vp.on('progress', function () {
                if (false === mantis.isPlayHeadDragging()) {
                    mantis.setBufferedRanges(vp.getCurrentVideo().getBufferRanges());
                }
            });
            vp.on('resume', function () {
                mantis.play(false);
            });
            vp.on('pause', function () {
                mantis.pause(false);
            });
            vp.on('setvolume', function (v) {
                mantis.setVolume(v * 100, false);
            });
            vp.on('bubblehide', function () {
                mantis.hideBubble();
            });
            vp.on('bubbleshow', function () {
                mantis.showBubble();
            });
            vp.on('bubblesettext', function (text) {
                mantis.setBubbleContent(text);
            });

            vp.on('scrublimit', function (t) {
                mantis.setScrubLimit(t);
            });
            
            vp.on('hidetimeline', function (t) {
                mantis.hideTimeline();
            });
            vp.on('showtimeline', function (t) {
                mantis.showTimeline();
            });


            //------------------------------------------------------------------------------/
            // INIT MANTIS PLUGIN PLUGINS
            //------------------------------------------------------------------------------/
            for (var i in this.d.plugins) {
                this.d.plugins[i].prepare(vp, mantis);
            }
        },
    };

})();
