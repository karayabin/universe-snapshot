(function () {

    /**
     * Definition
     * ---------------
     *
     * This is a plugin for the innerqueue ad handler (../innerqueue/innerqueue.handler.ad.js).
     * This plugin controls which portion of the timeline can be scrubbed by the user.
     * 
     * 
     * How does it work?
     * --------------------
     * 
     * You define a number of seconds after which the ad can be skipped by the user.
     * 
     * Before that number, the user is only allowed to scrub the portions of the timeline that she has 
     * already watched.
     * After that number, the whole timeline can be scrubbed.
     * When the number is reached, a canskipad event is triggered, thus allowing third party plugins to react
     * to that event.
     *
     *
     * Events
     * ------------
     *
     * ### Triggered
     *
     * - canskipad (videoInfo): a flag to indicate that the user is now authorized to skip the ad.
     * - scrublimit: tells the remote which portions of the timeline can be scrubbed.
     *
     */
    window.pluginAdMinPlay = function (options) {
        this.d = $.extend({}, options);
        this.skipSent = false;
        this.scrubLimit = null;
    };

    pluginAdMinPlay.prototype = {
        init: function () {
            this.skipSent = false;
        },
        playBefore: function (vp, videoInfo) {
            this.skipSent = false;
            if ('minplay' in videoInfo) {
                this.scrubLimit = 0;
                vp.trigger('scrublimit', this.scrubLimit);
            }
        },
        timeupdateAfter: function (vp, videoInfo, time) {
            if ('minplay' in videoInfo) {

                if (false === this.skipSent) { // do this once only
                    if (time > this.scrubLimit) {
                        this.scrubLimit = time;
                        vp.trigger('scrublimit', time);
                    }
                    if (videoInfo.minplay >= 0) {
                        if (time >= videoInfo.minplay) {
                            vp.trigger('canskipad', videoInfo);
                            this.skipSent = true;
                            this.scrubLimit = null;
                            vp.trigger('scrublimit', this.scrubLimit);
                        }
                    }
                }
            }

        },
        kill: function (vp, videoInfo) {
            if ('minplay' in videoInfo) {
                this.scrubLimit = null;
                vp.trigger('scrublimit', this.scrubLimit);
            }
        },
    };


})();
