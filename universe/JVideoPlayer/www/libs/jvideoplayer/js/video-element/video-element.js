(function () {

    /**
     * Actually this is just an interface model.
     * You can copy paste this to create a new concrete videoElement object.
     *
     *
     *
     * A wrapper for a video element.
     *
     * jvp was built with the html5 video element in mind.
     *
     * But this object is meant to help with the theoretical case where we want to switch the video element
     * technology (for instance if we wanted to use a flash player).
     * Whatever the videoElement is, it should conform to this interface.
     *
     */
    window.jvpVideoElement = function () {
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
        getElement: function(){
            
        },
        /**
         * Source depends on the concimagesrete implementation.
         * onLoad is executed when the videoElement is ready to play.
         */
        load: function (source, onLoad) {

        },
        resume: function () {

        },
        pause: function () {

        },
        /**
         * time in seconds
         */
        setTime: function (time) {

        },
        /**
         * volume is a value from 0 to 1
         */
        setVolume: function (volume) {

        },
        /**
         * time in seconds
         */
        getTime: function () {

        },
        getVolume: function () {

        },
        /**
         * Duration in seconds.
         */
        getDuration: function () {

        },
        isPlaying: function () {
        },
        isLoaded: function () {
        },
        /**
         * Returns an array of <bufferedRange>s.
         * A <bufferedRange> is an array containing:
         * 
         *      - 0: number, start time of the buffered range in seconds
         *      - 1: number, end time of the buffered range in seconds
         * 
         */
        getBufferRanges: function(){
            
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
    

})();