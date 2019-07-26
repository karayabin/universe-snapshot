<?php


namespace Ling\Light_PrerouteHub;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_PrerouteHub\Runner\LightPrerouteHubRunnerInterface;

/**
 * The LightPrerouteHub class.
 */
class LightPrerouteHub
{

    /**
     * This property holds the runners for this instance.
     * @var LightPrerouteHubRunnerInterface[]
     */
    protected $runners;


    /**
     * Builds the LightPrerouteHub instance.
     */
    public function __construct()
    {
        $this->runners = [];
    }


    /**
     * Runs all the runners attached to this hub.
     *
     *
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @param HttpResponseInterface|null $httpResponse
     */
    public function run(Light $light, HttpRequestInterface $httpRequest, HttpResponseInterface &$httpResponse = null)
    {
        foreach ($this->runners as $runner) {
            $runner->run($light, $httpRequest, $httpResponse);
        }
    }

    /**
     * Sets the runners.
     *
     * @param LightPrerouteHubRunnerInterface[] $runners
     */
    public function setRunners(array $runners)
    {
        $this->runners = $runners;
    }

}