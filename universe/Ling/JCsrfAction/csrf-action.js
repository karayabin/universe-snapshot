/**
 * CsrfAction
 * ===========
 * 2019-09-18
 *
 */
if ('undefined' === typeof CsrfAction) {
    (function () {
        var $ = jQuery;


        /**
         *
         * Returns the hep associative array.
         * https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md
         *
         */
        function getElementParameters(jElement) {
            var attr = {};
            $.each(jElement.get(0).attributes, function (v, name) {
                name = name.nodeName || name.name;
                v = jElement.attr(name);
                if (startsWith(name, "data-param-")) {
                    name = name.substr(11);
                    attr[name] = v;
                }
            });
            return attr;
        }


        window.CsrfAction = function (options) {


            this.options = $.extend({}, window.CsrfAction._defaults, options);
            this.jElement = this.options.jElement;
            this.url = this.options.url;


        };
        window.CsrfAction.prototype = {

            /**
             * @return null|string
             */
            getToken: function () {
                var ret = this.jElement.attr('data-param-token');
                if ('undefined' === typeof ret) {
                    return null;
                }
                return ret;
            },
            /**
             * Posts the data to the backend service url.
             * Communication is done via the ajax communication protocol (https://github.com/lingtalfi/AjaxCommunicationProtocol).
             *
             * Both handlers (successHandler and errorHandler) are optional.
             * If you don't use one, either use null or do not pass it (i.e. undefined).
             *
             */
            post: function (successHandler, errorHandler) {

                var $this = this;
                var data = getElementParameters(this.jElement);


                $.ajax({
                    type: "POST",
                    url: this.url,
                    data: data,
                    success: function (response) {
                        var type = response.type;
                        if ('error' === type) {
                            errorHandler(response.error, $this.jElement, data);
                        } else if ('success' === type) {
                            successHandler(response, $this.jElement, data);
                        } else {
                            this.error("Unknown response type from the server.");
                        }
                    },
                    dataType: "json",
                });


            },
            error: function (msg) {
                throw new Error("CsrfAction error: " + msg);
            },
        };


        //----------------------------------------
        //
        //----------------------------------------
        window.CsrfAction._defaults = {
            /**
             * The jquery element holding the csrf data
             */
            jElement: null,
            /**
             * The url to the backend service
             */
            url: "/my-crsf-action-handler",
        };
    })();
}