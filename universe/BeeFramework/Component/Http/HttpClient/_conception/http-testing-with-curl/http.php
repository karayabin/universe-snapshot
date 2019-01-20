<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--<script src="http://localcdn/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Html page</title>
    <style>
        #theframe {
            width: 100%;
            height: 1000px;
        }
    </style>
</head>

<body>


<p>
    Examples come from <a href="http://curl.haxx.se/docs/httpscripting.html" target="_blank">curl tutorial</a>.
</p>
<ul id="links">
    <li><a data-action="simpleGet" href="#">simple get</a></li>
    <li><a data-action="simpleGetWithParams" href="#">simple get with params</a></li>
    <li><a data-action="simplePost" href="#">simple post</a></li>
    <li><a data-action="simplePostLongData" href="#">simple post long data</a></li>
    <li><a data-action="fileUploadPost" href="#">file upload post</a></li>
    <li><a data-action="httpUploadPut" href="#">file upload put</a></li>
    <li><a data-action="httpBasicAuth" href="#">http basic auth</a></li>
    <li><a data-action="referer" href="#">referer</a></li>
    <li><a data-action="userAgent" href="#">userAgent</a></li>
    <li><a data-action="location" href="#">location</a></li>
    <li><a data-action="setCookie" href="#">set cookie</a></li>
    <li><a data-action="https" href="#">https</a></li>
</ul>


<iframe id="theframe" name="theframe" src="http3.php">

</iframe>


<script>
    (function ($) {
        $(document).ready(function () {

            var jFrame = $('#theframe');
            
            $('#links a').click(function(){
                var action = $(this).attr("data-action");
                $.get('http2.php?action=' + action);
                jFrame[0].contentWindow.location.reload();
                return false;
            });
            
        });
    })(jQuery);
</script>


</body>
</html>