<?php


namespace Kamille\Mvc\BodyEndSnippetsCollector;


/**
 *
 *
 * The idea why this object was created was to factorize jquery init code snippets in one jquery wrapper,
 * just before the body end tag.
 *
 * So, something like this, for instance:
 *
 * $( document ).ready(function() {
 *      // Your init code from widget 1
 *      // Your init code from widget 2
 *      // Your init code from widget 3
 * });
 *
 *
 *
 * But the idea has been extended one bit further, and now you basically can use it as a medium
 * to pass ANY code snippet from your widgets (or your application code in general) to the object
 * in your application responsible to display those snippets.
 *
 * In Kamille, we have the HtmlPageHelper which does that.
 *
 *
 */
interface BodyEndSnippetsCollectorInterface
{

    /**
     * @return array of snippets to paste at the end of the html page (just before the html end body tag)
     */
    public function getSnippets();
}