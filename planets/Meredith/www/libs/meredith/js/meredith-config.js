(function ($) {
    $(document).ready(function () {


        // persisting rows selections 
        var selected = [];


        /**
         * Assuming that (wass0) /libs/meredith/js/meredith.js is loaded first
         * The registry can be used by the user to transmit data
         */
        if (null === window.meredithRegistry.buttons) {
            window.meredithRegistry.buttons = [];
        }
        /**
         * void     callback (jForm, data)
         *              data is a mapping (js array object) containing the form data (it comes from the db via ajax)
         */
        window.meredithRegistry.onModalOpenAfter = null;

        if ('undefined' === typeof window.meredithRegistry.devError) {
            window.meredithRegistry.devError = function (msg) {
                console.log("Meredith.devError: " + msg);
            };
        }


        window.meredithOnDrawAfter = function () {

        };

        // Table setup
        // ------------------------------

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll"t><"datatable-footer"ip>',
            buttons: meredithRegistry.buttons,
            lengthMenu: meredithRegistry.lengthMenu,
            pageLength: meredithRegistry.pageLength,
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'}
            },
            //scroller: true,
            //scrollY: 500, // required, I don't know why
            select: {
                style: 'os', // you need to put this base property if you want to use info:false (didn't found it in the docs)
                info: false
            },
            serverSide: true,
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                window.meredithOnDrawAfter();
            },
            preDrawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            },
            rowCallback: function (row, data) {
                // uncomment this and in initComplete to have persistent selection 
                //if ($.inArray(parseInt(data.DT_RowId), selected) !== -1) {
                //    $(row).addClass('selected');
                //}
            },
            initComplete: function (settings, json) {
                // External table additions
                // ------------------------------
                // Add placeholder to the datatable filter option
                $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');


                // useful values
                var table = $('.datatable-meredith').DataTable();
                var jTable = $('.datatable-meredith').dataTable();
                var jForm = $("#meredith_edit_modal").find("form");

                //------------------------------------------------------------------------------/
                // REMOVE ROW -- by clicking on row's remove button
                //------------------------------------------------------------------------------/
                $('#meredith_remove_modal')
                    .on('show.bs.modal', function (e) {
                        var jTarget = $(e.relatedTarget);
                        var jRow = jTarget.closest("tr");
                        var idf2Values = jRow.data('idf');
                        $("#meredith_remove_row_confirm")
                            .off()
                            .on('click', function () {
                                meredithFunctions.removeIdfs([idf2Values], table);
                            })
                        ;
                    });


                //------------------------------------------------------------------------------/
                // EDIT ROW -- by clicking on row's edit button
                //------------------------------------------------------------------------------/
                $('#meredith_edit_modal')
                    .on('show.bs.modal', function (e) {

                        /**
                         * reset the id/pk of the form being updated,
                         * and other values too...
                         */
                        jForm.removeData('meredith.updatedId');
                        jForm.removeData('meredith.idf2Values');
                        jForm.removeData('meredith.isSuccess');


                        var jTarget = $(e.relatedTarget);
                        var jRow = jTarget.closest("tr");
                        var idf2Values = jRow.data('idf');


                        var formId = $('.datatable-meredith').data("formId");
                        var url = $('.datatable-meredith').data("fetch_row_url");


                        timPost(url, {
                            idf: idf2Values,
                            formId: formId
                        }, function (info) {
                            for (var key in info) {

                                var jControl = jForm.find("[name=" + key + "]");

                                // ignore fields like id
                                if (jControl.length) {


                                    /**
                                     * I couldn't handle switchery checkboxes with just jquery.val()
                                     * as said in the docs: http://api.jquery.com/val/#val-value,
                                     * so here is my home made work around.
                                     */
                                    if (jControl.hasClass("switchery")) {
                                        var isChecked = jControl[0].checked;
                                        if ('1' === info[key]) {
                                            if (false === isChecked) {
                                                jControl.trigger('click');
                                            }
                                        }
                                        else {
                                            if (true === isChecked) {
                                                jControl.trigger('click');
                                            }
                                        }
                                    }
                                    else {
                                        jControl.val(info[key]);
                                    }
                                }
                            }
                            var func = window.meredithRegistry.onModalOpenAfter;
                            if (null !== func) {
                                func(jForm, info);
                            }

                            /**
                             * transmit the jRow so that when it closes,
                             * we know which tr to visually update.
                             *
                             */
                            jForm.data('meredith.updatedId', jRow.attr('id'));

                            /**
                             * This value indicates:
                             *
                             * - that the form is of type update
                             * - the idf values
                             */
                            jForm.data('meredith.idf2Values', idf2Values);

                            //table.row('.selected').remove().draw();
                        }, function (msg) {
                            meredithFunctions.modalWarning(msg);
                        });


                    })
                    .on('hidden.bs.modal', function () {

                        var isSuccess = jForm.data("meredith.isSuccess");
                        if (true === isSuccess) {

                            window.meredithOnDrawAfter = function () {
                                var id = jForm.data("meredith.updatedId");
                                var jRow = jTable.find("tr[id=" + id + "]");

                                jRow.addClass("highlight");
                                jRow.stop().animate({
                                    'opacity': '1'
                                }, 500, function () {
                                    jRow.removeClass("highlight");
                                });
                            };
                            table.draw();
                        }
                    });


                // uncomment this and in rowCallback to have persistent selection
                //var table = $('.datatable-meredith').DataTable();
                //table.on('select', function (e, dt, type, indexes) {
                //    if (type === 'row') {
                //        var ids = dt.rows({selected: true}).ids();
                //        for (var i = 0; i < ids.length; i++) {
                //            var id = parseInt(ids[i]);
                //            var index = $.inArray(id, selected);
                //            if (index === -1) {
                //                selected.push(id);
                //            }
                //        }
                //    }
                //});
                //table.on('deselect', function (e, dt, type, indexes) {
                //    if (type === 'row') {
                //        var jNotSelected = $('.datatable-meredith').find("tr").not(".selected");
                //        var ids = dt.rows(jNotSelected).ids();
                //        for (var i = 0; i < ids.length; i++) {
                //            var id = parseInt(ids[i]);
                //            var index = $.inArray(id, selected);
                //            if (index !== -1) {
                //                selected.splice(index, 1);
                //            }
                //        }
                //    }
                //});
            }
        });


    });
})(jQuery);
