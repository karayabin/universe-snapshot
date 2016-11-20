(function () {

    /**
     * Dependencies:
     *  - jquery
     */

    function gol(m, ...args) {
        console.log("eventsPlayer: " + m, ...args);
    }

    window.EventsPlayer = function (options) {

        this.d = $.extend({
            /**
             * eventType => map:
             *      handler: HandlerClassName
             *                  Name of the eventHandler class for that eventType.
             *      target: name of the target layer on which the event placeholder
             *                  should be displayed.
             *      interruptMode: pause|stop (default)
             *                      With pause mode, the outgoing event
             *                      resumes in the spot when the ingoing events ends.
             *                      With stop mode, the outgoing event is stopped directly.
             *
             *
             *
             */
            eventTypeInfo: {},
            /**
             * layerName => map:
             *      - type
             *      - zIndex
             */
            layers: {},
            layerManager: null,
            interruptModeHandler: null,
        }, options);

        this.eventsQueues = [];

        /**
         * eventId => placeHolder
         */
        this.placeHolders = {};
        this.lm = this.d.layerManager;
        this.imh = this.d.interruptModeHandler;
        this.initialized = false;

    };
    window.EventsPlayer.prototype = {
        addEventsQueue: function (eventsQueue) {
            var zis = this;
            this.eventsQueues.push(eventsQueue);

            // prepare the queue
            eventsQueue.on('prepare', function (...args) {
                zis.__onQueuePrepare(...args);
            });
            eventsQueue.on('resume', function (...args) {
                zis.__onQueueResume(...args);
            });
            eventsQueue.on('settime', function (...args) {
                zis.__onQueueSetTime(...args);
            });


            return this;
        },
        resume: function () {
            this.__init();
            for (var i in this.eventsQueues) {
                this.eventsQueues[i].resume();
            }
        },
        //------------------------------------------------------------------------------/
        // EXPOSED
        //------------------------------------------------------------------------------/
        setLayerManager: function (lm) {
            this.lm = lm;
            return this;
        },
        setInterruptModeHandler: function (h) {
            this.imh = h;
            return this;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        __init: function () {
            if (false === this.initialized) {
                this.initialized = true;

                if (null === this.lm) {
                    throw new Error("A LayerManager instance needs to be set");
                }
                if (null === this.imh) {
                    throw new Error("An InterruptModeHandler instance needs to be set");
                }

                // create layers
                for (var name in this.layers) {
                    this.lm.createLayer(name, this.layers[name].zIndex);
                }
            }
        },
        __onQueuePrepare: function (event, startTimeout, offset) {
            var placeHolder;
            var eventId = this.__getEventId(event);


            console.log("prepare #" + eventId + ": " + startTimeout + ", " + offset);


            /**
             * get the event placeholder,
             * either from cache, or create it
             */
            if (false === this.placeHolders.hasOwnProperty(eventId)) {
                placeHolder = $('<div></div>');
                this.placeHolders[eventId] = placeHolder;


                var eventHandler = this.__getNewEventHandlerInstance(event);

                var loadedPromise = new Promise(function (resolve, reject) {
                    eventHandler.on('eventdurationready', function () {
                        resolve();
                    });
                    eventHandler.prepare(event, placeHolder);
                });

                placeHolder.data('loadedPromise', loadedPromise);
                placeHolder.data('eventHandler', eventHandler);
                placeHolder.data('eventId', eventId);
            }
            else {
                placeHolder = this.placeHolders[eventId];
            }


            // put the placeholder in the background
            this.__putIntoBackground(eventId, placeHolder);


        },
        __onQueueResume: function (event) {

            var zis = this;
            console.log("qresume " + event.id);

            // get the placeholder from the event
            var eventId = this.__getEventId(event);
            var placeHolder = this.placeHolders[eventId];

            var targetLayer = this.__getEventTargetName(event);
            var layerType = this.__getLayerType(targetLayer);

            // a dedicated layer
            if ('dedicated' === layerType) {
                // if an event is already playing on that layer, we have a conflict
                var jLayer = this.lm.getLayer(targetLayer);
                if (false === jLayer.is(':empty')) {
                    var interruptMode = this.__getEventInterruptMode(event);
                    /**
                     * we assume that the interruptModeHandler will solve the conflict,
                     * and so that there will be only one physical element in the dedicated layer,
                     * which explains why we rely on the following physical search technique to
                     * obtain the jOutgoingEvent.
                     */
                    var jOutgoingEvent = jLayer.find('> *:first');
                    var jIngoingEvent = placeHolder;
                    console.log("handle conflict " + event.id);
                    this.imh.handleConflict(this, interruptMode, jOutgoingEvent, jIngoingEvent, targetLayer);
                }
            }


            // append the event placeholder to the layer
            this.lm.putIntoLayer(targetLayer, placeHolder);


            //resume the event
            placeHolder.data('loadedPromise').then(function () {
                // attach a callback when it stops, once
                if (false === event.hasOwnProperty('_loaded')) {
                    event._loaded = true;
                    placeHolder.data('eventHandler').on('eventend', function (jElement) {

                        console.log("eventplayer end " + event.id);


                        // if it's cacheable put the placeholder back in the background,
                        if (true === zis.__isEventCacheable(event)) {
                            zis.__putIntoBackground(eventId, placeHolder);
                        }
                        // if it's not cacheable, remove the placeholder and the holding bg layer
                        else {
                            placeHolder.remove();
                            zis.lm.getLayer(eventId).remove();
                        }
                    });
                }


                console.log("eventplayer resume " + event.id);
                placeHolder.data('eventHandler').resume();
            });

        },
        __onQueueSetTime: function (event, time) {
            var eventId = this.__getEventId(event);
            console.log("ep: setTime #" + eventId + " t: " + time);
            this.placeHolders[eventId].data('eventHandler').setTime(time);
        },
        __stopEvent: function () {

        },
        __isEventCacheable: function (event) {
            return event.hasOwnProperty('cacheable') && true === event.cacheable;
        },
        __getEventId: function (event) {
            return event.type + event.id;
        },
        __getEventTargetName: function (event) {
            if (event.hasOwnProperty('target')) {
                return event.target;
            }
            return this.d.eventTypeInfo[event.type].target;
        },
        __getEventInterruptMode: function (event) {
            if (event.hasOwnProperty('interruptMode')) {
                return event.interruptMode;
            }
            if (this.d.eventTypeInfo[event.type].hasOwnProperty('interruptMode')) {
                return this.d.eventTypeInfo[event.type].interruptMode;
            }
            return 'stop';
        },
        __getLayerType: function (layerName) {
            return this.d.layers[layerName].type;
        },
        __getNewEventHandlerInstance: function (event) {
            return new window[this.d.eventTypeInfo[event.type].handler]();
        },
        __putIntoBackground: function (reference, jElement) {
            if (false === this.lm.hasLayer(reference)) {
                this.lm.createLayer(reference, -1);
            }
            this.lm.putIntoLayer(reference, jElement);
        },


    };
})();