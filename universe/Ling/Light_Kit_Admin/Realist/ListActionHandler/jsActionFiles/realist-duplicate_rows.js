function f(jBtn, rics, jContainer, jTable, params) {

    var useConfirmExecute = ('confirmexecute-text' in params);
    var func = function (options) {
        /**
         * Warning:
         *
         * This list action works in the context of the "Open Admin Table One" implementation only.
         * https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-helper-implementation-notes.md
         *
         * If you're using another protocol, you probably want to use another list action.
         *
         */
        params.rics = rics;
        options = options || {};

        AcpHepHelper.post(params.url, params, function () {


            // refreshing the list gui
            var helper = RealistRegistry.getOpenAdminTableHelper();
            helper.executeModule("pagination", {
                onSuccess: function () {
                    var laHelper = RealistRegistry.getListActionHelper();
                    laHelper.updateButtonStatuses();
                    if ('onSuccessAfter' in options) {
                        options["onSuccessAfter"]();
                    }
                },
            });


        }, function (err) {
            LightKitAdminEnvironment.toast("Error", err, "error");
        });
    };


    if (true === useConfirmExecute) {
        var ceOptions = {};
        for (var k in params) {
            if ('confirmexecute-' === k.substr(0, 15)) {
                var optionName = k.substr(15);
                ceOptions[optionName] = params[k];
            }
        }
        LightKitAdminEnvironment.confirmExecute(params['confirmexecute-text'], func, ceOptions);
    } else {
        if (true === LightKitAdminEnvironment.confirm("Are you sure you want to duplicate the selected rows?")) {
            func();
        }
    }

}