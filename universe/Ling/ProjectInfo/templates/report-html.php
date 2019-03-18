<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Info Report</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Share+Tech+Mono" rel="stylesheet">

    <script type="application/javascript">
        <?php include __DIR__ . "/../assets/js/plotly-latest.min.js" ?>
    </script>
    <!--    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>-->

    <style type="text/css">

        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        html {
            height: 100%;
        }

        body {
            min-height: 100%;
            padding: 0;
            margin: 0;
            font-family: 'Roboto Condensed', sans-serif;

        }

        .columns {
            display: flex;
        }

        .directory {
            font-size: 0.7em;
            background: white;
            color: black;
            font-family: 'Share Tech Mono', monospace;
            padding: 0 7px;
            margin-left: 10px;
        }


        h1 {
            background: black;
            color: white;
            padding: 30px;
            margin: 0;
        }

        .table {
            border: 1px solid gray;
            border-collapse: collapse;

        }

        .table tr, .table td {
            border: 1px solid gray;
            padding: 10px;
        }


        .container{
            padding: 20px;
        }
    </style>




</head>
<body>

<?php

$extra = $info['__extra_project_info__'];
$extensions = $info;
$weigthCount = $extra['weight_count'];
unset($extensions['__extra_project_info__']);
$emptyExtensionsCount = $extra['empty_extensions'];


?>

<h1>Project info <span class="directory"><?php echo $extra['dir']; ?></span></h1>


<div class="container">
    <div>
        <table class="table">
            <tr>
                <td>Number of files</td>
                <td><?php echo $extra['nb_total_files']; ?></td>
            </tr>
            <tr>
                <td>Total weight (Mb)</td>
                <td><?php echo $extra['size_total_files_megabytes']; ?></td>
            </tr>
        </table>
    </div>

    <div class="columns">
        <div>
            <div id="extensions_count"></div>
        </div>
        <div>
            <div id="empty_extensions_count"></div>
        </div>
    </div>


    <div class="columns">
        <div>
            <div id="weight_count"></div>
        </div>
        <div>
            <div id="php_files_classes"></div>
        </div>
    </div>
</div>

<script>


    //----------------------------------------
    // EXTENSION COUNT
    //----------------------------------------
    var data = [
        {
            x: <?php echo json_encode(array_keys($extensions)); ?>,
            y: <?php echo json_encode(array_values($extensions)); ?>,
            type: 'bar'
        }
    ];

    Plotly.newPlot('extensions_count', data, {
        title: "Extensions count"
    });


    //----------------------------------------
    // WEIGHT COUNT
    //----------------------------------------
    data = [
        {
            x: <?php echo json_encode(array_keys($weigthCount)); ?>,
            y: <?php echo json_encode(array_values($weigthCount)); ?>,
            type: 'bar'
        }
    ];

    Plotly.newPlot('weight_count', data, {
        title: "Weight count"
    });


    //----------------------------------------
    // EMPTY EXTENSIONS COUNT
    //----------------------------------------
    data = [
        {
            x: <?php echo json_encode(array_keys($emptyExtensionsCount)); ?>,
            y: <?php echo json_encode(array_values($emptyExtensionsCount)); ?>,
            type: 'bar'
        }
    ];

    Plotly.newPlot('empty_extensions_count', data, {
        title: "Empty extensions details"
    });


    //----------------------------------------
    // PHP CLASS / FILE PROPORTION
    //----------------------------------------
    var trace1 = {
        x: ['php'],
        y: [<?php echo $extra['nb_php_files']; ?>],
        name: 'Php files',
        type: 'bar'
    };

    var trace2 = {
        x: ['php'],
        y: [<?php echo $extra['nb_classes']; ?>],
        name: 'Php Classes',
        type: 'bar'
    };

    var data = [trace1, trace2];
    var layout = {barmode: 'stack', title: "Php Class / Php Files"};
    Plotly.newPlot('php_files_classes', data, layout);


</script>


</body>
</html>