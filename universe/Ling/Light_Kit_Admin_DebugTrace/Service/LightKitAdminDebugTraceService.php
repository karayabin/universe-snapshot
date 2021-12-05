<?php


namespace Ling\Light_Kit_Admin_DebugTrace\Service;


use Ling\Light\Events\LightEvent;
use Ling\Light_Kit_DebugTrace\Service\LightKitDebugTraceService;

/**
 * The LightKitAdminDebugTraceService class.
 */
class LightKitAdminDebugTraceService extends LightKitDebugTraceService
{

    /**
     * Callable for the Ling.Light_Kit_Admin.on_page_rendered_before event provided by @page(the Light_Kit_Admin plugin).
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onPageRenderedBefore(LightEvent $event, string $eventName)
    {
        if (true === $this->isAcceptedRequest()) {
            $page = $event->getVar("page");
            $this->appendSection(["kit_admin_page" => $page]);
        }
    }


    /**
     * Callable for the Ling.Light_CsrfSimple.on_csrf_token_regenerated event provided by @page(the Light_CsrfSimple plugin).
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onCsrfTokenRegenerated(LightEvent $event, string $eventName)
    {
        if (true === $this->isAcceptedRequest()) {
            $token = $event->getVar("token");
            $this->appendSection(["csrf_token_regenerated" => $token]);
        }
    }
}