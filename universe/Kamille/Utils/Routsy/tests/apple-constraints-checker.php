<?php


use Kamille\Utils\Routsy\Util\ConstraintsChecker\AppleConstraintsChecker;


require "bigbang.php";


$constraints = [
    // ints
    'dynamic' => ">6",
    'dynamic2' => ">=6",
    'dynamic3' => "<6",
    'dynamic4' => "<=6",
    'dynamic5' => "6", // =
    'dynamic6' => ">7<10",
    'dynamic6b' => ">=7<10",
    'dynamic6c' => ">=7<=10",
    'dynamic6d' => ">7<=10",
    'dynamic9' => ["78", "45"], // alternatives
    // strings
    'dynamic7' => "kabo",
    'dynamic8' => ["kano", "kabo"], // alternatives
];

//--------------------------------------------
// PLAYGROUND
//--------------------------------------------
$arr = [
    "none",
    "INTS--------------",
    [["p" => "6"], []], // true (no constraint)
    "=",
    [["p" => "5"], ["p" => "5"]],
    [["p" => "6"], ["p" => "5"]],
    ">",
    [["p" => "5"], ["p" => ">6"]], // false
    [["p" => "6"], ["p" => ">6"]], // false
    [["p" => "7"], ["p" => ">6"]], // true
    ">=",
    [["p" => "5"], ["p" => ">=6"]], // false
    [["p" => "6"], ["p" => ">=6"]], // true
    [["p" => "7"], ["p" => ">=6"]], // true
    "<",
    [["p" => "5"], ["p" => "<6"]],
    [["p" => "6"], ["p" => "<6"]],
    [["p" => "7"], ["p" => "<6"]],
    "<=",
    [["p" => "5"], ["p" => "<=6"]],
    [["p" => "6"], ["p" => "<=6"]],
    [["p" => "7"], ["p" => "<=6"]],
    "><",
    [["p" => "5"], ["p" => ">6<8"]],
    [["p" => "6"], ["p" => ">6<8"]],
    [["p" => "7"], ["p" => ">6<8"]],
    [["p" => "8"], ["p" => ">6<8"]],
    [["p" => "9"], ["p" => ">6<8"]],
    ">=<",
    [["p" => "5"], ["p" => ">=6<8"]],
    [["p" => "6"], ["p" => ">=6<8"]],
    [["p" => "7"], ["p" => ">=6<8"]],
    [["p" => "8"], ["p" => ">=6<8"]],
    [["p" => "9"], ["p" => ">=6<8"]],
    ">=<=",
    [["p" => "5"], ["p" => ">=6<=8"]],
    [["p" => "6"], ["p" => ">=6<=8"]],
    [["p" => "7"], ["p" => ">=6<=8"]],
    [["p" => "8"], ["p" => ">=6<=8"]],
    [["p" => "9"], ["p" => ">=6<=8"]],
    "><=",
    [["p" => "5"], ["p" => ">6<=8"]],
    [["p" => "6"], ["p" => ">6<=8"]],
    [["p" => "7"], ["p" => ">6<=8"]],
    [["p" => "8"], ["p" => ">6<=8"]],
    [["p" => "9"], ["p" => ">6<=8"]],
    "STRINGS--------------",
    [["p" => "pou"], ["p" => "pou"]],
    [["p" => "pou"], ["p" => "pouo"]],
    "ALTERNATIVES--------------",
    [["p" => "pou"], ["p" => ["pou", "hi"]]],
    [["p" => "hi"], ["p" => ["pou", "hi"]]],
    [["p" => "plof"], ["p" => ["pou", "hi"]]],
    [["p" => "8"], ["p" => ["pou", "8"]]],
];


//--------------------------------------------
// SCRIPT
//--------------------------------------------
function match(array $urlParams, array $constraints, $signal = false)
{
    if (is_string($signal)) {
        a("--------------");
    }
    a(AppleConstraintsChecker::checkConstraints($urlParams, $constraints));
    if (is_string($signal)) {
        a("--------------");
    }
}


?>
    <style>
        .testtable {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .testtable tr,
        .testtable td {
            border: 1px solid black;
            padding: 0 5px;
        }
    </style>
    <table class="testtable">

        <?php
        $i = 1;
        foreach ($arr as $list) {
            ?>
            <tr><?php
            ?>
            <td><?php echo $i; ?></td><?php
            ?>
            <td><?php


            if (is_string($list)) {
                echo $list;
            } else {
                list($urlParams, $constraints) = $list;
                $signal = false;
                if (array_key_exists(2, $list)) {
                    $signal = $list[2];
                }
                match($urlParams, $constraints, $signal);
                $i++;
            }

            ?></td><?php
            ?></tr><?php
        }
        ?>
    </table>
<?php


