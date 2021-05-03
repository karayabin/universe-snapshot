/**
 * Gui elements summary (for the web dev)
 * ---------------------
 * - jModal                                     (note that the modal is the only thing outside the context)
 *      - iframe
 * - (jContext)
 *      - .pane.pane1
 *          - select.rows-select                (contains the search items)
 *          - select.pagination-select          (contains the pagination items)
 *          - input.search-input                (holds the user search)
 *          - .clear-search-btn                 (the clear search button)
 *          - .sort-items-btn                   (the sort items button)
 *          - .reset-btn                        (the reset button in pane1)
 *          - .new-item-btn                     (the button to open the pane1 insert form)
 *          - .edit-item-btn                    (the button to open the pane1 update form, assuming a pane1 item is selected)
 *          - .remove-item-btn                  (the button to remove an item)
 *          - .add-children-btn:                (the button to add a children for the selected pane1 item)
 *
 *      - .pane.pane2
 *          - ...(same as pane1, but replace pane1 with pane2 in css classes)
 *                  Also, pane2 doesn't have the .reset-btn and the .add-children-btn
 *
 *
 *
 *
 *
 *
 *
 *
 */
if ('undefined' === typeof window.HasDualPaneWidget) {
    (function () {


        window.HasDualPaneWidget_ErrorHandler = function (errData) {
            if ('error' === errData.type) {
                console.log(errData);
                throw new Error("Error from HasDualPaneWidget js code: " + errData.error);
            }
        };

        window.HasDualPaneWidget_ConfirmHandler = function (msg) {
            return window.confirm(msg);
        };

        //----------------------------------------
        // UTILS
        //----------------------------------------
        function escapeHtml(text) {
            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return text.replace(/[&<>"']/g, function (m) {
                return map[m];
            });
        }


        /**
         * https://ourcodeworld.com/articles/read/16/what-is-the-debounce-method-and-how-to-use-it-in-javascript
         *
         * Execute a function given a delay time
         *
         * @param {type} func
         * @param {type} wait
         * @param {type} immediate
         * @returns {Function}
         */
        var debounce = function (func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };


        //----------------------------------------
        // WIDGET
        //----------------------------------------
        window.HasDualPaneWidget = function (options) {
            this.identifier = options.identifier;
            this.jContext = options.context;

            /**
             * This modal is used to display forms
             */
            this.jModal = options.modal;

            /**
             * This modal is used to display the list of items (to bind to selected pane1 item)
             */
            this.jModal2 = options.modal2;
            this.jFrame = this.jModal.find("iframe");
            this.csrfToken = options.csrfToken;
            this.ajaxHandlerId = options.ajaxHandlerId;
            this.crudDeleteContextIdentifier = options.crudDeleteContextIdentifier;
            this.textConfirmDeleteRows = options.textConfirmDeleteRows;

            /**
             * We use the ajax handler service for two urls:
             * - fetching the pane2 item info when pane1 item is selected (using Light_RowLookup ajax service)
             * - deleting the rows (using Light_Crud.delete_rows ajax service)
             */
            this.ajaxHandlerUrl = options.ajaxHandlerUrl;

            this.pane1FormInsertUrl = options.pane1FormInsertUrl;
            this.pane1FormUpdateUrl = options.pane1FormUpdateUrl;
            this.pane2FormInsertUrl = options.pane2FormInsertUrl;
            this.pane2FormUpdateUrl = options.pane2FormUpdateUrl;

            this.pane1Table = options.pane1Table;
            this.pane2Table = options.pane2Table;

            this.pane1Direction = 'asc';
            this.pane2Direction = 'asc';


            this.jPane1 = this.jContext.find('.pane1');
            this.jPane2 = this.jContext.find('.pane2');


            this.initialPanesInfo = null;

            /**
             * There are four states of the iframe:
             *
             * - new pane1
             * - edit pane1
             * - new pane2
             * - edit pane2
             *
             * This property keeps track of the latest state.
             */
            this.iframeMode = null;

            /**
             * A set of jquery elements representing the selected items in pane1.
             *
             * The rule is;
             *
             * - no pane1 item selected is the default
             * - if one and only one pane1 item is selected, the pane2 searches are bound to that item.
             * - if more than one pane1 items are selected, it's to delete them, and the pane2 is reset (as if no pane1 item were selected)
             * - editing of a pane1 item is only available if only one item is selected.
             *
             */
            this.jPane1SelectedItems = {};

            /**
             * A set of jquery elements representing the selected items in pane2.
             * For pane2 items, it's just about deleting or editing them. Deleting accept multiple items at once, while
             * editing is only available if only one item is selected.
             */
            this.jPane2SelectedItems = {};
        };


        HasDualPaneWidget.prototype = {

            init: function (panesInfo) {
                var $this = this;
                var jPane, jItem, url, jSearchInput, jSelect, paneNumber, itemsLength, mode;
                this.initialPanesInfo = panesInfo;

                //----------------------------------------
                // DEFINE LISTENERS
                //----------------------------------------

                // click handlers
                //----------------------------------------
                this.jContext.on('click', function (e) {
                    var jTarget = $(e.target);


                    // row items click
                    //----------------------------------------
                    if (jTarget.hasClass('row-item')) {
                        jPane = jTarget.closest('.pane');
                        jSelect = jTarget.closest('.rows-select');

                        if (jPane.hasClass('pane1')) {
                            paneNumber = 1;
                            $this.jPane1SelectedItems = jSelect.find('option:selected');
                            itemsLength = $this.jPane1SelectedItems.length;
                        } else {
                            paneNumber = 2;
                            $this.jPane2SelectedItems = jSelect.find('option:selected');
                            itemsLength = $this.jPane2SelectedItems.length;
                        }


                        if (1 === itemsLength) {
                            jPane.find('.edit-item-btn').prop('disabled', false);
                        } else {
                            jPane.find('.edit-item-btn').prop('disabled', true);
                        }
                        if (itemsLength >= 1) {
                            jPane.find('.remove-item-btn').prop('disabled', false);
                        }


                        if (1 === paneNumber) {
                            if (1 === itemsLength) {
                                var hepParams = AcpHepHelper.getHepParameters($this.jPane1SelectedItems.first());
                                $this.executePaneSearch($this.jPane2, {
                                    key: 'pane2_parent',
                                    page: 1,
                                    search: '',
                                    ric: hepParams.ric,
                                }, function () {
                                    jPane.find('.add-children-btn').prop("disabled", false);
                                    $this.jPane2.find('.new-item-btn').prop("disabled", true);
                                });
                            } else {
                                $this.resetPane2();
                                jPane.find('.add-children-btn').prop("disabled", true);
                            }
                        }
                    }
                    // click blank zone in the select
                    //----------------------------------------
                    else if (jTarget.hasClass('rows-select')) {
                        jPane = jTarget.closest('.pane');
                        jTarget.find('option').prop('selected', false);
                        if (jPane.hasClass("pane1")) {
                            jPane.find('.edit-item-btn').prop('disabled', true);
                            jPane.find('.remove-item-btn').prop('disabled', true);
                            jPane.find('.add-children-btn').prop("disabled", true);
                        }
                        $this.resetPane2();
                        return false;
                    }
                    // clear search btn
                    //----------------------------------------
                    else if (jTarget.hasClass('clear-search-btn')) {
                        jPane = jTarget.closest('.pane');
                        jSearchInput = jPane.find('.search-input');
                        jSearchInput.val("");
                        jSearchInput.trigger('keyup');
                        return false;
                    }
                    // sort items btn
                    //----------------------------------------
                    else if (jTarget.hasClass('sort-items-btn')) {
                        jPane = jTarget.closest('.pane');
                        var paneNumber = 1;

                        if (jPane.hasClass('pane1')) {
                            if ('asc' === $this.pane1Direction) {
                                $this.pane1Direction = 'desc';
                            } else {
                                $this.pane1Direction = 'asc';
                            }
                        } else {
                            paneNumber = 2;
                            if ('asc' === $this.pane2Direction) {
                                $this.pane2Direction = 'desc';
                            } else {
                                $this.pane2Direction = 'asc';
                            }
                        }


                        /**
                         * Here I try to keep the selection (if any).
                         * Note that if there is more than one page, the selection won't be kept anyway.
                         * If there is only one page, we can leverage js instead of executing an ajax request (which is much more expensive).
                         */
                        if (
                            (1 === paneNumber && $this.jPane1SelectedItems.length >= 1) ||
                            (2 === paneNumber && $this.jPane2SelectedItems.length >= 1)
                        ) {
                            jSelect = jPane.find('.rows-select');
                            var options = jSelect.find('option');
                            options = [].slice.call(options).reverse();
                            jSelect.empty();
                            $.each(options, function (i, el) {
                                jSelect.append($(el));
                            });


                        } else {
                            jSearchInput = jPane.find('.search-input');
                            jSearchInput.trigger('keyup');
                        }
                        return false;
                    }
                    // pane1 reset
                    //----------------------------------------
                    else if (jTarget.hasClass('reset-btn')) {
                        $this.reset();
                        return false;
                    }
                    // new modal form
                    //----------------------------------------
                    else if (jTarget.hasClass('new-item-btn')) {

                        jPane = jTarget.closest('.pane');
                        if (jPane.hasClass('pane1')) {
                            mode = 'n1';
                            url = $this.pane1FormInsertUrl;
                        } else {
                            mode = 'n2';
                            url = $this.pane2FormInsertUrl;
                        }


                        $this.iframeMode = mode;
                        $this.jFrame.attr('src', url);
                        // $this.jModal.modal('handleUpdate');
                        $this.jModal.modal('show');

                        return false;
                    }
                    // pane1 edit form
                    //----------------------------------------
                    else if (jTarget.hasClass('edit-item-btn')) {

                        jPane = jTarget.closest('.pane');

                        if (jPane.hasClass('pane1')) {
                            jItem = $this.jPane1SelectedItems.first();
                            url = $this.pane1FormUpdateUrl;
                            mode = 'e1';
                        } else {
                            jItem = $this.jPane2SelectedItems.first();
                            url = $this.pane2FormUpdateUrl;
                            mode = 'e2';
                        }


                        hepParams = AcpHepHelper.getHepParameters(jItem);

                        url = $this.getUpdateUrl(url, hepParams.ric);
                        $this.iframeMode = mode;
                        $this.jFrame.attr('src', url);
                        $this.jModal.modal('show');

                        return false;
                    }
                    // pane1 remove btn
                    //----------------------------------------
                    else if (jTarget.hasClass('remove-item-btn')) {

                        if (true === HasDualPaneWidget_ConfirmHandler($this.textConfirmDeleteRows)) {


                            var jSelectedItems, paneTable;
                            jPane = jTarget.closest('.pane');
                            if (jPane.hasClass('pane1')) {
                                paneNumber = 1;
                                jSelectedItems = $this.jPane1SelectedItems;
                                paneTable = $this.pane1Table;
                            } else {
                                paneNumber = 2;
                                jSelectedItems = $this.jPane2SelectedItems;
                                paneTable = $this.pane2Table;
                            }

                            var rics = [];
                            jSelectedItems.each(function () {
                                hepParams = AcpHepHelper.getHepParameters($(this));
                                rics.push(hepParams.ric);
                            });
                            url = $this.ajaxHandlerUrl;
                            var data = {
                                handler: 'Light_Crud',
                                action: 'delete_rows',
                                contextIdentifier: $this.crudDeleteContextIdentifier,
                                table: paneTable,
                                rics: rics,
                                csrf_token: $this.csrfToken,
                            };


                            $.post(url, data, function (response) {
                                if ('error' === response.type) {
                                    window.HasDualPaneWidget_ErrorHandler(response);
                                } else {
                                    $this.refreshUpdate(paneNumber);
                                }
                            }, "json");
                        }


                        return false;
                    }
                    // pane2 new modal form
                    //----------------------------------------
                    else if (jTarget.hasClass('pane2-new-item-btn')) {
                        $this.iframeMode = 'n2';
                        $this.jFrame.attr('src', $this.pane2FormInsertUrl);
                        // $this.jModal.modal('handleUpdate');
                        $this.jModal.modal('show');
                        return false;
                    }
                    // add children
                    //----------------------------------------
                    else if (jTarget.hasClass('add-children-btn')) {
                        $this.jModal2.modal('show');
                        return false;
                    }

                });


                // pagination select change
                //----------------------------------------
                var jPane1Pagination = this.jPane1.find('.pagination-select');
                var jPane2Pagination = this.jPane2.find('.pagination-select');


                jPane1Pagination.on('change', function () {
                    var pageNumber = this.value;
                    var paneSearch = $this.getPaneSearch($this.jPane1);
                    $this.executePaneSearch($this.jPane1, {
                        key: 'pane1',
                        page: pageNumber,
                        search: paneSearch,
                    });
                });

                jPane2Pagination.on('change', function () {
                    var pageNumber = this.value;
                    var paneSearch = $this.getPaneSearch($this.jPane2);
                    $this.executePaneSearch($this.jPane2, {
                        key: 'pane2',
                        page: pageNumber,
                        search: paneSearch,
                    });
                });


                // search input keyup
                //----------------------------------------
                var jPane1Search = this.jPane1.find('.search-input');
                var jPane2Search = this.jPane2.find('.search-input');

                jPane1Search.keyup(debounce(function () {
                    var pageNumber = 1; // we want to search the whole set of data
                    var paneSearch = $this.getPaneSearch($this.jPane1);


                    $this.executePaneSearch($this.jPane1, {
                        key: 'pane1',
                        page: pageNumber,
                        search: paneSearch,
                        dir: $this.pane1Direction,
                    }, function () {
                        $this.resetPane2();
                    });

                }, 500));

                jPane2Search.keyup(debounce(function () {
                    var pageNumber = 1; // we want to search the whole set of data
                    var paneSearch = $this.getPaneSearch($this.jPane2);
                    $this.executePaneSearch($this.jPane2, {
                        key: 'pane2',
                        page: pageNumber,
                        search: paneSearch,
                        dir: $this.pane2Direction,
                    });
                }, 500));


                // modal on load
                //----------------------------------------
                this.jFrame.on('load', function () {
                    var jTheFrame = $(this);

                    setTimeout(function () {


                        //----------------------------------------
                        // RESIZING IFRAME HEIGHT TO ITS CONTENT
                        //----------------------------------------
                        /**
                         * I found out that I needed to first reduce the iframe's height before anything else,
                         * otherwise the iframe's content height detection would be biased.
                         */
                        jTheFrame.height(100);
                        var jContent = jTheFrame.contents();
                        var newHeight = jContent.outerHeight();
                        /**
                         * sometimes I don't know why I get the 0 value,
                         * which basically prevents the contents to be displayed.
                         */
                        if (0 === parseInt(newHeight)) {
                            newHeight = 400;
                        }
                        // jTheFrame.height(newHeight);
                        jTheFrame.animate({
                            height: newHeight + 'px',
                        });


                        //----------------------------------------
                        // IFRAME SIGNAL TECHNIQUE
                        //----------------------------------------
                        /**
                         * We use the iframe signal technique to communicate with the iframe.
                         * The iframe can signal us to close the modal by using the "done" message.
                         */
                        var jFrameSignal = jContent.find('#iframe-signal');
                        if (jFrameSignal.length) {
                            var iframeSignalValue = jFrameSignal.attr("data-value");
                            if ('done' === iframeSignalValue) {
                                $this.jModal.modal('hide');

                                if (
                                    'n1' === $this.iframeMode ||
                                    'e1' === $this.iframeMode
                                ) {
                                    $this.refreshUpdate(1);
                                } else if (
                                    'n2' === $this.iframeMode ||
                                    'e2' === $this.iframeMode
                                ) {
                                    $this.refreshUpdate(2);
                                } else {
                                    throw new Error("Programming error from HasDualPaneWidget/jjs/default.js");
                                }

                            }
                        }
                    }, 100);
                });


                //----------------------------------------
                // POPULATE THE GUI
                //----------------------------------------
                this.reset();

            },
            reset: function () {
                this.jPane1SelectedItems = {};
                this.updatePane(this.jPane1, this.initialPanesInfo.pane1);
                this.updatePane(this.jPane2, this.initialPanesInfo.pane2);

                this.jPane1.find('.edit-item-btn').prop('disabled', true);
                this.jPane1.find('.remove-item-btn').prop('disabled', true);

                this.jPane2.find('.edit-item-btn').prop('disabled', true);
                this.jPane2.find('.remove-item-btn').prop('disabled', true);
                this.jPane2.find('.add-children-btn').prop('disabled', true);
            },
            resetPane1: function () {
                this.updatePane(this.jPane1, this.initialPanesInfo.pane1);
                this.jPane1.find('.edit-item-btn').prop('disabled', true);
                this.jPane1.find('.remove-item-btn').prop('disabled', true);
                this.jPane2.find('.add-children-btn').prop('disabled', true);
            },
            resetPane2: function () {
                this.updatePane(this.jPane2, this.initialPanesInfo.pane2);
                this.jPane2.find('.new-item-btn').prop("disabled", false);
                this.jPane2.find('.edit-item-btn').prop('disabled', true);
                this.jPane2.find('.remove-item-btn').prop('disabled', true);
            },
            refreshUpdate: function (paneNumber) {

                var jPane, key;
                var $this = this;

                if (1 === paneNumber) {
                    jPane = this.jPane1;
                    key = 'pane1';
                } else {
                    jPane = this.jPane2;
                    key = 'pane2';
                }

                this.reset();
                this.executePaneSearch(jPane, {
                    key: key,
                    page: 1,
                    search: '',
                }, function (response) {
                    $this.initialPanesInfo[key] = response;
                });
            },
            getUpdateUrl: function (url, ric) {
                var sep = '&';
                if (-1 === url.indexOf('?')) {
                    sep = '?';
                }
                var s = '';
                var c = 0;
                for (var key in ric) {
                    if (0 !== c) {
                        s += '&';
                    }
                    s += key + '=' + ric[key];
                    c++;
                }

                return url + sep + s;
            },
            updatePane: function (jPane, paneInfo, storeAsNewDefault) {

                var paneNumber = 1;
                if (jPane.hasClass('pane2')) {
                    paneNumber = 2;
                }

                if (true === storeAsNewDefault) {
                    if (1 === paneNumber) {
                        this.initialPanesInfo.pane1 = paneInfo;
                    } else {
                        this.initialPanesInfo.pane2 = paneInfo;
                    }
                }

                var nbPages = parseInt(paneInfo.nb_pages);
                var page = parseInt(paneInfo.page);
                var rows = paneInfo.rows;


                //----------------------------------------
                // PAGINATION
                //----------------------------------------
                var jPagination = jPane.find('.pagination-select');
                jPagination.empty();
                var s = '';
                for (var i = 1; i <= nbPages; i++) {
                    var sSel = '';
                    if (i === page) {
                        sSel = 'selected="selected"';
                    }
                    s += '<option ' + sSel + ' value="' + i + '">' + i + '</option>';
                }
                jPagination.append(s);
                if (1 === nbPages) {
                    jPagination.prop('disabled', true);
                } else {
                    jPagination.prop('disabled', false);
                }


                //----------------------------------------
                // ROWS
                //----------------------------------------
                var jRowsSelect = jPane.find('.rows-select');
                jRowsSelect.empty();
                s = '';
                for (var i in rows) {
                    var row = rows[i];
                    var label = row.label;
                    var ric = escapeHtml(JSON.stringify(row.ric));
                    s += '<option class="row-item" data-paramjson-ric="' + ric + '">' + label + '</option>';
                }
                jRowsSelect.append(s);


                //----------------------------------------
                // SEARCH INPUT
                //----------------------------------------
                var jSearchInput = jPane.find('.search-input');
                jSearchInput.val("");

            },
            getPaneSearch: function (jPane) {
                // assuming if you call this method the search input is available
                return jPane.find('.search-input').val();
            },
            executePaneSearch: function (jPane, params, onSuccess) {
                var $this = this;
                var url = this.ajaxHandlerUrl;
                var data = $.extend({
                    ajax_handler_id: this.ajaxHandlerId,
                    ajax_action_id: 'search',
                    identifier: this.identifier,
                }, params);

                if (this.csrfToken) {
                    data.csrf_token = this.csrfToken;
                }

                $.post(url, data, function (response) {
                    if ('error' === response.type) {
                        window.HasDualPaneWidget_ErrorHandler(response);
                    } else {
                        $this.updatePane(jPane, response);
                        if (onSuccess) {
                            onSuccess(response);
                        }
                    }
                }, "json");
            }
        };

    })();
}