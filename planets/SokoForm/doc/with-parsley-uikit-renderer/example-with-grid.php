<?php

use Module\ThisApp\DocumentCollector\LeaderfitDocumentCollectionHandler;
use SokoForm\Renderer\Ling\WithParsleyUikitSokoFormRenderer;

LeaderfitDocumentCollectionHandler::getLib("soko");


$formModel = $v['form'];
$nbSteps = $v['nbSteps'];


?>
<div class="uk-container uk-container-small">
    <div class="uk-card uk-card-default uk-card-large uk-card-body">
        <h3 class="uk-card-title uk-heading-divider">Formulaire d'inscription suite (étape 2/<?php echo $nbSteps; ?>
            )</h3>


        <?php WithParsleyUikitSokoFormRenderer::create()
            ->setTopNotificationMessage("Quelques erreurs se sont glissées dans le formulaire.
        Veuillez les corriger puis repostez le formulaire à nouveau.")
            ->renderForm($formModel, [
                "disableParsley" => true,
                "submitButtonClass" => "uk-align-right",
                "submitButtonText" => "Envoyer",
                "noValidate" => true,
                "style" => "horizontal",
                "style" => "stacked",
                "headings" => [
                    "first_name" => "À propos de vous",
                    "boss_company" => "À propos de votre employeur",
                ],
                "grid" => [
                    "first_name" => "1-2@s",
                    "last_name" => "1-2@s",
                    "country" => "1-4@s",
                    "postcode" => "1-4@s",
                    "city" => "1-2@s",
                    "address" => "1-1",
                    "phone" => "1-2@s",
                    "email" => "1-2@s",
                    "boss_company" => "1-1@s",
                    "boss_country" => "1-4@s",
                    "boss_postcode" => "1-4@s",
                    "boss_city" => "1-2@s",
                    "boss_address" => "1-1",
                    "boss_phone" => "1-4@s",
                    "boss_email" => "1-4@s",
                ],
//            "topContent" => '
//<p class="uk-text-small">
//Vous êtes salarié(e) d’une société, d’une entreprise ou d’une association ou dirigeant(e) salarié(e) ou TNS d’une société, sélectionnez votre motivation (une seule réponse possible):
//</p>
//',

            ]); ?>
    </div>


</div>