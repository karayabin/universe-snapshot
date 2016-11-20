(function ($) {
    if ('undefined' === typeof window.itemSlider) {

        function devError(m) {
            console.log("jItemSlider: devError: " + m);
        }

        var inst = 0;

        //------------------------------------------------------------------------------/
        // TOOLS
        //------------------------------------------------------------------------------/
        function mod(n, m) {
            return ((n % m) + m) % m;
        }


        var defaults = {
            //------------------------------------------------------------------------------/
            // COMMON OPTIONS
            //------------------------------------------------------------------------------/
            /**
             * @param slider - jquery handle representing the slider mask.
             *
             * The slider mask should contain the slider content, which contains the items.
             *
             * <sliderMask>
             *     <sliderContent>
             *         <item/>
             *         <item/>
             *         ...
             *     </sliderContent>
             * </sliderMask>
             *
             */
            slider: null,
            /**
             * @param items - array containing the items info
             * All items should be generated right from the beginning (i.e. no ajax call or dynamic feeding).
             */
            items: [],
            /**
             * @param itemsDetect - callback
             * If you want to start with already drawn items, define this callback to convert
             * those static items into items data.
             *
             * The callback has the following signature:
             *
             *          map:itemInfo        function ( jHandle:jItem )
             *
             */
            itemsDetect: null,
            /**
             * @param renderItemCb - callback that renders an item given the item info
             *
             *              str:itemHtml      function ( map:item )
             *
             */
            renderItemCb: function (item) {

            },
            /**
             * @param nbItemsPerPage - callback, to sync the plugin with your css responsive design
             *
             *              int:nbItemsPerPage     function( )
             *
             * It returns the number of visible item on a page at any moment.
             */
            nbItemsPerPage: function () {
            },
            /**
             * @param alignMargin - string=none,
             *
             * How to handle the margin between the left boundary of the slider mask and the left boundary of the
             * first main item.
             *
             * none (default): no margin: both boundaries are perfectly aligned
             * full: full margin. the first item starts at a distance of a full margin
             * half: half margin. the first item starts at a distance of half the (item) margin
             *
             */
            alignMargin: "none",
            /**
             * @param animationLockTime, int=2000
             *
             * When the user clicks a left/right button, how many milliseconds to wait before those
             * buttons become functional again.
             * This is to avoid a user clicking repeatedly on the button.
             * Ideally you want to set this to the animation time (in your css).
             */
            animationLockTime: 2000,
            /**
             *
             * @param onLeftSlideAfter - callback executed after a left move
             *
             *
             * The boundaryValue argument.
             *
             * A flag to detect whether or not we are on the first page or last page in finite mode.
             *
             * boundaryValue value is set to 0 in infinite mode, and is irrelevant.
             * boundaryValue value is set to 0, 1, 2 or 3 in finite mode, and is relevant.
             *
             * 0: not on first page, not on last page
             * 1: first page
             * 2: last page
             * 3: first page AND last page
             *
             *
             *
             * @conception first page, last page flags
             */
            onLeftSlideAfter: function (boundaryValue) {
            },
            onRightSlideAfter: function (boundaryValue) {
            },
            /**
             * @param css - map
             * css classes used by this plugin
             */
            css: {
                sliderContent: "slider_content",
                item: "item",
                prev: "prev",
                next: "next",
                extra: "extra",
                main: "main",
                invisible: "invisible"
            },
            //------------------------------------------------------------------------------/
            // INFINITE RELATED OPTIONS
            //------------------------------------------------------------------------------/
            /**
             * @param infinite, bool=true
             * Whether to be in infinite mode or finite mode.
             *
             * In finite mode, one can not slide past a boundary item (left most or rightmost).
             */
            infinite: true,
            /**
             * @param openingSide - string=both,
             *
             * Only work in infinite mode
             * both|right
             * left is not implemented yet
             *
             * Whatever your option is, you can start the slide by clicking the left or right handle.
             * The only difference is that in "right" mode, the plugin adds the class "invisible" to
             * the previous extra item (the item just before the first item, see conception notes for more details),
             * which allows you to style it as visibility:hidden in your css, which in turn gives the illusion
             * that there is no element on the left when the plugin starts.
             *
             * See the infinite_slider_open_right example in the documentation demos.
             */
            openingSide: 'both'
        };


        window.itemSlider = function (options) {
            var theInst = inst++;
            this.offset = 0;
            this.sliderOffset = 0;
            this.itemToCopyIndex = 0;
            this.firstItemNotAligned = false;
            this.conf = $.extend(true, {}, defaults, options);
            if (!this.conf.slider instanceof jQuery) {
                devError("slider must be an instance of jQuery");
            }
            this.jSlider = this.conf.slider;
            this.jSliderContent = this.jSlider.find('.' + this.conf.css.sliderContent);
            this.isLocked = false;
            this.lastNumberOfItemsPerPage = this.nbItemsPerPage();

            if (0 === this.jSliderContent.length) {
                devError("slider content not found");
            }


            // define coordinates
            this.initSlider(theInst);

        };

        window.itemSlider.prototype = {

            //------------------------------------------------------------------------------/
            // API
            //------------------------------------------------------------------------------/
            /**
             * Moves the slider to the left;
             * unless you are in finite mode and there is no more items to show on the left.
             */
            moveLeft: function () {
                if (false === this.isLocked) {
                    this.isLocked = true;
                    var zis = this;


                    if (false === this.conf.infinite) {
                        if (0 === parseInt(this.getFirstMainItem().data('id'))) {
                            this.isLocked = false;
                            return;
                        }
                    }


                    /**
                     * Try to detect the situation where the first item wouldn't be aligned to the left
                     * @conception first item looses leftmost position
                     */
                    var zeroItemIndex = 0;
                    if (false === this.conf.infinite) {
                        zeroItemIndex = this.getFirstVisibleZeroItemIndex();
                        if (zeroItemIndex > 1) {
                            this.firstItemNotAligned = true;
                        }

                    }


                    var pageWidth = this.getPageWidth();
                    var nbItemsPerPage = this.nbItemsPerPage();
                    var nbItemsToRemove = null;


                    // append new items
                    if (false === this.firstItemNotAligned) {
                        var firstOffset = this.getFirstItemOffset();
                        var startOffset = firstOffset - 1;
                        this.paintPrevSlice(startOffset);
                    }
                    else {
                        var nbItemsToAdd = nbItemsPerPage + 1 - zeroItemIndex;
                        this.paintPrevSliceFiniteFix(nbItemsToAdd);
                        pageWidth = (pageWidth / nbItemsPerPage) * nbItemsToAdd;
                        var nbItemsTotal = this.jSliderContent.find('> .' + this.conf.css.item).length;
                        nbItemsToRemove = nbItemsTotal - (2 * nbItemsPerPage + 2);
                        if (nbItemsToRemove < 0) {
                            nbItemsToRemove = 0;
                        }
                        if (nbItemsToRemove > nbItemsPerPage) {
                            nbItemsToRemove = nbItemsPerPage;
                        }
                    }


                    // fix position
                    this.offset -= pageWidth;
                    this.repositionSlider(this.offset);

                    // remove obsolete (rightmost) items
                    this.cutRight(nbItemsToRemove);

                    this.firstItemNotAligned = false;

                    // rename items
                    this.renameItems();


                    // trick: remove invisible if any in infinite mode
                    if (true === this.conf.infinite) {
                        this.jSliderContent.find('> .' + this.conf.css.invisible).removeClass(this.conf.css.invisible);
                    }

                    // slide
                    this.sliderOffset += pageWidth;
                    this.moveSlider(this.sliderOffset);


                    setTimeout(function () {
                        zis.isLocked = false;
                        zis.alignByFirstItem(); // fix chrome imprecise positioning
                        zis.conf.onLeftSlideAfter(zis.getBoundaryValue());
                    }, this.conf.animationLockTime);

                }

            },

            /**
             * Moves the slider to the right;
             * unless you are in finite mode and there is no more items to show on the right.
             */
            moveRight: function () {
                if (false === this.isLocked) {
                    this.isLocked = true;
                    var zis = this;


                    if (false === this.conf.infinite) {
                        if (parseInt(this.getLastMainItem().data('id')) === this.getItemsLength() - 1) {
                            this.isLocked = false;
                            return;
                        }
                    }

                    // append new items
                    var lastOffset = this.getLastItemOffset();
                    var startOffset = lastOffset + 1;
                    this.paintNextSlice(startOffset);

                    // remove obsolete (leftmost) items
                    this.cutLeft();


                    // rename items
                    this.renameItems();


                    // slide
                    this.sliderOffset -= this.getPageWidth();
                    this.moveSlider(this.sliderOffset);


                    setTimeout(function () {
                        zis.isLocked = false;
                        zis.alignByFirstItem(); // fix chrome imprecise positioning 
                        zis.conf.onRightSlideAfter(zis.getBoundaryValue());
                    }, this.conf.animationLockTime);
                }
            },

            /**
             * get the first main item's jquery handle.
             * The first main item is the first fully visible item in the slider.
             * See conception notes for more details.
             */
            getFirstMainItem: function () {
                return this.getFirstMainItem();
            },


            /**
             * Get the current boundary value (see options.onLeftSlideAfter for more details on boundary value).
             * This allows you to show/hide the left/right handle when the plugin instantiates.
             */
            getBoundaryValue: function () {
                return this.getBoundaryValue();
            },
            //------------------------------------------------------------------------------/
            // INTERNAL
            //------------------------------------------------------------------------------/
            initSlider: function (theInst) {

                var zis = this;


                this.initialPaint();


                $(window).on('resize.itemSlider' + theInst, function () {

                    // fix case where slider items have been re-sized due to responsive css rules
                    var curNbItemsPerPage = zis.nbItemsPerPage();
                    if (zis.lastNumberOfItemsPerPage !== curNbItemsPerPage) {
                        zis.reforge(zis.lastNumberOfItemsPerPage, curNbItemsPerPage);
                    }
                    zis.lastNumberOfItemsPerPage = curNbItemsPerPage;
                    zis.alignByFirstItem();
                });
            },
            /**
             * return int
             */
            nbItemsPerPage: function () {
                return this.conf.nbItemsPerPage();
            },
            initialPaint: function () {

                var zis = this;
                var nbElsPerPage = this.nbItemsPerPage();


                // static input trick
                if (null !== this.conf.itemsDetect) {
                    // we collect all items, however,
                    // we just keep the main items visible (so that the user doesn't wait for them to be painted again),
                    // and will let the slider rebuild the others slices (prev, next, and extras)
                    this.jSliderContent.find('.' + zis.conf.css.item).each(function (i) {
                        zis.conf.items.push(zis.conf.itemsDetect($(this)));
                        if (i >= nbElsPerPage) {
                            $(this).remove();
                        }
                        else {
                            $(this).addClass(zis.conf.css.main);
                            $(this).attr("data-id", i);
                        }
                    });
                }


                var the_offset = 0; // start
                var length = this.getItemsLength();
                var i;


                if (true === this.conf.infinite) {

                    // paint first items (unless they were already drawn statically)
                    if (null === this.conf.itemsDetect) {
                        for (i = the_offset; i < nbElsPerPage; i++) {
                            this.paintItem(mod(i, length), this.conf.css.main);
                        }
                    }
                    else {
                        i = nbElsPerPage;
                    }

                    // paint extra item
                    this.paintItem(mod(i++, length), this.conf.css.extra);

                    // paint next slice
                    this.paintNextSlice(i);


                    // paint previous extra item
                    var start = length - 1;
                    var s = "";
                    if ('right' === this.conf.openingSide) {
                        s = " " + this.conf.css.invisible;
                    }
                    this.paintItem(mod(start--, length), this.conf.css.extra + s, false);

                    //paint previous items
                    this.paintPrevSlice(start);

                }
                else {
                    var c = 0;
                    // paint first items
                    if (null === this.conf.itemsDetect) {
                        for (i = the_offset; i < nbElsPerPage; i++) {
                            if (c < length) {
                                this.paintItem(i, this.conf.css.main);
                            }
                            c++;
                        }
                    }
                    else {
                        c = nbElsPerPage;
                    }

                    if (c < length) {
                        // paint extra item
                        this.paintItem(c++, this.conf.css.extra);
                    }

                    this.paintNextSlice(c);

                    // prepend invisible items to make calculations easier
                    this.paintItem(this.itemToCopyIndex, this.conf.css.extra + ' ' + this.conf.css.invisible, false);
                    for (i = 0; i < nbElsPerPage; i++) {
                        this.paintItem(this.itemToCopyIndex, this.conf.css.prev + ' ' + this.conf.css.invisible, false);
                    }
                }
                this.alignByFirstItem();
            },
            /**
             * Called:
             * - AFTER a reforge
             * - during a left/right move
             */
            renameItems: function () {


                var nbElsPerPage = this.nbItemsPerPage();
                var zis = this;
                var c = 0;
                var d = 0;
                this.jSliderContent.find('> .' + this.conf.css.item).each(function () {
                    $(this).removeClass(zis.conf.css.prev + " " + zis.conf.css.next + " " + zis.conf.css.extra + " " + zis.conf.css.main);
                    if (c < nbElsPerPage) {
                        $(this).addClass(zis.conf.css.prev);
                    }
                    else if (nbElsPerPage === c) {
                        $(this).addClass(zis.conf.css.extra);
                    }
                    else {
                        if (d < nbElsPerPage) {
                            $(this).addClass(zis.conf.css.main);
                        }
                        else if (nbElsPerPage === d) {
                            $(this).addClass(zis.conf.css.extra);
                        }
                        else {
                            $(this).addClass(zis.conf.css.next);
                        }
                        d++;
                    }
                    c++;
                });
            },
            cutLeft: function () {
                this.jSliderContent.find('> .' + this.conf.css.prev).remove();
                this.offset += this.getPageWidth();
                this.repositionSlider(this.offset);
            },
            cutRight: function (max) {
                if (null === max) {
                    this.jSliderContent.find('> .' + this.conf.css.next).remove();
                }
                else {
                    for (var i = 0; i < max; i++) {
                        this.jSliderContent.find('> .' + this.conf.css.next).last().remove();
                    }
                }
            },
            hasPrevious: function () {
                return (this.jSliderContent.find('> .' + this.conf.css.prev).length > 0);
            },
            getItemsLength: function () {
                return this.conf.items.length;
            },
            moveSlider: function (the_offset) {
                this.jSliderContent.css({
                    transform: "translate3d(" + the_offset + "px, 0px, 0px)"
                });
            },
            repositionSlider: function (the_offset) {
                this.jSliderContent.css({
                    left: the_offset + "px"
                });
            },
            paintItem: function (the_offset, extraClass, append) {
                var h = this.conf.renderItemCb(this.conf.items[the_offset]);
                h = $(h);
                h.attr('data-id', the_offset);
                h.addClass(extraClass);
                if (false === append) {
                    this.jSliderContent.prepend(h);
                }
                else {
                    this.jSliderContent.append(h);
                }

            },
            getFirstMainItem: function () {
                /**
                 * @conception: first item looses leftmost position
                 */
                return this.jSliderContent.find('> .' + this.conf.css.main).first();
            },
            getFirstVisibleZeroItemIndex: function () {
                return this.jSliderContent.find('> .' + this.conf.css.item + '[data-id=0]').not('.' + this.conf.css.invisible).index();
            },
            getLastMainItem: function () {
                return this.jSliderContent.find('> .' + this.conf.css.main).last();
            },
            getLastItemOffset: function () {
                return this.jSliderContent.find('> .' + this.conf.css.item).last().data('id');
            },
            getFirstItemOffset: function () {
                return this.jSliderContent.find('> .' + this.conf.css.item).first().data('id');
            },
            getPageWidth: function () {
                /**
                 * with proper css, should be equivalent to Math.ceil(jSlider.outerWidth())
                 */
                return Math.ceil(this.nbItemsPerPage() * this.getFirstMainItem().outerWidth(true));
            },
            alignByFirstItem: function () {

                // adjusting slider position
                // align the first item with the mask content
                var jMain = this.getFirstMainItem();
                var itemWidth = jMain.outerWidth(true);
                var margin = itemWidth - jMain.outerWidth();
                this.offset = jMain.position().left; // "perfectly" aligned
                this.offset += this.sliderOffset;


                switch (this.conf.alignMargin) {
                    case "none":
                        break;
                    case "full":
                        this.offset -= margin;
                        break;
                    case "half":
                        this.offset -= margin / 2;
                        break;
                    default:
                        break;
                }
                this.offset = -this.offset;
                this.repositionSlider(this.offset);
            },
            paintNextSlice: function (startOffset) {
                var max, j;
                var length = this.getItemsLength();
                if (true === this.conf.infinite) {
                    startOffset = mod(startOffset, length);
                    max = startOffset + this.nbItemsPerPage();
                    for (j = startOffset; j < max; j++) {
                        this.paintItem(mod(j, length), this.conf.css.next);
                    }
                }
                else {
                    if (startOffset < length) {
                        // paint next slice
                        max = startOffset + this.nbItemsPerPage();
                        for (j = startOffset; j < max; j++) {
                            if (j < length) {
                                this.paintItem(j, this.conf.css.next);
                            }
                        }
                    }
                }
            },
            paintPrevSlice: function (startOffset) {
                var end = startOffset - this.nbItemsPerPage();
                var i;
                if (true === this.conf.infinite) {
                    for (i = startOffset; i > end; i--) {
                        this.paintItem(mod(i, this.getItemsLength()), this.conf.css.prev, false);
                    }
                }
                else {
                    for (i = startOffset; i > end; i--) {
                        if (i >= 0) {
                            this.paintItem(i, this.conf.css.prev, false);
                        }
                        else {
                            this.paintItem(0, this.conf.css.prev + " " + this.conf.css.invisible, false);
                        }
                    }
                }
            },
            paintPrevSliceFiniteFix: function (nbItemsToAdd) {
                for (var i = nbItemsToAdd; i > 0; i--) {
                    this.paintItem(0, this.conf.css.prev + " " + this.conf.css.invisible, false);
                }
            },
            /**
             * With responsive design, your nb of items per page can change.
             * For instance, you can have a 25% width item for 800px+ page width,
             * and 20% width item for page width < 800px.
             *
             * This method basically redraw a "stabilized slider" to ensure consistency.
             * See docs conception for more info
             *
             */
            reforge: function (oldNbItemsPerPage, newNbItemsPerPage) {
                var _hasPrevious = this.hasPrevious();
                var delta = newNbItemsPerPage - oldNbItemsPerPage;
                if (0 !== delta) {
                    var length = this.getItemsLength();
                    var i;

                    // the number of items has been raised
                    if (delta > 0) {
                        var firstOffset = this.getFirstItemOffset();
                        var lastOffset = this.getLastItemOffset();

                        if (true === _hasPrevious) {
                            var startOffset = firstOffset - 1;
                            var end = startOffset - delta;
                            var hasInvisible = this.jSliderContent.find('> .' + this.conf.css.item).first().hasClass(this.conf.css.invisible);
                            if (true === hasInvisible && false === this.conf.infinite) {
                                for (i = startOffset; i > end; i--) {
                                    this.paintItem(this.itemToCopyIndex, this.conf.css.prev + " " + this.conf.css.invisible, false);
                                }
                            }
                            else {
                                if (false === this.conf.infinite) {
                                    for (i = startOffset; i > end; i--) {
                                        if (i >= 0) {
                                            this.paintItem(i, this.conf.css.prev, false);
                                        }
                                    }
                                }
                                else {
                                    for (i = startOffset; i > end; i--) {
                                        this.paintItem(mod(i, length), this.conf.css.prev, false);
                                    }
                                }
                            }
                        }


                        startOffset = lastOffset + 1;
                        var max = startOffset + (delta * 2);
                        if (false === this.conf.infinite) {
                            if (startOffset < length) {
                                for (i = startOffset; i < max; i++) {
                                    if (i < length) {
                                        this.paintItem(i, this.conf.css.next);
                                    }
                                }
                            }
                        }
                        else {
                            for (i = startOffset; i < max; i++) {
                                this.paintItem(mod(i, length), this.conf.css.next);
                            }
                        }
                    }
                    // the number of items has been diminished
                    else {
                        var n = -delta;

                        if (true === _hasPrevious) {
                            this.jSliderContent.find('> .' + this.conf.css.item).each(function () {
                                if (n > 0) {
                                    $(this).remove();
                                    n--;
                                }
                            });
                        }

                        n = -delta * 2;
                        var removeNext = true;

                        /**
                         * @conception reforge down can strip main
                         * we ensure that in finite mode, there is always some main visible items
                         */
                        if (false === this.conf.infinite) {
                            var nbMain = this.jSliderContent.find('> .' + this.conf.css.main).length;
                            if (nbMain <= n) {
                                removeNext = false;
                            }
                        }

                        if (true === removeNext) {
                            $(this.jSliderContent.find('> .' + this.conf.css.item).get().reverse()).each(function () {
                                if (n > 0) {
                                    $(this).remove();
                                    n--;
                                }
                            });
                        }
                    }

                    // rename 
                    this.renameItems();
                }
            },
            getBoundaryValue: function () {
                var ret = 0;
                if (false === this.conf.infinite) {
                    var jMain = this.getFirstMainItem();
                    if (0 === parseInt(jMain.data('id'))) {
                        ret++;
                    }
                    jMain = this.getLastMainItem();
                    var index = this.getItemsLength() - 1;
                    if (index === parseInt(jMain.data('id'))) {
                        ret += 2;
                    }
                }
                return ret;
            }
        };

    }
})(jQuery);