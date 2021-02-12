<?php


namespace Ling\LingTalfi\DocBuilder\Uni2;


use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Exception\DocBuilderException;
use Ling\DocTools\Translator\ParseDownTranslator;
use Ling\LingTalfi\DocTools\LingTalfiDocToolsHelper;

/**
 * The Uni2DocBuilder class.
 */
class Uni2DocBuilder
{


    /**
     * Launch this function to generate the documentation for the Uni2 planet.
     * (based on the LingGitPhpPlanetDocBuilder doc builder.
     *
     * If htmlMode is true (the default),
     * this method will generate all files in md format in the following directory:
     *
     * - /myphp/universe/Uni2/doc
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
    public static function buildDoc($htmlMode = true)
    {

        //--------------------------------------------
        // DOC TOOLS: CREATE A DOCUMENTATION FOR A PHP PLANET FOR GIT (MARKDOWN)
        //--------------------------------------------

        $planetDir = "/myphp/universe/Ling/Uni2";
        $gitRepoUrl = "https://github.com/lingtalfi/Uni2";
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
                "Ling\CliTools\Program\Application",

            ],
            /**
             * Your project start date.
             * I like to write down when I start a project, along with when the project was last updated.
             * The date when the project was last updated can be generated automatically, but the project
             * start date doesn't change.
             */
            "projectStartDate" => "2019-03-12",

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
                "Application" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md",
                "command-line" => "https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md",
                "command line option" => "https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md",
                "command line options" => "https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md",
                "bdot notation" => "https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md",
                "BabyYaml" => "https://github.com/lingtalfi/BabyYaml",
                "babyYaml" => "https://github.com/lingtalfi/BabyYaml",
                "the universe dependency system page" => "https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md",
                "universe dependency system page" => "https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md",
                "output object" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md",
                //
                "configuration command" => "$api/Ling/Uni2/Command/ConfCommand.md",
                "import-map" => "$api/Ling/Uni2/Command/ImportMapCommand.md",
                "ImportCommand" => "$api/Ling/Uni2/Command/ImportCommand.md",
                "import command" => "$api/Ling/Uni2/Command/ImportCommand.md",
                "StoreCommand" => "$api/Ling/Uni2/Command/StoreCommand.md",
                "store command" => "$api/Ling/Uni2/Command/StoreCommand.md",
                "ReimportCommand" => "$api/Ling/Uni2/Command/ReimportCommand.md",
                "reimportCommand" => "$api/Ling/Uni2/Command/ReimportCommand.md",
                "reimport command" => "$api/Ling/Uni2/Command/ReimportCommand.md",
                "reimport-map" => "$api/Ling/Uni2/Command/ReimportMapCommand.md",
                "ReimportMapCommand" => "$api/Ling/Uni2/Command/ReimportMapCommand.md",
                "store-map" => "$api/Ling/Uni2/Command/StoreMapCommand.md",
                "boot process" => "$api/Ling/Uni2/Application/UniToolApplication/bootUniverse.md",
                "uni-tool application" => "$api/Ling/Uni2/Application/UniToolApplication.md",
                "importItem method" => "$api/Ling/Uni2/Util/ImportUtil/importItem.md",
                //
                "the local server" => "$git/README.md#the-local-server",
                "Uni2 configuration" => "$git/README.md#the-uni2-configuration",
                "uni-tool configuration" => "$git/README.md#the-uni2-configuration",
                "dependency master page" => "$git/README.md#the-dependency-master-file",
                "the dependency master page" => "$git/README.md#the-dependency-master-file",
                "the dependency-master file" => "$git/README.md#the-dependency-master-file",
                "dependency-master file" => "$git/README.md#the-dependency-master-file",
                "dependency master file" => "$git/README.md#the-dependency-master-file",
                "the local dependency master" => "$git/README.md#the-dependency-master-file",
                "uni-tool dependency master file" => "$git/README.md#the-dependency-master-file",
                "the dependency master file" => "$git/README.md#the-dependency-master-file",
                "local dependency master file" => "$git/README.md#the-dependency-master-file",
                "the dependency master file page" => "$git/README.md#the-dependency-master-file",
                "uni-tool upgrade-system" => "$git/README.md#the-upgrade-system",
                "uni-tool upgrade system document" => "$git/README.md#the-upgrade-system",
                "meta-info of a planet" => "$git/README.md#meta-infobyml",
                "the meta info file" => "$git/README.md#meta-infobyml",
                "post install directives" => "$git/README.md#dependenciesbyml",
                "post install page" => "$git/README.md#dependencies-byml",
                "post install directives page" => "$git/README.md#dependenciesbyml",
                "importMode definition" => "$git/doc/pages/import-mode.md",
                "\"import\" import mode" => "$git/doc/pages/import-mode.md",
                "\"store\" import mode" => "$git/doc/pages/import-mode.md",
                "Uni2 documentation" => "https://github.com/lingtalfi/Uni2/blob/master/README.md",
                "dependency system page" => "https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md",
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
                "Ling\UniverseTools\Exception\UniverseToolsException" => "https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md",
                "Ling\CliTools\Program\Application" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md",
                "Ling\CliTools\Program\ProgramInterface" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md",
                "Ling\UniversalLogger\UniversalLoggerInterface" => "https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php",
                "Ling\CliTools\Command\CommandInterface" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md",
                "Ling\Octopus\ServiceContainer\OctopusServiceContainerInterface" => "https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php",
                "Ling\CliTools\Helper\VirginiaMessageHelper" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper.md",
                //
                "Ling\CliTools\Program\Application::registerCommand" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md",
                "Ling\CliTools\Program\AbstractProgram::setLogger" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md",
                "Ling\CliTools\Program\AbstractProgram::setLoggerChannel" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md",
                "Ling\CliTools\Program\AbstractProgram::setErrorIsVerbose" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md",
                "Ling\CliTools\Program\AbstractProgram::setUseExitStatus" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md",
                "Ling\CliTools\Command\CommandInterface::run" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface/run.md",
                "Ling\CliTools\Program\Application::runProgram" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::success" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/success.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::info" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/info.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::warning" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/warning.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::command" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/command.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::error" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/error.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::discover" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/discover.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::i" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/i.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::j" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/j.md",
                "Ling\CliTools\Helper\VirginiaMessageHelper::s" => "https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/s.md",
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