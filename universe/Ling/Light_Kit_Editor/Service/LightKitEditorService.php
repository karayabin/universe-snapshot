<?php


namespace Ling\Light_Kit_Editor\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit\ConfigurationTransformer\ThemeTransformer;
use Ling\Light_Kit\Service\LightKitService;
use Ling\Light_Kit_Editor\Api\Custom\CustomLightKitEditorApiFactory;
use Ling\Light_Kit_Editor\Exception\LightKitEditorException;
use Ling\Light_Kit_Editor\Light_Realform\SuccessHandler\LightKitEditorRealformSuccessHandler;
use Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\LightKitEditorBabyYamlDuelistEngine;
use Ling\Light_Kit_Editor\Storage\LkeMultiStorageApi;
use Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface;
use Ling\Light_Realist\DuelistEngine\DuelistEngineInterface;
use Ling\Light_Vars\Service\LightVarsService;


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
     * Builds the LightKitEditorService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->factory = null;
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
     * @param string $websiteId
     * @param string $pageId
     * @return HttpResponseInterface
     */
    public function renderPage(string $websiteId, string $pageId): HttpResponseInterface
    {

        $website = $this->getWebsiteByIdentifier($websiteId);
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

        $page = $storage->getPageConf($pageId);


        /**
         * @var $kit LightKitService
         */
        $kit = $this->container->get("kit");


        $pageVars = $page['vars'] ?? [];
        $theme = $pageVars['theme'] ?? null;

        if ('$t' === $theme) {
            if (true === array_key_exists("theme", $website)) {
                $theme = $website['theme'];
            }
        }


        $page['layout'] = str_replace('$t', $theme, $page['layout']);

        $themeTransformer = new ThemeTransformer();
        $themeTransformer->setTheme($theme);
        $kit->addPageConfigurationTransformer($themeTransformer);



//az($page);



        return new HttpResponse($kit->renderPage($pageId, [
            'pageConf' => $page,
        ]));

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


    /**
     * Returns the location of the website file.
     * @return string
     */
    private function getWebsiteFile(): string
    {
        return $this->container->getApplicationDir() . "/config/open/Ling.Light_Kit_Editor/websites.byml";
    }
}