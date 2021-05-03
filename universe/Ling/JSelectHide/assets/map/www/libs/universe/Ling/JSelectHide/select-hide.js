/**
 * SelectHide
 * ===========
 * 2021-04-05
 *
 *
 * This depends on jquery.
 *
 */
if ('undefined' === typeof SelectHide) {
    (function () {
        var $ = jQuery;


        window.SelectHide = {
            init: function (options) {

                options = $.extend({
                    context: null,
                    openPane: null,
                }, options);


                var jContext = options.context;
                var openPane = options.openPane;


                if (null === jContext) {
                    jContext = $('body');
                }


                var jPanes = jContext.find('.select-hide-pane');

                if (jPanes.length > 0) {


                    //----------------------------------------
                    // HIDE ALL PANES but the one defined in the conf
                    //----------------------------------------

                    jPanes.each(function () {
                        if (openPane === $(this).attr('data-id')) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });


                    //----------------------------------------
                    // MAKE SURE THE OPTIONS AND OPEN PANE ARE SYNC AT INIT
                    //----------------------------------------
                    if (null !== openPane) {
                        var jInitOption = jContext.find('.select-hide option[data-target="' + openPane + '"]');
                        if (jInitOption.length) {
                            jInitOption.prop('selected', true);
                        }
                    }


                    //----------------------------------------
                    // LISTENING
                    //----------------------------------------
                    jContext.on('change.selectHide', ".select-hide", function () {
                        var jTarget = $(this);
                        var jOption = jTarget.find('option:selected');
                        if (jOption.length) {
                            var targetPane = jOption.attr("data-target");
                            jPanes.each(function () {
                                if (targetPane === $(this).attr('data-id')) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });
                        } else {
                            throw new Error("No selected option found. Aborting");
                        }
                    });
                } else {
                    throw new Error("No panes found in the the given context (this function then becomes useless). Aborting.");
                }
            },
        };

    })();
}