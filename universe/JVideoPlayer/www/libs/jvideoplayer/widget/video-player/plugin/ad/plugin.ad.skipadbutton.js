(function () {


    /**
     * Events
     * ==========
     *
     * Triggered
     * ------------
     *
     * - bubblesettext ( text ): set the "skip ad" text inside a remote's bubble (info pane provided by the remote)
     * - bubblehide: hide the bubble
     * - bubbleshow: show the bubble
     * - skipad: to skip the current ad
     *
     *
     *
     *
     * listened to
     * ---------------
     *
     * - canskipad: tells the remote to display a bubble with a clickable "skip ad" button inside.
     * - ended: when the ad ends, we resume the main video.
     *
     *
     */
    window.pluginAdSkipAdButton = function (options) {
        this.d = $.extend({
            text: "Skip ad",
        }, options);
        this.vp = null;
        this.adVideoInfo = null;
    };

    pluginAdSkipAdButton.prototype = {
        prepare: function (vp) {
            this.vp = vp;
            var zis = this;


            var jLink = $('<a href="#">' + zis.d.text + '</a>');

            //------------------------------------------------------------------------------/
            // EVENTS LISTENING
            //------------------------------------------------------------------------------/
            vp.on('canskipad', function (videoInfo) {
                zis.adVideoInfo = videoInfo;
                vp.trigger('bubblehide'); // hide any already existing bubble, by precaution
                vp.trigger('bubblesettext', jLink);
                vp.trigger('bubbleshow');
                jLink.on('click', function () {
                    vp.trigger('bubblehide');
                    var time = vp.getCurrentVideo().getDuration() + 100;
                    vp.setTime(time);
                    return false;
                });
            });

            vp.on('ended', function (videoInfo) {
                if (null !== zis.adVideoInfo) {
                    if (true === vp.isSameVideoInfo(videoInfo, zis.adVideoInfo)) {
                        vp.trigger('bubblehide');
                    }
                }
            });
        },
    };
})();
