<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\PhpArray\ArrayWithSelfReferences;

use BeeFramework\Bat\BdotTool;
use BeeFramework\Notation\PhpArray\ArrayWithSelfReferences\Exception\ArrayWithSelfReferencesCircularException;


/**
 * ArrayWithSelfReferences
 * @author Lingtalfi
 * @pattern [arrayWithSelfReferences™]
 * 2014-08-16
 *
 */
class ArrayWithSelfReferences
{

    private $circular;
    private $symbol;
    private $symbolLength;
    private $errors;


    public function __construct(array $options = [])
    {
        $options = array_replace([
            'symbol' => '§',
        ], $options);

        $this->symbol = $options['symbol'];
        $this->symbolLength = strlen($this->symbol);
    }

    public static function create(array $options = [])
    {
        return new self($options);
    }

    private function reset()
    {
        $this->errors = [];
        $this->circular = [];
    }


    public function apply(array $resolvedReferences, array &$array, $strict = true)
    {
        $this->reset();
        BdotTool::walk($array, function (&$v, $k, $p) use ($resolvedReferences) {
            $v = $this->getResolvedValue($v, $resolvedReferences, true);
        });
        if (true === $strict && $this->errors) {
            throw new \RuntimeException(sprintf("Some errors have been found: %s", implode(PHP_EOL, $this->errors)));
        }
    }

    public function resolve(array $array, $strict = true)
    {
        $this->reset();
        try {
            array_walk_recursive($array, function (&$value, $key) use ($array) {
                $value = $this->getResolvedValue($value, $array, true);
            });
        } catch (ArrayWithSelfReferencesCircularException $e) {
            $array = false;
            $this->error(vsprintf("Circular reference detected with value '%s'", $e->getValue()));
        }
        if (true === $strict && $this->errors) {
            throw new \RuntimeException(sprintf("Some errors have been found: %s", implode(PHP_EOL, $this->errors)));
        }
        return $array;
    }

    public function getErrors()
    {
        return $this->errors;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getResolvedValue($value, array $array, $rootCall = false)
    {
        if (true === $rootCall) {
            $rootCall = false;
            $this->circular = [];
        }

        // with refs, we can use bdot setValue
        $type = $this->getValueType($value);
        if ('ref' === $type) {
            // escaping a type=ref value
            $refKey = $this->dereference($value);
            $found = false;
            $newVal = BdotTool::getDotValue($refKey, $array, null, $found);
            if (true === $found) {
                // storing a circular reference path if any
                $this->checkCircularReferencePath($value);
                return $this->getResolvedValue($newVal, $array, $rootCall);
            }
            else {
                $this->error(sprintf("Reference not found with key: %s", $refKey));
            }
        }
        // with inlines, we will use preg_replace (only works with non array values)
        elseif ('inline' === $type) {
            $s = preg_quote($this->symbol, '/');
            $index = -1;
            $value = preg_replace_callback(
                '/(?<!\\\)' . $s . '(.*?)(?<!\\\)' . $s . '/',
                function ($m) use ($array, $value, $rootCall, &$index) {
                    $index++;
                    $refKey = $this->dereference($m[0]);
                    $found = false;
                    $newVal = BdotTool::getDotValue($refKey, $array, null, $found);
                    if (true === $found) {
                        // storing a circular reference path if any
                        $this->checkCircularReferencePath($value, $index);

                        if (!is_array($newVal)) {
                            return $this->getResolvedValue($newVal, $array, $rootCall);
                        }
                        else {
                            $this->error(sprintf("Cannot insert an array in an inline reference (key: %s)", $refKey));
                        }
                    }
                    else {
                        $this->error(sprintf("Reference not found with key: %s", $refKey));
                    }

                    return $m[0];
                }, $value);
            $value = str_replace('\\' . $this->symbol, $this->symbol, $value);
        }
        return $value;
    }

    private function checkCircularReferencePath($value, $index = 0)
    {
        if (is_string($value)) {
            if (
                in_array($value, $this->circular, true) &&
                0 === $index
            ) {
                throw new ArrayWithSelfReferencesCircularException($value);
            }
            else {
                $this->circular[] = $value;
            }
        }
        else {
            throw new \InvalidArgumentException("value must be a string");
        }
    }


    private function dereference($value)
    {
        return str_replace('\\' . $this->symbol, $this->symbol, substr($value, $this->symbolLength, -$this->symbolLength));
    }

    private function getValueType($value)
    {
        if (is_string($value)) {


            $nbSymbols = substr_count($value, $this->symbol);
            $nbEscapedSymbols = substr_count($value, '\\' . $this->symbol);
            $nbNotEscaped = $nbSymbols - $nbEscapedSymbols;
            if ($nbNotEscaped > 1) {
                if (
                    $this->symbol === substr($value, 0, $this->symbolLength) &&
                    $this->symbol === substr($value, -$this->symbolLength)
                ) {
                    $inner = substr($value, $this->symbolLength, -$this->symbolLength);
                    if (
                        substr_count($inner, '\\' . $this->symbol) >= substr_count($inner, $this->symbol)
                    ) {
                        return 'ref';
                    }
                }
                return 'inline';
            }
        }
        return null;
    }


    private function error($msg)
    {
        $this->errors[] = $msg;
    }
}
