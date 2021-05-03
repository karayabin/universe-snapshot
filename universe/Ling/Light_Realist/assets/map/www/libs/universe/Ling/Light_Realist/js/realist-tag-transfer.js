/**
 * Realist Tag Transfer Js.
 *
 * For some explanations, see the implementation notes in:
 * - https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/realist-tag-transfer-js-implementation-notes.md
 */
if ("undefined" === typeof window.RealistTagTransfer) {

    (function () {


        function getDataExtraAttributes($node) {
            var attrs = {};
            $.each($node[0].attributes, function (index, attribute) {
                if (0 === attribute.name.indexOf('data-rtt-extra-')) {
                    attrs[attribute.name.substr(15)] = attribute.value;
                }
            });
            return attrs;
        }


        var $ = jQuery;

        window.RealistTagTransfer = function (options) {
            this.options = $.extend({}, window.RealistTagTransfer._defaults, options);

            this.jContainer = this.options.jContainer;
        };

        window.RealistTagTransfer.prototype = {
            collectTags: function () {
                var $this = this;

                var tags = [];
                var emitters = this.jContainer.find('.rtt-emitter');
                emitters.each(function () {

                    var $emitter = $(this);
                    var tagId, emitterValues, controlId;
                    var variables = [];


                    tagId = $emitter.attr("data-rtt-tag");
                    if (tagId) {


                        // should the tag be collected anyway?
                        if (false === $this.options.collectInactiveTags) {
                            var status = $emitter.attr('data-rtt-active');
                            if ('false' === status) {
                                return;
                            }
                        }


                        // the emitter IS ALSO the control element
                        var variableName = $emitter.attr("data-rtt-variable");
                        if (variableName) {


                            controlId = $this.getControlId($emitter, tagId);
                            emitterValues = $this.prepareFormValues($emitter.parent());
                            variables.push({
                                name: variableName,
                                value: $this.getControlValue($emitter, emitterValues),
                                control_id: controlId,
                            });
                        } else
                        // the emitter CONTAINS control element(s)
                        {

                            emitterValues = $this.prepareFormValues($emitter);


                            var jControls = $emitter.find('[data-rtt-variable]');
                            if (jControls.length) {
                                jControls.each(function () {
                                    variableName = $(this).attr("data-rtt-variable");
                                    if (variableName) {

                                        controlId = $this.getControlId($(this), tagId);
                                        variables.push({
                                            name: variableName,
                                            value: $this.getControlValue($(this), emitterValues),
                                            control_id: controlId,
                                        });
                                    } else {
                                        $this.error("Variable name not found or set to an empty value.", $(this));
                                    }
                                });
                            } else {
                                console.log($emitter);
                                $this.error("This emitter doesn't contain any control element.");
                            }
                        }


                        // adding the tag item
                        var tagItem = {
                            tag_id: tagId,
                            variables: variables,
                        };
                        var additionalTagItemData = getDataExtraAttributes($emitter);
                        tagItem = $.extend(tagItem, additionalTagItemData);


                        tags.push(tagItem);

                    } else {
                        // not a valid emitter
                        $this.error("The data-rtt-tag attribute was not found on this emitter.");
                    }


                });
                return tags;
            },
            error: function (msg, debugVar) {
                if (debugVar) {
                    console.log(debugVar);
                }
                throw new Error("RealistTagTransfer error: " + msg);
            },
            prepareControlName: function (jElement, variableName) {
                if (jElement.is(':input')) {
                    jElement.attr('name', variableName);
                }
            },
            prepareFormValues: function (jContainer) {
                var $this = this;

                // first let's set the name attribute on all control which are natural html control elements
                jContainer.find('[data-rtt-variable]').each(function () {
                    $this.prepareControlName($(this), $(this).attr('data-rtt-variable'));
                });


                var values = {};


                /**
                 * Convert the serializeArray form to a more compact form
                 */
                var array = jContainer.find(':input').serializeArray();
                for (var i in array) {
                    var item = array[i];
                    var name = item.name;
                    var value = item.value;

                    if (!(name in values)) {
                        values[name] = value;
                    } else {
                        if (false === $.isArray(values[name])) {
                            values[name] = [values[name]];
                        }
                        values[name].append(value);
                    }
                }
                return values;
            },
            getControlValue: function (jControl, emitterFormValues) {
                var name = jControl.attr("data-rtt-variable");
                if (name) {
                    var value = jControl.attr("data-rtt-value");
                    if ('undefined' !== typeof value) {
                        return value;
                    }


                    if (name in emitterFormValues) {
                        return emitterFormValues[name];
                    } else {
                        this.error("The emitter doesn't contain the variable " + name + ". Did you add the \"name\" attribute to your control?", jControl);
                    }
                } else {
                    this.error("Attribute data-rtt-variable not found for this control.");
                }
            },
            getControlId: function (jControl, tagId) {
                var id = jControl.attr('data-rtt-control');
                if (id) {
                    return id;
                }
                var varName = jControl.attr('data-rtt-variable');
                if (varName) {
                    return tagId + "-" + varName;
                } else {
                    this.error("Attribute data-rtt-variable not found for this control.");
                }
            },
            sendTags: function (tags) {
                console.log("sending tags to the server: ", tags);
            }
        };


        window.RealistTagTransfer._defaults = {
            /**
             * Whether to collect inactive tags as well (i.e. tags with data-rtt-active=false).
             * This might be useful for debugging.
             */
            collectInactiveTags: false,
        };


    })();
}