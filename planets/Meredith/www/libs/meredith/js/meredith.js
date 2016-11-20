/**
 * Meredith.
 * LingTalfi - 2015-12-27
 *
 * Depends on jquery (version 2.1.4 was used for the development)
 * Depends on jquery-serialize-object
 * Depends on bootbox
 * Depends on tim
 * Relies on bootstrap modal system
 *
 *
 */
(function () {
    if ('undefined' === typeof window.meredith) {


        window.meredithRegistry = {
            insertUpdateUrl: null
        };

        window.meredithFunctions = {
            modalWarning: function (msg) {
                $('#meredith_warning_modal')
                    .off('show.bs.modal')
                    .on('show.bs.modal', function (e) {
                        $('#meredith_warning_modal').find(".modal-body-paragraph").html(msg);
                    });
                $('#meredith_warning_modal').modal('show');
            },
            removeIdfs: function (ids, dt) {
                var formId = $('.datatable-meredith').data("formId");
                var url = $('.datatable-meredith').data("delete_rows_url");

                timPost(url, {
                    ids: ids,
                    formId: formId
                }, function (msg) {
                    dt.row('.selected').remove().draw();
                }, function (msg) {
                    modalWarning(msg);
                });
            },
            submitValidForm: function (form) {
                var jForm = $(form);
                var url = meredithRegistry.insertUpdateUrl;
                var formId = jForm.attr("data-meredith");
                var data = jForm.serializeObject();
                data.meredithFormId = formId;


                // clean state
                jForm.removeData("meredith.isSuccess");


                var isInsert = true;


                var idf = jForm.data('meredith.idf2Values');
                if ('undefined' !== typeof idf) {
                    data.meredithIdf = idf;
                    isInsert = false;
                }


                timPost(url, data, function (m) {
                    if ('msg' in m) {

                        /**
                         * Assuming the insert form is static, we display the success message.
                         * Note that the inserted values stay in the form, so that the user can
                         * add another item just by tweaking the present values
                         */
                        if (true === isInsert) {
                            meredithFunctions.writeSuccessMessage(m.msg, jForm);
                        }
                        /**
                         * Assuming the update form is an ajax form triggered from a line of the list of items,
                         * in case of success, we want to close the form and update and highlight
                         * the corresponding line in the list.
                         */
                        else {
                            jForm.data("meredith.isSuccess", true);
                            $('#meredith_edit_modal').modal("hide");
                        }
                    }
                    else {
                        meredithFunctions.writeDevError("msg key not found");
                    }
                }, function (m) {
                    meredithFunctions.writeErrorMessage(m, jForm);
                });
            },
            //------------------------------------------------------------------------------/
            // override functions below
            //------------------------------------------------------------------------------/
            writeDevError: function (msg) {
            },
            writeErrorMessage: function (msg, jForm) {
                jForm.prepend(msg);
            },
            writeSuccessMessage: function (msg, jForm) {
                jForm.prepend(msg);
            }
        };


        window.meredithButtonsFactory = {
            colvis: function (text) {
                if ('undefined' === typeof text) {
                    text = "Columns visibility";
                }
                return {
                    extend: "colvis",
                    text: text
                };
            },
            deleteSelectedRows: function (options) {

                var opts = $.extend({
                    text: "Delete",
                    confirmText: "Are you sure you want to delete the selected rows (this action is irreversible)?",
                    confirmButtonTxt: "Ok",
                    cancelButtonTxt: "Cancel"
                }, options);

                return {
                    text: opts.text,
                    action: function (e, dt, node, config) {


                        var idfs = [];
                        var objects = dt.rows({selected: true}).data();
                        for (var i = 0; i < objects.length; i++) {
                            var idf2Values = objects[i]['DT_RowData']['idf'];
                            idfs.push(idf2Values);
                        }
                        
                        bootbox.confirm({
                                message: opts.confirmText,
                                callback: function (result) {
                                    if (true === result) {
                                        meredithFunctions.removeIdfs(idfs, dt);
                                    }
                                },
                                buttons: {
                                    confirm: {
                                        label: opts.confirmButtonTxt
                                    },
                                    cancel: {
                                        label: opts.cancelButtonTxt
                                    }

                                }
                            }
                        );
                    }
                };
            }
        };


        window.meredithColumnDefsFactory = {
            actionMenu: function (options) {
                var opts = $.extend({
                    useUpdate: true,
                    useDelete: true,
                    updateText: "Update",
                    deleteText: "Delete",
                    target: -1
                }, options);


                var sUpdate = '';
                if (true === opts.useUpdate) {
                    sUpdate = ''
                    + '<li><a data-target="#meredith_edit_modal" data-toggle="modal" href="#">'
                    + '<i class="icon-pencil7"></i> ' + opts.updateText + '</a></li>';
                }


                var sDelete = '';
                if (true === opts.useDelete) {
                    sDelete = ''
                    + '<li><a data-target="#meredith_remove_modal" data-toggle="modal" href="#">'
                    + '<i class="icon-trash"></i> ' + opts.deleteText + '</a></li>';
                }

                return {
                    "targets": opts.target,
                    "data": null,
                    "defaultContent": '<ul class="icons-list">'
                    + '<li class="dropdown">'
                    + '<a data-toggle="dropdown" class="dropdown-toggle" href="#">'
                    + '<i class="icon-menu9"></i>'
                    + '</a>'
                    + '<ul class="dropdown-menu dropdown-menu-right">'
                    + sUpdate
                    + sDelete
                    + '</ul></li>'
                    + '</ul>'
                };
            },
            activeButton: function (target, options) {
                var opts = $.extend({
                    activeText: "Active",
                    inactiveText: "Inactive"
                }, options);

                return {
                    targets: target,
                    render: function (data, type, full, meta) {
                        if ('1' === data) {
                            return '<span class="label label-success">' + opts.activeText + '</span>';
                        }
                        return '<span class="label label-danger">' + opts.inactiveText + '</span>';
                    }
                };
            },
            data2ButtonMap: function (target, options) {
                var opts = $.extend({
                    /**
                     * array of data => [ span class, text ]
                     */
                    textMap: {},
                    // array|null, the [ span class, text ] array
                    defaultInfo: null
                }, options);
                return {
                    targets: target,
                    render: function (data, type, full, meta) {
                        var info;
                        if (data in opts.textMap) {
                            info = opts.textMap[data];
                            return '<span class="' + info[0] + '">' + info[1] + '</span>';
                        }
                        else if (null !== opts.defaultInfo) {
                            info = opts.defaultInfo;
                            return '<span class="' + info[0] + '">' + info[1] + '</span>';
                        }
                        return data;
                    }
                };
            }
        };

        window.meredith = function () {

        };
    }
})();
