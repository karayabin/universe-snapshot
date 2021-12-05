Conception notes
=======
2019-04-23 -> 2021-08-05


Tools to work with html page.



The copilot
----------
2021-08-05


The **copilot** does two main things:

- collect the web assets used by your application
- return those web assets so that you can lay them down in an html page


The **copilot** is designed to work in a modularized environment, where different server side modules require different web assets (i.e. js files, css files, etc...).




The library
--------
2021-08-05


The main way module authors interact with the copilot is to define **libraries**.

A **library** is basically the bundle of web assets used by a given (server side) module.

A library is registered using an arbitrary name.

The js files and css files are the most common web assets, and therefore they are direct arguments of the  **registerLibrary** method:


```php


$copilot->registerLibrary("kitstore_libs", [
    "/libs/universe/Ling/JimToolbox/jim-toolbox.js",
    "/libs/universe/Ling/JAcpHep/acphep-helper.js",
    "/libs/universe/Ling/JBee/bee.js",
    "/libs/universe/Ling/JLingHelpers/ling-helpers.js",
    "module:/libs/universe/Ling/Light_Kit_Store/js/kit_store.js";
], [
    "/libs/universe/Ling/JimToolbox/jim-toolbox.css",
]);

```


Above is an example of how I register the main library of my application.
It basically contains the common files my application uses.

The first argument of the **registerLibrary** method is the arbitrary name of my custom library.
The name serves as an unique identifier, preventing the copilot to collect two libraries with the same name.


The second argument is the js urls I'm using.
Notice that the last one starts with the **module:** prefix. This is a convention used by the copilot to indicate that
the particular js url that follows is of type es6 module (this means it should be called with a script type="module" instead of
just a regular script tag).


The third argument is the css urls.





Rendering an html page with the copilot
---------
2021-08-05



The main goal of the copilot is to help render an html page.


Here is an example of how I would use the copilot to render a basic html page.



```php 
<?php


use Ling\Bat\StringTool;
use Ling\Light_JimToolbox\Service\LightJimToolboxService;
use Ling\Light_Kit\CssFileGenerator\LightKitCssFileGenerator;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;


// $copilot is a copilot instance...

$copilot->registerLibrary("kitstore_libs", [
    "/libs/universe/Ling/JimToolbox/jim-toolbox.js",
    "/libs/universe/Ling/JAcpHep/acphep-helper.js",
    "/libs/universe/Ling/JBee/bee.js",
    "/libs/universe/Ling/JLingHelpers/ling-helpers.js",
    "module:/libs/universe/Ling/Light_Kit_Store/js/kit_store.js",
], [
    "/libs/universe/Ling/JimToolbox/jim-toolbox.css",
]);

$cssLibs = $copilot->getCssUrls();
$modals = $copilot->getModals();


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <?php foreach ($cssLibs as $url): ?>
            <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>">
        <?php endforeach; ?>

        <?php if (true === $copilot->hasTitle()): ?>
            <title><?php echo $copilot->getTitle(); ?></title><?php endif; ?>

        <?php if (true === $copilot->hasDescription()): ?>
            <meta name="description"
                  content="<?php echo htmlspecialchars($copilot->getDescription()); ?>"><?php endif; ?>


    </head>

<body <?php
echo StringTool::htmlAttributes($copilot->getBodyTagAttributes()); ?>>


<?php if ($modals): ?>
    <!-- modals -->
    <?php foreach ($modals as $modal): ?>
        <!-- another modal -->
        <?php echo $modal; ?>
    <?php endforeach; ?>

<?php endif; ?>


<?php


/**
 * @var $_ji LightJimToolboxService
 */
$_jimToolboxIsVisible = false;
$_ji = $container->get("jim_toolbox");
require_once $_ji->getTemplatePath("bootstrap");

?>


- The main page code here...
- The main page code here...
- The main page code here...
- The main page code here...
- The main page code here...




<?php

$jsLibs = $copilot->getJsUrls();
$jsModules = $copilot->getJsModulesUrls();


?>


<?php foreach ($jsLibs as $url): ?>
    <script src="<?php echo htmlspecialchars($url); ?>"></script>
<?php endforeach; ?>


<?php foreach ($jsModules as $url): ?>
    <script type="module" src="<?php echo htmlspecialchars($url); ?>"></script>
<?php endforeach; ?>



<?php if (true === $copilot->hasJsCodeBlocks()): ?>
    <script>

        <?php $blocks = $copilot->getJsCodeBlocks(); ?>
        <?php foreach($blocks as $block): ?>
        <?php echo $block; ?>
        <?php endforeach; ?>

    </script>

<?php endif; ?>






</body>

</html>


```


That's a good start. 
We can do other things (see the source for more info), but that's the basics.






Modals
---------
2019-09-26 -> 2021-08-05


Modals are very common in web applications.
They sometimes require an html snippet to be in the page before the modal can be called.

The html page copilot can host those modals for you, so that you can display them wherever you like on your html page.

For instance, in bootstrap 4.3 they recommend put modals near the top of the page (source: https://getbootstrap.com/docs/4.3/components/modal/). 

