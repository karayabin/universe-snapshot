(function () {

    if (window.FileUploader && false === window.FileUploader.hasLang("eng")) {


        var dict = {
            'Select files': [
                'Select files',
            ],
            'Drag files here.': [
                'Drag files here.',
            ],
            'x files': [
                '{x} file',
                '{x} files',
            ],
            'Filename': [
                'Filename',
            ],
            'Status': [
                'Status',
            ],
            'Size': [
                'Size',
            ],
            'Add files': [
                'Add files',
            ],
            'Start upload': [
                'Start upload',
            ],
            'Abort': [
                'Abort',
            ],
            'x files queued': [
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
            'Loading...': [
                'Loading...',
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

        // auto-registration
        window.FileUploader.addLang("eng", dict);
    }
})();


