(function () {


    window.Chronometer = function (options) {
        this.d = extend({
            /**
             * @param precision - int,
             * the speed at which the chronometer updates, in milliseconds
             */
            precision: 10,
            /**
             * @param ontimeupdate - callback (int:elapsedTimeInMilliseconds),
             * triggered every times the chronometer updates.
             * You might want to use the Chronometer.utils method to format the date to a more human readable format
             */
            ontimeupdate: function (elapsed) {

            }
        }, options);
        
        this._elapsed = 0;
        this._timerId = 0;
    };

    Chronometer.prototype = {
        start: function () {
            this._chrono();
        },
        pause: function () {
            this._stopChrono();
        },
        stop: function () {
            this._stopChrono();
            this._elapsed = 0;
            this.d.ontimeupdate(this._elapsed);
        },
        getElapsedTime: function () {
            return this._elapsed;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        _chrono: function () {
            var zis = this;
            this._timerId = setTimeout(function () {
                zis._chrono();
                zis._elapsed += zis.d.precision;
                zis.d.ontimeupdate(zis._elapsed);
            }, this.d.precision);
        },
        _stopChrono: function () {
            clearTimeout(this._timerId);
        }
    };

    Chronometer.utils = {
        humanFormat: function (t, sep) {
            if ('undefined' === typeof sep) {
                sep = ':';
            }
            var date = new Date(t);
            var msec = date.getMilliseconds();
            var sec = date.getSeconds();
            var min = date.getMinutes();
            var hr = date.getHours() - 1;
            if (hr < 10) {
                hr = "0" + hr;
            }
            if (min < 10) {
                min = "0" + min;
            }
            if (sec < 10) {
                sec = "0" + sec;
            }
            if (msec < 10) {
                msec = "00" + msec;
            }
            else if (msec < 100) {
                msec = "0" + msec;
            }
            return hr + sep + min + sep + sec + sep + msec;
        }
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
})();