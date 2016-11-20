//------------------------------------------------------------------------------/
// THRESHOLD
//------------------------------------------------------------------------------/
/**
 * This sensor triggers the data fetching based on the window's scrolling height (main scroll).
 *
 * The options let you specify at which percentage of the page do you want to trigger the data fetching.
 *
 *
 */
(function () {


    window.LysSensorThreshold = function (options) {

        this.d = $.extend({
            /**
             * The threshold (int), which represents the percentage of total available scrolling above
             * which (or equals to) the data are fetched.
             * The default is 100, which means that the user needs to reach the very bottom of the page
             * to fetch the data.
             */
            threshold: 100,
            /**
             * Every time the needData event is sent, an autoincrementing number is passed as the id.
             * It is possible to prefix this autoincremented number with an arbitrary string using this option.
             *
             */
            cptPrefix: '',
            /**
             * How many microseconds minimum between two data fetches
             */
            minDelay: 1000,
        }, options);
    };

    LysSensorThreshold.prototype = {
        init: function (lys) {

            /**
             * var to prevent annoying repeated scrolling triggering if the user does even scroll the window,
             * but since the scroll is below the threshold, it keeps firing.
             */
            var oldScrolledDistance = null;
            var zis = this;
            var dataCpt = 0;
            var isBlocked = false;


            function tryFetch() {
                if (false === isBlocked) {
                    var scrolledDistance = $(window).scrollTop();


                    if (null === oldScrolledDistance) {
                        oldScrolledDistance = scrolledDistance;
                    }
                    var maximumScrollableDistance = $(document).height() - $(window).height();
                    var threshold = maximumScrollableDistance * zis.d.threshold / 100;


                    //screenDebug({ // https://github.com/lingtalfi/ScreenDebug
                    //    scrolledDistance: scrolledDistance,
                    //    oldScrolledDistance: oldScrolledDistance,
                    //    maximumScrollableDistance: maximumScrollableDistance,
                    //    docHeight: $(document).height(),
                    //    windowHeight: $(window).height(),
                    //    threshold: threshold,
                    //    isBlocked: isBlocked,
                    //});


                    if (scrolledDistance >= threshold) {


                        // validate only scroll down moves (not scroll up moves)
                        if (oldScrolledDistance < scrolledDistance) {

                            oldScrolledDistance = scrolledDistance;

                            lys.trigger('needData', zis.d.cptPrefix + dataCpt);
                            isBlocked = true;
                            /**
                             * Note: with this blocking technique, it is assumed that the needData handler sets a timeout
                             * of at least 0 microseconds (a lorem fetcher without setTimeout would fail at least in chrome).
                             */
                        }
                        else{
                            oldScrolledDistance = 0; // reset for next time
                        }
                    }

                }
            }


            $(window)
                .off('scroll.lys_threshold mousewheel.lys_threshold DOMMouseScroll.lys_threshold')
                .on('scroll.lys_threshold mousewheel.lys_threshold DOMMouseScroll.lys_threshold', function () {
                    tryFetch();
                });


            lys.on('dataReady', function (id) {
                if (zis.d.cptPrefix + dataCpt === id) {
                    setTimeout(function () {
                        dataCpt++;
                        isBlocked = false;
                    }, zis.d.minDelay);
                }
            });

        },
    };


})();