<?php

//--------------------------------------------
// EXAMPLE OF SYNTAX
//--------------------------------------------
use Ling\FormTools\Validation\OnTheFlyFormValidator;

$key = "Ekom_Front_CreateAccountController_render";
$model = [
    "formAction" => "",
    "formMethod" => "post",
    "nameEmail" => "email",
    "namePass" => "pass",
    "namePass2" => "pass2",
    "nameKey" => "key",
    "nameNewsletter" => "newsletter",
    "valueEmail" => "",
    "valuePass" => "",
    "valuePass2" => "",
    "valueKey" => $key,
    "checkedNewsletter" => "",
    //
    "errorEmail" => "",
    "errorPass" => "",
    "errorPass2" => "",
];


if (array_key_exists($model['nameKey'], $_POST) && $key === $_POST[$model['nameKey']]) {
    $model['valueEmail'] = $_POST[$model['nameEmail']];
    $model['valuePass'] = $_POST[$model['namePass']];
    $model['valuePass2'] = $_POST[$model['namePass2']];
    $model['checkedNewsletter'] = (array_key_exists($model['nameNewsletter'], $_POST)) ? 'checked' : '';


    $validator = OnTheFlyFormValidator::create();
    if (true === $validator->validate([
            'email' => ['required', 'email'],
            'pass' => ['required', "min:6"],
            'pass2' => ['required', 'sameAs:pass'],
        ], $model)
    ) {
        az("form has validated");
    }

}