<?php


namespace Ling\Light_PrerouteHub\Runner;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;

/**
 * The LightPrerouteHubRunnerInterface interface.
 */
interface LightPrerouteHubRunnerInterface
{

    /**
     * Tells the runner to run.
     * The runner can potentially update the http response.
     *
     *
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @param HttpResponseInterface|null $httpResponse
     * @return void
     */
    public function run(Light $light, HttpRequestInterface $httpRequest, HttpResponseInterface &$httpResponse = null);
}