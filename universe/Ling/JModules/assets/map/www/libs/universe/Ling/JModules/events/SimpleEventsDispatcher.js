export default class SimpleEventsDispatcher {


    constructor() {
        /**
         * map of eventName => array of callbacks to execute
         */
        this.listeners = {};
    }


    on(eventName, callback) {


        if (!(eventName in this.listeners)) {
            this.listeners[eventName] = [];
        }
        this.listeners[eventName].push(callback);
    }

    trigger(eventName, data) {
        if (eventName in this.listeners) {
            for(let cb of this.listeners[eventName]){
                cb(data);
            }
        }
    }
}



