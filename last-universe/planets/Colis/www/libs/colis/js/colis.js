/**
 * Colis
 * ===============================
 * 2016-01-08 - LingTalfi
 *
 * Dependencies:
 * - jquery
 * - tim functions (https://github.com/lingtalfi/Tim)
 *
 *
 * Goal is to help the user to update the value of an input.
 * The helpers elements are an uploader with a dropzone (plupload was used during development),
 * and a typeahead component (I used https://github.com/twitter/typeahead.js during development)
 *
 *
 */

if ('undefined' === typeof window.colis) {
    (function () {

        //------------------------------------------------------------------------------/
        // 
        //------------------------------------------------------------------------------/
        window.colisClasses = {
            uploader: function () {
            },
            preview: function () {
            },
            selector: function () {
            }
        };
        window.colisClasses.uploader.prototype.build = function (oColis, conf) {

        };
        window.colisClasses.preview.prototype.build = function (oColis, conf) {

        };
        window.colisClasses.preview.prototype.display = function (info) {
            // displays the info in the preview
        };
        window.colisClasses.selector.prototype.build = function (oColis, conf) {
            // override, and implement your selector here
        };
        window.colisClasses.selector.prototype.appendItem = function (name) {
            // append an item to the current list
        };
        window.colisClasses.selector.prototype.setValue = function (name) {
            // set the value of the control to the given name
        };
        //------------------------------------------------------------------------------/
        // 
        //------------------------------------------------------------------------------/
        var noop = function () {
        };


        //------------------------------------------------------------------------------/
        // 
        //------------------------------------------------------------------------------/
        window.colis = function (options) {
            var zis = this;
            var oSelector, oUploader, oPreview;

            oSelector = new window.colisClasses.selector();
            oUploader = new window.colisClasses.uploader();
            oPreview = new window.colisClasses.preview();


            var conf = $.extend(
                {
                    selector: {}, // selector reserved conf
                    preview: {}, // preview reserved conf
                    uploader: {}, // uploader reserved conf

                    /**
                     * This is the jquery handle to the selector element.
                     * It is required but set automatically if you instantiate colis
                     * as a jquery plugin
                     */
                    jInput: null,
                    /**
                     * The items to display in the selector.
                     * Items can be:
                     * - an array of item names
                     */
                    //------------------------------------------------------------------------------/
                    // 
                    //------------------------------------------------------------------------------/
                    items: [],
                    /**
                     * url of the info service
                     */
                    urlInfo: '/libs/colis/service/ling/colis_info_fast.php',
                    /**
                     * This should be sent to each service request.
                     * You can use this to build application logic.
                     */
                    requestPayload: {},
                    /**
                     * Should be called everytime a service call responds with an (tim) error
                     */
                    onRequestError: function (m) {
                        console.log(m);
                    },
                    /**
                     * void  function ( info )
                     *      What's inside info depends on your implementation.
                     *      info array is returned from the colis_info service.
                     */
                    onPreviewDisplayAfter: noop
                }, options);

            this.get = function (k) {
                if (k in conf) {
                    return conf[k];
                }
                throw new Error("Invalid key: " + k);
            };

            this.getConf = function () {
                return conf;
            };


            this.getSelector = function () {
                return oSelector;
            };
            this.getPreview = function () {
                return oPreview;
            };
            this.getUploader = function () {
                return oUploader;
            };
            this.getPayload = function (data) {
                return $.extend({}, conf.requestPayload, data);
            };

            this.requestInfo = function (params, success) {
                var url = this.get("urlInfo");
                return timPost(url, params, success, function (msg) {
                    conf.onRequestError(msg);
                });
            };


            var jInput = conf.jInput;
            if (!jInput instanceof jQuery) {
                this.devError("Invalid jInput");
            }


        };


        window.colis.prototype = {
            buildTemplate: function (jInput) {
                // override and build html here 
            },
            build: function () {
                var conf = this.getConf();
                // first build yourself, THEN build the helpers...
                this.buildTemplate(conf.jInput);
                this.getSelector().build(this, conf.selector);
                this.getPreview().build(this, conf.preview);
                this.getUploader().build(this, conf.uploader);
            },
            start: function () {
                this.build();
            },
            devError: function (msg) {
                console.log('colis error: ' + msg);
            },
            userError: function (msg) {
                console.log('colis error: ' + msg);
            },
            /**
             * Should be triggered by the selector, when a new item is selected
             */
            onItemSelected: function (name) {
                var zis = this;
                this.requestInfo(this.getPayload({name: name}), function (info) {
                    zis.getPreview().display(info);
                    zis.get('onPreviewDisplayAfter')(info, zis);
                });
            },
            /**
             * Should be triggered by the uploader when a new item has successfully been uploaded
             * the name argument is the name of the item returned by the server
             */
            onItemUploaded: function (nameAndInfo) {
                this.getSelector().appendItem(nameAndInfo.name);
                this.getSelector().setValue(nameAndInfo.name);
                this.getPreview().display(nameAndInfo.info);
                this.get('onPreviewDisplayAfter')(nameAndInfo.info, this);
            }
        };


        (function ($) {

            $.fn.colis = function (opts) {
                return this.each(function () {
                    var jInput = $(this);
                    var options = $.extend({}, opts);
                    options.jInput = jInput;
                    var oColis = new window.colis(options);
                    $(this).data('colis', oColis);
                    oColis.start();
                });
            };

        }(jQuery));


    })();
}