(function () {

    /**
     * Implementation of a videoElement.
     */
    window.jvpVideoElement = function () {
        this.video = null;
        this._isLoaded = false;
        this.listeners = {};
    };

    window.jvpVideoElement.prototype = {
        //------------------------------------------------------------------------------/
        // VIDEO ELEMENT INTERFACE
        //------------------------------------------------------------------------------/
        /**
         * Returns the dom element representing the video element.
         * It's used in case where you want to duplicate the video for instance.
         */
        getElement: function () {
            return this.video;
        },
        /**
         * Source is a html5 video tag; it already is set in the dom.
         * onLoad is executed when the videoElement is ready to play.
         */
        load: function (source, onLoad) {
            var zis = this;
            this._isLoaded = false;
            this.video = source;
            source.preload = 'auto'; // force firefox to trigger canplay && canplaythrough            
            addEventListenerOnce(source, 'canplaythrough', function () {
                zis._isLoaded = true;

                source.addEventListener('timeupdate', function () {
                    zis._trigger("timeupdate");
                });
                source.addEventListener('progress', function () {
                    zis._trigger("progress");
                });
                source.addEventListener('ended', function () {
                    zis._trigger("ended");
                });
                onLoad();
            });
        },
        resume: function () {
            this.video.play();
        },
        pause: function () {
            this.video.pause();
        },
        /**
         * time in seconds
         */
        setTime: function (time) {
            this.video.currentTime = time;
        },
        /**
         * volume is a value from 0 to 1
         */
        setVolume: function (volume) {
            this.video.volume = volume;
        },
        /**
         * time in seconds
         */
        getTime: function () {
            return this.video.currentTime;
        },
        getVolume: function () {
            return this.video.volume;
        },
        /**
         * Duration in seconds.
         */
        getDuration: function () {
            return this.video.duration;
        },
        isPlaying: function () {
            return (false === this.video.paused);
        },
        isLoaded: function () {
            return this._isLoaded;
        },
        /**
         * Returns an array of <bufferedRange>s.
         * A <bufferedRange> is an array containing:
         *
         *      - 0: number, start time of the buffered range in seconds
         *      - 1: number, end time of the buffered range in seconds
         *
         */
        getBufferRanges: function () {
            var bufferRanges = [];
            for (var i = 0; i < this.video.buffered.length; i++) {
                bufferRanges.push([this.video.buffered.start(i), this.video.buffered.end(i)]);
            }
            return bufferRanges;
        },
        /**
         * Possible events are:
         *
         * - timeupdate
         *          fired whenever the time is updated, either because of the natural flow,
         *          or by user seeking.
         *
         * - progress
         *          fired when chunks of video are downloaded.
         *          This helps creating a visual representation of the buffered ranges.
         * - ended
         *          fired when the video naturally ends,
         *          or if the time is set to a value more than or equal to the duration.
         */
        on: function (eventName, fn) {
            if (false === (eventName in this.listeners)) {
                this.listeners[eventName] = [];
            }
            this.listeners[eventName].push(fn);
            return this;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _trigger: function (eventName, ...args) {
            if (eventName in this.listeners) {
                for (var i in this.listeners[eventName]) {
                    this.listeners[eventName][i].call(this, ...args);
                }
            }
        },
    };

    //------------------------------------------------------------------------------/
    // TOOLS
    //------------------------------------------------------------------------------/
    function addEventListenerOnce(element, event, fn) {
        var func = function () {
            element.removeEventListener(event, func);
            fn();
        };
        element.addEventListener(event, func);
    }


})();