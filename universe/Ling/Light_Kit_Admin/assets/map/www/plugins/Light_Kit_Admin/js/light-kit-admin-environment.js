/**
 * Light Kit Admin Environment helper
 * ==============
 * 2019-09-26
 *
 */
if ('undefined' === typeof LightKitAdminEnvironment) {
    (function () {
        var $ = jQuery;


        //----------------------------------------
        //
        //----------------------------------------
        window.LightKitAdminEnvironment = {
            /**
             * Creates a toast.
             *
             * Note: this method requires a little preparation first:
             *
             * - a div with id=lka-toasts-zone and representing the zone in which to inject the toasts must exist
             *
             *
             *
             * @param title
             * @param body
             * @param type
             * One of: warning, info, success, error
             *
             */
            toast: function (title, body, type) {

                if ('info' === type) {
                    type = "primary";
                } else if ('error' === type) {
                    type = "danger";
                }


                var date = new Date();
                var minute = date.getMinutes();
                var hour = date.getHours();
                if (hour < 10) {
                    hour = '0' + hour;
                }
                if (minute < 10) {
                    minute = '0' + minute;
                }
                var time = hour + ':' + minute;


                var s = '<div class="toast fade show bg-light" data-autohide="false">\n' +
                    '        <div class="toast-header">\n' +
                    '            <i class="fas fa-square mr-2 text-' + type + '"></i>\n' +
                    '            <strong class="mr-auto">' + title + '</strong>\n' +
                    '            <small class="ml-3">' + time + '</small>\n' +
                    '            <button type="button" class="ml-2 mb-1 close toast-closer" data-dismiss="toast" aria-label="Close">\n' +
                    '                <span aria-hidden="true">×</span>\n' +
                    '            </button>\n' +
                    '        </div>\n' +
                    '        <div class="toast-body">\n' +
                    body +
                    '        </div>\n' +
                    '    </div>';

                var jToast = $(s);
                $('#lka-toasts-zone').append(jToast);

                /**
                 * I had problem closing the toast from inside a js function created with new Function (like eval),
                 * (i.e. inside Light_Kit_Admin-generate_random_rows.js for instance)
                 * so I decided to handle closing manually to ensure closing behaviour works correctly in all situations.
                 */
                jToast.find('.toast-closer').on('click', function () {
                    jToast.toast('dispose');
                    jToast.remove();
                });

                return jToast;
            },
            /**
             * Triggers the download (in the browser) of the file which content and filename are given.
             *
             * The given content can be one of:
             *
             * - dataUrl        (the data url format, as defined in https://tools.ietf.org/html/rfc2397)
             * - fileContent    (the file content directly)
             *
             *
             * I recommend the dataUrl technique, which I found more reliable.
             * I had problems with xls files with the fileContent technique, and it worked fine with the dataUrl technique.
             *
             *
             *
             * @param content
             * @param filename
             * @param contentType
             */
            triggerDownload: function (content, filename, contentType) {
                var options = {};
                if (contentType) {
                    options.type = contentType;
                }


                var link = document.createElement('a');
                if ('string' === typeof content && 0 === content.indexOf('data:')) {
                    link.href = content;
                } else {
                    var blob = new Blob([content], options);
                    link.href = window.URL.createObjectURL(blob);
                }

                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function (msg) {
                throw new Error("LightKitAdminEnvironment error: " + msg);
            }
        };

        //----------------------------------------
        //
        //----------------------------------------
        window.LightKitAdminEnvironment._defaults = {};
    })();
}