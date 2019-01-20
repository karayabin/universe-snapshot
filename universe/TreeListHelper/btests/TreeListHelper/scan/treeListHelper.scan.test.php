<?php

use Bat\CaseTool;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use TreeListHelper\TreeListHelper;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();


$a = [
    [],
    ['nameHumanize' => false],
    ['ignoreLinks' => false],
    ['ignoreLinks' => false, "showBrokenLinks" => true],
    ["skipHidden" => false],
    ["allowedExtensions" => ['txt']],
    ["pruneEmptyDir" => false],
    ["dirFilter" => function ($basename) {
        return ('dir1' !== $basename);
    }],
    ["fileFilter" => function ($basename) {
        return ('file1-6.txt' !== $basename);
    }],
    ["transform" => function ($name) {
        return 'my-' . $name;
    }],
    ["decorate" => function (array &$item) {
        $item['open'] = true;
    }],
];


$b = [
    // []
    [
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ]
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ]
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ]
    ],
    // ['nameHumanize' => false],
    [
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6.txt',
                            'path' => 'file1-6.txt',
                        ]
                    ],
                ],
                [
                    'name' => 'file1-4.txt',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5.txt',
                    'path' => 'file1-5.txt',
                ]
            ],
        ],
        [
            'name' => 'file1.txt',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2.TXT',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3.md',
            'path' => 'file3.md',
        ]
    ],
    // ['ignoreLinks' => false],
    [
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ],
        [
            'name' => 'link_to_dir1',
            'path' => 'link_to_dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'link_to_file3',
            'path' => 'link_to_file3',
        ],
    ],
    // ['ignoreLinks' => false, 'showBrokenLinks' => true],
    [
        [
            'name' => 'broken_link',
            'path' => 'broken_link',
        ],
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ],
        [
            'name' => 'link_to_dir1',
            'path' => 'link_to_dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'link_to_file3',
            'path' => 'link_to_file3',
        ],
    ],
//    ["skipHidden" => false],
    [
        [
            'name' => '.kernel',
            'path' => '.kernel',
        ],
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => '.hidden_dir',
                    'path' => '.hidden_dir',
                    'children' => [
                        [
                            'name' => 'file7',
                            'path' => 'file7.txt',
                        ],
                    ],
                ],
                [
                    'name' => '.htdude',
                    'path' => '.htdude',
                ],
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ],
    ],
//    ["allowedExtensions" => ['txt']],
    [
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
    ],
//    ["pruneEmptyDir" => false],
    [
        [
            'name' => 'dir-dead',
            'path' => 'dir-dead',
            'children' => [
                [
                    'name' => 'dir-dead2',
                    'path' => 'dir-dead2',
                    'children' => [
                        [
                            'name' => 'dir-dead4',
                            'path' => 'dir-dead4',
                            'children' => [
                            ],
                        ],
                    ],
                ],
                [
                    'name' => 'dir-dead3',
                    'path' => 'dir-dead3',
                    'children' => [
                    ],
                ],
            ],
        ],
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ],
    ],
//    ["dirFilter" => function ($basename) {
//        return ('dir1' !== $basename);
//    }],
    [
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ],
    ],
//    ["fileFilter" => function ($basename) {
//        return ('file1-6.txt' !== $basename);
//    }],
    [
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
        ],
    ],
//    ["transform" => function ($name) {
//        return 'my-' . $name;
//    }],
    [
        [
            'name' => 'my-dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'my-dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'my-file1-6',
                            'path' => 'file1-6.txt',
                        ],
                    ],
                ],
                [
                    'name' => 'my-file1-4',
                    'path' => 'file1-4.txt',
                ],
                [
                    'name' => 'my-file1-5',
                    'path' => 'file1-5.txt',
                ],
            ],
        ],
        [
            'name' => 'my-file1',
            'path' => 'file1.txt',
        ],
        [
            'name' => 'my-file2',
            'path' => 'file2.TXT',
        ],
        [
            'name' => 'my-file3',
            'path' => 'file3.md',
        ],
    ],
//    ["decorate" => function (array &$item) {
//        $item['open'] = true;
//    }],
    [
        [
            'name' => 'dir1',
            'path' => 'dir1',
            'children' => [
                [
                    'name' => 'dir2',
                    'path' => 'dir2',
                    'children' => [
                        [
                            'name' => 'file1-6',
                            'path' => 'file1-6.txt',
                            'open' => true,
                        ],
                    ],
                    'open' => true,
                ],
                [
                    'name' => 'file1-4',
                    'path' => 'file1-4.txt',
                    'open' => true,
                ],
                [
                    'name' => 'file1-5',
                    'path' => 'file1-5.txt',
                    'open' => true,
                ],
            ],
            'open' => true,
        ],
        [
            'name' => 'file1',
            'path' => 'file1.txt',
            'open' => true,
        ],
        [
            'name' => 'file2',
            'path' => 'file2.TXT',
            'open' => true,
        ],
        [
            'name' => 'file3',
            'path' => 'file3.md',
            'open' => true,
        ],
    ]
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    $dir = __DIR__ . "/fixture-dir";
    $options = $value;


    $files = TreeListHelper::scan($dir, $options);
    if ($expected != $files) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $files);
    }
    return ($expected == $files);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();