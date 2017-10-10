<?php


use RowsGenerator\ArrayRowsGenerator;
use RowsGeneratorWidget\Util\RowsGeneratorWidgetUtil;
use RowsGeneratorWidget\Widget\RowsGeneratorWidget;
use RowsGeneratorWidget\WidgetCollection\RowsGeneratorWidgetCollection;

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