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
             * Makes an alcp call to the given url, and executes the success callback in case of a successful response.
             * This is more powerful than the regular alcpPost function, because it can handle the loader/spinner,
             * which should be displayed for any ajax request.
             *
             *
             * Available options are:
             *
             * - error, callable|null, triggered when the alcp response is of type error.
             * - before: callable, triggered before the request
             * - after: callable, triggered after the request, no matter which response type was returned
             * - loader: jqueryElement|null, the loader element to show/hide when the ajax request is fetched.
             *      This will only work with the default "before" and "after" callbacks.
             *      If you define the "before" and "after" callbacks, you need to handle the loader yourself.
             * - post: map={}, a map of extra arguments to pass as $_POST to the ajax request.
             *
             *
             *
             *
             * @param url
             * @param success
             * @param options
             * @returns {function(*=, *=): void}
             */
            alcpCall: function (url, success, options) {

                //----------------------------------------
                // OPTIONS
                //----------------------------------------
                if ('undefined' === typeof options) {
                    options = {};
                }
                var error = options.error || null;
                var loader = options.loader || null;
                var before = options.before || function () {
                    if (null !== loader) {
                        loader.removeClass('d-none'); // assuming the admin template uses bootstrap
                    }

                };
                var after = options.after || function () {
                    if (null !== loader) {
                        loader.addClass('d-none');
                    }
                };
                var postParams = options.post || {};




                //----------------------------------------
                // EXECUTION
                //----------------------------------------
                before();
                LightKitAdminEnvironment.alcpPost(url, postParams, success, error, {
                    after: after,
                });

            },

            alcpPost: function (url, data, successCallback, errorCallback, options) {
                if (
                    'undefined' === typeof errorCallback ||
                    null === errorCallback
                ) {
                    errorCallback = function (errMsg, response) {
                        LightKitAdminEnvironment.toast("Error", errMsg, "error");
                    };
                }
                window.AcpHepHelper.post(url, data, successCallback, errorCallback, options);
            },

            /**
             * Asks the user if he/she's sure to execute the action before executing it.
             *
             * Available options are:
             *
             * - title: the title of the modal. Defaults to null (no title)
             * - cancelText: the text to display for the cancel action. Defaults to "Cancel"
             * - okText: the text to display for the ok action. Defaults to "Ok"
             * - loader: bool = false. Whether to display a loader while the action is executing.
             *      If false, the modal will close directly as the user clicks the "Ok" button.
             *      If true, the modal will show a loader inside the modal when the user clicks the "Ok" button,
             *      and the developer needs to close the modal once the action is done.
             *
             *
             *
             *
             * @param text
             * @param callback
             * @param options
             * @returns {boolean}
             */
            confirmExecute: function (text, callback, options) {
                options = options || {};

                //----------------------------------------
                // vars
                //----------------------------------------
                var title = options.title || null;
                var cancelText = options.cancelText || 'Cancel';
                var okText = options.okText || 'Ok';
                var loadingText = options.loadingText || 'Loading...';
                var loader = options.loader || false;
                var modalId = 'lka-confirm-modal';
                var okId = 'lka-confirm-modal-ok-btn';
                var loaderId = 'lka-confirm-modal-loader-btn';


                //----------------------------------------
                //
                //----------------------------------------
                var header = '';
                if (null !== title) {
                    header = '' +
                        '      <div class="modal-header">\n' +
                        '        <h5 class="modal-title" id="exampleModalLabel">' + title + '</h5>\n' +
                        '        <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
                        '          <span aria-hidden="true">&times;</span>\n' +
                        '        </button>\n' +
                        '      </div>' +
                        '';
                }


                var s = '' +
                    '<div class="modal fade" id="' + modalId + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                    '  <div class="modal-dialog">\n' +
                    '    <div class="modal-content">\n' +
                    header +
                    '      <div class="modal-body">\n' +
                    text +
                    '        \n' +
                    '      </div>\n' +
                    '      <div class="modal-footer">\n' +
                    '        <button type="button" class="btn btn-secondary" data-dismiss="modal">' + cancelText + '</button>\n' +
                    '        <button id="' + okId + '" type="button" class="btn btn-primary">' + okText + '</button>\n' +
                    '        <button id="' + loaderId + '" class="d-none btn btn-primary" type="button" disabled>\n' +
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                    ' ' + loadingText +
                    '        </button>' +
                    '      </div>\n' +
                    '    </div>\n' +
                    '  </div>\n' +
                    '</div>' +
                    '';
                $('body').append(s);


                var jModal = $('#' + modalId);
                jModal.modal();
                jModal.on('hidden.bs.modal', function (e) {
                    jModal.remove();
                });
                var jOk = jModal.find('#' + okId);
                var jLoader = jModal.find('#' + loaderId);
                jOk.on('click', function () {

                    if (true === loader || "1" === loader) {
                        jOk.hide();
                        jLoader.removeClass("d-none");
                        callback({
                            onSuccessAfter: function () {
                                jModal.modal('hide');
                            },
                        });
                    } else {
                        callback();
                        jModal.modal('hide');
                    }
                    return false;
                });

                return false;
            },
            /**
             * Asks the user the question which text is given, and returns
             * whether the user clicked on ok or cancel.
             *
             * This is basically a proxy for the javascript window.confirm method.
             *
             *
             * @param text
             */
            confirm: function (text) {
                return window.confirm(text);
            },
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
            escapeHtml: function (text) {
                var map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };
                return text.replace(/[&<>"']/g, function (m) {
                    return map[m];
                });
            },
            error: function (msg) {
                throw new Error("LightKitAdminEnvironment error: " + msg);
            },
            /**
             * Creates a form on the fly, filled with the key2Values data, and post it (with method=POST)
             * to the given url.
             *
             */
            postForm: function (url, key2Values) {
                // from JPostForm planet
                window.postForm(key2Values, url);
            },
        };

        //----------------------------------------
        //
        //----------------------------------------
        window.LightKitAdminEnvironment._defaults = {};
    })();
}