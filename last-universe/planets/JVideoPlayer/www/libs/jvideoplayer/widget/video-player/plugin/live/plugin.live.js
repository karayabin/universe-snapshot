(function () {

    /**
     *
     */
    window.pluginLive = function (options) {
        this.d = $.extend({
            startTimeKey: 'start',
            durationKey: 'duration',
            /**
             * map of name => events
             *      where events is an array of events of the same type
             */
            eventsStreams: {},
            handlers: [],
        }, options);
        this.eventsStreams = this.d.eventsStreams;
        this.handlers = this.d.handlers;
        this.vp = null;
        /**
         * A map of references to the currently playing event for every event type (defined by the eventsStreams option)
         */
        this.playingEvents = {};
        this.offset = null;
        this.firstProcessEventsCall = true;
    };

    pluginLive.prototype = {
        prepare: function (vp) {
            this.vp = vp;

            vp.numbs.resume = true;
            vp.numbs.pause = true;

            var zis = this;
            var i;


            // initialize playingEvents 
            for (i in this.eventsStreams) {
                this.playingEvents[i] = null;
            }


            // initialize handlers
            for (i in this.handlers) {
                this.handlers[i].prepare(this, vp);
            }


            // we don't need timeline in live mode, do we?
            vp.trigger("hidetimeline");

            vp.on('pause', function () {
                /**
                 * Mark the time.
                 * Pause the current events if any.
                 * Clear all timeouts.
                 */
                zis._persistentSet('lastPauseTime', Date.now());
                zis._pause();
                zis._clearTimeouts();
            });


            vp.on('resume', function () {
                var lastPauseTime = zis._persistentGet('lastPauseTime');
                var newNow = null;
                if (null !== lastPauseTime) {
                    var now = Date.now();
                    zis.offset += now - lastPauseTime;
                    newNow = now - zis.offset;
                }
                zis.processEventsStreams(zis.eventsStreams, newNow);

            });

            // boot events: starts the events stream
            vp.trigger('resume');

        },
        processEventsStreams: function (eventsStreams, now) {
            if ('undefined' === typeof now || null === now) {
                now = Date.now();
            }
            var vp = this.vp;

            for (var _type in eventsStreams) {


                /**
                 * assuming events are ordered by time asc.
                 * If not, we have a problem.
                 * [event, elapsed, duration]
                 */
                var presentEventInfo = null;
                var events = eventsStreams[_type];


                for (var i in events) {
                    var event = events[i];

                    var startTime = event[this.d.startTimeKey];
                    var duration = event[this.d.durationKey] * 1000;
                    var timeout = startTime - now;
                    vp.trigger('liveprepare', event, timeout);


                    event.f_stopped = false; // ?


                    if (timeout >= 0) {
                        this._startStop(vp, event, _type, timeout, timeout + duration);
                    }
                    else {

                        /**
                         * Multiple events can be candidate for being already playing,
                         * but only one of them will be retained, because of the "events don't overlap" rule.
                         *
                         * For instance, let A and B be two candidates:
                         *
                         * A starts at t=-10 and last 30s
                         * B starts at t=-2 and last 30s
                         *
                         * Only B is the already playing event.
                         *
                         */
                        if (startTime + duration > now) {
                            presentEventInfo = [event, now - startTime, duration];
                        }
                    }
                }

                if (null !== presentEventInfo) {

                    var event = presentEventInfo[0];
                    var elapsed = presentEventInfo[1];
                    var duration = presentEventInfo[2];
                    /**
                     * Note:
                     * we assume that to play an event at a given time,
                     * suffice to apply the following recipe:
                     *
                     * - call settime
                     * - call start
                     * - ?call stop for ending
                     *
                     *
                     */
                    if (true === this.firstProcessEventsCall) {
                        vp.trigger("livesettime", event, elapsed);
                        this.firstProcessEventsCall = false;
                    }
                    this._startStop(vp, event, _type, 20, duration - elapsed);
                }
            }


        },
        resync: function () {
            this.clearUserTime();
            this.processEventsStreams(this.eventsStreams);
        },
        clearUserTime: function () {
            this.offset = null;
            this._persistentDelete('lastPauseTime');
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _startStop: function (vp, event, eventType, timeout_start, timeout_stop) {
            var zis = this;
            event.to_start = setTimeout(function () {
                zis._timeoutStart(vp, event, eventType);
            }, timeout_start);
            event.to_stop = setTimeout(function () {
                vp.trigger("livestop", event);
                event.f_stopped = true;
                zis.playingEvents[eventType] = null;
            }, timeout_stop);
        },
        _timeoutStart: function (vp, event, eventType) {
            var zis = this;
            if (null !== zis.playingEvents[eventType]) {
                if (false === zis.playingEvents[eventType].f_paused && false === zis.playingEvents[eventType].f_stopped) {
                    vp.trigger("livekill", zis.playingEvents[eventType]);
                    clearTimeout(zis.playingEvents[eventType].to_stop);
                    zis.playingEvents[eventType] = null;
                }
            }
            vp.trigger("liveresume", event);
            zis.playingEvents[eventType] = event;
            zis.playingEvents[eventType].f_paused = false;
        },
        _pause: function () {
            for (var i in this.playingEvents) {
                var playingEvent = this.playingEvents[i];
                if (null !== playingEvent) {
                    this.vp.trigger("livepause", playingEvent);
                    playingEvent.f_paused = true;
                }
            }
        },
        _clearTimeouts: function () {
            for (var j in this.eventsStreams) {
                var events = this.eventsStreams[j];
                for (var i in events) {
                    var event = events[i];
                    if (event.hasOwnProperty('to_start')) {
                        clearTimeout(event.to_start);
                    }
                    if (event.hasOwnProperty('to_stop')) {
                        clearTimeout(event.to_stop);
                    }
                }
            }
        },
        /**
         * Returns null if not set, or the value of k otherwise
         */
        _persistentGet: function (k) {
            return jcookie.get(k);
        },
        _persistentSet: function (k, v) {
            jcookie.set(k, v);
        },
        _persistentDelete: function (k) {
            jcookie.delete(k);
        },
    };

    function log(event) {
        console.log('#' + event.id);
    }


})();
