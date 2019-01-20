(function ($) {


    /**
     * Dialog body inserts 
     * -------------------
     * lingtalfi - 2016-01-29
     * 
     * 
     * This "here" plugin helps you to inject strings in a popup template before it opens up.
     * 
     * Make sure you are following the markup recommendations here: https://github.com/lingtalfi/Zoli#styling-popups
     * 
     * 
     * 
     * How to use?
     * --------------
     * When you open a zoli popup, use the dialog_helper options:
     * 
     * - inserts: array of <insert>.
     *                  Each <insert> is itself an array with:
     *                  
     *                          - 0: the jquery selector to the element to inject the html into
     *                          - 1: the html markup to inject
     * 
     * 
     */
    window.zolipopDialogBodyInserts = function () {

   
        this.preparePopup = function(jPopup, oo){
            if('inserts' in oo){
                for(var i in oo.inserts){
                    var selector = oo.inserts[i][0];
                    var html = oo.inserts[i][1];
                    jPopup.find(selector).html(html);
                }
            }
        };

    };


})(jQuery);

