document.addEventListener("DOMContentLoaded", function (event) {
    $(document).ready(function () {

        //----------------------------------------
        // ENABLING ACP HELPER FOR ALL PAGES
        // note: if you want to add it on certain pages only, update LightKitAdminController,
        // but I believe (for now) that it would be useful on all pages.
        //----------------------------------------
        $('body').on('click.Light_Kit_Admin', ".acplink", function (e) {

            var jTarget = $(e.target); // assuming jTarget has class .acplink
            var data = AcpHepHelper.getHepParameters(jTarget);

            /**
             * Extra functionality for lka acplinks only.
             */
            var onSuccessAfter = jTarget.attr("data-success-after");
            var confirmText = jTarget.attr("data-confirm");
            //----------------------------------------
            // confirm?
            //----------------------------------------
            var wrapper = function (f) {
                f();
            };
            if ('undefined' !== typeof confirmText) {
                wrapper = function (f) {
                    if (true === LightKitAdminEnvironment.confirm(confirmText)) {
                        f();
                    }
                }
            }


            wrapper(function () {
                AcpHepHelper.post(data.url, data, function () {
                    //----------------------------------------
                    // refresh?
                    //----------------------------------------
                    if ('realist-refresh' === onSuccessAfter) {
                        // assuming we're inside realist context

                        // refreshing the list gui
                        var helper = RealistRegistry.getOpenAdminTableHelper();
                        helper.executeModule("pagination");
                    }


                }, function (errMsg) {
                    LightKitAdminEnvironment.toast("Error", errMsg, "error");
                });
            });


            return false;

        });


        //----------------------------------------
        // OVERRIDING 3RD PARTY PLUGINS ERROR HANDLERS
        // (in lka we use toast for all ajax errors)
        //----------------------------------------
        /**
         * Important design note
         * =================
         * In order for this overriding system to work properly,
         * it implies that all plugins agree on the same design, which is the following:
         *
         * - plugins define an overridable default error handler in the js wild at the window level
         *          (i.e. not inside an event handler), so that those error handler declarations
         *          are done before the DOMContentLoaded event handler is fired.
         *
         * - then the main application initializer (in this case this lka init script)
         *      creates a DOMContentLoaded event handler inside of which it can
         *      override the plugin error handlers it wants.
         *
         * In other words, this is a two steps process where plugins expose their inner
         * error handlers, and then the master app script overrides them if necessary.
         *
         * This design "trick" is only possible because we know that the master app script
         * is called AFTER the declaration of the plugin error handlers.
         *
         * Also, for error handlers in general we use the ajax communication protocol (https://github.com/lingtalfi/AjaxCommunicationProtocol).
         *
         */

        window.Chloroform_HeliumLightRenderer_TableList_ErrorHandler = function (errData) {
            if ('error' === errData.type) {
                var title = "Error from Chloroform_HeliumLightRenderer:";
                var body = errData.error;
                window.LightKitAdminEnvironment.toast(title, body, "error");
            }
        };


        window.HasDualPaneWidget_ErrorHandler = function (errData) {
            if ('error' === errData.type) {
                var title = "Error from HasDualPaneWidget";
                var body = errData.error;
                window.LightKitAdminEnvironment.toast(title, body, "error");
            }
        };


        window.HasDualPaneWidget_ConfirmHandler = function (msg) {
            return LightKitAdminEnvironment.confirm(msg);
        };


    });
});