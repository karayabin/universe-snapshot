(function () {
    if ('undefined' !== typeof window.colis) {


        var selector = window.colisClasses.selector;
        var colis = window.colis;
        var uploader = window.colisClasses.uploader;
        //var preview = window.colisClasses.preview;


        var _ = function (m) {
            return window.colisDictionnary[m];
        };


        colis.prototype.buildTemplate = function (jInput) {
            jInput.wrap('<div class="colis_wrapper"><div class="colis_selector_wrapper"><div class="input-group"></div></div></div>');
            var jWrapper = jInput.parent().parent().parent();
            return jWrapper;
        };
        colis.prototype.userError = function (msg) {
            bootbox.alert({
                message: msg,
                buttons: {
                    ok: {
                       className: "btn-warning" 
                    }
                }
            });
        };


        selector.prototype.buildTemplate = function (jInput) {
            jInput.addClass("typeahead");
            this.jUpdator = $('' +
                '<span class="input-group-btn">' +
                '<button type="button" class="colis_selector_updator btn btn-default">' + _("Refresh") + '</button>' +
                '</span>'
            );
            jInput.after(this.jUpdator);
        };

        uploader.prototype.buildTemplate = function (jWrapper) {
            var jDropZone = $(
                '<div class="colis_dropzone">' +
                    //
                '<div class="colis_dropzone_message">' +
                '<span class="colis_filename"></span>' +
                '&nbsp;&nbsp;' +
                '<span class="colis_percent"></span>' +
                '</div>' +
                    //
                '<progress class="colis_progress" max="100" value="0"></progress>' +
                    //
                '<div class="colis_dropzone_message">' +
                '<button class="colis_cancel_upload">' + _("Halt") + '</button>' +
                '<button class="colis_resume_upload">' + _("Resume") + '</button>' +
                '<button class="colis_remove_upload">' + _("Remove") + '</button>' +
                '</div>' +
                    //
                '<div class="colis_dropzone_message">' + _("Drop files here to upload") + '</div>' +
                    //
                '</div>'
            );
            jWrapper.append(jDropZone);
            jWrapper.append('<div class="colis_browse_container">' +
            '<button class="btn btn-default colis_browse">' + _("Browse") + '</button>' +
            '</div>');

            this.jDropZone = jDropZone;
            this.jBrowse = $('.colis_browse', jWrapper);

        };
    }
})();