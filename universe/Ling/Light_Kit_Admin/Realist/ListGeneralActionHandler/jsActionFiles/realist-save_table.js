function f(jBtn, jContainer, params) {



    var jModal = $('#modal-Light_Kit_Admin-save_table');

    jModal.on('shown.bs.modal', function (e) {

        jModal.find('.btn-lka-save').off('click').on('click', function () {

            var jInput = jModal.find('.the-input');
            var jSelect = jModal.find('.the-select');

            var url = params.url;
            params.name = jInput.val();
            params.visibility = jSelect.val();

            AcpHepHelper.post(url, params, function (response) {
                jModal.modal("hide");


                // show a toast?
                // actually I didn't like it, but uncomment this if you want a toast notif for the generated rows
                if (response.toast_title) {
                    LightKitAdminEnvironment.toast(response.toast_title, response.toast_body, response.toast_type);
                }

            }, function(err){
                LightKitAdminEnvironment.toast("Error", err, "error");
            });

            return false;
        });
    });
    jModal.modal('show');
}