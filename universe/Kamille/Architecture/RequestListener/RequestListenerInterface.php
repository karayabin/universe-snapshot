<?php



namespace Kamille\Architecture\RequestListener;


use Kamille\Architecture\Request\RequestInterface;

interface RequestListenerInterface{

    /**
     * Do something with the given request (for instance set a parameter).
     *
     * Note: it's commented, so that if you create an interface which extends this one,
     * you can use a more specific RequestInterface.
     */
    // public function listen(RequestInterface $request);
}