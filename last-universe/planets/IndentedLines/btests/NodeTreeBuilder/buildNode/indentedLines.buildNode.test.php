<?php

use IndentedLines\NodeToArrayConvertor\NodeToArrayConvertor;
use IndentedLines\NodeTreeBuilder\NodeTreeBuilder;
use IndentedLines\ValueInterpreter\ValueInterpreter;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\Exception\BeastNotApplicableException;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // baseName, keyMode, booleanFlags, indentChar, nbIndent, commentSymbol
    ["flat-list.txt", 2, 'mc', ' ', 4, '#'],
    ["flat-list-leading-dash.txt", 2, 'mch', '-', 4, '#'],
    ["flat-list-key-value.txt", 2, 'mc', '-', 4, '#'],
    ["flat-list-mixed.txt", 2, 'mc', '-', 4, '#'],
    ["flat-list-indented.txt", 2, 'mc', ' ', 4, '#'],
    ["flat-list-key-value-indented.txt", 2, 'mc', ' ', 4, '#'],
    ["flat-list-mixed-indented.txt", 2, 'mc', ' ', 4, '#'],
    ["dash-list-mixed-indented.txt", 2, 'mch', '-', 4, '#'],
    ["flat-list-mixed-indented-recursive.txt", 2, 'mc', ' ', 4, '#'],
    ["dash-list-mixed-indented-recursive.txt", 2, 'mch', '-', 4, '#'],
    ["dash-list-mixed-indented-recursive-why-use-kvsep.txt", 2, 'mch', '-', 4, '#'],
    // multi line
    ["flat-list-multiline.txt", 2, 'mc', ' ', 4, '#'],
    ["dash-list-multiline.txt", 2, 'mch', '-', 4, '#'],
    ["flat-list-multiline-indented.txt", 2, 'mc', ' ', 4, '#'],
    ["dash-list-multiline-indented.txt", 2, 'mch', '-', 4, '#'],
    // comments
    ["flat-list-indented-comment.txt", 2, 'mc', ' ', 4, '#'],
    // change indentation length
    ["flat-list-indented-2spaces.txt", 2, 'mc', ' ', 2, '#'],
    
];

$b = [
    ['apple', 'banana', 'cherry', 'lemon'],
    ['apple', 'banana', 'cherry', 'lemon'],
    [0 => 'apple', 5 => 'banana', 'name' => 'cherry', 'yellow' => 'lemon'],
    [0 => 'apple', 1 => 'banana', 'name' => 'cherry', 'yellow' => 'lemon'],
    [0 => ['golden', 'regular'], 'cherry', 'lemon'],
    [0 => ['apple', 'banana'], 'name' => 'cherry', 'yellow' => 'lemon'],
    [0 => 'apple', 'banana', 'colors' => ['blue', 'favorite' => 'orange'], 'yellow' => 'lemon'],
    [0 => 'apple', 'banana', 'colors' => ['blue', 'favorite' => 'orange'], 'yellow' => 'lemon'],
    [0 => 'apple', 'banana', 'colors' => ['blue', 'favorites' => ['purple', 'sports' => ['karate', 'and' => 'judo'], 'green']], 'yellow' => 'lemon'],
    [0 => 'apple', 'banana', 'colors' => ['blue', 'favorites' => ['purple', 'sports' => ['karate', 'and' => 'judo'], 'green']], 'yellow' => 'lemon'],
    [0 => 'apple', 'banana', 'colors' => ['blue', ['purple', 'sports' => ['karate', 'and' => 'judo'], 'green']], 'yellow' => 'lemon'],
    // multi line
    ['a' => 'apple', 'b' => 'banana', 'c' => "This is a comment.\nAnd a second line.", 'l' => 'lemon'],
    ['a' => 'apple', 'b' => 'banana', 'c' => "This is a comment.\nAnd a second line.", 'l' => 'lemon'],
    ['a' => 'apple', 'b' => ['c' => "This is a comment.\nAnd a second line.", 'd' => 'dora'], 'l' => 'lemon'],
    ['a' => 'apple', 'b' => ['c' => "This is a comment.\nAnd a second line.", 'd' => 'dora'], 'l' => 'lemon'],
    // comments
    [0 => 'apple', 5 => ['banana'], 'name' => 'cherry', 'yellow' => 'lemon'],
    // change indentation length
    [0 => ['golden', 'regular'], 'cherry', 'lemon'],
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    $keyMode = 2;

    $useMultiLine = false;
    $useComment = false;
    $hasLeadingIndentChar = false;


    $indentChar = ' ';
    $nbIndentCharPerLevel = 4;
    $commentSymbol = '#';


    $baseName = $value[0];

    if (array_key_exists(1, $value)) {
        $keyMode = $value[1];
    }
    if (array_key_exists(2, $value)) {
        if (false !== strpos($value[2], 'm')) {
            $useMultiLine = true;
        }
        if (false !== strpos($value[2], 'c')) {
            $useComment = true;
        }
        if (false !== strpos($value[2], 'h')) {
            $hasLeadingIndentChar = true;
        }
    }
    if (array_key_exists(3, $value)) {
        $indentChar = $value[3];
    }
    if (array_key_exists(4, $value)) {
        $nbIndentCharPerLevel = $value[4];
    }
    if (array_key_exists(5, $value)) {
        $commentSymbol = $value[5];
    }


    $file = __DIR__ . "/resources/" . $baseName;
    if (file_exists($file)) {
        $builder = NodeTreeBuilder::create()
            ->setCommentSymbol($commentSymbol)
            ->setHasLeadingIndentChar($hasLeadingIndentChar)
            ->setIndentChar($indentChar)
            ->setKeyMode($keyMode)
            ->setNbIndentCharPerLevel($nbIndentCharPerLevel)
            ->setUseComment($useComment)
            ->setUseMultiLine($useMultiLine);

        $node = $builder->buildNode(file_get_contents($file));
        $res = NodeToArrayConvertor::create()->convert($node);

        if ($expected !== $res) {
            ComparisonErrorTableTool::collect($testNumber, $expected, $res);
        }
        return ($expected === $res);
    }
    else {
        throw new BeastNotApplicableException("file not found: $file");
    }
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();
