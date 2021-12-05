<?php


namespace Ling\Light_Kit_Admin_Kit_Editor\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The LkeSiteController class.
 */
class LkeSiteController extends RealAdminPageController
{

    /**
     * Renders the site list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {

        return $this->renderAdminPage('Ling.Light_Kit_Admin_Kit_Editor/generated/lke_site_list', [
            'widgetVariables' => [
                "body.light_realist" => [
                    'request_declaration_id' => 'Ling.Light_Kit_Admin_Kit_Editor:generated/lke_site',
                ],
            ],
        ]);
    }


    /**
     * Renders the site form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "Ling.Light_Kit_Admin_Kit_Editor:generated/lke_site";
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
        $vars = $nugget["rendering"] ?? [];
        $vars['form'] = $form;

        return $this->renderAdminPage('Ling.Light_Kit_Admin_Kit_Editor/generated/lke_site_form', [
            'widgetVariables' => [
                "body.lka_chloroform" => $vars,
            ],
        ]);
    }
}