function f(jBtn, rics, jContainer, jTable, params) {

    var url = params.url;
    var theParams = {
        rics: rics,
        realform_id: params.realform_id,
    };
    if (params.csrf_token) {
        theParams.csrf_token = params.csrf_token;
    }
    LightKitAdminEnvironment.postForm(url, theParams);
}