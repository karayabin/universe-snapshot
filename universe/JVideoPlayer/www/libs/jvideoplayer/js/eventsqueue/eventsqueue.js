(function () {

    /**
     * 
     * Definition
     * -------------
     * 
     * The eventsQueue object allows us to attach events on a timeline in a consistent manner.
     * 
     * 
     * 
     * What's the problem?
     * ----------------------
     * 
     * Imagine that you want to play a subtitle 3 seconds after a video starts, and another one at 5 seconds.
     * So you prepare some kind of timeouts that fire at 3 and 5 seconds after the video starts.
     *
     * But now imagine that the user watch the video, but pauses the video after 2 seconds!
     * Then, you have to cancel your timeouts right? (otherwise the subtitles would display in the middle of the pause: nonsense)
     *
     * Now imagine that the user scrubs the timeline and move forward, and then back again to 1 second!
     * Then, you have to re-adjust your timeouts timing, right?
     *
     * The eventsQueue let you declare what events you want, and at what time they start, 
     * and handles the dirty timeout management for you.
     * 
     * 
     * The eventsQueue modes
     * ------------------------
     * 
     * The eventsQueue object was created with two modes:
     * 
     * - absolute: for absolute timing
     * - relative: for relative timing
     * 
     * Absolute mode is actually never used, so let's forget about it.
     * We are left with the relative mode, which is the mode I just explained above.
     * 
     * 
     * 
     * The onEventPrepared and onEventFired callbacks
     * --------------------------------------------------
     * 
     * Re-using the subtitles example from above, at 3s and 5s,
     * you might think that only one timeout is fired per event.
     * 
     * But there are actually two callbacks fired per event (a total of four callbacks in our example).
     * Each event is handled by the following callbacks:
     * 
     * - prepare: allow us to prepare the event.
     *                  Handling subtitles is simple enough that we don't use the prepare callback.
     *                  However, playing an advertising at given point in times is different, because
     *                  advertising is a video, and video needs to be preloaded: you can not just say fire the video
     *                  and expects it to fire instantly.
     *                  The prepare callback allows us to preload the video, so that when the fire event is fired,
     *                  we can have the ad video playing with no latency.
     *                  
     *                  
     * - fire: fire the event
     *
     */
    window.eventsQueue = function (options) {

        this.d = extend({
            /**
             * Mode can be absolute or relative.
             */
            mode: 'absolute',
            startTimeKeyName: 'start',
            onEventPrepared: function (e) {
            },
            onEventFired: function (e) {
            },
            events: [],
        }, options);


        this.timeouts = [];
        this.curTime = 0; // only affects relative mode
        this.paused = true;


    };

    eventsQueue.prototype = {
        //------------------------------------------------------------------------------/
        // METHODS
        //------------------------------------------------------------------------------/
        /**
         * time is in milliseconds.
         * Is only relevant in relative mode.
         *
         * If the mode is relative, and the time is set,
         * then:
         *      - if the box is paused, it remains paused after setTime
         *      - if the box is not paused, it remains unpaused after setTime, but the events are recalculated
         *
         */
        setTime: function (time) {
            if ('relative' === this.d.mode) {
                this.curTime = time;
                if (false === this.paused) {
                    this._clear();
                    this._processEvents();
                    this._sync();
                }
            }
        },
        pause: function () {
            if (false === this.paused) {
                this.paused = true;
                this._clear();
                if ('relative' === this.d.mode) {
                    this.curTime = this.curTime + (Date.now() - this.lastDate);
                }
            }
        },
        resume: function () {
            if (true === this.paused) {
                this.paused = false;
                this._sync();
                this._processEvents();
            }
        },
        /**
         * origin: now|0
         *
         *      specifies the origin (time=0) of the given events.
         *
         */
        addEvents: function (events, origin) {

            if ('relative' === this.d.mode) {
                var elapsed = this._getElapsedTime();
                if ('now' === origin) {
                    for (var i in events) {
                        events[i][this.d.startTimeKeyName] += elapsed;
                        this.d.events.push(events[i]);
                    }
                }
                else {
                    this.d.events = this.d.events.concat(events);
                }

                this.curTime = elapsed;
                this._clear();
                this._sync();
                this._processEvents();
            }
            else {
                console.log("not implemented yet");
            }
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _processEvents: function () {
            var zis = this;
            if ('absolute' === this.d.mode) {
                var curTimestamp = getCurrentTimestamp();
                for (var i in this.d.events) {
                    if (this.d.events[i][this.d.startTimeKeyName] >= curTimestamp) {
                        let event = this.d.events[i];
                        this.d.onEventPrepared(event, curTimestamp);
                        this.timeouts.push(setTimeout(function () {
                            zis.d.onEventFired(event);
                        }, (this.d.events[i][this.d.startTimeKeyName] - curTimestamp)));
                    }
                }
            }
            else {
                for (var i in this.d.events) {
                    if (
                        this.d.events[i][this.d.startTimeKeyName] > this.curTime ||
                        (0 === this.curTime && 0 === this.d.events[i][this.d.startTimeKeyName])
                    ) {
                        let event = this.d.events[i];
                        this.d.onEventPrepared(event, this.curTime);
                        this.timeouts.push(setTimeout(function () {
                            zis.d.onEventFired(event);
                        }, (this.d.events[i][this.d.startTimeKeyName] - this.curTime)));
                    }
                }
            }
        },
        _clear: function () {
            this.timeouts.forEach(function (timeout) {
                clearTimeout(timeout);
            });
            this.timeouts = [];
        },
        _sync: function () {
            if ('relative' === this.d.mode) {
                this.lastDate = Date.now();
            }
        },
        _dumpEvents: function () {
            console.warn("Events Dump");
            for (var i in this.d.events) {
                console.log(this.d.events[i].url, this.d.events[i][this.d.startTimeKeyName], this.curTime);
            }
        },
        /**
         * In relative mode, returns the elapsed time (in ms) since the beginning.
         */
        _getElapsedTime: function () {
            var curTime;
            if (false === this.paused) {
                curTime = this.curTime + (Date.now() - this.lastDate);
            }
            else {
                curTime = this.curTime;
            }
            return curTime;
        },
    };
    //------------------------------------------------------------------------------/
    // UTILS
    //------------------------------------------------------------------------------/
    function extend() {
        for (var i = 1; i < arguments.length; i++) {
            for (var key in arguments[i]) {
                if (arguments[i].hasOwnProperty(key)) {
                    arguments[0][key] = arguments[i][key];
                }
            }
        }
        return arguments[0];
    }

    function getCurrentTimestamp() {
        return Date.now();
    }

})();
