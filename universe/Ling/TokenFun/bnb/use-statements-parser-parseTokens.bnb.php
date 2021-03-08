<?php


use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\PhpBeast\TestAggregator;
use Ling\PhpBeast\Tool\BnbMessageTool;
use Ling\TokenFun\Parser\UseStatementsParser;


require_once __DIR__ . "/../../../bigbang.php";


$agg = TestAggregator::create();


$expected = [
    [
        [
            'CC',
            'AZ',
            'class',
        ],
    ],
    [
        [
            'Ling\\Light_UserDatabase\\Light_PluginInstaller\\LightUserDatabasePluginInstaller',
            NULL,
            'class',
        ],
    ],
    [
        [
            'Ling\\BabyYaml\\BabyYamlUtil',
            NULL,
            'class',
        ],
    ],
    [
        [
            'Ling\\UniverseTools\\PlanetTool',
            'P',
            'class',
        ],
        [
            'Ling\\UniverseTools\\LocalUniverseTool',
            NULL,
            'class',
        ],
        [
            'Ling\\UniverseTools\\Exception\\UniverseToolsException',
            NULL,
            'class',
        ],
    ],
    [
        [
            'Ling\\UniverseTools\\PlanetTool',
            'P2',
            'class',
        ],
        [
            'Ling\\BeeFramework\\Component\\FileSystem\\UniqueBaseName',
            NULL,
            'class',
        ],
    ],
    [
        [
            'Ling\\UniverseTools\\PlanetTool',
            'P3',
            'class',
        ],
        [
            'Ling\\UniverseTools\\LocalUniverseTool',
            'P4',
            'class',
        ],
    ],
    [
        [
            'some\\namespace\\fn_a',
            NULL,
            'function',
        ],
    ],
    [
        [
            'some\\namespace\\fn_a',
            'Planned',
            'function',
        ],
    ],
    [
        [
            'some\\namespace\\fn_b',
            NULL,
            'function',
        ],
        [
            'some\\namespace\\fn_c',
            NULL,
            'function',
        ],
    ],
    [
        [
            'some\\namespace\\Ab',
            'MMO',
            'const',
        ],
    ],
    [
        [
            'some\\namespace\\TeeParty',
            NULL,
            'class',
        ],
        [
            'some\\namespace\\fn_d',
            NULL,
            'function',
        ],
        [
            'some\\namespace\\EDM',
            NULL,
            'const',
        ],
    ],
    [
        [
            'Ling\\BabyYaml\\BabyYamlUtil',
            'EEO',
            'class',
        ],
    ],
];


//--------------------------------------------
//
//--------------------------------------------
try {

    $o = new UseStatementsParser();

    $nbTests = count($expected);

    for ($i = 1; $i <= $nbTests; $i++) {
        $file = __DIR__ . "/../assets/bnb-fixtures/t$i.php";
        if (false === file_exists($file)) {
            throw new \RuntimeException("File not found: $file. Test aborted.");
        }
        $tokens = token_get_all(file_get_contents($file));

        $result = $o->parseTokens($tokens);
        $expectedItem = array_shift($expected);


        $agg->addTest(function (&$msg, $testNumber) use ($result, $expectedItem) {
            return ($result === $expectedItem);
        });
    }


    PrettyTestInterpreter::create()->execute($agg);


} catch (\Exception $e) {
    echo '<br>';
    echo $e->getMessage();
    echo '<br>';
    BnbMessageTool::printErrorResultString();
}
