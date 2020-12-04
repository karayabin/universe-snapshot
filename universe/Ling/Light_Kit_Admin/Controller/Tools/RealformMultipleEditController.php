<?php


namespace Ling\Light_Kit_Admin\Controller\Tools;


use Ling\Bat\SessionTool;
use Ling\Bat\StringTool;
use Ling\Bat\UriTool;
use Ling\Chloroform\Field\HiddenField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Flasher\Service\LightFlasherService;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_Nugget\Service\LightNuggetService;
use Ling\Light_Realform\Exception\LightRealformException;
use Ling\Light_Realform\Service\LightRealformService;
use Ling\SimplePdoWrapper\Util\RicHelper;
use Ling\WiseTool\WiseTool;


/**
 * The MultipleFormEditController class.
 */
class RealformMultipleEditController extends AdminPageController
{


    /**
     * This property holds the conf cache for this instance.
     * @var array
     */
    private $_conf;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->_conf = null;
    }

    /**
     * Returns the http response, which body contains a multiple form edit page.
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {

        $realformIdentifier = null;
        $post = $request->getPost();


        if (
            array_key_exists("realform_id", $post) &&
            array_key_exists("rics", $post)
        ) {
            $realformIdentifier = $post['realform_id'];
            $rics = $post['rics'];
            SessionTool::set("MultipleFormEditController", [
                "realformId" => $realformIdentifier,
                "rics" => $rics,
            ]);

        } else {
            $arr = SessionTool::get("MultipleFormEditController", null, true);
            $realformIdentifier = $arr['realformId'];
            $rics = $arr['rics'];
        }


        if (null === $realformIdentifier) {
            $this->error("realformId not found.");
        }


        //--------------------------------------------
        // CSRF PROTECTION
        //--------------------------------------------
        $token = $request->getPostValue("csrf_token", false);
        if (null === $token) {
            $token = $request->getGetValue("csrf_token");
        }


        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->getContainer()->get('csrf_session');
        if (false === $csrfService->isValid($token)) {
            $this->error("Invalid csrf token provided: $token.");
        }


        $res = $this->processForm($realformIdentifier, $rics, [
            'post' => [
//                "rics" => $rics,
                "csrf_token" => $csrfService->getToken(),
            ],
            'onSuccess' => function () use ($request, $token, $realformIdentifier) {

                //--------------------------------------------
                // REDIRECTING TO THE SAME PAGE
                //--------------------------------------------
                /**
                 * @var $flasher LightFlasherService
                 */
                $flasher = $this->getContainer()->get('flasher');
                $flasher->addFlash($realformIdentifier, "Congrats, the form was successfully processed.");
                $lightInstance = $this->getLight();
                $urlParams = $request->getGet();
                $urlParams['csrf_token'] = $token;
                UriTool::randomize($urlParams, '_r');
                return $this->getRedirectResponseByRoute($lightInstance->getMatchingRoute()['name'], $urlParams);
            }
        ]);


        if ($res instanceof HttpResponseInterface) {
            return $res;
        }
        $form = $res;


        $conf = $this->getConfByRealformId($realformIdentifier);

        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/tools/basic-form', [
