(function () {

    /**
     *
     * This plugin sends inactivityOn and inactivityOff events,
     * so that the gui can respond to them.
     *
     *
     *
     * Events
     * ==========
     *
     *
     * triggered
     * --------------
     *
     * - inactivityOn: indicate that the gui is inactive
     * - inactivityOff: indicate that the gui is active
     *
     *
     *
     * listened to
     * --------------
     *
     * - inactivityOn: by default, add the inactivity css class to the host
     * - inactivityOff: by default, remove the inactivity css class from the host
     *
     *
     */
    window.pluginInactivity = function (options) {
        this.d = $.extend({
            /**
             * jquery handle of the whole gui surface
             */
            jHost: null,
            /**
             * The number of milliseconds after which the gui is
             * considered inactive.
             */
            threshold: 3000,
            /**
             * string|null
             * The css class to add to the host when the gui becomes inactive.
             * Set it to null if you don't want to use any class.
             */
            cssClass: 'inactivity',
        }, options);
    };

    pluginInactivity.prototype = {
        prepare: function (vp) {
            this.vp = vp;
            var zis = this;

            zis.isActive = true;

            var to = null;

            function restart() {
                clearTimeout(to);
                to = setTimeout(function () {
                    vp.trigger('inactivityOn');
                    zis.isActive = false;
                }, zis.d.threshold);
            }

            zis.d.jHost
                .off('mousemove.jvp_inactivity')
                .on('mousemove.jvp_inactivity', function () {
                    restart();
                    if (false === zis.isActive) {
                        zis.isActive = true;
                        vp.trigger('inactivityOff');
                    }
                });

            restart();


            if (this.d.cssClass) {
                vp.on('inactivityOn', function () {
                    zis.d.jHost.addClass(zis.d.cssClass);
                });
                vp.on('inactivityOff', function () {
                    zis.d.jHost.removeClass(zis.d.cssClass);
                });
            }

        },
    };

})();
