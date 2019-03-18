<?php


namespace Ling\LingTalfi\DocBuilder\DocTools;


use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Exception\DocBuilderException;
use Ling\DocTools\Translator\ParseDownTranslator;

/**
 * The DocToolsDocBuilder class.
 */
class DocToolsDocBuilder
{


    /**
     * Launch this function to generate the documentation for the DocTools planet.
     * (based on the LingGitPhpPlanetDocBuilder doc builder.
     *
     * If htmlMode is false (the default),
     * this method will generate all files in md format in the following directory:
     *
     * - /myphp/universe/DocTools/doc
     *
     * Including a README.md file, that you should manually put at the root of the DocTools planet directory.
     * You can then push to github.
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
     *
     *
     *
     *
     *
     * @param bool $htmlMode
     * @throws DocBuilderException
     */
    public static function buildDoc($htmlMode = false)
    {

        //--------------------------------------------
        // DOC TOOLS: CREATE A DOCUMENTATION FOR A PHP PLANET FOR GIT (MARKDOWN)
        //--------------------------------------------

        $planetDir = "/myphp/universe/Ling/DocTools";
        $git = "https://github.com/lingtalfi/DocTools/blob/master";
        $doc = "$git/doc";
        $api = $doc . "/api";


        $options = [
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
                "Ling\DocTools\Translator\ParseDownTranslator",
            ],
            /**
             * Your project start date.
             * I like to write down when I start a project, along with when the project was last updated.
             * The date when the project was last updated can be generated automatically, but the project
             * start date doesn't change.
             */
            "projectStartDate" => "2019-02-21",

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
                /**
                 * If set, will also move the README.md at the root of copyModuleDst (if any) to the given path
                 */
                "moveReadMeTo" => $planetDir . "/README.md",
                "filter" => [
                    "doctool-markup-language.md",
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
                "git" => $git,
                //--------------------------------------------
                // PAGES
                //--------------------------------------------
                "inserts" => $git . '/README.md#inserts',
                "Lizard scheme" => $git . '/README.md#lizard-scheme',
                "generatedItems2Url" => $git . '/README.md#generateditems2url',
                "doctool_language" => $doc . '/pages/doctool-markup-language.md',
                "docTool markup language" => $doc . '/pages/doctool-markup-language.md',
                "docTool markup language page" => $doc . '/pages/doctool-markup-language.md',
                "the docTool markup language" => $doc . '/pages/doctool-markup-language.md',
                "inline tags" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "inline functions" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "keyword inline function" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "class inline function" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "inline function" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "the inline functions page" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "docTool inline functions" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "inline-level tags" => $doc . '/pages/doctool-markup-language.md#inline-functions',
                "block-level tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
                "expandable block-level tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
                "block-level tags" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
                "\"@implementation\" tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
                "\"@overrides\" tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
                "the generated documentation styles page" => $doc . '/pages/generated-documentation-styles.md',
                "generated documentation styles" => $doc . '/pages/generated-documentation-styles.md',
                "LingGitPhpPlanetDocBuilder tutorial" => $doc . '/pages/tutorial-linggitphpplanetdocbuilder.md',
                //--------------------------------------------
                // API
                //--------------------------------------------
                "api" => $api . '/Ling/DocTools.md',
                "ClassInfo" => $api . '/Ling/DocTools/Info/ClassInfo.md',
                "CommentInfo" => $api . '/Ling/DocTools/Info/CommentInfo.md',
                "main text" => $api . '/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure',
                "comment main text" => $api . '/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure',
                "commentInfo" => $api . '/Ling/DocTools/Info/CommentInfo.md',
                "PropertyInfo" => $api . '/Ling/DocTools/Info/PropertyInfo.md',
                "MethodInfo" => $api . '/Ling/DocTools/Info/MethodInfo.md',
                "PlanetInfo" => $api . '/Ling/DocTools/Info/PlanetInfo.md',
                "LingGitPhpPlanetDocBuilder" => $api . '/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md',
                "copy module" => $api . '/Ling/DocTools/CopyModule/CopyModuleInterface.md',
                "CopyModule" => $api . '/Ling/DocTools/CopyModule/CopyModuleInterface.md',
                "DocBuilder" => $api . '/Ling/DocTools/DocBuilder/DocBuilder.md',
                "ClassParserInterface" => $api . '/Ling/DocTools/ClassParser/ClassParserInterface.md',
                "ClassParser" => $api . '/Ling/DocTools/ClassParser/ClassParser.md',
                "PlanetParser" => $api . '/Ling/DocTools/PlanetParser/PlanetParser.md',
                "DocToolInterpreter" => $api . '/Ling/DocTools/Interpreter/DocToolInterpreter.md',
                "PlanetTocListWidget" => $api . '/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget.md',
                "ParseDownTranslator class page" => $api . '/Ling/DocTools/Translator/ParseDownTranslator.md',
                "report" => $api . '/Ling/DocTools/Report/ReportInterface.md',
                "ReportInterface" => $api . '/Ling/DocTools/Report/ReportInterface.md',
                "HtmlReport" => $api . '/Ling/DocTools/Report/HtmlReport.md',
                "parser" => $api . '/Ling/DocTools/GenericParser/GenericParserInterface.md',
                "planet parser" => $api . '/Ling/DocTools/PlanetParser/PlanetParser.md',
                "class parser" => $api . '/Ling/DocTools/ClassParser/ClassParser.md',
                "GeneratedDocStyleInterface" => $api . '/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md',
                "PageUtil" => $api . '/Ling/DocTools/Page/PageUtil.md',
                "wizard object" => $api . '/Ling/DocTools/TemplateWizard/TemplateWizard.md',
                "TemplateWizard" => $api . '/Ling/DocTools/TemplateWizard/TemplateWizard.md',
                "ThrownExceptionInfo" => $api . '/Ling/DocTools/Info/ThrownExceptionInfo.md',
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
                "Ling\ParseDown\Parsedown" => "https://github.com/lingtalfi/ParseDown",
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

        if ('cli' !== php_sapi_name()) {

            /**
             * This displays the @kw(report).
             */
            $builder->showReport();
        }
    }

}