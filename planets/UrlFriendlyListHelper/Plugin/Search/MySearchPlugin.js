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


        var jForm = $("#" + id);
        var jButton = $('[data-id="the_button"]', jForm);
        var jInput = $('[data-id="the_input"]', jForm);
        var key = '__searchValue__';


        jButton.on('click', function () {

            var value = jInput.val();
            var newUrl = urlString.replace(key, value);

            window.location.href = newUrl;

            return false;
        });


    });
})(jQuery);
