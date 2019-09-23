function f(jBtn, rics, jContainer, jTable, params) {




    var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
    var win = window.open('', "_blank", strWindowFeatures);


    var url = params.url;


    var acpHelper= new AcpHepHelper();
    var successHandler = function(response){
        console.log("Success, do something with the response...");
    };
    var errorHandler = function(errorMsg, response){
        console.log("An error occurred: " + errorMsg);
    };
    acpHelper.post(url, params, successHandler, errorHandler);


    $.ajax({
        type: "POST",
        url: url,
        data: params,
        success: function (response) {


            win.document.write(response);

            // var type = response.type;
            // if ('error' === type) {
            //
            // } else if ('success' === type) {
            //
            // } else {
            //     $this.error("Unknown response type from the server.");
            // }
        },
        dataType: "json",
    });


}