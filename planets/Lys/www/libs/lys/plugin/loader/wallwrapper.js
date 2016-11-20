/**
 * Adds a loader to the wall.
 *
 * Html Markup
 * ---------------
 *
 * <.lys .wall_container (.active) (+options)>
 *      <wall/>
 *      <.overlay>
 *          <.loader/>
 *      </>
 * </>
 *
 *
 * Note: The idea is that the wall container wraps the wall and have
 * the exact same dimensions.
 * The wall container is css positioned, so that the overlay can expand and give
 * the illusion of overlaying the whole wall, but only the wall.
 *
 * The loader is placed inside at the css implementor discretion.
 * Since this is a general mechanism (paradigm?) that applies to any element,
 * I would suggest creating different css stylesheets of it.
 *
 *
 * Note: the markup can be auto-generated from the wall if you set
 * the autoMarkup option to true, which is the default.
 *
 *
 * Note: the lys class on the .wall_container element is used to help prevent css conflicts.
 *
 *
 * Html markup options
 * ------------------------
 *
 * Some stylesheet might provide options.
 *
 *
 *
 *
 */
(function () {


    window.LysLoaderWallWrapper = function (options) {
        this.d = Lys.extend({
            jWall: null,
            /**
             * Whether or not to automatically build the necessary markup.
             * Default is true.
             */
            autoWrap: true,
            onNeedData: function (jWallContainer, id) {
                jWallContainer.addClass('active');
            },
            onDataReady: function (jWallContainer, id, data) {
                setTimeout(function () {
                    jWallContainer.removeClass('active');
                }, 1000);
            },
            onWrapAfter: function(jWallContainer, jWall){
                //jWall.after('<div class="overlay"><div class="loader"></div></div>');
            },
        }, options);

    };

    LysLoaderWallWrapper.prototype = {
        init: function (lys) {

            var zis = this;
            var jWall = this.d.jWall;
            
            if (true === this.d.autoWrap) {
                jWall.wrap('<div class="lys wall_container"></div>');
            }
            
            var jWallContainer = jWall.closest('.wall_container');

            if (true === this.d.autoWrap) {
                jWallContainer.css('position', 'relative');
            }
            
            this.d.onWrapAfter(jWallContainer, jWall);
            
            lys.on('needData', function(id){
                zis.d.onNeedData(jWallContainer, id);
            }, 50);
            
            lys.on('dataReady', function(id, data){
                zis.d.onDataReady(jWallContainer, id, data);
            }, 50);
        },
    };


})();