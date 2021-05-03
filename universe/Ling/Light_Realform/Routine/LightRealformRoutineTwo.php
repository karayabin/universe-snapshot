<?php


namespace Ling\Light_Realform\Routine;


use Ling\Bat\ArrayTool;
use Ling\Bat\StringTool;
use Ling\Chloroform\Field\HiddenField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Light\Events\LightEvent;
use Ling\Light\Exception\LightRedirectException;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Flasher\Service\LightFlasherService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_Realform\Exception\LightRealformException;
use Ling\Light_Realform\Service\LightRealformService;
use Ling\SimplePdoWrapper\Util\RicHelper;
use Ling\WiseTool\WiseTool;

/**
 * The LightRealformRoutineTwo class.
 *
 * This routine provides a multiple editing form for a given table and rics.
 * It updates the database in case of success.
 *
 *
 * How does it work?
 * ------------
 *
 * The input of this class is:
 * - the name of the table to update
 * - a realformIdentifier representing a single form
 * - the rics array (via POST) containing the rics of the rows to edit
 *
 *
 * It basically creates an empty chloroform instance, and then loops through each ric,
 * and add a modified version of the single form model to that chloroform instance.
 *
 * In the end it returns the built Chloroform instance.
 *
 * For each ric, this class will modify the html name by adding the suffix "_$number", with $number starting at 1
 * and being incremented on each new ric.
 *
 * This class also handles the post of the form, meaning it decodes back the "_$number" suffix into rows that
 * it updates in the database.
 *
 * I'm also adding a "share value with all rows" checkbox  for convenience.
 *
 * As for permissions, we use the @page(standard micro-permission notation for database interaction) system by default.
 *
 *
 *
 *
 *
 */
class LightRealformRoutineTwo
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the LightRealformRoutineOne instance.
     */
    public function __construct()
    {
        $this->container = null;
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
     * @param string $table
     * @param array $rics
     * @param array $options
     * @return Chloroform|HttpResponseInterface
     * @throws \Exception
     */
    public function processForm(string $realformIdentifier, string $table, array $rics, array $options = [])
    {

        /**
         * Ensure that the columns provided by the user are the ric strict columns,
         * otherwise a malicious user could access the table data in a way we might not have anticipated.
         * For instance:
         * - select * where identifier=root
         *
         *
         */

        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        $tableInfo = $dbInfoService->getTableInfo($table);
        $ric = $tableInfo['ricStrict'];
        $useShare = (count($rics) > 1);

        $onSuccess = $options['onSuccess'] ?? null;


        try {


            $microPermissionError = null;
            /**
             * Using recommended notation for micro-permission interaction with database.
             */
            $microPermission = "store.$table.read";
            /**
             * @var $microService LightMicroPermissionService
             */
            $microService = $this->container->get("micro_permission");
            if (false === $microService->hasMicroPermission($microPermission)) {
                throw new LightRealformException("You don't have the permission to access this page (you miss the \"$microPermission\" microPermission).");
            }


            //--------------------------------------------
            // CONVERT THE ROWS TO THE FORM CONTROLS
            //--------------------------------------------
            /**
             * In order to do that, we will hack the traditional realform handler.
             */
            /**
             * @var $rf LightRealformService
             */
            $rf = $this->container->get("realform");
            // we will use this rf handler as a tool to access the raw configuration...


            // ...but now we will tweak that configuration for each item, to add
            // our "_$number" suffixes for each field
            $conf = $rf->getNugget($realformIdentifier);
            $confFormHandler = $conf['form_handler'];


            //--------------------------------------------
            // GET THE ROWS FROM THE DATABASE
            //--------------------------------------------
            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get('database');
            $markers = [];
            $sWhere = RicHelper::getWhereByRics($ric, $rics, $markers);

            $q = "select * from `$table` where $sWhere";
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
            $ourConf = $conf;


            /**
             * @var $csrf LightCsrfSessionService
             */
            $csrf = $this->container->get("csrf_session");


            $ourConf["chloroform"]['fields'] = $ourFields;
            $extraInfo = [];
            $form = $rf->getChloroformByConfiguration($ourConf, $extraInfo);


            /**
             * Note implemented yet, todo...
             */
            $multipliers = $extraInfo['multipliers'];


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
            $flasher = $this->container->get('flasher');


            //--------------------------------------------
            // Posting the form and validating data
            //--------------------------------------------
            if (true === $form->isPosted()) {


                if (true === $form->validates()) {
                    // do something with $postedData;
                    $vid = $form->getVeryImportantData();


                    $form->executeDataTransformers($vid);

                    $formIsHandledSuccessfully = false;


                    //--------------------------------------------
                    // UPDATE THE DATABASE
                    //--------------------------------------------

                    /**
                     * Using recommended notation for micro-permission interaction with database.
                     */
                    $microPermission = "store.$table.update";
                    /**
                     * @var $microService LightMicroPermissionService
                     */
                    $microService = $this->container->get("micro_permission");
                    if (false === $microService->hasMicroPermission($microPermission)) {
                        throw new LightRealformException("You don't have the permission to access this page (you miss the \"$microPermission\" microPermission).");
                    }


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


                    /**
                     * Now update the rows
                     */
                    if (count($rics) === count($updateRows)) {

                        /**
                         * @var $db LightDatabaseService
                         */
                        $db = $this->container->get("database");
                        /**
                         * @var $exception \Exception
                         */
                        $exception = null;
                        $res = $db->transaction(function () use ($db, $ric, $rics, $updateRows, $table) {
                            foreach ($rics as $k => $userRic) {
                                // re-check userRic
                                if (true === ArrayTool::arrayKeyExistAll($ric, $userRic, true)) {
                                    $userRic = ArrayTool::intersect($userRic, $ric);
                                }
                                $row = $updateRows[$k];
                                $db->update($table, $row, $userRic);
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


                if ($flasher->hasFlash($table)) {
                    list($message, $type) = $flasher->getFlash($table);
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
            $events = $this->container->get("events");
            $data = LightEvent::createByContainer($this->container);
            $data->setVar('exception', $e);
            /**
             * Note from the Light_RealGenerator authors: we chose to use our plugin name as the handler
             * rather than the host plugin, because it would be more practical for plugins
             * like Light_ExceptionHandler (which dispatching below is mainly intended to) to deal with.
             */
            $events->dispatch("Ling.Light_RealGenerator.on_realform_exception_caught", $data);
        }


        return $form;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

}