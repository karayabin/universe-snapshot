<?php


namespace Ling\Light_Kit\PageRenderer;


use Ling\Kit\ConfStorage\ConfStorageInterface;
use Ling\Kit\PageRenderer\KitPageRenderer;
use Ling\Light_Kit\Exception\LightKitException;


/**
 * The LightKitPageRenderer class.
 *
 *
 */
class LightKitPageRenderer extends KitPageRenderer
{

    /**
     * This property holds the applicationDir for this instance.
     * @var string
     */
    protected $applicationDir;

    /**
     * This property holds the confStorage for this instance.
     * @var ConfStorageInterface
     */
    protected $confStorage;


    /**
     * Builds the LightKitPageRenderer instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->applicationDir = null;
    }

    /**
     * Sets the confStorage.
     *
     * @param ConfStorageInterface $confStorage
     * @return $this
     */
    public function setConfStorage(ConfStorageInterface $confStorage)
    {
        $this->confStorage = $confStorage;
        return $this;
    }


    /**
     * Configures thi instance.
     *
     * The settings array contains the following:
     *
     * - application_dir: string. The path to the application directory
     *
     *
     * @param array $settings
     * @throws \Exception
     *
     */
    public function configure(array $settings)
    {
        if (array_key_exists('application_dir', $settings)) {

            $appDir = $settings['application_dir'];
            $this->applicationDir = $appDir;
            $this->setLayoutRootDir($appDir);
        } else {
            throw new LightKitException("configure error: the application_dir setting is missing.");
        }
    }


    /**
     * Renders the given page.
     *
     *
     * @param string $pageName
     * @return string
     * @throws \Exception
     */
    public function renderPage(string $pageName): string
    {

        if (null !== $this->applicationDir) {
            if (null !== $this->confStorage) {


                //--------------------------------------------
                // GET THE PAGE CONF
                //--------------------------------------------
                $pageConf = $this->confStorage->getPageConf($pageName);
                if (false !== $pageConf) {
                    //--------------------------------------------
                    // CONFIGURATION
                    //--------------------------------------------
                    /**
                     * Note: the registerWidgetHandler calls are done from the service configuration directly.
                     */
                    $this->setPageConf($pageConf);


                    ob_start();
                    $this->printPage();
                    return ob_get_clean();
                } else {
                    throw new LightKitException("The configuration for page $pageName couldn't be retrieved. The given errors were: " . implode(", ", $this->confStorage->getErrors()));
                }

            } else {
                throw new LightKitException("The configuration storage is not set. Use the setConfStorage method.");
            }

        } else {
            throw new LightKitException("applicationDir not set. Use the configure method.");
        }
    }


}