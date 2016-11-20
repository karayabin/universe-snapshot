(function () {

    /**
     * 
     * Definition
     * --------------
     * The inner queue allows you to attach events to a specific video.
     * For instance, you can attach subtitles to a video, or video ads to a video.
     * 
     * 
     * Prerequisites
     * -----------------
     * 
     * In order to understand this object, one has to understand its underlying technology: the eventsQueue.
     * 
     * Please read the documentation for the eventsQueue object 
     * first (here: www/libs/jvideoplayer/js/eventsqueue/eventsqueue.js),
     * and then continue to read below.
     * 
     * Now that you know what an eventsQueue is, the pluginInnerQueue is just an eventsQueue manager.
     * It basically centralizes various eventsQueue that you may want to attach to a given video.
     * 
     * 
     * The handlers
     * ------------------
     * 
     * You work with the pluginInnerQueue by attaching eventsQueues to it.
     * This is done automatically by using the registerHandler method.
     * The first argument of the registerHandler method is the handler.
     * 
     * 
     * An handler is any js object with the following optional methods:
     * 
     * - prepare ( event, curTime )
     * - fire ( event )
     *
     * Those methods correspond and are synced with the underlying eventsQueue's onEventPrepared and 
     * onEventFired methods.
     * 
     * 
     * The second argument of the registerHandler method is the events.
     * Each event is a js map, with at least the start property which indicates the time in milliseconds
     * when the event should start.
     * 
     * 
     * There are two built-in handlers that you can use:
     * 
     * - innerqueue.handler.ad.js       (add ads to the video)
     * - innerqueue.handler.cue.js      (add subtitles to the video)
     * 
     * 
     * 
     * Events
     * -----------
     * 
     * ### listened to
     * 
     * - resume ( videoInfo ): to sync the eventsQueue
     * - pause ( videoInfo ): to sync the eventsQueue
     * - settime ( t, videoInfo ): to sync the eventsQueue
     * - setcurrentvideo ( videoInfo ): to sync the eventsQueue
     * 
     * 
     * 
     * 
     */

    window.pluginInnerQueue = function (options) {
        this.d = $.extend({
            /**
             * Returns bool, whether or not the events apply to the given videoInfo
             */
            matchVideo: function (videoInfo) {
                return false;
            },
        }, options);
        this.vp = null;
        this.handlers = [];
    };

    pluginInnerQueue.prototype = {
        prepare: function (vp) {
            this.vp = vp;
            var zis = this;


            // prepare handlers
            for (var i in this.handlers) {
                let handler = this.handlers[i][0];
                handler.init(vp);
                this.handlers[i][2] = new eventsQueue({
                    mode: 'relative',
                    events: this.handlers[i][1],
                    onEventPrepared: function (e, curTime) {
                        handler.prepare && handler.prepare(e, curTime);
                    },
                    onEventFired: function (event) {
                        handler.fire && handler.fire(event);
                    },
                });
            }

            vp.on('resume', function () {
                zis._call('resume');
            });
            vp.on('pause', function () {
                zis._call('pause');
            });
            vp.on('settime', function (t) {
                zis._call('setTime', t * 1000);
            });
            vp.on('setcurrentvideo', function () {
                zis._call('pause');
            });
        },
        registerHandler: function (handler, events) {
            this.handlers.push([handler, events]);
            return this;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _applyToVideo: function () {
            return (true === this.d.matchVideo(this.vp.getCurrentVideoInfo()));
        },
        _call: function (method, ...args) {
            if (this._applyToVideo()) {
                for (var i in this.handlers) {
                    this.handlers[i][2][method](...args);
                }
            }
        },
    };
})();
