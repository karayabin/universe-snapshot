/**
 * List general action handler helper
 * ==============
 * 2019-09-25
 *
 */
if ('undefined' === typeof ListGeneralActionHandlerHelper) {
    (function () {
        var $ = jQuery;


        function startsWith(haystack, needle) {
            return haystack.substring(0, needle.length) === needle;
        }
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



        window.ListGeneralActionHandlerHelper = function (options) {
            this.options = $.extend({}, window.ListGeneralActionHandlerHelper._defaults, options);
            this.jContainer = this.options.jContainer;
        };
        window.ListGeneralActionHandlerHelper.prototype = {
            listen: function () {

                var $this = this;

                this.jContainer.on('click', '.lgah-button', function () {

                    var theActionId = $(this).attr('data-action-id');
                    var hepParams = getElementParameters($(this));

                    for (var i in $this.options.listGeneralActionItems) {
                        var item = $this.options.listGeneralActionItems[i];
                        if (item.action_id === theActionId) {
                            var callableGetter = new Function(item.js_code + '; return f;');
                            var callable = callableGetter();
                            callable($(this),  $this.jContainer, hepParams);
                            break;
                        }
                    }
                    return false;
                });
            },
            error: function (msg) {
                throw new Error("ListGeneralActionHandlerHelper error: " + msg);
            },
        };


        //----------------------------------------
        //
        //----------------------------------------
        window.ListGeneralActionHandlerHelper._defaults = {
            /**
             * The jquery element used as the scope for all this tool's interactions.
             */
            jContainer: null,
            /**
             * An array of list general action items.
             * The structure of each item is defined in the [list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/list-action-handler-conception-notes.md).
             */
            listGeneralActionItems: [],
        };
    })();
}