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

        var getFileBlob = function (url, cb) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url);
            xhr.responseType = "blob";
            xhr.addEventListener('load', function () {
                cb(xhr.response);
            });
            xhr.send();
        };

        var blobToFile = function (blob, name) {
            // https://stackoverflow.com/questions/27159179/how-to-convert-blob-to-file-in-javascript
            blob.lastModifiedDate = new Date();
            blob.name = name;
            return blob;
            // return new File([blob], name); // not working on IE 10,11
        };

        var getFileByUrl = function (filePathOrUrl, cb) {
            getFileBlob(filePathOrUrl, function (blob) {
                var name = filePathOrUrl.split("/").pop();
                cb(blobToFile(blob, name));
            });
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
            this.files = [];
            this.validator = new Validator();
            this.maxFile = 0;
        };
        FileList.prototype = {
            addFile: function (oFile) {
                if (true === this.validator.test(oFile)) {
                    oFile.itemId = this._getNewItemId();
                    this.files.push(oFile);
                    this.events.dispatch("onFileAdded", oFile);
                }

                this._checkFileLimit();


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
            addFiles: function (files) {
                var numFiles = files.length;
                for (var i = 0; i < numFiles; i++) {
                    var file = files[i];
                    this.addFile(file);
                }
            },
            addFileUrlByUrl: function (url) {
                var $this = this;
                getFileByUrl(url, function (oFile) {
                    var id = "f" + fileUrlCounter++;
                    oFile.id = id;
                    oFile.url = url;
                    oFile.itemId = $this._getNewItemId();
                    $this.files.push(oFile);
                    $this.events.dispatch("onFileAdded", oFile, url, id);

                    $this._checkFileLimit();

                });
            },
            removeFileByIndex: function (index) {
                var oFile = this.files[index];
                this.files.splice(index, 1);
                this.events.dispatch("onFileRemoved", index, oFile);

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
            this.container = null;
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
                formdata.append(this.container.options.uploadItemName, oFile);
                var extraFields = this.container.options.uploadItemExtraFields;
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
                    var errMsg = $this.container.getErrorByFormatString($this.container.lang.get("err.uploadError"), tags);
                    $this.events.dispatch('onUploaderEngineError', errMsg);
                }, false);
                ajax.addEventListener("abort", function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    var tags = {
                        "fileName": '<strong>' + oFile.name + '</strong>',
                    };
                    var errMsg = $this.container.getErrorByFormatString($this.container.lang.get("err.uploadAborted"), tags);
                    $this.events.dispatch('onUploaderEngineError', errMsg);

                }, false);


                ajax.open("POST", $this.container.options.serverUrl);
                ajax.onreadystatechange = function () {
                    if (ajax.readyState === 4 && ajax.status === 200) {
                        var jsonResponse = JSON.parse(ajax.responseText);
                        var type = jsonResponse.type;
                        if ('error' === type) {

                            /**
                             * Todo: check that statement from old version and see if it still apply...
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
         * - mimeType: optional, array|string|null = null, the allowed mime type(s). By default, mimeType equals null, which means all mime types are allowed.
         * - uploadItemName: optional, string = item, the name of the uploaded file when sent to the server side script handling the upload.
         * - uploadItemExtraFields: optional, map = {}, an extra map of data to send to the server when uploading a file.
         * - serverUrl: optional, string = /upload.php, the url of the server script responsible for handling the uploading.
         *      A certain communication protocol is expected, see the conception notes for more details, or the example files in this repository,
         *      or the source code below.
         * - immediateUpload: optional, bool=false, whether to upload the file immediately after the user selected it.
         *      If false, then the user needs to manually click the "Upload files" button to upload the files.
         * - themeOptions: optional, map = {}, a map of options to pass to the theme's buildFileUploader method. Refer to the theme's file to see the available options.
         *
         */
        window.FileUploader = function (options) {

            options = $.extend({}, {
                container: null,
                theme: "default",
                lang: "eng",
                maxFile: 1,
                dropzoneOverClass: "dropzone-hover",
                urls: [],
                name: "the_file",
                maxFileSize: -1,
                mimeType: null,
                uploadItemName: "item",
                uploadItemExtraFields: {},
                serverUrl: "/upload.php",
                immediateUpload: false,
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


                        this.uploaderEngine = new UploaderEngine();
                        this.uploaderEngine.events = this.events;
                        this.uploaderEngine.container = this;


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
                                    return $this.container.getErrorByFormatString($this.lang.get("err.maxFileExceeded"), tags);
                                }
                                return true;
                            });
                        }

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
                                    return $this.container.getErrorByFormatString($this.lang.get("err.wrongMimeType"), tags);
                                }
                                return true;
                            });
                        }
                        this.fileList.validator = this.validator;


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
                            $this.theme.updateFooterInfo($this.fileList.files);
                        });
                        this.events.on("onFileRemoved", function (index, oFile) {
                            $this.theme.removeFileByIndex(index);
                            var id = oFile.id;
                            if (id) {
                                $this.theme.removeHiddenInputById(id);
                            }
                            $this.theme.updateFooterInfo($this.fileList.files);
                        });
                        this.events.on("onFilesReordered", function (oFiles, oldIndex, newIndex) {
                            $this.theme.reorderFiles(oFiles, oldIndex, newIndex);
                        });
                        this.events.on("onUploaderEngineError", function (errMsg) {
                            $this.events.dispatch("onErrorAdded", errMsg);
                        });
                        this.events.on("onServerError", function (errMsg) {
                            $this.events.dispatch("onErrorAdded", errMsg);
                        });
                        this.events.on("onFileUploaded", function (oFile, serverResponse) {
                            var url = serverResponse.url;
                            $this.fileList.removeFileByItemId(oFile.itemId);
                            $this.fileList.addFileUrlByUrl(url);

                            // if (100 === parseInt($this.uploaderEngine.globalProgress.getPercent())) {
                            //     $this.uploaderEngine.queueIsDone = true;
                            // }
                        });
                        this.events.on("onFileUploadProgress", function (oFile, percent, loaded, total, globalPercent, globalWeight) {
                            $this.theme.refreshProgress(oFile, percent, loaded, total, globalPercent);
                        });


                        //----------------------------------------
                        // BUILDING THE WIDGET
                        //----------------------------------------
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
                                $this.fileList.removeFileByIndex(index);
                                return false;
                            } else if (jTarget.hasClass('btn-remove-error')) {
                                $this.theme.removeUserErrorByTarget(jTarget);
                                return false;
                            } else if (jTarget.hasClass('btn-start-upload')) {
                                $this.uploaderEngine.uploadQueue($this.fileList.getUploadQueue());
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
                        for (var i in urls) {
                            var url = urls[i];
                            this.fileList.addFileUrlByUrl(url);
                        }


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

