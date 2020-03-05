//----------------------------------------
// default theme
//----------------------------------------
if ('undefined' === typeof window.FileUploaderLang_Eng) {
    (function () {


        var dict = {
            'Select files': [
                'Select files',
            ],
            'Drag files here': [
                'Drag files here.',
            ],
            'file(s)': [
                'file(s)',
            ],
            'filename': [
                'Filename',
            ],
            'status': [
                'Status',
            ],
            'size': [
                'Size',
            ],
            'Add files': [
                'Add files',
            ],
            'Start upload': [
                'Start upload',
            ],
            '{x} files queued': [
                '{x} file queued',
                '{x} files queued',
            ],
            'err.maxFileExceeded': [
                'Error with "{fileName}": The size cannot exceed {maxSize} (your file weights {fileSize}).',
            ],
            'err.maxFileNameLength': [
                'Error with "{fileName}": The file name cannot contain more than {maxLength} characters (the actual name contains {length} characters).',
            ],
            'err.wrongMimeType': [
                'Error with "{fileName}": Wrong mimetype: "{fileMimeType}" is not allowed. The allowed mime types are: {allowedMimeTypes}.',
            ],
            'err.wrongFileExtension': [
                'Error with "{fileName}": Wrong file extension: "{fileExtension}" is not allowed. The allowed file extensions are: {allowedFileExtensions}.',
            ],
            'err.uploadError': [
                'Error with "{fileName}": An error occurred during the upload for some reason.',
            ],
            'err.uploadAborted': [
                'Error with "{fileName}": The upload was aborted for some reason.',
            ],
            'Server error: ': [
                'Server error: ',
            ],
            //----------------------------------------
            // DIALOG
            //----------------------------------------
            'Submit': [
                "Submit",
            ],
            'Cancel': [
                "Cancel",
            ],
            //----------------------------------------
            // file editor
            //----------------------------------------
            'File Editor': [
                'File Editor',
            ],
            'Parent dir': [
                'Parent dir',
            ],
            'File name': [
                'File name',
            ],
            'Use original image': [
                'Use original image',
            ],
            'Is private': [
                'Is private',
            ],
            'Tags': [
                'Tags',
            ],
            'Image Editor': [
                'Image Editor',
            ],
            'Zoom In': [
                'Zoom In',
            ],
            'Zoom Out': [
                'Zoom Out',
            ],
            'Rotate Left': [
                'Rotate Left',
            ],
            'Rotate Right': [
                'Rotate Right',
            ],
            'Flip Horizontal': [
                'Flip Horizontal',
            ],
            'Flip Vertical': [
                'Flip Vertical',
            ],
            'Reset': [
                'Reset',
            ],
            'Loading in progress: {x}%': [
                'Loading in progress: {x}%',
            ],
        };


        window.FileUploaderLang_Eng = function () {
        };
        window.FileUploaderLang_Eng.prototype = {
            get: function (msgId, number, tags) {
                /**
                 * In english, plural system is simple.
                 */
                if ('undefined' === typeof tags) {
                    return this._get(msgId, number);
                }
                var ret = this._get(msgId, number);
                for (var key in tags) {
                    ret = ret.replace('{' + key + '}', tags[key]);
                }
                return ret;

            },
            //----------------------------------------
            // PRIVATE
            //----------------------------------------
            _get: function (msg, number) {

                if ('undefined' === typeof number || '' === number || null === number) {
                    return dict[msg][0]; // singular form
                }


                // plural form
                var pluralKey;
                if (number > 1) {
                    pluralKey = 1;
                } else {
                    pluralKey = 0;
                }
                return dict[msg][pluralKey].replace('{x}', number);
            },
        };


        // auto-registration of the default theme
        window.FileUploaderLangs.eng = new FileUploaderLang_Eng();
    })();
}



