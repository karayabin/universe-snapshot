<?php


namespace Ling\Light_Kit_Admin_UserData\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService;
use Ling\Light_Kit_Admin_UserData\Controller\Generated\Base\RealGenController;


/**
 * The LudaTagController class.
 */
class LudaTagController extends RealGenController
{

    /**
     * Renders the tag list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin_UserData/kit/zeroadmin/generated/luda_tag_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin_UserData:generated/luda_tag',
            ],
        ]));
    }


    /**
     * Renders the tag form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {

        $table = "luda_tag";
        $identifier = "Light_Kit_Admin_UserData.generated/luda_tag";
        $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base";
        $vars = [
            "title" => "Tag form",
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
        return $this->renderAdminPage('Light_Kit_Admin_UserData/kit/zeroadmin/generated/luda_tag_form', [
            "parent_layout" => $parentLayout,
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $vars,
        ]));
    }
}