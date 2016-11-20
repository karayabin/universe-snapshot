(function ($) {


    window.Lys = function (options) {

        this.d = Lys.extend({
            /**
             * An array of plugins.
             * A plugin is an object with an init method.
             * 
             *      void init ( LysInstance )
             *      
             */
            plugins: [],
            /**
             * a callback triggered when the needData event is triggered (via the dispatcher system).
             * 
             * The id argument is the session identifier.
             * 
             * It is used to identify a fetch data session (needData -> dataReady).
             * The same id value should be passed with both the needData and dataReady events.
             * 
             */
            onNeedData: function (id) {

            },
            /**
             * a callback triggered when the dataReady event is triggered (via the dispatcher system)
             *
             * The id argument should come from a triggered needData event.
             * The data argument represents the received data.
             */
            onDataReady: function (id, data) {

            },
        }, options);

        this.plugins = this.d.plugins;

        this.listeners = {};
        this.listenerIndex = 0;
    };

    window.Lys.prototype = {

        start: function () {
            for (var i in this.plugins) {
                this.plugins[i].init(this);
            }

            // registering custom callbacks 
            this.on('needData', this.d.onNeedData, 100);
            this.on('dataReady', this.d.onDataReady, 100);

        },
        //------------------------------------------------------------------------------/
        // DISPATCHER
        // jsdispatcher: https://github.com/lingtalfi/jsdispatchers/blob/master/dispatcher_propagation_position.js
        //------------------------------------------------------------------------------/
        on: function (eventName, fn, position = 0) {
            if (false === (eventName in this.listeners)) {
                this.listeners[eventName] = {};
            }

            if (false === (position in this.listeners[eventName])) {
                this.listeners[eventName][position] = {};
            }
            this.listeners[eventName][position][this.listenerIndex++] = fn;
            return this;
        },
        //once: function (eventName, fn, position = 0) {
        //    var zis = this;
        //    var _fn = function () {
        //        fn();
        //        zis.off(eventName, position, _fn);
        //    };
        //    this.on(eventName, _fn, position);
        //    return this;
        //},
        //off: function (eventName, position, fn = '') {
        //    if (eventName in this.listeners) {
        //        if (position in this.listeners[eventName]) {
        //            if ('' === fn) {
        //                delete this.listeners[eventName][position];
        //            }
        //            else {
        //                for (var i in this.listeners[eventName][position]) {
        //                    if (fn === this.listeners[eventName][position][i]) {
        //                        delete this.listeners[eventName][position][i];
        //                    }
        //                }
        //            }
        //        }
        //    }
        //},
        trigger: function (eventName, ...args) {
            //console.log("trigger: " + eventName, args[0]);
            if (eventName in this.listeners) {
                for (var pos in this.listeners[eventName]) {
                    for (var i in this.listeners[eventName][pos]) {
                        var info = {
                            stopPropagation: false,
                            position: pos,
                            index: i,
                        };
                        this.listeners[eventName][pos][i].call(info, ...args);
                        if (true === info.stopPropagation) {
                            return;
                        }
                    }
                }
            }
        },
    };

    //------------------------------------------------------------------------------/
    // TOOLS
    //------------------------------------------------------------------------------/
    Lys.extend = function () {
        for (var i = 1; i < arguments.length; i++)
            for (var key in arguments[i])
                if (arguments[i].hasOwnProperty(key))
                    arguments[0][key] = arguments[i][key];
        return arguments[0];
    };


})(jQuery);