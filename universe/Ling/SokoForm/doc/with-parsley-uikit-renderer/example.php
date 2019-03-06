<?php



use Core\Services\A;

use Ling\SokoForm\Control\SokoChoiceControl;
use Ling\SokoForm\Control\SokoFileControl;
use Ling\SokoForm\Control\SokoInputControl;
use Ling\SokoForm\Form\SokoForm;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Renderer\Ling\UikitSokoFormRenderer;
use Ling\SokoForm\Renderer\Ling\WithParsleyUikitSokoFormRenderer;
use Ling\SokoForm\ValidationRule\SokoFileNotEmptyValidationRule;
use Ling\SokoForm\ValidationRule\SokoNotEmptyValidationRule;


// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";

A::testInit();



if($_POST){
    a($_POST);
}


$choicesHearAboutUs = [
    "" => "Choose one...",
    "internet" => "Internet",
    "word_of_mouth" => "Word of mouth",
    "others" => "Others",
];

$choicesColor = [
    "red" => "Red",
    "green" => "Green",
    "blue" => "Blue",
];
$defaultColor = "red";

$choicesFruit = [
    "apple" => "Apple",
    "banana" => "Banana",
    "cherry" => "Cherry",
];

$form = SokoForm::create()
    ->addControl(SokoInputControl::create()
        ->setName("first_name")
        ->setLabel("First Name")
        ->setProperties([
            // https://getuikit.com/docs/icon
            "icon" => "user",
//            "iconPosition" => "right",
//            "iconIsClickable" => true,
        ])
    )
    ->addControl(SokoInputControl::create()
        ->setName("last_name")
        ->setLabel("Last Name")
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("hear")
        ->setLabel("How did you ear about us?")
        ->setChoices($choicesHearAboutUs)
    )
    ->addControl(SokoInputControl::create()
        ->setName("about_you")
        ->setLabel("Tell us about yourself")
        ->setType("textarea")
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("color")
        ->setLabel("What's your favorite color?")
        ->setProperties([
            "style" => "radio",
        ])
        ->setChoices($choicesColor)
        ->setValue($defaultColor)
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("fruit")
        ->setLabel("Pick some fruits")
        ->setProperties([
            "style" => "checkbox",
        ])
        ->setChoices($choicesFruit)
    )
    ->addControl(SokoFileControl::create()
        ->setName("identity_card")
        ->setLabel("Upload your id card")
    )
    ->addControl(SokoFileControl::create()
        ->setName("photo")
        ->setLabel("Upload a profile photo")
        ->setType("ajax")
    );




$form->addValidationRule("first_name", SokoNotEmptyValidationRule::create());
$form->addValidationRule("last_name", SokoNotEmptyValidationRule::create());
$form->addValidationRule("hear", SokoNotEmptyValidationRule::create());
$form->addValidationRule("about_you", SokoNotEmptyValidationRule::create());
$form->addValidationRule("fruit", SokoNotEmptyValidationRule::create());
//$form->addValidationRule("identity_card", SokoFileNotEmptyValidationRule::create());
//$form->addValidationRule("photo", SokoNotEmptyValidationRule::create());

$res = $form->process(function (array $fData, SokoFormInterface $f) {


    $f->addNotification("The form has been posted successfully", "success", "Hurray!");


});


if (false === $res) {
    $form->addNotification("Some errors were found in this form. Please fix them, then post the form again", "error", "Oops!");
}



$model = $form->getModel();


//az($model);



?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico">
    <link rel="mask-icon" type=""
          href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
          color="#111">
    <title>CodePen - Floating Labels w/ ParsleyJS</title>


    <!--    <link rel="stylesheet"-->
    <!--          href="https://rawgit.com/guillaumepotier/Parsley.js/2.8.1/bower_components/bootstrap/dist/css/bootstrap.css">-->
    <!--    <link rel="stylesheet" href="https://rawgit.com/guillaumepotier/Parsley.js/2.8.1/doc/assets/docs.css">-->
    <!--    <link rel="stylesheet" href="https://rawgit.com/guillaumepotier/Parsley.js/2.8.1/src/parsley.css">-->


    <script src="/libs/jquery/jquery-2.1.3.js"></script>
    <script src="/libs/parsley/parsley.min.js"></script>
    <script src="/libs/parsley/i18n/fr.js"></script>


    <link rel="stylesheet" href="/libs/uikit/css/uikit.min.css">
    <link rel="stylesheet" href="/libs/uikit/css/my-uikit-fixes.css">
    <link rel="stylesheet" href="/libs/uikit/css/with-parsley.css">
    <script src="/libs/uikit/js/uikit.min.js"></script>
    <script src="/libs/uikit/js/uikit-icons.min.js"></script>


</head>

<body translate="no">

<div class="this-container uk-container uk-container-small uk-padding-large">


    <?php WithParsleyUikitSokoFormRenderer::create()
        ->setTopNotificationMessage("Quelques erreurs se sont glissées dans le formulaire.
        Veuillez les corriger puis repostez le formulaire à nouveau.")
        ->renderForm($model, [
            "noValidate" => true,
            "title" => "Form 123",
            "style" => "stacked",
            "style" => "horizontal",

        ]); ?>


</body>
</html>
