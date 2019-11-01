Html Page Copilot example
===========
2019-10-18


Here is a basic layout example demonstrating how to use the copilot in a [light](https://github.com/lingtalfi/Light) application.

In this example, we are using the following plugins:

- [Light_Kit](https://github.com/lingtalfi/Light_Kit)


We are also using the following web assets/libraries:

- [jquery](https://jquery.com/)
- [bootstrap 4](https://getbootstrap.com/) 
- [fontawesome](https://fontawesome.com/)



```php

<?php


use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit\CssFileGenerator\LightKitCssFileGenerator;


/**
 * @var $container LightServiceContainerInterface
 */
$container = null; // replace this by a reference to your actual light service container...


/**
 * @var $copilot HtmlPageCopilot
 */
$copilot = $container->get('html_page_copilot');
$jsLibs = $copilot->getJsUrls();
$cssLibs = $copilot->getCssUrls();
$modals = $copilot->getModals();


/**
 * @var $kitCssFileGenerator LightKitCssFileGenerator
 */
$kitCssFileGenerator = $container->get('kit_css_file_generator');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php foreach ($cssLibs as $url): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>">
    <?php endforeach; ?>

    <?php if (true === $copilot->hasCssCodeBlocks()): ?>
        <link rel="stylesheet"
              href="<?php echo $kitCssFileGenerator->generate($copilot, $this->pageName); ?>">
    <?php endif; ?>


    <?php if (true === $copilot->hasTitle()): ?>
        <title><?php echo $copilot->getTitle(); ?></title><?php endif; ?>

    <?php if (true === $copilot->hasDescription()): ?>
        <meta name="description" content="<?php echo htmlspecialchars($copilot->getDescription()); ?>">
    <?php endif; ?>


</head>

<body <?php echo StringTool::htmlAttributes($copilot->getBodyTagAttributes()); ?>>
<?php if ($modals): ?>
    <?php echo implode('\n', $modals); ?>
<?php endif; ?>

<h1>Hello World</h1>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<?php foreach ($jsLibs as $url): ?>
    <script src="<?php echo htmlspecialchars($url); ?>"></script>
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

 