<?php


namespace DocTools\DocBuilder\Git\PhpPlanet;


use DocTools\CopyModule\CopyModule;
use DocTools\DocBuilder\DocBuilder;
use DocTools\GeneratedDocStyle\DefaultGeneratedDocStyle;
use DocTools\GeneratedDocStyle\GeneratedDocStyleInterface;
use DocTools\Helper\MethodHelper;
use DocTools\Helper\PhpClassHelper;
use DocTools\Info\ClassInfo;
use DocTools\Info\MethodInfo;
use DocTools\Info\PlanetInfo;
use DocTools\Interpreter\DocToolInterpreter;
use DocTools\Interpreter\NotationInterpreterInterface;
use DocTools\Page\PageUtil;
use DocTools\PlanetParser\PlanetParser;
use DocTools\Report\HtmlReport;
use DocTools\Translator\MarkdownTranslatorInterface;
use DocTools\Widget\ClassMethods\ClassMethodsWidget;
use DocTools\Widget\ClassProperties\ClassPropertiesWidget;
use DocTools\Widget\ClassSynopsis\ClassSynopsisWidget;
use DocTools\Widget\PlanetDependenciesSection\PlanetDependenciesSectionWidget;
use DocTools\Widget\PlanetTocList\PlanetTocListWidget;
use UniverseTools\PlanetTool;


/**
 * The LingGitPhpPlanetDocBuilder class.
 * Creates a documentation for a planet, in php.net doc style.
 *
 * A summary page is created for the planet,
 * a page is created for every class,
 * a page is created for every method.
 *
 * The generated structure is the "default" one given in @keyword(the generated documentation styles page).
 *
 *
 * See the @page(LingGitPhpPlanetDocBuilder tutorial) for more details about how this class was built.
 *
 *
 */
class LingGitPhpPlanetDocBuilder extends DocBuilder
{

    /**
     * This property holds the project start date for this instance.
     * The date in mysql format (2019-02-21).
     *
     * @var string
     */
    protected $projectStartDate;

    /**
     * This property holds the planet directory setting.
     * @var string
     */
    protected $planetDir;


    /**
     * This property holds the generated classes base directory setting.
     * @var string
     */
    protected $generatedClassBaseDir;


    /**
     * This property holds the inserts base directory setting.
     * @var string
     */
    protected $insertsBaseDir;


    /**
     * This property holds the @keyword(copy module) source for this instance.
     * @var string|null = null. If null, the copy module won't be used.
     */
    protected $copyModuleSrc;

    /**
     * This property holds the @kw(copy module) destination for this instance.
     * @var string|null = null. Set this to null if you don't use a copy module.
     */
    protected $copyModuleDst;

    /**
     * This property holds the @kw(copy module) options for this instance.
     * @var array
     */
    protected $copyModuleOptions;


    /**
     * This property holds a reference to the planetInfo created during the prepare method.
     * It will be used by the buildDoc method.
     * It's an internal variable and shouldn't be used outside this class.
     *
     * @var PlanetInfo
     */
    private $_planetInfo;


    /**
     * This internal property holds the array of class name and/or className::methodName => url.
     *
     * @var array
     */
    private $_generatedItems2Url;


    /**
     * This internal property holds the DocTools\GeneratedDocStyle\GeneratedDocStyleInterface instance.
     *
     * @var GeneratedDocStyleInterface
     */
    private $_generatedDocStyle;


    /**
     * This internal property holds the markdown translator instance (DocTools\Translator\MarkdownTranslatorInterface)
     * for this instance.
     *
     * If set, the markdown code will be translated.
     * If not set, the markdown code will remain as is.
     *
     * A translator might be useful for testing/debugging purposes.
     * But in prod, the intent of this class is to upload to github which uses markdown.
     *
     * @var MarkdownTranslatorInterface|null
     */
    private $_markdownTranslator;


    /**
     * This internal property holds the notation interpreter (DocTools\Interpreter\NotationInterpreterInterface) for this instance.
     * @var NotationInterpreterInterface
     */
    private $_interpreter;


