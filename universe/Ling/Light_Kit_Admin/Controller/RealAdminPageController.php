<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Chloroform\Form\Chloroform;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Realform\Service\LightRealformService;

/**
 * The RealAdminPageController class.
 *
 *
 */
abstract class RealAdminPageController extends AdminPageController
{


    /**
     * This property holds the iframeSignal for this instance.
     * @var string
     */
    protected $iframeSignal;


    /**
     * Builds the instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->iframeSignal = null;
    }


    /**
     * Renders the list for this concrete controller and returns the corresponding http response.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    abstract public function renderList();


    /**
     * Process the form for this concrete controller and returns the corresponding http response.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    abstract public function renderForm();


    /**
     * Renders a page to interact with a table data.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        if (array_key_exists("m", $_GET) && 'f' === $_GET['m']) {
            return $this->renderForm();
        }
        return $this->renderList();
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Applies a standard routine to the form identified by the given realformIdentifier, and returns either a chloroform instance,
     * or a response directly.
     *
     *
     * @param string $realformIdentifier
     * @param array $nugget
     * @param array $options
     * @return Chloroform|HttpResponseInterface
     * @throws \Exception
     */
    protected function processForm(string $realformIdentifier, array &$nugget = [], array $options = [])
    {


        /**
         * @var $rf LightRealformService
         */
        $rf = $this->getContainer()->get("realform");
        $realformResult = $rf->executeRealform($realformIdentifier);
        $nugget = $realformResult->getNugget();
        $form = $realformResult->getChloroform();
        $url = $realformResult->getRedirectionUrl();
//        $postedData = $realformResult->getValidPostedData();


        // redirection??
        if (false !== $url) {
            $response = new HttpRedirectResponse();
            $response->setUrl($url);
            return $response;
        }
        return $form;
    }


    /**
     * Sets the iframeSignal to use in case of a valid form.
     *
     * @param string $iframeSignal
     */
    public function setOnSuccessIframeSignal(string $iframeSignal)
    {
        $this->iframeSignal = $iframeSignal;
    }

//    /**
//     * Potentially register the plugin to the realform service.
//     *
//     * The plugin name is given in the identifier.
//     * See the realform documentation for more info.
//     *
//     *
//     *
//     *
//     * @param string $identifier
//     */
//    protected function lateRealFormRegistration(string $identifier)
//    {
//        $this->getContainer()->get("kit_admin")->lateRegistration('realform', $identifier);
//    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Applies a standard routine to the form identified by the given realformIdentifier, and returns either a chloroform instance,
     * or a response directly.
     *
     *
     * @param string $realformIdentifier
     * @param string $table
     * @param array $options
     * @return Chloroform|HttpResponseInterface
     * @throws \Exception
     */
//    private function processFormDeprecated(string $realformIdentifier, string $table, array $options = [])
//    {
//
//
//        $routineOne = new LightRealformRoutineOne();
//        $routineOne->setContainer($this->getContainer());
//        if (null !== $this->iframeSignal) {
//            $options['iframeSignal'] = $this->iframeSignal;
//        } else {
//            $options['onSuccess'] = function () use ($table) {
//                $this->getFlasher()->addFlash($table, "Congrats, the form was successfully processed.");
//                UriTool::randomize($_GET, '_r');
//                return $this->getRedirectResponseByRoute($this->getLight()->getMatchingRoute()['name'], $_GET);
//            };
//        }
//        $form = $routineOne->processForm($realformIdentifier, $table, $options);
//        return $form;
//    }
}