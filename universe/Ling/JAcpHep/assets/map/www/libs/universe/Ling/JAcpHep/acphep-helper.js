/**
 * AcpHepHelper
 * ===========
 * 2019-09-18
 *
 */
if ('undefined' === typeof AcpHepHelper) {
    (function () {
        var $ = jQuery;


        function startsWith(haystack, needle) {
            return haystack.substring(0, needle.length) === needle;
        }


        window.AcpHepHelper = {
            /**
             * Returns the hep associative array.
             * https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md
             */
            getHepParameters: function (jElement) {
                var attr = {};
                $.each(jElement.get(0).attributes, function (v, name) {
                    name = name.nodeName || name.name;
                    v = jElement.attr(name);
                    if (startsWith(name, "data-param-")) {
                        name = name.substr(11);
                        attr[name] = v;
                    } else if (startsWith(name, "data-paramjson-")) {
                        name = name.substr(15);
                        try {
                            attr[name] = JSON.parse(v);
                        } catch (e) {
                            console.log(e);
                            console.log("acphep-helper: invalid json syntax: ", v);
                        }
                    }
                });
                return attr;
            },
            /**
             * Posts the given data to the given backend service url,
             * and delegates the handling of the response to either the given successHandler or the given errorHandler.
             *
             * Communication is done via the ajax communication protocol (https://github.com/lingtalfi/AjaxCommunicationProtocol).
             *
             * Both handlers (successHandler and errorHandler) are optional.
             * If you don't use one, either use null or do not pass it (i.e. undefined).
             *
             * Available options are:
             * - after: a callback to call after the request is posted, no matter which response type was returned.
             * - httpErrorHandler: a callback to call if the http request fails. The argument passed to this handler are:
             *      - errorMsg: string, the error message, which is the combination of the status and the error text (i.e. 404 Not found)
             *      - the jqXHR object given by jquery (see the ajax documentation: https://api.jquery.com/jquery.ajax/ for more details)
             *
             *
             */
            post: function (url, data, successHandler, errorHandler, options) {


                var after, httpErrorHandler;

                if (options) {
                    after = options.after || function () {};
                    httpErrorHandler = options.after || function () {};
                } else {
                    after = function () {};
                    httpErrorHandler = function () {};
                }


                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function (response) {
                        var type = response.type;
                        if ('error' === type) {
                            if ('undefined' !== typeof errorHandler) {
                                errorHandler(response.error, response);
                            } else {
                                AcpHepHelper.error(response.error);
                            }
                        } else if ('success' === type) {
                            if ('undefined' !== typeof successHandler) {
                                successHandler(response);
                            }
                        } else {
                            AcpHepHelper.error("Unknown response type from the server.");
                        }
                    },
                    dataType: "json",
                    complete: after,
                    error: function (jqXHR, textStatus, errorThrown) {
                        httpErrorHandler(jqXHR.status + " " + errorThrown, jqXHR);
                    }
                });


            },
            error: function (msg) {
                throw new Error("AcpHepHelper error: " + msg);
            },
        };

    })();
}