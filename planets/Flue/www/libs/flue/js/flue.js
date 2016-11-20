(function () {


    //window.flue = function () {
    //    
    //};
    window.flue = {};
    var values = {};
    var listeners = [];
    var bubbles = [];
    //------------------------------------------------------------------------------/
    // STATIC
    //------------------------------------------------------------------------------/
    flue.set = function (k, v) {
        values[k] = v;
        return this;
    };
    flue.get = function (k) {
        if (k in values) {
            return values[k];
        }
        throw new Error("flue: value not found with key: " + k);
    };
    flue.getOr = function (k, defaultValue) {
        if (k in values) {
            return values[k];
        }
        return defaultValue;
    };
    flue.listeners = {
        add: function (cb) {
            listeners.push(cb);
        }
    };
    flue.bubbles = {
        add: function (cb) {
            bubbles.push(cb);
        }
    };
    flue.init = function (onFlueReady) {
        var i;
        for (i in bubbles) {
            bubbles[i]();
        }
        for (i in listeners) {
            listeners[i]();
        }
        if ('undefined' !== typeof onFlueReady) {
            onFlueReady();
        }
    };
})();