<script>
    (function () {
        meredithFunctions.writeSuccessMessage = function (msg, jForm) {
            var s = '';
            s += '<div class="alert alert-success no-border">';
            s += '<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span>';
            s += '</button>';
            s += '<span class="text-semibold">{congratulations}</span> ' + msg + '</div>';
            var jMessage = $(s);
            jForm.prepend(jMessage);
            window.scrollTo(0, 0);
        };

        meredithFunctions.writeErrorMessage = function (msg, jForm) {
            var s = '';
            s += '<div class="alert alert-danger no-border">';
            s += '<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span>';
            s += '</button>';
            s += '<span class="text-semibold">{warning}</span> ' + msg + '</div>';
            var jMessage = $(s);
            jForm.prepend(jMessage);
            window.scrollTo(0, 0);
        };

        meredithFunctions.writeDevError = function (m) {
            alert("meredith error: " + m);
        };
    })();
</script>