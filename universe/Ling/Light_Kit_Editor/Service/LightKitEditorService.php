<?php


namespace Ling\Light_Kit_Editor\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Editor\Api\Custom\CustomLightKitEditorApiFactory;
use Ling\Light_Kit_Editor\Exception\LightKitEditorException;
use Ling\Light_Kit_Editor\Helper\LightKitEditorHelper;
use Ling\Light_Kit_Editor\Storage\LkeMultiStorageApi;


/**
 * The LightKitEditorService class.
 */
class LightKitEditorService
{


    /**
     * This property holds the factory for this instance.
     * @var CustomLightKitEditorApiFactory
     */
    protected $factory;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface | null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * This property holds the defaultWebsiteIdentifier for this instance.
     * @var string
     */
    private string $defaultWebsiteIdentifier;


    /**
     * The theme actually used when rendering a page.
     * This is only set when you call our renderPage method.
     * Otherwise, it's null.
     *
     *
     * @var string | null
     */
    private ?string $theme;


    /**
     * Builds the LightKitEditorService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->factory = null;
        $this->defaultWebsiteIdentifier = "default";
        $this->theme = null;
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
     * Sets the defaultWebsiteIdentifier.
     *
     * @param string $defaultWebsiteIdentifier
     */
    public function setDefaultWebsiteIdentifier(string $defaultWebsiteIdentifier)
    {
        $this->defaultWebsiteIdentifier = $defaultWebsiteIdentifier;
    }

    /**
     * Returns the defaultWebsiteIdentifier of this instance.
     *
     * @return string
     */
    public function getDefaultWebsiteIdentifier(): string
    {
        return $this->defaultWebsiteIdentifier;
    }


