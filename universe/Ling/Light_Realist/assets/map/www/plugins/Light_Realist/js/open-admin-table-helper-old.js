/**
 * Open Admin Table Helper.
 *
 * This tool helps you implement the open-admin-table protocol in your gui.
 *
 * See the implementation notes in
 * https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md
 *
 *
 *
 *
 */
if ("undefined" === typeof window.zzOpenAdminTableHelper) {

    (function () {

        function delay(callback, ms) {
            var timer = 0;
            return function () {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }


        var $ = jQuery;

        window.zzOpenAdminTableHelper = function (options) {
            this.options = $.extend({}, window.zzOpenAdminTableHelper._defaults, options);
            this.jContainer = this.options.jContainer;
            this.jTable = this.jContainer.find(this.options.table_selector);
            this.useSpinKit = this.options.use_spinkit_helper;

            // I use these to fix pagination inconsistency that can come from de-synced number of items per page and the page number.
            this.nbTotalRows = null;
            this.nippFlag = false;


            // initializing containers
            this.containers = {};

            var jDebugWindow = this.jContainer.find('.oath-debug-window');
            if (jDebugWindow.length) {
                this.containers.debug_window = jDebugWindow;
            }
            var jGlobalSearch = this.jContainer.find('.oath-global-search');
            if (jGlobalSearch.length) {
                this.containers.global_search = jGlobalSearch;
            }
            var jAdvancedSearch = this.jContainer.find('.oath-advanced-search');
            if (jAdvancedSearch.length) {
                this.containers.advanced_search = jAdvancedSearch;
            }
            var jNumberOfRowsInfo = this.jContainer.find('.oath-number-of-rows-info');
            if (jNumberOfRowsInfo.length) {
                this.containers.number_of_rows_info = jNumberOfRowsInfo;
            }
            var jHeadColumnsSort = this.jContainer.find('.oath-head-columns-sort');
            if (jHeadColumnsSort.length) {
                this.containers.head_columns_sort = jHeadColumnsSort;
            }
            var jNeckFilters = this.jContainer.find('.oath-neck-filters');
            if (jNeckFilters.length) {
                this.containers.neck_filters = jNeckFilters;
            }
            var jPagination = this.jContainer.find('.oath-pagination');
            if (jPagination.length) {

                this.containers.pagination = jPagination;
                var jNumberOfItemsPerPage = this.jContainer.find('.oath-number-of-items-per-page');
                if (jNumberOfItemsPerPage.length) {
                    this.containers.number_of_items_per_page = jNumberOfItemsPerPage;
                }

            }


        };

        window.zzOpenAdminTableHelper.prototype = {
            listen: function () {
                var $this = this;


                //----------------------------------------
                // INITIALIZING TRIGGERS
                //----------------------------------------

                //----------------------------------------
                // GLOBAL SEARCH
                //----------------------------------------
                var jGlobalSearch = this.getModuleContainer("global_search");
                if (jGlobalSearch) {
                    var jGlobalSearchSubmitBtn = jGlobalSearch.find('.oath-search-btn');
                    var jGlobalSearchInput = jGlobalSearch.find('input');
                    if (jGlobalSearchInput.length) {


                        if (jGlobalSearchSubmitBtn.length) {
                            jGlobalSearchSubmitBtn.on('click', function () {
                                $this.resetAdvancedSearchForm();
                                $this.executeModule("global_search");
                                return false;
                            });
                        }
                    } else {
                        this.error("Global search module doesn't contain an input.");
                    }
                }

                //----------------------------------------
                // ADVANCED SEARCH
                //----------------------------------------
                var jAdvancedSearch = this.getModuleContainer("advanced_search");
                if (jAdvancedSearch) {
                    var jAdvancedSearchSubmitBtn = jAdvancedSearch.find('.oath-search-btn');
                    if (jAdvancedSearchSubmitBtn.length) {
                        jAdvancedSearchSubmitBtn.on('click', function () {
                            $this.resetGlobalSearchForm();
                            $this.executeModule("advanced_search");
                            return false;
                        });
                    } else {
                        this.error("Advanced search module doesn't contain a submit button.");
                    }
                }

                //----------------------------------------
                // HEAD COLUMNS SORT
                //----------------------------------------
                var jHeadColumnsSort = this.getModuleContainer("head_columns_sort");
                if (jHeadColumnsSort) {
                    jHeadColumnsSort.on('click', '.oath-sort-trigger', function () {

                        // make a clean dom for rtt to process
                        var jColumn = $(this).find('[data-rtt-variable="column"]');
                        var jDirection = $(this).find('[data-rtt-variable="direction"]');

                        if (jColumn.length) {
                            if (jDirection.length) {
                                var column = jColumn.attr('data-rtt-value');
                                if (column) {
                                    var direction = jDirection.attr('data-rtt-value');
                                    if (direction) {

                                        //
                                        var newDirection;
                                        var rotationOrder = $this.options.head_columns_sort.rotation_order;
                                        var matchingIndex = rotationOrder.indexOf(direction);
                                        if (2 === matchingIndex) {
                                            newDirection = rotationOrder[0];
                                        } else {
                                            newDirection = rotationOrder[matchingIndex + 1];
                                        }
                                        jDirection.attr('data-rtt-value', newDirection);


                                        var jIcons = $(this).find('.oath-icon');
                                        if (jIcons.length) {
                                            var iconHideClass = $this.options.head_columns_sort.icon_hide_class;
                                            jIcons.each(function () {
                                                if (newDirection === $(this).attr('data-state')) {
                                                    $(this).removeClass(iconHideClass);
                                                } else {
                                                    $(this).addClass(iconHideClass);
                                                }
                                            });
                                        }
                                        $this.executeModule("head_columns_sort");

                                    } else {
                                        console.log($(this));
                                        $this.error("The rtt \"direction\" variable element doesn't have a value for column " + column + ".");
                                    }
                                } else {
                                    console.log($(this));
                                    $this.error("The rtt \"column\" variable element doesn't have a value.");
                                }
                            } else {
                                console.log($(this));
                                $this.error("The rtt \"direction\" variable element was not found for this head columns sort.");
                            }
                        } else {
                            console.log($(this));
                            $this.error("The rtt \"column\" variable element was not found for this head columns sort.");
                        }
                        return false;
                    });
                }


                //----------------------------------------
                // NECK FILTERS
                //----------------------------------------
                var jNeckFilters = this.getModuleContainer("neck_filters");
                if (jNeckFilters) {
                    /**
                     * As for now, we assume that control can only be native html control elements
                     * (so that we can develop our logic easily).
                     */
                    jNeckFilters.find('.oath-control').each(function () {

                        if ($(this).is('input')) {
                            if (true === $this.options.neck_filters.use_auto_send) {
                                $(this).on('keyup', delay(function (e) {
                                    $this.executeModule("neck_filters");
                                }, $this.options.neck_filters.auto_send_timeout));

                            } else {
                                $this.error("Neck filters: the use_auto_send=false option is not implemented yet.");
                            }
                        } else {
                            // TODO: add select handler here...
                            $this.error("Neck filters: non input fields are not implemented yet.");
                        }
                    });


                    jNeckFilters.find('.oath-clear-btn').each(function () {
                        $(this).on('click', function () {
                            var jContainer = $(this).closest('.oath-filter-container');
                            if (jContainer.length) {
                                var jControl = jContainer.find('.oath-control');
                                $this.clearNeckFilterControl(jControl);
                                $this.executeModule("neck_filters");
                            } else {
                                $this.error("Neck filters: no ancestor with css class oath-filter-container found.");
                            }
                            return false;
                        });
                    });


                    jNeckFilters.find('.oath-clear-all-btn').on('click', function () {
                        var jContainer = $(this).closest('.oath-neck-filters');
                        if (jContainer.length) {
                            jContainer.find('.oath-control').each(function () {
                                $this.clearNeckFilterControl($(this));
                            });
                            $this.executeModule("neck_filters");
                        } else {
                            $this.error("Neck filters: the clear all button doesn't have an ancestor \"oath-neck-filters\".");
                        }
                        return false;
                    });

                }


                //----------------------------------------
                // PAGINATION
                //----------------------------------------
                var jPagination = this.getModuleContainer("pagination");
                if (jPagination) {
                    jPagination.on('click', '.oath-pagination-item', function () {
                        var disabledClass = $this.options.pagination.disabled_class;
                        if ($(this).hasClass(disabledClass)) {
                            return false;
                        }

                        var jNumberHolder = $(this).find('[data-page-number]');
                        if (0 === jNumberHolder.length) {
                            jNumberHolder = $(this);
                        }
                        var page = jNumberHolder.attr('data-page-number');
                        jPagination.find('[data-rtt-variable="page"]').attr('data-rtt-value', page);
                        $this.executeModule("pagination");
                        return false;
                    });
                }


                //----------------------------------------
                // NUMBER OF ITEMS PER PAGE
                //----------------------------------------
                var jNumberOfItemsPerPage = this.getModuleContainer("number_of_items_per_page");
                if (jNumberOfItemsPerPage) {
                    var jNippSelector = jNumberOfItemsPerPage.find(".oath-nipp-selector");
                    jNippSelector.on('change', function () {
                        $this.nippFlag = true;
                        $this.executeModule("pagination");
                        $this.nippFlag = false;
                        return false;
                    });
                }


                // this.postTags([]);
                /**
                 * I first execute the pagination module to be consistent with the gui,
                 * especially the number of items per page selector which might be out of sync if we had
                 * just called the postTags method.
                 */
                this.executeModule("pagination");

            },
            executeModule: function (moduleName) {
                var $this = this;


                /**
                 * Fix pagination inconsistencies first
                 */
                if (
                    true === $this.nippFlag &&
                    null !== this.nbTotalRows &&
                    "pagination" === moduleName) {
                    var jNumberOfItemsPerPage = this.getModuleContainer("number_of_items_per_page");
                    if (jNumberOfItemsPerPage) {
                        var newValue = jNumberOfItemsPerPage.find(".oath-nipp-selector").val();
                        var jPagination = this.getModuleContainer("pagination");
                        var currentPage = jPagination.find('[data-rtt-variable="page"]').attr('data-rtt-value');

                        var newOffset = parseInt(currentPage) * parseInt(newValue);
                        if (newOffset > this.nbTotalRows) {
                            /**
                             * I put this to 1, seems solid, but we could use another heuristic.
                             */
                            jPagination.find('[data-rtt-variable="page"]').attr('data-rtt-value', 1);
                        }
                    }
                }


                var realist = new RealistTagTransfer({
                    jContainer: this.jContainer
                });
                var allTags = realist.collectTags();
                var allTagsByGroup = this.groupTags(allTags);
                console.log(allTagsByGroup);

                var tags = [];

                var combineWith = [];
                var optionCombineWith = this.options[moduleName].combine_request_with;
                if ('*' === optionCombineWith) {
                    combineWith = [
                        'global_search',
                        'advanced_search',
                        'head_columns_sort',
                        'neck_filters',
                        'pagination',
                    ];
                } else {
                    combineWith = optionCombineWith.slice();
                    combineWith.push(moduleName);
                }


                //----------------------------------------
                // COLLECTING AND FILTERING THE TAGS VALUES FOR EVERY MODULE
                //----------------------------------------
                for (var i in combineWith) {
                    var module = combineWith[i];
                    if (module in allTagsByGroup) {
                        var moduleTags = allTagsByGroup[module];

                        var isPrimary = false;
                        if (-1 !== this.options.primary_group.indexOf(module)) {
                            isPrimary = true;
                        }

                        // let's filter module which send non atomic data
                        if ("global_search" === module) {
                            if (true === isPrimary) {
                                if (module !== moduleName) { // when the global search module is called, we don't filter the variables

                                    for (var j in moduleTags) {
                                        var variables = moduleTags[j]['variables'];
                                        for (var k in variables) {
                                            if (
                                                'expression' === variables[k]['name'] &&
                                                '' === variables[k]['value']
                                            ) {
                                                delete moduleTags[j];
                                            }

                                        }
                                    }
                                }
                            }
                        } else if ("advanced_search" === module) {
                            if (true === isPrimary) {
                                for (var j in moduleTags) {
                                    var variables = moduleTags[j]['variables'];
                                    for (var k in variables) {
                                        if (
                                            'operator_value' === variables[k]['name'] &&
                                            '' === variables[k]['value']
                                        ) {
                                            delete moduleTags[j];
                                        }
                                    }
                                }
                            }
                        } else if ("head_columns_sort" === module) {
                            for (var j in moduleTags) {
                                var variables = moduleTags[j]['variables'];
                                for (var k in variables) {
                                    if (
                                        'direction' === variables[k]['name'] &&
                                        'neutral' === variables[k]['value']
                                    ) {
                                        delete moduleTags[j];
                                    }

                                }
                            }
                        } else if ("neck_filters" === module) {
                            for (var j in moduleTags) {
                                var variables = moduleTags[j]['variables'];
                                for (var k in variables) {
                                    if (
                                        'operator_value' === variables[k]['name'] &&
                                        '' === variables[k]['value']
                                    ) {
                                        delete moduleTags[j];
                                    }

                                }
                            }
                        }


                        for (var j in moduleTags) {
                            tags.push(moduleTags[j]);
                        }

                    } else {
                        // maybe the dev don't use this module at all in his (makes more sense to me to use his than her from now on,
                        // as most dev are men, and men in general are by nature more of the dare-devil type, whereas women
                        // are specialized in life reproduction, and so coding is about testing, it's something that I
                        // associate more with man than woman, as the man tests for the woman) list.
                    }
                }


                this.postTags(tags);


            },
            postTags: function (tags) {


                var $this = this;

                this.options.on_request_before();


                $.post(this.options.service_url, {
                    ajax_handler_id: this.options.ajax_handler_id,
                    ajax_action_id: this.options.ajax_action_id,
                    request_id: this.options.request_id,
                    csrf_token: this.options.csrf_token,
                    tags: tags,

                }, function (data) {
                    var type = data.type;

                    var jDebug = $this.containers.debug_window;

                    if ('success' === type) {

                        var rows = data.rows;


                        if (jDebug) {
                            jDebug.empty();
                            jDebug.append('<p><b>SQL: </b>' + data.sql_query + '</p>');
                            var sMarkers = '<ul>';
                            for (var name in data.markers) {
                                sMarkers += '<li>' + name + ': ' + data.markers[name] + '</li>';
                            }
                            sMarkers += '</ul>';
                            jDebug.append('<p><b>Markers:</b></p>' + sMarkers);
                        }


                        // update the number_of_rows_info widget
                        var jNumberOfRowsInfo = $this.containers.number_of_rows_info;
                        if (jNumberOfRowsInfo) {
                            var jNbRows = jNumberOfRowsInfo.find('.nbri-total');
                            if (jNbRows.length) {
                                jNbRows.html(data.nb_total_rows);
                            }
                            var jFirst = jNumberOfRowsInfo.find('.nbri-current-first');
                            if (jFirst.length) {
                                var curPageFirst = data.current_page_first;
                                if (0 !== data.current_page_last) {
                                    curPageFirst += 1;
                                }
                                jFirst.html(curPageFirst);
                            }
                            var jLast = jNumberOfRowsInfo.find('.nbri-current-last');
                            if (jLast.length) {
                                jLast.html(data.current_page_last);
                            }
                        }


                        // update rows
                        var jRows = $this.jTable.find('tbody > tr');
                        var jNeckFilter = $this.containers.neck_filters;
                        jRows.each(function () {
                            if (jNeckFilter && false === jNeckFilter.is($(this))) {
                                $(this).remove();
                            }
                        });
                        $this.jTable.append($(rows));


                        // update pagination
                        $this.updatePagination(data);


                    } else if ('error' === type) {
                        $this.options.on_server_error(data.error);

                        if (jDebug) {
                            jDebug.empty();
                            jDebug.append('<p><b style="color: red">Error: </b>' + data.error + '</p>');
                        }

                    } else {
                        $this.error("Unexpected response type: " + type);
                    }
                }, "json").done(function () {
                    $this.options.on_request_after($this.jContainer);
                });

            },
            updatePagination: function (data) {

                var jPagination = this.containers.pagination;
                if (jPagination) {

                    var currentPage = parseInt(data.page);
                    var nbPages = data.nb_pages;
                    this.nbTotalRows = data.nb_total_rows;

                    var firstPage = 1;
                    var firstPageIsDisabled = false;
                    var prevPage = currentPage - 1;
                    if (prevPage < 1) {
                        prevPage = 1;
                    }
                    var prevPageIsDisabled = (currentPage < 2);
                    var nextPage = currentPage + 1;
                    if (nextPage > nbPages) {
                        nextPage = nbPages;
                    }
                    var nextPageIsDisabled = (currentPage === nbPages);
                    var lastPage = nbPages;
                    var lastPageIsDisabled = false;

                    var bandMaxWidth = this.options.pagination.max_width;
                    var disabledClass = this.options.pagination.disabled_class;
                    var activeClass = this.options.pagination.active_class;


                    // update special links first
                    this.updateSpecialPaginationLink(jPagination, "first", firstPage, firstPageIsDisabled, disabledClass);
                    this.updateSpecialPaginationLink(jPagination, "prev", prevPage, prevPageIsDisabled, disabledClass);
                    this.updateSpecialPaginationLink(jPagination, "next", nextPage, nextPageIsDisabled, disabledClass);
                    this.updateSpecialPaginationLink(jPagination, "last", lastPage, lastPageIsDisabled, disabledClass);


                    // now update the regular links
                    var jEls = jPagination.find('.oath-pagination-item-model');
                    var jFirst = jEls.first().clone();
                    jEls.first().after(jFirst);
                    jFirst.hide();
                    jEls.remove();

                    var jOldNew = jFirst.clone();
                    jFirst.after(jOldNew);
                    jOldNew.show();
                    var jRemove = jOldNew;


                    var jNew, jNewNumberHolder, jNewStatusHolder;

                    for (var i = 1; i <= nbPages; i++) {
                        jNew = jOldNew.clone();
                        jNewNumberHolder = jNew.find('.oath-number-holder');
                        if (0 === jNewNumberHolder.length) {
                            jNewNumberHolder = jNew;
                        }
                        jNew.attr('data-page-number', i);
                        jNewNumberHolder.html(i);

                        jNewStatusHolder = jNew.find('.oath-status-holder');
                        if (0 === jNewStatusHolder.length) {
                            jNewStatusHolder = jNew;
                        }
                        if (currentPage === i) {
                            jNewStatusHolder.addClass(activeClass);
                        } else {
                            jNewStatusHolder.removeClass(activeClass);
                        }
                        jOldNew.after(jNew);
                        jOldNew = jNew;
                    }
                    jRemove.remove();


                    /**
                     * Eventually update the page number, which might have change.
                     * This might happen for instance if you go on page 4 of a list, and then you change the number of items per page
                     * from 25 to 500.
                     * In that case, the page 4 might not exist anymore, and so the server would give us the real page,
                     * which we inject back into our gui for consistency.
                     *
                     */
                    jPagination.find('[data-rtt-variable="page"]').attr('data-rtt-value', currentPage);


                }
            },
            updateSpecialPaginationLink(jPagination, type, pageNumber, isDisabled, disabledClass) {
                var jStatusHolder = null;
                var jElement = jPagination.find('[data-type="' + type + '"]');
                if (jElement.length) {
                    jElement.attr('data-page-number', pageNumber);
                    jStatusHolder = jElement.find('.oath-status-holder');
                    if (0 === jStatusHolder.length) {
                        jStatusHolder = jElement;
                    }
                    if (true === isDisabled) {
                        jStatusHolder.addClass(disabledClass);
                    } else {
                        jStatusHolder.removeClass(disabledClass);
                    }
                }
            },
            clearNeckFilterControl: function (jControl) {
                if (jControl.is('input')) {
                    jControl.val("");
                } else {
                    this.error("Neck filters: clearing a non input control is not implemented yet (but it should be).");
                }
            },
            getModuleContainer: function (moduleName, throwEx = false) {
                var ret = this.containers[moduleName];
                if (ret) {
                    return ret;
                }
                if (true === throwEx) {
                    this.error("The module " + moduleName + " doesn't exist.");
                }
                return null;
            },
            resetAdvancedSearchForm: function () {
                var jSearch = this.containers.advanced_search;
                if (jSearch) {
                    jSearch.find('.input-operator-value').val("");
                }
            },
            resetGlobalSearchForm: function () {
                var jSearch = this.containers.global_search;
                if (jSearch) {
                    jSearch.find('input').val("");
                }
            },
            groupTags: function (tags) {
                var ret = {};
                for (var i in tags) {
                    var tag = tags[i];
                    if ("tag_group" in tag) {
                        var tagGroup = tag["tag_group"];
                        if (!(tagGroup in ret)) {
                            ret[tagGroup] = [];
                        }
                        ret[tagGroup].push(tag);
                    } else {
                        console.log(tag);
                        this.error("tag_group not found for the tag.");
                    }
                }
                return ret;
            },
            error: function (msg) {
                throw new Error("zzOpenAdminTableHelper error: " + msg);
            },
            onServerError: function (msg) {

            },
        };


        window.zzOpenAdminTableHelper._defaults = {
            service_url: '/ajax-handler',
            ajax_handler_id: 'Light_Realist',
            ajax_action_id: 'realist-request',
            request_id: 'none',
            csrf_token: 'your_csrf_token_value',
            use_spinkit_helper: true,
            table_selector: 'none',
            primary_group: [
                "global_search",
                "advanced_search",
            ],
            neck_filters_selector: '.oath-neck-filters',
            on_server_error: function (msg) {
                console.log("Error from the server: " + msg)
            },

            /**
             * Triggered just before a request is sent to the server.
             */
            on_request_before: function () {

            },
            on_request_after: function (jContainer) {

            },
            global_search: {
                combine_request_with: [
                    "head_columns_sort",
                    "neck_filters",
                ],
            },
            advanced_search: {
                combine_request_with: [
                    "head_columns_sort",
                    "neck_filters",
                ],
            },
            head_columns_sort: {
                combine_request_with: "*",
                /**
                 *
                 * Defines the order in which sort direction changes.
                 */
                rotation_order: [
                    "neutral",
                    "asc",
                    "desc",
                ],
                icon_hide_class: "d-none",
            },
            neck_filters: {
                combine_request_with: [
                    "global_search",
                    "advanced_search",
                ],
                use_auto_send: true,
                auto_send_timeout: 200,
            },
            pagination: {
                combine_request_with: "*",
                max_width: 10,
                disabled_class: "disabled",
                active_class: "active",
            },
        };
    })();
}