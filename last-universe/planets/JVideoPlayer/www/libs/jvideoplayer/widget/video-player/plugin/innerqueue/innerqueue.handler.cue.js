(function () {

    /**
     *
     * Definition
     * ---------------
     *
     * This object is an handler for the innerQueue plugin (plugin.innerqueue).
     * It allows us to attach subtitles to a given video.
     * 
     * 
     * 
     * 
     * Events
     * -------------
     * 
     * ### triggered
     * 
     * - createlayer: to create the cue layer
     *
     */

    window.pluginInnerQueueHandlerCue = function (options) {
        this.d = $.extend({
        }, options);
        this.vp = null;
    };

    pluginInnerQueueHandlerCue.prototype = {
        init: function (vp) {
            this.vp = vp;
            vp.createLayer('cue', 40, '');
        },
        fire: function(event){
            this.vp.lm.clearLayer('cue');
            var jCue = $('<div class="cue">' + formatText(event.text) + '</div>');
            this.vp.lm.getJLayer('cue').append(jCue);
            setTimeout(function () {
                jCue.remove();
            }, event.duration);
        },
    };


    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    function formatText(text) {
        return text.replace("\n", '<br>');
    }
})();
