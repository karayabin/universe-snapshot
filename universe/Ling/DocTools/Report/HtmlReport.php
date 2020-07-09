<?php


namespace Ling\DocTools\Report;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\ArrayToTable\ArrayToTableUtil;
use Ling\ZeusTemplateEngine\ZeusTemplateEngine;

/**
 * The HtmlReport class is an html implementation of the ReportInterface.
 * It produces an html string which looks like this:
 *
 * ![report](http://lingtalfi.com/img/universe/DocTools/doctools-report.png)
 *
 *
 */
class HtmlReport extends AbstractReport
{


    /**
     * This property holds the path to the Zeus template to use to render the report.
     *
     *
     * @var string $template
     */
    protected $template;

    /**
     * This property holds the options for this instance.
     * The following options are available:
     * - showMethodsWithoutReturn: bool=true, whether to show the methods without return
     *
     *
     * @var array
     *
     */
    protected $options;


    /**
     * Builds the HtmlReport instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = __DIR__ . "/templates/flex-model.php";
        $this->options = [];
    }

    /**
     * Sets the template.
     *
     * @param string $template
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Builds and returns the rendered report as an html string.
     *
     * @return string
     */
    public function __toString()
    {

        $hasErrors = false; // to show green bar if no error
        $showMethodsWithoutReturn = $this->options['showMethodsWithoutReturn'] ?? true;


        //--------------------------------------------
        // TODO TEXTS
        //--------------------------------------------
        $nbTodoTexts = count($this->todoTexts);

        $todoTextsMenuItems = [
            'todo-texts' => ["Todo texts", $nbTodoTexts, true],
        ];
        $todoTextWidget = $this->getTableSection(
            "Todo texts",
            "todo-texts",
            ["Text", "Location", 'Context'],
            $this->todoTexts
        );


        //--------------------------------------------
        // MISSING COMMENTS
        //--------------------------------------------
        $nbClassesWithoutComment = count($this->classesWithoutComment);
        $nbMethodsWithoutComment = count($this->methodsWithoutComment);
        $nbPropertiesWithoutComment = count($this->propertiesWithoutComment);
        if (
            $nbClassesWithoutComment > 0 ||
            $nbMethodsWithoutComment > 0 ||
            $nbPropertiesWithoutComment > 0
        ) {
            $hasErrors = true;
        }


        $missingCommentsMenuItems = [
            'classes-without-comments' => ["Classes without comment", $nbClassesWithoutComment, true],
            'methods-without-comments' => ["Methods without comment", $nbMethodsWithoutComment, true],
            'properties-without-comments' => ["Properties without comment", $nbPropertiesWithoutComment, true],
        ];


        $classesWithoutCommentWidget = $this->getTableSection(
            "Classes without comment",
            "classes-without-comments",
            ['Class name'],
            $this->classesWithoutComment
        );

        $methodsWithoutCommentWidget = $this->getTableSection(
            "Methods without comment",
            "methods-without-comments",
            ["Method", "Visibility", 'Context'],
            $this->methodsWithoutComment
        );

        $propertiesWithoutCommentWidget = $this->getTableSection(
            "Properties without comment",
            "properties-without-comments",
            ["Property", "Visibility", 'Context'],
            $this->propertiesWithoutComment
        );

        //--------------------------------------------
        // MISSING TAGS
        //--------------------------------------------
        $nbMethodsWithoutReturnTag = count($this->methodsWithoutReturnTag);
        $nbPropertiesWithoutVarTag = count($this->propertiesWithoutVarTag);
        $nbParamsWithoutParamTag = count($this->parametersWithoutParamTag);
        if (
            $nbPropertiesWithoutVarTag > 0 ||
            $nbParamsWithoutParamTag > 0
        ) {
            $hasErrors = true;
        }


        $missingTagsMenuItems = [
            'properties-without-var-tag' => ["Properties without @var", $nbPropertiesWithoutVarTag, true],
            'params-without-param-tag' => ["Parameters without @param", $nbParamsWithoutParamTag, true],
        ];

        if (true === $showMethodsWithoutReturn) {
            $missingTagsMenuItems['methods-without-return-tag'] = ["Methods without @return", $nbMethodsWithoutReturnTag, true];
        }


        $methodsWithoutReturnTagWidget = $this->getTableSection(
            "Methods without @return",
            "methods-without-return-tag",
            ["Method", "Context"],
            $this->methodsWithoutReturnTag
        );


        $propertiesWithoutVarTagWidget = $this->getTableSection(
            "Properties without @var",
            "properties-without-var-tag",
            ["Properties", "Context"],
            $this->propertiesWithoutVarTag
        );

        $parametersWithoutParamTagWidget = $this->getTableSection(
            "Parameters without @param",
            "params-without-param-tag",
            ["Parameter", "Method", "Context"],
            $this->parametersWithoutParamTag
        );


        //--------------------------------------------
        // EMPTY MAIN TEXTS
        //--------------------------------------------
        $nbClassesWithEmptyMainText = count($this->classesWithEmptyMainText);
        $nbPropertiesWithEmptyMainText = count($this->propertiesWithEmptyMainText);
        $nbMethodsWithEmptyMainText = count($this->methodsWithEmptyMainText);
        if (
            $nbClassesWithEmptyMainText > 0 ||
            $nbPropertiesWithEmptyMainText > 0 ||
            $nbMethodsWithEmptyMainText > 0
        ) {
            $hasErrors = true;
        }


        $emptyMainTextMenuItems = [
            'classes-with-empty-main-text' => ["Classes with empty main text", $nbClassesWithEmptyMainText, true],
            'properties-with-empty-main-text' => ["Properties with empty main text", $nbPropertiesWithEmptyMainText, true],
            'methods-with-empty-main-text' => ["Methods with empty main text", $nbMethodsWithEmptyMainText, true],
        ];


        $classesWithEmptyMainTextWidget = $this->getTableSection(
            "Classes with empty main text",
            "classes-with-empty-main-text",
            ["Class", "Context"],
            $this->classesWithEmptyMainText
        );

        $propertiesWithEmptyMainTextWidget = $this->getTableSection(
            "Properties with empty main text",
            "properties-with-empty-main-text",
            ["Class", "Property", "Context"],
            $this->propertiesWithEmptyMainText
        );

        $methodsWithEmptyMainTextWidget = $this->getTableSection(
            "Methods with empty main text",
            "methods-with-empty-main-text",
            ["Class", "Method", "Context"],
            $this->methodsWithEmptyMainText
        );


        //--------------------------------------------
        // LINKAGE
        //--------------------------------------------
        $nbUnresoledClassRefs = count($this->unresolvedClassReferences);
        $nbUnresoledMethodRefs = count($this->unresolvedMethodReferences);
        if (
            $nbUnresoledClassRefs > 0 ||
            $nbUnresoledMethodRefs > 0
        ) {
            $hasErrors = true;
        }


        $linkageMenuItems = [
            'unresolved-class-references' => ["Unresolved class references", $nbUnresoledClassRefs, true],
            'unresolved-method-references' => ["Unresolved method references", $nbUnresoledMethodRefs, true],
        ];


        $unresolvedClassRefsWidget = $this->getTableSection(
            "Unresolved class references",
            "unresolved-class-references",
            ['Referenced class', "Context", "Hint"],
            $this->unresolvedClassReferences
        );


        $unresolvedMethodRefsWidget = $this->getTableSection(
            "Unresolved method references",
            "unresolved-method-references",
            ["Referenced class", "Referenced method", "Context", "Hint"],
            $this->unresolvedMethodReferences
        );


        //--------------------------------------------
        // INLINE
        //--------------------------------------------
        /**
         * array of [functionName, nbUsed]
         */
        $inlineFunctionsCount = [];
        $totalInlineFunctionUsage = 0;
        $inlineFunctionsDetails = [];
        foreach ($this->parsedInlineFunctions as $item) {
            $name = $item[0];
            $inlineFunctionsDetails[] = [
                $item[0],
                ArrayToStringTool::toInlinePhpArray($item[1]),
                $item[2],
            ];
            if (false === array_key_exists($name, $inlineFunctionsCount)) {
                $inlineFunctionsCount[$name] = [$name, 0];
            }
            $totalInlineFunctionUsage++;
            $inlineFunctionsCount[$name][1]++;
        }


        $nbUndefinedInlineKeyword = count($this->undefinedInlineKeywords);
        $nbUndefinedInlineClass = count($this->undefinedInlineClasses);
        if (
            $nbUndefinedInlineKeyword > 0 ||
            $nbUndefinedInlineClass > 0
        ) {
            $hasErrors = true;
        }


        $uif = $this->unknownInlineFunctions;
        $nbUnknownInlineFunctions = count($uif);

        $inlineMenuItems = [
            'unresolved-keyword-inline-functions' => ["Unresolved @keyword", $nbUndefinedInlineKeyword, true],
            'unresolved-class-inline-functions' => ["Unresolved @class", $nbUndefinedInlineClass, true],
            'unknown-inline-functions' => ["Unknown functions", $nbUnknownInlineFunctions, true],
            'inline-function-usage' => ["Usage", $totalInlineFunctionUsage, false],
            'inline-function-usage-details' => ["Usage details", $totalInlineFunctionUsage, false],
        ];


        $inlineUnresolvedKeyword = $this->getTableSection(
            "Unresolved @keyword",
            "unresolved-keyword-inline-functions",
            ['Unresolved @keyword', "Function name", 'Context'],
            $this->undefinedInlineKeywords
        );

        $inlineUnresolvedClass = $this->getTableSection(
            "Unresolved @class",
            "unresolved-class-inline-functions",
            ['Unresolved @class', 'Context'],
            $this->undefinedInlineClasses
        );

        $unknownInlineFunctions = $this->getTableSection(
            "Unknown inline functions",
            "unknown-inline-functions",
            ['Unknown inline function', 'Context'],
            $this->unknownInlineFunctions
        );

        $inlineUsageSection = $this->getTableSection(
            "Inline functions usage",
            "inline-function-usage",
            ['Inline function name', 'Counter'],
            $inlineFunctionsCount,
            $totalInlineFunctionUsage,
            false
        );


        $inlineUsageDetails = $this->getTableSection(
            "Inline functions usage details",
            "inline-function-usage-details",
            ['Function', 'Arguments', 'Context'],
            $inlineFunctionsDetails,
            null,
            false

        );


        //--------------------------------------------
        // BLOCK
        //--------------------------------------------
        $blockLevelTagsCount = [];
        $totalBlockLevelTagsUsage = 0;
        $blockLevelTagsDetails = [];
        if (is_array($this->parsedBlockLevelTags)) {

            foreach ($this->parsedBlockLevelTags as $item) {
                $name = $item[0];
                $blockLevelTagsDetails[] = [
                    $item[0],
                    $item[1],
                ];
                if (false === array_key_exists($name, $blockLevelTagsCount)) {
                    $blockLevelTagsCount[$name] = [$name, 0];
                }
                $totalBlockLevelTagsUsage++;
                $blockLevelTagsCount[$name][1]++;
            }
        }

        $blockUsageSection = $this->getTableSection(
            "Block-level tags usage",
            "block-level-tags-usage",
            ['Tag', 'Counter'],
            $blockLevelTagsCount,
            $totalBlockLevelTagsUsage,
            false
        );


        $blockUsageDetails = $this->getTableSection(
            "Block-level tags usage details",
            "block-level-tags-usage-details",
            ['Tag', 'Context'],
            $blockLevelTagsDetails,
            null,
            false

        );


        $nbUnresolvedImplementation = count($this->unresolvedImplementationTags);
        $nbUnresolvedOverrides = count($this->unresolvedOverridesTags);
        if (
            $nbUnresolvedImplementation > 0 ||
            $nbUnresolvedOverrides > 0
        ) {
            $hasErrors = true;
        }


        $blockMenuItems = [
            'block-unresolved-implementation-tag' => ["Unresolved @implementation", $nbUnresolvedImplementation, true],
            'block-unresolved-overrides-tag' => ["Unresolved @overrides", $nbUnresolvedOverrides, true],
            'block-level-tags-usage' => ["Usage", $totalBlockLevelTagsUsage, false],
            'block-level-tags-usage-details' => ["Usage details", $totalBlockLevelTagsUsage, false],
        ];

        $unresolvedImplementationTag = $this->getTableSection(
            "Unresolved @implementation",
            "block-unresolved-implementation-tag",
            ['Method name', 'Context'],
            $this->unresolvedImplementationTags
        );


        $unresolvedOverridesTag = $this->getTableSection(
            "Unresolved @overrides",
            "block-unresolved-overrides-tag",
            ['Method name', 'Context'],
            $this->unresolvedImplementationTags
        );


        $missingTagsWidgets = [
            $propertiesWithoutVarTagWidget,
            $parametersWithoutParamTagWidget,
        ];

        if (true === $showMethodsWithoutReturn) {
            $missingTagsWidgets[] = $methodsWithoutReturnTagWidget;
        }


        //--------------------------------------------
        // DISPLAY ZEUS TEMPLATE
        //--------------------------------------------
        $tpl = $this->template;
        $o = new ZeusTemplateEngine();
        return $o->renderByPath($tpl, [
            // todo texts
            "todoTextsMenuItems" => $todoTextsMenuItems,
            "todoTextsWidgets" => [
                $todoTextWidget,
            ],
            // missing comments
            "missingCommentsMenuItems" => $missingCommentsMenuItems,
            "missingCommentsWidgets" => [
                $classesWithoutCommentWidget,
                $methodsWithoutCommentWidget,
                $propertiesWithoutCommentWidget,
            ],
            // missing tags
            "missingTagsMenuItems" => $missingTagsMenuItems,
            "missingTagsWidgets" => $missingTagsWidgets,


            // empty main text
            "emptyMainTextMenuItems" => $emptyMainTextMenuItems,
            "emptyMainTextWidgets" => [
                $classesWithEmptyMainTextWidget,
                $propertiesWithEmptyMainTextWidget,
                $methodsWithEmptyMainTextWidget,
            ],

            // linkage
            "linkageMenuItems" => $linkageMenuItems,
            "linkageWidgets" => [
                $unresolvedClassRefsWidget,
                $unresolvedMethodRefsWidget,
            ],

            // inline
            "inlineMenuItems" => $inlineMenuItems,
            "inlineWidgets" => [
                $inlineUnresolvedKeyword,
                $inlineUnresolvedClass,
                $unknownInlineFunctions,
                $inlineUsageSection,
                $inlineUsageDetails,
            ],
            // block
            "blockMenuItems" => $blockMenuItems,
            "blockWidgets" => [
                $unresolvedImplementationTag,
                $unresolvedOverridesTag,
                $blockUsageSection,
                $blockUsageDetails,
            ],
            'hasErrors' => $hasErrors,

        ]);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a table widget.
     *
     *
     *
     * @param string $title
     * @param string $id
     * @param array $headers
     * @param array $rows
     * @param null $nbItems
     * @param bool $acceptWarning = true
     * @return array
     *      - type: string. The type of widget.
     *              Available types:
     *                  - table
     *      - title: string. The widget title.
     *      - id: string. The identifier of the widget: it's basically the anchor of the widget title,
     *              without the starting pound symbol (#).
     *      - ?table: string. Only used if type=table. The html of the table.
     *      - ?nbItems: int. Only if type=table. The number of items of the table.
     *
     */
    private function getTableSection(string $title, string $id, array $headers, array $rows, $nbItems = null, $acceptWarning = true)
    {
        if (null === $nbItems) {
            $nbItems = count($rows);
        }
        if ($nbItems > 0) {
            $table = ArrayToTableUtil::create()
                ->addBody($rows)
                ->setHeaders($headers)
                ->render();
        } else {
            $table = "";
        }

        return [
            "type" => "table",
            "title" => "$title ($nbItems)",
            "id" => $id,
            "table" => $table,
            "nbItems" => $nbItems,
            "acceptWarning" => $acceptWarning,
        ];
    }

}