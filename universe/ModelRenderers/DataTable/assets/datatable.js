/**
 * This js script  works with a companion renderer, it breathe life into
 * the rendered html static code.
 *
 *
 * Both the js and the renderer work together, united by the following convention.
 *
 *
 * //----------------------------------------
 * // CONTRACT
 * //----------------------------------------
 * Css classes to attribute:
 *
 *
 * - actionbutton-button: to an actionbutton button
 *                  The data-id attribute is used to retrieve the actionbutton identifier.
 *                  All attributes of the link, except the label and the icon,
 *                  are available as data-* attributes.
 *
 *                  If the attribute data-useSelectedRows is present and its value is 1 (true),
 *                  then the data-textUseSelectedRowsEmptyWarning attribute must also be
 *
 *
 * - nipp-selector: to the nipp selector.
 *                  The value is retrieved using regular form value extraction technique for select.
 * - quickpage-input: to the quick page input
 *                  The value is retrieved using regular form value extraction technique for input.
 * - quickpage-button: to the quick page button
 * - checkboxes-toggler: to the top checkbox used to toggle the others.
 *                  The value is retrieved using regular form value extraction technique for checkbox.
 * - sort-item: on an element that triggers sort update.
 *              The sort update follows a cycle:
 *                  - no sort
 *                  - asc
 *                  - desc
 *
 *              The sort-item also has an extra class indicating the
 *              current state it is in:
 *                  - sort-nosort
 *                  - sort-asc
 *                  - sort-desc
 *
 *              Also, the data-id attribute is used to retrieve the columnId
 * - search-input: a search input for a given column.
 *              The value is retrieved using regular form value extraction technique for input.
 *              Also, the data-id attribute is used to retrieve the columnId
 * - search-button: the search button
 * - search-clear-button: the search clear button
 *
 * - ric-checkbox: the checkbox of a row (holding the ric string value).
 *                      The data-id attribute is used to hold the ric string value.
 * - bulk-selector: the selector for the bulk actions.
 *                  The value of the option is the action identifier.
 *                  The value is retrieved using regular form value extraction technique for select.
 * - pagination-link: a pagination link.
 *                  The value is retrieved using the value of the data-id attribute
 * - pagination-first: assign this to the pagination first link to make it alive
 * - pagination-prev: assign this to the pagination previous link to make it alive
 * - pagination-next: assign this to the pagination next link to make it alive
 * - pagination-last: assign this to the pagination last link to make it alive
 *
 * - special-link: a link inside a row, created using the special features of the row of type link.
 *                      All attributes of the link, except the label and the icon,
 *                      are available as data-* attributes.
 *
 *
 *
 * - data-store: This is a special hidden div used only for the purpose of transmitting
 *                  data to the js script.
 *                  The problem in the first place was this.
 *
 *                  Imagine for a second that you are the script,
 *                  and so you need to refresh the datatable view.
 *                  One function that you will have is therefore the refresh function.
 *                  The refresh function needs to send all parameters necessary
 *                  to display the datatable correctly, consistently with
 *                  the user gui.
 *                  In fact, there are only four parameters that need to be sent:
 *                  page, nipp, sortValues and searchValues.
 *
 *                  Ok, how would you send page for instance?
 *                  -> probably guessing it from the quickPage selector, right?
 *                  But what if it's not displayed?
 *                  -> probably fallback on the pagination links, right?
 *                  But what if it's not displayed?
 *                  -> ... that doesn't work, we need another system.
 *
 *
 *                  Also, what if the developer uses showSort=false,
 *                  but at the same time wants the rows to be ordered
 *                  by id desc?
 *                  From where would you retrieve the sort information then?
 *
 *
 *
 *                  That's right, we need a more consistent system.
 *                  So datastore basically stores all four data in its
 *                  data-* attributes:
 *
 *                  - data-ric: a comma separated list of ric items
 *                  - data-columns: a comma separated list of columnId
 *                  - data-page
 *                  - data-textUseSelectedRowsEmptyWarning: see model documentation for more info
 *                  - data-nipp
 *                  - data-sort-$columnId: $sortDir
 *                          There is one attribute of this kind for every available column.
 *                          With sortDir being one of: asc, desc, none.
 *                  - data-search-$columnId: $searchValue
 *                          There is one attribute of this kind for every available column.
 *
 *
 *
 *
 * //----------------------------------------
 * // API
 * //----------------------------------------
 *
 *
 * How to:
 * $("#myDataTable").data("toggleCheckboxes")();
 *
 *
 * Available methods:
 *
 * - void       toggleCheckboxes()
 * - void       clearSearch()
 * - void       setPage( int:page )
 * - jQuerySet  getSelectedRows( )
 * - Array      getSelectedRics( )
 * - string     getRicByRowLink( jRowLink )
 *
 *
 *
 *
 *
 */
