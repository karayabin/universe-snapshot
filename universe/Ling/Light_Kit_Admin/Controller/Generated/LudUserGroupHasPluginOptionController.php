<?php


namespace Ling\Light_Kit_Admin\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\Generated\Base\RealGenController;


/**
 * The LudUserGroupHasPluginOptionController class.
 */
class LudUserGroupHasPluginOptionController extends RealGenController
{

    /**
     * Renders the user group has plugin option list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/generated/lud_user_group_has_plugin_option_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin:generated/lud_user_group_has_plugin_option',
            ],
        ]));
    }


    /**
     * Renders the user group has plugin option form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {

        $table = "lud_user_group_has_plugin_option";
        $identifier = "Light_Kit_Admin.generated/lud_user_group_has_plugin_option";
        $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base";
        $vars = [
            "title" => "User group has plugin option form",
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
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/generated/lud_user_group_has_plugin_option_form', [
            "parent_layout" => $parentLayout,
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $vars,
        ]));
    }
}