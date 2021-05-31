/**
 * RadioHide
 * ===========
 * 2021-04-02
 *
 *
 * This depends on jquery.
 *
 */
if ('undefined' === typeof RadioHide) {
    (function () {
        var $ = jQuery;


        window.RadioHide = {
            init: function (options) {
                options = $.extend({
                    context: null,
                    openPane: null,
                    changeAfter: function(){},
                }, options);


                var jContext = options.context;
                var openPane = options.openPane;


                if (null === jContext) {
                    jContext = $('body');
                }


                var jPanes = jContext.find('.radio-hide-pane');

                if (jPanes.length > 0) {


                    //----------------------------------------
                    // HIDE ALL PANES but the one defined in the conf
                    //----------------------------------------
                    jPanes.each(function () {
                        if (openPane === $(this).attr('data-id')) {
                            $(this).show();
                            options.changeAfter(openPane);
                        } else {
                            $(this).hide();
                        }
                    });

                    //----------------------------------------
                    // MAKE SURE THE RADIO BUTTON AND OPEN PANE ARE SYNC AT INIT
                    //----------------------------------------
                    if(null !== openPane){
                        var jRadio = jContext.find('.radio-hide[data-target="'+ openPane +'"]');
                        if(jRadio.length){
                            jRadio.prop('checked', true);
                        }
                    }



                    //----------------------------------------
                    // LISTENING
                    //----------------------------------------
                    jContext.off('click.radioHide').on('click.radioHide', ".radio-hide", function () {
                        var jTarget = $(this);
                        var targetPane = jTarget.attr("data-target");
                        jPanes.each(function () {
                            if (targetPane === $(this).attr('data-id')) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });

                        options.changeAfter(targetPane);
                    });
                } else {
                    throw new Error("No panes found in the the given context (this function then becomes useless). Aborting.");
                }
            },
        };

    })();
}