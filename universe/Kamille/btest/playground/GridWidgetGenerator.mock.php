<?php


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Ling\Z;
use Kamille\Mvc\LayoutProxy\LawsLayoutProxy;
use Kamille\Mvc\WidgetDecorator\GridWidgetDecorator;
use Kamille\Mvc\WidgetDecorator\MockGridWidgetDecorator;
use Kamille\Mvc\WidgetDecorator\PositionWidgetDecorator;
use Kamille\Utils\Laws\LawsUtil;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


//$viewId = "test";
//$options = [];
//$config = [];
//$decorator = MockGridWidgetDecorator::create();
//$layoutProxy = LawsLayoutProxy::create()
//    ->addDecorator(PositionWidgetDecorator::create())
//    ->addDecorator($decorator);
//echo LawsUtil::create()
//    ->setLawsLayoutProxy($layoutProxy)
//    ->renderLawsViewById($viewId, $config, $options);


//--------------------------------------------
// TESTING
//--------------------------------------------
$all = [
    [
        [
            '1/3',
            '1/3',
            '1/3',
            '1/3',
            '2/3-1',
            '1/2',
            '1/2.',
        ],
        '[row]
                [col-1/3]0[/col][col-1/3]1[/col][col-1/3]2[/col]
         [/row]
         [row]
            [col-1/3]3[/col]
            [col-2/3]
                [row]
                    [col-1/1]4[/col]
                [/row]
                [row]
                    [col-1/2]5[/col][col-1/2]6[/col]
                [/row]
            [/col]
        [/row]',
    ],
    [
        [
            '1/3',
            '2/3-1',
            '1/2',
            '1/2.',
        ],
        '[row]
            [col-1/3]0[/col]
            [col-2/3]
                [row]
                    [col-1/1]1[/col]
                [/row]
                [row]
                    [col-1/2]2[/col][col-1/2]3[/col]
                [/row]
            [/col]
        [/row]',
    ],
    [
        [
            '1/3',
            '2/3-1.',
            '1/2',
            '1/2',
        ],
        '[row]
            [col-1/3]0[/col]
            [col-2/3]
                [row]
                    [col-1/1]1[/col]
                [/row]
            [/col]
        [/row]
        [row]
            [col-1/2]2[/col][col-1/2]3[/col]
        [/row]',
    ],
    [
        [
            '1/3',
            '1/3',
            '1/3',
            '1/6',
            '5/6-1/3',
            '2/3-1..',
        ],
        '[row]
                [col-1/3]0[/col][col-1/3]1[/col][col-1/3]2[/col]
         [/row]
         [row]
            [col-1/6]3[/col]
            [col-5/6]
                [row]
                    [col-1/3]4[/col]
                    [col-2/3]
                        [row]
                            [col-1/1]5[/col]
                        [/row]
                    [/col]
                [/row]
            [/col]
        [/row]',
    ],
];


foreach ($all as $k => $info) {

    list($frags, $expected) = $info;
    $expected = str_replace(["\n", " ", "\t"], '', $expected);
//--------------------------------------------
//
//--------------------------------------------
    $w = [];
    foreach ($frags as $wId => $frag) {
        $w['maincontent.' . $wId] = [
            "grid" => $frag,
            "tpl" => "HtmlCode/default",
            "conf" => [
                "html" => "any",
            ],
        ];
    }
    $config = [
        "layout" => [
            "tpl" => "admin/default",
        ],
        "widgets" => $w,
        "grid" => ['maincontent'],
    ];
    $options = [];
    $decorator = MockGridWidgetDecorator::create();
    $layoutProxy = LawsLayoutProxy::create()->addDecorator($decorator);
    LawsUtil::create()
        ->setLawsLayoutProxy($layoutProxy)
        ->renderLawsView($config, $options);


    $s = $decorator->getStream();

    echo $s;
    echo '<br>';
    a($expected === $s);
}
