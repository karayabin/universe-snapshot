(function ($) {


    /**
     * Dialog helper 
     * -------------------
     * lingtalfi - 2016-01-29
     * 
     * Dialog helper is a "here" plugin that helps using a dialog popup.
     * A dialog is a popup with a top bar and a bottom bar, as defined in the theme recommendations.
     * https://github.com/lingtalfi/Zoli#styling-popups
     * 
     * 
     * What this helper plugin will do for you is allow you to programmatically set the title and/or the 
     * bottom buttons of the dialog using the zolipop pop method options.
     * https://github.com/lingtalfi/Zoli#zolipop-pop-method-options
     * 
     * 
     * How to use?
     * --------------
     * First make sure that your html markup is standard (follow recommendations above).
     * When you open a zoli popup, use the dialog_helper options:
     * 
     * - title: str, the title of the dialog
     * - buttons: not implemented yet
     * 
     * 
     */
    window.zolipopDialogHelper = function () {

   
        this.preparePopup = function(jPopup, oo){
            if('title' in oo){
                jPopup.find('.title').html(oo.title);
            }
        };

    };


})(jQuery);

