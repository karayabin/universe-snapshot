<?php


namespace Ling\Light_EndRoutine_CsrfPageCleaner\Handler;


use Ling\Light\Tool\LightTool;
use Ling\Light_Csrf\Service\LightCsrfService;
use Ling\Light_EndRoutine\Handler\ContainerAwareLightEndRoutineHandler;

/**
 * The LightEndRoutineCsrfPageCleanerHandler class.
 * We just implement the @page(csrf tool page cleaning system).
 */
class LightEndRoutineCsrfPageCleanerHandler extends ContainerAwareLightEndRoutineHandler
{


    /**
     * @implementation
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