function f(jBtn, jContainer, params) {


    var jModal = $('#modal-Light_Kit_Admin-generate');

    jModal.off().on('shown.bs.modal', function (e) {

        var jOk = jModal.find('.btn-lka-generate');


        jOk.off('click').on('click', function () {

            var jSelect = jModal.find('.custom-select');
            var jSpinner = jModal.find('.lka-btn-spinner');


            jOk.hide();
            jSpinner.removeClass("d-none");


            var url = params.url;
            params.number = jSelect.val();

            AcpHepHelper.post(url, params, function (response) {
                jModal.modal("hide");
                jOk.show();
                jSpinner.addClass("d-none");

                // close the dropdown of the general actions
                $('.dropdown-toggle').dropdown("hide");

                // show a toast?
                // actually I didn't like it, but uncomment this if you want a toast notif for the generated rows
                if (response.toast_title) {
                    // LightKitAdminEnvironment.toast(response.toast_title, response.toast_body, response.toast_type);
                }


                // refreshing the list gui
                var helper = RealistRegistry.getOpenAdminTableHelper();
                helper.executeModule("pagination");
            }, function (err) {
                LightKitAdminEnvironment.toast("Error", err, "error");
            });

            return false;
        });
    });
    jModal.modal('show');


}