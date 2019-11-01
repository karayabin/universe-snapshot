/**
 * fileUploader plugin
 * ===========
 * 2019-07-31
 *
 *
 *
 * Browser compatibility
 * --------
 * The fileUploader plugin uses the html5 file api, which in IE is available only since IE 10.
 * https://caniuse.com/#feat=fileapi
 * So, if you need to support IE9 for instance, please use another plugin...
 *
 *
 *
 * Sources
 * -----------
 * https://developer.mozilla.org/en-US/docs/Web/API/File/Using_files_from_web_applications
 * http://significanttechno.com/file-upload-progress-bar-using-javascript
 *
 *
 *
 *
 * The plugin in a nutshell
 * ------------
 *
 * Upload the files where you want via this plugin.
 *
 * This plugin basically provides you with:
 *
 * - a callback when the files are received (so that you can decide whether or not to trigger
 *      the upload based on some validation rules, like if the file weight is too big...)
 * - a callback to handle the progress of the upload (so that you can display a progress bar)
 * - a callback to handle a successful/not successful upload (so that you can display a thumbnail of the uploaded image
 *      for instance, or an error message if the backend server responded with an error)
 *
 * - you can define an element as a dropzone
 *
 * - default message errors are generated for the most common validations (wrong mime type, file size problem)
 * - a default error container to display error messages when they occur
 * - a callback for handling error messages if you don't want to use the default error container
 * - there are some other modules that you can activate/de-activate for free before implementing your own logic.
 *
 *
 *
 * How does it work?
 * ---------
 *
 * ### Step 1: onReceive
 *
 * When the user clicks on the input file (or drops a file into the dropzone), the onReceive callback is called
 * for each file.
 * Note: don't forget to add the multiple html attribute to your input if you want to allow multiple files upload.
 *
 *
 * By default it will return true, which means that the file is valid.
 *
 * If the file is valid, then it's uploaded to the backend server (step 2).
 *
 * To prevent the file from being uploaded, make the onReceive callback return false.
 *
 * Since the validation errors are pretty much the same for every upload (file too big, wrong mime type),
 * I provide some built-in error messages.
 *
 *
 * However, the language in which you want to display them might vary, so I provide them in english only,
 * and then you use the dict object to provide the translation if necessary.
 *
 * #### The dict object
 * The dict object basically contains all the strings that are meant to be displayed to the user.
 * The dict object contains strings related to:
 * - the validation error messages
 *
 *
 *
 * If you want to provide your own error messages, based on your own rules,
 * simply use the this.appendError method from the onReceive callback.
 *
 *
 *
 * So what are the built-in options we can use?
 *
 * - maxFile: int = -1, the maximum number of files that we want.
 *          If -1, it means we can upload as many as we want.
 *
 *
 * - maxFileSize: int = -1, the maximum number of bytes per file. Use -1 (negative one) to allow any size.
 *              An error message will be generated if the size of the selected file is more than the maxFileSize value.
 *              The error message displayed to the user is customized using the "dict.maxFileSizeExceeded" key.
 *              The following tags can be used in the error message:
 *              - {fileName}: the name of the file
 *              - {fileSize}: the current file size value formatted (with the most relevant unit)
 *              - {maxSize}: the max file size value formatted (with the most relevant unit)
 *
 *
 * - mimeType: array|null, the list (javascript array []) of allowed mime types.
 *              By default, mimeType equals null, which means all mime types are allowed.
 *              An error message is generated when a file's mime type is not in the allowed mime type list.
 *              The error message is dict.wrongMimeType, and uses the following tags:
 *              - {allowedMimeTypes}: the comma separated list of allowed mime types
 *              - {fileName}: the name of the file
 *              - {fileMimeType}: the mime type of the current file
 *
 *
 *
 * ### Step 2: onProgress
 *
 * Assuming that step 1 went ok, and the onReceive callback returned true, then the files are uploaded.
 * You can use the onProgress callback (which is triggered for each file individually) to get access to the progress
 * data of the file while it's being uploaded.
 *
 *
 * ### Step 3: onComplete
 *
 * When the file is uploaded (i.e. when it is sent successfully to the backend server), this plugin expects a
 * response from the back end server. The response is a json array, which structure depends on the type of response:
 *
 * - in case of success, the json array structure should be:
 *      - type: success
 *      - url: (the url to the uploaded file treated by the server)
 *
 * - in case of error, the json array structure should be:
 *      - type: error
 *      - message: (the error message here...)
 *
 *
 * The onSuccess callback is fired for every file that is successfully uploaded (i.e. meaning the server has
 * returned a successful response for that file).
 *
 *
 *
 * Some built-in modules
 * =================
 *
 * All the modules below are not active by default.
 * If you want to use them, you need to activate them manually using the corresponding option (which starts with the "use" prefix).
 *
 *
 * Error handling
 * ----------------
 * At any moment, when an error occurs (i.e. when the addError method has been called) the onError callback is fired,
 * so that you can create any error handling system that you like.
 * By default though, I provide the following error system, which you can enable using the useErrorContainer option:
 * every time an error occurs, it is appended to an error container.
 * Every time new files are selected, the error container is flushed out so that it can show only the
 * relevant error messages.
 *
 * The error container can be any element that you like.
 * It is hidden by default, but becomes visible when/if an error occurs.
 * The error container contains the error list container, which is where the errors are appended.
 *
 * In other words, the error container is like the wrapper, it can have a title, like for instance:
 * Oops, the following error occurred.
 * And the error list container is for instance the ul element inside this wrapper, and to which the error messages
 * are appended.
 * The error message is created using a template that you define.
 *
 * Use the following options to configure the error container system according to your needs:
 *
 * - useErrorContainer: bool, whether to activate this module
 * - errorContainer: the jquery object representing the error container (the wrapper containing the title and the list container)
 * - errorListContainer: string = ul, the jquery selector to use to target the error list container element (the error message container),
 *          the jquery context being the errorContainer object.
 * - errorMessageTemplate: string|callable. The template used to create each error message. Each error message being
 *          then appended to the error list container.
 *          If errorMessageTemplate is a string, we can use the {message} tag, which will be replaced with the actual message.
 *          If errorMessageTemplate is a callable, it takes the error message as an argument, and should return the
 *          error message html code (that we inject directly to the error list container).
 *
 *
 *
 *
 * Dropzone
 * --------
 * If you wish to, you can create any element and turn it into a drop zone.
 * To do so, you need to pass the jquery object representing the dropzone to this plugin, using the dropzone option.
 *
 * In order to help you style it, a css class is added when the mouse is dragging over the drop zone.
 * This css class is "over" by default, and is appended to the dropzone element.
 * You can change the css class being added using the "dropzoneOverClass" option.
 *
 *
 * AjaxForm
 * -----------
 * The technique used by this plugin to upload files is to create a form (called ajax form) for every file uploaded.
 * So basically, the file is validated, then the plugin creates an ajax form for that file, and sends the form
 * via XMLHttpRequest to the backend server.
 * And so, like with any form, we can add data to the form before it's being sent.
 * This ajax form can be seen as an array of key/value pairs.
 * By default, the created array contains only one key (with the name "item"), which holds the file to upload.
 *
 * Now, we can add extra fields to that form, for instance if we want to add a csrf token (and we should do so
 * by the way, otherwise we would have a csrf issue).
 *
 * Most of the options related to the ajax form start with the "ajaxForm" prefix.
 *
 * Note: the form will be received in the $_FILES super array in a php backend.
 *
 *
 *
 * Progress handler
 * -----------------
 * Because creating a progress system from scratch can take some time, this plugin provides a built-in mechanism
 * which displays the progress of the items as they are uploaded.
 *
 * This mechanism is off by default, and must be activated using the "useProgressHandler" option.
 * When the "useProgressHandler" option is set to true, the mechanism is activated, and works like explained below.
 *
 * This progress handler displays a zone dedicated to showing the progress of the uploaded files.
 *
 * There is a progress handler container. This is the (html) element which will contain all the progress bars.
 * If you use the progress handler, you must create this element in your html, and pass the jquery object referencing
 * this container to this plugin, using the "progressHandlerContainer" option.
 *
 * Then, when at least one file is being uploaded, the base template is appended to this container.
 * The base template like the skeleton/body of the container. By default, this skeleton displays a title,
 * and a zone where to append all progress items.
 *
 *
 * The skeleton must contain a zone (called list container) where all the progress bar will be injected.
 * The skeleton is defined with the "progressHandlerContainerTemplate" option.
 *
 * By default, I use a bootstrap4 template, as bootstrap is a very common framework (plus, it's the one I'm using
 * at the moment, so at least this plugin's defaults will fit my needs).
 * However, just hook into this option to change the skeleton template as you like.
 *
 * Now the progress bars will be injected in the list container (which is inside the container skeleton).
 * We use the "progressHandlerListContainerSelector" option, to help the plugin access the list container.
 * The "progressHandlerListContainerSelector" option is a jquery selector which targets the list container, in the
 * context of the container skeleton.
 *
 * Now, every time a file is being uploaded, a new progress item is appended to the list container.
 * A progress item can have one of three different states:
 *
 * - progressing: the first state of the item, the file is being uploaded
 * - completed: this state is reached when the file has been successfully uploaded
 * - erroneous: an error occurred, and the upload was aborted/cancelled for some reason.
 *          When this happens, this plugin will distinguish between two cases (corresponding to the corresponding ajax javascript event handlers):
 *                  - abort: the file uploaded was aborted for some reason.
 *                              In this case, the error message sent is defined with the "dict.uploadAborted" option.
 *                              The available tags are:
 *                              - {fileName}: the name of the file
 *                  - error: an error occurred during the upload for some reason.
 *                              In this case, the error message sent is defined with the "dict.uploadError" option.
 *                              The available tags are:
 *                              - {fileName}: the name of the file
 *
 *
 * Note: the state of the item will transit from progressing to completed/erroneous (this plugin handles this transition automatically),
 * depending on how the file upload evolves.
 *
 * The progress item template is defined with the "progressHandlerListItemTemplate" option.
 * The template can use the following variables:
 * - {iconClass}: a css class representing an icon
 * - {fileName}: the name of the file
 * - {fileSize}: the size of the file (using the most appropriate unit)
 * - {progressBarClass}: a css class to add to the progress bar
 * - {percent}: the percentage of the file being uploaded
 *
 * Some of those variables (iconClass and progressBarClass) might depend on the state of the item.
 * Therefore, we can specify how those variables are affected by the state of the item using the "progressHandlerListItemVariables" option.
 * This option is a javascript object with 3 entries (one per state), each entry defining the two variables.
 * For example, the default value of this option is:
 *
 * - progressing:
 *      - iconClass: fas fa-spinner fa-spin text-blue
 *      - progressBarClass: bg-blue
 * - completed:
 *      - iconClass: fas fa-check text-green
 *      - progressBarClass: bg-green
 * - erroneous:
 *      - iconClass: fas fa-exclamation-triangle text-red
 *      - progressBarClass: bg-red
 *
 *
 * Bear in mind that this progress handler is the most complex handler to configure.
 * Take your time to understand how it works, and see if it can save you some time.
 *
 * Note: I believe that an item that is uploaded completely will make it to the backend server,
 * whereas an aborted/erroneous item won't, although I didn't verify yet if that's actually true.
 *
 *
 *
 *
 * Url to Form
 * ---------------
 *
 * This built-in module will basically convert the json response from the server into input hidden fields in the target
 * form.
 *
 * This might be useful for when you submit the form, if you want to get the result of your ajax upload in the posted data.
 * Note: this might not be what you want though, for instance if you store the data directly from the backend service,
 * you might not need this module.
 *
 * However if you need to treat all the posted data including the ones from the ajax upload form, then this module might help.
 *
 *
 * The maximum number of fields created is governed by the maxFile option.
 * The html name attribute of the generated input will be suffixed with the brackets ([]) if maxFile > 1.
 * In other words, if maxFile = 1, then this module will generate one (and only one) input field which will create
 * a scalar entry when the form is submitted,
 * but if maxFile > 1, this module will generate (at most) $maxFile fields which will create an array when the form is submitted.
 * Note: the trick to do that is simply to add the brackets ([]) at the end of the html name.
 * If you want to use this module, you also need to define an html element that will contain them and pass its
 * jquery reference to the "urlToFormContainer" option.
 *
 * The html name of the field to create is defined with the "urlToFormFieldName" option, and defaults to "the_file".
 *
 * We can add a default value, using the "defaultValue" option, so that the plugin displays the input(s) corresponding
 * to that value right away (i.e. when the form is loaded for the first time).
 *
 *
 *
 * File visualizer
 * ---------------
 * This module creates a thumbnail for every file uploaded.
 * It's disabled by default. To enable this module set the "useFileVisualizer" option to true.
 * If you do so, you also need to specify the fileVisualizerContainer option, which accepts a jquery object reference
 * representing the container element.
 *
 * The user can (by default) delete the thumbnail by clicking the delete button on the right top corner of each thumbnail.
 * This will remove the thumbnail, and the corresponding urlToForm item (if the urlToForm module is activated).
 *
 * How does it work?
 * When the user uploads a file, the js client (this plugin) sends the file to the server which responds back with
 * either a positive response or a negative response.
 * A negative response indicates that the file couldn't be uploaded, and will result in showing an error message in the gui,
 * and a thumbnail will never be created in this case.
 *
 * A positive response however indicates that the file has been successfully uploaded on the server, and the server sends
 * back the url of the uploaded file.
 *
 * This module then creates the corresponding thumbnail and displays it in a container element.
 * A maximum number of maxFile thumbnails will be drawn.
 * When the user uploads more than maxFile files, the first thumbnail is removed and the new one is appended at the end,
 * so that there is a rotation which ensures that there is always a maximum of $maxFile thumbnails in the visualizer container.
 *
 * How do the thumbnail look?
 *
 * You decide.
 * There are two templates that let you control the appearance of the thumbnail: one is used if the uploaded file is
 * an image (jpg, png, gif, bmp), and the other in case the uploaded file is not an image.
 * Those two templates you can define using the
 * fileVisualizerImageTemplate and fileVisualizerNotImageTemplate options.
 *
 * I provide some default values for those.
 * Speaking of default values, I provide a whole built-in theme for the file visualizer, and to use it you just
 * need to add the ".file-uploader-filevisualizer" css class to your container (referenced by the "fileVisualizerContainer" option).
 * The theme I created can be found in the fileuploader.scss file.
 *
 * Then you can add the ".w100" css class to the container, in order to specify that you want the thumbnails to be
 * of width 100. Look at the css code to see how it's done, and should you want to have thumbnails of a different size,
 * you could simply do it from the css by copy-pasting the ".w100" class and creating your own from there.
 *
 *
 * If the uploaded file is not an image, we can be very specific and display a different thumbnail depending
 * on the file extension, using the fileVisualizerExtension2icon option.
 * Or if we don't need that much control, we can just define a fallback extension for all non-image files, using the
 * fileVisualizerFallbackIcon option.
 * Those options define the class of an icon that is applied to an "i" tag.
 * This module provides the following default values:
 *
 * - fileVisualizerFallbackIcon: far fa-file-alt
 * - fileVisualizerExtension2icon:
 *      - doc: far fa-file-word
 *      - docx: far fa-file-word
 *      - mp4: far fa-file-video
 *      - wmv: far fa-file-video
 *      - ... (have a look at the default options in the source code below for the full list)
 *
 *
 *
 * Last but not least, we can decide whether the user has the ability to remove the thumbnail using the fileVisualizerAllowDeleteAction option,
 * which is true by default.
 *
 * Now all this applies only if you use the default template.
 * However, if you customize your file visualizer templates, you can use the following tags to yield similar capabilities:
 *
 * - {fileUrl}: the url of the file
 * - {fileUrlEscaped}: the url of the file ready to be inserted in src or href attributes (i.e. the html special chars are protected)
 * - {fileName}: the name of the file
 * - {fileSize}: the size of the file in a human appropriated unit
 * - {iconClass}: the icon class chosen by the module algorithm.
 *              If the uploaded file is an image, this option is set to an empty string.
 *              If the uploaded file is not an image, this option is set to either a value from the fileVisualizerExtension2icon option (if
 *              the extension of the uploaded file is in this array), or the fileVisualizerFallbackIcon otherwise.
 * - {allowDelete}: delete-allowed|delete-not-allowed. A string that indicates the value of the "fileVisualizerAllowDeleteAction" option.
 *                  I use it in the default templates to hide (from the css) the close button if the option is set to false.
 *
 *
 *
 * Also, the ".fileuploader-close-button" class can be added to any element, and it will transform this element into
 * the trigger to remove the thumbnail (see how it's done in the default template: the fileVisualizerImageTemplate option).
 *
 *
 * Note: the "defaultValue" option can be used to setup the file visualizer with some files when the form control is loaded
 * for the first time.
 *
 * Note: the "defaultValue" option is used by both the urlToForm module and the fileVisualizer module.
 *
 *
 *
 *
 *
 *
 */
