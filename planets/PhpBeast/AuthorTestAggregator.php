<?php

namespace PhpBeast;

/*
 * LingTalfi 2015-11-02
 */

class AuthorTestAggregator extends TestAggregator
{


    /**
     *
     * Add multiple tests checking that an exception is thrown.
     * If the exception is not thrown during the execution of a test, the test fails (returns false).
     * If an exception is thrown during the execution of a test, but the exception doesn't match the expection spec,
     * then it is rethrown, provoking a test error (see beauty'n'beast pattern: https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).
     *
     *
     *
     *
     * - a: values to be tested (it's recommended that you don't define the keys, see why below)
     *
     * - bool   callable f ( mixed:value, &str:msg=null, int:testNumber )
     *                  See addTest method for more details.
     *
     * - exceptionSpec: array of key => value
     *
     *      With:
     *          - key: range representing a range of indexes of array a.
     *                  You can use either notation:
     *                  - <number>
     *                  - <number> <-> <number>
     *              For instance:
     *                  0: targets the first entry of array a
     *                  1: targets the second entry of array a
     *                  1-4: targets the entries of array a from index 1 to index 4
     *          - value: exception criterion, you can use either notation:
     *                  - string: the exception short name, for instance: MyCustomException
     *                  - array: a set of properties that the exception has to match,
     *                              the available properties are:
     *                      - msg, the message of the exception
     *                      - msgSub, a string contained in the message of the exception
     *                      - line, the line of the exception
     *                      - code, the code of the exception
     *                      - file, the file of the exception
     *                      - name, the exception's full name, for instance My\Tool\ToolException (custom exception), or Exception (for php's \Exception)
     *
     *                      If the array is empty, the exception doesn't match.
     *
     *
     *
     */
    public function addExceptionTests(array $a, callable $f, array $exceptionSpec)
    {

        foreach ($a as $index => $value) {
            $this->addTest(function (&$msg, $testNumber) use ($value, $f, $index, $exceptionSpec) {
                $exceptionThrown = false;
                try {
                    call_user_func_array($f, [$value, &$msg, $testNumber]);

                } catch (\Exception $e) {

                    $spec = null;
                    if (array_key_exists($index, $exceptionSpec)) {
                        $spec = $exceptionSpec[$index];
                    }
                    else {
                        foreach ($exceptionSpec as $key => $thespec) {
                            if (!is_numeric($key)) {
                                $p = explode('-', $key);
                                if (
                                    $index >= (int)$p[0] &&
                                    $index <= (int)$p[1]
                                ) {
                                    $spec = $thespec;
                                    break;
                                }
                            }
                        }
                    }

                    if (null !== $spec) {
                        if (is_string($spec)) {
                            $p = explode('\\', get_class($e));
                            $shortName = array_pop($p);
                            if ($spec === $shortName) {
                                $exceptionThrown = true;
                            }
                        }
                        elseif (is_array($spec)) {
                            foreach ($spec as $key => $value) {
                                switch ($key) {
                                    case 'msg':
                                        if ($value === $e->getMessage()) {
                                            $exceptionThrown = true;
                                            break 2;
                                        }
                                        break;
                                    case 'msgSub':
                                        if (false !== strpos($e->getMessage(), $value)) {
                                            $exceptionThrown = true;
                                            break 2;
                                        }
                                        break;
                                    case 'line':
                                        if ((int)$value === (int)$e->getLine()) {
                                            $exceptionThrown = true;
                                            break 2;
                                        }
                                        break;
                                    case 'code':
                                        if ((int)$value === (int)$e->getCode()) {
                                            $exceptionThrown = true;
                                            break 2;
                                        }
                                        break;
                                    case 'file':
                                        if ($value === $e->getFile()) {
                                            $exceptionThrown = true;
                                            break 2;
                                        }
                                        break;
                                    case 'name':
                                        if ($value === get_class($e)) {
                                            $exceptionThrown = true;
                                            break 2;
                                        }
                                        break;
                                    default:
                                        throw new \Exception("Invalid exception spec key $key, check the documentation");
                                        break;
                                }
                            }
                        }
                        else {
                            throw new \Exception(sprintf("Invalid exception spec, array or string was expected, %s given", gettype($spec)));
                        }
                    }


                    if (false === $exceptionThrown) {
                        throw $e;
                    }
                }
                return $exceptionThrown;
            });
        }
    }

    /**
     *
     * a: array of values to test
     * b: array of expected values
     *
     * a and b must have same length.
     *
     *
     * bool     f ( mixed:value, mixed:expected, &str:msg=null, int:testNumber )
     *
     * See addTest method for more details.
     *
     */
    public function addTestsByColumn(array $a, array $b, callable $f)
    {
        $n = count($a);
        if ($n === count($b)) {
            for ($i = 0; $i < $n; $i++) {
                $value = array_shift($a);
                $expected = array_shift($b);
                $this->addTest(function (&$msg, $testNumber) use ($value, $expected, $f) {
                    return call_user_func_array($f, [$value, $expected, &$msg, $testNumber]);
                });
            }
        }
        else {
            throw new \Exception(sprintf("Array a and b must have same length (a=%d, b=%d)", $n, count($b)));
        }
    }
    
}
