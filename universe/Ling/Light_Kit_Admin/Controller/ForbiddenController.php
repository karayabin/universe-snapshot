<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\WiseTool\WiseTool;

/**
 * The ForbiddenController class.
 */
class ForbiddenController extends AdminPageController
{


    /**
     * Renders an access forbidden page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render(): HttpResponseInterface|string
    {

        $updator = null;


        $flasher = $this->getFlasher();
        if (true === $flasher->hasFlash("AdminPageControllerForbidden")) {
            list($text, $type) = $flasher->getFlash("AdminPageControllerForbidden", false);

            $regularType = WiseTool::wiseToRegular($type);
            $updator = PageConfUpdator::create()->updateWidget("body.zeroadmin_bignotification", [
                'vars' => [
                    "text" => $text,
                    "container_class" => "big-notif-$regularType",
                ],
            ]);
        }

        return $this->renderPage('Ling.Light_Kit_Admin/forbidden', [], $updator);
    }
}