(function ($) {


    $.fn.dataTable = function (options) {


        options = $.extend({}, $.fn.dataTable.defaults, options);


        function error(msg) {
            console.log("dataTable error: " + msg);
        }

        function refresh(jElem, newData) {

            var profileId = jElem.attr('data-id');


            var data = {
                id: profileId,
                renderer: options.renderer
            };


            if (true === jElem.data('initial')) {
                jElem.data('initial', false);
            }
            else {
                data = getStoreData(jElem);
                data.id = profileId;
                data.renderer = options.renderer;
            }


            if ('undefined' !== typeof newData) {
                if ("function" === typeof newData) {
                    newData(data);
                }
                else {
                    data = $.extend(data, newData);
                }
            }


            $.post(options.uri, data, function (zedata) {
                handleResponse(zedata, function (html) {
                    jElem.empty();
                    jElem.append(html);
                    //----------------------------------------
                    // RE-INITIALIZE events that cannot be set lazily
                    //----------------------------------------
                    jElem.find('.nipp-selector').off('change').on('change', function () {
                        refresh(jElem, {
                            'nipp': $(this).val()
                        });
                    });
                    jElem.find('.bulk-selector').off('change').on('change', function () {
                        var jOption = $(this).find(':selected');
                        handleAction(jOption, "bulk", jElem);
                    });
                });
            }, 'json');
        }


        function handleResponse(response, success) {
            if ('type' in response) {
                if ('data' in response) {
                    if ('success' === response.type) {
                        success(response.data);
                    }
                    else if ('error' === response.type) {
                        options.modalResponse('error', response.data);
                    }
                    else {
                        error("Unknown response type: " + response.type);
                    }
                }
                else {
                    error("key 'data' not found in response");
                }
            }
            else {
                error("key 'type' not found in response");
            }
        }


        function postToUri(uri, data) {

            var form = '';
            $.each(data, function (key, value) {
                value = value.split('"').join('\"');
                form += '<input type="hidden" name="' + key + '" value="' + value + '">';
            });
            $('<form action="' + uri + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
        }


        /**
         * @param type: action|bulk|special
         */
        function handleAction(jEl, type, jTableHolder) {

            var value = jEl.val();
            if ('0' === value) {
                return;
            }

            var rics = [];

            // selected rows warning?
            if ('action' === type || 'bulk' === type) {
                rics = jTableHolder.data("getSelectedRics")();
                if (0 === rics.length) {
                    if ('action' === type) {
                        var showWarning = jEl.attr('data-useSelectedRows');
                        if ('1' === showWarning) {
                            var jStore = jTableHolder.find('.data-store');
                            var text = jStore.attr("data-textUseSelectedRowsEmptyWarning");
                            options.modalResponse("warning", text);
                            return;
                        }
                    }
                    else if ('bulk' === type) {
                        var jSel = jTableHolder.find('.bulk-selector');
                        var showWarning = jSel.attr('data-show');
                        if ('1' === showWarning) {
                            options.modalResponse("warning", jSel.attr('data-warning'));
                            return;
                        }
                    }
                }
            }


            /**
             * Note: data-* attributes case seemed
             * to be strlowered
             */
            var data = getActionDataAttributes(jEl, type);

            var fn = function () {


                if (
                    'modal' === data.type ||
                    'post' === data.type ||
                    'refreshOnSuccess' === data.type ||
                    'quietOnSuccess' === data.type
                ) {

                    var postData = {
                        id: data.id
                    };

                    if ("action" === type || 'bulk' === type) {
                        postData.rics = rics;
                    }
                    else if ('special' === type) {
                        var ric = jTableHolder.data('getRicByRowLink')(jEl);
                        postData.ric = ric;
                    }


                    if ('post' === data.type) {
                        postToUri(data.uri, postData);
                        return;
                    }
                    else {

                        $.post(data.uri, postData, function (response) {

                            handleResponse(response, function (d) {
                                if ('refreshOnSuccess' === data.type) {
                                    refresh(jTableHolder);
                                    return;
                                }
                                if ('modal' === data.type) {
                                    options.modalResponse('success', d);
                                }
                                if ('quietOnSuccess' === data.type) {
                                    // does nothing
                                }
                            });
                        }, 'json');
                    }
                }
                else if ('link' === data.type) {
                    window.location.href = data.uri;
                }
            };
            if (1 === data.confirm) {
                if (true === window.confirm(data.confirmtext)) {
                    fn();
                }
            }
            else {
                fn();
            }
        }


        function handleSearch(jElem) {
            var search = {};
            jElem.find('.search-input').each(function () {
                var id = $(this).attr('data-id');
                var value = $(this).val();
                search[id] = value;
            });

            refresh(jElem, {
                'searchValues': search
            });
        }

        function getActionDataAttributes(jEl, type) {


            var uri = '/datatable-handler?type=' + type;
            return $.extend({
                confirm: "", // false=>empty, true=(int)1
                confirmtext: "Are you sure you want to execute this action?",
                label: "",
                uri: uri,
                type: "modal"
            }, jEl.data());
        }

        function getStoreData(jEl) {
            var ret = {};
            var jStore = jEl.find('.data-store');
            var data = jStore.data();
            if ("page" in data) {
                ret['page'] = data.page;
            }
            if ("nipp" in data) {
                ret['nipp'] = data.nipp;
            }

            var columns = data.columns.split(',');
            var dStore = jStore[0];
            var sort = {};
            var search = {};
            var sortDir, searchVal;
            for (var i in columns) {
                var columnId = columns[i];
                if (dStore.hasAttribute('data-sort-' + columnId)) {
                    sortDir = jStore.attr('data-sort-' + columnId);
                    sort[columnId] = sortDir;

                }
                if (dStore.hasAttribute('data-search-' + columnId)) {
                    searchVal = jStore.attr('data-search-' + columnId);
                    search[columnId] = searchVal;
                }
            }

            ret['sortValues'] = sort;
            ret['searchValues'] = search;
            return ret;
        }


        return this.each(function () {
            var jElem = $(this);
            jElem.on('click', function (e) {
                var jTarget = $(e.target);
                if (jTarget.hasClass('actionbutton-button')) {
                    e.preventDefault();
                    handleAction(jTarget, "action", jElem);
                }
                else if (jTarget.hasClass('quickpage-button')) {
                    e.preventDefault();
                    jElem.data('setPage')(jElem.find('.quickpage-input').val());
                }
                else if (jTarget.hasClass('checkboxes-toggler')) {
                    // don't prevent default on checkboxes
                    if (true === jTarget.prop("checked")) {
                        jElem.find('.ric-checkbox').prop('checked', true);
                    }
                    else {
                        jElem.find('.ric-checkbox').prop('checked', false);
                    }
                }
                else if (jTarget.hasClass('ric-checkbox')) {
                    // don't prevent default on checkboxes
                    if (true === jTarget.prop("checked")) {
                        var allTrue = true;
                        jElem.find('.ric-checkbox').each(function () {
                            if (false === $(this).prop('checked')) {
                                allTrue = false;
                            }
                        });
                        if (true === allTrue) {
                            jElem.find('.checkboxes-toggler').prop('checked', true);
                        }
                        else {
                            jElem.find('.checkboxes-toggler').prop('checked', false);
                        }
                    }
                    else {
                        jElem.find('.checkboxes-toggler').prop('checked', false);
                    }
                }
                else if (jTarget.hasClass('sort-item')) {
                    e.preventDefault();
                    var id = jTarget.attr('data-id');
                    var nextSort = "none";
                    if (jTarget.hasClass('sort-nosort')) {
                        nextSort = "asc";
                    }
                    else if (jTarget.hasClass('sort-asc')) {
                        nextSort = "desc";
                    }

                    refresh(jElem, function (data) {
                        data.sortValues[id] = nextSort;
                    });
                }
                else if (jTarget.hasClass('search-button')) {
                    e.preventDefault();
                    handleSearch(jElem);
                }
                else if (jTarget.hasClass('search-clear-button')) {
                    e.preventDefault();
                    jElem.data('clearSearch')();
                }
                else if (jTarget.hasClass('special-link')) {
                    e.preventDefault();
                    handleAction(jTarget, "special", jElem);
                }
                else if (
                    jTarget.hasClass('pagination-link') ||
                    jTarget.hasClass('pagination-first') ||
                    jTarget.hasClass('pagination-prev') ||
                    jTarget.hasClass('pagination-next') ||
                    jTarget.hasClass('pagination-last')
                ) {
                    e.preventDefault();
                    var number = jTarget.attr('data-id');
                    jElem.data('setPage')(number);
                }
            });


            jElem.on('keydown', function (e) {
                var jTarget = $(e.target);
                if (13 === e.which) {
                    if (jTarget.hasClass('quickpage-input')) {
                        refresh(jElem, {
                            'page': jElem.find('.quickpage-input').val()
                        });
                    }
                    else if (jTarget.hasClass('search-input')) {
                        handleSearch(jElem);
                    }
                }

            });


            jElem.data('initial', true);
            refresh(jElem);

            //----------------------------------------
            // API
            //----------------------------------------
            jElem.data('toggleCheckboxes', function () {
                jElem.find(".checkboxes-toggler").trigger('click');
            });
            jElem.data('clearSearch', function () {
                jElem.find('.search-input').each(function () {
                    $(this).val("");
                });
                handleSearch(jElem);
            });
            jElem.data('setPage', function (page) {
                refresh(jElem, {
                    'page': page
                });
            });
            jElem.data('getSelectedRows', function () {
                return jElem.find('.ric-checkbox:checked');
            });
            jElem.data('getSelectedRics', function () {
                var rics = [];
                jElem.data('getSelectedRows')().each(function () {
                    rics.push($(this).attr('data-id'));
                });
                return rics;
            });
            jElem.data('getRicByRowLink', function (jRowLink) {
                return jRowLink.closest('tr').find('.ric-checkbox').attr('data-id');
            });
        });
    };


    $.fn.dataTable.defaults = {
        uri: "/datatable-handler",
        renderer: 'ModelRenderers\\DataTable\\DataTableRenderer',
        /**
         * @param type: error|success
         */
        modalResponse: function (type, msg) {
            alert("Modal of type " + type + ": " + msg);
        }
    };
})(jQuery);