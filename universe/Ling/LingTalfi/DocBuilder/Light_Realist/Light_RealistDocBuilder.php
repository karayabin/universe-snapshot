<?php


namespace Ling\LingTalfi\DocBuilder\Light_Realist;


use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Exception\DocBuilderException;
use Ling\DocTools\Translator\ParseDownTranslator;
use Ling\LingTalfi\DocTools\LingTalfiDocToolsHelper;


/**
 * The Light_RealistDocBuilder class.
 */
class Light_RealistDocBuilder
{


    /**
     * Launch this function to generate the documentation for the Light_Realist planet.
     * (based on the LingGitPhpPlanetDocBuilder doc builder.
     *
     * If htmlMode is true (the default),
     * this method will generate all files in md format in the following directory:
     *
     * - /myphp/universe/Light_Realist/doc
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
        $planetDir = "/myphp/universe/Ling/Light_Realist";
        $gitRepoUrl = "https://github.com/lingtalfi/Light_Realist";
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
//                "Ling\DocTools\Translator\ParseDownTranslator",
                "Ling\Light\Controller\LightController",
                "Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler",
            ],
            /**
             * Your project start date.
             * I like to write down when I start a project, along with when the project was last updated.
             * The date when the project was last updated can be generated automatically, but the project
             * start date doesn't change.
             */
            "projectStartDate" => "2019-08-12",

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
                "realist-tag-transfer protocol" => $doc . '/pages/realist-tag-transfer-protocol.md',
                "openAdminTable protocol" => $doc . '/pages/open-admin-table-protocol.md',
                "open admin table protocol" => $doc . '/pages/open-admin-table-protocol.md',
                "the realist conception notes" => $doc . '/pages/realist-conception-notes.md',
                "open admin table helper implementation notes" => $doc . '/pages/open-admin-table-helper-implementation-notes.md',
                "realist conception notes" => $doc . '/pages/realist-conception-notes.md',
                "LightReverseRouterService" => 'https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService.md',
                "responsive table helper tool" => 'https://github.com/lingtalfi/JResponsiveTableHelper',
                "duelist page" => $doc . '/pages/duelist.md',
                "the realist tag transfer protocol" => $doc . '/pages/realist-tag-transfer-protocol.md',
                "ajax communication protocol" => 'https://github.com/lingtalfi/AjaxCommunicationProtocol',
                "list action handler conception notes" => $doc . "/pages/list-action-handler-conception-notes.md",
                "toolbar item" => $doc . "/pages/list-action-handler-conception-notes.md#the-toolbar-item",
                "toolbar items" => $doc . "/pages/list-action-handler-conception-notes.md#the-toolbar-item",
                "dynamic injection handler" => $doc . "/pages/duelist.md#dynamic-injection",
                "request id" => $doc . "/pages/request-id.md",
                "list general actions" => $doc . '/pages/realist-conception-notes.md#list-general-actions',
                "list general action item" => $doc . '/pages/realist-conception-notes.md#list-general-actions',
                "generic action item" => $doc . '/pages/generic-action-item.md',
                "permission" => "https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md",
                "micro permissions" => "https://github.com/lingtalfi/Light_MicroPermission",
                "generic action items" => "https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/generic-action-item.md",
                "duelist" => $doc . '/pages/duelist.md',
                "controller hub service" => 'https://github.com/lingtalfi/Light_ControllerHub',
                "ajax handler service" => 'https://github.com/lingtalfi/Light_AjaxHandler',
                "Light_CsrfSession plugin" => 'https://github.com/lingtalfi/Light_CsrfSession',
                "alcp response" => 'https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md',
                "late registration concept" => 'https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md',
                "late registration" => 'https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md',
                "duelist developer variables concept" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/duelist.md#providing-developer-variables',
                "realist request declaration page" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md',
                "request declaration document" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md',
                "details about the list actions" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md',
                "realist list-actions document" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md',
                "realist list actions" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md',
                "list item renderer documentation" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-item-renderer.md',
                "list item renderer page" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-item-renderer.md',
                "dynamic properties of the list item renderer page" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-item-renderer.md#dynamic-properties',
                "realist action-items document" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md',
                "realist action items document" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md',
                "realist generic action item section" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md#generic-action-item',
                "realist action handler section" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-action-handler',
                "open tags" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-tags.md',
                "open registration system of Ling.Light_Realist" => 'https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md#the-open-registration-system',

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
//                "Ling\UniversalLogger\UniversalLoggerInterface" => "https://github.com/lingtalfi/UniversalLogger",
                "Ling\Light\Controller\LightController" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md',
                "Ling\Light\Core\LightAwareInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md',
                "Ling\Light\Controller\LightControllerInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md',
                "Ling\Light\Core\Light" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md',
                "Ling\Light\Http\HttpResponseInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md',
                "Ling\Light\ServiceContainer\LightServiceContainerInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md',
                "Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil" => 'https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md',
                "Ling\Light\ServiceContainer\LightServiceContainerAwareInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md',
                "Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler" => 'https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md',
                "Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface" => 'https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md',
                "Ling\Light_Realist\ListActionHandler\LightServiceContainerInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md',
                "Ling\Light_Realist\ListGeneralActionHandler\LightServiceContainerInterface" => 'https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md',
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