<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Devil\Test\Beast;

use BeeFramework\Bat\DebugTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Devil\Test\Beast\Tools\BeastEngineTool;
use BeeFramework\Bat\BdotTool;


/**
 * TestEngine
 * @author Lingtalfi
 * 2014-08-13
 *
 * All tests logic is: the first value is ours, the second is the one expected.
 * isEqual: ===
 * isSimilar: ==
 *
 */
class BeastEngine
{


    private $results;
    private $currentTestNumber;
    private $options;


    private $firstFailureIsDumped;

    public static $supervisorOptions = [];


    function __construct(array $options = [])
    {
        $this->options = array_replace([
            'dumpFailure' => null,
            'dumpException' => null,
            'dumpFailures' => null,
        ], $options);
        $this->results = [];
        $this->currentTestNumber = 0;
        $this->firstFailureIsDumped = false;
    }

    public static function create(array $options = [])
    {
        return new self($options);
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getCurrentTestNumber()
    {
        return $this->currentTestNumber;
    }

    public function setCurrentTestNumber($number)
    {
        return $this->currentTestNumber = $number;
    }

    public function arrayContainsValuesOf(array $a, array $b, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] CONTAINS ALL THE VALUES OF [b]",
            "[a] DOES NOT CONTAIN ALL THE VALUES OF [b]"
        );

