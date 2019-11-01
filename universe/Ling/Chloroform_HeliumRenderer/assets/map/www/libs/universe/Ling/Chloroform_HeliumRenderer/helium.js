"use strict";


if (false === ("HeliumFormHandler" in window)) {
    (function () {


        function HeliumFormHandler(jForm, fields, options) {

            this.form = jForm;
            this.fields = fields;
            this.displayErrorSummary = options.displayErrorSummary;
            this.displayInlineErrors = options.displayInlineErrors;
            this.showOnlyFirstError = options.showOnlyFirstError;
            this.useValidation = options.useValidation;

        }


        HeliumFormHandler.prototype.init = function () {
            var $this = this;

            // $this.prepareTimeFields();
            $this.initSummaryLinks();


            this.form.on('submit', function () {


                $this.form.addClass('helium-was-validated');


                $this.compileTimeFields();


                if (true === $this.useValidation) {
                    var res = $this.validate();
                    if (false === res) {
                        document.location.hash = $this.form.attr('id');
                        return false;
                    }
                }
            });
        };

        HeliumFormHandler.prototype.initSummaryLinks = function () {
            var jSummary = this.form.find(".errorSummary");
            var $this = this;
            if (jSummary.length) {
                jSummary.on('click', function (e) {
                    var jTarget = $(e.target);
                    var fieldId = jTarget.attr('href').substr(1);

                    var jField = $this.form.find('[data-main="' + fieldId + '"]');
                    if (jField.length) {
                        setTimeout(function () {
                            jField.focus();
                        }, 25);
                    }
                });
            }
        };


        /**
         * Ensures that time fields use two digits formatting (i.e 02 instead of 2).
         * This doesn't work on Firefox, and is too slow on Chrome,
         * so I don't use it. Keep the code though just in case...
         */
        HeliumFormHandler.prototype.prepareTimeFields = function () {
            this.form.find('.input-time').each(function () {
                $(this).on('change', function () {

                    var value = $(this).val();
                    if (parseInt(value) < 10) {
                        value = '0' + value;
                        $(this).val(value);
                    }
                })
            });
        };

        /**
         * Compiles the DateTime and Time fields values.
         */
        HeliumFormHandler.prototype.compileTimeFields = function () {
            var jField;


            $('.input-target', this.form).each(function () {


                jField = $(this).parent();
                var jDate = jField.find('.input-time-date');


                var hours = jField.find('.input-time-hours').val();
                var minutes = jField.find('.input-time-minutes').val();
                var seconds = jField.find('.input-time-seconds').val();
                if (parseInt(hours) < 10) {
                    hours = "0" + hours;
                }
                if (parseInt(minutes) < 10) {
                    minutes = "0" + minutes;
                }


                var newValue = "";
                if ('undefined' === typeof seconds) {
                    newValue = hours + ":" + minutes;
                } else {
                    if (parseInt(seconds) < 10) {
                        seconds = "0" + seconds;
                    }
                    newValue = hours + ":" + minutes + ":" + seconds;
                }

                if (jDate.length) {
                    var date = jDate.val();
                    if ("" === date) {
                        date = "0000-00-00";
                    }
                    newValue = date + " " + newValue;
                }


                $(this).val(newValue);
            });
        };


        /**
         *
         * Removes the inline error messages, then validates the form and returns the result (whether all fields validated).
         *
         * In case of errors, will do the following:
         *
         * - display the error summary (depending on the configuration, see the constructor of this object)
         * - add inline error messages (depending on the configuration, see the constructor of this object)
         * - update the document's title
         *
         *
         * @return bool
         */
        HeliumFormHandler.prototype.validate = function () {


            var hasError = false;

            /**
             * Remove the errors for now.
             * The idea is that if the form contains errors that this validation script can handle,
             * this script will prevent the form from being posted and show the validation errors at the same time.
             * If not (i.e. if the form contains no errors that this script can handle), then the form will be posted
             * and the static system will override (showing the error summary and inline errors if necessary).
             *
             * So remember, if you return false here (i.e. the form does not validate), you MUST provide
             * the user with some dynamic error message(s).
             *
             *
             */
            this.cleanErrors();
            for (var id in this.fields) {
                var field = this.fields[id];
                var validators = field['validators'];
                if (false === $.isEmptyObject(validators)) {
                    var htmlName = field['htmlName'];
                    var errorName = field['errorName'];


                    var jField = this.getFieldByHtmlName(htmlName);

                    if (false !== jField) {

                        var value = this.getValueByField(jField);
                        var fieldErrors = [];

                        for (var i in validators) {
                            var validator = validators[i];
                            var name = validator['name'];
                            var fileInfo = null;
                            var errorMessage = null;

                            switch (name) {
                                case 'Ling\\Chloroform\\Validator\\FileMimeTypeValidator':
                                    fileInfo = this.getFileInfo(jField);
                                    if (false !== fileInfo) {
                                        var type = fileInfo.type;
                                        var allowed = validator['allowed_mime_types'];
                                        if (-1 === $.inArray(type, allowed)) {
                                            errorMessage = this.getErrorMessage("main", validator, {
                                                fieldName: errorName,
                                                mimeType: type,
                                                allowedMimeTypes: allowed.join(', '),
                                            });
                                        }
                                    }
                                    break;
                                case 'Ling\\Chloroform\\Validator\\PasswordValidator':
                                    errorMessage = this.getPasswordErrorMessage(value, validator, errorName);
                                    break;
                                case 'Ling\\Chloroform\\Validator\\PasswordConfirmValidator':
                                    errorMessage = this.getPasswordConfirmErrorMessage(value, htmlName, validator, errorName);
                                    break;
                                case 'Ling\\Chloroform\\Validator\\MinMaxCharValidator':
                                    var nbChars = 0;
                                    for (var i in value) {
                                        nbChars++;
                                    }
                                    errorMessage = this.getMinMaxErrorMessage(nbChars, validator, errorName, "number");
                                    break;
                                case 'Ling\\Chloroform\\Validator\\MinMaxDateValidator':
                                    var date = value;
                                    errorMessage = this.getMinMaxErrorMessage(date, validator, errorName, "date");
                                    break;
                                case 'Ling\\Chloroform\\Validator\\MinMaxFileSizeValidator':
                                    fileInfo = this.getFileInfo(jField);
                                    if (false !== fileInfo) {
                                        var fileSize = fileInfo.size;
                                        errorMessage = this.getMinMaxFileSizeErrorMessage(fileSize, validator, errorName, "number");
                                    }
                                    break;
                                case 'Ling\\Chloroform\\Validator\\MinMaxItemValidator':
                                    var number = 0;
                                    if (null === value) {
                                        number = 0;
                                    } else if (Array.isArray(value)) {
                                        number = value.length;
                                    } else {
                                        this.error("This validator only works with arrays or the null value.");
                                    }
                                    errorMessage = this.getMinMaxErrorMessage(number, validator, errorName, "number");
                                    break;
                                case 'Ling\\Chloroform\\Validator\\MinMaxNumberValidator':
                                    errorMessage = this.getMinMaxErrorMessage(value, validator, errorName, "number");
                                    break;
                                case 'Ling\\Chloroform\\Validator\\RequiredValidator':
                                    if (
                                        ('string' === typeof value && '' === value) ||
                                        ('object' === typeof value && $.isEmptyObject(value))
                                    ) {
                                        errorMessage = this.getErrorMessage("main", validator, {
                                            "fieldName": errorName,
                                        });
                                    }
                                    break;
                                case 'Ling\\Chloroform\\Validator\\RequiredDateValidator':
                                    if (
                                        ('string' === typeof value && '' === value) ||
                                        ('object' === typeof value && $.isEmptyObject(value)) ||
                                        ('string' === typeof value && -1 !== value.indexOf("0000-00-00"))
                                    ) {
                                        errorMessage = this.getErrorMessage("main", validator, {
                                            "fieldName": errorName,
                                        });
                                    }
                                    break;
                                default:
                                    /**
                                     * This validator is not handle by this version of the script, therefore the validation
                                     * test should pass.
                                     */
                                    break;
                            }

                            if (null !== errorMessage) {
                                fieldErrors.push(errorMessage);
                                hasError = true;
                            }


                            if (true === this.showOnlyFirstError && fieldErrors.length) {
                                break;
                            }

                        }


                        if (fieldErrors.length) {
                            this.addFieldErrors(id, jField, fieldErrors);
                        }


                    } else {
                        this.error("Cannot find the field with name " + htmlName + ".");
                    }
                }

            }


            if (true === hasError) {
                return false;
            }
            return true;
        };


        HeliumFormHandler.prototype.getFieldByHtmlName = function (htmlName) {
            var selector = '[name="' + $.escapeSelector(htmlName) + '"]';
            var selector2 = '[name^="' + $.escapeSelector(htmlName + '[') + '"]';

            var jField = $(selector, this.form);
            if (0 === jField.length) {
                jField = $(selector2, this.form);
            }

            if (jField.length) {
                return jField;
            }
            return false;
        };


        HeliumFormHandler.prototype.getValueByField = function (jField) {

            var isCheckbox = ('checkbox' === jField.attr('type'));
            var value;
            if (true === isCheckbox) {

                /**
                 *
                 * Array of selected values (not the same as Chloroform which returns array
                 * of value => on).
                 */
                value = [];
                jField.each(function () {
                    if (true === $(this)[0].checked) {
                        value.push($(this).val());
                    }
                });
            } else {
                value = jField.val();
            }
            return value;
        };

        /**
         * Returns the file info array, or false.
         *
         * The file info array has the following structure:
         *
         * - name: the name of the file
         * - size: size in bytes
         * - type: the file mime type
         *
         * @param jField
         * @returns {boolean}
         */
        HeliumFormHandler.prototype.getFileInfo = function (jField) {
            var file = jField[0];
            if (file.files.length) {
                return {
                    "name": file.files[0].name,
                    "size": file.files[0].size,
                    "type": file.files[0].type,
                };
            }
            return false;
        };


        /**
         * Adds the given error messages to the given field and the error summary,
         * depending on the configuration (see the constructor of this object for more information).
         */
        HeliumFormHandler.prototype.addFieldErrors = function (id, jField, errors) {


            // filtering errors
            if (true === this.showOnlyFirstError) {
                var tmpErrors = {};
                for (var i in errors) {
                    tmpErrors[i] = errors[i];
                    break;
                }
            }


            // error summary
            if (true === this.displayErrorSummary) {
                var jSummary = $(".errorSummary", this.form);
                if (jSummary.length) {
                    var jSummaryUl = $("ul", jSummary);
                    if (jSummaryUl.length) {
                        for (var i in tmpErrors) {
                            var jLi = $('<li class="summary-field-error"><a href="#' + id + '" class="alert-link">' + tmpErrors[i] + '</a></li>');
                            jSummaryUl.append(jLi);
                        }
                        jSummary.removeClass("is-hidden");
                    } else {
                        this.error("No summary ul found in this form. Check your html code.");
                    }
                } else {
                    this.error("No summary (.errorSummary) found in this form. Check your html code.");
                }
            }


            // inline errors
            if (true === this.displayInlineErrors) {
                /**
                 * Injecting inline errors
                 *
                 */
                var jParentField = jField.closest(".field");


                if (jParentField.length) {
                    var jContainer = jParentField.find('.field-label');
                    if (0 === jContainer.length) {
                        jContainer = jParentField.find('.field-inline-errors');
                    }
                    if (jContainer.length) {
                        var s = '<div class="helium-invalid-feedback">';
                        for (var i in tmpErrors) {
                            s += tmpErrors[i] + '<br>';
                        }
                        s += '</div>';
                        jContainer.append(s);

                    } else {
                        this.error("I don't know how to add inline error message in this field element yet (element " + id + ").");
                    }

                    // also adding the helium-is-invalid class to form controls
                    jParentField.find('.form-control').addClass("helium-is-invalid");
                    jParentField.find('.form-check-label').addClass("helium-is-invalid");




                } else {
                    this.error("I don't know how to add inline error message in this element yet (element " + id + ").");
                }
            }

        };


        /**
         * - Hides the error summary and cleans it
         * - Removes all inline error messages as well
         */
        HeliumFormHandler.prototype.cleanErrors = function () {
            // clean error summary
            this.form.find(".summary-field-error").remove();
            // remove inline errors
            this.form.find(".field-error").remove();

            // hides the error summary for now
            this.form.find(".errorSummary").addClass("is-hidden");
        };


        /**
         * Returns a formatted error message for the given identifier and validator.
         *
         * @param identifier
         * @param validator
         * @param vars
         */
        HeliumFormHandler.prototype.getErrorMessage = function (identifier, validator, vars) {

            var messages = this.getNonFormattedMessages(validator);

            if (identifier in messages) {
                var message = messages[identifier];
                for (var i in vars) {
                    var key = '{' + i + '}';
                    message = message.replace(key, vars[i]);
                }
                return message;
            } else {
                var name = validator['name'];
                this.error("validation identifier not found: " + identifier + " for validator " + name + ".");
            }
        };

        HeliumFormHandler.prototype.getNonFormattedMessages = function (validator) {
            var custom_messages = validator['custom_messages'];
            var validatorMessages = validator['messages'];
            var messages = {};

            for (var i in validatorMessages) {
                var validatorMessage = validatorMessages[i];
                var p = validatorMessage.split(":", 2);
                messages[p[0]] = p[1].trim();
            }
            return $.extend(messages, custom_messages);
        };


        HeliumFormHandler.prototype.getMinMaxErrorMessage = function (number, validator, errorName, numberKey) {
            var min = validator['min'];
            var max = validator['max'];
            var vars = {
                "fieldName": errorName,
                "min": min,
                "max": max,
            };
            vars[numberKey] = number;


            if (null !== min && null === max) {
                if (number < min) {
                    return this.getErrorMessage("min", validator, vars);
                }
            } else if (null !== max && null === min) {
                if (number > max) {
                    return this.getErrorMessage("max", validator, vars);
                }
            } else if (null !== min && null !== max) {
                if (number < min || number > max) {
                    return this.getErrorMessage("between", validator, vars);
                }
            }
            return null;
        };


        HeliumFormHandler.prototype.getMinMaxFileSizeErrorMessage = function (number, validator, errorName, numberKey) {


            var numberFormatted = this.convertBytes(number, "h");
            var min = validator['min'];
            var max = validator['max'];
            var vars = {
                "fieldName": errorName,
                "min": min,
                "max": max,
            };
            vars[numberKey] = numberFormatted;


            var minBytes;
            var maxBytes;
            if (null !== min) {
                minBytes = this.convertHumanSizeToBytes(min);
            }
            if (null !== max) {
                maxBytes = this.convertHumanSizeToBytes(max);
            }


            if (null !== min && null === max) {
                if (number < minBytes) {
                    return this.getErrorMessage("min", validator, vars);
                }
            } else if (null !== max && null === min) {
                if (number > maxBytes) {
                    return this.getErrorMessage("max", validator, vars);
                }
            } else if (null !== min && null !== max) {
                if (number < minBytes || number > maxBytes) {
                    return this.getErrorMessage("between", validator, vars);
                }
            }
            return null;
        };


        /**
         * This is a port of the Ling\Chloroform\Validator\PasswordConfirmValidator class.
         * Returns null if there is no validation error, or the error message if there is one.
         *
         */
        HeliumFormHandler.prototype.getPasswordConfirmErrorMessage = function (value, htmlName, validator, errorName) {

            var otherFieldId = validator['other_field_id'];
            var otherFieldErrorName = null;
            var otherFieldHtmlName = null;
            var otherFieldFound = false;

            for (var id in this.fields) {
                if (otherFieldId === id) {
                    var field = this.fields[id];
                    otherFieldErrorName = field['errorName'];
                    otherFieldHtmlName = field['htmlName'];
                    otherFieldFound = true;
                    break;
                }
            }


            if (true === otherFieldFound) {
                var jField = this.getFieldByHtmlName(otherFieldHtmlName);
                if (false !== jField) {
                    var otherFieldValue = this.getValueByField(jField);
                    if (otherFieldValue !== value) {
                        return this.getErrorMessage("main", validator, {
                            fieldName: errorName,
                            otherFieldName: otherFieldErrorName,
                        });
                    }

                } else {
                    this.error("Cannot find the field for password confirm with id " + otherFieldId + ".")
                }
            } else {
                this.error("No value found in the postedData for the other field (" + otherFieldId + ").")
            }
            return null;
        };


        /**
         * This is a port of the Ling\Chloroform\Validator\PasswordValidator class.
         * Returns null if there is no validation error, or the error message if there is one.
         *
         */
        HeliumFormHandler.prototype.getPasswordErrorMessage = function (value, validator, errorName) {
            function count(string) {


                var alpha = 0;
                var alphaLower = 0;
                var alphaUpper = 0;
                var digit = 0;
                var special = 0;


                var digits = "0123456789";


                function isLowerCase(str) {
                    return str == str.toLowerCase() && str != str.toUpperCase();
                }

                function isUpperCase(str) {
                    return str == str.toUpperCase() && str != str.toLowerCase();
                }

                for (var i in string) {
                    var char = string[i];

                    if (true === isLowerCase(char)) {
                        alpha++;
                        alphaLower++;
                    } else if (true === isUpperCase(char)) {
                        alpha++;
                        alphaUpper++;
                    } else if (digits.indexOf(char) >= 0) {
                        digit++;
                    } else {
                        special++;
                    }
                }

                return {
                    "alpha": alpha,
                    "alphaLower": alphaLower,
                    "alphaUpper": alphaUpper,
                    "digit": digit,
                    "special": special,
                };
            }


            var nbAlpha = validator['nb_alpha'];
            var nbAlphaLower = validator['nb_alpha_lower'];
            var nbAlphaUpper = validator['nb_alpha_upper'];
            var nbDigit = validator['nb_digit'];
            var nbSpecial = validator['nb_special'];


            var info = count(value);
            var messages = this.getNonFormattedMessages(validator);
            var failures = [];

            if (null !== nbAlpha && info["alpha"] < nbAlpha) {
                failures.push(messages['_alpha'].replace('{alpha}', nbAlpha));
            }
            if (null !== nbAlphaLower && info["alphaLower"] < nbAlpha) {
                failures.push(messages['_alpha_lower'].replace('{alphaLower}', nbAlphaLower));
            }
            if (null !== nbAlphaUpper && info["alphaUpper"] < nbAlpha) {
                failures.push(messages['_alpha_upper'].replace('{alphaUpper}', nbAlphaUpper));
            }
            if (null !== nbDigit && info["digit"] < nbDigit) {
                failures.push(messages['_digit'].replace('{digit}', nbDigit));
            }
            if (null !== nbSpecial && info["special"] < nbSpecial) {
                failures.push(messages['_special'].replace('{special}', nbSpecial));
            }


            if (failures.length) {
                var intro = messages['_main'].replace('{fieldName}', errorName);
                if (1 === failures.length) {
                    return intro + " " + failures[0];
                } else {
                    var last = failures.pop();
                    var and = messages['_and'];
                    return intro + " " + failures.join(', ') + " " + and + " " + last;
                }
            }
            return null;
        };

        HeliumFormHandler.prototype.error = function (errMsg) {
            throw new Error("Hydrogen HeliumFormHandler: " + errMsg);
        };


        /**
         * port from https://github.com/lingtalfi/Bat/blob/master/ConvertTool.md#converthumansizetobytes
         */
        HeliumFormHandler.prototype.convertHumanSizeToBytes = function (humanSize) {
            var ret = humanSize;

            var matches = ret.match(/^([0-9\.,]+)(.*)$/);
            var unit = matches[2].toLowerCase().trim().substr(0, 1);
            var value = parseFloat(matches[1].replace(',', '.'));
            switch (unit) {
                case 'o':
                case 'b':
                    ret = value;
                    break;
                case 'k':
                    ret = value * 1024;
                    break;
                case 'm':
                    ret = value * Math.pow(1024, 2);
                    break;
                case 'g':
                    ret = value * Math.pow(1024, 3);
                    break;
                case 't':
                    ret = value * Math.pow(1024, 4);
                    break;
                default:

                    break;
            }
            return parseInt(ret);

        };


        /**
         * port from https://github.com/lingtalfi/Bat/blob/master/ConvertTool.md#convertbytes
         */
        HeliumFormHandler.prototype.convertBytes = function (bytes, unit, precision) {
            if ('undefined' == typeof unit) {
                unit = "b";
            }
            if ('undefined' == typeof precision) {
                precision = 2;
            }

            bytes = parseInt(bytes);
            unit = unit.toLowerCase();
            var humanize = false;

            if ('h' === unit) {
                humanize = true;
                if (bytes < 1000) {
                    unit = "b";
                } else if (bytes < Math.pow(1000, 2)) {
                    unit = "k";
                } else if (bytes < Math.pow(1000, 3)) {
                    unit = "m";
                } else if (bytes < Math.pow(1000, 4)) {
                    unit = "g";
                }
            }


            switch (unit) {
                case 'o':
                case 'b':
                    break;
                case 'ko':
                    bytes /= 1000;
                    break;
                case 'mo':
                    bytes /= Math.pow(1000, 2);
                    break;
                case 'go':
                    bytes /= Math.pow(1000, 3);
                    break;
                case 'k':
                case 'kb':
                case 'kio':
                    bytes /= 1024;
                    break;
                case 'm':
                case 'mb':
                case 'mio':
                    bytes /= Math.pow(1024, 2);
                    break;
                case 'g':
                case 'gb':
                case 'gio':
                    bytes /= Math.pow(1024, 3);
                    break;
                default:
                    throw new Error("Unrecognized unit: " + unit);
                    break;
            }


            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }


            var ret = bytes.toFixed(precision);
            if (true === humanize) {
                ret = ret + capitalizeFirstLetter(unit);
            }
            return ret;
        };

        //----------------------------------------
        // EXPORT
        //----------------------------------------
        window.HeliumFormHandler = HeliumFormHandler;
    })();
}
