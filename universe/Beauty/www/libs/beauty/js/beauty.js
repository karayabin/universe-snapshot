/**
 * @dependencies
 *      - jquery 2.1.4
 */

if ('undefined' === typeof window.beauty) {

    (function () {

        jQuery.fn.beautyHighlight = function () {
            $(this).each(function () {
                var el = $(this);
                el.before("<div/>")
                el.prev()
                    .width(el.width())
                    .height(el.height())
                    .css({
                        "position": "absolute",
                        "background-color": "#ffff99",
                        "opacity": ".9"
                    })
                    .fadeOut(2000);
            });
        };


        var isArray = function (mixed) {
            if (Object.prototype.toString.call(mixed) === '[object Array]') {
                return true;
            }
            return false;
        };
        var isArrayOrObject = function (mixed) {
            if (-1 !== jQuery.inArray(Object.prototype.toString.call(mixed), ['[object Array]', '[object Object]'])) {
                return true;
            }
            return false;
        };

        function devError(msg) {
            throw new Error("Beauty: " + msg);
        }


        window.beauty = function (params) {

            params = $.extend({
                tests: {},
                /**
                 * If a test is pending, then beauty will retry $pendingMaxRetry times, with
                 * a delay of $pendingRetryDelay milliseconds before each retry.
                 * The initial call is not considered as a retry.
                 */
                pendingMaxRetry: 10,
                pendingRetryDelay: 2000,
                /**
                 * When a test can execute correctly,
                 * it's summarized as a success or failure.
                 * The flags below indicate whether or not skip and notApplicable flags
                 * are considered success or failure.
                 */
                skipIsSuccess: true,
                notApplicableIsSuccess: true

            }, params);

            var jContainer = null;

            /**
             * Note: this method works fine, but only with servers on a same domain.
             * See loadTemplateWithJsonP if you're using servers on different domains.
             *
             *
             * tplId is the name of a folder located in the [beauty]/$version/tpl directory.
             *
             * User shouldn't use loadTemplate more than once per tplId,
             * because there is no mechanism that prevents from adding the same style sheet multiple times yet.
             */
            this.loadTemplate = function (tplId, jContainer, callback) {
                var end = "/js/beauty.js";
                var src = $('script[src$="' + end + '"]').attr('src');
                var tplDir = src.substr(0, src.length - end.length);
                var tplUrl = tplDir + '/tpl/' + tplId + '/skeleton.html';
                var cssUrl = tplDir + '/tpl/' + tplId + '/style.css';
                $('head').append($('<link rel="stylesheet" type="text/css" />').attr('href', cssUrl));
                $.get(tplUrl, {}, function (data) {
                    jContainer.html(data);
                    callback();
                });
            };


            this.loadTemplateWithJsonP = function (tplId, jContainer, callback) {
                var end = "/js/beauty.js";
                var src = $('script[src$="' + end + '"]').attr('src');
                var beautyUrl = src.substr(0, src.length - end.length);
                var jsonServerUrl = beautyUrl + '/server/fetch-template.php?tpl=' + tplId + '&callback=?';
                $.getJSON(jsonServerUrl, function (d) {
                    $('head').append($('<link rel="stylesheet" type="text/css" />').attr('href', d.cssUrl));
                    jContainer.html(d.htmlContent);
                    callback();
                });
            };


            this.start = function ($jContainer) {
                jContainer = $jContainer;
                if (false === jContainer.hasClass("beauty-gui")) {
                    jContainer = jContainer.find('.beauty-gui:first');
                    if (0 === jContainer.length) {
                        devError("container must be/contain an element with cssClass beauty-gui");
                    }
                }

                var jSessionInfo = jContainer.find(".session-info:first");
                var jAllTestsContainer = jContainer.find(".all-tests-container:first");
                var jTplContainer = jContainer.find(".tpl-container:first");
                var jDetailItemTpl = $(".detail-item:first", jTplContainer);
                var jTestGroupItemTpl = $(".testgroup-item:first", jTplContainer);
                var jTestItemTpl = $(".test-item:first", jTplContainer);
                var oSession = new Session(jSessionInfo, jDetailItemTpl, params);


                createTestItems(params.tests, jAllTestsContainer, jAllTestsContainer, jTestItemTpl, jTestGroupItemTpl);
                initGroups(jContainer);


                jContainer.on('click', function (e) {
                    var jTarget = $(e.target);
                    //------------------------------------------------------------------------------/
                    // GROUP
                    //------------------------------------------------------------------------------/
                    if (jTarget.hasClass('play-group')) {
                        playGroupByGroupInner(jTarget, oSession);
                    }
                    else if (jTarget.hasClass('play-group-recursive')) {
                        playGroupByGroupInner(jTarget, oSession, true);
                    }
                    else if (jTarget.hasClass('fold')) {
                        closeGroupByInner(jTarget);
                    }
                    else if (jTarget.hasClass('fold-recursive')) {
                        closeGroupByInner(jTarget, true);
                    }
                    else if (jTarget.hasClass('unfold')) {
                        openGroupByInner(jTarget);
                    }
                    else if (jTarget.hasClass('unfold-recursive')) {
                        openGroupByInner(jTarget, true);
                    }
                    //------------------------------------------------------------------------------/
                    // TEST
                    //------------------------------------------------------------------------------/
                    else if (jTarget.hasClass('show-output')) {
                        showTestOutputByInner(jTarget);
                    }
                    else if (jTarget.hasClass('hide-output')) {
                        hideTestOutputByInner(jTarget);
                    }
                    else if (jTarget.hasClass('play-test')) {
                        var jTest = getTestByInner(jTarget);
                        oSession.refreshBoard(1, getTestUrl(jTest), jTest);
                        playTest(jTest, oSession);
                    }
                    else if (jTarget.hasClass('open-in-newtab')) {
                        var jTest = getTestByInner(jTarget);
                        openTestInNewTab(jTest);
                    }
                    //------------------------------------------------------------------------------/
                    // DETAILS
                    //------------------------------------------------------------------------------/
                    else if (jTarget.hasClass('show-details')) {
                        showSessionDetailsByInner(jTarget);
                    }
                    else if (jTarget.hasClass('hide-details')) {
                        hideSessionDetailsByInner(jTarget);
                    }
                    else if (jTarget.hasClass('show-detail-output')) {
                        importOutputByDetailItemInner(jTarget);
                        showDetailItemOutputByInner(jTarget);
                    }
                    else if (jTarget.hasClass('hide-detail-output')) {
                        hideDetailItemOutputByInner(jTarget);
                    }
                    else if (jTarget.hasClass('focus-tree')) {
                        focusTestByDetailItemInner(jTarget);
                    }
                    else if (jTarget.hasClass('detail-filter')) {
                        togglerFilterByInner(jTarget);
                    }
                    else if (jTarget.hasClass('info-focus')) {
                        focusObjectByInfoFocusInner(jTarget);
                    }
                    else if (jTarget.hasClass('open-newtab')) {
                        var jTest = getTestByDetailItem(getDetailItemByInner(jTarget));
                        openTestInNewTab(jTest);
                    }
                    return false;
                });

            };

            this.closeAllGroups = function () {
                closeAllGroups(jContainer);
            };

            this.openGroups = function (groups, recursive) {
                if (false === isArray(groups)) {
                    groups = [groups];
                }
                for (var i in groups) {
                    var path = groups[i];
                    var jGroup = findGroupByDotPath(jContainer, path);
                    if (jGroup) {
                        openParentGroupsByTestOrGroup(jGroup);
                        openGroupByInner(jGroup, recursive);
                    }
                }
            };

        };


        var Session = function (jSessionInfo, jDetailItemTpl, params) {

            var skipIsSuccess = params.skipIsSuccess;
            var notApplicableIsSuccess = params.notApplicableIsSuccess;
            var pendingMaxRetry = params.pendingMaxRetry;
            var pendingRetryDelay = params.pendingRetryDelay;

            var jInfo = $('.info:first', jSessionInfo);
            var jInfoFocus = $('.info-focus:first', jSessionInfo);

            var jNbPagesCurrent = $('.nb-pages-current:first', jSessionInfo);
            var jNbPagesTotal = $('.nb-pages-total:first', jSessionInfo);

            var jNbTotalTests = $('.nb-total-tests:first', jSessionInfo);
            var jNbSuccess = $('.nb-success:first', jSessionInfo);
            var jNbFailure = $('.nb-failure:first', jSessionInfo);
            var jNbError = $('.nb-error:first', jSessionInfo);
            var jNbSkip = $('.nb-skip:first', jSessionInfo);
            var jNbNotApplicable = $('.nb-not-applicable:first', jSessionInfo);
            var jNbPending = $('.nb-pending:first', jSessionInfo);
            var jNbUnknown = $('.nb-unknown:first', jSessionInfo);
            var jDetailsContainer = $('.details-container:first', jSessionInfo);
            var jDetailsContent = $('.details-content:first', jDetailsContainer);
            var jDetailsItemsContainer = $('.details-items-container:first', jDetailsContainer);


            this.getRetryInfo = function () {
                return [pendingMaxRetry, pendingRetryDelay];
            };

            this.refreshBoard = function (nbTotalPages, title, jFocusObject) {
                jInfo.html(title);
                jNbPagesTotal.html(nbTotalPages);
                jNbPagesCurrent.html(0);
                jNbTotalTests.html(0);
                jNbSuccess.html(0);
                jNbFailure.html(0);
                jNbError.html(0);
                jNbNotApplicable.html(0);
                jNbSkip.html(0);
                jNbPending.html(0);
                jNbUnknown.html(0);
                jDetailsItemsContainer.empty();
                jInfoFocus.data('jObj', jFocusObject);
            };

            /**
             * testInfo is the same object than the matchInfo (see refreshIframe method below)
             */
            this.updateSessionBoardByTestResults = function (testInfo) {

                var incTotal = parseInt(testInfo.s) + parseInt(testInfo.f)
                    + parseInt(testInfo.e) + parseInt(testInfo.sk) + parseInt(testInfo.na);

                incrementElement(jNbPagesCurrent, 1);
                incrementElement(jNbTotalTests, incTotal);
                incrementElement(jNbSuccess, testInfo.s);
                incrementElement(jNbFailure, testInfo.f);
                incrementElement(jNbError, testInfo.e);
                incrementElement(jNbNotApplicable, testInfo.na);
                incrementElement(jNbSkip, testInfo.sk);
            };


            this.incrementUnknown = function () {
                incrementElement(jNbPagesCurrent, 1);
                incrementElement(jNbTotalTests, 1);
                incrementElement(jNbUnknown, 1);
            };

            this.incrementPending = function () {
                incrementElement(jNbTotalTests, 1);
                incrementElement(jNbPending, 1);
            };
            this.decrementPending = function () {
                decrementElement(jNbTotalTests, 1);
                decrementElement(jNbPending, 1);
            };

            this.balancePending = function (type) {
                decrementElement(jNbPending, 1);
                if ('unknown' === type) {
                    // the pending state resolves to the unknown state, so we
                    // also need to increment the current number of pages
                    incrementElement(jNbUnknown, 1);
                    incrementElement(jNbPagesCurrent, 1);
                }
            };

            this.appendDetailItem = function (url, type, cssClass, jTest) {
                var jTpl = jDetailItemTpl.clone();
                jTpl.find('.url:first').html(url);
                jTpl.find('.result:first').html(type);
                jTpl.data('jTest', jTest);
                jTpl.addClass(cssClass);
                jDetailsItemsContainer.append(jTpl);
                return jTpl;
            };

            this.getTestCssClassByTestResults = function (testInfo) {
                if (
                    testInfo.e > 0 ||
                    testInfo.f > 0 ||
                    (testInfo.sk > 0 && false === skipIsSuccess) ||
                    (testInfo.na > 0 && false === notApplicableIsSuccess)
                ) {
                    return 'failure';
                }
                return 'success';
            };
        };


        function openTestInNewTab(jTest) {
            var url = getTestUrl(jTest);
            var win = window.open(url, '_blank');
            win.focus();
        }

        function findGroupByDotPath(jContainer, path) {
            var ret = jContainer.find('.testgroup-item[data-path=' + selectorEscape(path) + ']:first');
            if (ret.length) {
                return ret;
            }
            return false;
        }

        function selectorEscape(sExpression) {
            return sExpression.replace(/[!"#$%&'()*+,.\/:;<=>?@\[\\\]^`{|}~]/g, '\\$&');
        }


        /**
         * We define the group and test numbers,
         * and also assign a dotpath to every group
         */
        function initGroups(jContainer) {
            jContainer.find('.testgroup-item').each(function () {
                $('.nb-groups:first', $(this)).html(computeNbDirectGroupChildrenByGroupItem($(this)));
                $('.nb-tests:first', $(this)).html(computeNbDirectTestChildrenByGroupItem($(this)));
                $('.nb-total-tests:first', $(this)).html(computeNbTotalTestByGroupItem($(this)));
                var path = getZePathByGroup($(this));
                $(this).attr('data-path', path);
            });
        }

        function getZePathByGroup(jGroup) {
            var paths = [];
            paths.push(getGroupName(jGroup));
            jGroup.parents('.testgroup-item').each(function () {
                paths.push(getGroupName($(this)));
            });
            paths = paths.reverse();
            paths = paths.map(function (v) {
                return v.replace(/\//g, '\\/');
            });
            return paths.join('/');
        }

        function computeNbDirectGroupChildrenByGroupItem(jGroup) {
            return jGroup.find('.groups-container:first > .testgroup-item').length;
        }

        function computeNbDirectTestChildrenByGroupItem(jGroup) {
            return jGroup.find('.tests-container:first > .test-item').length;
        }

        function computeNbTotalTestByGroupItem(jGroup) {
            return jGroup.find('.test-item').length;
        }


        function focusObjectByInfoFocusInner(jInner) {
            var jFocus = jInner.closest('.info-focus');
            var jObj = jFocus.data('jObj');
            if (jObj.hasClass(".test-item")) {
                focusTestByDetailItemInner(jObj);
            }
            else {
                openParentGroupsByTestOrGroup(jObj);
                highlightElement(jObj);
            }
        }

        function togglerFilterByInner(jInner) {
            var jFilter = jInner.closest('.detail-filter');
            var cssClass = "";
            if (jFilter.hasClass("filter-success")) {
                cssClass = 'filter-success-on';
            }
            else if (jFilter.hasClass("filter-failure")) {
                cssClass = 'filter-failure-on';
            }
            else if (jFilter.hasClass("filter-pending")) {
                cssClass = 'filter-pending-on';
            }
            else if (jFilter.hasClass("filter-unknown")) {
                cssClass = 'filter-unknown-on';
            }
            else {
                devError("Unknown filter " + jFilter.attr('class'));
            }

            var jDetailsContainer = jFilter.closest(".details-container");
            if (jDetailsContainer.hasClass(cssClass)) {
                jDetailsContainer.removeClass(cssClass);
            }
            else {
                jDetailsContainer.addClass(cssClass);
            }
        }


        /**
         * Use this after pending state
         */
        function updateDetailItem(jDetailItem, type, cssClass) {
            jDetailItem.find('.result:first').html(type);
            jDetailItem.removeClass('success failure pending').addClass(cssClass);
        }

        function playTest(jTest, oSession, jPendingDetailItem) {
            var url = getTestUrl(jTest);
            var jOutput = getTestOutput(jTest);
            var title = url;
            refreshIframe(jOutput, url, function (type, match) {
                // update the session
                // - update the board
                // - create a new detail item
                if ('match' === type) {
                    oSession.updateSessionBoardByTestResults(match);
                    var s = 's: ' + match.s + ', ';
                    s += 'f: ' + match.f + ', ';
                    s += 'e: ' + match.e + ', ';
                    s += 'sk: ' + match.sk + ', ';
                    s += 'na: ' + match.na;
                    var cssClass = oSession.getTestCssClassByTestResults(match);
                    if (jPendingDetailItem) {
                        updateDetailItem(jPendingDetailItem, s, cssClass);
                        oSession.decrementPending();
                    }
                    else {
                        oSession.appendDetailItem(url, s, cssClass, jTest);
                    }
                }
                else if ('pending' === type) {
                    if (jPendingDetailItem) {
                        var pendingMaxRetry = parseInt(jPendingDetailItem.data("max"));
                        var pendingRetryDelay = jPendingDetailItem.data("delay");

                        if (pendingMaxRetry > 0) {
                            pendingMaxRetry--;
                            jPendingDetailItem.data("max", pendingMaxRetry);
                            setTimeout(function () {
                                playTest(jTest, oSession, jPendingDetailItem);
                            }, pendingRetryDelay);
                        }
                        else {
                            // same effect as unknown
                            oSession.balancePending('unknown');
                            updateDetailItem(jPendingDetailItem, 'unknown', 'unknown');
                        }
                    }
                    else {
                        // we've just discovered that the type is pending,
                        // we will replay the test again according to the instance params
                        oSession.incrementPending();
                        var jDetailItem = oSession.appendDetailItem(url, type, type, jTest);
                        var inf = oSession.getRetryInfo();
                        var pendingMaxRetry = parseInt(inf[0]);
                        var pendingRetryDelay = parseInt(inf[1]);
                        if (pendingMaxRetry > 0) {
                            pendingMaxRetry--;
                            jDetailItem.data("max", pendingMaxRetry);
                            jDetailItem.data("delay", pendingRetryDelay);
                            setTimeout(function () {
                                playTest(jTest, oSession, jDetailItem);
                            }, pendingRetryDelay);
                        }
                    }
                }
                else if ('unknown' === type) {
                    oSession.incrementUnknown();
                    if (jPendingDetailItem) {
                        updateDetailItem(jPendingDetailItem, type, type);
                        oSession.decrementPending();
                    }
                    else {
                        oSession.appendDetailItem(url, type, type, jTest);
                    }
                }
                else {
                    devError("Unknown type: " + type);
                }
            }, jPendingDetailItem);
        }


        function focusTestByDetailItemInner(jInner) {
            var jDetail = getDetailItemByInner(jInner);
            var jTest = getTestByDetailItem(jDetail);
            openParentGroupsByTestOrGroup(jTest);
            highlightElement(jTest);

        }

        function importOutputByDetailItemInner(jInner) {
            var jDetail = getDetailItemByInner(jInner);
            var jOut = jDetail.find(".details-output:first");
            var jTest = getTestByDetailItem(jDetail);
            var content = getTestIframeContent(jTest);
            /**
             * The goal here is to have an overview of what's going on, a snapshot if you will.
             * Not sure if that's a good idea though.
             * We don't want the script to interfere with the existing beauty gui,
             * so we remove them.
             *
             * The other workaround is to redraw the iframe, but in some cases
             * it can be a problem (for instance if the loading of the page triggers
             * some special events).
             *
             */
            var jContent = $('<div>' + content + '</div>');
            jContent.find('script').remove();
            jOut.empty().append(jContent);

        }

        function openParentGroupsByTestOrGroup(jObj) {
            jObj.parents('.testgroup-item').each(function () {
                $(this).removeClass('close');
            });
        }

        function highlightElement(jObj) {
            // scrolling to the item
            $('html, body').animate({
                scrollTop: jObj.offset().top
            }, 1000, function () {
                jObj.beautyHighlight();
            });
        }

        function showDetailItemOutputByInner(jInner) {
            getDetailItemByInner(jInner).addClass("showing-output");
        }

        function hideDetailItemOutputByInner(jInner) {
            getDetailItemByInner(jInner).removeClass("showing-output");
        }

        function getDetailItemByInner(jInner) {
            return jInner.closest('.detail-item');
        }

        function getTestByDetailItem(jDetailItem) {
            return jDetailItem.data('jTest');
        }

        function showSessionDetailsByInner(jInner) {
            jInner.closest('.details-container').removeClass('hiding-details').addClass('showing-details');
        }

        function hideSessionDetailsByInner(jInner) {
            jInner.closest('.details-container').addClass('hiding-details').removeClass('showing-details');
        }

        function incrementElement(jEl, number) {
            if ('undefined' === typeof number) {
                number = 1;
            }
            else {
                number = parseInt(number);
            }
            var cur = parseInt(jEl.html());
            if (isNaN(cur)) {
                cur = 0;
            }
            jEl.html(cur + number);
        }

        function decrementElement(jEl, number) {
            if ('undefined' === typeof number) {
                number = 1;
            }
            var n = parseInt(jEl.html()) - number;
            if (n < 0) {
                n = 0;
            }
            jEl.html(n);
        }


        /**
         * void  onSuccess ( type, matchInfo=null )
         *              type indicates the general type of the result, it can be one of:
         *                  - match, if the test results string pattern was recognized in the output.
         *                  - pending, if the pending string pattern was recognized in the output, and the match pattern wasn't
         *                  - unknown (default), in all other cases
         *
         *              If type is match, then matchInfo is an object with the following properties:
         *                      - s: int, the number of success
         *                      - f: int, the number of failure
         *                      - e: int, the number of error
         *                      - na: int, the number of not applicable
         *                      - sk: int, the number of skip
         *
         */
        function refreshIframe(jOutput, url, onSuccess, jPendingDetailItem) {
            var iframe = jOutput[0];

            if ('undefined' === typeof jPendingDetailItem) {
                iframe.onload = function () {
                    var output = $(this).contents().find('body').html();
                    iframeParseOutput(output, onSuccess);
                };
                iframe.src = url;
            }
            else {
                var output = $(iframe).contents().find('body').html();
                iframeParseOutput(output, onSuccess);
            }
        }


        function iframeParseOutput(output, onSuccess) {
            var pattern = '_BEAST_TEST_RESULTS:s=([0-9]+);f=([0-9]+);e=([0-9]+);na=([0-9]+);sk=([0-9]+)__';
            var oReg = new RegExp(pattern, 'gm');
            var match = oReg.exec(output);


            var matchInfo = null;
            var type = 'unknown';
            if (null !== match) {
                type = 'match';
                matchInfo = {
                    s: match[1],
                    f: match[2],
                    e: match[3],
                    na: match[4],
                    sk: match[5]
                };
            }
            else if (true === /_BEAST_TEST_NOT_FINISHED_RETRY_LATER__/m.test(output)) {
                type = 'pending';
            }
            onSuccess(type, matchInfo);
        }


        function playGroupByGroupInner(jInner, oSession, recursive) {
            var jGroup = getGroupByInner(jInner);
            var jTests = getTestsByGroupInner(jInner, recursive);
            oSession.refreshBoard(jTests.length, getGroupName(jGroup), jGroup);
            jTests.each(function () {
                playTest($(this), oSession);
            });
        }

        function getGroupName(jGroup) {
            return jGroup.find('.title:first').html();
        }

        function getTestUrl(jTest) {
            return jTest.find('.title:first').html();
        }

        function getTestOutput(jTest) {
            return jTest.find('.output:first');
        }

        function getTestIframeContent(jTest) {
            return getTestOutput(jTest).contents().find('body').html();

        }

        function hideTestOutputByInner(jInner) {
            getTestOutput(getTestByInner(jInner)).hide();
        }

        function showTestOutputByInner(jInner) {
            getTestOutput(getTestByInner(jInner)).show();
        }

        function getTestByInner(jInner) {
            return jInner.closest('.test-item');
        }


        function getTestsByGroupInner(jInner, recursive) {
            if (true === recursive) {
                return getGroupByInner(jInner).find('.test-item');
            }
            return getGroupByInner(jInner).find('.content:first > .tests-container:first > .test-item');
        }


        function getGroupByInner(jInner) {
            return jInner.closest(".testgroup-item");
        }

        function closeGroupByInner(jInner, recursive) {
            if (true === recursive) {
                getGroupsByInner(jInner).addClass('close');
            }
            else {
                getGroupByInner(jInner).addClass('close');
            }
        }

        function openGroupByInner(jInner, recursive) {
            if (true === recursive) {
                getGroupsByInner(jInner).removeClass('close');
            }
            else {
                getGroupByInner(jInner).removeClass('close');
            }
        }

        function getGroupsByInner(jInner) {
            var jGroup = getGroupByInner(jInner);
            return jGroup.add('.testgroup-item', jGroup);
        }

        function closeAllGroups(jContainer) {
            jContainer.find('.testgroup-item').addClass('close');
        }


        function createTestItems(tests, jTestContainer, jGroupContainer, jTestTpl, jTestGroupTpl) {
            for (var i in tests) {
                var test = tests[i];
                if (isArrayOrObject(test)) {
                    // create a group
                    var jGroup = jTestGroupTpl.clone();
                    jGroup.find('.title:first').html(i);
                    jGroupContainer.append(jGroup);
                    var jContent = $('.content:first', jGroup);
                    var jTestCont = $('.tests-container:first', jContent);
                    var jGroupCont = $('.groups-container:first', jContent);
                    createTestItems(test, jTestCont, jGroupCont, jTestTpl, jTestGroupTpl);
                }
                else {
                    // create a single test
                    var jTest = jTestTpl.clone();
                    jTest.find('.title:first').html(test);
                    jTestContainer.append(jTest);
                }
            }
        }

    })();
}