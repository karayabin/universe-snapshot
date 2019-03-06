//------------------------------------------------------------------------------/
// WATER AND BALL
//------------------------------------------------------------------------------/
/**
 * Use this if you want to scroll a wall element on its own.
 *
 *
 *
 * The ball falls from a wall, down to the water...
 * When the ball reaches the water, new data is fetched.
 *
 *
 * Setup
 * ----------
 *
 * The wall must have a (css) height, and it's overflow in y must be scroll.
 *
 *
 */
window.LysSensorWaterBall = function (options) {
    this.d = Lys.extend({
        /**
         * The (wall) element containing the items to append
         */
        jTarget: null,
        /**
         * The height (int in pixel) of the water at the bottom of your wall.
         * When the user scrolls down your wall, there is an imaginary ball that goes down;
         * if the ball reaches the water, then a request to the service is executed.
         * Therefore, with a very small height of water, the user needs to scroll more (nearly to the
         * very bottom of the page) to get the request executed.
         *
         * The default is 10
         *
         */
        waterHeight: 10,
        /**
         * Every time the needData event is sent, an autoincrementing number is passed as the id.
         * It is possible to prefix this autoincremented number with an arbitrary string using this option.
         *
         */
        cptPrefix: '',
        /**
         * How many microseconds minimum between two data fetches
         */
        minDelay: 200,

    }, options);
};


LysSensorWaterBall.prototype = {
    init: function (lys) {

        var zis = this;
        var jTarget = this.d.jTarget;
        var wallHeight = jTarget.height();

        var dataCpt = 0;
        var isBlocked = false;


        function tryFetch() {
            if (false === isBlocked) {
                var scrollDown = jTarget.scrollTop() + wallHeight;
                var triggerValue = jTarget.prop('scrollHeight') - zis.d.waterHeight;

                //screenDebug({
                //    targetScrollTop: jTarget.scrollTop(),
                //    wallHeight: wallHeight,
                //    scrollDown: scrollDown,
                //    targetScrollHeight: jTarget.prop('scrollHeight'),
                //    waterHeight: zis.d.waterHeight,
                //    triggerValue: triggerValue,
                //});

                if (scrollDown >= triggerValue) {
                    lys.trigger('needData', zis.d.cptPrefix + dataCpt);
                    isBlocked = true;
                    /**
                     * Note: with this blocking technique, it is assumed that the needData handler sets a timeout
                     * of at least 0 microseconds (a lorem fetcher without setTimeout would fail at least in chrome).
                     */
                }
            }
        }

        jTarget.on('mousewheel.lys_waterball DOMMouseScroll.lys_waterball', function (e) {
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