        $a2 = $a;
        $isTrue = true;
        foreach ($b as $v) {
            if (false !== $k = array_search($v, $a2, true)) {
                unset($a2[$k]);
            }
            else {
                $isTrue = false;
            }
        }
        return $this->registerTestResult($isTrue, $a, $b, $sMsg, $fMsg, $options);
    }

    public function arrayHasSameValuesAs(array $a, array $b, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] HAS EXACTLY THE SAME VALUES AS [b]",
            "[a] HAS NOT EXACTLY THE SAME VALUES AS [b]"
        );

        $isTrue = false;
        $b2 = $b;
        if (count($a) === count($b2)) {
            $isTrue = true;
            foreach ($a as $v) {
                if (false !== $k = array_search($v, $b2, true)) {
                    unset($b2[$k]);
                }
                else {
                    $isTrue = false;
                }
            }
        }
        return $this->registerTestResult($isTrue, $a, $b, $sMsg, $fMsg, $options);
    }

    public function isEqualTo($a, $b, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] IS EQUAL TO [b]",
            "[a] IS NOT EQUAL TO [b]"
        );
        return $this->registerTestResult(($a === $b), $a, $b, $sMsg, $fMsg, $options);
    }

    public function isEquivalentTo($a, $b, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] IS EQUIVALENT TO [b]",
            "[a] IS NOT EQUIVALENT TO [b]"
        );
        return $this->registerTestResult(($a == $b), $a, $b, $sMsg, $fMsg, $options);
    }


    public function isNotEqualTo($a, $b, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] IS NOT EQUAL TO [b]",
            "[a] IS EQUAL TO [b]"
        );
        return $this->registerTestResult(($a !== $b), $a, $b, $sMsg, $fMsg, $options);
    }

    /**
     * Checks that a file or a dir, or a symlink does not exist
     */
    public function fileNotExists($a, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] DOES NOT EXIST",
            "[a] EXISTS"
        );

        $exists = (file_exists($a) || is_link($a));
        $b = $a;
        return $this->registerTestResult(!$exists, $a, $b, $sMsg, $fMsg, $options);
    }


    /**
     * Checks that a file or a dir, or a symlink exists
     */
    public function fileExists($a, array $options = [])
    {
        list($sMsg, $fMsg) = $this->getTestMethodDefaultMessages(
            __METHOD__,
            "[a] EXISTS",
            "[a] DOES NOT EXIST"
        );

        $exists = (file_exists($a) || is_link($a));
        $b = $a;
        return $this->registerTestResult($exists, $a, $b, $sMsg, $fMsg, $options);
    }


    public function printPageResult(array $options = [])
    {
        $options = array_replace([
            'printResultsTable' => true,
            'notApplicable' => false, // set a non applicable flag at the page level
            'retryFlag' => false,
            'tableOptions' => [],
        ], $options);

        if (true === $options['retryFlag']) {
            echo '<div>';
            echo '_BEAST_TEST_NOT_FINISHED_RETRY_LATER__';
            echo '</div>';
        }

        if (is_string($options['notApplicable'])) {
            $msg =  $options['notApplicable'];
            array_walk($this->results, function (&$v) use ($msg) {
                $v[0] = 'na';
                $v[3] = $msg;
            });
        }
        if (false === $options['printResultsTable']) {
            echo BeastEngineTool::getBeastTestResultsString($this->results);
        }
        else {
            BeastEngineTool::displayResultsTable($this->results, $options['tableOptions']);
        }
    }

    public function executeMethodTest($method, $v, $b, $f, array $options = [])
    {

        $this->currentTestNumber++;
        $number = $this->getNumberText($options);
        if (is_string($method)) {
            if (is_callable([$this, $method])) {
                if (is_callable($f)) {

                    $options = array_replace([
                        'dumpException' => $this->getOptionValue('dumpException', false),
                        'onExceptionThrown' => [],
                        'onAValueReady' => [],
                        'bCallback' => [],
                    ], $options);


                    $tags = BeastEngineTool::getTags([
                        'v' => $v,
                        'b' => $b,
                    ]);
                    $label = BeastEngineTool::getLabel($options, $tags, [$v, $b]);


                    $thrown = false;
                    try {
                        $a = $f($v);
                    } catch (\Exception $e) {
                        $thrown = true;

                        if (is_array($options['onExceptionThrown'])) {
                            foreach ($options['onExceptionThrown'] as $c) {
                                if (is_callable($c)) {
                                    call_user_func_array($c, [$v, $b, $number]);
                                }
                            }
                        }


                        $this->addResult('e', $number, $label, $e->getMessage());
                        if (true === $options['dumpException']) {
                            VarTool::dump($e);
                        }
                    }
                    if (false === $thrown) {
                        $options['_skipIncrement'] = true;
                        $options['label'] = $label;


                        foreach ($options['bCallback'] as $c) {
                            if (is_callable($c)) {
                                $b = $c($b);
                            }
                        }

                        if (is_array($options['onAValueReady'])) {
                            foreach ($options['onAValueReady'] as $c) {
                                if (is_callable($c)) {
                                    call_user_func_array($c, [$v, $b, $a, $number]);
                                }
                            }
                        }


                        return call_user_func([$this, $method], $a, $b, $options);
                    }
                }
                else {
                    throw new \InvalidArgumentException("getValue must be a valid callable");
                }
            }
            else {
                throw new \InvalidArgumentException(sprintf("unrecognized method %s", $method));
            }
        }
        else {
            throw new \InvalidArgumentException("Invalid method name: it must be a string");
        }
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/


    private function getNumberText(array $options)
    {
        $number = $this->currentTestNumber;
        if (array_key_exists('number', $options)) {
            $number = $options['number'];
            if (is_string($number)) {
                $number = str_replace('[n]', $this->currentTestNumber, $number);
            }
            elseif (is_callable($number)) {
                $number = call_user_func($number, $this->currentTestNumber);
            }
            else {
                throw new \UnexpectedValueException("number must be either a string or a callable");
            }
        }
        return $number;
    }


    private function registerTestResult($isTrue, $a, $b, $sMsg, $fMsg, $options)
    {
        $options = array_replace([
            'number' => '[n]',
            'label' => null,
            'skip' => false,
            'msg' => null,
            'applicable' => true,
            'dumpFailures' => $this->getOptionValue('dumpFailures', false),
            'dumpFailure' => $this->getOptionValue('dumpFailure', false),
            'successMsg' => null,
            'failureMsg' => null,
            '_skipIncrement' => false,
        ], $options);


        if (false === $options['_skipIncrement']) {
            $this->currentTestNumber++;
        }


        // build tags
        $tags = BeastEngineTool::getTags([
            'a' => $a,
            'b' => $b,
        ]);

        // test number
        $number = $this->getNumberText($options);


        // label
        $label = BeastEngineTool::getLabel($options, $tags, [$a, $b, $isTrue]);


        // do we skip the test ?
        if (true === $options['skip']) {
            if (is_string($options['msg'])) {
                $msg = $options['msg'];
            }
            else {
                $msg = "Test skipped by the user";
            }
            $this->addResult('sk', $number, $label, $msg);
        }
        // is the test applicable ?
        elseif (false === $options['applicable']) {
            if (is_string($options['msg'])) {
                $msg = $options['msg'];
            }
            else {
                $msg = "Test not applicable in this context";
            }
            $this->addResult('na', $number, $label, $msg);
        }
        else {

            // success ?
            if (true === $isTrue) {
                if (is_string($options['successMsg'])) {
                    $sMsg = $options['successMsg'];
                }

                $this->addResult('s', $number, $label, BeastEngineTool::replaceTags($sMsg, $tags));
            }
            // failure ?
            else {
                if (is_string($options['failureMsg'])) {
                    $fMsg = $options['failureMsg'];
                }
                $this->addResult('f', $number, $label, BeastEngineTool::replaceTags($fMsg, $tags));
                if (true === $options['dumpFailures']) {
                    VarTool::dump('#' . $number, $a, $b);
                    echo '<hr />';
                }
                if (
                    false === $this->firstFailureIsDumped &&
                    (
                        true === $options['dumpFailure']
                        ||
                        is_callable($options['dumpFailure'])
                    )
                ) {
                    $this->firstFailureIsDumped = true;
                    if (true === $options['dumpFailure']) {
                        VarTool::dump('#' . $number, $a, $b);
                        echo '<hr />';
                    }
                    else {
                        call_user_func($options['dumpFailure'], $number, $a, $b);
                    }
                }
            }
        }
        return $isTrue;
    }

    private function addResult($type, $number, $label, $msg)
    {
        $this->results[] = [
            $type,
            $number,
            $label,
            $msg,
        ];
    }

    private function getTestMethodDefaultMessages($methodName, $sMsg, $fMsg)
    {
        $p = explode(':', $methodName);
        $methodName = array_pop($p);
        $ret = [];
        if (null !== $s = BdotTool::getDotValue('beastEngine.testsMessages.' . $methodName . '.s', self::$supervisorOptions)) {
            $ret[] = $s;
        }
        else {
            $ret[] = $sMsg;
        }
        if (null !== $f = BdotTool::getDotValue('beastEngine.testsMessages.' . $methodName . '.f', self::$supervisorOptions)) {
            $ret[] = $f;
        }
        else {
            $ret[] = $fMsg;
        }
        return $ret;
    }


    private function getOptionValue($name, $default = null)
    {
        return BdotTool::getDotValue('beastEngine.options.' . $name, self::$supervisorOptions, (array_key_exists($name,
                    $this->options) && null !== $this->options[$name]) ? $this->options[$name] : $default);
    }

}
