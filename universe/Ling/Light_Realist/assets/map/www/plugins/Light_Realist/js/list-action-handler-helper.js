/**
 * List action handler helper
 * ==============
 * 2019-09-06
 *
 */
if ('undefined' === typeof ListActionHandlerHelper) {
    (function () {
        var $ = jQuery;


        window.ListActionHandlerHelper = function (options) {
            this.options = $.extend({}, window.ListActionHandlerHelper._defaults, options);
            this.jContainer = this.options.jContainer;
            this.jTable = this.options.jTable;
        };
        window.ListActionHandlerHelper.prototype = {
            listen: function () {

                var $this = this;


                this.jContainer.on('click', '.lah-button', function () {

                    var theActionId = $(this).attr('data-action-id');

                    for (var i in $this.options.listActionLeaves) {
                        var item = $this.options.listActionLeaves[i];
                        if (item.action_id === theActionId) {
                            var callableGetter = new Function(item.js_code + '; return f;');
                            var callable = callableGetter();
                            var rics = $this.options.ricHelper.getSelectedRic();

                            callable($(this), rics, $this.jContainer, $this.jTable);

                            break;
                        }

                    }
                    return false;
                });

                this.options.ricHelper.registerOnCheckboxSelected(function (ricHelper, selectedRics) {
                    $this.updateButtonStatuses();
                });


                /**
                 * Initialize the buttons status (enabled/disabled)
                 */
                this.updateButtonStatuses();

            },
            updateButtonStatuses: function () {

                for (var i in this.options.listActionLeaves) {
                    var item = this.options.listActionLeaves[i];
                    var actionId = item["action_id"];
                    var jButton = this.jContainer.find('.lah-button[data-action-id="' + actionId + '"]');
                    if (jButton.length) {


                        var behaviour = item["enabled_behaviour"];
                        if ('undefined' === typeof behaviour) {
                            behaviour = 'oneOrMore';
                        }

                        var isDisabled = false;

                        if ("string" === typeof behaviour) {
                            switch (behaviour) {
                                case 'oneOrMore':
                                    var rics = this.options.ricHelper.getSelectedRic();
                                    if (0 === rics.length) {
                                        isDisabled = true;
                                    }
                                    break;
                                case 'always':
                                    break;
                            }
                        } else {
                            // assuming it's a callable
                            isDisabled = behaviour(this.options.ricHelper, this.options.ricHelper.getSelectedRic());
                        }

                        jButton.prop('disabled', isDisabled);

                    } else {
                        this.error("Button not found with action id=" + actionId);
                    }
                }
            },
            error: function (msg) {
                throw new Error("ListActionHandlerHelper error: " + msg);
            },
        };


        //----------------------------------------
        //
        //----------------------------------------
        window.ListActionHandlerHelper._defaults = {
            /**
             * The jquery element used as the scope for all this tool's interactions.
             */
            jContainer: null,
            /**
             * An array of list action leaves (aka items without children).
             * The structure of each item is defined in the [list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md).
             */
            listActionLeaves: [],
            /**
             * This should be set to a ric helper instance.
             * from the ric-admin-table-helper.js script.
             */
            ricHelper: null,
        };
    })();
}