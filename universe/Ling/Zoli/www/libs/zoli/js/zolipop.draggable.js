(function ($) {

    var $dragging = null;

    window.zolipopDraggable = function (options) {

        /**
         * Imagine you want to drag a 300 x 250 red square.
         * The red square's left and top properties are being adjusted while you drag the mouse, but...
         * there is a problem...
         *
         * they are adjusted relatively to the mouse position, which is probably different than the
         * red square's top left corner.
         *
         * Worst case scenario, you clicked on the bottom right zone of the red square to perform
         * a drag; when you click on the right bottom zone, nothing happens, but the moment you start moving
         * the mouse, the red square's top left corner will be repositioned to your mouse position,
         * which is visually distracting.
         *
         * The offset fix below is an array containing the offsets (left, top) of the handle
         * compared to its parent dragged element. Applying those fixes gives a more steady movement to the drag.
         *
         */
        var offsetFix = [0, 0];
        var zis = this;
        var oldUserSelect = null;

        var d = $.extend({
            /**
             * Abstract:
             * To drag an element, you need an handle.
             * The dragged element and the handle might not always have a parent relationship.
             * When you start dragging the handle, the dragged element syncs with it until
             * you mouse up.
             *
             * Concrete:
             * In this case, the dragged element is always the jPopup element.
             * Also in this plugin in particular, the handle has to be INSIDE the jPopup element.
             *
             * The jquery selector to handle element(s).
             */
            handleSelector: '.zolipop_draggable_handle',
            /**
             * Using this callback, you might be able to implement a boundary system.
             * The callback takes the following arguments:
             *
             *      array:newPosition      callback ( int:mouseX, int:mouseY, int:jPopupX, int:jPopupY, jquery: jPopup )
             *
             *                                  The first four parameters all indicate a position relative to the document.
             *                                  The last parameter is the jquery handle of the dragged element.
             *
             *
             *                                  It returns an array containing the new left and
             *                                  top positions of the jPopup element.
             *                                  Those positions are any left and top values that the jquery.css method
             *                                  would accept.
             *
             *
             * There is a default callback that makes the jPopup element prisoner of the window.
             * To use it, use the string "default" (which is the default by the way).
             *
             *
             * The adjustPosition can take the following values:
             * - str: default, the default callback provided by me
             * - null: don't apply any adjustments
             * - callback: your own callback
             *
             */
            adjustPosition: 'default'
        }, options);


        this.restrictToWindow = function (mouseX, mouseY, elX, elY, jEl) {

            var w = jEl.width();
            var h = jEl.height();
            var docW = $(document).width();
            var docH = $(document).height();

            if (elX + w > docW) {
                elX = docW - w;
            }
            if (elX < 0) {
                elX = 0;
            }
            if (elY + h > docH) {
                elY = docH - h;
            }
            if (elY < 0) {
                elY = 0;
            }
            return [elX, elY];
        };

        this.init = function (jPopup) {

            if ('default' === d.adjustPosition) {
                d.adjustPosition = zis.restrictToWindow;
            }


            $(document.body).on("mousemove.zolipopDraggable", function (e) {
                if ($dragging) {
                    var elTop = e.pageY - offsetFix[1];
                    var elLeft = e.pageX - offsetFix[0];

                    if (null !== d.adjustPosition) {
                        var info = d.adjustPosition(e.pageX, e.pageY, elLeft, elTop, $dragging);
                        elLeft = info[0];
                        elTop = info[1];
                    }


                    $dragging.offset({
                        top: elTop,
                        left: elLeft
                    });
                }
            });


            $(document.body).on("mousedown.zolipopDraggable", d.handleSelector, function (e) {
                var handle = $(e.target);
                var validParent = handle.closest(jPopup);
                if (1 === validParent.length) {
                    offsetFix = [e.pageX - validParent.offset().left, e.pageY - validParent.offset().top];
                    $dragging = validParent;
                    oldUserSelect = $dragging.css('user-select');
                    $dragging.css({
                        '-moz-user-select': 'none',
                        '-khtml-user-select': 'none',
                        '-webkit-user-select': 'none',
                        'user-select': 'none'
                    });
                }
            });

            $(document.body).on("mouseup.zolipopDraggable", d.handleSelector, function (e) {

                /**
                 * reset the user's old select behaviour
                 */
                $dragging.css({
                    '-moz-user-select': oldUserSelect,
                    '-khtml-user-select': oldUserSelect,
                    '-webkit-user-select': oldUserSelect,
                    'user-select': oldUserSelect
                });
                $dragging = null;
            });
        };
    };


})(jQuery);

