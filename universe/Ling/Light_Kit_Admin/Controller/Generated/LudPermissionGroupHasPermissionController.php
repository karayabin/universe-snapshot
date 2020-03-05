<?php


namespace Ling\Light_Kit_Admin\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\Generated\Base\RealGenController;


/**
 * The LudPermissionGroupHasPermissionController class.
 */
class LudPermissionGroupHasPermissionController extends RealGenController
{

    /**
     * Renders the permission group has permission list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/generated/lud_permission_group_has_permission_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin:generated/lud_permission_group_has_permission',
            ],
        ]));
    }


    /**
     * Renders the permission group has permission form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {

        $table = "lud_permission_group_has_permission";
        $identifier = "Light_Kit_Admin.generated/lud_permission_group_has_permission";
        $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base";
        $vars = [
            "title" => "Permission group has permission form",
        ];
        if (array_key_exists("solo", $_GET)) {
            $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_solo";
            $vars['related_links'] = []; // cancel any existing related links
            $this->setOnSuccessIframeSignal("done");
        }


        $form = $this->processForm($identifier, $table);


        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/generated/lud_permission_group_has_permission_form', [
            "parent_layout" => $parentLayout,
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $vars,
        ]));
    }
}