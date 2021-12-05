<?php


/**
 * @var $this LightKitPageRenderer
 */

use Ling\Bat\StringTool;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;


$this->copilot->registerLibrary("FontAwesome", [], [
    '/libs/universe/Ling/FontAwesome/5.13/css/all.min.css',
]);

$this->copilot->registerLibrary("Jquery", [], [], [
    'override' => true,
]); // hard written in this file




$container = $this->getContainer();
$jsLibs = $this->copilot->getJsUrls();
$cssLibs = $this->copilot->getCssUrls();


$z = $this->pageConf['layout_vars'] ?? [];
/**
 * The css style to include.
 * By default, we include the lka style, which has a background color.
 * You can use a fake value such as none for instance to not call any style at all, which would result in a blank
 * background, which might be useful if you want to use this layout inside an iframe for instance.
 */
$style = $z['style'] ?? 'lka';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php foreach ($cssLibs as $url): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>">
    <?php endforeach; ?>

    <?php if (true === $this->copilot->hasCssCodeBlocks()): ?>
        <link rel="stylesheet"
              href="<?php echo $container->get('kit_css_file_generator')->generate($this->copilot, $this->pageName); ?>">
    <?php endif; ?>


    <?php if (true === $this->copilot->hasTitle()): ?>
        <title><?php echo $this->copilot->getTitle(); ?></title><?php endif; ?>

    <?php if (true === $this->copilot->hasDescription()): ?>
        <meta name="description"
              content="<?php echo htmlspecialchars($this->copilot->getDescription()); ?>"><?php endif; ?>


    <?php switch ($style):
        case 'lka': ?>
            <link rel="stylesheet" href="/libs/universe/Ling/Light_Kit_Admin/zeroadmin/css/style.css">
            <?php break; ?>
        <?php default: ?>
            <?php break; ?>
        <?php endswitch; ?>


</head>

<body <?php
$this->copilot->addBodyTagClass("app skin-dark");
echo StringTool::htmlAttributes($this->copilot->getBodyTagAttributes()); ?>>


<?php $this->printZone("body"); ?>


<script src="/libs/universe/Ling/Jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<?php foreach ($jsLibs as $url): ?>
    <script src="<?php echo htmlspecialchars($url); ?>"></script>
<?php endforeach; ?>


<?php if (true === $this->copilot->hasJsCodeBlocks()): ?>
    <script>

        <?php $blocks = $this->copilot->getJsCodeBlocks(); ?>
        <?php foreach($blocks as $block): ?>
        <?php echo $block; ?>
        <?php endforeach; ?>

    </script>

<?php endif; ?>

</body>

</html>
