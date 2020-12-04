function f(jBtn, jContainer, params) {


    var jModal = $('#modal-Light_Kit_Admin-save_table');

    jModal.off().on('shown.bs.modal', function (e) {

        var jOk = jModal.find('.btn-lka-save');
        jOk.off('click').on('click', function () {

            var jInput = jModal.find('.the-input');
            var jSelect = jModal.find('.the-select');
            var jSpinner = jModal.find('.lka-btn-spinner');


            jOk.hide();
            jSpinner.removeClass("d-none");

            var url = params.url;
            params.name = jInput.val();
            params.visibility = jSelect.val();

            AcpHepHelper.post(url, params, function (response) {


                // refreshing the list gui
                var helper = RealistRegistry.getOpenAdminTableHelper();
                helper.executeModule("pagination");


                // close the dropdown of the general actions
                $('.dropdown-toggle').dropdown("hide");

                // close the modal
                jModal.modal("hide");
                jOk.show();
                jSpinner.addClass("d-none");

            }, function (err) {
                LightKitAdminEnvironment.toast("Error", err, "error");
            });

            return false;
        });
    });
    jModal.modal('show');
}