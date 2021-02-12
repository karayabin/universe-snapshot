EchartsWrapper
===========
2018-04-08



A php wrapper for the js echarts library.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).

The echarts js library is [here](https://ecomfe.github.io/echarts-examples/public/index.html#chart-type-pie)


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/EchartsWrapper
```

Or just download it and place it where you want otherwise.


How to
==========

Example in a [kamille](https://github.com/lingtalfi/kamille) app.

```php
<?php


use Core\Services\A;
use Ling\EchartsWrapper\EchartsWrapper;
use Module\Ekom\Api\Layer\OrderLayer;
use Module\Ekom\Api\Layer\OrderStatusLayer;
use Module\Ekom\Utils\EkomStatsUtil\EkomStatsUtil;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


$orderDistribution = OrderLayer::getOrdersDistributionByRange('2017-12-01', '2017-12-31');
$orderStatusLabels2Colors = OrderStatusLayer::getOrderStatusLabel2BgColor();


$dateStart = "2017-12-01";
$dateEnd = "2018-04-01";
$options = [];

$graph = EkomStatsUtil::create()
    ->prepare($dateStart, $dateEnd, $options)
    ->getGraph("nbOrdersAndNbProductsAndNetProfit");


$rowsNbOrders = [];
$rowsRevenueProfit = [];
$rowsNbItems = [];
$rows = [];
foreach ($graph as $date => $info) {
    $rowsNbOrders[] = [$date, $info["count"]];
    $rowsRevenueProfit[] = [$date, $info["sum"]];
    $rowsNbItems[] = [$date, $info["sumNbItems"]];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/libs/echarts/echarts.min.js"></script>
</head>

<body>

<?php EchartsWrapper::displayBasicLineChart([
    'title' => "Nombre de commandes et quantités commandées",
    'series' => [
        'Nombre de commandes' => $rowsNbOrders,
        'Quantité commandée' => $rowsNbItems,
    ],
]) ?>


<?php EchartsWrapper::displayBasicLineChart([
    'title' => "Ventes",
    'series' => [
        'Ventes: EUR' => $rowsRevenueProfit,
    ],
    'toolTipFormatter' => <<<EEE
<span style="color: #c2c2c2; font-size: 0.8em;">{key}</span><br>{value}€
EEE
]) ?>


<?php EchartsWrapper::displayPie([
    'title' => "Distribution des états de commande",
    'labelColor' => "black",
    'data' => $orderDistribution,
    'dataColors' => $orderStatusLabels2Colors,
]) ?>


</body>
</html>

```





History Log
------------------

- 1.3.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.0 -- 2018-05-16

    - add EchartsWrapper::displayCountryMap method

- 1.2.0 -- 2018-05-13

    - add legend options for EchartsWrapper::displayPie method

- 1.1.1 -- 2018-04-10

    - fix init protected using self keyword instead of static
    
- 1.1.0 -- 2018-04-10

    - add init protected method

- 1.0.2 -- 2018-04-08

    - fix legend labels returning typo

- 1.0.1 -- 2018-04-08

    - fix wrong namespace, and call to self protected instead of static protected

- 1.0.0 -- 2018-04-08

    - initial commit