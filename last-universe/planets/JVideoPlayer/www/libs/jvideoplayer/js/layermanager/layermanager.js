(function () {


    window.LayerManager = function (options) {
        this.d = $.extend({
            /**
             * jElement containing the layers
             */
            host: null,
        }, options);
        /**
         * name =>
         */
        this.layers = {};
        this.host = this.d.host;
    };
    window.LayerManager.prototype = {
        hasLayer: function (layerName) {
            return (this.layers.hasOwnProperty(layerName));
        },
        getLayer: function (layerName) {
            if (true === this.hasLayer(layerName)) {
                return this.layers[layerName];
            }
            return null;
        },
        /**
         * layerProps
         *      It represents the css properties,
         *      and can be either a string or an array.
         *
         *      If it's an array, one can also set the class using the class property.
         *
         *
         */
        createLayer: function (layerName, zIndex, layerProps) {
            if ('undefined' === typeof zIndex) {
                zIndex = -1;
            }
            if ('undefined' === typeof layerProps) {
                layerProps = {};
            }

            var sLayerName = this.__getSafeLayerName(layerName);
            var s = '<div data-id="' + sLayerName + '" style="z-index: ' + zIndex;


            if ('String' === typeof layerProps && '' !== layerProps) {
                s += '; ' + layerProps + '"';
                s += ' class="layer"';
            }
            else {
                for (var i in layerProps) {
                    if ('class' !== i) {
                        s += '; ' + i + ': ' + layerProps[i];
                    }
                }
                s += '" class="layer';
                if (layerProps.hasOwnProperty('class')) {
                    s += ' ' + layerProps.class;
                }
                s += '"';
            }

            s += '></div>';
            var jLayer = $(s);
            this.host.append(jLayer);
            this.layers[layerName] = jLayer;
            return jLayer;
        },
        putIntoLayer: function (layerName, content) {
            this.layers[layerName].append(content);
            return this;
        },
        transferContent: function (srcName, dstName) {
            var jSrcLayer = this.getLayer(srcName);
            if (null !== jSrcLayer) {
                var jDstLayer = this.getLayer(dstName);
                if (null !== jDstLayer) {
                    jDstLayer.empty();
                    jDstLayer.append(this.__getLayerContent(jSrcLayer));
                    return true;
                }
            }
            else {
                error("Could not find layer " + srcName);
            }
            return false;
        },
        //------------------------------------------------------------------------------/
        // PRIVATE
        //------------------------------------------------------------------------------/
        __getSafeLayerName: function (layerName) {
            // todo: remove special chars
            return layerName;
        },
        __getLayerContent: function (jLayer) {
            // layer content, also known as event
            return jLayer.find(" > *");
        },
    };

    function error(m) {
        m = "layerManager: " + m;
        console.log(m);
    }
})();