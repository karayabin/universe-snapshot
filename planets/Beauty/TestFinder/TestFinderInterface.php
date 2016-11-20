<?php

namespace Beauty\TestFinder;

/*
 * LingTalfi 2015-10-27
 */
interface TestFinderInterface {


    /**
     * @return array
     * 
     *      Returns an array of groupName => <item>.
     *      An <item> is either:
     *          - an array of test urls (numerical indexes) 
     *          - an array of groupName => <item> 
     * 
     */
    public function getTestPageUrls();
    
}
