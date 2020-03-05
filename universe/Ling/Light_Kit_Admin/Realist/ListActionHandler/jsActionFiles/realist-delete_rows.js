function f(jBtn, rics, jContainer, jTable, params) {


    if (true === LightKitAdminEnvironment.confirm("Are you sure you want to delete the selected rows?")) {
        /**
         * Warning:
         *
         * This list action works in the context of the "Open Admin Table One" implementation only.
         * https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md
         *
         * If you're using another protocol, you probably want to use another list action.
         *
         */
        params.rics = rics;

        AcpHepHelper.post(params.url, params, function () {


            // refreshing the list gui
            var helper = RealistRegistry.getOpenAdminTableHelper();
            helper.executeModule("pagination");

        }, function (err) {
            LightKitAdminEnvironment.toast("Error", err, "error");
        });


    }
}