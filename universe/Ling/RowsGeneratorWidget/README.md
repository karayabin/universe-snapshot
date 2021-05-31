RowsGeneratorWidget
=========================
2017-06-19 -> 2021-03-05



A system to display list on a front end.





This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.RowsGeneratorWidget
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/RowsGeneratorWidget
```

Or just download it and place it where you want otherwise.




Intro
========

List are one of the most requested widget we need to display as developers.

The [RowsGenerator planet](https://github.com/lingtalfi/RowsGenerator) brings some element on the table,
by allowing us to have a configurable list (sort, search, number of items per page, ...),
and abstracting the source (database or array).

But that's only the first part of the picture.

The RowsGeneratorWidget is the missing part of the RowsGenerator planet: it provides
the concrete (mvc) implementation that we need as developers.



Example
===========

The following example should be adapted to your framework, but the logic remains the same:

- first, access the RowsGeneratorWidget instance
- then, configure it using the params array (in the example), which gives you a model for your template
- then, create the template you want
- in this example, we use an ajax driven list, so in this case is to create the 
        javascript interaction; the main thing we need to do is to create the refreshWidget
        function, which is responsible for refreshing the widget when new data arrives
- since we are using ajax, we also need a service to handle our requests.
         See how it is done in the "doc/demo" directory of this repository.
         Note: we use a jquery plugin to help us (which is also in the **doc/demo** dir).
 



Note: in the js script's comments is explained how the jquery plugin works and how it expects 
certain markup to be in place.
The example below shows an example markup for the following keys:

- usePageLinks
- useSortSelector




```php
<?php


use Ling\RowsGenerator\ArrayRowsGenerator;
use Ling\RowsGeneratorWidget\Util\RowsGeneratorWidgetUtil;
use Ling\RowsGeneratorWidget\Widget\RowsGeneratorWidget;
use Ling\RowsGeneratorWidget\WidgetCollection\RowsGeneratorWidgetCollection;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


//--------------------------------------------
// APPLICATION SIDE (controller & service will both need access to the collection)
//--------------------------------------------
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


//--------------------------------------------
// CONTROLLER SIDE
//--------------------------------------------
/**
 * We will use ajax for this implementation,
 * so params are not required, the default of page 1 will be used.
 *
 * However if we later create a static version, using $_POST as input,
 * then we need an adaptor to convert post to params automatically for us.
 *
 *
 */
$params = [
    'nipp' => 2,
    'sortValues' => ['edition' => 'asc', 'volume' => 'desc'],
];
$widgetName = "books";
$widget = $collection->getWidget($widgetName);

//
$model = RowsGeneratorWidgetUtil::getInfoArray($widgetName, $widget, $params);


//--------------------------------------------
// TEMPLATE SIDE
//--------------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/theme/lee/libs/jquery/jquery-3.2.1.min.js"></script>
    <script src="/theme/lee/libs/rows-generator-widget/jquery-rgw.js"></script>
</head>

<body>
<style>
    .selected {
        color: red;
    }
</style>
<div class="rgw-widget" data-name="<?php echo $model['widgetName']; ?>">
    <div class="unique-sort-widget">
        Sort by:
        <select class="unique-sort-selector">
            <option value="0">Choose an option</option>
            <option data-sort-dir="asc" data-sort-column="volume">Volume asc</option>
            <option data-sort-dir="desc" data-sort-column="volume">Volume desc</option>
            <option data-sort-dir="asc" data-sort-column="edition">Edition asc</option>
            <option data-sort-dir="desc" data-sort-column="edition">Edition desc</option>
            <option data-sort-dir="asc" data-sort-column="pou">Pou asc</option>
            <option data-sort-dir="desc" data-sort-column="pou">Pou desc</option>
        </select>
    </div>
    <table class="maintable">
        <thead>
        <tr>
            <th>Volume</th>
            <th>Edition</th>
            <th>Pou</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model['rows'] as $row): ?>
            <tr>
                <td><?php echo $row['volume']; ?></td>
                <td><?php echo $row['edition']; ?></td>
                <td><?php echo $row['pou']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="slice-info">Displaying item <span class="slice-info-first"><?php echo $model['firstPageItem']; ?></span>
        to <span class="slice-info-last"><?php echo $model['lastPageItem']; ?></span></div>
    <div class="pagination">
        <?php for ($i = 1; $i <= $model['nbPages']; $i++):
            $sSel = ($model['page'] === $i) ? 'selected' : '';
            ?>
            <a class="rgw-page rgw-page-top <?php echo $sSel; ?>" data-id="<?php echo $i; ?>"
               href="#"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>

<script>
    $(document).ready(function () {

        var jWidget = $('.rgw-widget');
        var jTableBody = jWidget.find('.maintable tbody');
        var jPagination = jWidget.find('.pagination');
        var jSliceInfo = jWidget.find('.slice-info');
        var model = <?php echo json_encode($model); ?>;

        var columns = ['volume', 'edition', 'pou'];

        function refreshWidget(data) {

            //----------------------------------------
            // REFRESH ROWS
            //----------------------------------------
            var rows = data.rows;
            jTableBody.empty();
            for (var i in rows) {
                var row = rows[i];

                var jLine = $('<tr></tr>');
                for (var j in columns) {
                    jLine.append($('<td>' + row[columns[j]] + '</td>'));
                }
                jTableBody.append(jLine);
            }

            //----------------------------------------
            // REFRESH PAGINATION
            //----------------------------------------
            var page = data.page;
            jPagination.find('.rgw-page').removeClass("selected");
            jPagination.find('.rgw-page[data-id="' + page + '"]').addClass("selected");


            //----------------------------------------
            // REFRESH SLICE INFO
            //----------------------------------------
            jSliceInfo.find('.slice-info-first').html(data.firstPageItem);
            jSliceInfo.find('.slice-info-last').html(data.lastPageItem);

        }


        jWidget.rowsGeneratorWidget({
            refreshWidget: refreshWidget,
            page: model.page,
            nipp: model.nipp,
            sortValues: model.sortValues,
            searchItems: model.searchItems
        })
    });
</script>
</body>
</html>
```







Related
============

- https://github.com/lingtalfi/RowsGenerator





History Log
------------------

- 1.0.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-06-19

    - initial commit
