<?php

use HtmlTemplate\HtmlTemplate;
require_once "bigbang.php"; // start the local universe (https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md)
HtmlTemplate::$templateDir = __DIR__ . "/libs/htmltemplate/demo/templates";

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/htmltemplate/js/htmltemplate.js"></script>
    <title>Html page</title>
</head>

<body>

<div id="container"></div>
<div id="html_templates" style="display: none"><?php HtmlTemplate::writeTemplates('person.htpl');?></div>

<script>
    (function ($) {
        $(document).ready(function () {

            htpl.dir = "/libs/htmltemplate/demo/templates"; // usually, you won't need this line, that's just because the demo has non default needs

            // we need to load all our templates first
            htpl.loadTemplates({
                person: "person.htpl"
            }, function () {




                // imagine we get rows from a call to an ajax service
                var personInfo = {
                    id: 6,
                    name: "marie",
                    value: "haberton"
                };


                // inject the rows using default mode (called map mode)
                $('#container').append(htpl.getHtml(personInfo, 'person'));


            }, 'html_templates');
        });
    })(jQuery);
</script>
</body>
</html>