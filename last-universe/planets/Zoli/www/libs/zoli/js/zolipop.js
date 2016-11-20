(function ($) {


    var jOverlay;


    function getHighestZIndex() {
        var index_highest = 0;
        $("body > *").not(jOverlay).not('script').each(function () {
            var index_current = parseInt($(this).css("zIndex"), 10);
            if (index_current > index_highest) {
                index_highest = index_current;
            }
        });
        return index_highest;
    }

    window.zolipop = function (options) {
        var d, jPopup;
        var defaults = {
            //------------------------------------------------------------------------------/
            // REQUIRED
            //------------------------------------------------------------------------------/
            /**
             * The jquery handle to the element to pop up.
             */
            jPopup: null,
            //------------------------------------------------------------------------------/
            // OPTIONAL
            //------------------------------------------------------------------------------/
            /**
             * If true, a click on the overlay makes the popup disappear.
             */
            clickCloseOverlay: true,
            /**
             * The jquery selector for elements that close the popup.
             * The elements have to be inside the overlay in order for this to work.
             * If you want to make the popup close when you click on the overlay,
             * use the clickCloseOverlay option.
             */
            closeSelector: ".zolipop_close",
            /**
             * The background color of the overlay, or null to use as is.
             * Warning: if you use rgba, don't put a space between the "rgba" keyword
             * and the first opening bracket (it didn't work for me using jquery 2.1.4)
             */
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            /**
             * An array of plugins.
             * A plugin can hook with the zolipop plugin using a few methods:
             *
             * - init ( jPopup )
             *          The first need for this method was to implement the draggable behaviour.
             *
             * - preparePopup ( jPopup, openOptions )
             *          is called during the preparation of the popup,
             *          every time a popup is about to show up,
             *          and very early, before the popup is even appended to the overlay.
             *
             *          The first need for this method was for updating title, buttons on a popup
             *          of type dialog.
             *
             */
            plugins: []
        };


        d = $.extend({}, defaults, options);
        jPopup = $(d.jPopup);


        this.pop = function (openOptions) {
            openOptions = $.extend({
                //------------------------------------------------------------------------------/
                // OPTIONAL
                //------------------------------------------------------------------------------/
                /**
                 * If null, the width is not set programmatically (and you can style it with css).
                 * The expected value here is any value that jquery.css method will accept.
                 */
                width: null,
                /**
                 * If null, the height is not set programmatically (and you can style it with css).
                 * The expected value here is any value that jquery.css method will accept.
                 */
                height: null,
                /**
                 * If null, the popup will be positioned in the middle of the screen.
                 * In this case, the popup element will be absolute positioned (i.e. it will get the position: absolute attribute).
                 *
                 * Or you can provide a callback to position as you wish.
                 *
                 * Your callback should return an array of [width, height], in which case the values will be
                 *              passed to the jquery.css property.
                 *              Use null to skip one or both of the properties.
                 *              If you use one of those properties, the popup element will be absolute positioned.
                 *
                 *              Developer Note: it's easy to add marginLeft and marginTop argument behind the width and height...
                 *
                 *              You can also return null and handle the positioning yourself.
                 *
                 */
                position: null
            }, openOptions);

            showOverlay(openOptions);
            placePopup(openOptions);
        };


        /**
         * args must be an array []
         */
        function callPlugins(method, args) {
            for (var i in d.plugins) {
                if (method  in d.plugins[i]) {
                    d.plugins[i][method].apply(d.plugins[i][method], args);
                }
            }
        }

        function hideOverlay() {
            jOverlay.hide();
        }

        function showOverlay(openOptions) {

            /**
             * Ensure that the overlay is on top of other elements
             */
            var zIndex = getHighestZIndex();
            if (zIndex >= parseInt(jOverlay.css('zIndex'))) {
                jOverlay.css('zIndex', zIndex + 1);
            }


            /**
             * Customize the appearance a bit
             */
            if (null !== d.overlayColor) {
                jOverlay.css('backgroundColor', d.overlayColor);
            }


            /**
             * When do we close the popup?
             */
            jOverlay
                .off('click.zolipop')
                .on('click.zolipop', d.closeSelector, function () {
                    hideOverlay();
                    return false;
                });
            if (true === d.clickCloseOverlay) {
                jOverlay
                    .off('click.zolipop_overlay')
                    .on('click.zolipop_overlay', function (e) {
                        if ('zolipop_overlay' === $(e.target).attr('id')) {
                            hideOverlay();
                            return false;
                        }
                    })
                ;
            }

            jOverlay.show();
        }

        function placePopup(oo) {
            /**
             * Hide any existing overlay content.
             */
            jOverlay.find('> *').hide();


            /**
             * Now prepare the popup
             */
            callPlugins('preparePopup', [jPopup, oo]);
            jOverlay.append(jPopup);


            /**
             * Do we resize the popup programmatically?
             */
            if (null !== oo.width) {
                jPopup.css({width: oo.width});
            }
            if (null !== oo.height) {
                jPopup.css({height: oo.height});
            }

            /**
             * Before we can access the dimensions of the popup,
             * we need to display it (i.e. it doesn't work with display: none)
             */
            jPopup.show();


            /**
             * Now let's position the popup.
             */
            if (null === oo.position) {
                /**
                 * Auto-centering the popup
                 */
                function reposition() {
                    var w = jPopup.width();
                    var h = jPopup.height();
                    jPopup.css({
                        position: 'absolute',
                        left: '50%',
                        top: '50%',
                        marginLeft: '-' + w / 2 + 'px',
                        marginTop: '-' + h / 2 + 'px'
                    });
                }

                $(window)
                    .off('resize.zolipop_center')
                    .on('resize.zolipop_center', reposition);
                reposition();

            }
            else {

                var dims = oo.position();
                if (null !== dims) {
                    if (null !== dims[0]) {
                        jPopup.css({
                            position: 'absolute',
                            left: dims[0]
                        });
                    }
                    if (null !== dims[1]) {
                        jPopup.css({
                            position: 'absolute',
                            top: dims[1]
                        });
                    }
                }
            }


        }

        //------------------------------------------------------------------------------/
        // INIT
        //------------------------------------------------------------------------------/
        callPlugins('init', [jPopup]);

    };


    $(document).ready(function () {
        /**
         * Create overlay.
         * We use only one overlay for every zoliPops.
         * The overlay should be position absolute, with 100% height and width
         */
        jOverlay = $('#zolipop_overlay');
        if (0 === jOverlay.length) {
            jOverlay = $('<div id="zolipop_overlay"></div>');
            jOverlay.css({
                position: 'absolute',
                top: '0px',
                left: '0px',
                width: '100%',
                height: '100%',
                display: 'none',
                zIndex: 100,
                backgroundColor: 'rgba(0,0,0, 0.5)'
            });
            $('body').append(jOverlay);
        }
    });


})(jQuery);