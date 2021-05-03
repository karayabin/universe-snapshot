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

        return $this->renderAdminPage('{list_page}', [
            'widgetVariables' => [
                "body.light_realist" => [
                    'request_declaration_id' => '{request_declaration_id}',
                ],
            ],
        ]);
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
        $vars = $nugget["rendering"] ?? [];
        $vars['form'] = $form;

        return $this->renderAdminPage('{form_page}', [
            'widgetVariables' => [
                "body.lka_chloroform" => $vars,
            ],
        ]);
    }
}