//        return $this->renderAdminPage($page, [
            "page_title" => 'User notification Form',
            "form_title" => $conf['rendering']['title'],
            "related_links" => $conf['rendering']['related_links'],
            "form" => $form,
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
        ], PageConfUpdator::create()->updateWidget('body.lka_chloroform', function (&$conf) {
            $conf['vars']['title'] .= ' (multiple edit)';
        }));
    }


    /**
     * Applies a standard routine to the form identified by the given realformIdentifier,
     * and returns a chloroform instance.
     *
     * The available options are:
     *
     * - post: array. Optional = []. Some extra parameters to add to the form.
     * - onSuccess: callable to execute on success.
     *      The callable signature is this:
     *      - fn (  ): ?HttpResponseInterface
     *
     *      If a response is returned, it will be the return of the processForm method as well.
     *
     *
     *
     *
     * @param string $realformIdentifier
     * @param array $rics
     * @param array $options
     * @return Chloroform|HttpResponseInterface
     * @throws \Exception
     */
    protected function processForm(string $realformIdentifier, array $rics, array $options = [])
    {
        $container = $this->getContainer();

        //--------------------------------------------
        // SECURITY CHECK (1/2)
        //--------------------------------------------
        /**
         * @var $rf LightRealformService
         */
        $rf = $container->get("realform");
        $conf = $this->getConfByRealformId($realformIdentifier);
        /**
         * @var $ng LightNuggetService
         */
        $ng = $container->get("nugget");
        $ng->checkSecurity($conf);


        $storageId = $this->getProperty("storage_id", $conf, $realformIdentifier);
        $ric = $this->getProperty("ric", $conf, $realformIdentifier);
        $useShare = (count($rics) > 1);

        if (false === array_key_exists("success_handler", $conf)) {
            $this->error("No success handler defined.");
        }

        $onSuccess = $options['onSuccess'] ?? null;


        try {


            //--------------------------------------------
            // SECURITY CHECK (2/2)
            //--------------------------------------------
            /**
             * Using recommended notation for micro-permission interaction with database.
             * A multiple form edit is always in update mode.
             */
            $microPermissions = [
                "store.$storageId.read",
                "store.$storageId.update",
            ];
            /**
             * @var $microService LightMicroPermissionService
             */
            $mp = $container->get("micro_permission");
            foreach ($microPermissions as $microPermission) {
                if (false === $mp->hasMicroPermission($microPermission)) {
                    throw new LightRealformException("You don't have the permission to access this page (you miss the \"$microPermission\" microPermission).");
                }
            }


            //--------------------------------------------
            // CONVERT THE ROWS TO THE FORM CONTROLS
            //--------------------------------------------
            /**
             * In order to do that, we will hack the traditional realform handler.
             */
            // we will use this rf handler as a tool to access the raw configuration...


            // ...but now we will tweak that configuration for each item, to add
            // our "_$number" suffixes for each field
            $confFormHandler = $conf['chloroform'];


            //--------------------------------------------
            // GET THE ROWS FROM THE DATABASE
            //--------------------------------------------
            /**
             * @var $db LightDatabaseService
             */
            $db = $container->get('database');
            $markers = [];

            $sWhere = RicHelper::getWhereByRics($ric, $rics, $markers);

            $q = "select * from `$storageId` where $sWhere";
            $rows = $db->fetchAll($q, $markers);
            $nbRows = count($rows);


            $fields = $confFormHandler['fields'];
            $fieldKeys = array_keys($fields);
            $ourFields = [];

            for ($i = 1; $i <= $nbRows; $i++) {
                $suffix = "_$i";

                $id2Labels = [];

                foreach ($fields as $id => $fieldData) {
                    if (array_key_exists('htmlName', $fieldData)) {
                        $fieldData['htmlName'] .= $suffix;
                    }
                    if (array_key_exists('errorName', $fieldData)) {
                        $fieldData['errorName'] .= $suffix;
                    }


                    $ourId = $id . $suffix;
                    $ourFields[$ourId] = $fieldData;

                    $id2Labels[$id] = $fieldData['label'];
                }


                // add share value checkbox
                $items = [];
                foreach ($id2Labels as $id => $label) {
                    $items[$id] = "Share this value of <b>\"$label\"</b> with all the items.";
                }
                $shareFieldId = "lrfr2-share-" . $suffix;
                $shareField = [
                    "id" => $shareFieldId,
                    "htmlAttr" => [
                        "data-number" => $i,
                    ],
                    "label" => null,
                    "type" => "checkbox",
                    "items" => $items,
                ];
                if (true === $useShare) {
                    $ourFields[$shareFieldId] = $shareField;
                }


                // add hr deco
                $hrId = 'lrfr2-hr' . $suffix;
                $hrField = [
                    "id" => $hrId,
                    "deco_type" => 'hr',
                    "type" => 'decorative',
                ];

                // add my own fields
                $ourFields[$hrId] = $hrField;
            }


            $formCssId = StringTool::getUniqueCssId("lrfr2-form-");
            $ourConf = $conf['chloroform'];


            /**
             * @var $csrf LightCsrfSessionService
             */
            $csrf = $container->get("csrf_session");


            $ourConf['fields'] = $ourFields;
            $form = $rf->getChloroformByConfiguration($ourConf);


            $form->setCssId($formCssId);
            $form->setMode("update");
            $form->addField(HiddenField::create("csrf_token", ['value' => $csrf->getToken()]));


            // adding multiple edit checkbox share behaviour
            $jsCode = file_get_contents(__DIR__ . "/js/multiple-edit-helper.js");
            $jsCode = str_replace([
                '$formId',
            ], [
                $formCssId
            ], $jsCode);
            $form->setJsCode($jsCode);


            /**
             * @var $flasher LightFlasherService
             */
            $flasher = $container->get('flasher');


            //--------------------------------------------
            // Posting the form and validating data
            //--------------------------------------------
            if (true === $form->isPosted()) {


                if (true === $form->validates()) {
                    // do something with $postedData;
                    $vid = $form->getVeryImportantData();


//                    $form->executeDataTransformers($vid);

                    $formIsHandledSuccessfully = false;

                    //--------------------------------------------
                    // APPLY THE SUCCESS HANDLER
                    //--------------------------------------------

                    //--------------------------------------------
                    // RESOLVE SHARE VALUES
                    //--------------------------------------------
                    $updateRows = [];
                    /**
                     * First compute back the data (resolve shared values if any)
                     */
                    $sharedKey2Value = []; // shared values
                    for ($i = 1; $i <= $nbRows; $i++) {
                        $thisUpdateRow = [];
                        foreach ($fieldKeys as $key) {
                            $rowKey = $key . "_" . $i;
                            // ensure we have all the keys (reject malicious users tries...)
                            if (false === array_key_exists($rowKey, $vid)) {
                                throw new LightRealformException("Key missing: \"$rowKey\" from the given \$_POST array.");
                            }
                            $thisUpdateRow[$key] = $vid[$rowKey];

                            $shareVal = $vid['lrfr2-share-_' . $i] ?? null;
                            if ($shareVal && is_array($shareVal)) {
                                foreach ($shareVal as $shareField) {
                                    $sharedKey2Value[$shareField] = $vid[$shareField . '_' . $i];
                                }
                            }
                        }
                        $updateRows[] = $thisUpdateRow;
                    }


                    /**
                     * Now apply the shared values
                     */
                    foreach ($updateRows as $k => $row) {
                        $row = array_replace($row, $sharedKey2Value);
                        $updateRows[$k] = $row;
                    }


                    //--------------------------------------------
                    // SUCCESS HANDLER
                    //--------------------------------------------
                    /**
                     * Because we are update mode, the ric might have been updated too.
                     * If that happens, the record will disappear from the gui.
                     * To avoid that, we use the updated ric when refreshing the page.
                     */
                    $newUpdateRics = [];
                    /**
                     * We apply the same success handler for each row.
                     * We do this in a transaction to ensure atomic consistency, in case the success handler uses a database.
                     *
                     * Assuming the rics order and the updateRows order match.
                     *
                     */
                    if (count($rics) === count($updateRows)) {


                        /**
                         * @var $exception \Exception
                         */
                        $exception = null;
                        $res = $db->transaction(function () use ($updateRows, $rf, $conf, $rics, &$newUpdateRics) {
                            foreach ($rics as $updateRic) {

                                $updateRow = array_shift($updateRows);
                                /**
                                 * Here we want to work around the problem that when you change the ric value in a HAS table,
                                 * the form can't display properly anymore, because the old ric it was referring to doesn't point
                                 * to a record anymore.
                                 *
                                 * But we also have to keep in mind that this particular multiple edit form works in a peculiar way:
                                 *
                                 * - it doesn't provide the ai for non HAS tables.
                                 *
                                 * So basically this affects the content of $updateRows:
                                 * - if it's a HAS table, it will contain the ric by definition
                                 * - if it's a regular table which ric is an aik, then it will not contain the ric
                                 *
                                 * In both cases, we want $newUpdateRics to contain the ric to refresh the page with.
                                 *
                                 */
                                $newUpdateRow = $updateRic; // for regular tables
                                foreach ($updateRic as $k => $v) { // for HAS tables
                                    if (array_key_exists($k, $updateRow)) {
                                        $newUpdateRow[$k] = $updateRow[$k];
                                    }
                                }
                                $newUpdateRics[] = $newUpdateRow;

                                $successOptions = [
                                    "updateRic" => $updateRic,
                                ];
                                $rf->executeSuccessHandler($conf, $updateRow, $successOptions);
                            }


                        }, $exception);
                        if (false === $res) {
                            throw $exception;
                        }


                    } else {
                        $nbRics = count($rics);
                        $nbUpdateRows = count($updateRows);
                        throw new LightRealformException("Count mismatch between rics ($nbRics) and updateRows ($nbUpdateRows).");
                    }


                    $formIsHandledSuccessfully = true;
                    if (true === $formIsHandledSuccessfully) {

                        /**
                         * update the rics which might have changed...
                         */
                        SessionTool::set("MultipleFormEditController", [
                            "realformId" => $realformIdentifier,
                            "rics" => $newUpdateRics,
                        ]);

                        if (null !== $onSuccess) {
                            $res = call_user_func($onSuccess);
                            if ($res instanceof HttpResponseInterface) {
                                return $res;
                            }
                        }
                    }

                } else {
//                $form->addNotification(ErrorFormNotification::create("There was a problem."));
                }
            } else {


                $feederOptions = [];

                /**
                 * @var $rf LightRealformService
                 */
                $rf = $this->getContainer()->get('realform');


                foreach ($rows as $k => $row) {
                    $ric = array_intersect_key($ric, $row);
                    $feederOptions['updateRic'] = $row;
                    $defaultValues = $rf->getFeederDefaultValues($conf, $feederOptions);
                    $rows[$k] = array_intersect_key($defaultValues, $row);
                }

                $injectRows = [];
                $c = 1;
                foreach ($rows as $row) {
                    $suffix = "_$c";
                    foreach ($row as $col => $val) {
                        $injectRows[$col . $suffix] = $val;
                    }
                    $c++;
                }

                $form->injectValues($injectRows);


                if ($flasher->hasFlash($realformIdentifier)) {
                    list($message, $type) = $flasher->getFlash($realformIdentifier);
                    $form->addNotification(WiseTool::wiseToChloroform($type, $message));
                }

            }


        } catch (\Exception $e) {


            /**
             * This happens if the user is not allowed (via row restriction) to read from the table.
             */
            if (false === isset($form)) {
                $form = new Chloroform();
            }

            $form->addNotification(ErrorFormNotification::create($e->getMessage()));

            // dispatch the exception (to allow deeper investigation)
            /**
             * @var $events LightEventsService
             */
            $events = $container->get("events");
            $data = LightEvent::createByContainer($container);
            $data->setVar('exception', $e);
            /**
             * Note from the Light_RealGenerator authors: we chose to use our plugin name as the handler
             * rather than the host plugin, because it would be more practical for plugins
             * like Light_ExceptionHandler (which dispatching below is mainly intended to) to deal with.
             */
            $events->dispatch("Light_RealGenerator.on_realform_exception_caught", $data);
        }


        return $form;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the value of the property identified by the given key, in the given conf array.
     *
     * @param string $key
     * @param array $conf
     * @param string $realformIdentifier
     * @return mixed
     * @throws \Exception
     */
    private function getProperty(string $key, array $conf, string $realformIdentifier)
    {

        if (false === array_key_exists($key, $conf)) {
            $this->error("Undefined storage_id in nugget with id=$realformIdentifier.");
        }
        return $conf[$key];
    }


    /**
     * Returns the nugget conf attached to the given realform identifier.
     *
     * @param string $realformIdentifier
     * @return array
     */
    private function getConfByRealformId(string $realformIdentifier): array
    {
        if (null === $this->_conf) {
            /**
             * @var $rf LightRealformService
             */
            $rf = $this->getContainer()->get("realform");
            $this->_conf = $rf->getNugget($realformIdentifier);
        }
        return $this->_conf;
    }
}