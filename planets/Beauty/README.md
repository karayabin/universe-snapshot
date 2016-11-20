Beauty
============
2016-05-17


![Beauty look](http://s19.postimg.org/98adwpher/beauty3.png)


Beauty searches for your [test pages](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#test-page)
and executes them.

Beauty uses an html gui interface (shown in the image above) to display the test results.
 
 

It's an implementation of the beauty part of the [beauty'n'beast unit testing pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).




How does this work?
---------------------

This implementation of Beauty uses two components:

- the gui
- a test finder
 
 
 
The gui is some html/css/js code that allows you to display the test results.

The test finder is the php object that allows you to search and organize your test pages according to your likings.
Depending whether you prefer to have all your tests in a separate folder, or having your tests spread with
your source code, or a combination of both, you would use a different test finder, or create your own.


In terms of code, a TestFinderInterface has one method:

```php
    /**
     * @return array
     * 
     *      Returns an array of groupName => <item>.
     *      An <item> is either:
     *          - an array of test urls (numerical indexes) 
     *          - an array of groupName => <item> 
     * 
     */
    public function getTestPageUrls();
```


   
Example
--------------
   
In the following example, I use the KazuyaTestFinder to find my tests and pass the results to the gui part.
For more info about the KazuyaTestFinder, please look at the comments in its source code. 
 

```php
<?php

use Beauty\TestFinder\KazuyaTestFinder;


require_once "bigbang.php"; // start the local universe (https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md)





/**
 * More structure info in the KazuyaTestFinder's class comments.
 */
//------------------------------------------------------------------------------/
// COLLECT TESTS 
//------------------------------------------------------------------------------/
$dir = __DIR__ . "/bnb";
$testPageUrls = KazuyaTestFinder::create()
    ->setRootDir($dir)
    ->addExtension('test.php')
    ->addExtension('test.html')
    ->getTestPageUrls();

    
// here choose which groups should be opened when starting    
$openGroups = [
    'ssssplanets',
];




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
```
 


    

History Log
------------------
    
- 1.3.0 -- 2016-05-18

    - add KazuyaTestFinder.setRootDir method
    - removed KazuyaTestFinder's obsolete addDir method
    
- 1.2.0 -- 2016-05-18

    - KazuyaTestFinder now follows symlinks
    - removed KazuyaTestFinder's obsolete setDirName method

- 1.1.0 -- 2016-05-17

    - add KazuyaTestFinder
    
- 1.0.1 -- 2015-10-28

    - bug fix: iframe parse rather than refresh for retry later  
    
- 1.0.0 -- 2015-10-27

    - initial commit