<?php


use Module\NullosAdmin\Utils\N;

if (!isset($formRoute)) {
    $formRoute = null;
}

if (!isset($ric)) {
    $ric = null;
}


/**
 * @todo-ling: do the english version of this
 */
$defaultConf = [
    //--------------------------------------------
    // LIST WIDGET
    //--------------------------------------------
    'listActions' => [
        [
            'name' => 'delete',
            'label' => 'Supprimer',
            'icon' => 'fa fa-close',
            'confirm' => "Êtes-vous sûr(e) de vouloir supprimer ces lignes ?",
            'confirmTitle' => "Attention",
            'confirmOkBtn' => "Ok",
            'confirmCancelBtn' => "Annuler",
            /**
             * disabled: false (default)|true|"selection"
             *              If false, the button is enabled.
             *              If true, the button is disabled.
             *              If selection, the button is disabled by default, and becomes
             *                      enabled only when the user selects some rows.
             */
            'disabled' => "selection",
        ],
    ],
    //--------------------------------------------
    // ADMIN TABLE
    //--------------------------------------------
    // optional
    //--------------------------------------------
    'allowedSort' => null, // array|null, null means all
    'allowedFilters' => null, // array|null, null means all
//
    "sort" => [],
    "filters" => [],
    "page" => 1,
    "nipp" => 20,
    "nippChoices" => [
        2 => 2,
        5 => 5,
        10 => 10,
        25 => 25,
        50 => 50,
        100 => 100,
        200 => 200,
        0 => "Tout",
    ],
];


if (null !== $ric) {

    $defaultFormLinkPrefix = null;
    $hasQuestionMark = false;
    if (array_key_exists("defaultFormLinkPrefix", $conf)) {
        $defaultFormLinkPrefix = $conf['defaultFormLinkPrefix'];
        $hasQuestionMark = (false !== strpos($defaultFormLinkPrefix, "?"));
    } elseif (null !== $formRoute) {
        $defaultFormLinkPrefix = N::link($formRoute);
    }
    $extraVars = (array_key_exists("formRouteExtraVars", $conf)) ? $conf['formRouteExtraVars'] : [];

    if ($defaultFormLinkPrefix) {


        $adaptor = (array_key_exists("rowActionUpdateRicAdaptor", $conf)) ? $conf['rowActionUpdateRicAdaptor'] : [];
        $defaultConf['rowActions'] = [
            // same as listActions,
            [
                "name" => "update",
                "label" => "Modifier",
                "icon" => "fa fa-pencil",
                "link" => function (array $row) use ($ric, $defaultFormLinkPrefix, $adaptor, $hasQuestionMark, $extraVars) {
                    $s = $defaultFormLinkPrefix;
                    if (false === $hasQuestionMark) {
                        $s .= '?form';
                    }
                    foreach ($ric as $col) {
                        $keyCol = (array_key_exists($col, $adaptor)) ? $adaptor[$col] : $col;
                        $s .= "&";
                        $s .= $keyCol . "=" . $row[$col]; // escape?
                    }
                    foreach ($extraVars as $k => $v) {
                        if (in_array($k, $ric , true)) {
                            continue;
                        }
                        $s .= "&";
                        $s .= $k . "=" . $v;
                    }
                    return $s;
                },
            ],
            [
                'name' => 'delete',
                'label' => 'Supprimer',
                'icon' => 'fa fa-close',
                'confirm' => "Êtes-vous sûr(e) de vouloir supprimer cette ligne ?",
                'confirmTitle' => "Attention",
                'confirmOkBtn' => "Ok",
                'confirmCancelBtn' => "Annuler",
            ],
        ];
    }
}
