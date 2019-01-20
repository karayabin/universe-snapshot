<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Devil\Test\Beast\Util;

use BeeFramework\Bat\DebugTool;
use BeeFramework\Bat\HtmlTool;
use BeeFramework\Devil\Test\Beast\BeastEngine;
use BeeFramework\Devil\Test\Beast\Tools\BeastEngineTool;
use BeeFramework\Bat\BdotTool;


/**
 * BeastEngineRoutine
 * @author Lingtalfi
 * 2014-08-13
 *
 */
class BeastEngineRoutine
{

    /**
     * @var BeastEngine
     */
    private $beastEngine;
    private $options;
    public static $supervisorOptions = [];


    public static function create(BeastEngine $engine = null)
    {
        if (null === $engine) {
            $engine = new BeastEngine();
        }
        return new self($engine);
    }

    private function __construct(BeastEngine $engine)
    {
        $this->beastEngine = $engine;
        $this->options = [
            'testBuildUp' => null, // null|callback (v)
            'testCleanUp' => null, // null|callback ()
        ];
    }


    public function printPageResult(array $options = [])
    {
        $this->beastEngine->printPageResult($options);
        return $this;
    }

    /**
     * @return BeastEngineRoutine
     */
    public function setOption($k, $v)
    {
        $this->options[$k] = $v;
        return $this;
    }

    /**
     * @return BeastEngineRoutine
     */
    public function compare(array $v, array $b, $f, array $options = [])
    {
        $this->enterGroup();
        $options = array_replace([
            'number' => 'm[n]',
            'focus' => null,
            'method' => 'isEqualTo',
            'label' => '[v]',
            'debugTable' => 1,
            'bCallback' => [],
            // applicable?
            'applicable' => true, // option from beastEngine
            'notApplicableText' => true,
        ], $this->options, $options);

        $debugTable = $this->getSupervisorOption('debugTable', $options['debugTable']);
        $method = $options['method'];
        if (is_callable($options['bCallback'])) {
            $options['bCallback'] = [$options['bCallback']];
        }

        // slice the arrays according to the focus parameter
        $this->handleFocus($options['focus'], $v, $b);


        if (false === $options['applicable']) {
            $options['msg'] = $options['notApplicableText'];
        }


        if (is_callable($f)) {
            $callback = $f;
            if (count($v) === count($b)) {

                // prepare debugTable
                $rows = [];
                $this->initDebugTable($debugTable, $options, $rows);


                foreach ($v as $k => $vVal) {
                    if (array_key_exists($k, $b)) {


                        $this->doCallback($options['testBuildUp'], $vVal);
                        $bVal = $b[$k];
                        $this->beastEngine->executeMethodTest($method, $vVal, $bVal, $callback, $options);


                        $this->doCallback($options['testCleanUp']);

                    }
                    else {
                        throw new \InvalidArgumentException("arrays v and b must have same indexes");
                    }
                }
                $this->printDebugTable($rows, $debugTable);
            }
            else {
                throw new \InvalidArgumentException(sprintf("arrays v and b must be of same lengths (v: %s, b: %s)", count($v), count($b)));
            }
        }
        else {
            throw new \InvalidArgumentException("f must be a valid callable");
        }

        return $this;
    }


