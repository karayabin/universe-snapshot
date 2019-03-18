<?php

use Ling\CliTools\Output\Output;
use Ling\CliTools\Util\TableUtil;

$extra = $info['__extra_project_info__'];
$extensions = $info;
$weigthCount = $extra['weight_count'];
unset($extensions['__extra_project_info__']);
$emptyExtensionsCount = $extra['empty_extensions'];


$sep = str_repeat('-', 50) . PHP_EOL;
$miniSep = str_repeat('-', 20) . PHP_EOL;
$output = new Output();
$output->write($sep);
$output->write("<white:bgBlack>Project Info</white:bgBlack> " . $extra['dir'] . "" . PHP_EOL);
$output->write($sep);


//--------------------------------------------
// TOTAL FILES/WEIGHT
//--------------------------------------------
$rows = [
    [
        'Number of files',
        $extra['nb_total_files'],
    ],
    [
        'Total weight (Mb)',
        $extra['size_total_files_megabytes'],
    ],
];


$table = new TableUtil();
$table->setRows($rows);
$table->render($output);




//--------------------------------------------
// PHP FILES/CLASS
//--------------------------------------------
$rows = [
    [
        'Number of php classes',
        $extra['nb_classes'],
    ],
    [
        'Number of php files',
        $extra['nb_php_files'],
    ],
];

$table = new TableUtil();
$table->setRows($rows);
$table->render($output);





//--------------------------------------------
// EXTENSION COUNT
//--------------------------------------------
$output->write(PHP_EOL);
$output->write("Extensions count" . PHP_EOL);
$output->write($miniSep);
arsort($extensions);
foreach ($extensions as $ext => $number) {
    $output->write($ext . ": $number" . PHP_EOL);
}




//--------------------------------------------
// EMPTY EXTENSIONS DETAILS
//--------------------------------------------
$output->write(PHP_EOL);
$output->write("Empty extensions details" . PHP_EOL);
$output->write($miniSep);
arsort($emptyExtensionsCount);
foreach ($emptyExtensionsCount as $ext => $number) {
    $output->write($ext . ": $number" . PHP_EOL);
}



//--------------------------------------------
// WEIGHT COUNT
//--------------------------------------------
$output->write(PHP_EOL);
$output->write("Weight count" . PHP_EOL);
$output->write($miniSep);
arsort($weigthCount);
foreach ($weigthCount as $ext => $number) {
    $output->write($ext . ": $number" . PHP_EOL);
}



