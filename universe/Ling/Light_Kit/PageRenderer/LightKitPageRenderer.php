<?php


namespace Ling\Light_Kit\PageRenderer;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit\ConfStorage\ConfStorageInterface;
use Ling\Kit\ConfStorage\VariableAwareConfStorageInterface;
use Ling\Kit\PageRenderer\KitPageRenderer;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightDummyServiceContainer;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Kit\Exception\LightKitException;
use Ling\Light_Kit\PageConfigurationTransformer\DynamicVariableAwareInterface;
use Ling\Light_Kit\PageConfigurationTransformer\PageConfigurationTransformerInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;


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
     * This property holds the pageName for this instance.
     * @var string
     */
    protected $pageName;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the array of pageConfTransformers for this instance.
     * @var PageConfigurationTransformerInterface[]
     */
    protected $pageConfTransformers;


    /**
     * Builds the LightKitPageRenderer instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->applicationDir = null;
        $this->pageName = null;
        $this->container = null;
        $this->pageConfTransformers = [];
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
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Adds a PageConfigurationTransformerInterface to this instance.
     *
     * @param PageConfigurationTransformerInterface $transformer
     */
    public function addPageConfigurationTransformer(PageConfigurationTransformerInterface $transformer)
    {
        $this->pageConfTransformers[] = $transformer;
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
     * @param array $dynamicVariables
     * @param PageConfUpdator|null $pageConfUpdator
     * @return string
     * @throws \Exception
     */
    public function renderPage(string $pageName, array $dynamicVariables = [], PageConfUpdator $pageConfUpdator = null): string
    {

        if (null !== $this->applicationDir) {
            if (null !== $this->confStorage) {


                //--------------------------------------------
                // GET THE PAGE CONF
                //--------------------------------------------
                if ($this->confStorage instanceof VariableAwareConfStorageInterface) {
                    $this->confStorage->setVariables($dynamicVariables);
                }

                $pageConf = $this->confStorage->getPageConf($pageName);
                if (false !== $pageConf) {


                    //--------------------------------------------
                    // UPDATE THE CONF
                    //--------------------------------------------
                    if (null !== $pageConfUpdator) {
                        $pageConfUpdator->update($pageConf);
                    }


                    //--------------------------------------------
                    // TRANSFORM PAGE CONF
                    //--------------------------------------------
                    foreach ($this->pageConfTransformers as $transformer) {
                        if ($transformer instanceof LightServiceContainerAwareInterface) {
                            $transformer->setContainer($this->getContainer());
                        }

                        if ($transformer instanceof DynamicVariableAwareInterface) {
                            $transformer->setVariables($dynamicVariables);
                        }
                        $transformer->transform($pageConf);
                    }

                    //--------------------------------------------
                    // CONFIGURATION
                    //--------------------------------------------
                    $this->pageName = $pageName;
                    $this->setPageConf($pageConf);


                    /**
                     * @var $events LightEventsService
                     */
                    $events = $this->container->get("events");
                    $event = LightEvent::createByContainer($this->container);
                    $event->setVar("pageConf", $pageConf);
                    $events->dispatch('Light_Kit.on_page_conf_ready', $event);


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



    //--------------------------------------------
    // METHODS FOR LAYOUT
    //--------------------------------------------
    /**
     * Returns a light service container instance.
     * If no container is set, a dummy container is created on the fly and returned on subsequent calls.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        if (null === $this->container) {
            $this->container = new LightDummyServiceContainer();
        }
        return $this->container;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function getHtmlPageCopilot(): HtmlPageCopilot
    {
        if (null === $this->copilot) {
            $this->copilot = $this->getContainer()->get('html_page_copilot');
        }
        return $this->copilot;
    }


}