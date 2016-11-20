<?php

use Beauty\TestFinder\AuthorTestFinder;

require_once "bigbang.php";


//------------------------------------------------------------------------------/
// COLLECT TESTS 
//------------------------------------------------------------------------------/
$f = __DIR__ . "/../tests";
$testPageUrls = AuthorTestFinder::create()
    ->addDirContainer($f)
    ->setExtensions(['.bst.php', '.html'])
    ->setFileToUrl(function($file, $relPath){
        return 'http://'. $_SERVER['HTTP_HOST'] .'/libs/beauty/tests/' . $relPath;
    })
    ->getTestPageUrls()
;

$openGroups = [
    'js',
    'myApp/kazam',
];




//------------------------------------------------------------------------------/
// DISPLAYING THE HTML PAGE
//------------------------------------------------------------------------------/
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!--    <script src="/libs/jquery/jquery-2.1.4.min.js"></script>-->
    <script src="/libs/beauty/js/beauty.js"></script>
    <title>Html page</title>
</head>

<body>
<div id="beauty-gui-container"></div>

<script>
    (function ($) {
        $(document).ready(function () {


            var tests = <?php echo json_encode($testPageUrls); ?>;
            var jContainer = $('#beauty-gui-container');
            var beauty = new window.beauty({
                tests: tests
            });
            beauty.loadTemplateWithJsonP('default', jContainer, function () {
                beauty.start(jContainer);
                beauty.closeAllGroups();
                beauty.openGroups(<?php echo json_encode($openGroups); ?>, true);
            });
        });
    })(jQuery);
</script>

</body>
</html>