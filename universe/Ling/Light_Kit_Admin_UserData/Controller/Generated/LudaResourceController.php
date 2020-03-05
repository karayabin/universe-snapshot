<?php


namespace Ling\Light_Kit_Admin_UserData\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService;
use Ling\Light_Kit_Admin_UserData\Controller\Generated\Base\RealGenController;


/**
 * The LudaResourceController class.
 */
class LudaResourceController extends RealGenController
{

    /**
     * Renders the resource list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin_UserData/kit/zeroadmin/generated/luda_resource_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin_UserData:generated/luda_resource',
            ],
        ]));
    }


    /**
     * Renders the resource form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {

        $table = "luda_resource";
        $identifier = "Light_Kit_Admin_UserData.generated/luda_resource";
        $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base";
        $vars = [
            "title" => "Resource form",
        ];
        if (array_key_exists("solo", $_GET)) {
            $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_solo";
            $vars['related_links'] = []; // cancel any existing related links
            $this->setOnSuccessIframeSignal("done");
        }

        LightUserRowRestrictionService::$mode = LightUserRowRestrictionService::MODE_STRICT;
        $form = $this->processForm($identifier, $table);


        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderAdminPage('Light_Kit_Admin_UserData/kit/zeroadmin/generated/luda_resource_form', [
            "parent_layout" => $parentLayout,
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $vars,
        ]));
    }
}