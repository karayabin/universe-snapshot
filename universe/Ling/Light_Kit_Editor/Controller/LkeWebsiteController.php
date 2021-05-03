<?php


namespace Ling\Light_Kit_Editor\Controller;

use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;

/**
 * The LkeWebsiteController class.
 */
class LkeWebsiteController extends LightController
{


    /**
     * Renders a website page.
     * The expected parameters in the request.GET are:
     *
     * - website_id: the website identifier
     * - page_id: the page identifier
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface{
        $websiteId = $request->getGetValue("website_id");
        $pageId = $request->getGetValue("page_id");
        /**
         * @var $ke LightKitEditorService
         */
        $ke = $this->getContainer()->get("kit_editor");
        return $ke->renderPage($websiteId, $pageId);





    }
}