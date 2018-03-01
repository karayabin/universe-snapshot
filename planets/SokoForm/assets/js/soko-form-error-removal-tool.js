/**
 * The errorRemovalTool is a thin javascript layer on top of a soko form that removes
 * the form errors dynamically as the user fixes them.
 * See the documentation for more info.
 *
 */
if ('undefined' === typeof SokoFormErrorRemovalTool) {


    (function () {


        var instances = {};

        window.SokoFormErrorRemovalTool = function (parameters) {
            this.context = parameters.context;
        };


        SokoFormErrorRemovalTool.getInst = function (name, parameters) {
            if ('undefined' === typeof name) {

                return new window.SokoFormErrorRemovalTool(parameters);
            }
            if (false === (name in instances)) {
                instances[name] = new window.SokoFormErrorRemovalTool(parameters);
            }
            return instances[name];
        };

        window.SokoFormErrorRemovalTool.prototype = {
            removeErrorByControlName: function (controlName) {
                var jContext = this.context;
                var jError = jContext.find('.soko-error[data-name="' + controlName + '"]');
                jError.closest('.soko-error-container').removeClass("soko-active");
            },
            refresh: function () {
                var jContext = this.context;
                var zis = this;
                /**
                 * Collecting erroneous controls dynamically
                 */
                var erroneousControls = [];
                jContext.find(".soko-error").each(function () {
                    var name = $(this).attr('data-name');
                    if (name) {
                        erroneousControls.push($(this).attr('data-name'));
                    }
                });

                for (var i in erroneousControls) {
                    var name = erroneousControls[i];

                    //----------------------------------------
                    // REGULAR INPUTS
                    //----------------------------------------
                    var jControl = jContext.find('[name="' + name + '"]');
                    if (jControl.is("input") || jControl.is("textarea")) {
                        var type = jControl.attr('type');
                        if ("text" === type) {
                            (function (theName, _jControl) {
                                _jControl
                                    .off("keydown.dynamicErrorRemoval")
                                    .on("keydown.dynamicErrorRemoval", function () {
                                        zis.removeErrorByControlName(theName);
                                    });
                            })(name, jControl);
                        }
                    }
                    else if (jControl.is("select")) {
                        (function (theName, _jControl) {
                            _jControl
                                .off("change.dynamicErrorRemoval")
                                .on("change.dynamicErrorRemoval", function () {
                                    zis.removeErrorByControlName(theName);
                                });
                        })(name, jControl);
                    }

                    //----------------------------------------
                    // CHECKBOXES (have different names for every item,
                    // but the data-control-name holds the control name
                    //----------------------------------------
                    var jCbControl = jContext.find('[data-control-name="' + name + '"]');
                    if (jCbControl.is("input")) {
                        (function (theName, jControl) {
                            jControl
                                .off("change.dynamicErrorRemoval")
                                .on("change.dynamicErrorRemoval", function () {
                                    zis.removeErrorByControlName(theName);
                                });
                        })(name, jCbControl);
                    }
                }
            }
        };

    })();
}