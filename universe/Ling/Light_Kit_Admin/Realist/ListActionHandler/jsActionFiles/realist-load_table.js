function f(jBtn, jContainer, params) {


    var jModal = $('#modal-Light_Kit_Admin-load_table');
    var jMainSpinner = jModal.find('.lka-modal-main-spinner');
    var jForm = jModal.find('.lka-modal-form');
    var jNoItemError = jModal.find('.no-item-error');



    jMainSpinner.removeClass('d-none');
    jForm.addClass("d-none");
    jNoItemError.hide();

    jModal.off().on('shown.bs.modal', function (e) {

        var url = params.url;
        var csrfToken = params.csrf_token || null;
        if (null === csrfToken) {
            LightKitAdminEnvironment.toast("Error", "No csrf token provided.", "error");
            return;
        }


        var fetchParams = {
            action: "get-backup-files-info",
            csrf_token: csrfToken,
            handler: "Light_UserData",
            table: params.table || null,
        };


        AcpHepHelper.post(url, fetchParams, function (response) {

            var jSelect = jModal.find('.the-select');
            var jSpinner = jModal.find('.lka-btn-spinner');

            var jPlaceHolderBackupDir = jModal.find('.placeholder-backup-dir');


            // init placeholders
            jPlaceHolderBackupDir.html('');
            jSelect.empty();


            jMainSpinner.addClass('d-none');
            jForm.removeClass("d-none");


            var backupList = bee.getValue('backup_list', response, false, {});
            var backupDir = bee.getValue('backup_dir', response);


            var nbOptions = 0;
            jPlaceHolderBackupDir.html(backupDir);
            for (var k in backupList) {
                var jOption = '<option value="' + bee.escapeHtml(k) + '">' + backupList[k] + '</option>';
                jSelect.append(jOption);
                nbOptions++;
            }


            var jOk = jModal.find('.btn-lka-load');
            jOk.off('click').on('click', function () {


                if (0 === nbOptions) {
                    jNoItemError.show();
                } else {
                    jOk.hide();
                    jSpinner.removeClass("d-none");


                    params.resource_file_id = jSelect.val();

                    AcpHepHelper.post(url, params, function (response) {
                        jModal.modal("hide");
                        jOk.show();
                        jSpinner.addClass("d-none");

                        // show a toast?
                        // actually I didn't like it, but uncomment this if you want a toast notif for the generated rows
                        if (response.toast_title) {
                            LightKitAdminEnvironment.toast(response.toast_title, response.toast_body, response.toast_type);
                        }

                        // close the dropdown of the general actions
                        $('.dropdown-toggle').dropdown("hide");


                        // refreshing the list gui
                        var helper = RealistRegistry.getOpenAdminTableHelper();
                        helper.executeModule("pagination");


                    }, function (err) {
                        LightKitAdminEnvironment.toast("Error", err, "error");
                    });
                }
                return false;
            });

        });


    });
    jModal.modal('show');
}