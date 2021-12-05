<?php


namespace Ling\LingTalfi\DocBuilder\Light_DeveloperWizard;


use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Exception\DocBuilderException;
use Ling\DocTools\Translator\ParseDownTranslator;
use Ling\LingTalfi\DocTools\LingTalfiDocToolsHelper;


/**
 * The Light_DeveloperWizardDocBuilder class.
 */
class Light_DeveloperWizardDocBuilder
{


    /**
     * Launch this function to generate the documentation for the Light_DeveloperWizard planet.
     * (based on the LingGitPhpPlanetDocBuilder doc builder.
     *
     * If htmlMode is true (the default),
     * this method will generate all files in md format in the following directory:
     *
     * - /myphp/universe/Light_DeveloperWizard/doc
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
        $planetDir = "/myphp/universe/Ling/Light_DeveloperWizard";
        $gitRepoUrl = "https://github.com/lingtalfi/Light_DeveloperWizard";
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
                "Ling\WebWizardTools\Process\WebWizardToolsProcess",
                "Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard",
                "Ling\Light_Cli\CliTools\Program\LightCliBaseApplication",
                "Ling\CliTools\Program\Application",
                "Ling\CliTools\Program\AbstractProgram",


            ],
            /**
             * Your project start date.
             * I like to write down when I start a project, along with when the project was last updated.
             * The date when the project was last updated can be generated automatically, but the project
             * start date doesn't change.
             */
            "projectStartDate" => "2020-06-30",

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
                "Light_DeveloperWizard conception notes" => $doc . '/pages/conception-notes.md',
                "ling breeze generator 2 documentation" => 'https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md',
                "WebWizardTools conception notes" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/pages/conception-notes.md",
                "planet identifier" => "https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#planet-identifier",
                "tight planet name" => "https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name",
                "basic service" => $doc . "/pages/conventions.md#basic-service",
                'class cooker\'s addProperty documentation' => 'https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addProperty.md',
                "standard service config file" => 'https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#standard-service-configuration-file',
                "Light documentation" => 'https://github.com/lingtalfi/Light',
                "basic service convention" => 'https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service',
                "the basic service config file" => 'https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service',
                "Light_Train conception notes" => 'https://github.com/lingtalfi/Light', // this is a fake link in the documentation somewhere
                "planetIds" => 'https://github.com/karayabin/universe-snapshot#the-planet-identifier',
                "Light_Kit_Admin_Generator" => 'https://github.com/lingtalfi/Light_Kit_Admin_Generator',
                "section comment" => 'https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md',
                "section comments" => 'https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md',
                "the Standard service configuration file" => 'https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#standard-service-configuration-file',
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
                "Ling\Light\ServiceContainer\LightServiceContainerInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md",
                "Ling\WebWizardTools\Process\WebWizardToolsProcess" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Process/WebWizardToolsProcess.md",
                "Ling\WebWizardTools\Report\WebWizardToolsReport" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Report/WebWizardToolsReport.md",
                "Ling\WebWizardTools\Controls\WebWizardToolsControl" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsControl.md",
                "Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsWebWizard.md",
                "Ling\Light_DeveloperWizard\Util\serviceManagerUtil" => "https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/serviceManagerUtil.md",
                "Ling\Light_DeveloperWizard\Service\ServiceManagerUtil" => "https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Service/ServiceManagerUtil.md",
                "Ling\Light\ServiceContainer\LightServiceContainerAwareInterface" => "https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md",
                "Ling\WebWizardTools\WebWizard\WebWizardToolsDefaultWebWizard" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/WebWizardToolsDefaultWebWizard.md",
                "Ling\WebWizardTools\Controls\WebWizardToolsOptionList" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/Controls/WebWizardToolsOptionList.md",
                "Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsWebWizardRendererInterface" => "https://github.com/lingtalfi/WebWizardTools/blob/master/doc/api/Ling/WebWizardTools/WebWizard/Renderer/WebWizardToolsWebWizardRendererInterface.md",
                "Ling\ClassCooker\ClassCooker" => "https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md",
                "Ling\ClassCooker\FryingPan\FryingPan" => "https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md",
                "Ling\Light_Cli\CliTools\Program\LightCliCommandInterface" => "https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md",
                "Ling\CliTools\Command\CommandInterface" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md",
                "Ling\CliTools\Output\OutputInterface" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md",
                "Ling\Light_Cli\CliTools\Program\LightCliBaseApplication" => "https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliBaseApplication.md",
                "Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface" => "https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md",
                "Ling\CliTools\Program\ProgramInterface" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md",
                "Ling\UniversalLogger\UniversalLoggerInterface" => "https://github.com/lingtalfi/UniversalLogger/blob/master/doc/api/Ling/UniversalLogger/UniversalLoggerInterface.md",


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