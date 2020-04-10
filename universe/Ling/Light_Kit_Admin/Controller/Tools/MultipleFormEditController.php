<?php


namespace Ling\Light_Kit_Admin\Controller\Tools;


use Ling\Bat\SessionTool;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Realform\Routine\LightRealformRoutineTwo;
use Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;


/**
 * The MultipleFormEditController class.
 */
class MultipleFormEditController extends AdminPageController
{

    /**
     * Returns the http response, which body contains a multiple form edit page.
     *
     *
     *
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function render(): HttpResponseInterface
    {

        if (
            array_key_exists("table", $_POST) &&
            array_key_exists("rics", $_POST)
        ) {
            $table = $_POST['table'];
            $rics = $_POST['rics'];
            SessionTool::set("MultipleFormEditController", [
                "table" => $table,
                "rics" => $rics,
            ]);

        } else {
            $arr = SessionTool::get("MultipleFormEditController", null, true);
            $table = $arr['table'];
            $rics = $arr['rics'];
        }


        //--------------------------------------------
        // CSRF PROTECTION
        //--------------------------------------------
        if (array_key_exists('csrf_token', $_POST)) {
            $token = $_POST['csrf_token'];
            /**
             * @var $csrfService LightCsrfSessionService
             */
            $csrfService = $this->getContainer()->get('csrf_session');
            if (false === $csrfService->isValid($token)) {
                $this->error("Invalid csrf token provided: $token.");
            }
        }


        $prefix = SqlWizardGeneralTool::getTablePrefix($table);
        $mfeOptions = $this->getKitAdmin()->getPluginOption("multipleFormEditor.prefixes.$prefix", []);

        $realFormIdentifier = $mfeOptions["realform_identifier"] ?? "Light_Kit_Admin.generated/{table}";
        $page = $mfeOptions["kit_page"] ?? "Light_Kit_Admin/kit/zeroadmin/generated/{table}_form";
        $widgetName = $mfeOptions["widget_name"] ?? "lka_chloroform";


        $realFormIdentifier = str_replace('{table}', $table, $realFormIdentifier);
        $page = str_replace('{table}', $table, $page);


        $routine = new LightRealformRoutineTwo();
        $routine->setContainer($this->getContainer());
        $form = $routine->processForm($realFormIdentifier, $table, $rics, [
            'post' => [
                "table" => $table,
                "rics" => $rics,
            ],
        ]);


        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
//        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/tools/multiple_edit_form', [
        return $this->renderAdminPage($page, [
            "form" => $form,
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
        ], PageConfUpdator::create()->updateWidget('body.' . $widgetName, function (&$conf) {
            $conf['vars']['title'] .= ' (multiple edit)';
        }));
    }

}