;(function ($, window, document, undefined) {


    var pluginName = 'fileUploader';


    //----------------------------------------
    // UTILS
    //----------------------------------------
    // https://stackoverflow.com/questions/15900485/correct-way-to-convert-size-in-bytes-to-kb-mb-gb-in-javascript
    function formatBytes(bytes, decimals) {
        if (0 === bytes) {
            return "0 Bytes";
        }
        var c = 1024, d = decimals || 2, e = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"],
            f = Math.floor(Math.log(bytes) / Math.log(c));
        return parseFloat((bytes / Math.pow(c, f)).toFixed(d)) + " " + e[f]
    }

    // https://stackoverflow.com/questions/1787322/htmlspecialchars-equivalent-in-javascript
    function escapeHtml(text) {
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
    }


    function stripQuotes(a) {
        if (a.charAt(0) === '"' && a.charAt(a.length - 1) === '"') {
            return a.substr(1, a.length - 2);
        }
        return a;
    }

    var imageExtensions = ["jpg", "jpeg", "png", "gif", "bmp"];

    //----------------------------------------
    // FILE UPLOADER PLUGIN
    //----------------------------------------
    function Plugin(element, options) {

        this.element = element;
        this._name = pluginName;
        this._defaults = $.fn.fileUploader.defaults;
        this.options = $.extend({}, this._defaults, options);

        this.init();

    }

    // Avoid Plugin.prototype conflicts
    $.extend(Plugin.prototype, {

        init: function () {
            var $this = this;


            //----------------------------------------
            // MODULES SETUP
            //----------------------------------------

            // progress handler setup
            var jProgressContainer = null;
            var jProgressListContainer = null;
            var progressLiveMap = {};
            if (true === $this.options.useProgressHandler) {
                jProgressContainer = $this.options.progressHandlerContainer;
                if (!(jProgressContainer instanceof jQuery)) {
                    throw new Error("The progressHandlerContainer must be an instance of jquery.");
                }
            }


            // url to form setup
            var maxFile = this.options.maxFile;
            var jUrlToFormContainer = null;
            if (true === $this.options.useUrlToForm) {
                jUrlToFormContainer = this.options.urlToFormContainer;

                // default value?
                if ('' !== this.options.defaultValue) {
                    var defaultValue = this.options.defaultValue;
                    var name = $this.options.urlToFormFieldName;
                    if (maxFile > 1) {
                        name += "[]";
                    }

                    if ("string" === typeof defaultValue) {
                        defaultValue = [defaultValue];
                    }

                    for (var key in defaultValue) {
                        var url = defaultValue[key];
                        var input = '<input type="hidden" name="' + name + '" value="' + escapeHtml(url) + '"/>';
                        var jInput = $(input);
                        jUrlToFormContainer.append(jInput);
                    }
                }
            }


            // file visualizer setup
            var jFileVisualizer = null;
            if (true === $this.options.useFileVisualizer) {
                jFileVisualizer = this.options.fileVisualizerContainer;
                jFileVisualizer.on('click', '.fileuploader-close-button', function (e) {
                    /**
                     * If the user deletes a thumbnail, it also deletes the urlToForm item (if the urlToForm module
                     * is activated).
                     *
                     */
                    var jThumbnail = $(e.target).closest('.fileuploader-thumbnail');
                    $this.fileVisualizerRemoveItem(jThumbnail);

                    return false;
                });


                // default value?
                if ('' !== this.options.defaultValue) {
                    var _defaultValue = this.options.defaultValue;

                    if ("string" === typeof _defaultValue) {
                        _defaultValue = [_defaultValue];
                    }


                    for (var _key in _defaultValue) {
                        var _url = _defaultValue[_key];
                        var _fileName = _url.split('/').pop();


                        var req;
                        req = $.ajax({
                            type: "HEAD",
                            url: _url,
                            success: function () {


                                /**
                                 * Sometimes, you use a php service to provide the uploaded file, such as in:
                                 * http://jindemo/user-data?file=images%2Favatar.png&id=%242y%2410%24MLxVef2wksJhoQP%2FHSaT8u%2FCQVmMbz9YHPYN.rRkHw.OFJ6aJHBD6
                                 * In this case, the service might have provided the real filename via content-disposition,
                                 * which might look something like this:
                                 *
                                 * - inline; filename="avatar.png"
                                 *
                                 */
                                var contentDispo = req.getResponseHeader("Content-Disposition");
                                if (null !== contentDispo) {
                                    var p = contentDispo.split('filename=');
                                    if (2 === p.length) {
                                        _fileName = p.pop();
                                        _fileName = stripQuotes(_fileName);
                                    }
                                }


                                var fileSize = req.getResponseHeader("Content-Length");
                                $this.fileVisualizerAddItem(jFileVisualizer, _url, _fileName, fileSize);
                            }
                        });
                    }
                }
            }


            //----------------------------------------
            // MAIN FILE UPLOAD HANDLER FUNCTION
            //----------------------------------------
            var handleFiles = function (files) {

                // hide the error container every time the user tries new files.
                if (true === $this.options.useErrorContainer) {
                    $this.clearErrorContainer();
                    $this.hideErrorContainer();
                }


                // empty the progress container every time the user tries new file
                if (true === $this.options.useProgressHandler) {
                    jProgressContainer.empty();
                    progressLiveMap = {};
                }


                var maxFileSize = $this.options.maxFileSize;
                var allowedMimeTypes = $this.options.mimeType;
                if ('string' === typeof allowedMimeTypes) {
                    allowedMimeTypes = [allowedMimeTypes];
                }
                var tags = {};


                var numFiles = files.length;

                for (var i = 0; i < numFiles; i++) {
                    var thefile = files[i];

                    (function (file, index) {

                        var idProgressItem = 'id-progress-item-' + index;
                        var isValid = true;

                        //----------------------------------------
                        // VALIDATION
                        //----------------------------------------
                        // built-in mechanisms
                        if (-1 !== maxFileSize && file.size > maxFileSize) {
                            tags = {
                                "fileName": '<strong>' + file.name + '</strong>',
                                "maxSize": formatBytes(maxFileSize),
                                "fileSize": formatBytes(file.size),
                            };
                            $this.addErrorByFormatString($this.options.dict.maxFileSizeExceeded, tags);
                            isValid = false;
                        }

                        if (null !== allowedMimeTypes && -1 === allowedMimeTypes.indexOf(file.type)) {
                            tags = {
                                "fileName": '<strong>' + file.name + '</strong>',
                                "fileMimeType": '<strong>' + file.type + '</strong>',
                                "allowedMimeTypes": allowedMimeTypes.join(', '),
                            };
                            $this.addErrorByFormatString($this.options.dict.wrongMimeType, tags);
                            isValid = false;
                        }


                        if (true === isValid) {

                            // user callback
                            isValid = $this.options.onReceive.bind($this)(file, i);

                            if (true === isValid) {


                                // preparing the container skeleton
                                if (true === $this.options.useProgressHandler) {
                                    var jSkeleton = jProgressContainer.find($this.options.progressHandlerListContainerSelector);
                                    if (0 === jSkeleton.length) {
                                        jSkeleton = $($this.options.progressHandlerContainerTemplate);
                                        jProgressContainer.append(jSkeleton);
                                        jProgressListContainer = jProgressContainer.find($this.options.progressHandlerListContainerSelector);
                                        if (0 === jProgressListContainer.length) {
                                            throw new Error("Cannot find the progress list container with selector " + $this.options.progressHandlerListContainerSelector);
                                        }
                                    }
                                }


                                //----------------------------------------
                                // UPLOADING THE FILES
                                //----------------------------------------
                                var formdata = new FormData();
                                formdata.append($this.options.ajaxFormItemKey, file);
                                var extraFields = $this.options.ajaxFormExtraFields;
                                for (var key in extraFields) {
                                    formdata.append(key, extraFields[key]);
                                }
                                var ajax = new XMLHttpRequest();
                                ajax.overrideMimeType("application/json");

                                ajax.upload.addEventListener("progress", function (e) {
                                    var percent = Math.round((e.loaded / e.total) * 100, 2);


                                    $this.options.onProgress(file, percent, e.loaded, e.total);


                                    if (true === $this.options.useProgressHandler) {

                                        if (!(idProgressItem in progressLiveMap)) {
                                            progressLiveMap[idProgressItem] = {
                                                type: "progressing",
                                                file: file,
                                                percent: percent,
                                            };
                                        }

                                        progressLiveMap[idProgressItem]["percent"] = percent;
                                        if (percent >= 100) {
                                            progressLiveMap[idProgressItem]["type"] = "completed";
                                        }
                                        $this.drawProgressContainer(progressLiveMap, jProgressListContainer);
                                    }


                                }, false);


                                ajax.addEventListener("load", function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                }, false);
                                ajax.addEventListener("error", function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                    var errorTags = {
                                        "fileName": '<strong>' + file.name + '</strong>',
                                    };
                                    $this.addErrorByFormatString($this.options.dict.uploadError, errorTags);

                                    if (true === $this.options.useProgressHandler) {
                                        progressLiveMap[idProgressItem]["type"] = "erroneous";
                                        $this.drawProgressContainer(progressLiveMap, jProgressListContainer);
                                    }


                                }, false);
                                ajax.addEventListener("abort", function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                    var abortTags = {
                                        "fileName": '<strong>' + file.name + '</strong>',
                                    };
                                    $this.addErrorByFormatString($this.options.dict.uploadAborted, abortTags);

                                    if (true === $this.options.useProgressHandler) {
                                        progressLiveMap[idProgressItem]["type"] = "erroneous";
                                        $this.drawProgressContainer(progressLiveMap, jProgressListContainer);
                                    }

                                }, false);


                                ajax.open("POST", $this.options.serverUrl);
                                ajax.onreadystatechange = function () {
                                    if (ajax.readyState == 4 && ajax.status == 200) {
                                        var jsonResponse = JSON.parse(ajax.responseText);
                                        var type = jsonResponse.type;
                                        if ('error' === type) {

                                            /**
                                             * Even if there is an error, the progress handler will show a green bar as long
                                             * as the file was completely (100%) sent to the server.
                                             * We don't want that, since a green bar will trick the user to think
                                             * that the upload was successful when the server actually denied the upload.
                                             * So here, we update the progress bar after the fact, to make the gui more understandable.
                                             */
                                            if (true === $this.options.useProgressHandler) {
                                                progressLiveMap[idProgressItem]["type"] = "erroneous";
                                                $this.drawProgressContainer(progressLiveMap, jProgressListContainer);
                                            }

                                            $this.addError(jsonResponse.error);

                                        } else {

                                            //----------------------------------------
                                            // url to form
                                            //----------------------------------------
                                            if (true === $this.options.useUrlToForm) {
                                                /**
                                                 * Our strategy is quite simple here.
                                                 * First we count the number of inputs in the container.
                                                 * If that number is equal to maxFile, we drop the first input.
                                                 * Then we append the input.
                                                 *
                                                 * In other words, we implement a rotation where the first element gets dropped
                                                 * and new elements are appended to the end.
                                                 *
                                                 */
                                                var jInputs = jUrlToFormContainer.find('input');
                                                if (jInputs.length >= maxFile) {
                                                    jInputs.first().remove();
                                                }
                                                var name = $this.options.urlToFormFieldName;
                                                if (maxFile > 1) {
                                                    name += "[]";
                                                }
                                                var input = '<input type="hidden" name="' + name + '" value="' + escapeHtml(jsonResponse.url) + '"/>';
                                                var jInput = $(input);

                                                jUrlToFormContainer.append(jInput);
                                            }


                                            //----------------------------------------
                                            // file visualizer
                                            //----------------------------------------
                                            if (true === $this.options.useFileVisualizer) {
                                                /**
                                                 * same strategy as the useUrlToForm module: we use fifo rotation.
                                                 */
                                                var jThumbnails = jFileVisualizer.find('.thumbnail');
                                                if (jThumbnails.length >= maxFile) {
                                                    jThumbnails.first().remove();
                                                }
                                                $this.fileVisualizerAddItem(jFileVisualizer, jsonResponse.url, file.name, file.size);
                                            }

                                            $this.options.onSuccess(file, jsonResponse);
                                        }
                                    }
                                };
                                ajax.send(formdata);
                            }
                        }
                    })(thefile, i);
                }
            };


            //----------------------------------------
            // INPUT FILE HANDLING
            //----------------------------------------
            $(this.element).on('change', function () {
                handleFiles(this.files);
            });


            //----------------------------------------
            // DROPZONE HANDLING
            //----------------------------------------
            var dropZone = this.options.dropzone;
            if (dropZone instanceof jQuery) {
                function dragenter(e) {
                    e.stopPropagation();
                    e.preventDefault();
                }

                function dragover(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    if (false === dropZone.hasClass($this.options.dropzoneOverClass)) {
                        dropZone.addClass($this.options.dropzoneOverClass);
                    }
                }

                function dragleave(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    dropZone.removeClass($this.options.dropzoneOverClass);
                }

                function drop(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    dropZone.removeClass($this.options.dropzoneOverClass);


                    const dt = e.dataTransfer;
                    const files = dt.files;

                    handleFiles(files);
                }

                dropZone[0].addEventListener("dragenter", dragenter, false);
                dropZone[0].addEventListener("dragleave", dragleave, false);
                dropZone[0].addEventListener("dragover", dragover, false);
                dropZone[0].addEventListener("drop", drop, false);
            }


        },
        addError: function (message) {
            this.options.onError(message);
            if (true === this.options.useErrorContainer) {
                this.appendErrorToContainer(message);
            }
        },
        addErrorByFormatString: function (formatString, tags) {
            var error = formatString;
            for (var key in tags) {
                var tag = '{' + key + '}';
                var value = tags[key];
                error = error.replace(tag, value);
            }
            this.addError(error);
        },
        appendErrorToContainer: function (message) {
            var jErrContainer = this.options.errorContainer;
            if (jErrContainer instanceof jQuery) {
                var jListContainer = jErrContainer.find(this.options.errorListContainerSelector);
                if (jListContainer.length) {
                    var errTemplate = this.options.errorMessageTemplate;
                    var errorHtml;
                    if ("string" === typeof errTemplate) {
                        errorHtml = errTemplate.replace('{message}', message);
                    } else {
                        errorHtml = errTemplate(message);
                    }
                    var jError = $(errorHtml);
                    jListContainer.append(jError);
                    jErrContainer.show();


                } else {
                    throw new Error("No error list container element found with jquery selector: " + this.options.errorListContainerSelector);
                }

            } else {
                throw new Error("options.errorContainer must be a jquery object");
            }
        },
        clearErrorContainer: function () {
            var jErrContainer = this.options.errorContainer;
            var jListContainer = jErrContainer.find(this.options.errorListContainerSelector);
            jListContainer.empty();
        },
        hideErrorContainer: function () {
            var jErrContainer = this.options.errorContainer;
            jErrContainer.hide();
        },
        drawProgressContainer: function (liveMap, jListContainer) {
            for (var id in liveMap) {
                var item = liveMap[id];
                var type = item['type'];
                var template = this.options.progressHandlerListItemTemplate;
                var tags = {
                    '{iconClass}': this.options.progressHandlerListItemVariables[type]['iconClass'],
                    '{fileName}': item.file.name,
                    '{fileSize}': formatBytes(item.file.size),
                    '{progressBarClass}': this.options.progressHandlerListItemVariables[type]['progressBarClass'],
                    '{percent}': item.percent,
                };
                for (var tag in tags) {
                    var value = tags[tag];
                    template = template.replace(new RegExp(tag, 'g'), value);
                }

                var jItem = jListContainer.find('#' + id);
                var jTemplate = $(template);
                jTemplate.attr('id', id);

                if (0 === jItem.length) {
                    jListContainer.append(jTemplate);
                } else {
                    jItem.replaceWith(jTemplate);
                }
            }
        },
        fileVisualizerRemoveItem: function (jThumbnail) {
            var index = jThumbnail.index();
            jThumbnail.remove();

            /**
             * Note: if the urlToForm module is used, we need to also remove the
             * urlToForm item corresponding to the removed thumbnail.
             */
            if (true === this.options.useUrlToForm) {
                var jUrlToFormContainer = this.options.urlToFormContainer;
                var jInput = jUrlToFormContainer.find('input').eq(index);
                if (jInput.length) {
                    jInput.remove();
                }
            }
        },
        fileVisualizerAddItem: function (jFileVisualizer, url, fileName, fileSize) {
            var extension = fileName.split('.').pop().toLowerCase();
            var thumbnail;
            var sAllowDelete = "";
            if (true === this.options.fileVisualizerAllowDeleteAction) {
                sAllowDelete = "delete-allowed";
            } else {
                sAllowDelete = "delete-not-allowed";
            }
            var tags = {
                '{fileUrlEscaped}': escapeHtml(url),
                '{fileName}': fileName,
                '{fileSize}': formatBytes(fileSize),
                '{iconClass}': "",
                '{allowDelete}': sAllowDelete,
                '{fileUrl}': url,

            };

            // is image or not?
            if (-1 === imageExtensions.indexOf(extension)) {
                thumbnail = this.options.fileVisualizerNotImageTemplate;
                if (extension in this.options.fileVisualizerExtension2icon) {
                    tags['{iconClass}'] = this.options.fileVisualizerExtension2icon[extension];
                } else {
                    tags['{iconClass}'] = this.options.fileVisualizerFallbackIcon;
                }
            } else {
                thumbnail = this.options.fileVisualizerImageTemplate;
            }
            for (var tag in tags) {
                var value = tags[tag];
                thumbnail = thumbnail.replace(new RegExp(tag, 'g'), value);
            }
            var jThumbnail = $(thumbnail);
            jThumbnail.addClass('fileuploader-thumbnail');
            jFileVisualizer.append(jThumbnail);
        }

    });


    //----------------------------------------
    // EXPOSING THE PLUGIN TO THE OUTER WORLD
    //----------------------------------------
    $.fn.fileUploader = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
        return this;
    };


    $.fn.fileUploader.defaults = {
        // callbacks
        onReceive: function () {
            return true;
        },
        /**
         * Called when an error is triggered.
         * @param message
         */
        onError: function (message) {
        },
        /**
         * Called when a file is successfully uploaded to the server.
         *
         * @param file, the file js object.
         * @param jsonResponse, the json response returned by the server.
         */
        onSuccess: function (file, jsonResponse) {
        },
        onProgress: function (file, percent, uploadedBytes, totalBytes) {
        },
        defaultValue: "",
        // dropzone
        dropzone: null, // jquery object or null
        dropzoneOverClass: "over",
        // built-in progress handler
        useProgressHandler: false,
        progressHandlerContainer: null,
        progressHandlerContainerTemplate: '' +
            '<div class="card mt-2">' +
            '<div class="card-header"><h6>Upload progress</h6></div>' +
            '<div class="card-body"></div>' +
            '</div>',
        progressHandlerListContainerSelector: '.card-body',
        progressHandlerListItemTemplate: '<div class="mt-2 d-flex align-items-center">' +
            '<div class="icon mr-3"><i class="{iconClass}"></i></div>' +
            '<div class="mr-3">{fileName} ({fileSize})</div>' +
            '<div class="progress flex-grow-1">' +
            '<div class="progress-bar {progressBarClass}" role="progressbar" ' +
            'aria-valuenow="{percent}" aria-valuemin="0" aria-valuemax="100" ' +
            'style="width: {percent}%">{percent}%</div>' +
            '</div>' +
            '</div>',
        progressHandlerListItemVariables: {
            progressing: {
                iconClass: 'fas fa-spinner fa-spin text-blue',
                progressBarClass: 'bg-blue',
            },
            completed: {
                iconClass: 'fas fa-check text-green',
                progressBarClass: 'bg-green',
            },
            erroneous: {
                iconClass: 'fas fa-exclamation-triangle text-red',
                progressBarClass: 'bg-red',
            },
        },
        // built-in validation options
        maxFileSize: -1,
        mimeType: null,
        // built-in urlToForm
        maxFile: 1,
        useUrlToForm: false,
        urlToFormContainer: null,
        urlToFormFieldName: "the_file",
        // built-in file visualizer
        useFileVisualizer: false,
        fileVisualizerContainer: null,
        fileVisualizerFallbackIcon: "far fa-file-alt",
        fileVisualizerExtension2icon: {
            "doc": "far fa-file-word",
            "docx": "far fa-file-word",
            "mts": "far fa-file-video",
            "mp4": "far fa-file-video",
            "wmv": "far fa-file-video",
            "flv": "far fa-file-video",
            "avi": "far fa-file-video",
            "ppt": "far fa-file-powerpoint",
            "pdf": "far fa-file-pdf",
            "xls": "far fa-file-excel",
            "xlsx": "far fa-file-excel",
            "php": "far fa-file-code",
            "html": "far fa-file-code",
            "js": "far fa-file-code",
            "css": "far fa-file-code",
            "wav": "far fa-file-audio",
            "mp3": "far fa-file-audio",
            "aif": "far fa-file-audio",
            "zip": "far fa-file-archive",
            "rar": "far fa-file-archive",
        },
        fileVisualizerAllowDeleteAction: true,
        fileVisualizerImageTemplate: '<div class="thumbnail image">' +
            '<a href="{fileUrlEscaped}" target="_blank">' +
            '<img class="img-fluid" src="{fileUrlEscaped}" alt="image"></a>' +
            '<span class="filename">{fileName}</span>' +
            '<button type="button" class="close fileuploader-close-button {allowDelete}"' +
            '   aria-label="Close">' +
            '   <span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>',
        fileVisualizerNotImageTemplate: '<div class="thumbnail not-image">' +
            '<a href="{fileUrlEscaped}" target="_blank"><i class="{iconClass}"></i></a>' +
            '<span class="filename">{fileName}</span>' +
            '<button type="button" class="close fileuploader-close-button {allowDelete}"' +
            '    aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>',
        // built-in error system
        useErrorContainer: false,
        errorContainer: null,
        errorListContainerSelector: 'ul',
        errorMessageTemplate: '<li>{message}</li>',

        // ajax
        ajaxFormItemKey: 'item',
        ajaxFormExtraFields: {},
        serverUrl: "/upload.php",

        // dictionary
        dict: {
            maxFileSizeExceeded: "Error with {fileName}: The size cannot exceed {maxSize} (your file weights {fileSize}).",
            wrongMimeType: "Error with {fileName}: Wrong mimetype: {fileMimeType} is not allowed. The allowed mime types are: {allowedMimeTypes}.",
            uploadAborted: "Error with {fileName}: The upload was aborted for some reason.",
            uploadError: "Error with {fileName}: An error occurred during the upload for some reason.",
        }
    };

})(jQuery, window, document);