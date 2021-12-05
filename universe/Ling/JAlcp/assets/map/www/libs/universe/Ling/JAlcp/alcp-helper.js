/**
 * AlcpHelper
 * ===========
 * 2021-06-22
 *
 */
if ('undefined' === typeof AlcpHelper) {
    (function () {
        var $ = jQuery;


        function startsWith(haystack, needle) {
            return haystack.substring(0, needle.length) === needle;
        }


        window.AlcpHelper = {


            /**
             * Returns a customized version of the alcp.post function.
             *
             *
             * This customization relies heavily on conventions, which are described below.
             *
             * All conventions apply only inside the given context.
             *
             * - an html element with the css class "the-loader" will be considered as the loader object
             * - an html element with the css class "the-success" will be considered as the "success message container" object
             * - an html element with the css class "the-success-message", if found inside the "success message container", will be considered as the "success message" object
             * - an html element with the css class "the-error" will be considered as the "error message container" object
             * - an html element with the css class "the-error-message", if found inside the "error message container", will be considered as the "error message" object
             *
             *
             * From there, we try to automate things for you, based on our own experience of working with js callbacks.
             * Basically, if the loader object is defined, it's automatically shown BEFORE the request is sent, and HIDDEN after
             * the request is completed.
             *
             *
             * Similarly, if the alcp response is an error, we create a clone of the "error message container", and fill the "error message"/"error message container" (of that clone) with that error message.
             * That's unless you override the error handler manually.
             *
             * Note: we prefer to use the clone technique rather than just hiding elements, because then it works better with bootstrap alerts.
             * That's because bootstrap alerts are dismissible, which means the user can remove them from the dom.
             * When he does, we need to recreate the alert's dom in order to put our error message in it.
             * So, with the hiding workflow, if the user dismisses the alert, it's gone forever and we don't see subsequent errors that might occur.
             *
             *
             *
             *
             *
             * Finally, if you don't override it, the default httpError handler will behave the same as an erroneous alcp response (using whichever "error message"/"error message container" is available to display the error).
             *
             * Note: when you call this method, we hide everything for you:
             * - loader
             * - success message container
             * - error message container
             *
             *
             *
             *
             * The following options are available:
             * - loader: jquery object representing the loader
             * - success: a callable to execute in case of a successful alcp response.
             *      The arguments list is ( jTheSuccessMsg, response, textStatus, jqXHR);
             *      It takes the following arguments:
             *      - jTheSuccessMsg: a jquery object being either:
             *          - empty if neither the "success message container" object nor the "success message" object are defined.
             *          - the "success message" object if defined.
             *          - the "success message container" object if defined.
             *      - response: the response object returned by the server
             *      - textStatus: a string describing the status of the http response
             *      - jqXHR: the jqXHR object from jquery, see the jquery ajax page for more details: https://api.jquery.com/jquery.ajax/.
             *
             *
             * - error: a callable to execute in case of an erroneous alcp response.
             *      The arguments list is ( defaultCb, jTheErrorMsg, error, response, textStatus, jqXHR);
             *      It takes the following arguments:
             *      - defaultCb: access to our default callback, just in case you need it
             *      - jTheErrorMsg: a jquery object being either:
             *          - empty if neither the "error message container" object nor the "error message" object are defined.
             *          - the "error message" object if defined.
             *          - the "error message container" object if defined.
             *      - error: the error message of the alcp response
             *      - response: the response object returned by the server
             *      - textStatus: a string describing the status of the http response
             *      - jqXHR: the jqXHR object from jquery, see the jquery ajax page for more details: https://api.jquery.com/jquery.ajax/.
             *
             * - httpError: same as the post method of this AlcpHelper object.
             * - after: same as the post method of this AlcpHelper object.
             * - before: same as the post method of this AlcpHelper object.
             *
             *
             *
             *
             * @param jContext
             * @param options
             * @returns {function(*=, *=): void}
             */
            getContextualPostCallback: function (jContext, options) {
                //----------------------------------------
                // PRE-FUNCTIONS
                //----------------------------------------
                var resetMessages = function () {

                    if (jTheSuccessTpl.length > 0) {

                        jContext.find('.the-success-instance').remove();


                        jTheSuccess = jTheSuccessTpl.clone();
                        jTheSuccess.addClass("the-success-instance");
                        jTheSuccessTpl.after(jTheSuccess);
                        jTheSuccess.hide();

                        jTheSuccessMessage = jTheSuccess.find(".the-success-message");
                    }

                    if (jTheErrorTpl.length > 0) {

                        jContext.find('.the-error-instance').remove();


                        jTheError = jTheErrorTpl.clone();
                        jTheError.addClass("the-error-instance");
                        jTheErrorTpl.after(jTheError);
                        jTheError.hide();

                        jTheErrorMessage = jTheError.find(".the-error-message");
                    }
                };

                var triggerError = function (errMsg) {
                    resetMessages();
                    if (jTheError.length > 0) {
                        jTheError.show();
                        if (jTheErrorMessage.length > 0) {
                            jTheErrorMessage.html(errMsg);
                        } else {
                            jTheError.html(errMsg);
                        }
                    }
                };

                //----------------------------------------
                // START
                //----------------------------------------
                var defaultErrorCallback = function (defaultErrorCallback, jTheErrorMsg, error, response, textStatus, jqXHR) {
                    jTheErrorMsg.html(error);
                };

                options = options || {};
                var userSuccess = options.success || function (jTheSuccessMsg, response, textStatus, jqXHR) {};
                var userError = options.error || defaultErrorCallback;

                var httpError = options.httpError || function (jqXHR, textStatus, errorThrown) {
                    var errMsg = "A problem occurred with the http request.";
                    if (errorThrown) {
                        errMsg = errorThrown;
                    }
                    triggerError(errMsg);
                };
                var after = options.after || function (jqXHR, textStatus) {};
                var before = options.before || function () {};


                var jTheSuccessTpl = jContext.find(".the-success");
                var jTheErrorTpl = jContext.find(".the-error");

                jTheSuccessTpl.hide();
                jTheErrorTpl.hide();


                var jTheSuccess = null;
                var jTheSuccessMessage = null;
                var jTheError = null;
                var jTheErrorMessage = null;


                var jTheLoader = jContext.find('.the-loader');


                /**
                 * hiding everything
                 */
                if (jTheLoader.length > 0) {
                    jTheLoader.hide();
                }
                resetMessages();


                var zis = this;

                return function (url, data) {
                    return zis.post(url, data, {
                        loader: jTheLoader,
                        success: function (response, textStatus, jqXHR) {
                            resetMessages();
                            var jUserSuccessMessage = jTheSuccess;
                            if (jTheSuccess && jTheSuccess.length > 0) {
                                jTheSuccess.show();
                                if (jTheSuccessMessage.length > 0) {
                                    jUserSuccessMessage = jTheSuccessMessage;
                                }
                            }
                            return userSuccess(jUserSuccessMessage, response, textStatus, jqXHR);

                        },
                        error: function (error, response, textStatus, jqXHR) {
                            resetMessages();
                            var jUserErrorMessage = jTheError;
                            if (jTheError && jTheError.length > 0) {
                                jTheError.show();
                                if (jTheErrorMessage.length > 0) {
                                    jUserErrorMessage = jTheErrorMessage;
                                }
                            }
                            var _defaultCb = function () {
                                /**
                                 * note the void function here, we don't even try to pass the default callback again to avoid potential recursion.
                                 */
                                return defaultErrorCallback(function () {}, jUserErrorMessage, error, response, textStatus, jqXHR);
                            };
                            return userError(_defaultCb, jUserErrorMessage, error, response, textStatus, jqXHR);
                        },
                        httpError: httpError,
                        after: after,
                        before: before,
                    });
                };
            },

            /**
             * Sends an alcp request to the given url, and reacts to it based on the configured options.
             *
             * More info about alcp at:
             *
             * https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/alcp-response.md
             *
             *
             *
             * Available options are:
             * - loader: a jquery to show/hide before/after the request is done.
             * - success: a callback to trigger when the alcp response is successful.
             *      This callback receives the following arguments:
             *      - response: the response object returned by the server
             *      - textStatus: a string describing the status of the http response
             *      - jqXHR: the jqXHR object from jquery, see the jquery ajax page for more details: https://api.jquery.com/jquery.ajax/.
             * - error: a callback to trigger when the alcp response is an error.
             *      This callback receives the following arguments:
             *      - error: the error message of the alcp response
             *      - response: the response object returned by the server
             *      - textStatus: a string describing the status of the http response
             *      - jqXHR: the jqXHR object from jquery, see the jquery ajax page for more details: https://api.jquery.com/jquery.ajax/.
             * - httpError: a callback to call if the http request fails.
             *      The arguments passed to this handler are the same as the one from the jquery :
             *      - jqXHR, the jqXHR object from jquery
             *      - textStatus: string, a string describing the type of error that occurred
             *      - errorThrown: string, the error message from an optional exception object, if one occurred.
             *      See more details in https://api.jquery.com/jquery.ajax/, at the error property.
             *
             * - after: a callback to execute after the request is posted, no matter what.
             *      This callback receives the following arguments:
             *      - jqXHR, the jqXHR object from jquery
             *      - textStatus, a string categorizing the status of the request ("success", "notmodified", "nocontent", "error", "timeout", "abort", or "parsererror").
             *      See the jquery docs for more details (ajax.complete).
             *
             * - before: a callback to execute before the request is posted, no matter what.
             *      This one receives no arguments.
             *
             *
             */
            post: function (url, data, options) {


                options = options || {};
                var jLoader = options.loader || null;
                var httpError = options.httpError || function (jqXHR, textStatus, errorThrown) {};
                var after = options.after || function (jqXHR, textStatus) {};
                var before = options.before || function () {};
                var success = options.success || function (response, textStatus, jqXHR) {};
                var error = options.error || function (error, response, textStatus, jqXHR) {};

                if (null !== jLoader) {
                    jLoader.show();
                }


                before();


                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function (response, textStatus, jqXHR) {
                        var type = response.type;
                        if ('error' === type) {
                            error(response.error, response, textStatus, jqXHR);
                        } else if ('success' === type) {
                            success(response, textStatus, jqXHR);
                        } else {
                            AlcpHelper.error("Unknown response type from the server.");
                        }
                    },
                    dataType: "json",
                    complete: function (jqXHR, textStatus) {
                        if (null !== jLoader) {
                            jLoader.hide();
                        }
                        after(jqXHR, textStatus);
                    },
                    error: httpError,
                });


            },
            error: function (msg) {
                throw new Error("AlcpHelper error: " + msg);
            },
        };

    })();
}