    /**
     * @implementation
     *
     * @param array $settings
     *
     * Settings (all mandatory except those prefixed with question mark):
     *
     * - planetDir: string. The location of the planet directory to parse.
     * - ?reportIgnore: array. An array of class names to not include in the report if they fail.
     *              This might be useful in case your class extends an external class for instance.
     * - ?reportShowMethodsWithoutReturn: bool=true, whether to display methods without "@return" tag.
     * - ?projectStartDate: date in mysql format (i.e. 2019-02-21). The date when the project was started.
     *              Templates will use it to differentiate between the last update date and the project creation date.
     *
     * - generatedClassBaseDir: string. Where (in the filesystem) to write/create the documentation pages.
     * - insertsBaseDir: string. The inserts base dir location. See @concept(inserts) for more info.
     * - generatedClassBaseUrl: string. The base url for the generated classes.
     *
     * - ?copyModuleSrc: string. The source of the copy module. See @page(copy module) for more info.
     * - ?copyModuleDst: string. The destination of the copy module. See @page(copy module) for more info.
     * - ?copyModuleOptions: array. Options to pass to the copy module. See @page(copy module) for more info.
     *              The available options are:
     *              - filter: array. An array of file name to not copy. This might be useful for files
     *                  which documents the @concept(inline functions), and so you don't want to interpret the
     *                  inline functions in it because it will try to interpret them, but they are part of the documentation
     *                  and shouldn't be interpreted as functions but as plain text.
     *
     *
     * - ?keyWord2UrlMap: array. An array of keyword => (absolute) url to use for resolving keywords.
     *              See the @keyword(keyword inline function page) for more details.
     * - ?externalClass2Url: array. An array of external custom class name => url pointing to the class documentation.
     *              External custom class name means:
     *              - the class is external to the given planetDir
     *              - this is not a php built-in class (like \Exception for instance)
     * - ?markdownTranslator: object. Instance of a @class(DocTools\Translator\MarkdownTranslatorInterface).
     *              If set, all generated files will be converted by this translator.
     * - ?mode: string = md (html|md). Whether to generate md files or html files.
     *              By default, the md format is used (markdown).
     *              If you use html, be sure to also set an appropriate markdownTranslator, which will convert
     *              markdown to html.
     *
     *
     *
     * @throws \Exception
     */
    public function prepare(array $settings = [])
    {

        $this->projectStartDate = $settings['projectStartDate'];
        $this->planetDir = $settings['planetDir'];
        $this->generatedClassBaseDir = $settings['generatedClassBaseDir'];
        $this->insertsBaseDir = $settings['insertsBaseDir'];

        //
        $this->copyModuleSrc = $settings['copyModuleSrc'] ?? null;
        $this->copyModuleDst = $settings['copyModuleDst'] ?? null;
        $this->copyModuleOptions = $settings['copyModuleOptions'] ?? [];
        $reportIgnore = $settings['reportIgnore'] ?? [];
        $reportShowMethodsWithoutReturn = $settings['reportShowMethodsWithoutReturn'];


        $this->_markdownTranslator = $settings['markdownTranslator'] ?? null;


        $generatedClassBaseUrl = $settings['generatedClassBaseUrl'];
        $mode = $settings['mode'] ?? "md";
        $keyWord2UrlMap = $settings['keyWord2UrlMap'];
        $externalCustomClass2Url = $settings['externalClass2Url'] ?? [];


        $generatedDocStyle = new DefaultGeneratedDocStyle();
        $generatedDocStyle->setExtension($mode);
        $this->_generatedDocStyle = $generatedDocStyle;
        $planetName = basename($this->planetDir);


        //--------------------------------------------
        // GeneratedItems2Url
        //--------------------------------------------
        /**
         * Preparing the className2Url and methodName2Url, we prepare them once for all,
         * and then pass them to whatever objects need them.
         */
        $classNames = PlanetTool::getClassNames($this->planetDir);
        $generatedItems2Url = [];
        foreach ($classNames as $className) {
            $generatedItems2Url[$className] = $generatedDocStyle->getClassUrl($planetName, $generatedClassBaseUrl, $className);
            $r = new \ReflectionClass($className);
            foreach ($r->getMethods() as $method) {
                if ($method->getDeclaringClass()->getName() === $className) {
                    $methodName = $className . "::" . $method->getName();
                    $generatedItems2Url[$methodName] = $generatedDocStyle->getMethodUrl($planetName, $generatedClassBaseUrl, $className, $method->getName());
                }
            }
        }
        $generatedItems2Url = array_merge($generatedItems2Url, PhpClassHelper::getClasses2Urls(), $externalCustomClass2Url);


        $this->_generatedItems2Url = $generatedItems2Url;


        //--------------------------------------------
        //
        //--------------------------------------------
        $report = new HtmlReport();
        $report->setIgnore($reportIgnore);
        $report->setOptions([
            "showMethodsWithoutReturn" => $reportShowMethodsWithoutReturn,
        ]);
        $this->setReport($report);


        $interpreter = new DocToolInterpreter();
        $this->_interpreter = $interpreter;
        $interpreter->setGeneratedItemsToUrl($generatedItems2Url);
        $interpreter->setKeyword2UrlMap($keyWord2UrlMap);


        $parser = new PlanetParser();
        $parser->setNotationInterpreter($interpreter);
        $parser->setReport($report);


        $this->_planetInfo = $parser->parse($this->planetDir);
        $this->setReport($report);


    }


