(function () {

    /**
     *
     * This plugins sets the elapsed time in the mantis' time info box,
     * next to the timeline.
     *
     *
     * Events
     * ============
     *
     * triggered
     * ----------------
     *
     * listened to
     * ----------------
     *
     * - timeupdate: update the info box of mantis
     *
     */

    window.pluginMantisTimeElapsed = function () {
    };

    pluginMantisTimeElapsed.prototype = {
        prepare: function (vp, mantis) {
            vp.on('timeupdate', function () {
                if (false === mantis.isPlayHeadDragging()) {
                    var time = vp.getCurrentVideo().getTime();
                    mantis.setInfoBoxText(durationToString(time));
                }
            });
        },
    };


    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    function durationToString(d) {
        var hours = parseInt(d / 3600) % 24;
        var minutes = parseInt(d / 60) % 60;
        var seconds = parseInt(d % 60);
        return (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    }
})();
