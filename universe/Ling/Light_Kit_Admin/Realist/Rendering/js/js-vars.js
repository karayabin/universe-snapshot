oathOptionsExtra = $.extend(oathOptionsExtra, {
    on_server_error: function (errMsg) {
        LightKitAdminEnvironment.toast("Error", errMsg, "error");
    },
});