window.layeredManager = function (options) {
    this.d = $.extend({
        /**
         * jquery handle to the dom element representing the widget.
         * This element will have class layered-manager
         */
        element: null,
    }, options);

    this.layers = {};
    this._init();
};

layeredManager.prototype = {
    /**
     * appearance: string|array,
     *                  string? the inner html
     *                  array?
     *                          - html: string, the inner html code
     *                          - cssclass: string, a css class string to append
     */
    createLayer: function (name, zIndex, appearance = "") {

        var cssClass = 'layer-' + name;
        var html = '';
        if ('string' === typeof appearance) {
            html = appearance;
        }
        else {
            if ('cssClass' in appearance) {
                cssClass = appearance['cssClass'];
            }
            if ('html' in appearance) {
                html = appearance['html'];
            }
        }

        var jLayer = $('<div data-name="' + name + '" style="z-index: ' + zIndex + '" class="layer ' + cssClass + '">' + html + '</div>');
        this.container.append(jLayer);
        this.layers[name] = jLayer;
        return this;
    },
    hasLayer: function (name) {
        return (name in this.layers);
    },
    getJLayer: function (name) {
        return this._getLayer(name);
    },
    showLayer: function (name) {
        this._getLayer(name).show();
        return this;
    },
    hideLayer: function (name) {
        this._getLayer(name).hide();
        return this;
    },
    clearLayer: function (name) {
        this._getLayer(name).empty();
        return this;
    },
    destroyLayer: function (name) {
        if (this._hasLayer(name)) {
            this._getLayer(name).remove();
            delete this.layers[name];
        }
        return this;
    },
    transfer: function (sourceLayer, destLayer, preserveSourceLayer = true) {
        this._getLayer(destLayer).empty().append(this._getLayer(sourceLayer).find(' > *'));
        if (false === preserveSourceLayer) {
            this.destroyLayer(sourceLayer);
        }
        return this;
    },
    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    _init: function () {
        this.el = this.d.element;

        // building the widget
        this.el.addClass("layered-manager");
        this.container = $('<div class="container"></div>');
        this.el.append(this.container);
    },
    _getLayer: function (name) {
        return this.layers[name];
    },
    _hasLayer: function (name) {
        return (name in this.layers);
    },
};