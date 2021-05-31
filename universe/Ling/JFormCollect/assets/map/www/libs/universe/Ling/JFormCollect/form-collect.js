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
                        var type = $(this).prop('type');
                        var name = $(this).attr('name');

                        var value = null;

                        switch (type) {
                            case 'text':
                            case 'password':
                                value = $(this).val();
                                break;
                            case 'select-one':
                            case 'select-multiple':
                                value = $(this).val();
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