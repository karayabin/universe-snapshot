<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use YouTubeUtils\YouTubeTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    "https://www.youtube.com/watch?v=nCwRJUg3tcQ&list=PLv5BUbwWA5RYaM6E-QiE8WxoKwyBnozV2&index=4",
    "http://www.youtube.com/watch?v=nCwRJUg3tcQ&feature=relate",
    'http://youtube.com/v/nCwRJUg3tcQ?feature=youtube_gdata_player',
    'http://youtube.com/vi/nCwRJUg3tcQ?feature=youtube_gdata_player',
    'http://youtube.com/?v=nCwRJUg3tcQ&feature=youtube_gdata_player',
    'http://www.youtube.com/watch?v=nCwRJUg3tcQ&feature=youtube_gdata_player',
    'http://youtube.com/?vi=nCwRJUg3tcQ&feature=youtube_gdata_player',
    'http://youtube.com/watch?v=nCwRJUg3tcQ&feature=youtube_gdata_player',
    'http://youtube.com/watch?vi=nCwRJUg3tcQ&feature=youtube_gdata_player',
    'http://youtu.be/nCwRJUg3tcQ?feature=youtube_gdata_player',
    "https://youtube.com/v/nCwRJUg3tcQ",
    "https://youtube.com/vi/nCwRJUg3tcQ",
    "https://youtube.com/?v=nCwRJUg3tcQ",
    "https://youtube.com/?vi=nCwRJUg3tcQ",
    "https://youtube.com/watch?v=nCwRJUg3tcQ",
    "https://youtube.com/watch?vi=nCwRJUg3tcQ",
    "https://youtu.be/nCwRJUg3tcQ",
    "http://youtu.be/nCwRJUg3tcQ?t=30m26s",
    "https://youtube.com/v/nCwRJUg3tcQ",
    "https://youtube.com/vi/nCwRJUg3tcQ",
    "https://youtube.com/?v=nCwRJUg3tcQ",
    "https://youtube.com/?vi=nCwRJUg3tcQ",
    "https://youtube.com/watch?v=nCwRJUg3tcQ",
    "https://youtube.com/watch?vi=nCwRJUg3tcQ",
    "https://youtu.be/nCwRJUg3tcQ",
    "https://youtube.com/embed/nCwRJUg3tcQ",
    "http://youtube.com/v/nCwRJUg3tcQ",
    "http://www.youtube.com/v/nCwRJUg3tcQ",
    "https://www.youtube.com/v/nCwRJUg3tcQ",
    "https://youtube.com/watch?v=nCwRJUg3tcQ&wtv=wtv",
    "http://www.youtube.com/watch?dev=inprogress&v=nCwRJUg3tcQ&feature=related",
    // not youtube
    "http://www.zoutube.com/watch?dev=inprogress&v=nCwRJUg3tcQ&feature=related",
    "http://www.you.tube.com/watch?dev=inprogress&v=nCwRJUg3tcQ&feature=related",
];

$b = [
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    'nCwRJUg3tcQ',
    // not youtube
    false,
    false,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    $res = YouTubeTool::getId($value);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();