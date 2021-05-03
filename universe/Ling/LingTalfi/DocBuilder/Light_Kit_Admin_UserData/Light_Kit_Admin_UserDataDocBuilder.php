<?php


namespace Ling\LingTalfi\DocBuilder\Light_Kit_Admin_UserData;


use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Exception\DocBuilderException;
use Ling\DocTools\Translator\ParseDownTranslator;
use Ling\LingTalfi\DocTools\LingTalfiDocToolsHelper;


/**
 * The Light_Kit_Admin_UserDataDocBuilder class.
 */
class Light_Kit_Admin_UserDataDocBuilder
{


    /**
     * Launch this function to generate the documentation for the Light_Kit_Admin_UserData planet.
     * (based on the LingGitPhpPlanetDocBuilder doc builder.
     *
     * If htmlMode is true (the default),
     * this method will generate all files in md format in the following directory:
     *
     * - /myphp/universe/Light_Kit_Admin_UserData/doc
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
        $planetDir = "/myphp/universe/Ling/Light_Kit_Admin_UserData";
        $gitRepoUrl = "https://github.com/lingtalfi/Light_Kit_Admin_UserData";
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
                "Ling\Light_Kit_Admin\Controller\AdminPageController",
                "Ling\Light_Kit_Admin\Controller\LightKitAdminController",
                "Ling\Light\Controller\LightController",
                "Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler",
                "Ling\Light_Kit_Admin\LightKitAdminPlugin\BaseLightKitAdminPlugin",
                "Ling\Light_Kit_Admin\Controller\RealAdminPageController",
                "Ling\Light_Kit_Admin\Light_PluginInstaller\LightKitAdminBasePortPluginInstallerWithDatabase",
                "Ling\Light_PluginInstaller\PluginInstaller\LightBasePluginInstaller",
                "Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget",
                "Ling\Kit_PicassoWidget\Widget\WidgetConfAwarePicassoWidget",
                "Ling\Kit_PicassoWidget\Widget\PicassoWidget",
                "Ling\ZephyrTemplateEngine\ZephyrTemplateEngine",
                "Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller",
                "Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller",

            ],
            /**
             * Your project start date.
             * I like to write down when I start a project, along with when the project was last updated.
             * The date when the project was last updated can be generated automatically, but the project
             * start date doesn't change.
             */
            "projectStartDate" => "2020-02-28",

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
                "the route page" => 'https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md',
                "LightRealformRoutineOne instance" => 'https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineOne.md',
                "kit service" => 'https://github.com/lingtalfi/Light_Kit',
                "the flasher service" => "https://github.com/lingtalfi/Light_Flasher",
                "babyYaml" => "https://github.com/lingtalfi/BabyYaml",
                "Light_PluginInstaller conception notes" => "https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md",
                "late registration concept" => "https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md",
                "bmenu conception notes" => "https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md",
                "the realist plugin" => "https://github.com/lingtalfi/Light_Realist/",
                "the late service registration design" => "https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md",
                "light standard permissions" => "https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md",
                "widget configuration array" => "https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array",
                "the LightKitPageRenderer->renderPage method" => "https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md",
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
                "Ling\Light\Exception\LightRedirectException" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException.md",
                "Ling\Light_Kit_Admin\Exception\LightKitAdminException" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Exception/LightKitAdminException.md",
                "Ling\Light_Kit_Admin\Controller\AdminPageController" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController.md",
                "Ling\Light\Core\LightAwareInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md",
                "Ling\Light\Controller\LightControllerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md",
                "Ling\Light\Controller\RouteAwareControllerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md",
                "Ling\Light\Core\Light" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md",
                "Ling\Light\Http\HttpResponseInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md",
                "Ling\Chloroform\Form\Chloroform" => "https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md",
                "Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler" => "https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md",
                "Ling\Light_ControllerHub\ControllerHubHandler\LightControllerHubHandlerInterface" => "https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md",
                "Ling\Light\ServiceContainer\LightServiceContainerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md",
                "Ling\Light_Kit_Admin\LightKitAdminPlugin\BaseLightKitAdminPlugin" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin.md",
                "Ling\Light_Kit_Admin\LightKitAdminPlugin\LightKitAdminPluginInterface" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/LightKitAdminPluginInterface.md",
                "Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface" => "https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md",
                "Ling\Light_BMenu\DirectInjection\BMenuDirectInjectorInterface" => "https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface.md",
                "Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface" => "https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md",
                "Ling\Light_Realist\Service\LightRealistCustomServiceInterface" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md",
                "Ling\Light_Realform\Service\LightRealformLateServiceRegistrationInterface" => "https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformLateServiceRegistrationInterface.md",
                "Ling\Light_Kit_Admin\Controller\RealAdminPageController" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/RealAdminPageController.md",
                "Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorHooksInterface" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface.md",
                "Ling\Light\ServiceContainer\LightServiceContainerAwareInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md",
                "Ling\Light_Kit_Admin\Light_PluginInstaller\LightKitAdminBasePortPluginInstallerWithDatabase" => "https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase.md",
                "Ling\Light_PluginInstaller\TableScope\TableScopeAwareInterface" => "https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md",
                "Ling\Kit_PicassoWidget\Exception\PicassoWidgetException" => "https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Exception/PicassoWidgetException.md",
                "Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget" => "https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget.md",
                "Ling\Kit\PageRenderer\KitPageRendererAwareInterface" => "https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md",
                "Ling\UniversalTemplateEngine\UniversalTemplateEngineInterface" => "https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/doc/api/Ling/UniversalTemplateEngine/UniversalTemplateEngineInterface.md",
                "Ling\Kit_PicassoWidget\Widget\WidgetConfAwarePicassoWidgetInterface" => "https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md",
                "Ling\Kit\PageRenderer\KitPageRendererInterface" => "https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md",
                "Ling\HtmlPageTools\Copilot\HtmlPageCopilot" => "https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md",
                "Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller" => "https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md",
                "Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInterface" => "https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md",

            ],
            "ignoreFilesStartingWith" => [
//                "PHPExcel/",
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