(function () {

    /**
     *
     * This plugins displays a back to link application.
     * 
     * In order to make this plugin work correctly, you need to include
     * the "plugin.mantis.backtoapp.css" css extension.
     *
     */

    window.pluginMantisBackToApp = function (options) {
        this.d = $.extend({
            text: "Back to application",
            click: function () {

            },
            jHost: null,
        }, options);
    };

    pluginMantisBackToApp.prototype = {
        prepare: function (vp, mantis) {

            var zis = this;

            var jLink = $('<a class="backtoapp jvp-icon-arrow-with-circle-left"><p>' + this.d.text + '</p></a>');
            this.d.jHost.prepend(jLink);
            jLink.on('click', function () {
                zis.d.click();
                return false;
            });


        },
    };


})();
