<?php

namespace Uri2PageRouter\Module;

/*
 * LingTalfi 2015-12-15
 */

use Uri2PageRouter\Uri2PageRouterInterface;

interface RouterModuleInterface
{


    /**
     * Returns the page corresponding to the given (urldecoded) base uri (an uri without the query string part).
     * Updates the router parameters if necessary.
     *  
     * Returns false if the uri has no corresponding page.
     *
     */
    public function parseUri($baseUri, Uri2PageRouterInterface $router);
}
