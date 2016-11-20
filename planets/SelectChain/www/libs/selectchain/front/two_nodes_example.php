<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/selectchain/js/selectchain.js"></script>
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

</form>


<script>
    (function ($) {
        $(document).ready(function () {
            var oChain = new window.selectChain();
            oChain.addNode($('#country'), '/libs/selectchain/service/country-demo.php');
            oChain.addNode($('#region'));
            oChain.start();
        });
    })(jQuery);
</script>


</body>
</html>