/**
 * fileUploader plugin
 * ===========
 * 2020-01-10
 *
 * See the documentation https://github.com/lingtalfi/JFileUploader for more details.
 *
 *
 *
 * Compatibility report
 * -------
 *
 * Recap: This plugin will work on all major browsers except:
 * - ie9 and lower
 * - opera mini
 * - it might not work on Safari on iOS
 *
 *
 *
 * We use the following features:
 *
 * - File: All browsers except IE <= 9 and Opera mini (1)
 * - new FormData: all browsers, with question mark (unknown) for Safari on iOS (2)
 * - XMLHttpRequest: All browsers except IE <= 9 and Opera mini (1)
 *
 *
 * Sources:
 * - 1: caniuse.com
 * - 2: https://developer.mozilla.org/en-US/docs/Web/API/FormData
 *
 *
 */


//----------------------------------------
//
//----------------------------------------
(function () {
    if ('undefined' === typeof window.FileUploader) {


        //----------------------------------------
        // PRIVATE FUNCTIONS
        //----------------------------------------
        var cssIdCounters = {};
        var fileUrlCounter = 0;
        var anyFileCounter = 0;


        var addUrlParams = function (url, params) {
            var query = jQuery.param(params);
            if (-1 === url.indexOf("?")) {
                url += "?";
            } else {
                url += "&";
            }
            return url + query;
        };


        var csvToTags = function (csv) {
            return csv.split(', ');
        };

        var getFileBlob = function (url, cb, options) {


            url = addUrlParams(url, {
                meta: 1,
            });


            if ('undefined' !== typeof options) {
                var useFileEditor = options.useFileEditor || false;
            }


            var xhr = new XMLHttpRequest();
            xhr.open("GET", url);
            xhr.responseType = "blob";
            xhr.addEventListener('load', function () {
                var xhrResponse = xhr.response;
                var meta = {};

                if (true === useFileEditor) {
                    var is_private = xhr.getResponseHeader("fe_is_private");
                    var original_url = xhr.getResponseHeader("fe_original_url");
                    var tags = xhr.getResponseHeader("fe_tags");
                    var protocol = xhr.getResponseHeader("fe_protocol");
                    if (tags !== null) {
                        tags = csvToTags(tags);
                        meta.tags = tags;
                    }

                    if (null !== is_private) {
                        meta.is_private = is_private;
                    }

                    if (null !== protocol) {
                        meta.protocol = protocol;
                    }

                    if (null !== original_url) {
                        meta.original_url = original_url;
                    }

                }

                var content = xhr.getResponseHeader("Content-Disposition");
                if (content) {
                    content = content.split("=").pop().trim();
                    if ('"' === content.charAt(0)) {
                        content = content.slice(1, -1);
                    }
                    xhrResponse.filename = content;
                }
                cb(xhrResponse, meta);
            });
            xhr.send();
        };

        var blobToFile = function (blob, name, meta) {
            // https://stackoverflow.com/questions/27159179/how-to-convert-blob-to-file-in-javascript
            blob.lastModifiedDate = new Date();
            blob.name = name;

            for (var key in meta) {
                blob[key] = meta[key];
            }

            return blob;
            // return new File([blob], name); // not working on IE 10,11
        };


        var getFileByUrl = function (filePathOrUrl, cb, options) {
            getFileBlob(filePathOrUrl, function (blob, meta) {
                var name;
                if (blob.filename) {
                    name = blob.filename;
                } else {
                    name = filePathOrUrl.split("/").pop();
                }
                cb(blobToFile(blob, name, meta));
            }, options);
        };


        // https://stackoverflow.com/questions/15900485/correct-way-to-convert-size-in-bytes-to-kb-mb-gb-in-javascript
        var formatBytes = function (bytes, decimals) {
            if (0 === bytes) {
                return "0 Bytes";
            }
            var c = 1024, d = decimals || 2, e = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"],
                f = Math.floor(Math.log(bytes) / Math.log(c));
            return parseFloat((bytes / Math.pow(c, f)).toFixed(d)) + " " + e[f]
        };


        var fileToImg = function (oFile, jImage, cb) {

            var preview = jImage[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                // convert image file to base64 string
                preview.src = reader.result;
                if ($.isFunction(cb)) {
                    cb();
                }
            }, false);
            reader.readAsDataURL(oFile);
        };

        var fileIsImage = function (oFile) {
            if (!oFile.type.match(/.(jpg|jpeg|png|gif)$/i)) {
                return false;
            }
            return true;
        };


        /**
         * Returns whether the file is a fileUrl or a regular file.
         * See the conception notes for more details.
         */
        var isFileUrl = function (oFile) {
            return ('undefined' !== typeof oFile.url);
        };


        var getFileOriginalUrl = function (oFile) {
            if ('undefined' !== typeof oFile.original_url && '' !== oFile.original_url) {
                return oFile.original_url;
            }
            return false;
        };

        var getFileExtension = function (fileName) {
            return fileName.split('.').pop();
        };

        //----------------------------------------
        // THEME HOOKING
        //----------------------------------------
        /**
         * Theme authors: register your theme directly via this map.
         * It's an array of theme name => theme object.
         * See the documentation for more details.
         */
        window.FileUploaderThemes = {};

        //----------------------------------------
        // LANG HOOKING
        //----------------------------------------
        /**
         * Lang authors: register your lang file directly via this map.
         * It's an array of lang => lang object.
         * See the documentation for more details.
         */
        window.FileUploaderLangs = {};

        //----------------------------------------
        // EVENTS SYSTEM
        //----------------------------------------
        var Dispatcher = function () {
            /**
             *
             * Map of event => callables (i.e. array of callables).
             */
            this.listeners = {};

        };
        Dispatcher.prototype = {
            on: function (event, callable) {
                if (!(event in this.listeners)) {
                    this.listeners[event] = [];
                }
                this.listeners[event].push(callable);
            },
            dispatch: function (event) {
                var args = Array.prototype.slice.call(arguments, 1);
                if (event in this.listeners) {
                    var listeners = this.listeners[event];
                    for (var i in listeners) {
                        listeners[i].apply(this, args);
                    }
                }
            },
        };


        //----------------------------------------
        // VALIDATOR SYSTEM
        //----------------------------------------
        var Validator = function () {
            this.events = null;
            this.rules = [];
        };
        Validator.prototype = {
            addRule: function (cb) {
                this.rules.push(cb);
            },
            test: function (oFile) {
                var errMsg;
                for (var i in this.rules) {
                    var rule = this.rules[i];
                    errMsg = rule(oFile);
                    if (true !== errMsg) {
                        this.events.dispatch("onFileRejected", oFile, errMsg);
                        return errMsg;  // note: for now we just dispatch at most one error per file
                    }
                }
                return true;
            },
        };


        //----------------------------------------
        // FILELIST SYSTEM
        //----------------------------------------
        var FileList = function () {
            this.events = null;
            this.fileUploader = null;
            this.files = [];
            this.validator = new Validator();
            this.maxFile = 0;
            this.nbQueueFiles = null; // internal
            this.queueFileUrls = []; // internal
        };
        FileList.prototype = {
            addFile: function (oFile) {
                if (true === this.validator.test(oFile)) {
                    console.log("pou");
                    oFile.itemId = this._getNewItemId();
                    this.files.push(oFile);
                    this.events.dispatch("onFileAdded", oFile);
                }

                // this._checkFileLimit();


            },
            getUploadQueue: function () {
                var arr = [];
                for (var i in this.files) {
                    var oFile = this.files[i];
                    if ("undefined" === typeof oFile.id) {
                        arr.push(oFile);
                    }
                }
                return arr;
            },
            hasQueue: function () {
                for (var i in this.files) {
                    var oFile = this.files[i];
                    if ("undefined" === typeof oFile.id) {
                        return true;
                    }
                }
                return false;
            },
            addFiles: function (files) {
                var numFiles = files.length;
                for (var i = 0; i < numFiles; i++) {
                    var file = files[i];
                    this.addFile(file);
                }
            },
            /**
             * This method should be only used at startup, when the files are loaded for the first time.
             * But not when the user adds them.
             * This method will ensure that the files are displayed in the order that they are defined (by the php script or the caller).
             */
            addFileUrlsByUrls: function (urls, options) {
                this.nbQueueFiles = urls.length;
                this.queueFileUrls = urls;

                for (var i in urls) {
                    var url = urls[i];
                    this.addFileUrlByUrl(url, options);
                }
            },
            addFileUrlByUrl: function (url, options) {
                var $this = this;
                var _options = options;
                getFileByUrl(url, function (oFile) {


                    var id = "f" + fileUrlCounter++;
                    oFile.id = id;
                    oFile.url = url;
                    oFile.itemId = $this._getNewItemId();


                    //----------------------------------------
                    // Making sure the useOriginal toggle state is preserved.
                    //----------------------------------------
                    if ('undefined' !== typeof _options.useFileEditor && true === _options.useFileEditor) {
                        if ('undefined' !== typeof _options.file) {
                            var oldFile = _options.file;
                            oFile.original_checked = oldFile.original_checked;
                        }
                    }

                    if ('undefined' === typeof oFile.original_checked) { // just set it the first time
                        if (1 === parseInt($this.fileUploader.options.fileEditor.originalDefaultValue)) {
                            oFile.original_checked = true;
                        } else {
                            oFile.original_checked = false;
                        }
                    }

                    $this.files.push(oFile);
                    $this.events.dispatch("onFileAdded", oFile, url, id);

                    $this._checkFileLimit();


                    if (null !== $this.nbQueueFiles) {
                        $this.nbQueueFiles--;
                        if (0 === $this.nbQueueFiles) {
                            $this.nbQueueFiles = null;
                            $this.events.dispatch("onFileQueueUploaded", $this.queueFileUrls);
                        }
                    }


                }, options);
            },
            removeFileByIndex: function (index) {
                var oFile = this.files[index];
                this.files.splice(index, 1);
                this.events.dispatch("onFileRemoved", index, oFile);

            },
            getFileByItemIndex: function (index) {
                return this.files[index];
            },
            getFileByItemId: function (itemId) {
                for (var i in this.files) {
                    var oFile = this.files[i];
                    if (itemId === oFile.itemId) {
                        return oFile;
                    }
                }
            },
            removeFileByItemId: function (itemId) {
                var index = 0;
                for (var i in this.files) {
                    var oFile = this.files[i];
                    if (itemId === oFile.itemId) {
                        index = i;
                        break;
                    }
                }

                this.files.splice(index, 1);
                this.events.dispatch("onFileRemoved", index, oFile);

            },
            updateOrder: function (oldIndex, newIndex) {
                var movedFile = this.files[oldIndex];
                this.files.splice(oldIndex, 1);
                this.files.splice(newIndex, 0, movedFile);
                this.events.dispatch("onFilesReordered", this.files, oldIndex, newIndex);
            },
            resetByUrls: function (orderedUrls) {
                var tmpFiles = [];

                for (var i in orderedUrls) {
                    var url = orderedUrls[i];
                    for (var j in this.files) {
                        var oFile = this.files[j];
                        if (url === oFile.url) {
                            tmpFiles.push(oFile);
                        }
                    }
                }


                /**
                 * Note to myself: This is kind of a hack, so be aware that this is risky.
                 */
                var nbFiles = this.files.length;
                for (var i = 0; i < nbFiles; i++) {
                    this.removeFileByIndex(0);
                }

                for (var i in tmpFiles) {
                    var oFile = tmpFiles[i];
                    this.files.push(oFile);
                    this.events.dispatch("onFileAdded", oFile, oFile.url, oFile.id);
                }
            },
            //----------------------------------------
            //
            //----------------------------------------
            _checkFileLimit: function () {
                if (this.files.length > this.maxFile) {
                    this.removeFileByIndex(0);
                }
            },
            _getNewItemId() {
                return "i" + anyFileCounter++;
            },
        };


        //----------------------------------------
        // GLOBAL PROGRESS BAR
        //----------------------------------------
        var GlobalProgressTracker = function () {
            this.nbItems = 0;
            this.totalWeight = 0;
            this.slots = [];
        };

        GlobalProgressTracker.prototype = {
            registerItems: function (oFiles) {

                this.nbItems = oFiles.length;
                this.totalWeight = 0;
                for (var i = 0; i < this.nbItems; i++) {
                    var oFile = oFiles[i];
                    this.slots[i] = 0;
                    this.totalWeight += oFile.size;
                }
            },
            addProgress: function (index, percent) {
                var maxPercentPerSlot = Math.round(100 / this.nbItems, 2);
                this.slots[index] = percent * maxPercentPerSlot / 100;
            },
            getPercent: function () {
                var percent = 0;
                for (var i in this.slots) {
                    percent += this.slots[i];
                }
                return percent;
            },
            getTotalWeight: function () {
                return this.totalWeight;
            },
        };

        //----------------------------------------
        // UPLOADER ENGINE
        //----------------------------------------
        var UploaderEngine = function () {
            this.events = null;
            this.fileUploader = null;
            this.globalProgress = null;
            this.queueIsDone = false;
        };
        UploaderEngine.prototype = {
            uploadQueue: function (oFiles) {

                this.globalProgress = new GlobalProgressTracker();
                this.globalProgress.registerItems(oFiles);


                for (var index in oFiles) {
                    var oFile = oFiles[index];
                    this._uploadFile(oFile, index);
                }
            },
            _uploadFile: function (oFile, index) {

                var $this = this;


                var formdata = new FormData();
                formdata.append(this.fileUploader.options.uploadItemName, oFile);


                if (true === this.fileUploader.options.useFileEditor) {
                    formdata.append("extension", "fileEditor");
                    formdata.append("action", "add");
                    formdata.append("filename", oFile.name);
                }


                var extraFields = this.fileUploader.options.uploadItemExtraFields;
                for (var key in extraFields) {
                    formdata.append(key, extraFields[key]);
                }
                var ajax = new XMLHttpRequest();
                ajax.overrideMimeType("application/json");

                ajax.upload.addEventListener("progress", function (e) {
                    var percent = Math.round((e.loaded / e.total) * 100, 2);

                    $this.globalProgress.addProgress(index, percent);
                    var globalPercent = $this.globalProgress.getPercent();
                    var totalWeight = $this.globalProgress.getTotalWeight();
                    var globalWeight = Math.round(globalPercent * totalWeight / 100, 2);

                    $this.events.dispatch("onFileUploadProgress", oFile, percent, e.loaded, e.total, globalPercent, globalWeight);
                }, false);


                ajax.addEventListener("load", function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                }, false);
                ajax.addEventListener("error", function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    var tags = {
                        "fileName": '<strong>' + oFile.name + '</strong>',
                    };
                    var errMsg = $this.fileUploader.getErrorByFormatString($this.fileUploader.lang.get("err.uploadError"), tags);
                    $this.events.dispatch('onUploaderEngineError', errMsg);
                }, false);
                ajax.addEventListener("abort", function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    var tags = {
                        "fileName": '<strong>' + oFile.name + '</strong>',
                    };
                    var errMsg = $this.fileUploader.getErrorByFormatString($this.fileUploader.lang.get("err.uploadAborted"), tags);
                    $this.events.dispatch('onUploaderEngineError', errMsg);

                }, false);


                ajax.open("POST", $this.fileUploader.options.serverUrl);
                ajax.onreadystatechange = function () {
                    if (ajax.readyState === 4 && ajax.status === 200) {
                        var jsonResponse = JSON.parse(ajax.responseText);
                        var type = jsonResponse.type;
                        if ('error' === type) {

                            /**
                             * Todo: check that statement from old version (kept below) and see if it still apply...
                             * Even if there is an error, the progress handler will show a green bar as long
                             * as the file was completely (100%) sent to the server.
                             * We don't want that, since a green bar will trick the user to think
                             * that the upload was successful when the server actually denied the upload.
                             * So here, we update the progress bar after the fact, to make the gui more understandable.
                             */

                            $this.events.dispatch("onServerError", jsonResponse.error);
                        } else {
                            $this.events.dispatch("onFileUploaded", oFile, jsonResponse);
                        }
                    }
                };
                ajax.send(formdata);
            },
        };

        //----------------------------------------
        // CROPPER
        //----------------------------------------
        var FileEditor = function (options) {
            this.options = options;
            this.fileUploader = null;
        };
        FileEditor.prototype = {


            initialize: function (oFile, jDialog, droppedFile) {


                var $this = this;
                var originalUrl = getFileOriginalUrl(oFile);

                /**
                 * Note: a file that has just been added (i.e. not a fileUrl) cannot have
                 * original_checked set to true because it doesn't make sense to get the original image
                 * of a file if that file hasn't been uploaded in the first place.
                 */
                var isChecked = false;
                if (false !== originalUrl) {

                    var changedByUser = ('undefined' !== typeof oFile.changed_by_user);


                    if (false === changedByUser && null !== this.options.originalFixedValue) {
                        if (1 === this.options.originalFixedValue) {
                            isChecked = true;
                        }
                    } else {
                        if ('undefined' !== typeof oFile.original_checked) {
                            isChecked = oFile.original_checked;
                        }
                    }


                    if (true === changedByUser) {
                        delete oFile.changed_by_user; // reset the flag for next time
                    }

                    // update the property for the gui theme (which will use it)
                    oFile.original_checked = isChecked;

                }


                if (true === isChecked) {
                    getFileByUrl(originalUrl, function (oOriginalFile) {
                        $this.doInitialize(oFile, jDialog, oOriginalFile);
                    }, {
                        useFileEditor: true,
                    });

                } else {
                    $this.doInitialize(oFile, jDialog);
                }
            },
            doInitialize: function (oFile, jDialog, droppedFile) {


                this.fileUploader.theme.initializeFileEditor(oFile, jDialog, this.options);


                var $this = this;
                var updateUrl = null;
                if (true === isFileUrl(oFile)) {
                    updateUrl = oFile.url;
                    this.fileUploader.theme.showFileEditorOriginalImageToggle(jDialog);
                } else {
                    this.fileUploader.theme.hideFileEditorOriginalImageToggle(jDialog);
                }


                var isImage = fileIsImage(oFile);
                if (true === isImage) {


                    var jImg = jDialog.find('.image-original');


                    var oFileToShow = droppedFile || oFile;
                    fileToImg(oFileToShow, jImg, function () {

                        var cropper;

                        var options = {
                            preview: '.img-preview',
                            viewMode: 1,
                            autoCropArea: 1,
                        };
                        var originalImageURL = jImg.attr('src');


                        // Cropper
                        jImg.cropper(options);


                        cropper = jImg.data('cropper');
                        cropper.replace(originalImageURL);


                        // Methods
                        jDialog.find('.image-editor-toolbar').off("click").on('click', '[data-method]', function () {
                            var $this = $(this);
                            var data = $this.data();
                            var cropper = jImg.data('cropper');
                            var cropped;
                            var $target;
                            var result;

                            if ($this.prop('disabled') || $this.hasClass('disabled')) {
                                return;
                            }

                            if (cropper && data.method) {
                                data = $.extend({}, data); // Clone a new one

                                if (typeof data.target !== 'undefined') {
                                    $target = $(data.target);

                                    if (typeof data.option === 'undefined') {
                                        try {
                                            data.option = JSON.parse($target.val());
                                        } catch (e) {
                                            console.log(e.message);
                                        }
                                    }
                                }

                                cropped = cropper.cropped;

                                switch (data.method) {
                                    case 'rotate':
                                        if (cropped && options.viewMode > 0) {
                                            jImg.cropper('clear');
                                        }

                                        break;
                                }

                                result = jImg.cropper(data.method, data.option, data.secondOption);

                                switch (data.method) {
                                    case 'rotate':
                                        if (cropped && options.viewMode > 0) {
                                            jImg.cropper('crop');
                                        }

                                        break;

                                    case 'scaleX':
                                    case 'scaleY':
                                        $(this).data('option', -data.option);
                                        break;
                                }

                                // if ($.isPlainObject(result) && $target) {
                                //     try {
                                //         $target.val(JSON.stringify(result));
                                //     } catch (e) {
                                //         console.log(e.message);
                                //     }
                                // }
                            }
                        });
                    });

                }


                //----------------------------------------
                // DROP ZONE
                //----------------------------------------
                var useDropZone = true;
                if (true === useDropZone) {

                    var jDropZone = jDialog;

                    function dragstart(e) {

                        /**
                         * I removed this because it prevented the jquery ui dialog (holding the file editor) to be dragged.
                         */

                        // e.stopPropagation();
                        // e.preventDefault();
                        // // https://stackoverflow.com/questions/10119514/html5-drag-drop-change-icon-cursor-while-dragging
                        // e.originalEvent.dataTransfer.effectAllowed = "copyMove";
                    }

                    function dragenter(e) {
                        e.stopPropagation();
                        e.preventDefault();

                        // https://stackoverflow.com/questions/10119514/html5-drag-drop-change-icon-cursor-while-dragging
                        e.originalEvent.dataTransfer.dropEffect = "copy";
                    }

                    function dragover(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        if (false === jDropZone.hasClass($this.fileUploader.options.dropzoneOverClass)) {
                            jDropZone.addClass($this.fileUploader.options.dropzoneOverClass);
                        }

                        // https://stackoverflow.com/questions/10119514/html5-drag-drop-change-icon-cursor-while-dragging
                        e.originalEvent.dataTransfer.dropEffect = "copy";
                    }

                    function dragleave(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        jDropZone.removeClass($this.fileUploader.options.dropzoneOverClass);
                    }

                    function drop(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        jDropZone.removeClass($this.fileUploader.options.dropzoneOverClass);


                        const dt = e.originalEvent.dataTransfer;
                        const files = dt.files;
                        var firstFile = files[0];

                        $this.doInitialize(oFile, jDialog, firstFile);

                    }


                    jDropZone.off("dragstart").on("dragstart", dragstart);
                    jDropZone.off("dragenter").on("dragenter", dragenter);
                    jDropZone.off("dragleave").on("dragleave", dragleave);
                    jDropZone.off("dragover").on("dragover", dragover);
                    jDropZone.off("drop").on("drop", drop);


                }


                //----------------------------------------
                // SUBMIT
                //----------------------------------------
                jDialog.find('.the-submit-button').off('click').on('click', function () {


                    var sendFunction = function (theFile) {


                        var fileEditorData = $this.fileUploader.theme.getFileEditorFormValues();


                        // preparing data to sent to a fileEditor protocol compliant server script
                        // https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md#the-fileeditor-protocol-addition
                        var formData = new FormData();
                        formData.append('extension', "fileEditor");


                        if ('undefined' !== typeof fileEditorData.filename) {
                            var filename = fileEditorData.filename;
                            formData.append('item', theFile, filename);
                        }


                        formData.append('filename', filename);
                        if ('undefined' !== typeof fileEditorData.is_private) {
                            formData.append('is_private', fileEditorData.is_private);
                        }
                        if ('undefined' !== typeof fileEditorData.tags) {
                            for (var i in fileEditorData.tags) {
                                formData.append('tags[]', fileEditorData.tags[i]);
                            }
                        }


                        for (var i in $this.fileUploader.options.uploadItemExtraFields) {
                            formData.append(i, $this.fileUploader.options.uploadItemExtraFields[i]);
                        }

                        var action = "add";
                        if (null !== updateUrl) {
                            formData.append('url', updateUrl);
                            action = "update";
                        }
                        formData.append('action', action);


                        $.ajax($this.fileUploader.options.serverUrl, {
                            method: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            xhr: function () {

                                $this.fileUploader.events.dispatch("onDialogFileUploadProgressBefore", jDialog, oFile);

                                var ajax = new XMLHttpRequest();
                                // ajax.setRequestHeader('Content-Disposition', 'inline; filename="thecat.png"');
                                ajax.overrideMimeType("application/json");


                                ajax.upload.addEventListener("progress", function (e) {


                                    var percent = Math.round((e.loaded / e.total) * 100, 2);
                                    $this.fileUploader.events.dispatch("onDialogFileUploadProgress", jDialog, oFile, percent, e.loaded, e.total);


                                }, false);


                                ajax.addEventListener("load", function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                }, false);
                                ajax.addEventListener("error", function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                    var tags = {
                                        "fileName": '<strong>' + oFile.name + '</strong>',
                                    };
                                    var errMsg = $this.fileUploader.getErrorByFormatString($this.fileUploader.lang.get("err.uploadError"), tags);
                                    $this.events.dispatch('onDialogFileUploadError', errMsg);
                                }, false);
                                ajax.addEventListener("abort", function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                    var tags = {
                                        "fileName": '<strong>' + oFile.name + '</strong>',
                                    };
                                    var errMsg = $this.fileUploader.getErrorByFormatString($this.fileUploader.lang.get("err.uploadAborted"), tags);
                                    $this.events.dispatch('onDialogFileUploadError', errMsg);
                                }, false);
                                return ajax;


                            },
                            success: function (response) {
                                if ("error" === response.type) {
                                    $this.fileUploader.events.dispatch("onFileEditorError", response.error);
                                } else {


                                    //----------------------------------------
                                    // UPDATE THE oFile object
                                    // so that when the user re-opens the file editor, the data are accurate
                                    //----------------------------------------
                                    oFile.protocol = "fileEditor"; // internal use for remove
                                    oFile.url = response.url;


                                    if ('undefined' !== typeof fileEditorData.filename) {
                                        oFile.filename = fileEditorData.filename;
                                        oFile.name = fileEditorData.filename;
                                    }

                                    if ('undefined' !== typeof fileEditorData.is_private) {
                                        oFile.is_private = fileEditorData.is_private;
                                    }

                                    if ('undefined' !== typeof fileEditorData.tags) {
                                        oFile.tags = fileEditorData.tags;
                                    }


                                    $this.fileUploader.events.dispatch("onDialogFileUploaded", oFile, jDialog);
                                }

                            },
                            error: function (response) {
                                $this.fileUploader.events.dispatch("onFileEditorError", response);
                            }
                        });
                    };


                    if (true === isImage) {
                        var cropper = jImg.data('cropper');
                        // or send the cropped image directly
                        cropper.getCroppedCanvas().toBlob(function (blob) {
                            sendFunction(blob);

                        }/* , 'image/jpeg' */);
                    } else {
                        sendFunction(oFile);
                    }

                    return false;
                });
            }
        };

        /**
         *
         * @param options
         * The options are the following:
         *
         * - container: mandatory. Jquery object representing the html element that contains the whole widget.
         * - theme: optional, string=default. The name of the theme to use.
         *          In order to use a theme, the theme file must be included first.
         * - maxFile: optional, int=1. The maximum number of files handled by this instance.
         *      If more than 1 file, this widget will create an array of input type hidden (one per file),
         *      and the name attribute will end with square brackets ([]).
         *      If exactly 1 file, this widget will create a single input type hidden, and the name attribute
         *      will not end with square brackets.
         * - dropzoneOverClass: optional, string=dropzone-hover. The css class to add when the dropzone is hovered by the user.
         * - urls: optional, array=[]. The urls to start with. The urls will be converted to fileUrls. See the documentation for more details.
         * - name: optional, string=the_file. The html name of the file. This name attribute will be added to the hidden input(s). See the documentation for more info.
         * - maxFileSize: optional, int = -1, the maximum number of bytes per file. Use -1 (negative one) to allow any size.
         * - maxFileNameLength: optional, int = 64, the maximum number of characters for the file name.
         * - mimeType: optional, array|string|null = null, the allowed mime type(s). By default, mimeType equals null, which means all mime types are allowed.
         * - allowedFileExtension: optional, array|string|null = null, the allowed file extension(s). By default, allowedFileExtension equals null, which means all file extensions are allowed.
         * - uploadItemName: optional, string = item, the name of the uploaded file when sent to the server side script handling the upload.
         * - uploadItemExtraFields: optional, map = {}, an extra map of data to send to the server when uploading a file.
         * - serverUrl: optional, string = /upload.php, the url of the server script responsible for handling the uploading.
         *      A certain communication protocol is expected, see the conception notes for more details, or the example files in this repository,
         *      or the source code below.
         * - immediateUpload: optional, bool=false, whether to upload the file immediately after the user selected it.
         *      If false, then the user needs to manually click the "Upload files" button to upload the files.
         * - useFileEditor: optional, bool=false, whether to use the file editor.
         *      This includes the file editor widget and the [fileEditor protocol extension](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md#the-fileeditor-protocol-addition).
         * - fileEditor: optional, map with the following values.
         *      See the [fileEditor protocol addition](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md#the-fileeditor-protocol-addition) section for more details.
         *
         *      - useFileName: optional, bool=true, whether to show the dirname and filename input controls, and send the full file path to the server.
         *      - useCropper: optional, bool=true, whether to show the cropper control for images (this requires the cropperjs third party plugin).
         *      - usePrivacy: optional, bool=true, whether to show the "is private" checkbox control, and send that to the server.
         *      - useTags: optional, bool=true, whether to show the "tags" select control (this requires the select2 third party plugin), and send them to the server.
         *      - useOriginalToggle: optional, bool=true, whether to allow the user to switch between the current image and the original image.
         *              Note: this only applies in case of images.
         *              Note2: this only applies if the server configuration is such as the original image is saved.
         *              Note3: the toggle will only show for files which original image was found by the server
         *
         *      - allowCustomTags: optional, bool=true, whether to allow the user to create new tags (requires useTags=true).
         *      - availableTags: optional, array=[], an array of tag labels representing the default available tags (requires useTags=true).
         *          Note: if allowCustomTags=true, the user will also be able to add her own tags.
         *      - parentDir: optional, string=null. This option reflects the server's intent to place the uploaded file(s) into a given directory.
         *          If null, then it's assumed that the files will be uploaded to the user's root directory.
         *      - fileName: optional, string|null=null. The default value for the file name. If null, the filename will be updated based on the
         *          name of the file used for opening the file editor dialog.
         *      - originalDefaultValue: optional, int(0|1) = 0. The default value of the original toggle.
         *          Note: it might be overridden by the gui when it makes sense, see the notes of the useOriginalToggle option for more details.
         *      - originalFixedValue: optional, int(0|1|null) = 0. The fixed value for the original image toggle.
         *          If 0 (default), the processed image will be shown every time the user opens the file editor.
         *          If 1, the original image will be shown every time the user opens the file editor (assuming an original image
         *          is bound to the processed image, otherwise this will be ignored and the processed image will be shown).
         *          If null, the opened image (when the user opens the file editor) will be the one indicated by the
         *          original toggle, which the user can change.
         *
         *      - privacyDefaultValue: optional, int(0|1) = 0. The default value of the privacy control.
         *      - tagsDefaultValue: optional, array=[]. The tags to select automatically by default.
         *      - tagsMaxLength: optional, (int|null)=null. The maximum number of tags that the user can select. Null means no limit.
         *
         *
         * - themeOptions: optional, map = {}, a map of options to pass to the theme's buildFileUploader method. Refer to the theme's file to see the available options.
         *
         */
        window.FileUploader = function (options) {

            options = $.extend(true, {}, {
                container: null,
                theme: "default",
                lang: "eng",
                maxFile: 1,
                dropzoneOverClass: "dropzone-hover",
                urls: [],
                name: "the_file",
                maxFileSize: -1,
                maxFileNameLength: 64,
                mimeType: null,
                allowedFileExtension: null,
                uploadItemName: "item",
                uploadItemExtraFields: {},
                serverUrl: "/upload.php",
                immediateUpload: false,

                useFileEditor: true,
                fileEditor: {
                    useFileName: true,
                    useCropper: true,
                    usePrivacy: true,
                    useTags: true,
                    useOriginalToggle: true,
                    //
                    allowCustomTags: true,
                    availableTags: [],
                    fileName: null,
                    parentDir: null,
                    privacyDefaultValue: 0,
                    originalDefaultValue: 0,
                    originalFixedValue: 0,
                    tagsDefaultValue: [],
                    tagsMaxLength: null,
                },
                themeOptions: {},
            }, options);


            this.themeName = options.theme;
            this.langName = options.lang;
            this.container = options.container;
            this.options = options;

            this.theme = null;
            this.lang = null;
            this.events = null;
            this.fileList = null;
            this.fileEditor = null;


            this._isUploading = false;

        };


        FileUploader.prototype = {
            init: function () {
                var $this = this;
                if (this.themeName in window.FileUploaderThemes) {
                    if (this.langName in window.FileUploaderLangs) {

                        this.lang = window.FileUploaderLangs[this.langName];


                        this.theme = window.FileUploaderThemes[this.themeName];
                        this.theme.container = this.container;
                        this.theme.fileUploader = this;
                        this.theme.lang = this.lang;


                        this.events = new Dispatcher();
                        this.fileList = new FileList();
                        this.fileList.maxFile = this.options.maxFile;
                        this.fileList.events = this.events;
                        this.fileList.fileUploader = this;


                        this.uploaderEngine = new UploaderEngine();
                        this.uploaderEngine.events = this.events;
                        this.uploaderEngine.fileUploader = this;


                        this.validator = new Validator();
                        this.validator.events = this.events;


                        // adding maxFileSize rule
                        if (this.options.maxFileSize !== -1) {
                            this.validator.addRule(function (oFile) {
                                if (oFile.size > $this.options.maxFileSize) {
                                    var tags = {
                                        "fileName": '<strong>' + oFile.name + '</strong>',
                                        "maxSize": formatBytes($this.options.maxFileSize),
                                        "fileSize": formatBytes(oFile.size),
                                    };
                                    return $this.getErrorByFormatString($this.lang.get("err.maxFileExceeded"), tags);
                                }
                                return true;
                            });
                        }

                        // adding maxFileNameLength rule
                        this.validator.addRule(function (oFile) {
                            if (oFile.name.length > $this.options.maxFileNameLength) {
                                var tags = {
                                    "fileName": '<strong>' + oFile.name + '</strong>',
                                    "maxLength": $this.options.maxFileNameLength,
                                    "length": oFile.name.length,
                                };
                                return $this.getErrorByFormatString($this.lang.get("err.maxFileNameLength"), tags);
                            }
                            return true;
                        });


                        // adding mime type rule
                        if (this.options.mimeType !== null) {
                            var allowedMimeTypes = this.options.mimeType;
                            if ('string' === typeof allowedMimeTypes) {
                                allowedMimeTypes = [allowedMimeTypes];
                            }

                            this.validator.addRule(function (oFile) {
                                if (-1 === allowedMimeTypes.indexOf(oFile.type)) {
                                    var tags = {
                                        "fileName": '<strong>' + oFile.name + '</strong>',
                                        "fileMimeType": '<strong>' + oFile.type + '</strong>',
                                        "allowedMimeTypes": allowedMimeTypes.join(', '),
                                    };
                                    return $this.getErrorByFormatString($this.lang.get("err.wrongMimeType"), tags);
                                }
                                return true;
                            });
                        }


                        // adding file extension rule
                        if (this.options.allowedFileExtension !== null) {
                            var allowedFileExtensions = this.options.allowedFileExtension;
                            if ('string' === typeof allowedFileExtensions) {
                                allowedFileExtensions = [allowedFileExtensions];
                            }

                            this.validator.addRule(function (oFile) {
                                var name = oFile.name;
                                var extension = getFileExtension(oFile.name);
                                if (-1 === allowedFileExtensions.indexOf(extension)) {
                                    var tags = {
                                        "fileName": '<strong>' + oFile.name + '</strong>',
                                        "fileExtension": '<strong>' + extension + '</strong>',
                                        "allowedFileExtensions": allowedFileExtensions.join(', '),
                                    };
                                    return $this.getErrorByFormatString($this.lang.get("err.wrongFileExtension"), tags);
                                }
                                return true;
                            });
                        }
                        this.fileList.validator = this.validator;


                        if (true === this.options.useFileEditor) {
                            this.fileEditor = new FileEditor(this.options.fileEditor);
                            this.fileEditor.fileUploader = this;
                        }


                        //----------------------------------------
                        // EVENTS
                        //----------------------------------------
                        this.events.on("onErrorAdded", function (errorMsg) {
                            $this.theme.addUserError(errorMsg);
                        });
                        this.events.on("onFileRejected", function (oFile, errorMsg) {
                            $this.events.dispatch("onErrorAdded", errorMsg);
                        });
                        this.events.on("onFileAdded", function (oFile, urlOrNull, idOrNull) {
                            $this.theme.addFile(oFile);
                            if ('undefined' !== typeof urlOrNull) {
                                $this.theme.addHiddenInput(urlOrNull, idOrNull);
                            }

                            if (true === $this.fileList.hasQueue()) {
                                $this.theme.enableUploadButton();
                            }


                            $this.theme.updateFooterInfo($this.fileList.files);
                        });
                        this.events.on("onFileRemoved", function (index, oFile) {
                            $this.theme.removeFileByIndex(index);
                            var id = oFile.id;
                            if (id) {
                                $this.theme.removeHiddenInputById(id);
                            }
                            $this.theme.updateFooterInfo($this.fileList.files);
                            if (false === $this.fileList.hasQueue()) {
                                $this.theme.disableUploadButton();
                            }
                        });
                        this.events.on("onFilesReordered", function (oFiles, oldIndex, newIndex) {
                            $this.theme.reorderFiles(oFiles, oldIndex, newIndex);
                        });
                        this.events.on("onUploaderEngineError", function (errMsg) {
                            $this.events.dispatch("onErrorAdded", errMsg);
                        });
                        this.events.on("onServerError", function (errMsg) {
                            $this.events.dispatch("onErrorAdded", $this.lang.get("Server error: ") + errMsg);
                        });
                        this.events.on("onFileUploaded", function (oFile, serverResponse) {
                            var url = serverResponse.url;
                            $this.fileList.removeFileByItemId(oFile.itemId);
                            $this.fileList.addFileUrlByUrl(url, {
                                useFileEditor: $this.options.useFileEditor,
                                file: oFile,
                            });

                            // if (100 === parseInt($this.uploaderEngine.globalProgress.getPercent())) {
                            //     $this.uploaderEngine.queueIsDone = true;
                            // }
                        });
                        this.events.on("onFileUploadProgress", function (oFile, percent, loaded, total, globalPercent, globalWeight) {
                            $this.theme.refreshProgress(oFile, percent, loaded, total, globalPercent);
                        });
                        this.events.on("onFileEditorError", function (errMsg) {
                            $this.theme.addFileEditorError(errMsg);
                        });
                        this.events.on("onDialogFileUploadProgressBefore", function (jDialog, oFile) {
                            $this.theme.onRefreshDialogProgressBefore(jDialog, oFile);
                        });
                        this.events.on("onDialogFileUploadProgress", function (jDialog, oFile, percent, loaded, total) {
                            $this.theme.refreshDialogProgress(jDialog, oFile, percent, loaded, total);
                        });
                        this.events.on("onDialogFileUploadError", function (errorMsg) {
                            $this.theme.addFileEditorError(errorMsg);
                        });
                        this.events.on("onDialogFileUploaded", function (oFile, jDialog) {

                            var url = oFile.url;

                            $this.fileList.removeFileByItemId(oFile.itemId);
                            $this.fileList.addFileUrlByUrl(url, {
                                useFileEditor: true,
                                file: oFile,
                            });
                            $this.theme.closeFileEditorDialog(jDialog, oFile);
                        });
                        this.events.on('theme.onFileEditorOriginalImageToggleSwitched', function (isChecked, jDialog, oFile) {
                            oFile.original_checked = isChecked;
                            oFile.changed_by_user = true;
                            $this.fileEditor.initialize(oFile, jDialog);
                        });

                        this.events.on("onFileQueueUploaded", function (queueFileUrls) {
                            $this.fileList.resetByUrls(queueFileUrls);
                        });


                        //----------------------------------------
                        // BUILDING THE WIDGET
                        //----------------------------------------
                        if (true === this.options.useFileEditor) {
                            this.theme.enableFileEditor(this.options.fileEditor);
                        }
                        this.theme.buildFileUploader(this.options.themeOptions);
                        if (true === this.options.immediateUpload) {
                            this.theme.hideUploadButton();
                        }

                        //----------------------------------------
                        // JS LISTENERS
                        //----------------------------------------
                        this.container.on('click', function (e) {
                            var jTarget = $(e.target);
                            if (jTarget.hasClass('btn-add-file')) {
                                // open file dialog
                                $this.container.find('.input-file').trigger('click');
                                return false;
                            } else if (jTarget.hasClass('btn-remove-file')) {

                                var index = $this.getIndexByTarget(jTarget);
                                var oFile = $this.fileList.getFileByItemIndex(index);

                                if ('fileEditor' === oFile.protocol && true === isFileUrl(oFile)) {


                                    var payload = {
                                        extension: "fileEditor",
                                        action: "remove",
                                        url: oFile.url,
                                    };
                                    var extraFields = $this.options.uploadItemExtraFields;
                                    for (var key in extraFields) {
                                        payload[key] = extraFields[key];
                                    }

                                    jQuery.post(
                                        $this.options.serverUrl,
                                        payload,
                                        function (response) {
                                            if ('success' === response.type) {
                                                $this.fileList.removeFileByIndex(index);
                                            }
                                        },
                                        'json'
                                    );


                                } else {
                                    /**
                                     * This includes:
                                     * - the files just added by the user
                                     * - the files added by the developer but which don't use the fileEditor protocol
                                     */
                                    $this.fileList.removeFileByIndex(index);
                                }


                                return false;
                            } else if (jTarget.hasClass('btn-remove-error')) {
                                $this.theme.removeUserErrorByTarget(jTarget);
                                return false;
                            } else if (jTarget.hasClass('btn-start-upload')) {
                                $this.uploaderEngine.uploadQueue($this.fileList.getUploadQueue());
                                return false;
                            } else if (jTarget.hasClass('btn-edit-file')) {

                                var itemId = jTarget.closest(".fileuploader-item").attr('data-id');
                                var oFile = $this.fileList.getFileByItemId(itemId);
                                var isImage = fileIsImage(oFile);

                                $this.theme.openFileEditorDialog({
                                    showCropper: isImage,
                                    onOpenAfter: function (jDialog) {
                                        $this.fileEditor.initialize(oFile, jDialog);
                                    }
                                });


                                return false;
                            } else if (jTarget.hasClass('cell-image-img')) {

                                var itemId = jTarget.closest(".fileuploader-item").attr('data-id');
                                var oFile = $this.fileList.getFileByItemId(itemId);
                                console.log("debug", oFile);
                                return false;
                            }

                        });


                        var jInput = $this.container.find('.input-file');
                        if (jInput.length) {
                            jInput.on('change', function () {
                                $this.fileList.addFiles(this.files);
                                if (true === $this.options.immediateUpload) {
                                    $this.container.find(".btn-start-upload").first().trigger('click');
                                }
                            });
                        }


                        var jDropZone = this.container.find('.dropzone');
                        if (jDropZone.length) {
                            function dragstart(e) {
                                e.stopPropagation();
                                e.preventDefault();

                                // https://stackoverflow.com/questions/10119514/html5-drag-drop-change-icon-cursor-while-dragging
                                e.dataTransfer.effectAllowed = "copyMove";
                            }

                            function dragenter(e) {
                                e.stopPropagation();
                                e.preventDefault();

                                // https://stackoverflow.com/questions/10119514/html5-drag-drop-change-icon-cursor-while-dragging
                                e.dataTransfer.dropEffect = "copy";
                            }

                            function dragover(e) {
                                e.stopPropagation();
                                e.preventDefault();
                                if (false === jDropZone.hasClass($this.options.dropzoneOverClass)) {
                                    jDropZone.addClass($this.options.dropzoneOverClass);
                                }

                                // https://stackoverflow.com/questions/10119514/html5-drag-drop-change-icon-cursor-while-dragging
                                e.dataTransfer.dropEffect = "copy";
                            }

                            function dragleave(e) {
                                e.stopPropagation();
                                e.preventDefault();
                                jDropZone.removeClass($this.options.dropzoneOverClass);
                            }

                            function drop(e) {
                                e.stopPropagation();
                                e.preventDefault();
                                jDropZone.removeClass($this.options.dropzoneOverClass);


                                const dt = e.dataTransfer;
                                const files = dt.files;

                                $this.fileList.addFiles(files);
                                if (true === $this.options.immediateUpload) {
                                    $this.container.find(".btn-start-upload").first().trigger('click');
                                }
                            }

                            jDropZone[0].addEventListener("dragstart", dragstart, false);
                            jDropZone[0].addEventListener("dragenter", dragenter, false);
                            jDropZone[0].addEventListener("dragleave", dragleave, false);
                            jDropZone[0].addEventListener("dragover", dragover, false);
                            jDropZone[0].addEventListener("drop", drop, false);
                        }


                        //----------------------------------------
                        // ADDING THE DEFAULT ITEM URLS
                        //----------------------------------------
                        var urls = this.options.urls;
                        var ajaxOptions = {};
                        if (true === this.options.useFileEditor) {
                            ajaxOptions.useFileEditor = true;
                        }
                        this.fileList.addFileUrlsByUrls(urls, ajaxOptions);
                        // for (var i in urls) {
                        //     var url = urls[i];
                        //     this.fileList.addFileUrlByUrl(url, ajaxOptions);
                        // }


                        //----------------------------------------
                        // SORTABLE
                        //----------------------------------------
                        if ('undefined' !== typeof jQuery.ui) {

                            var jItemsContainer = $this.container.find('.fileuploader-item-container');
                            jItemsContainer.sortable({
                                start: function (e, ui) {

                                    $this.container.find('.last-dragged-item').removeClass('last-dragged-item');

                                    // creates a temporary attribute on the element with the old index
                                    $(this).attr('data-previndex', ui.item.index());
                                    $(ui.item).addClass("last-dragged-item");
                                },
                                update: function (e, ui) {
                                    // gets the new and old index then removes the temporary attribute
                                    var newIndex = ui.item.index();
                                    var oldIndex = $(this).attr('data-previndex');
                                    $(this).removeAttr('data-previndex');
                                    $this.fileList.updateOrder(oldIndex, newIndex);
                                }
                            });
                        }

                    } else {
                        this.devError("The lang \"" + this.langName + "\" was not registered.");
                    }
                } else {
                    this.devError("The theme \"" + this.themeName + "\" was not registered.");
                }
            },
            getCssId: function (identifier) {
                if (!(identifier in cssIdCounters)) {
                    cssIdCounters[identifier] = 0;
                }
                cssIdCounters[identifier]++;
                return identifier + "-" + cssIdCounters[identifier];
            },
            devError: function (msg) {
                throw new Error("DevError from fileuploader.js: " + msg);
            },
            userError: function (msg) {
                this.events.dispatch("onErrorAdded", msg);
            },
            getIndexByTarget: function (jTarget) {
                var jItem = jTarget.closest('.fileuploader-item');
                return jItem.index();

            },
            getErrorByFormatString: function (formatString, tags) {
                var error = formatString;
                for (var key in tags) {
                    var tag = '{' + key + '}';
                    var value = tags[key];
                    error = error.replace(tag, value);
                }
                return error;
            },
        };
    }
})();

