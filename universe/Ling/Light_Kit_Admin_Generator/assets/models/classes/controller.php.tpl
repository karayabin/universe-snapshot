<?php


namespace TheNamespace;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
//->use


/**
 * The TheController class.
 */
class TheController extends TheBaseController
{

    /**
     * Renders the {tableLabel} list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('{list_page}', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => '{request_declaration_id}',
            ],
        ]));
    }


    /**
     * Renders the {tableLabel} form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "{form_identifier}";
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
        return $this->renderAdminPage('{form_page}', [
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $nugget["rendering"],
        ]));
    }
}