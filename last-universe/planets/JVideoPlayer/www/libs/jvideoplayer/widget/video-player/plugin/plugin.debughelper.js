(function () {


    /**
     * This plugin will subscribe to some (default video player) events,
     * and just notify you when those events are played.
     */


    var debugInstances = [];

    window.pluginDebugHelper = function (options) {
        this.d = $.extend({
            notify: function (dh, eventName, ...args) {
                console.log("event("+ dh.getTime() +"): " + eventName, ...args);
            },
            blackList: [],
            /**
             * Operation mode.
             * string: triggered|listenedTo
             *
             * If listenedTo is chosen, the debug helper notifies you when an event listener actually catches an event.
             * If triggered is chosen, the debug helper notifies you when an event is triggered, with no consideration of
             *          whether it's actually listened to.
             *
             *
             *
             */
            mode: 'listenedTo',
        }, options);
        this.vp = null;
        this.origin = Date.now();
        return this;
    };


    pluginDebugHelper.prototype = {
        prepare: function () {
            debugInstances.push(this);
        },
        startTime: function () {
            this.origin = Date.now();
        },
        getTime: function () {
            return parseFloat((Date.now() - this.origin) / 1000).toFixed(3);
        }
    };


    //------------------------------------------------------------------------------/
    // TOOLS
    //------------------------------------------------------------------------------/
    function notify(mode, eventName, ...args) {
        for (var i in debugInstances) {
            if (mode === debugInstances[i].d.mode) {
                if (-1 === debugInstances[i].d.blackList.indexOf(eventName)) {
                    debugInstances[i].d.notify(debugInstances[i], eventName, ...args);
                }
            }
        }
    }

    //------------------------------------------------------------------------------/
    // OVERRIDE VIDEO PLAYER'S RELEVANT METHODS
    //------------------------------------------------------------------------------/
    window.videoPlayer.prototype._doTrigger = function (fn, info, eventName, ...args) {
        notify("listenedTo", eventName, ...args);
        return fn.call(info, ...args);
    };

    window.videoPlayer.prototype.watchTriggeredEvent = function (eventName, ...args) {
        notify("triggered", eventName, ...args);
    };
})();
