<?php


//--------------------------------------------
// ROWS GENERATOR WIDGET SERVICE
//--------------------------------------------
/**
 * Implementation example.
 * Translate this in your framework.
 *
 * Or another goodies by lingTalfi
 * 2017-06-19
 */

use Ling\RowsGenerator\ArrayRowsGenerator;
use Ling\RowsGeneratorWidget\Util\RowsGeneratorWidgetUtil;
use Ling\RowsGeneratorWidget\Widget\RowsGeneratorWidget;
use Ling\RowsGeneratorWidget\WidgetCollection\RowsGeneratorWidgetCollection;


require_once __DIR__ . "/../../boot.php"; // here I'm using kamille framework: https://github.com/lingtalfi/kamille
require_once __DIR__ . "/../../init.php";


function myAppGiveMeRowCollection()
{
    /**
     * You probably want to call a service from your application
     * that returns the same instance, be it on the service side like here,
     * or the front side (controller)
     */
    $data[] = array('volume' => 67, 'edition' => 2, "pou" => "abc");
    $data[] = array('volume' => 86, 'edition' => 1, "pou" => "def");
    $data[] = array('volume' => 85, 'edition' => 6, "pou" => "ghi");
    $data[] = array('volume' => 98, 'edition' => 2, "pou" => "jkl");
    $data[] = array('volume' => 86, 'edition' => 6, "pou" => "mno");
    $data[] = array('volume' => 67, 'edition' => 2, "pou" => "pab");
    $data[] = array('volume' => 67, 'edition' => 2, "pou" => "chop");
    $data[] = array('volume' => 67, 'edition' => 2, "pou" => "karma");

    $collection = RowsGeneratorWidgetCollection::create()
        ->setWidget("books", RowsGeneratorWidget::create()
            ->setRowsGenerator(ArrayRowsGenerator::create()->setArray($data)));

    return $collection;
}


//--------------------------------------------
// HERE WE USE THE GSCP protocol (https://github.com/lingtalfi/gscp)
//--------------------------------------------
$ret = [
    'type' => "error", // error|success
    'data' => "nothing has been done yet",
];

if (
    array_key_exists('name', $_POST) &&
    array_key_exists('page', $_POST) &&
    array_key_exists('nipp', $_POST)
) {

    try {

        $widgetName = $_POST['name'];

        $collection = myAppGiveMeRowCollection();
        $widget = $collection->getWidget($widgetName);


        $sortValues = (array_key_exists('sortValues', $_POST)) ? $_POST['sortValues'] : [];
        $searchItems = (array_key_exists('searchItems', $_POST)) ? $_POST['searchItems'] : [];

        $params = [
            'page' => $_POST['page'],
            'nipp' => $_POST['nipp'],
            'sortValues' => $sortValues,
            'searchItems' => $searchItems,
        ];
        $ret['type'] = 'success';
        $ret['data'] = RowsGeneratorWidgetUtil::getInfoArray($widgetName, $widget, $params);
    } catch (\Exception $e) {
        $ret['data'] = $e->getMessage();
    }
}


echo json_encode($ret);