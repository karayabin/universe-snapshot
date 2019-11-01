Chloroform HeliumLightRenderer example
==============
2019-10-21


Below is an example of how to use the Chloroform HeliumLightRenderer.


```php
<?php


use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Chloroform\FormNotification\SuccessFormNotification;
use Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer;




$form = new Chloroform(); // configure your chloroform instance here...


//--------------------------------------------
// Posting the form and validating data
//--------------------------------------------
if (true === $form->isPosted()) {
    if (true === $form->validates()) {
        $form->addNotification(SuccessFormNotification::create("ok"));
// do something with $postedData;
        $postedData = $form->getPostedData();
    } else {
        $form->addNotification(ErrorFormNotification::create("There was a problem."));
    }
} else {
    $valuesFromDb = []; // get the values from the database if necessary...
    $form->injectValues($valuesFromDb);
}
$formArray = $form->toArray();




//--------------------------------------------
// START BUFFERING...
//--------------------------------------------
ob_start();
?>
    <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>HeliumLightRenderer: Bootstrap4 form</h5>
                    </div>
                    <div class="card-body">

                        <?php


                        $renderer = new HeliumLightRenderer([
                            "useEnctypeMultiformData" => true,
                            "renderPrintsJsHandler" => false,
                        ]);
                        $renderer->setContainer($container);
                        echo $renderer->render($form->toArray());


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
//--------------------------------------------
// ...END BUFFERING
//--------------------------------------------


//--------------------------------------------
// RENDERING
//--------------------------------------------
$copilot = $container->get('html_page_copilot');
$jsLibs = $copilot->getJsUrls();
$cssLibs = $copilot->getCssUrls();
$modals = $copilot->getModals();
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
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">

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


    <body>
    <?php echo $content; ?>


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



    <?php $renderer->printJsHandler(); ?>


    </body>

    </html>


<?php


exit;


```