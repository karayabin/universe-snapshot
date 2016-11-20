<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/selectchain/js/selectchain.js"></script>
    <script src="https://cdn.rawgit.com/lingtalfi/Tim/master/js/tim-functions/tim-functions.js"></script>
    <title>Html page</title>
</head>

<body>
<form method="post" action="">
    <select id="country" name="country">
        <option value="france">france</option>
        <option value="italy">italy</option>
        <option value="japan">japan</option>
    </select>
    <select id="region" name="region"></select>
    <select id="city" name="city"></select>

</form>


<script>
    (function ($) {
        $(document).ready(function () {
            var oChain = new window.selectChain({
                useTim: true,
                triggerOnStart: true
            });
            oChain.addNode($('#country'), '/libs/selectchain/service/country-demo-tim.php');
            oChain.addNode($('#region'), '/libs/selectchain/service/country-demo-tim.php');
            oChain.addNode($('#city'));
            oChain.start();
        });
    })(jQuery);
</script>


</body>
</html>