<?php

namespace PhpBeast;

/*
 * LingTalfi 2015-10-26
 */
interface TestInterpreterInterface
{


    /**
     * Executes all the tests bound to the given aggregator,
     * and displays the corresponding "special strings".
     *
     */
    public function execute(TestAggregatorInterface $a);
}
