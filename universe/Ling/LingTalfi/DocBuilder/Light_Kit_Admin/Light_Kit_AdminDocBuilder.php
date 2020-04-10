<?php


namespace Ling\LingTalfi\DocBuilder\Light_Kit_Admin;


use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Exception\DocBuilderException;
use Ling\DocTools\Translator\ParseDownTranslator;
use Ling\LingTalfi\DocTools\LingTalfiDocToolsHelper;


/**
 * The Light_Kit_AdminDocBuilder class.
 */
class Light_Kit_AdminDocBuilder
{


    /**
     * Launch this function to generate the documentation for the Light_Kit_Admin planet.
     * (based on the LingGitPhpPlanetDocBuilder doc builder.
     *
     * If htmlMode is true (the default),
     * this method will generate all files in md format in the following directory:
     *
     * - /myphp/universe/Light_Kit_Admin/doc
     *
     *
     *
     * If htmlMode is true,
     * then html files will be generated (instead of md files).
     * You can then browse the result at: http://jindoc/api
     *
     *
     *
     * This method will also show the documentation report.
     *
     *
     *
     *
     * @param bool $htmlMode
     * @throws DocBuilderException
     */
    public static function buildDoc($htmlMode = true)
    {

        //--------------------------------------------
        // DOC TOOLS: CREATE A DOCUMENTATION FOR A PHP PLANET FOR GIT (MARKDOWN)
        //--------------------------------------------
        $planetDir = "/myphp/universe/Ling/Light_Kit_Admin";
        $gitRepoUrl = "https://github.com/lingtalfi/Light_Kit_Admin";
        $git = $gitRepoUrl . "/blob/master";
        $doc = "$git/doc";
        $api = $doc . "/api";


        $options = [
            "gitRepoUrl" => $gitRepoUrl,
            /**
             * Path to the planet dir that we want to generate the documentation for.
             */
            "planetDir" => $planetDir,
            /**
             * Whether to show the "methods without return" items in the report.
             * I disable them because a lot of methods don't need return (like __construct, setters, ...),
             * and it disturbs me to have a warning for that.
             */
            "reportShowMethodsWithoutReturn" => false,
            /**
             * An array of classes to ignore.
             * You would put any classes used by your planet, but external to your planet.
             * That's because they will be scanned by the Parser and generate errors in the @kw(report).
             * By referencing theme here, they would be scanned, but not generate errors in the report.
             *
             */
            "reportIgnore" => [
                "Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler",
                "Ling\Light_BMenu\Host\LightBMenuAbstractHost",
                "Ling\Chloroform\Form\Chloroform",
                "Ling\Light\Controller\LightController",
                "Ling\Light_MicroPermission\MicroPermissionResolver\BabyYamlMicroPermissionResolver",
                "Ling\Light_Realform\Handler\BaseRealformHandler",
                "Ling\Light_Realist\ActionHandler\LightRealistAbstractActionHandler",
                "Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler",
                "Ling\Light_Realist\ListGeneralActionHandler\LightRealistBaseListGeneralActionHandler",
                "Ling\Light_Realist\Rendering\BaseRealistRowsRenderer",
                "Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget",
                "Ling\Kit_PicassoWidget\Widget\WidgetConfAwarePicassoWidget",
                "Ling\Kit_PicassoWidget\Widget\PicassoWidget",
                "Ling\ZephyrTemplateEngine\ZephyrTemplateEngine",
                "Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler",
                "Ling\Light_ChloroformExtension\Field\TableList\BaseTableListFieldConfigurationHandler",
                "Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler",
                "Ling\Bootstrap4AdminTable\Renderer\StandardBootstrap4AdminTableRenderer",
                "Ling\Bootstrap4AdminTable\Renderer\Bootstrap4AdminTableRenderer",
                "Ling\Light_Realist\Rendering\OpenAdminTableBaseRealistListRenderer",
                "Ling\Light_RowLookup\ConfigurationStorage\BaseRowLookupConfigurationStorage",


            ],
            /**
             * Your project start date.
             * I like to write down when I start a project, along with when the project was last updated.
             * The date when the project was last updated can be generated automatically, but the project
             * start date doesn't change.
             */
            "projectStartDate" => "2019-05-17",

            /**
             * @kw(CopyModule).
             * To copy the whole documentation from one place to another, and interpreting @kw(inline functions)
             * during the transfer.
             * This is usually the last part of the DocTools generation process: it happens after the doc is generated,
             * and copies everything, including your manual documents to the destination directory.
             *
             *
             * I like to write my (manual) docs in a private directory, where I use the fancy @kw(inline functions) a lot in
             * all my pages (inside the pages directory of the @kw(Lizard scheme)).
             *
             * Then I like to copy this structure to the final public destination, which is the doc directory in the git repo
             * (and at the root of my planet on my local machine).
             */
            "copyModuleSrc" => "$planetDir/personal/mydoc",
            "copyModuleDst" => "$planetDir/doc",
            /**
             * I filtered out the doctool-markup-language.md document, because it explains the inline functions,
             * and so interpreting inline functions on this page is a bad idea.
             */
            "copyModuleOptions" => [
                "filter" => [
//                    "doctool-markup-language.md",
                ],
            ],
            /**
             * Git production mode
             * -------------
             * The settings below are my final settings when I want to export the doc to github.com.
             * See the "Local test mode" section below to see my settings when I work in local.
             *
             */
            /**
             * The directory where the api will be generated (with this DocBuilder: the planet page, the class pages,
             * and the method pages).
             */
            "generatedClassBaseDir" => "$planetDir/doc/api",
            /**
             * The base directory for the @kw(inserts).
             */
            "insertsBaseDir" => "$planetDir/personal/mydoc/inserts",
            /**
             * The base url for the generated documentation api (this maps to the generatedClassBaseDir defined above).
             */
            "generatedClassBaseUrl" => $api,
            /**
             * The extension of the files to generate.
             * If you use html, be sure to define a markdownTranslator (see how in the "Local test mode" section below).
             */
            "mode" => "md", // md|html

            /**
             * This map is used internally by the @kw(inline functions).
             * This map in particular is the one used for the whole DocTools planet documentation (pages and api).
             */
            "keyWord2UrlMap" => [
                "ajax communication protocol" =>  'https://github.com/lingtalfi/AjaxCommunicationProtocol',
                "conception notes" => $doc . '/pages/conception-notes.md',
                "the postedData section" =>  'https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-posted-data',
                "very important data" =>  'https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data',
                "DataTransformerInterface" =>  'https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md',
                "the field ids" =>  'https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-field-id',
                "FieldInterface->toArray method" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/toArray.md",
                "Chloroform toArray" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md",
                "the route page" => "https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md",
                "kit service" => "https://github.com/lingtalfi/Light_Kit",
                "the flasher service" => "https://github.com/lingtalfi/Light_Flasher",
                "generic action item" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md",
                "the realist conception notes" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md",
                "open admin table helper implementation notes" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md",
                "LightReverseRouterInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface.md",
                "bdot path" => "https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md",
                "ChloroformWidget" => "https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md#chloroformwidget",
                "widget configuration array" => "https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array",
                "micro-permissions" => "https://github.com/lingtalfi/Light_MicroPermission",
                "micro-permission recommended notation for database interaction" => "https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction",
                "flash service" => "https://github.com/lingtalfi/Light_Flasher/",
                "controller hub service" => "https://github.com/lingtalfi/Light_ControllerHub",
                "iframe-signal system" => "https://github.com/lingtalfi/TheBar/blob/master/discussions/iframe-signal.md",
                "table list configuration item" => "https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item",
                "LightRealformRoutineOne instance" => "https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineOne.md",
                "the form multiplier trick" => "https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md",
                "ric strict" => "https://github.com/lingtalfi/NotationFan/blob/master/ric.md#the-strict-ric",
                "Light_ChloroformExtension plugin" => "https://github.com/lingtalfi/Light_ChloroformExtension",
                "in_rics tag" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist-conception-notes.md#in_rics",
                "open admin table protocol" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md",
                "responsive table helper tool" => "https://github.com/lingtalfi/JResponsiveTableHelper",
                "list action handler conception notes" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md",
                "duelist page" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md",
                "LightReverseRouterService" => "https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService.md",
                "ajax handler service" => "https://github.com/lingtalfi/Light_AjaxHandler",
                "Light_CsrfSession plugin" => "https://github.com/lingtalfi/Light_CsrfSession",
                "chloroform array page" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-array.md",
                "Light.initialize_2 event" => "https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md",
                "light events page" => "https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md",
                "Light_UserDatabase plugin" => "https://github.com/lingtalfi/Light_UserDatabase",
            ],
            /**
             * An array of external classes to url.
             * This will be used by some widgets to create links to that class when appropriate.
             * For instance, on the @kw(ParseDownTranslator class page), the class synopsis shows that the
             * ParseDownTranslator class extends the external Parsedown class.
             *
             * And so because the Parsedown class is referenced in the array below, it can be converted to a link
             * in the class synopsis.
             */
            "externalClass2Url" => [
                "Ling\Chloroform\Exception\ChloroformException" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Exception/ChloroformException.md",
                "Ling\Light\Exception\LightException" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md",
                "Ling\Octopus\Exception\OctopusServiceErrorException" => "https://github.com/lingtalfi/Octopus/blob/master/doc/api/Ling/Octopus/Exception/OctopusServiceErrorException.md",
                "Ling\Kit_PicassoWidget\Exception\PicassoWidgetException" => "https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Exception/PicassoWidgetException.md",
                "Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler" => "https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md",
                "Ling\Light\ServiceContainer\LightServiceContainerAwareInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md",
                "Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface" => "https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md",
                "Ling\Light\ServiceContainer\LightServiceContainerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md",
                "Ling\Light_BMenu\Host\LightBMenuAbstractHost" => "https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost.md",
                "Ling\Light_BMenu\Host\LightBMenuHostInterface" => "https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md",
                "Ling\Chloroform\Form\Chloroform" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md",
                "Ling\Chloroform\Field\FieldInterface" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md",
                "Ling\Chloroform\FormNotification\FormNotificationInterface" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md",
                "Ling\Light\Core\LightAwareInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md",
                "Ling\Light\Controller\LightControllerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md",
                "Ling\Light\Controller\RouteAwareControllerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md",
                "Ling\Light\Core\Light" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md",
                "Ling\Light\Http\HttpResponseInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md",
                "Ling\Light\Controller\LightController" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md",
                "Ling\Light_Flasher\Service\LightFlasher" => "https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher.md",
                "Ling\Light_User\LightWebsiteUser" => "https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md",
                "Ling\Light_MicroPermission\MicroPermissionResolver\BabyYamlMicroPermissionResolver" => "https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver.md",
                "Ling\Light_MicroPermission\MicroPermissionResolver\LightMicroPermissionResolverInterface" => "https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/LightMicroPermissionResolverInterface.md",
                "Ling\Light_Kit\PageConfigurationTransformer\PageConfigurationTransformerInterface" => "https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/PageConfigurationTransformerInterface.md",
                "Ling\Light_Realform\Handler\BaseRealformHandler" => "https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler.md",
                "Ling\Light_Realform\Handler\RealformHandlerInterface" => "https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md",
                "Ling\Light_Realist\ActionHandler\LightRealistAbstractActionHandler" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler.md",
                "Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md",
                "Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md",
                "Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md",
                "Ling\Light_Realist\ListActionHandler\LightServiceContainerInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightServiceContainerInterface.md",
                "Ling\Light_Realist\ListGeneralActionHandler\LightRealistBaseListGeneralActionHandler" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler.md",
                "Ling\Light_Realist\ListGeneralActionHandler\LightRealistListGeneralActionHandlerInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.md",
                "Ling\Light_Realist\ListGeneralActionHandler\LightServiceContainerInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightServiceContainerInterface.md",
                "Ling\Light_Realist\Rendering\BaseRealistRowsRenderer" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md",
                "Ling\Light_Realist\Rendering\RealistRowsRendererInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md",
                "Ling\Light_Initializer\Initializer\LightInitializerInterface" => "https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md",
                "Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget" => "https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget.md",
                "Ling\Kit\PageRenderer\KitPageRendererAwareInterface" => "https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md",
                "Ling\UniversalTemplateEngine\UniversalTemplateEngineInterface" => "https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/doc/api/Ling/UniversalTemplateEngine/UniversalTemplateEngineInterface.md",
                "Ling\Kit_PicassoWidget\Widget\WidgetConfAwarePicassoWidgetInterface" => "https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md",
                "Ling\Kit\PageRenderer\KitPageRendererInterface" => "https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md",
                "Ling\HtmlPageTools\Copilot\HtmlPageCopilot" => "https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md",
                "Ling\Light\Exception\LightRedirectException" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException.md",
                "Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler" => "https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md",
                "Ling\Light_ControllerHub\ControllerHubHandler\LightControllerHubHandlerInterface" => "https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md",
                "Ling\Light_Crud\Exception\LightCrudException" => "https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Exception/LightCrudException.md",
                "Ling\Light_ChloroformExtension\Field\TableList\BaseTableListFieldConfigurationHandler" => "https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/BaseTableListFieldConfigurationHandler.md",
                "Ling\Light_ChloroformExtension\Field\TableList\TableListFieldConfigurationHandlerInterface" => "https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md",
                "Ling\Light_Flasher\Service\LightFlasherService" => "https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService.md",
                "Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler" => "https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md",
                "Ling\Light_Crud\CrudRequestHandler\LightCrudRequestHandlerInterface" => "https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md",
                "Ling\Bootstrap4AdminTable\Renderer\StandardBootstrap4AdminTableRenderer" => "https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/Renderer/StandardBootstrap4AdminTableRenderer.md",
                "Ling\Light_Realist\Rendering\RealistListRendererInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md",
                "Ling\Bootstrap4AdminTable\RendererWidget\RendererWidgetInterface" => "https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/RendererWidgetInterface.md",
                "Ling\Light_Realist\Rendering\RequestIdAwareRendererInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RequestIdAwareRendererInterface.md",
                "Ling\Light_RowLookup\ConfigurationStorage\BaseRowLookupConfigurationStorage" => "https://github.com/lingtalfi/Light_RowLookup/blob/master/doc/api/Ling/Light_RowLookup/ConfigurationStorage/BaseRowLookupConfigurationStorage.md",
                "Ling\Light_RowLookup\ConfigurationStorage\LightRowLookupConfigurationStorageInterface" => "https://github.com/lingtalfi/Light_RowLookup/blob/master/doc/api/Ling/Light_RowLookup/ConfigurationStorage/LightRowLookupConfigurationStorageInterface.md",
            ],
        ];


        if (true === $htmlMode) {
            $options = array_merge($options, [
                /**
                 * Local test mode
                 * -------------------
                 * When I'm on my local machine, I like to preview the doc before it's uploaded to github.com,
                 * so that I can fix everything before sending it to github.
                 *
                 * Therefore, I change my settings a bit, generating an html documentation that I can browse in a browser (rather
                 * than md files).
                 * I also create a dedicated virtual host (in this case serverName=jindoc) in my apache configuration,
                 * so that I can browse the generated doc from there.
                 *
                 * Uncomment the lines below to see my settings for local test mode.
                 */

                "generatedClassBaseDir" => "/komin/jin_site_demo/www-doc/api",
                "generatedClassBaseUrl" => "http://jindoc/api",
                "mode" => "html", // md|html
                "markdownTranslator" => new ParseDownTranslator(),
            ]);
        }


        $builder = new LingGitPhpPlanetDocBuilder();
        $builder->prepare($options);
        /**
         * This will create the generated documentation (aka api in the @kw(Lizard scheme)),
         * and since we've defined a @kw(copy module), it will also copy the whole doc to another location.
         */
        $builder->buildDoc();

        LingTalfiDocToolsHelper::generateCrumbs($builder);
        if ('cli' !== php_sapi_name()) {

            /**
             * This displays the @kw(report).
             */
            $builder->showReport();
        }

    }

}