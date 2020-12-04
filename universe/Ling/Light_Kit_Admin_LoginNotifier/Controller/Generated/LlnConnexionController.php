<?php


namespace Ling\Light_Kit_Admin_LoginNotifier\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The LlnConnexionController class.
 */
class LlnConnexionController extends RealAdminPageController
{

    /**
     * Renders the connexion list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin_LoginNotifier/kit/zeroadmin/generated/lln_connexion_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin_LoginNotifier:generated/lln_connexion',
            ],
        ]));
    }


    /**
     * Renders the connexion form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "Light_Kit_Admin_LoginNotifier:generated/lln_connexion";
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
        return $this->renderAdminPage('Light_Kit_Admin_LoginNotifier/kit/zeroadmin/generated/lln_connexion_form', [
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $nugget["rendering"],
        ]));
    }
}