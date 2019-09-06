<?php


/**
 * @var $this LightKitPageRenderer
 */

use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;


$container = $this->getContainer();

$jsLibs = $this->copilot->getJsUrls();
$cssLibs = $this->copilot->getCssUrls();


$z = $this->pageConf['layout_vars'] ?? [];

$opened_page = $z['opened_page'] ?? "one";

$page_one_id = $z['page_one_id'] ?? null;
$page_two_id = $z['page_two_id'] ?? null;
$page_three_id = $z['page_three_id'] ?? null;
$page_four_id = $z['page_four_id'] ?? null;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--    <base href="/plugins/Light_Kit_Demo/portfoliogrid/">-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">


    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"/>-->
    <?php foreach ($cssLibs as $url): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>">
    <?php endforeach; ?>
    <?php if (true === $this->copilot->hasCssCodeBlocks()): ?>
        <link rel="stylesheet"
              href="<?php echo $container->get('kit_css_file_generator')->generate($this->copilot, $this->pageName); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="/plugins/Light_Kit_Demo/portfoliogrid/css/style.real.css">


    <?php if (true === $this->copilot->hasTitle()): ?>
        <title><?php echo $this->copilot->getTitle(); ?></title><?php endif; ?>

    <?php if (true === $this->copilot->hasDescription()): ?>
        <meta name="description"
              content="<?php echo htmlspecialchars($this->copilot->getDescription()); ?>"><?php endif; ?>

</head>

<body>


<div class="container">
    <?php
    /**
     * This is an accordion layout with four accordion sections.
     */
    ?>
    <?php $this->printZone("header"); ?>


    <?php if (null !== $page_one_id):
        $sShow = ('one' === $opened_page) ? 'show' : '';
        ?>
        <div id="<?php echo htmlspecialchars($page_one_id); ?>" class="collapse <?php echo $sShow; ?>">
            <?php $this->printZone("page_one"); ?>
        </div>
    <?php endif; ?>


    <?php if (null !== $page_two_id):
        $sShow = ('two' === $opened_page) ? 'show' : '';
        ?>
        <div id="<?php echo htmlspecialchars($page_two_id); ?>" class="collapse <?php echo $sShow; ?>">
            <?php $this->printZone("page_two"); ?>
        </div>
    <?php endif; ?>


    <?php if (null !== $page_three_id):
        $sShow = ('three' === $opened_page) ? 'show' : '';
        ?>
        <div id="<?php echo htmlspecialchars($page_three_id); ?>" class="collapse <?php echo $sShow; ?>">
            <?php $this->printZone("page_three"); ?>
        </div>
    <?php endif; ?>


    <?php if (null !== $page_four_id):
        $sShow = ('four' === $opened_page) ? 'show' : ''; ?>
        <div id="<?php echo htmlspecialchars($page_four_id); ?>" class="collapse <?php echo $sShow; ?>">
            <?php $this->printZone("page_four"); ?>
        </div>
    <?php endif; ?>


    <?php $this->printZone("footer"); ?>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>-->


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
