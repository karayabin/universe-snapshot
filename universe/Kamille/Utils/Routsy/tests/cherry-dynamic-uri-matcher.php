<?php


use Kamille\Utils\Routsy\Util\DynamicUriMatcher\CherryDynamicUriMatcher;

require "bigbang.php";



//--------------------------------------------
// PLAYGROUND
//--------------------------------------------
$patterns2Uri = [
    ["/pou", "/pou"],
    ["/pou", "/po"],
    ["/pou", "/poui"],
    ["/pou", "/pou/"],
    ["/pou/", "/pou/"], // false, the last slash is removed from the uri
    ["/pou/", "/pou//"], // true, ONLY the last slash is removed from the uri
    ["/pou/pa", "/pou/pa"],

    //--------------------------------------------
    // DEFAULT TAGS
    //--------------------------------------------
    "DEFAULT TAGS",
    ["/{some}/pa", "/pou/pa"], // some=pou
    ["/{some}/pa", "/pou/e/pa"], // false
    ["/{some}", "/poua"], // some=poua
    ["{some}", "/poua"], // false, the first char of the uri is a slash
    ["/blog/{some}", "/blog/42"], // some=42
    ["/blog/{some}", "/blog/42/45"], // false
    ["/blog/{some}/45", "/blog/42/45"], // some=42
    ["/blog/{some}/{oo}", "/blog/42/45"], // some=42, oo=45
    ["/blog{some}", "/blog/42"], // false

    //--------------------------------------------
    // SLASH OPTIONAL TAG
    //--------------------------------------------
    "SLASH OPTIONAL TAGS",
    ["/blog{/green}", "/blog"], // green=null
    ["/blog{/green}", "/blog/78"], // green=78
    ["/blog{/green}", "/blog/78/105"], // false
    ["/blog{/green}/105", "/blog/78/105"], // green=78
    ["/blog{/green}/{/red}", "/blog/78/105"], // green=78, red=105
    ["/blog{/green}{/red}", "/blog/78/105"], // green=78, red=105

    //--------------------------------------------
    // GREEDY TAGS, the greedy tag should always be the last one
    //--------------------------------------------
    "GREEDY TAGS",
    ["/{some+}/pa", "/pou/pa"], // some=pou
    ["/{some+}", "/pou/pa"], // some=pou/pa
    ["/pou/{some+}", "/pou/pa"], // some=pa
    ["/pou{some+}", "/pou/pa"], // some=/pa
    ["/pou{some+}pa", "/pou/pa"], // some=/
    ["/pou/{some+}pa", "/pou/uupa"], // some=uu
    ["{some+}", "/pou/uupa"], // some=/pou/uupa
    ["/pou{some+}", "/pou"], // some=null
];


//--------------------------------------------
// SCRIPT
//--------------------------------------------
function match($pattern, $uri, $signal = false)
{
    if (is_string($signal)) {
        a("--------------");
    }
    a(CherryDynamicUriMatcher::matchDynamic($pattern, $uri));
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
        foreach ($patterns2Uri as $list) {
            ?>
            <tr><?php
            ?>
            <td><?php echo $i; ?></td><?php
            ?>
            <td><?php


            if (is_string($list)) {
                echo $list;
            } else {
                list($pattern, $uri) = $list;
                $signal = false;
                if (array_key_exists(2, $list)) {
                    $signal = $list[2];
                }
                match($pattern, $uri, $signal);
                $i++;
            }

            ?></td><?php
            ?></tr><?php
        }
        ?>
    </table>
<?php


