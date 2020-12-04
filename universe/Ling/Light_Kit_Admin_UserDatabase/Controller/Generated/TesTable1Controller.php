<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The TesTable1Controller class.
 */
class TesTable1Controller extends RealAdminPageController
{

    /**
     * Renders the tes table1 list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin_UserDatabase/kit/zeroadmin/generated/tes_table1_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin_UserDatabase:generated/tes_table1',
            ],
        ]));
    }


    /**
     * Renders the tes table1 form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "Light_Kit_Admin_UserDatabase:generated/tes_table1";
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
        return $this->renderAdminPage('Light_Kit_Admin_UserDatabase/kit/zeroadmin/generated/tes_table1_form', [
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $nugget["rendering"],
        ]));
    }
}