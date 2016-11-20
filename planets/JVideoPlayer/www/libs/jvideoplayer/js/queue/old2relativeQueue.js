window.RelativeQueue = function () {
    var noop = function () {
    };
    this.onPrepare = noop;
    this.onResume = noop;
    this.onPause = noop;
    this.onSetTime = noop;
    this.onStop = noop;
    this.events = [];
    this.optimizer = null;
    this.backtrack = false;

    this.keyStart = 'start';
    this.keyDuration = 'duration';

    // private
    this.timeouts = [];
    this.curTime = 0;
    this.paused = true;
    this.lastDate = null;
};
window.RelativeQueue.prototype = {
    setEvents: function (events) {
        this.events = events;
        return this;
    },
    addEvents: function (events) {
        this.events = this.events.concat(events);
        return this;
    },
    resume: function () {
        if (true === this.paused) {
            this.paused = false;
            this._sync();
            this._processEvents(this.backtrack);
        }
    },
    pause: function () {
        if (false === this.paused) {
            this.paused = true;
            this._cancelFutureEvents();
            this.curTime = this.curTime + (Date.now() - this.lastDate);


            // pause the currently playing element(s)
            if (true === this.backtrack) {
                var zis = this;
                this._applyPresentEvents(function (event) {
                    zis.onPause(event);
                });
            }
        }
    },
    setTime: function (ms) {
        var oldCurTime = this.curTime + (Date.now() - this.lastDate);
        this.curTime = ms;
        var zis = this;
        if (false === this.paused) {
            this._cancelFutureEvents();
            this._processEvents();

            this._applyPresentEvents(function (event) {

                // if the present event was not already playing before the call to setTime,
                // we need to prepare it before we play it
                if (false === (event[zis.keyStart] <= oldCurTime && event[zis.keyStart] + event[zis.keyDuration] >= oldCurTime)) {
                    var eventCurTime = event[zis.keyStart] + event[zis.keyDuration] - zis.curTime;
                    zis.onPrepare(event, 0, eventCurTime);
                }
                zis.onSetTime(event, zis.curTime - event[zis.keyStart]);
                zis.onResume(event);
            });

        }
    },
    //------------------------------------------------------------------------------/
    // INTERACTION
    //------------------------------------------------------------------------------/
    setOnPrepare: function (fn) {
        this.onPrepare = fn;
        return this;
    },
    setOnResume: function (fn) {
        this.onResume = fn;
        return this;
    },
    setOnPause: function (fn) {
        this.onPause = fn;
        return this;
    },
    setOnSetTime: function (fn) {
        this.onSetTime = fn;
        return this;
    },
    setOnStop: function (fn) {
        this.onStop = fn;
        return this;
    },
    //------------------------------------------------------------------------------/
    // OPTIONS
    //------------------------------------------------------------------------------/
    setBacktrack: function (bool) {
        this.backtrack = bool;
        return this;
    },
    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    _cancelFutureEvents: function () {
        this.timeouts.forEach(function (timeout) {
            clearTimeout(timeout);
        });
        this.timeouts = [];
    },
    _sync: function () {
        this.lastDate = Date.now();
    },
    _processEvents: function (resumeBacktrack) {
        var zis = this;


        for (var i in this.events) {

            let event = this.events[i];

            // processing forward
            if (event[this.keyStart] >= this.curTime) {
                var timeout = event[this.keyStart] - this.curTime;
                this.onPrepare(event, timeout);
                this.timeouts.push(setTimeout(function () {
                    zis.onResume(event);
                }, timeout));
            }
            // processing backward, looking for currently playing elements
            else if (true === resumeBacktrack) {
                if (event[this.keyStart] + event[this.keyDuration] > this.curTime) {
                    var eventCurTime = event[this.keyStart] + event[this.keyDuration] - this.curTime;
                    this.onPrepare(event, 0, eventCurTime);
                    if (false === this.paused) {
                        this.timeouts.push(setTimeout(function () {
                            zis.onResume(event);
                        }, 0));
                    }
                }
            }
        }
    },
    _applyPresentEvents: function (fn) {
        for (var i in this.events) {
            var event = this.events[i];
            if (event[this.keyStart] < this.curTime && event[this.keyStart] + event[this.keyDuration] > this.curTime) {
                fn(event);
            }
        }
    },
};