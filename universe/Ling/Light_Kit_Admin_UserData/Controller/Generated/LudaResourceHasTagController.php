<?php


namespace Ling\Light_Kit_Admin_UserData\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The LudaResourceHasTagController class.
 */
class LudaResourceHasTagController extends RealAdminPageController
{

    /**
     * Renders the resource has tag list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin_UserData/kit/zeroadmin/generated/luda_resource_has_tag_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin_UserData:generated/luda_resource_has_tag',
            ],
        ]));
    }


    /**
     * Renders the resource has tag form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "Light_Kit_Admin_UserData:generated/luda_resource_has_tag";
        $nugget = [];
        $res = $this->processForm($realformId, $nugget);

        if ($res instanceof HttpResponseInterface) {
            return $res;
        } else {
            $form = $res;
        }

        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderAdminPage('Light_Kit_Admin_UserData/kit/zeroadmin/generated/luda_resource_has_tag_form', [
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $nugget["rendering"],
        ]));
    }
}