    /**
     * @implementation
     */
    public function buildDoc()
    {

        //--------------------------------------------
        // CREATE GENERATED DOC
        //--------------------------------------------
        $planetInfo = $this->_planetInfo;
        $this->buildPlanetPage();
        foreach ($planetInfo->getClasses() as $classInfo) {
            $this->buildClassPage($classInfo);

            foreach ($classInfo->getOwnMethods() as $methodInfo) {
                $this->buildMethodPage($classInfo, $methodInfo);
            }
        }


        //--------------------------------------------
        // COPY DOC
        //--------------------------------------------
        if (null !== $this->copyModuleSrc) {
            $o = new CopyModule();
            $o->copy($this->copyModuleSrc, $this->copyModuleDst, $this->_interpreter, $this->report, $this->copyModuleOptions);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Builds the planet page.
     *
     * @throws \DocTools\Exception\DocToolsException
     */
    private function buildPlanetPage()
    {

        $planetInfo = $this->_planetInfo;
        $tocList = new PlanetTocListWidget();
        $tocList->setOptions([
            "report" => $this->report,
            "generated_items_2_url" => $this->_generatedItems2Url,
            "display_class_description" => true, // default: true
            "class_description_mode" => "mixed", // default: mixed
            "class_description_format" => "The {short} class", // default: The {short} class
            "display_methods" => true, // default: true
            "methods_filter" => ["public"], // default: public
            "display_method_description" => true, // default: true
            "method_description_mode" => "mixed", // default: mixed
            "method_description_format" => 'The {method} method', // default: The {method} method
        ]);
        $tocList->setPlanetInfo($planetInfo);

        $depSection = new PlanetDependenciesSectionWidget();
        $depSection->setPlanetInfo($planetInfo);

        $planetName = $planetInfo->getName();


        $tplPlanet = __DIR__ . "/templates/tpl-planet.md.php";
        $pageUtil = new PageUtil();
        $pageUtil->setTranslator($this->_markdownTranslator);
        $pageUtil->setRootDir($this->generatedClassBaseDir);
        $pageUtil->setInsertsRootDir($this->insertsBaseDir);
        $planetPage = $this->_generatedDocStyle->getPlanetPageRelativePath($planetName);
        $pageUtil->createPage($planetPage, $tplPlanet, [
            "planetName" => $planetInfo->getName(),
            "tocList" => $tocList,
            "dependenciesSection" => $depSection,
            "projectStartDate" => $this->projectStartDate,
        ]);

    }


    /**
     * Builds a class page.
     *
     * @param ClassInfo $classInfo
     * @throws \DocTools\Exception\DocToolsException
     */
    private function buildClassPage(ClassInfo $classInfo)
    {


        $classSynopsisWidget = new ClassSynopsisWidget();
        $classSynopsisWidget->setReport($this->report);
        $classSynopsisWidget->setClassInfo($classInfo);
        $classSynopsisWidget->setGeneratedItems2Url($this->_generatedItems2Url);


        $classPropertiesWidget = new ClassPropertiesWidget();
        $classPropertiesWidget->setClassInfo($classInfo);


        $classMethodsWidget = new ClassMethodsWidget();
        $classMethodsWidget->setClassInfo($classInfo);
        $classMethodsWidget->setReport($this->report);
        $classMethodsWidget->setGeneratedItemsToUrl($this->_generatedItems2Url);


        $tplClass = __DIR__ . "/templates/tpl-class.md.php.noformat";
        $pageUtil = new PageUtil();
        $pageUtil->setTranslator($this->_markdownTranslator);
        $pageUtil->setRootDir($this->generatedClassBaseDir);
        $pageUtil->setInsertsRootDir($this->insertsBaseDir);
        $pageUtil->createPage($this->_generatedDocStyle->getClassPageRelativePath($this->_planetInfo->getName(), $classInfo->getName()), $tplClass, [
            "classInfo" => $classInfo,
            "classSynopsisWidget" => $classSynopsisWidget,
            "classPropertiesWidget" => $classPropertiesWidget,
            "classMethodsWidget" => $classMethodsWidget,
            "projectStartDate" => $this->projectStartDate,
        ]);
    }


    /**
     * Builds a method page.
     *
     * @param ClassInfo $classInfo
     * @param MethodInfo $methodInfo
     * @throws \DocTools\Exception\DocToolsException
     * @throws \ReflectionException
     */
    private function buildMethodPage(ClassInfo $classInfo, MethodInfo $methodInfo)
    {


        $filePath = $this->_generatedDocStyle->getMethodPageRelativePath($this->_planetInfo->getName(), $classInfo->getName(), $methodInfo->getName());


        $methodSignature = MethodHelper::getMethodSignature($methodInfo, $this->_generatedItems2Url, [
            [
                "showDeclaringClass" => true,
            ],
            $this->report
        ]);

        $methodReturnType = MethodHelper::getMethodReturnType($methodInfo, $this->_generatedItems2Url, $this->report);


        $classLink = $classInfo->getShortName();
        $className = $classInfo->getName();
        if (array_key_exists($className, $this->_generatedItems2Url)) {
            $classLink = '[' . $classLink . '](' . $this->_generatedItems2Url[$className] . ')';
        } else {
            /**
             * We could report the error... but the class should always exist.
             */
        }


        $tplMethod = __DIR__ . "/templates/tpl-method.md.php.noformat";
        $pageUtil = new PageUtil();
        $pageUtil->setTranslator($this->_markdownTranslator);
        $pageUtil->setRootDir($this->generatedClassBaseDir);
        $pageUtil->setInsertsRootDir($this->insertsBaseDir);
        $pageUtil->createPage($filePath, $tplMethod, [
            "methodInfo" => $methodInfo,
            "methodSignature" => $methodSignature,
            "methodReturnType" => $methodReturnType,
            "classLink" => $classLink,
            "projectStartDate" => $this->projectStartDate,
        ]);
    }


}