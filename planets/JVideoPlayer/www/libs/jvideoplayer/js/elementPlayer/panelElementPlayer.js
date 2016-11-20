window.PanelElementPlayer = function () {

    // specific
    this.jElement = null;

    // self time common
    this.timeMark = null;
    this.elapsed = 0;
    this.duration = null;
    this._isPlaying = false;
    this.endTimeout = null;

    this.listeners = {};
    this.listenerIndex = 0;
    
};

window.PanelElementPlayer.prototype = {
    /**
     * elementInfo:
     *      - text
     *      - duration (ms)
     *      - ?bgColor (web color like #000000)
     */
    prepare: function (elementInfo, jParent) {
        this.duration = elementInfo.duration;
        var text = elementInfo.text ? elementInfo.text : "";
        var bgColor = elementInfo.bgColor ? elementInfo.bgColor : "#000000";
        this.jElement = $('<div class="panel" style="display: none; background-color:' + bgColor + '">' + text + '</div>');
        jParent.append(this.jElement);
        this._trigger('eventdurationready', this.duration);
        return this.jElement;
    },
    resume: function () {
        if (false === this._isPlaying) {
            this._isPlaying = true;
            this._resume();
        }
    },
    isPlaying: function () {
        return this._isPlaying;
    },
    pause: function () {
        if (true === this._isPlaying) {
            this._isPlaying = false;
            clearTimeout(this.endTimeout);
            this.elapsed += Date.now() - this.timeMark;
        }
    },
    stop: function () {
        this.pause();
        this.setTime(0);
        this._isPlaying = false;
        this._trigger('eventend', this.jElement);
    },
    setTime: function (ms) {
        if (ms >= this.duration) {
            ms = this.duration;
            this.elapsed = ms;
            this._isPlaying = false;
            this._trigger('eventend', this.jElement);
        }
        else {
            this.elapsed = ms;
            if (true === this._isPlaying) {
                clearTimeout(this.endTimeout);
                this._resume();
            }
        }
        return this;
    },
    getTime: function () {
        var val = this.elapsed;
        if (true === this._isPlaying) {
            val += Date.now() - this.timeMark;
        }
        if (val > this.duration) {
            val = this.duration;
        }
        return val;
    },
    //------------------------------------------------------------------------------/
    // COMMON METHODS
    //------------------------------------------------------------------------------/
    on: function (eventName, fn) {
        if (false === (eventName in this.listeners)) {
            this.listeners[eventName] = {};
        }
        this.listeners[eventName][this.listenerIndex++] = fn;
        return this;
    },
    //------------------------------------------------------------------------------/
    // COMMON PRIVATE
    //------------------------------------------------------------------------------/
    _resume: function () {
        if (null !== this.duration) {
            this.jElement.show();
            this.timeMark = Date.now();
            var zis = this;
            this.endTimeout = setTimeout(function () {
                zis._isPlaying = false;
                zis.elapsed = zis.duration;
                zis._trigger('eventend', zis.jElement);
            }, this.duration - this.elapsed);
        }
    },
    _trigger: function (eventName, ...args) {
        if (eventName in this.listeners) {
            for (var i in this.listeners[eventName]) {
                this.listeners[eventName][i].call(this, ...args);
            }
        }
    },
};