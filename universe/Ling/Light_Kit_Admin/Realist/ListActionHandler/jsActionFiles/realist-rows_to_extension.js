function f(jBtn, rics, jContainer, jTable, params) {



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

    AcpHepHelper.post(params.url, params, function (res) {
        LightKitAdminEnvironment.triggerDownload(res.file, res.filename, res.contentType);
    }, function (err) {
        LightKitAdminEnvironment.toast("Error", err, "error");
    });
}