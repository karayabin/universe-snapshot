if ('undefined' === typeof window.urlWithDropZone) {


    Dropzone.autoDiscover = false;


    window.urlWithDropZone = function (options) {

        function error(msg) {
            alert("urlWithDropZone error: " + msg);
        }

        options = $.extend({
            url: null,
            jInput: null,
            jDropZone: null,
            dropZoneParams: {},
            onInputChange: null
        }, options);


        if (
            null !== options.url &&
            null !== options.jInput &&
            null !== options.jDropZone
        ) {

            var jInput = options.jInput;
            var jDropZone = options.jDropZone;
            var onInputChange = function () {
                if (null !== options.onInputChange) {
                    options.onInputChange(jInput.val(), jInput, jDropZone);
                }
            };


            jInput
                //.on('paste.uwdz', function () {
                //    setTimeout(function () {
                //        onInputChange();
                //    }, 100);
                //})
                .on('keydown.uwdz', function () {
                    clearTimeout($.data(this, 'timer'));
                    $(this).data('timer', setTimeout(onInputChange, 500));
                });


            var dzParams = $.extend({
                url: options.url,
                paramName: "file",
                dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
                maxFilesize: 1, // MB
                addRemoveLinks: true
            }, options.dropZoneParams);


            dzParams.init = function () {
                this.on("addedfile", function (file) {
                    jInput.val(file.name);
                });
                this.on("success", function (file) {
                    //console.log("success");
                });
            };

            // Removable thumbnails
            jDropZone.dropzone(dzParams);


        }
        else {
            error("Bad configuration, missing either url, jInput or jDropZone");
        }
    };
}
