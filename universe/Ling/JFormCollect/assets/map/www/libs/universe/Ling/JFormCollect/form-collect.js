/**
 * FormCollect
 * ===========
 * 2021-04-05
 *
 *
 * This depends on jquery.
 *
 */
if ('undefined' === typeof FormCollect) {
    (function () {
        var $ = jQuery;


        window.FormCollect = {
            collect: function (options) {

                var ret = {};

                options = $.extend({
                    context: null,
                }, options);


                var cssClass = "form-collect";
                var jContext = options.context;

                if (null === jContext) {
                    jContext = $('body');
                }


                var jControls = jContext.find('.' + cssClass);

                if (jControls.length > 0) {


                    //----------------------------------------
                    // COLLECT THE DATA
                    //----------------------------------------
                    jControls.each(function () {
                        var type, name;

                        type = $(this).attr("data-type");
                        if ("undefined" === typeof type) {
                            type = $(this).prop('type');
                        }


                        name = $(this).attr("data-name");
                        if ("undefined" === typeof name) {
                            name = $(this).attr('name');
                        }

                        if ("undefined" === typeof name) {
                            throw new Error("Undefined name html attribute for control of type " + type, $(this));
                        }

                        var value = null;

                        switch (type) {
                            case 'text':
                            case 'password':
                            case 'email':
                            case 'hidden':
                                value = $(this).val();
                                break;
                            case 'select-one':
                            case 'select-multiple':
                                value = $(this).val();
                                break;
                            case 'checkbox':
                                value = $(this).prop("checked");
                                break;
                            case 'custom':
                                value = $(this).attr("data-value");
                                break;
                            default:
                                throw new Error("Unknown type:" + type);
                                break;
                        }
                        // console.log("h", name, type, value);

                        ret[name] = value;
                    });
                }
                return ret;
            },
        };

    })();
}