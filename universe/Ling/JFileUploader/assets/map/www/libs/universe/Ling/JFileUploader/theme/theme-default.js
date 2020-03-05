//----------------------------------------
// default theme
//----------------------------------------
if ('undefined' === typeof window.FileUploaderTheme_Default) {
    (function () {


        var cssIdCounter = 0;

        //----------------------------------------
        // UTILS
        //----------------------------------------
        // https://stackoverflow.com/questions/15900485/correct-way-to-convert-size-in-bytes-to-kb-mb-gb-in-javascript
        var formatBytes = function (bytes, decimals) {
            if (0 === bytes) {
                return "0 Bytes";
            }
            var c = 1024, d = decimals || 2, e = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"],
                f = Math.floor(Math.log(bytes) / Math.log(c));
            return parseFloat((bytes / Math.pow(c, f)).toFixed(d)) + " " + e[f]
        };

        // https://stackoverflow.com/questions/1787322/htmlspecialchars-equivalent-in-javascript
        var escapeHtml = function (text) {
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
        };

        var fileIsImage = function (oFile) {
            if (!oFile.type.match(/.(jpg|jpeg|png|gif)$/i)) {
                return false;
            }
            return true;
        };

        var basename = function (path) {
            return path.split('/').reverse()[0];
        };


        /**
         * Returns an array containing the following info:
         *
         * - baseName: the file name, without extension, relative to the dir name (if dirname is not null)
         * - extension: the file extension
         *
         */
        var getFileInfoByRelativePath = function (fileName, dirName) {
            var extension = "";
            var baseName = fileName;

            if (null !== dirName) {
                if (0 === baseName.indexOf(dirName)) {
                    baseName = baseName.split(dirName, 2).pop();
                    if (0 === baseName.indexOf("/")) {
                        baseName = baseName.substr(1);
                    }
                }
            }

            if (-1 !== baseName.indexOf(".")) {
                var components = baseName.split(".");
                extension = components.pop();
                baseName = components.join(".");
            }

            return {
                baseName: baseName,
                extension: extension,
            }
        };


        /**
         * https://select2.org/data-sources/arrays
         */
        var toSelect2Data = function (tags) {
            var arr = [];
            for (var i in tags) {
                var tag = tags[i];
                arr.push({
                    "id": tag,
                    "text": tag,
                })
            }
            return arr;
        };


        //----------------------------------------
        //
        //----------------------------------------
        window.FileUploaderTheme_Default = function () {
            this.container = null;
            this.fileUploader = null;
            this.useFileEditor = false;
            this.fileEditorOptions = {};
            this.fileEditorDialog = null;
            this.fileEditorDialogOpenOptions = null;
            this.lang = null;
        };
        window.FileUploaderTheme_Default.prototype = {
            //----------------------------------------
            //
            //----------------------------------------
            addUserError: function (msg) {
                var jErrorContainer = this.container.find('.error-container-item');
                var s = '';
                s += '<div class="error-item">\n' +
                    '    <span>' + msg + '</span>\n' +
                    '    <button class="btn-remove-error"><i class="fas fa-times-circle btn-remove-error"></i></button>\n' +
                    '</div>';
                jErrorContainer.append(s);
            },
            removeUserErrorByTarget: function (jTarget) {
                jTarget.closest('.error-item').remove();
            },
            /**
             * Options are:
             * - defaultView: string=text (image|text). The view to open the widget with.
             * - showHiddenInput: bool=false. Whether to show the hidden inputs (useful while debugging).
             *
             *
             *
             */
            buildFileUploader: function (options) {
                var $this = this;


                var s = '        <div class="hidden-inputs" style="display: none"></div>\n' +
                    '        <div class="error-container">\n' +
                    '            <div class="error-container-item"></div>\n' +
                    '        </div>\n' +
                    '        <div class="header">\n' +
                    '            <div class="left text-select-files">Select files</div>\n' +
                    '            <div class="right">\n' +
                    '                <button class="btn-view-text"><i class="fas fa-list-ul btn-view-text"></i></button>\n' +
                    '                <button class="btn-view-image"><i class="far fa-image btn-view-image"></i></button>\n' +
                    '            </div>\n' +
                    '        </div>\n' +
                    '        <div class="dropzone">\n' +
                    '            <div class="dropzone-text visible">\n' +
                    '                <div class="dropzone-text-header">\n' +
                    '                    <div class="cell-name">Filename</div>\n' +
                    '                    <div class="cell-status">Status</div>\n' +
                    '                    <div class="cell-size">Size</div>\n' +
                    '                    <div class="cell-action"></div>\n' +
                    '                </div>\n' +
                    '                <div class="dropzone-text-container">\n' +
                    '                    <div class="dropzone-droptext">Drag files here.</div>\n' +
                    '                    <ul class="fileuploader-item-container"></ul>\n' +
                    '\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '\n' +
                    '            <div class="dropzone-image">\n' +
                    '                <div class="dropzone-droptext">Drag files here.</div>\n' +
                    '                <div class="filelist fileuploader-item-container"></div>\n' +
                    '            </div>\n' +
                    '        </div>\n' +
                    '        <div class="footer">\n' +
                    '            <div class="left">\n' +
                    '                <button class="btn-add-file"><i class="btn-add-file fas fa-plus-circle"></i> <span\n' +
                    '                            class="text-add-file btn-add-file">Add files</span></button>\n' +
                    '                <button class="btn-start-upload" disabled><i class="btn-start-upload fas fa-arrow-circle-right"></i> <span class="btn-start-upload text-start-upload">Start upload</span></button>\n' +
                    '            </div>\n' +
                    '            <div class="right">\n' +
                    '                <span class="footer-info"><span class="global-number-of-files">0</span> <span class="text-file">file(s)</span></span>\n' +
                    '                <span class="footer-info global-percent-upload">0%</span>\n' +
                    '                <span class="footer-info global-size">0 kb</span>\n' +
                    '            </div>\n' +
                    '        </div>\n' +
                    '        <div class="hidden" style="display: none">\n' +
                    '            <input class="input-file" type="file" name="the_file" multiple/>\n';


                //----------------------------------------
                // DIALOG FOR CROPPER JS
                //----------------------------------------
                if (true === this.useFileEditor) {

                    var sFileEditor = this.lang.get("File Editor");
                    var sFileName = this.lang.get("File name");
                    var sParentDir = this.lang.get("Parent dir");
                    var sIsPrivate = this.lang.get("Is private");
                    var sOriginal = this.lang.get("Use original image");
                    var sTags = this.lang.get("Tags");
                    var sImageEditor = this.lang.get("Image Editor");
                    var sZoomIn = this.lang.get("Zoom In");
                    var sZoomOut = this.lang.get("Zoom Out");
                    var sRotateLeft = this.lang.get("Rotate Left");
                    var sRotateRight = this.lang.get("Rotate Right");
                    var sFlipHorizontal = this.lang.get("Flip Horizontal");
                    var sFlipVertical = this.lang.get("Flip Vertical");
                    var sReset = this.lang.get("Reset");


                    cssIdCounter++;
                    var sPrivacy;

                    s += '' +
                        '<div title="' + escapeHtml(sFileEditor) + '" class="dialog-file-editor">\n' +
                        '<div class="file-editor-error-container"></div>\n' +
                        '    <form action="" method="post">\n';


                    if (true === this.fileEditorOptions.usePrivacy) {
                        sPrivacy = '<div class="control-group control-privacy">\n' +
                            '            <label for="id-fileuploader-privacy-' + cssIdCounter + '">' + sIsPrivate + '</label>\n' +
                            '            <input id="id-fileuploader-privacy-' + cssIdCounter + '" type="checkbox" name="is_private" value="1" class="input-privacy"/>\n' +
                            '        </div>\n';
                    }


                    if (true === this.fileEditorOptions.useFileName || true === this.fileEditorOptions.usePrivacy) {

                        s += '<div class="file-editor-block-1">';
                        if (true === this.fileEditorOptions.useFileName) {

                            s += '         <div class="control-group control-dirname">\n' +
                                '            <label for="id-fileuploader-dirname-' + cssIdCounter + '">' + sParentDir + ': </label>\n' +
                                '            <span class="element-dirname"></span>\n' +
                                '        </div>\n';
                        }

                        if (true === this.fileEditorOptions.usePrivacy) {
                            s += sPrivacy;
                        }

                        s += '</div>';
                    }


                    if (true === this.fileEditorOptions.useFileName) {
                        s += '         <div class="control-group control-basename">\n' +
                            '            <label for="id-fileuploader-basename-' + cssIdCounter + '">' + sFileName + '</label>\n' +
                            '            <div class="filename-inputs-container">' +
                            '                <input id="id-fileuploader-basename-' + cssIdCounter + '" type="text" name="basename" value="" class="input-basename"/>\n' +
                            '                <input type="text" name="extension" value="" class="input-extension"/>\n' +
                            '            </div>' +
                            '        </div>\n';
                    }


                    if (true === this.fileEditorOptions.useTags) {
                        s += '        <div class="control-group control-tags">\n' +
                            '            <label for="id-fileuploader-tags-' + cssIdCounter + '">' + sTags + '</label>\n' +
                            '            <select class="select-tags" id="id-fileuploader-tags-' + cssIdCounter + '" name="tags[]" multiple></select>\n' +
                            '        </div>\n';
                    }


                    s += '        <div class="control-group container image-editor-container">\n';


                    s += '<div class="image-editor-header">';
                    s += '            <label>' + sImageEditor + '</label>\n';
                    if (true === this.fileEditorOptions.useOriginalToggle) {
                        s += '<div class="control-original-toggle">\n' +
                            '            <label for="id-fileuploader-original-toggle-' + cssIdCounter + '">' + sOriginal + '</label>\n' +
                            '            <input id="id-fileuploader-original-toggle-' + cssIdCounter + '" type="checkbox" value="1" class="input-original-toggle"/>\n' +
                            '        </div>\n';
                    }
                    s += '</div>';


                    s += '            <div class="img-container">\n' +
                        '                <img class="image-original" src="" alt="Picture">\n' +
                        '            </div>\n' +
                        '\n' +
                        '\n' +
                        '            <div class="image-editor-toolbar">\n' +
                        '\n' +
                        '\n' +
                        '                <div class="btn-group">\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1"\n' +
                        '                            title="' + escapeHtml(sZoomIn) + '">\n' +
                        '                        <span class="fa fa-search-plus"></span>\n' +
                        '                    </button>\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1"\n' +
                        '                            title="' + escapeHtml(sZoomOut) + '">\n' +
                        '              <span class="fa fa-search-minus"></span>\n' +
                        '            </span>\n' +
                        '                    </button>\n' +
                        '                </div>\n' +
                        '\n' +
                        '\n' +
                        '                <div class="btn-group">\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45"\n' +
                        '                            title="' + escapeHtml(sRotateLeft) + '">\n' +
                        '                        <span class="fa fa-undo-alt"></span>\n' +
                        '                    </button>\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="45"\n' +
                        '                            title="' + escapeHtml(sRotateRight) + '">\n' +
                        '              <span class="fa fa-redo-alt"></span>\n' +
                        '            </span>\n' +
                        '                    </button>\n' +
                        '                </div>\n' +
                        '\n' +
                        '                <div class="btn-group">\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1"\n' +
                        '                            title="' + escapeHtml(sFlipHorizontal) + '">\n' +
                        '                        <span class="fa fa-arrows-alt-h"></span>\n' +
                        '                    </button>\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1"\n' +
                        '                            title="' + escapeHtml(sFlipVertical) + '">\n' +
                        '                        <span class="fa fa-arrows-alt-v"></span>\n' +
                        '                    </button>\n' +
                        '                </div>\n' +
                        '\n' +
                        '\n' +
                        '                <div class="btn-group">\n' +
                        '                    <button type="button" class="btn btn-primary" data-method="reset" title="' + escapeHtml(sReset) + '">\n' +
                        '                        <span class="fa fa-sync-alt"></span>\n' +
                        '                    </button>\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '            <div class="img-preview-container">\n' +
                        '                <div class="img-preview preview-lg"></div>\n' +
                        '            </div>\n' +
                        '        </div>\n' +
                        '\n' +
                        '\n' +
                        '    </form>\n' +
                        '</div>';
                }


                s += '' +
                    '        </div>';
                this.container.append(s);


                // injecting i18n text
                this.container.find(".text-start-upload").html(this.lang.get("Start upload"));
                this.container.find(".text-select-files").html(this.lang.get("Select files"));
                this.container.find(".dropzone-droptext").html(this.lang.get("Drag files here"));
                this.container.find(".text-file").html(this.lang.get("file(s)"));
                this.container.find(".cell-name").html(this.lang.get("filename"));
                this.container.find(".cell-status").html(this.lang.get("status"));
                this.container.find(".cell-size").html(this.lang.get("size"));

                var defaultView = options.defaultView || "text";
                this._selectView(defaultView);

                if (true === options.showHiddenInput) {
                    this.container.find('.hidden-inputs').show();
                }


                //----------------------------------------
                // JS LISTENERS
                //----------------------------------------
                this.container.on('click', function (e) {
                    var jTarget = $(e.target);
                    if (jTarget.hasClass('btn-view-text')) {
                        $this._selectView("text");
                        return false;
                    } else if (jTarget.hasClass('btn-view-image')) {
                        $this._selectView("image");
                        return false;
                    }
                });


                // listener for the file editor
                //----------------------------------------
                if (true === this.useFileEditor) {

                    var sSubmit = this.lang.get("Submit");
                    var sCancel = this.lang.get("Cancel");

                    this.fileEditorDialog = this.container.find(".dialog-file-editor").dialog({
                        autoOpen: false,
                        modal: true,
                        draggable: true,
                        open: function () {

                            if (true === $this.fileEditorDialogOpenOptions.showCropper) {
                                $this.fileEditorDialog.find('.image-editor-container').show();
                            } else {
                                $this.fileEditorDialog.find('.image-editor-container').hide();
                            }

                            if (true === $.isFunction($this.fileEditorDialogOpenOptions.onOpenAfter)) {
                                $this.fileEditorDialogOpenOptions.onOpenAfter($this.fileEditorDialog.parent());
                            }
                            $('.ui-widget-overlay').css({opacity: '.5'});


                        },
                        classes: {
                            "ui-dialog": "file-editor",
                        },
                        buttons: [
                            {
                                text: $this.lang.get("Loading in progress: {x}%", null, {
                                    'x': 0,
                                }),
                                click: function () {
                                },
                                class: "fileeditor-uploader-progress",
                            },
                            {
                                text: sSubmit,
                                click: function () {
                                },
                                class: "the-submit-button",
                            },
                            {
                                text: sCancel,
                                click: function () {
                                    $this.fileEditorDialog.dialog("close");
                                },
                            },
                        ],
                    });


                    this.fileEditorDialog.on('click', function (e) {
                        var jTarget = $(e.target);
                        if (jTarget.hasClass('btn-close-error')) {
                            jTarget.closest(".file-editor-error").remove();
                            return false;
                        }
                    });
                }


            },
            /**
             * This method must be called after the buildFileUploader method.
             */
            getFileEditorDialog: function () {
                return this.fileEditorDialog;
            },
            addFile: function (oFile) {

                var itemId = oFile.itemId;
                var jUlText = this.container.find('.dropzone-text-container ul');
                var s = '' +
                    '<li class="dropzone-text-item-container fileuploader-item" data-id="' + itemId + '">\n' +
                    '    <div class="cell-name">Filename</div>\n' +
                    '    <div class="cell-status"></div>\n' +
                    '    <div class="cell-size">15 kb</div>\n' +
                    '    <div class="cell-action">\n';

                if (true === this.useFileEditor) {
                    s += '<button class="btn-edit-file"><i class="btn-edit-file fas fa-edit"></i></button>\n';
                }
                s += '    <button class="btn-remove-file"><i\n' +
                    '    class="fas fa-minus-circle btn-remove-file"></i>\n' +
                    '    </button>\n';


                s += '    </div>\n' +
                    '</li>';
                var jLi = $(s);


                var fileName = basename(oFile.name);

                jLi.find('.cell-name').html(fileName);
                jLi.find('.cell-size').html(formatBytes(oFile.size));
                jUlText.append(jLi);


                var jImageContainer = this.container.find('.filelist');
                s = '' +
                    '<div class="dropzone-image-item-container fileuploader-item" data-id="' + itemId + '">\n' +
                    '    <div class="cell-image"></div>\n' +
                    '    <div class="cell-name">\n' +
                    '    </div>\n' +
                    '    <div class="cell-size">15 kb</div>\n' +
                    '    <div class="cell-action">\n';

                if (true === this.useFileEditor) {
                    s += '<button class="btn-edit-file"><i class="btn-edit-file fas fa-edit"></i></button>\n';
                }
                s += '        <button class="btn-remove-file"><i class="fas fa-minus-circle btn-remove-file"></i>\n' +
                    '        </button>\n';
                s += '    </div>\n' +
                    '</div>';

                var escapedName = escapeHtml(oFile.name);
                var jDiv = $(s);
                jDiv.find('.cell-name').html(fileName);
                jDiv.find('.cell-name').attr("title", escapedName);
                jDiv.find('.cell-size').html(formatBytes(oFile.size));


                // image or not?
                if (true === fileIsImage(oFile)) {
                    var reader = new FileReader();
                    reader.addEventListener("load", function (e) {

                        var jImg = $('<img class="cell-image-img" src="" alt="' + escapeHtml(escapedName) + '">');
                        jImg.attr("src", e.target.result);
                        jDiv.find(".cell-image").append(jImg);

                    }, false);
                    reader.readAsDataURL(oFile);
                } else {
                    jDiv.find(".cell-image").html('<i class="far fa-file fa-5x"></i>');
                }


                jImageContainer.append(jDiv);

            },
            updateFooterInfo: function (files) {

                var msg;
                var nbFiles = files.length;
                var nbQueuedFiles = 0;
                var filesWeight = 0;
                for (var i in files) {
                    var oFile = files[i];
                    filesWeight += oFile.size;
                    if ('undefined' === typeof oFile.id) {
                        nbQueuedFiles++;
                    }
                }


                this.container.find('.global-number-of-files').html(nbFiles);
                this.container.find('.global-size').html(formatBytes(filesWeight));

                if (0 === nbQueuedFiles) {
                    msg = this.lang.get("Add files");
                    this.container.find('.global-percent-upload').html("0 %");
                } else {
                    msg = this.lang.get("{x} files queued", nbQueuedFiles);
                }
                this.container.find('.text-add-file').html(msg);
            },
            removeFileByIndex: function (index) {

                var jText = this.container.find(".dropzone-text");
                var jImage = this.container.find(".dropzone-image");
                jText.find(".fileuploader-item").eq(index).remove();
                jImage.find(".fileuploader-item").eq(index).remove();

            },
            addHiddenInput: function (url, id) {
                var jHiddenContainer = this.container.find('.hidden-inputs');
                var name = this.fileUploader.options.name;
                var maxFile = this.fileUploader.options.maxFile;
                if (1 !== maxFile) {
                    name += '[]';
                }
                var s = '';
                s += '<input type="text" name="' + name + '" value="' + escapeHtml(url) + '" data-id="' + id + '">';
                jHiddenContainer.append(s);
            },

            removeHiddenInputById: function (id) {
                var jInputContainer = this.container.find('.hidden-inputs');
                jInputContainer.find('[data-id="' + id + '"]').remove();
            },
            refreshProgress: function (oFile, percent, loaded, total, globalPercent) {
                var itemId = oFile.itemId;
                var jItem = this.container.find('.dropzone-text-container .fileuploader-item-container').find('.fileuploader-item[data-id="' + itemId + '"]');
                jItem.find('.cell-status').html(percent + " %");
                this.container.find('.global-percent-upload').html(globalPercent + " %");
            },
            onRefreshDialogProgressBefore: function (jDialog, oFile) {
                jDialog.find('.fileeditor-uploader-progress').show();
            },
            refreshDialogProgress: function (jDialog, oFile, percent, loaded, total) {
                jDialog.find('.fileeditor-uploader-progress').html(this.lang.get("Loading in progress: {x}%", null, {
                    'x': percent,
                }));
            },
            reorderFiles: function (oFiles, oldIndex, newIndex) {

                // recreate hidden inputs
                this._clearHiddenInputs();
                for (var i in oFiles) {
                    var oFile = oFiles[i];
                    if ("undefined" !== typeof oFile.id) {
                        this.addHiddenInput(oFile.url, oFile.id);
                    }
                }


                var jTarget = this.container.find(".last-dragged-item");
                var jContainer;
                if (true === jTarget.parent().parent().hasClass("dropzone-image")) {
                    jContainer = this.container.find('.dropzone-text-container .fileuploader-item-container');
                } else {
                    jContainer = this.container.find('.dropzone-image .fileuploader-item-container');
                }

                var jMoved = jContainer.find('.fileuploader-item').eq(oldIndex);
                var jPivot = jContainer.find('.fileuploader-item').eq(newIndex);
                if (newIndex > oldIndex) {
                    jMoved.insertAfter(jPivot);
                } else {
                    jMoved.insertBefore(jPivot);
                }
            },
            hideUploadButton: function () {
                this.container.find("button.btn-start-upload").hide();
            },
            enableUploadButton: function () {
                this.container.find("button.btn-start-upload").prop("disabled", false);
            },
            disableUploadButton: function () {
                this.container.find("button.btn-start-upload").prop("disabled", true);
            },
            /**
             * This method must be called before the buildFileUploader method.
             * The fileEditorOptions are described in the fileuploader.js file.
             */
            enableFileEditor: function (fileEditorOptions) {
                this.useFileEditor = true;
                this.fileEditorOptions = fileEditorOptions;
            },
            /**
             * Options are:
             * - showCropper: optional, bool=false, whether to show the cropper tool
             * - onOpenAfter: optional, cb = null, a callback to execute once the file editor dialog is opened
             */
            openFileEditorDialog: function (options) {

                options = $.extend({}, {
                    showCropper: false,
                    onOpenAfter: null,
                }, options);

                var screenWidth = $(window).width();
                var dialogWidth = screenWidth * 60 / 100;
                this.fileEditorDialogOpenOptions = options;
                this.fileEditorDialog.dialog("option", "width", dialogWidth);
                this.fileEditorDialog.dialog("open");

            },
            /*
             * @param options: the fileEditor options
             */
            initializeFileEditor: function (oFile, jDialog, options) {

                var $this = this;

                jDialog.find('.fileeditor-uploader-progress').hide();

                if (true === options.useFileName) {
                    var fileName = options.fileName;
                    if (null === fileName) {
                        fileName = oFile.name;
                    }


                    var fileInfo = getFileInfoByRelativePath(fileName, options.parentDir);

                    var baseName = fileInfo.baseName;
                    var extension = fileInfo.extension;

                    if (null === options.parentDir) {
                        jDialog.find('.control-dirname').hide();
                    } else {
                        jDialog.find('.control-dirname').show();
                        jDialog.find(".element-dirname").html(options.parentDir);
                    }


                    jDialog.find(".input-basename").val(baseName);

                    if ('' !== extension) {
                        jDialog.find(".input-extension")
                            .show()
                            .prop('disabled', false)
                            .attr("value", extension)
                            .prop('disabled', true);
                    } else {
                        jDialog.find(".input-extension").hide();
                    }
                }

                if (true === options.useTags) {

                    var jSelect = jDialog.find(".select-tags");

                    var tags = oFile.tags || options.tagsDefaultValue;
                    if (jQuery.isArray(tags)) {
                        jSelect.empty();
                        for (var i in tags) {
                            var tag = tags[i];
                            jSelect.append('<option value="' + escapeHtml(tag) + '" selected="selected">' + tag + '</option>')
                        }
                    }


                    var select2Options = {};
                    if (options.availableTags && jQuery.isArray(options.availableTags)) {
                        select2Options.data = toSelect2Data(options.availableTags);
                    }


                    if (true === options.allowCustomTags) {
                        select2Options["tags"] = true;
                    }
                    if (null !== options.tagsMaxLength) {
                        select2Options["maximumSelectionLength"] = parseInt(options.tagsMaxLength);
                    }

                    jSelect.select2(select2Options);
                }


                if (true === options.usePrivacy) {
                    var isPrivate = options.privacyDefaultValue;
                    if ('undefined' !== typeof oFile.is_private) {
                        isPrivate = oFile.is_private;
                    }

                    if (1 === parseInt(isPrivate)) {
                        jDialog.find(".input-privacy").prop('checked', true);
                    } else {
                        jDialog.find(".input-privacy").prop('checked', false);
                    }
                }


                var showOriginalToggle = false;
                if (true === options.useOriginalToggle) {
                    if (true === fileIsImage(oFile)) {
                        if ('undefined' !== typeof oFile.original_url && '' !== oFile.original_url) {
                            showOriginalToggle = true;
                        }
                    }
                }


                var jOriginal = jDialog.find('.control-original-toggle');
                if (true === showOriginalToggle) {
                    jOriginal.show();
                    var isChecked = options.originalDefaultValue;
                    if ('undefined' !== typeof oFile.original_checked) {
                        isChecked = !!oFile.original_checked;
                    }
                    var jOriginalToggle = jDialog.find('.input-original-toggle');
                    jOriginalToggle.prop('checked', isChecked);

                    jOriginalToggle.off('change').on('change', function () {
                        var isChecked = $(this).prop('checked');
                        $this.fileUploader.events.dispatch("theme.onFileEditorOriginalImageToggleSwitched", isChecked, jDialog, oFile);
                    });


                } else {
                    jOriginal.hide();
                }

            },
            showFileEditorOriginalImageToggle: function (jDialog) {
                jDialog.find(".control-original-toggle").show();
            },
            hideFileEditorOriginalImageToggle: function (jDialog) {
                jDialog.find(".control-original-toggle").hide();
            },
            /**
             * Returns a map of values representing the form.
             * Those values are (depending on the file editor options):
             * - is_private: string = 0|1
             * - tags: array
             * - filename: string
             *
             *
             */
            getFileEditorFormValues: function () {

                var jDialog = this.fileEditorDialog;
                var o = this.fileEditorOptions;


                var ret = {};

                if (true === o.useFileName) {
                    var jExtension = jDialog.find('.input-extension');
                    jExtension.prop("disabled", false);
                    var extension = jExtension.val();
                    jExtension.prop("disabled", true);


                    var filename = jDialog.find('.input-basename').val();
                    if ("" !== extension) {
                        filename += "." + extension;
                    }
                    ret.filename = filename;
                }


                if (true === o.usePrivacy) {
                    var isPrivate = jDialog.find('.input-privacy').prop('checked');
                    ret.is_private = parseInt(isPrivate * 1); // https://stackoverflow.com/questions/24576189/why-parseint-doesnt-convert-true-to-number-while-multiplying-does
                }

                if (true === o.useTags) {
                    ret.tags = jDialog.find('.select-tags').val();
                }


                return ret;
            },
            addFileEditorError: function (errMsg) {
                var s = '<div class="file-editor-error">' +
                    '    <span>' + errMsg + '</span>' +
                    '    <span class="btn-close-error"><i class="btn-close-error far fa-window-close"></i></span>' +
                    '</div>';
                this.fileEditorDialog.find(".file-editor-error-container").append(s);
            },
            closeFileEditorDialog: function (jDialog, oFile) {
                this.fileEditorDialog.dialog("close");
            },
            //----------------------------------------
            //
            //----------------------------------------
            _selectView: function (type) {
                var jText = this.container.find(".dropzone-text");
                var jImage = this.container.find(".dropzone-image");
                if ('text' === type) {
                    jText.addClass('visible');
                    jImage.removeClass('visible');
                } else {
                    jImage.addClass('visible');
                    jText.removeClass('visible');
                }
            },
            _clearHiddenInputs: function () {
                this.container.find('.hidden-inputs').empty();
            },
        };


        // auto-registration of the default theme
        window.FileUploaderThemes.default = new FileUploaderTheme_Default();
    })();
}



