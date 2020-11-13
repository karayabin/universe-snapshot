import jsx from 'js-extension-ling';


export default class Validator {

    constructor() {
        this.events = null;
        this.rules = [];
        this.translatee = null;
    }

    addRule(cb) {
        this.rules.push(cb);
    }


    setTranslator(translator) {
        this.translatee = translator;
    }


    /**
     * Tests the given file against the rules, and returns either true (if all rules passed) or an error message.
     */
    test(oFile) {

        var errMsg;
        for (var i in this.rules) {
            var rule = this.rules[i];
            errMsg = rule(oFile);
            if (true !== errMsg) {
                return errMsg;
            }
        }
        return true;
    }


    init(options) {

        // adding maxFileSize rule
        if (options.hasOwnProperty("maxFileSize")) {
            if (options.maxFileSize !== -1) {
                var bytesMaxFileSize = jsx.convertHumanSizeToBytes(options.maxFileSize);

                this.addRule(oFile => {
                    if (oFile.size > bytesMaxFileSize) {
                        var tags = {
                            "fileName": '<strong>' + oFile.name + '</strong>',
                            "maxSize": jsx.humanSize(bytesMaxFileSize),
                            "fileSize": jsx.humanSize(oFile.size),
                        };
                        return this.translatee._("err.maxFileExceeded", tags);
                    }
                    return true;
                });
            }
        }

        // adding maxFileNameLength rule
        if (options.hasOwnProperty("maxFileNameLength")) {
            this.addRule(oFile => {
                if (oFile.name.length > options.maxFileNameLength) {
                    var tags = {
                        "fileName": '<strong>' + oFile.name + '</strong>',
                        "maxLength": options.maxFileNameLength,
                        "length": oFile.name.length,
                    };
                    return this.translatee._("err.maxFileNameLength", tags);
                }
                return true;
            });
        }


        // adding mime type rule
        if (options.hasOwnProperty("mimeType")) {
            if (options.mimeType !== null) {
                var allowedMimeTypes = options.mimeType;
                if ('string' === typeof allowedMimeTypes) {
                    allowedMimeTypes = [allowedMimeTypes];
                }

                this.addRule(oFile => {
                    if (-1 === allowedMimeTypes.indexOf(oFile.type)) {
                        var tags = {
                            "fileName": '<strong>' + oFile.name + '</strong>',
                            "fileMimeType": '<strong>' + oFile.type + '</strong>',
                            "allowedMimeTypes": allowedMimeTypes.join(', '),
                        };
                        return this.translatee._("err.wrongMimeType", tags);
                    }
                    return true;
                });
            }

        }


        // adding file extension rule
        if (options.hasOwnProperty("allowedFileExtension")) {

            if (options.allowedFileExtension !== null) {
                var allowedFileExtensions = options.allowedFileExtension;
                if ('string' === typeof allowedFileExtensions) {
                    allowedFileExtensions = [allowedFileExtensions];
                }

                this.addRule(oFile => {
                    var name = oFile.name;
                    var extension = jsx.getFileExtension(oFile.name);
                    if (-1 === allowedFileExtensions.indexOf(extension)) {
                        var tags = {
                            "fileName": '<strong>' + oFile.name + '</strong>',
                            "fileExtension": '<strong>' + extension + '</strong>',
                            "allowedFileExtensions": allowedFileExtensions.join(', '),
                        };
                        return this.translatee._("err.wrongFileExtension", tags);
                    }
                    return true;
                });
            }
        }


    }
}