    /**
     * Returns the theme actually used while rendering the page.
     *
     * The theme is only available when you call the renderPage method of this class.
     *
     * This method is designed to be called from templates.
     *
     *
     * @return string|null
     */
    public function getTheme(): string|null
    {
        return $this->theme;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
//    /**
//     * Returns a @page(duelist engine) instance.
//     *
//     *
//     * @return DuelistEngineInterface
//     */
//    public function getDuelistEngine(): DuelistEngineInterface
//    {
//        $o = new LightKitEditorBabyYamlDuelistEngine();
//        return $o;
//    }
//
//
//    /**
//     * Returns the realform success handler to use, depending on the given type.
//     * Type can be one of:
//     *
//     * - db
//     * - babyYaml
//     *
//     *
//     * @param string $type
//     * @return RealformSuccessHandlerInterface
//     */
//    public function getRealformSuccessHandler(string $type): RealformSuccessHandlerInterface
//    {
//        $o = new LightKitEditorRealformSuccessHandler();
//
//        return $o;
//    }


    /**
     * Returns a multi storage api.
     *
     * @return LkeMultiStorageApi
     */
    public function getMultiStorageApi(): LkeMultiStorageApi
    {
        $o = new LkeMultiStorageApi();
        $o->setContainer($this->container);
        return $o;
    }


    /**
     * Renders the page identified by the given arguments.
     *
     *
     * The pageOptions are forwarded to the (kit_page_renderer)->renderPage method.
     *
     * Available options are:
     * - before: callback to trigger before the page is rendered
     *
     *
     * @param string $websiteId
     * @param string $pageId
     * @param array $pageOptions
     * @param array $options
     * @return HttpResponseInterface
     */
    public function renderPage(string $websiteId, string $pageId, array $pageOptions = [], array $options = []): HttpResponseInterface
    {


        $before = $options['before'] ?? null;


        $website = $this->getWebsiteByIdentifier($websiteId);


        /**
         * Here we want to allow the user to change the theme on a page basis,
         * hence we don't directly call the basic page renderer, but rather
         * access the page ourselves to see if there is a theme override...
         *
         */
        $engine = $website['engine'];
        $storage = $this->getMultiStorageApi();
        switch ($engine) {
            case "babyYaml":
                $rootDir = $website['rootDir'];
                $storage->setStorageType("baby")->setBabyRootDir($rootDir);
                break;
            case "db":
                $storage->setStorageType("db");
                break;
            default:
                $this->error("Unknown engine type: $engine.");
                break;
        }

        $page = $storage->getPageConf($pageId); // sneak peak to the page conf
        if (false === $page) {
            return new HttpResponse("Page not found", 404);
        }


        $pageVars = $page['vars'] ?? [];
        $theme = $pageVars['theme'] ?? null;
        $root = $website["rootDir"] ?? null;
        if (null === $theme || '$t' === $theme) {
            $theme = $website["theme"] ?? null;
        }
        $this->theme = $theme;

        if (true === is_string($root)) {
            $root = str_replace('${app_dir}/', '', $root);
        }

        /**
         * ... then we use the basic page renderer...
         */
        $pageRenderer = LightKitEditorHelper::getBasicPageRenderer($this->container, [
            'type' => $engine,
            'theme' => $theme,
            'root' => $root,
            'storage' => $storage,
        ]);


        if (true === is_callable($before)) {
            $before();
        }


        return new HttpResponse($pageRenderer->renderPage($pageId, $pageOptions));


//        return new HttpResponse($pageRenderer->renderPage($pageId, [
//            'pageConf' => $page,
//        ]));

    }


    /**
     * Registers a website.
     *
     * See the @page(Light_Kit_Editor conception notes) for more details.
     *
     *
     * Available options are:
     *
     * - ignoreDuplicate: bool=true. If false and a website with the same identifier is found, an exception will be thrown.
     *      If true (and a website with same identifier found), then the method will just do nothing silently.
     *
     *
     * @param array $website
     * @param array $options
     */
    public function registerWebsite(array $website, array $options = [])
    {

        /**
         * Here the error code 2 means: a user error.
         * This is intended for ajax based methods, so that they can format error messages properly.
         */


        $ignoreDuplicate = $options['ignoreDuplicate'] ?? true;


        if (false === array_key_exists('identifier', $website)) {
            $this->error("Missing \"identifier\" property. Aborting.", 2);
        }
        $identifier = $website['identifier'];

        if (true === empty(trim($identifier))) {
            $this->error("The identifier cannot be empty.", 2);
        }


        $f = $this->getWebsiteFile();
        if (true === is_file($f)) {
            $arr = BabyYamlUtil::readFile($f);
        } else {
            $arr = [];
        }


        // duplicate?
        foreach ($arr as $item) {
            $wId = $item['identifier'] ?? null;
            if ($identifier === $wId) {
                if (false === $ignoreDuplicate) {
                    $this->error("A website with identifier \"$wId\" already exists. Aborting.", 2);
                } else {
                    return;
                }
            }
        }


        $arr[] = $website;
        BabyYamlUtil::writeFile($arr, $f);
    }


    /**
     * Unregisters a website.
     *
     * See the @page(Light_Kit_Editor conception notes) for more details.
     *
     *
     * @param string $websiteIdentifier
     */
    public function unregisterWebsite(string $websiteIdentifier)
    {
        $f = $this->getWebsiteFile();
        if (true === is_file($f)) {
            $arr = BabyYamlUtil::readFile($f);
        } else {
            $arr = [];
        }


        // duplicate?
        foreach ($arr as $k => $item) {
            $wId = $item['identifier'] ?? null;
            if ($websiteIdentifier === $wId) {
                unset($arr[$k]);
            }
        }


        BabyYamlUtil::writeFile($arr, $f);
    }


    /**
     * Returns the list of registered websites.
     *
     * @return array
     */
    public function getWebsites(): array
    {
        $f = $this->getWebsiteFile();
        if (true === is_file($f)) {
            $arr = BabyYamlUtil::readFile($f);
        } else {
            $arr = [];
        }
        return $arr;
    }


    /**
     * Returns the info for the website identified by the given identifier.
     * Throws an @page(handy exception) by default if something wrong occurs.
     * If the throwEx option is set to false and the website is not found, returns false.
     *
     *
     * Available options are:
     * - throwEx: bool=true. Whether to throw an exception if the website is not found.
     *      If false, and the website is not found, the method returns false.
     *
     *
     *
     *
     * @param string $identifier
     * @param array $options
     * @return array|false
     */
    public function getWebsiteByIdentifier(string $identifier, array $options = []): array|false
    {
        $throwEx = $options['throwEx'] ?? true;


        $websites = $this->getWebsites();
        foreach ($websites as $website) {
            if ($identifier === $website['identifier']) {
                return $website;
            }
        }

        if (true === $throwEx) {
            $this->error("Website not found with identifier: \"$identifier\".", 2);
        }

        return false;
    }

    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightKitEditorApiFactory
     */
    public function getFactory(): CustomLightKitEditorApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightKitEditorApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->container->get("database"));
        }
        return $this->factory;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitEditorException(static::class . ": " . $msg, $code);
    }


    /**
     * Returns the location of the website file.
     * @return string
     */
    private function getWebsiteFile(): string
    {
        return $this->container->getApplicationDir() . "/config/open/Ling.Light_Kit_Editor/websites.byml";
    }
}