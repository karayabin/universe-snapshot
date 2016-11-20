<?php

namespace PhpBeast;

/*
 * LingTalfi 2015-10-26
 */
use PhpBeast\Exception\BeastNotApplicableException;
use PhpBeast\Exception\BeastSkipException;

class TestInterpreter implements TestInterpreterInterface
{


    public function __construct()
    {

    }


    public static function create()
    {
        return new static();
    }


    /**
     * Executes all the tests bound to the given aggregator,
     * and displays the corresponding "special strings".
     *
     */
    public function execute(TestAggregatorInterface $a)
    {
        $results = [
            'success' => 0,
            'failure' => 0,
            'error' => 0,
            'skip' => 0,
            'notApplicable' => 0,
        ];
        $tryLater = 0;

        $testNumber = 1;
        foreach ($a->getTests() as $test) {
            $msg = null;
            $type = null;
            try {
                $ret = call_user_func_array($test, [&$msg, $testNumber]);
                if (true === $ret) {
                    $results['success']++;
                    $type = 's';
                }
                elseif (false === $ret) {
                    $results['failure']++;
                    $type = 'f';
                }
                else {
                    throw new \Exception("Unknown test result of type " . gettype($ret));
                }

            } catch (\Exception $e) {
                if ($e instanceof BeastSkipException) {
                    $msg = (string)$e;
                    $results['skip']++;
                    $type = 's';
                }
                elseif ($e instanceof BeastNotApplicableException) {
                    $msg = (string)$e;
                    $results['notApplicable']++;
                    $type = 'na';
                }
                // I don't know a case where php uses try later feature for now...
//                elseif ($e instanceof BeastTryLaterException) {
//                    $tryLater = 1;
//                    $type = 'p'; // pending
//                }
                else {
                    $msg = (string)$e;
                    $results['error']++;
                    $type = 'e';
                }
            }


            // do something with msg
            $this->onTestAfter($type, $msg, $testNumber);
            
            $testNumber++;
        }

        $this->printResults($results);

    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onTestAfter($testType, $msg, $testNumber)
    {

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function printResults(array $results)
    {
        echo sprintf('_BEAST_TEST_RESULTS:s=%d;f=%d;e=%d;na=%d;sk=%d__',
            $results['success'],
            $results['failure'],
            $results['error'],
            $results['notApplicable'],
            $results['skip']
        );
    }
}
