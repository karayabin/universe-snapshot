/**
 * Here nav helper is a little helper for here plugin that 
 * allows you to scroll to the next/prev timeline page.
 * 
 * A timeline page is the current timeline as you see it in the current 
 * viewport.
 * 
 * 
 */
function hereNav(options) {
    var d = $.extend({
        //------------------------------------------------------------------------------/
        // REQUIRED
        //------------------------------------------------------------------------------/
        /**
         * jquery handle to the element representing the timeline outer.
         */
        jTimelineOuter: null,
        /**
         * Instance of the here plugin
         */
        oHere: null
    }, options);
    var pageWidth, pageDuration;
    var jTimelineOuter = d.jTimelineOuter;
    var oHere = d.oHere;
    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    function pixelsToSecond(nbPixels, ratio) {
        return parseInt(nbPixels) / ratio;
    }
    function getPageDuration() {
        pageWidth = jTimelineOuter.width();
        return pixelsToSecond(pageWidth, oHere.getRatio());
    }
    //------------------------------------------------------------------------------/
    // PUBLIC
    //------------------------------------------------------------------------------/
    /**
     * Scoll to the previous page
     * by moving the timeline inner inside the timeline outer.
     * The size of the page is the size of the timeline outer container.
     */
    this.gotoPrevPage = function () {
        var curOffset = oHere.getCurrentOffset();
        pageDuration = getPageDuration();
        if (curOffset - pageDuration >= 0) {
            oHere.moveTo(curOffset - pageDuration);
        }
    };
    /**
     * Scoll to the next page
     * by moving the timeline inner inside the timeline outer.
     * The size of the page is the size of the timeline outer container.
     */
    this.gotoNextPage = function () {
        var maxOffset = oHere.getTimelineDuration();
        var curOffset = oHere.getCurrentOffset();
        pageDuration = getPageDuration();
        if (curOffset + pageDuration <= maxOffset) {
            oHere.moveTo(curOffset + pageDuration);
        }
    };
}