(function () {
    if ('undefined' === typeof window.onTheFlyForm) {


        function removeBoundError(jTarget) {
            var id = jTarget.attr('data-error-popout');
            if ("undefined" !== typeof id) {
                var jForm = jTarget.closest("form");
                var jError = jForm.find('[data-error="' + id + '"]');
                if (jError.length) {
                    jError.hide();
                }
            }
        }


        window.onTheFlyForm = {
            formInit: function (jContext) {


                // add data-error-popout attribute dynamically
                jContext.find('[name]').each(function () {
                    $(this).attr('data-error-popout', $(this).attr('name'));
                    $(this).on("focus.onTheFlyFormStatic", function () {
                        removeBoundError($(this));
                    });
                });


                // add data-error-popout behaviour
                jContext.on('click.onTheFlyFormStatic', function (e) {
                    var jTarget = $(e.target);
                    removeBoundError(jTarget);
                });
            },
            injectValidationErrors: function (jForm, model) {

                var jErrorFields = jForm.find("[data-error]");
                jErrorFields.hide();

                for (var key in model) {
                    if (0 === key.indexOf("error")) {
                        var errMsg = model[key];

                        if ('' !== errMsg) {


                            var suffix = key.substr(5);
                            var name = "name" + suffix;

                            if (name in model) {


                                var target = model[name];


                                var jErr = jForm.find('[data-error="' + target + '"]');
                                var jErrText = jErr.find('[data-error-text]');
                                if (0 === jErrText.length) {
                                    jErrText = jErr;
                                }

                                jErr.removeClass('hidden');
                                jErr.show();
                                jErrText.html(errMsg);


                                // // does it have a popout set?
                                // var jPopout = jForm.find('[data-error-popout="' + target + '"]');
                                // if (jPopout.length > 0) {
                                //     (function (jPop, jPopErr) {
                                //         jPop.off('focus.onTheFlyForm').on('focus.onTheFlyform', function () {
                                //             jPopErr.hide();
                                //         });
                                //     })(jPopout, jErr);
                                // }

                            }
                        }
                    }
                }
            },
            /**
             * This method comes handy when you want to inject values directly
             * from the source (raw), like the database for instance,
             * to the already generated on-the-fly form.
             *
             */
            injectRawValues: function (jForm, key2Values) {
                for (var key in key2Values) {
                    var value = key2Values[key];

                    var jControl = jForm.find('[name="' + key + '"]');


                    // single checkbox?
                    if (jControl.is(':checkbox')) {
                        if (true === value) {
                            jControl.prop("checked", true);
                        }
                    }
                    // other input types
                    else {
                        // in onTheFlyForm so far, we deal only with simple names with no brackets
                        // however in a near future, brackets might be required.
                        // if so, try using jquery's [name^="pppp"] pattern instead (starts with)
                        jControl.val(value);
                    }

                }
            },
            postForm: function (jTarget, uriService, onSuccess, onError) {

                var jForm = jTarget.closest("form");

                var jSuccessMessage = jForm.find(".off-success-message-container");
                var jErrorMessage = jForm.find(".off-error-message-container");
                var jSuccessTextHolder = jSuccessMessage.find('.text-holder');
                if (0 === jSuccessTextHolder.length) {
                    jSuccessTextHolder = jSuccessMessage;
                }
                var jErrorTextHolder = jErrorMessage.find('.text-holder');
                if (0 === jErrorTextHolder.length) {
                    jErrorTextHolder = jErrorMessage;
                }


                jSuccessMessage.hide();
                jErrorMessage.hide();


                var itemData = jForm.serialize();


                $.post(uriService, {
                    data: itemData
                }, function (r) {
                    if ("complete" === r.type) {

                        var model = r.model;
                        if (true === model.isSuccess) {
                            if ('' !== model.successMessage) { // allows the template author to provide default value
                                jSuccessTextHolder.html(model.successMessage);
                            }
                            jSuccessMessage.show();
                            onSuccess(r.data);
                        }
                        else {

                            if (true === model.validationOk) {
                                if ('' !== model.errorMessage) { // allows the template author to provide default value
                                    jErrorTextHolder.html(model.errorMessage);
                                }
                                jErrorMessage.show();
                            }
                            else {
                                window.onTheFlyForm.injectValidationErrors(jForm, model);
                            }
                        }
                    }
                    else if ("error" === r.type) {
                        if ('undefined' === typeof onError) {
                            onError = function (m) {
                                console.log("error: " + m);
                            };
                        }
                        onError(r.error);
                    }
                }, 'json');
            }
        };
    }


})();