<?php

namespace PhpBeast;

/*
 * LingTalfi 2015-10-26
 */
class TestAggregator implements TestAggregatorInterface
{
    private $tests;

    public function __construct()
    {
        $this->tests = [];
    }


    public static function create()
    {
        return new static();
    }

    /**
     *
     * About the callable:
     *
     *
     *          bool       f ( str:&msg=null, int:testNumber )
     *
     * - success: is achieved when the test returns true
     * - failure: is achieved when the test returns false
     * - skipped: is achieved when the test throws a BeastSkipException
     * - notApplicable: is achieved when the test throws a BeastNotApplicableException
     * - error: is achieved when the test throws another exception
     *
     * If msg is set to a non null value, then:
     * - if the result of the test is a success, it's value will be the success message
     * - if the result of the test is a failure, it's value will be the failure message
     *
     * 
     * testNumber starts at 1, and is incremented on each test.
     *
     *
     */
    public function addTest(callable $f)
    {
        $this->tests[] = $f;
        return $this;
    }

    public function getTests()
    {
        return $this->tests;
    }


}
