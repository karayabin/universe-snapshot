/**
 * JimToolbox
 * ===========
 * 2021-04-15
 *
 *
 * This depends on jquery.
 *
 * The html markup of the toolbox is explained in the conception notes.
 *
 */
if ('undefined' === typeof JimToolbox) {
    (function () {
        var $ = jQuery;


        window.JimToolbox = {
            init: function (options) {

                options = $.extend({
                    context: null,
                    useToggleShortcut: true,
                    toggleShortcutKey: "t",
                    isVisible: false,
                    openId: null,
                }, options);


                var jToolbox = options.context;
                var useToggleShortcut = options.useToggleShortcut;
                var toggleShortcutKey = options.toggleShortcutKey;
                var isVisible = options.isVisible;
                var maxHeight = 454;
                var openId = options.openId;
                var itemMarginBottom = 7;
                var toggleSlideTopElementIndex = 1;
                var toggleSlideTopElementOffset = 0;
                var jToggleContainer = jToolbox.find('.toolbox-toggle-container');
                var jToggleContainerSlider = jToggleContainer.find('.toolbox-toggle-container-slider');
                var nbToggleItems = jToggleContainerSlider.find('.toolbox-toggle-item').length;
                var jToolboxContent = jToolbox.find('.toolbox-content');
                var aPanelIsOpened = false;


                function calculateToggleContainerInternalHeight() {
                    var total = 0;
                    var nbItems = 0;
                    jToggleContainer.find(".toolbox-toggle-item").each(function () {
                        total += $(this).outerHeight();
                        nbItems++;
                    });
                    if (nbItems > 1) {
                        total += (nbItems - 1) * itemMarginBottom;
                    }
                    return total;
                }


                function refreshArrows() {


                    toggleSlideTopElementOffset = getToggleSliderOffsetByIndex(toggleSlideTopElementIndex);


                    if (toggleSlideTopElementIndex > 1) {
                        jToolbox.find('.arrow-icon').show();
                        return;
                    }

                    var h = calculateToggleContainerInternalHeight();
                    if (h > maxHeight) {
                        jToolbox.find('.arrow-icon').show();
                    } else {
                        jToolbox.find('.arrow-icon').hide();
                    }
                }

                function slideToggleItem(arrowDirection) {

                    /**
                     * When we click the arrow down, we want to move the slider up by a distance which corresponds
                     * to the height of the topmost visible element (of the slider).
                     *
                     * When we click the arrow up, we want to move the slider down by a distance which corresponds
                     * to the height of the hidden element (if any) just above the topmost visible element.
                     *
                     *
                     *
                     */


                    /**
                     * Here we prevent the toggleSlideTopElementIndex to get a value greater than the max number of items,
                     * to ensure that there is at least one item shown in the slider.
                     */
                    if ('down' === arrowDirection && nbToggleItems === toggleSlideTopElementIndex) {
                        return;
                    }

                    /**
                     * Here we prevent the toggleSlideTopElementIndex to get below 1.
                     */
                    if ('up' === arrowDirection && 1 === toggleSlideTopElementIndex) {
                        return;
                    }

                    var targetElementIndex = toggleSlideTopElementIndex; // top element index starts at 1 (i.e. not 0)

                    if ('up' === arrowDirection) {
                        targetElementIndex -= 1;
                    }


                    var h = 0;
                    jToggleContainer.find('.toolbox-toggle-item').each(function (_index) {
                        if (targetElementIndex === (_index + 1)) {
                            h = $(this).outerHeight();
                            h += itemMarginBottom;
                        }
                    });


                    if (h > 0) {
                        if ('down' === arrowDirection) {
                            moveSlider(toggleSlideTopElementOffset + h);
                            toggleSlideTopElementIndex++;
                            toggleSlideTopElementOffset += h;
                        }
                        if ('up' === arrowDirection) {

                            moveSlider(toggleSlideTopElementOffset - h);
                            toggleSlideTopElementIndex--;
                            toggleSlideTopElementOffset -= h;
                        }
                    }

                }


                function getToggleSliderOffsetByIndex(index) {
                    var offset = 0;
                    jToggleContainer.find('.toolbox-toggle-item').each(function (_index) {
                        if ((_index + 1) < index) {
                            offset += $(this).outerHeight();
                            offset += itemMarginBottom;
                        }
                    });
                    return offset;
                }


                function moveSlider(distance) {
                    if (distance > 0) {
                        distance = "-" + distance;
                    }
                    jToggleContainerSlider.css("transform", 'translate(0px, ' + distance + 'px)');

                }

                function repositionToggleItems() {
                    var offset = getToggleSliderOffsetByIndex(toggleSlideTopElementIndex);
                    moveSlider(offset);
                }


                function disableTransition() {
                    jToggleContainerSlider.addClass('toolbox-notransition');

                    // https://stackoverflow.com/questions/11131875/what-is-the-cleanest-way-to-disable-css-transition-effects-temporarily
                    jToggleContainerSlider.offsetHeight; // Trigger a reflow, flushing the CSS changes
                }

                function enableTransition() {
                    jToggleContainerSlider.removeClass('toolbox-notransition');
                }


                function openPaneByTargetId(targetId) {
                    jToolboxContent.find(".toolbox-module").each(function () {
                        if (targetId === $(this).attr('data-id')) {
                            $(this).show();
                            aPanelIsOpened = true;
                        } else {
                            $(this).hide();
                        }
                    });
                    jToolbox.addClass('open');
                }


                function injectContent(jPane, content, title) {
                    var jBody = jPane.find('.toolbox-body');
                    jBody.empty();
                    jBody.html(content);

                    if ('undefined' !== typeof title) {
                        var jTitle = jPane.find('.toolbox-title-text');
                        if (0 === jTitle.length) {
                            throw new Error("The acp pane title container wasn't found (.toolbox-title-text)");
                        }
                        jTitle.html(title);
                    }
                }


                jToolbox.on('click.toolbox', function (e) {
                    var jTarget = $(e.target);
                    if (true === jTarget.hasClass("text-toggle-minus")) {

                        disableTransition();
                        jToolbox.find('.text-toggle-minus').hide();
                        jToolbox.find('.text-toggle-plus').show();
                        jToggleContainer.addClass("without-text");
                        refreshArrows();
                        repositionToggleItems();
                        return false;
                    } else if (true === jTarget.hasClass("text-toggle-plus")) {
                        disableTransition();
                        jToolbox.find('.text-toggle-plus').hide();
                        jToolbox.find('.text-toggle-minus').show();
                        jToggleContainer.removeClass("without-text");
                        refreshArrows();
                        repositionToggleItems();
                        return false;
                    } else if (true === jTarget.hasClass("arrow-icon-down")) {
                        enableTransition();
                        slideToggleItem('down');
                        return false;
                    } else if (true === jTarget.hasClass("arrow-icon-up")) {
                        enableTransition();
                        slideToggleItem('up');
                        return false;
                    }
                });


                jToolbox.on('click.toolbox', ".toolbox-toggle-item", function () {
                    var jTarget = $(this);

                    var targetId = jTarget.attr('data-target');
                    if ('undefined' !== typeof targetId) {
                        openPaneByTargetId(targetId);
                    } else {
                        var acpUrl = jTarget.attr('data-acp');
                        if ('undefined' !== acpUrl) {


                            var jPane = jToolboxContent.find(".toolbox-module[data-id=_acp]");
                            if (0 === jPane.length) {
                                throw new Error("The acp pane wasn't found.");
                            }
                            openPaneByTargetId('_acp');

                            var jBody = jPane.find('.toolbox-body');
                            if (0 === jBody.length) {
                                throw new Error("The body of the acp pane wasn't found (.toolbox-body).");
                            }

                            var jLoader = jPane.find('.toolbox-loader');
                            if (0 === jLoader.length) {
                                throw new Error("The acp pane loader wasn't found (.toolbox-loader).");
                            }


                            jLoader.show();


                            AcpHepHelper.post(acpUrl, {}, function (response) {
                                if (response.content) {
                                    injectContent(jPane, response.content, response.title);
                                } else {
                                    throw new Error("Invalid response: no content property found.");
                                }
                                jLoader.hide();

                            }, function (errorMsg, response) {
                                var title = response.title || "Error";
                                errorMsg = '<div class="toolbox-error-color">' + errorMsg + '</div>';
                                injectContent(jPane, errorMsg, title);
                                jLoader.hide();
                            });
                        }
                    }

                    return false;
                });


                jToolbox.on('click.toolbox', ".toolbox-close-btn", function () {
                    jToolbox.removeClass('open');
                    aPanelIsOpened = false;
                    return false;
                });


                if (true === useToggleShortcut) {

                    $("body").on('keypress.toolbox', function (e) {
                        if (toggleShortcutKey === e.key) {
                            if (true === aPanelIsOpened) {
                                jToolbox.removeClass('open');
                                aPanelIsOpened = false;
                            } else {
                                jToolbox.toggleClass("toolbox-close");
                            }
                        }
                    });
                }


                if (true === isVisible) {
                    jToolbox.removeClass("toolbox-close");
                }


                if (null !== openId) {
                    openPaneByTargetId(openId);
                }


                refreshArrows();


            },
        };

    })();
}