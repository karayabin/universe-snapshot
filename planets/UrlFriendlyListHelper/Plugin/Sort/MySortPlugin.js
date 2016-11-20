(function ($) {
    $(document).ready(function () {

        //------------------------------------------------------------------------------/
        // VARIABLE VALUES ARE REPLACED BY PHP
        //------------------------------------------------------------------------------/
        var id = '_php_variable_id';
        var urlString = '_php_variable_urlString';


        //------------------------------------------------------------------------------/
        // REGULAR JS CODE
        //------------------------------------------------------------------------------/
        var key = '__sortIdKey__';
        var value = '__sortIdValue__';


        var jForm = $("#" + id);
        var jButton = $('[data-id="the_button"]', jForm);
        var jSelect = $('[data-id="the_select"]', jForm);


        jButton.on('click', function () {

            var theValue = jSelect.val();
            var newUrl = urlString.replace(key, 'sortId');
            newUrl = newUrl.replace(value, theValue);


            window.location.href = newUrl;

            return false;
        });


    });
})(jQuery);
