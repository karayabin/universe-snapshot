<?php

use Ling\Beauty\TestFinder\PlanetTestFinder;



/**
 * This script is another beauty interface for the [bnb pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).
 * This one is optimized to work with planets.
 *
 * Setup
 * --------
 *
 * First create a bnb directory at the root of your planet,
 * and create your test files with the **.bnb.php** extension.
 *
 * Then, tell us what your universe directory is (in the custom conf part below).
 * That's it.
 *
 * Our interface takes care of the details for you.
 *
 * Basically, it will:
 *
 * - collect all the tests in the given universe directory
 * - make the beauty gui out of them
 *
 *
 *
 *
 *
 *
 *
 */



//--------------------------------------------
// CONFIG, GET YOUR HANDS DIRTY....
//--------------------------------------------
/**
 * First connect to the bigbang autoloader.
 */
require_once __DIR__ . "/../universe/bigbang.php";


$uniDir = __DIR__ . "/../universe";
$guiUrl = "https://" . $_SERVER['SERVER_NAME'] . "/bnb-unit.php";
$testExtensions = [
    "bnb.php",
];
$skeletonFile = __DIR__ . "/libs/universe/Ling/Beauty/tpl/default/skeleton.html";



// here choose which groups should be opened when starting
$openGroups = [
    'ssssplanets',
];










//--------------------------------------------
// SCRIPT: YOU SHOULDN'T TOUCH ANYTHING BELOW
//--------------------------------------------

//------------------------------------------------------------------------------/
// COLLECT TESTS
//------------------------------------------------------------------------------/
$dir = $uniDir;


$finder = new PlanetTestFinder();
$finder->setUniverseDir($uniDir);
foreach ($testExtensions as $extension) {
    $finder->addExtension($extension);
}
$finder->setGuiTestUrl($guiUrl);
$testPageUrls = $finder->getTestPageUrls();




//------------------------------------------------------------------------------/
// DISPLAYING THE HTML PAGE
//------------------------------------------------------------------------------/
/**
 * This is the beauty gui snippet below, just copy paste it.
 */
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/libs/universe/Ling/Beauty/js/beauty.js"></script>
    <link rel="stylesheet" href="/libs/universe/Ling/Beauty/tpl/default/style.css">
    <title>Beauty and the beast testing page</title>
</head>

<body>
<div id="beauty-gui-container">
    <?php
    require_once $skeletonFile;
    ?>
</div>

<script>
    (function ($) {
        $(document).ready(function () {


            var tests = <?php echo json_encode($testPageUrls); ?>;
            var jContainer = $('#beauty-gui-container');
            var beauty = new window.beauty({
                tests: tests
            });

            beauty.start(jContainer);
            beauty.closeAllGroups();
            beauty.openGroups(<?php echo json_encode($openGroups); ?>, true);

        });
    })(jQuery);
</script>

</body>
</html>

