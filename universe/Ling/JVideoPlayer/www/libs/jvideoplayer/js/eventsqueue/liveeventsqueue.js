(function () {

    /**
     * 
     * See eventsqueue.js for a former intro to events queue.
     *
     */
    window.eventsQueue = function (options) {

        this.d = extend({
            startTimeKeyName: 'start',
            durationTimeKeyName: 'duration',
            onEventPrepared: function (e) {
            },
            onEventFired: function (e) {
            },
            onEventCancelled: function (e) {
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
        setOffset: function (offset) {
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
