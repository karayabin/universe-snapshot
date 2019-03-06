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

$disableListActions = $conf['disableListActions'] ?? false;
$listActions = [];
if (false === $disableListActions) {
    $listActions[] = [

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
    ];
}

$defaultConf = [
    //--------------------------------------------
    // LIST WIDGET
    //--------------------------------------------
    'listActions' => $listActions,
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
    } elseif ($formRoute) {
        $defaultFormLinkPrefix = N::link($formRoute);
    }
    $extraVars = (array_key_exists("formRouteExtraVars", $conf)) ? $conf['formRouteExtraVars'] : [];

    if ($defaultFormLinkPrefix) {


        $adaptor = (array_key_exists("rowActionUpdateRicAdaptor", $conf)) ? $conf['rowActionUpdateRicAdaptor'] : [];
        $useRic = true;
        if (array_key_exists("formRouteUseRic", $conf) && false === $conf['formRouteUseRic']) {
            $useRic = false;
        }
        $defaultConf['rowActions'] = [
            // same as listActions,
            [
                "name" => "update",
                "label" => "Modifier",
                "icon" => "fa fa-pencil",
                "link" => function (array $row) use ($ric, $defaultFormLinkPrefix, $adaptor, $hasQuestionMark, $extraVars, $useRic) {
                    $s = $defaultFormLinkPrefix;
                    if (false === $hasQuestionMark) {
                        $s .= '?form';
                    }


                    if (true === $useRic) {
                        foreach ($ric as $col) {
                            $keyCol = (array_key_exists($col, $adaptor)) ? $adaptor[$col] : $col;
                            $s .= "&";
                            $s .= $keyCol . "=" . $row[$col]; // escape?
                        }
                    }


                    foreach ($extraVars as $k => $v) {
                        if (true === $useRic && in_array($k, $ric, true)) {
                            continue;
                        } elseif (0 === strpos($v, '$')) {
                            $tag = substr($v, 1);
                            if (array_key_exists($tag, $row)) {
                                $v = $row[$tag];
                            }
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

        if (array_key_exists("formRouteExtraActions", $conf)) {
            $defaultConf['rowActions'] = array_merge($defaultConf['rowActions'], $conf['formRouteExtraActions']);
        }

    }
}
