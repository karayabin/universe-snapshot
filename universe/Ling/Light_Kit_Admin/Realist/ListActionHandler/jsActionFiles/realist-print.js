function f(jBtn, rics, jContainer, jTable, params) {


    var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";


    var url = params.url;
    delete params.url;


    params.rics = rics;
    url = url + '?' + $.param(params);
    window.open(url, "_blank", strWindowFeatures);
}