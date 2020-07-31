Node info parser
==========
2020-07-14 -> 2020-07-17


Recently I wanted to be able to update a config file programmatically, and preserving its comments.

This requirement revealed the need for a comment parser.


The strategy I could think about was something like this:

- first collect the existing comments
- then update the config file
- then re-inject the existing comments


Now the technique of collect/re-injection I came up with is based on the [bdot](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md) keys
of the config file.

The problem with this approach is that if the updated config changes a key, any comment attached to that
key will disappear.

However, that was still the simplest (i.e. the lesser evil) solution I came up with.

So bear that in mind if you plan to use this comment parser.  


In addition to that, I noticed that the old **BabyYamlUtil::writeFile** function was not agnostic, but interpreted values
in its own way. So to fix that as well, and kill two birds with one stone, I turned my comment parser into a nodeInfo parser, 
which now provides not only information about the comments of a file, but also about the key and value types, which is useful info
when rewriting a babyYaml file from scratch.



So now, to update a file, we can do this (note the "comments" property, which makes it easier to add custom comments):


```php
<?php


use Ling\BabyYaml\BabyYamlUtil;

require_once "app.init.inc.php";


$file = __DIR__ . "/../config/services/Light_Train.byml";
$file2 = __DIR__ . "/../config/services/Light_Train2.byml";


$config = BabyYamlUtil::readFile($file);
list($config, $nodeInfoMap) = BabyYamlUtil::parseNodeInfoByFile($file);


//az($nodeInfoMap);


$config['train']['methods']['setOptions']['options']["theLastOption"] = "marijuana"; // updating the config...
$config['train']['methods']['setOptions']['options']["sequence"][] = "topic";


BabyYamlUtil::writeFile($config, $file2, [
    "nodeInfoMap" => $nodeInfoMap,
    "comments" => [
        "train.methods.setOptions.options.useDebug" => [
            "inline" => "       # an inline comment, with controlled indentation",
            "block" => [
                "# jiji",
                "# jojo",
            ],
        ],
    ],
]);






```





commentsMap
----------
2020-07-16


A **comments map** is an array of [bdot paths](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md) to commentItems (explained in the next section).
The **comment map** is the basic tool I use at the heart of the strategy described above: to collect the comments,
and re-injecting them later.



node info map
-------------
2020-07-17


In order to restore a proper babyYaml file, we need a **node info map**.

This is an array of [bdot paths](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md) to **nodeInfo**.

With **node info** contains various information about a specific node:

- keyType: string indicating what type of key was used, it can be one of:
    - auto
    - manual

- type: string, the type of value used, can be one of the following:
    - hybrid
    - quote
    - sequence
    - mapping
    - multi
    
- value: string, the original value as written in the babyYaml array (or string), but without the comment
- realValue: mixed, the interpreted value

- comments: array of [commentItems](#commentitem)


All properties are optional.

The **keyType**, **type**, **originalValue** and **value** properties act as an atomic group, so if one of them
is defined, all the others must be defined. The **comments** property acts as its own group.
    


 





commentItem
---------------
2020-07-14 -> 2020-07-17


A comment item is an array representing a comment attached to a specific key.

Its structure is the following:

- 0: string, the comment type, on of:
    - inline
    - block
    - inline-value
    - mutli-top
    - mutli-bottom
- 1: string, the comment text
    


The differences between comment types is:

- inline: a comment starting just after the key declaration
- block: a comment standing alone on its line 
- inline-value: a comment starting after the value  
- multi-top: a comment starting after the "begin char" of a multiline text  
- multi-bottom: a comment starting after the "end char" of a multiline text  
