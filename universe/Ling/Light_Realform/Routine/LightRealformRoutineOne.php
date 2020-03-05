<?php


namespace Ling\Light_Realform\Routine;


use Ling\Bat\ArrayTool;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Flasher\Service\LightFlasherService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_Realform\Service\LightRealformService;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\WiseTool\WiseTool;

/**
 * The LightRealformRoutineOne class.
 */
class LightRealformRoutineOne
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
     *
     * The update mode is triggered if the ric strict columns are passed in the url (i.e. $_GET).
     *
     *
     * What does this method do?
     * ----------------
     *
     * It creates the form, using realform,
     * it handles both the form insert and update actions.
     *
     * If the form is posted correctly, either:
     *
     * - an @page(iframe signal) is triggered (if defined in the options)
     * - the posted data are handled using the on_success_handler (defined by the realform configuration),
     *              and a success callback can also be triggered (if defined in the options)
     *
     *
     * The table and pluginName arguments are used to help with default @page(micro-permissions) used
     * by this routine, which uses the @page(micro-permission recommended notation for database interaction).
     *
     *
     * Errors and success messages are handled using the @page(flash service).
     *
     *
     * Available options are:
     *
     * - iframeSignal; an @page(iframe signal) to use instead of the default success handler
     * - onSuccess: a success callback to trigger when the form was successfully posted (in addition to the
     *      success handler defined in the configuration). This applies only if the iframeSignal is not set
     *
     *
     *
     *
     * @param string $realformIdentifier
     * @param string $table
     * @param array $options
     * @return Chloroform
     * @throws \Exception
     */
    public function processForm(string $realformIdentifier, string $table, array $options = []): Chloroform
    {

        $iframeSignal = $options['iframeSignal'] ?? null;
        $onSuccess = $options['onSuccess'] ?? null;


        //--------------------------------------------
        // INSERT/UPDATE SWITCH
        //--------------------------------------------
        /**
         * For now, if ric exists in the url, then it's an update, otherwise it's an insert.
         */

        $isUpdate = false;


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

        if (true === ArrayTool::arrayKeyExistAll($ric, $_GET)) {
            $isUpdate = true;
            $updateRic = ArrayTool::intersect($_GET, $ric);

        }


        //--------------------------------------------
        //
        //--------------------------------------------
        $container = $this->container;

        /**
         * @var $flasher LightFlasherService
         */
        $flasher = $this->container->get('flasher');


        //--------------------------------------------
        // FORM
        //--------------------------------------------
        /**
         * @var $rf LightRealformService
         */
        $rf = $container->get("realform");
        $rfHandler = $rf->getFormHandler($realformIdentifier);

        $form = $rfHandler->getFormHandler();
        if (true === $isUpdate) {
            $form->setMode("update");
        } else {
            $form->setMode("insert");
        }

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
                // DO SOMETHING WITH THE DATA...
                //--------------------------------------------
                try {

                    $successHandler = $rfHandler->getSuccessHandler();
                    $extraParams = [];
                    if (true === $isUpdate) {
                        $extraParams["updateRic"] = $updateRic;
                    }


                    $successHandler->processData($vid, $extraParams);
                    $formIsHandledSuccessfully = true;


                } catch (\Exception $e) {
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
                    $events->dispatch("Light_RealGenerator.on_realform_exception_caught", $data);
                }


                //--------------------------------------------
                // redirect
                //--------------------------------------------
                if (true === $formIsHandledSuccessfully) {
                    if (null !== $iframeSignal) {
                        $form->setProperty("iframe-signal", $iframeSignal);
                    } else {

                        /**
                         * We prepare the redirect here.
                         * Redirect is good because the user data is used in the gui (for instance in the icon menu in the header).
                         * And so if the user changed her avatar for instance, we want her to notice the changes right away.
                         * Hence we redirect to the same page.
                         *
                         * Or even a simpler use case: an update form posted successfully: you want
                         * the new/updated values to show up (and depending on when your form handler
                         * injects the values into the template, you might need a redirect here too to
                         * refresh the page values).
                         *
                         */


                        /**
                         * Also, if it's an update, the ric params are in the $_GET (and in the url), and so if we were just
                         * refreshing the page (which is what the redirect basically will do) we would have the old ric
                         * parameters displayed in the form, which is not what we want: we want the refreshed form to
                         * reflect the newest changes, including changes in the ric.
                         * So, we just override the ric in $_GET, so that the new page refreshes with the new rics.
                         */
                        if (true === $isUpdate) {
                            foreach ($vid as $k => $v) {
                                if (in_array($k, $ric, true) && array_key_exists($k, $_GET)) {

                                    /**
                                     * However, the comment above only applies if there is not form multiplier trick.
                                     * See https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md for more info.
                                     *
                                     * If the multiplier trick is on, we want to keep the old rows values.
                                     *
                                     */
                                    if (is_array($v)) { // form multiplier trick, probably
                                        $v = $_GET[$k];
                                    }

                                    $_GET[$k] = $v;
                                }
                            }
                        }


                        if (is_callable($onSuccess)) {
                            $onSuccess();
                        }
                    }
                }

            } else {
//                $form->addNotification(ErrorFormNotification::create("There was a problem."));
            }
        } else {

            $valuesFromDb = [];


            /**
             * Using recommended notation for micro-permission interaction with database.
             */
            $microPermission = "tables.$table.read";
            /**
             * @var $microService LightMicroPermissionService
             */
            $microService = $this->container->get("micro_permission");
            if (false === $microService->hasMicroPermission($microPermission)) {
                $form->addNotification(ErrorFormNotification::create("You don't have the permission to access this page (you miss the \"$microPermission\" microPermission)."));
            } else {


                if (true === $isUpdate) {
                    /**
                     * @var $db SimplePdoWrapperInterface
                     */
                    $db = $this->container->get("database");
                    $query = "select * from `$table`";
                    $markers = [];
                    SimplePdoWrapper::addWhereSubStmt($query, $markers, $updateRic);
                    $row = $db->fetch($query, $markers);
                    if (false !== $row) {
                        $valuesFromDb = $row;
                    }
                }
                $form->injectValues($valuesFromDb);
            }


            if ($flasher->hasFlash($table)) {
                list($message, $type) = $flasher->getFlash($table);
                $form->addNotification(WiseTool::wiseToChloroform($type, $message));
            }

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