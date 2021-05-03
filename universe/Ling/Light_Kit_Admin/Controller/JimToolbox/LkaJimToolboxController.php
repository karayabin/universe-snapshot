<?php


namespace Ling\Light_Kit_Admin\Controller\JimToolbox;


use Ling\Bat\ClassTool;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Kit_Admin\JimToolbox\JimToolboxItemHandlerInterface;
use Ling\UrlSmuggler\UrlSmugglerTool;

/**
 * The LkaJimToolboxController class.
 */
class LkaJimToolboxController extends AdminPageController
{

    /**
     * Renders an @page(acp response) containing the pane body and title information.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {


        try {


            /**
             * Make sure the user is connected
             */
            $perm = 'Ling.Light_Kit_Admin.user';
            $response = $this->checkRight($perm);
            if (null !== $response) {
                return HttpJsonResponse::create([
                    "type" => 'error',
                    "error" => "You don't have the permission to access this content ($perm required).",
                ]);
            }


            $acpClass = $request->getGetValue("acp_class", false);
            $get = $request->getGet();
            if (null !== $acpClass) {
                $currentUri = UrlSmugglerTool::unsmuggle($request->getGetValue("current_uri"));
                $interface = 'Ling\Light_Kit_Admin\JimToolbox\JimToolboxItemHandlerInterface';
                /**
                 * @var $o JimToolboxItemHandlerInterface
                 */
                $o = ClassTool::instantiateIfImplements($acpClass, $interface);

                if($o instanceof LightServiceContainerAwareInterface){
                    $o->setContainer($this->getContainer());
                }

                $get['currentUri'] = $currentUri;

                $body = $o->getPaneBody($get);
                $title = $o->getPaneTitle();

                return HttpJsonResponse::create([
                    "type" => "success",
                    'content' => $body,
                    'title' => $title,
                ]);
            }


            return HttpJsonResponse::create([
                "type" => 'error',
                "error" => "The parameters you sent don't match a technique I know. Aborting...",
            ]);

        } catch (\Exception $e) {
            return HttpJsonResponse::create([
                "type" => 'error',
                "error" => "An exception occurred with message: " . $e->getMessage(),
                "trace" => $e->getTraceAsString(),
            ]);
        }

    }
}