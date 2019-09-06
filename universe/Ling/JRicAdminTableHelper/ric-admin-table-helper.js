/**
 * Ric admin table helper
 * ==============
 * 2019-09-03
 *
 */
if ('undefined' === typeof RicAdminTableHelper) {
    (function () {
        var $ = jQuery;


        function startsWith(haystack, needle) {
            return haystack.substring(0, needle.length) === needle;
        }

        function getDataAttributes(jElement) {
            var attr = {};
            var ric = {};
            var ricEmpty = true;
            $.each(jElement.get(0).attributes, function (v, name) {
                name = name.nodeName || name.name;
                v = jElement.attr(name);


                if (true === startsWith(name, "data-ric-")) {
                    name = name.substr(9);
                    ric[name] = v;
                    ricEmpty = false;


                } else if (startsWith(name, "data-param-")) {
                    name = name.substr(11);
                    attr[name] = v;
                }
            });
            if (false === ricEmpty) {
                attr.ric = ric;
            }
            return attr
        }


        window.RicAdminTableHelper = function (options) {
            this.options = $.extend({}, window.RicAdminTableHelper._defaults, options);
            this.jContainer = this.options.jContainer;
        };
        window.RicAdminTableHelper.prototype = {
            getSelectedRic: function () {
                var rics = [];
                this.jContainer.find('input.rath-emitter[type="checkbox"]').each(function () {

                    if ($(this).is(':checked')) {
                        var attributes = getDataAttributes($(this));
                        if ("ric" in attributes) {
                            rics.push(attributes.ric);
                        }
                    }
                });
                return rics;
            },
            getRic: function (jEmitter) {
                var ric = {};
                var attributes = getDataAttributes(jEmitter);
                if ('ric' in attributes) {
                    ric = attributes.ric;
                }
                return ric;
            },
            /**
             * Listen for clicks events on emitters.
             * When a click is detected, it sends the corresponding request to the server.
             *
             */
            listen: function () {
                var $this = this;

                this.jContainer.on('click', '.rath-emitter', function () {

                    if ($(this).is(':checkbox')) {
                        return;
                    }

                    return false;


                    var attributes = getDataAttributes($(this));

                    if ("action_id" in attributes) {
                        var actionId = attributes['action_id'];


                        $.ajax({
                            type: "POST",
                            url: $this.options.serverUri,
                            data: attributes,
                            success: function (response) {
                                var type = response.type;
                                if ('error' === type) {
                                    $this.options.onServerError(response.error);
                                } else if ('success' === type) {
                                    $this.options.onServerSuccess(actionId, response);
                                } else {
                                    $this.error("Unknown response type from the server.");
                                }
                            },
                            dataType: "json",
                        });
                    }


                    return false;
                });
            },
            error: function (msg) {
                throw new Error("RicAdminTableHelper error: " + msg);
            }
        };


        //----------------------------------------
        //
        //----------------------------------------
        window.RicAdminTableHelper._defaults = {
            /**
             * The jquery element containing all your ric actions.
             * This setting is mandatory.
             */
            jContainer: null,

            /**
             * If you use the listen method, set this to the url of your backend server.
             */
            serverUri: null,
            /**
             * Triggered when the server responded with a json array including containing the type => error property.
             * Expecting this structure from the server:
             * - type: error (fixed string)
             * - error: string, the error message
             *
             * @param msg
             */
            onServerError: function (msg) {
                console.log("RicAdminTableHelper: error message from the server: " + msg);
            },
            /**
             * Triggered when the server responded with a json array including the type => success property.
             *
             * @param actionId
             * @param response
             */
            onServerSuccess: function (actionId, response) {
                console.log("your action here");
            },
        };
    })();
}