function f(jBtn, rics, jContainer, jTable, params) {

    var url = params.url;
    var theParams = {
        rics: rics,
        table: params.table,
    };
    if (params.csrf_token) {
        theParams.csrf_token = params.csrf_token;
    }
    LightKitAdminEnvironment.postForm(url, theParams);
}