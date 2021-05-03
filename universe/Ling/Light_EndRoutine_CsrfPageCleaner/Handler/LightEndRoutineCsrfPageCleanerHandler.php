<?php


namespace Ling\Light_EndRoutine_CsrfPageCleaner\Handler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light\Tool\LightTool;
use Ling\Light_Csrf\Service\LightCsrfService;

/**
 * The LightEndRoutineCsrfPageCleanerHandler class.
 * We just implement the @page(csrf tool page cleaning system).
 */
class LightEndRoutineCsrfPageCleanerHandler implements LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the LightEndRoutineCsrfPageCleanerHandler instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Listener for the @page(Ling.Light.end_routine event).
     *
     * It will delete the unused page tokens on non ajax pages.
     *
     */
    public function handle()
    {
        if (false === LightTool::isAjax($this->container)) {
            /**
             * @var $csrf LightCsrfService
             */
            $csrf = $this->container->get("csrf");
            $csrf->deletePageUnusedTokens();
        }
    }

}