    /**
     * @return BeastEngineRoutine
     */
    public function checkExceptions(array $v, $f, array $options = [])
    {
        $this->enterGroup();
        $options = array_replace([
            'number' => 'e[n]',
            'successMsg' => 'Exception of type [type] has been thrown',
            'failureMsg' => 'Exception of type [type] hasn\'t been thrown',
            'textSuccessMsg' => 'Exception message contains text: [text]',
            'textFailureMsg' => 'Exception message does not contain text: [text]',
            'type' => null, // exception type to be thrown
            'like' => null, // text to be contained in the exception message (case insensitive)
            'focus' => null,
            'label' => '[v]',
        ], $this->options, $options);


        $origLabel = $options['label'];
        $this->handleFocus($options['focus'], $v);

        $sorted = false;
        if (is_callable($f)) {
            foreach ($v as $val) {

                $this->doCallback($options['testBuildUp'], $val);

                $thrown = false;
                $typeMatch = false;
                $numTest = $this->beastEngine->getCurrentTestNumber() + 1;

                /**
                 * Prepare exception checking by type
                 */
                $expectedType = '\Exception';
                $type = $options['type'];
                if (is_string($type)) {
                    $expectedType = $type;
                }
                elseif (is_array($type) && $type) {
                    if (false === $sorted) {
                        asort($type);
                        $sorted = true;
                    }
                    foreach ($type as $index => $exceptionType) {
                        if ($index > $numTest) {
                            break;
                        }
                        $expectedType = $exceptionType;
                    }
                }


                /**
                 * Prepare exception checking by message
                 */
                $textMatch = false;
                $expectedText = null;
                $like = $options['like'];
                if (is_string($like)) {
                    $expectedText = $like;
                }
                elseif (is_array($like) && $like) {
                    if (false === $sorted) {
                        asort($like);
                        $sorted = true;
                    }
                    foreach ($like as $index => $exceptionMsg) {
                        if ($index > $numTest) {
                            break;
                        }
                        $expectedText = $exceptionMsg;
                    }
                }


                try {
                    $f($val);
                } catch (\Exception $e) {
                    $thrown = true;
                    if ($e instanceof $expectedType) {
                        $typeMatch = true;
                    }
                    if (false !== stripos($e->getMessage(), $expectedText)) {
                        $textMatch = true;
                    }
                }

                $tags = BeastEngineTool::getTags([
                    'v' => $val,
                ]);
                $options['label'] = $origLabel;
                $options['label'] = BeastEngineTool::getLabel($options, $tags, [$v]);
                $this->beastEngine->isEqualTo($typeMatch, true, array_replace($options, [
                    'successMsg' => str_replace('[type]', $expectedType, $options['successMsg']),
                    'failureMsg' => str_replace('[type]', $expectedType, $options['failureMsg']),
                ]));

                if (null !== $expectedText) {
                    $this->beastEngine->isEqualTo($textMatch, true, array_replace($options, [
                        'successMsg' => str_replace('[text]', $expectedText, $options['textSuccessMsg']),
                        'failureMsg' => str_replace('[text]', $expectedText, $options['textFailureMsg']),
                    ]));
                }

                $this->doCallback($options['testCleanUp']);
            }
        }
        else {
            throw new \InvalidArgumentException("getValue must be a valid callable");
        }
        return $this;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function doCallback($callback)
    {
        if (is_callable($callback)) {
            $args = func_get_args();
            array_shift($args);
            call_user_func_array($callback, $args);
        }
    }

    private function printDebugTable(array $rows, $debugTable)
    {
        if (false !== $debugTable) {
            // only show the row for the first failure or exception
            if (1 === $debugTable) {
                $tn = [];
                foreach ($this->beastEngine->getResults() as $r) {
                    if ('f' === $r[0] || 'e' === $r[0]) {
                        $tn[] = $r[1];
                    }
                }
                $rows = array_filter($rows, function ($row) use ($tn) {
                    if (in_array($row[0], $tn, 1)) {
                        return true;
                    }
                    return false;
                });
                if (1 === $debugTable && $rows) {
                    reset($rows);
                    $rows = [current($rows)];
                }
            }
            if ($rows) {
                BeastEngineTool::displayDebugTable($rows, [
                    'headers' => ['#', 'value', 'result', 'expected'],
                    'noTransform' => [0],
                ]);
            }
        }
    }

    private function initDebugTable($debugTable, array &$options, array &$rows)
    {
        if (false !== $debugTable) {
            if (!array_key_exists('onExceptionThrown', $options) || !is_array($options['onExceptionThrown'])) {
                $options['onExceptionThrown'] = [];
            }
            $options['onExceptionThrown'][] = function ($v, $b, $nt) use (&$rows) {
                $rows[] = [
                    $nt,
                    $v,
                    null,
                    $b,
                ];
            };
            if (!array_key_exists('onAValueReady', $options) || !is_array($options['onAValueReady'])) {
                $options['onAValueReady'] = [];
            }
            $options['onAValueReady'][] = function ($v, $b, $a, $nt) use (&$rows) {
                $rows[] = [
                    $nt,
                    $v,
                    $a,
                    $b,
                ];
            };
        }
    }

    private function enterGroup()
    {
        $this->beastEngine->setCurrentTestNumber(0);
    }

    private function handleFocus($range, array &$x, array &$y = null)
    {
        if (is_string($range) || is_int($range)) {
            $range = (string)$range;
            if (false === strpos($range, '-')) {
                $min = (int)$range - 1;
                if (array_key_exists($min, $x)) {
                    $x = array_slice($x, $min, 1, true);
                    if (null !== $y) {
                        $y = array_slice($y, $min, 1, true);
                    }
                }
            }
            else {
                $p = explode('-', $range, 2);
                $min = (int)$p[0] - 1;
                if ($min < 0) {
                    $min = 0;
                }
                $max = count($x);
                if (array_key_exists(1, $p)) {
                    if (!empty($p[1])) {
                        $max = $p[1];
                    }
                }
//                $max = (int)$max - 1;
                if ($max < $min) {
                    $max = $min;
                }
                $length = $max - $min;
                if ($length < 1) {
                    $length = 1;
                }
                $x = array_slice($x, $min, $length, true);
                if (null !== $y) {
                    $y = array_slice($y, $min, $length, true);
                }
            }
            $this->beastEngine->setCurrentTestNumber($min);
        }
    }


    private function getSupervisorOption($k, $default = null)
    {
        return BdotTool::getDotValue('beastEngine.options.' . $k, self::$supervisorOptions, $default);
    }

}
