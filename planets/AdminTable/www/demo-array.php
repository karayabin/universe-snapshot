<?php


use AdminTable\Listable\ArrayListable;
use AdminTable\Table\AdminTable;
use AdminTable\Table\ListWidgets;
use AdminTable\View\AdminTableRenderer;

require_once "bigbang.php";
ini_set('display_errors', 1);
?>
    <link rel="stylesheet" href="/style/admintable.css">
<?php

$arr = [
    [
        'id' => 1,
        'name' => "Paul",
    ],
    [
        'id' => 2,
        'name' => "Rachel",
    ],
    [
        'id' => 3,
        'name' => "Marie",
    ],
    [
        'id' => 4,
        'name' => "Koala",
    ],
    [
        'id' => 5,
        'name' => "Michelle",
    ],
    [
        'id' => 6,
        'name' => "Felicia",
    ],
];

$list = AdminTable::create()
    ->setRic(['id', 'name'])
    ->setRicSeparator('--*--')
    ->setWidgets(ListWidgets::create()
        ->setNbItemsPerPageList([1, 2, 5, 'all'])
//        ->disableMultipleActions()
        ->disablePagination()
        ->disableNippSelector()
        ->disablePageSelector()
        ->disableSearch()
    )
    ->setListable(ArrayListable::create()->setArray($arr))
    ->setExtraColumn('edit', '<a href="/somepath?ric={ric}" >Edit</a>', 0)
    ->setExtraColumn('delete', '<a href="#" class="confirmlink postlink" data-action="delete" data-ric="{ric}" data-value="myvalue">Delete</a>')
    ->setTransformer('name', function ($v, $item, $ricValue) {
        return strtoupper($v);
    })
    ->setTransformer('edit', function ($v, $item, $ricValue) {
        return str_replace('{ric}', $ricValue, $v);
    })
    ->setTransformer('delete', function ($v, $item, $ricValue) {
        return str_replace('{ric}', $ricValue, $v);
    })
    ->setSingleActionHandler('delete', function ($ric) {
        a($ric);
    })
    ->setMultipleActionHandler('deleteAll', 'Delete All', function ($rics) {
        a($rics);
    }, true)
    ->setRenderer(AdminTableRenderer::create());


$list->tableGetKey = "name";
$list->pageGetKey = "page";
$list->nbItemsPerPageGetKey = "nipp";
$list->sortColumnGetKey = "sort";
$list->sortColumnDirGetKey = "dir";
$list->searchGetKey = "search";


$list->nbItemsPerPage = 2;
$list->sortColumn = "id";
$list->sortColumnDir = "desc";

$list->showCheckboxes = true;
$list->columnLabels = [
    'edit' => "",
];
$list->hiddenColumns = [
    'id',
];

$list->displayTable();


