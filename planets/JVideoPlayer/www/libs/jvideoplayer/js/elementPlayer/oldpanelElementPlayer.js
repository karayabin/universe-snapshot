window.PanelElementPlayer = function () {
    // common to all ElementPlayer objects
    this.onError = null;
    this.onDurationReady = null;
    this.onEnd = null;

    // specific
    this.jElement = null;

    // self time common
    this.timeMark = null;
    this.elapsed = 0;
    this.duration = null;
    this._isPlaying = false;
    this.endTimeout = null;
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
        this._trigger('onDurationReady', this.duration);
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
    setTime: function (ms) {
        if (ms >= this.duration) {
            ms = this.duration;
            this.elapsed = ms;
            this._isPlaying = false;
            this._trigger('onEnd', this.jElement);
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
    setOnError: function (fn) {
        this.onError = fn;
        return this;
    },
    setOnDurationReady: function (fn) {
        this.onDurationReady = fn;
        return this;
    },
    setOnEnd: function (fn) {
        this.onEnd = fn;
        return this;
    },
    //------------------------------------------------------------------------------/
    // COMMON PRIVATE
    //------------------------------------------------------------------------------/
    _trigger: function (method, ...args) {
        if (null !== this[method]) {
            this[method](...args);
        }
    },
    _resume: function () {
        if (null !== this.duration) {
            this.jElement.show();
            this.timeMark = Date.now();
            var zis = this;
            this.endTimeout = setTimeout(function () {
                zis._isPlaying = false;
                zis.elapsed = zis.duration;
                zis._trigger('onEnd', zis.jElement);
            }, this.duration - this.elapsed);
        }
    },
};