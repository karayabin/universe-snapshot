(function () {


    /**
     *
     * DISCLAIMER: YOU CAN ONLY USE THIS PLUGIN IF YOU KNOW THAT YOUR VIDEOELEMENT USES THE HTML5 VIDEO TAG !!!
     * ===============
     * 
     * 
     * 
     * Why another thumbnail preview plugin?
     * -----------------------------------------
     *
     * From my tests,
     * the pluginMantisThumbnailPreview works well, but only if you have generated a frame every second,
     * and set the offset to 2.
     *
     * When you convert a 630.3Mo video into png screenshots, 1 per second, in a screenshots directory,
     * then you end up with a screenshots directory of 3.72 Go.
     * Plus, it takes a few minutes (3-5 minutes).
     *
     * If you handle many videos, that might be a constraint that you would want to get rid of.
     *
     * The goal of THIS plugin is to create a dynamic alternative to the pluginMantisThumbnailPreview plugin.
     *
     *
     * What does THIS plugin do?
     * ----------------------------
     *
     * It clones the video tag (works only with html5 tags),
     * and set the time of the clone to the adequate time when you hover the timeline.
     * As a result, you end up with no work at all server side, and the preview is more accurate (synced in time)
     * than with the previous method.
     *
     *
     *
     *
     *
     * Events
     * ===========
     *
     * listened to
     * ---------------
     *
     * - setcurrentvideo: to ensure the video is ready (need duration for calculation)
     *
     */
    window.pluginMantisCloneThumbnailPreview = function (options) {


        this.d = $.extend({
            videoContainer: null,
        }, options);

        this.duration = 0;
        this.clone = null;
    };

    pluginMantisCloneThumbnailPreview.prototype = {
        prepare: function (vp, skin) {
            var zis = this;

            this.jTimeLinePreviewTime = $('<time>00:00:00</time>');
            
            
            

            vp.on('setcurrentvideo', function () {

                zis.clone = $(vp.getCurrentVideo().getElement()).clone();

                skin.jTimeLinePreview.empty().append(zis.clone);
                skin.jTimeLinePreview.append(zis.jTimeLinePreviewTime);
                zis.duration = vp.getCurrentVideo().getDuration();

                var fnHover = function (percent) {
                    var time = zis.getEllapsedTime(percent);

                    /**
                     * Note: this will only work with html5 video tags
                     */
                    zis.clone[0].currentTime = time;
                    zis.jTimeLinePreviewTime.html(durationToString(time));
                };

                skin.on("timelinehover", fnHover);
                skin.on("timelinedrag", fnHover);
            });
        },
        getEllapsedTime(p){
            return Math.ceil((this.duration * p / 100));
        },
    };



    function durationToString(d) {
        var hours = parseInt(d / 3600) % 24;
        var minutes = parseInt(d / 60) % 60;
        var seconds = d % 60;
        return (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    }
    
})();