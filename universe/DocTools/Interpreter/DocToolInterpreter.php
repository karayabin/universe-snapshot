<?php


namespace DocTools\Interpreter;


use DocTools\Exception\DocToolsException;
use DocTools\Info\CommentInfo;
use DocTools\Report\ReportInterface;

/**
 * The DocToolInterpreter class is a helper tool to interpret the docTool markup language.
 *
 */
class DocToolInterpreter implements NotationInterpreterInterface
{


    /**
     * This property holds a map of keyword => url.
     * This is used to resolve @keyword(inline functions).
     *
     * @var array
     */
    protected $keyword2UrlMap;

    /**
     * This property holds the array of className and/or className::methodName => url.
     * @var array
     */
    protected $generatedItems2Url;


    /**
     * Builds the DocToolInterpreter instance.
     */
    public function __construct()
    {
        $this->keyword2UrlMap = [];
        $this->generatedItems2Url = [];
    }

    /**
     * @implementation
     */
    public function resolveInlineTags(string $string, ReportInterface $report = null)
    {


        $s = preg_replace_callback('!@([a-zA-Z0-9_]+)\(([^)]*)\)!', function ($match) use ($report) {
            [$rawString, $functionName, $argsString] = $match;


            $argsList = self::resolveArgsList($argsString);
            $report->addParsedInlineFunction($functionName, $argsList);


            $resolved = $this->resolveInlineFunction($functionName, $argsList, $report);
            if (false === $resolved) {
                if (null !== $report) {
                    $report->addUnknownInlineFunction($functionName);
                }
            }
            else {
                return $resolved;
            }


            return $rawString;

        }, $string);
        return $s;
    }


    /**
     * @implementation
     */
    public function interpretBlockLevelTags(array $tags, CommentInfo $comment, array $info, ReportInterface $report = null)
    {


        $declaringClass = $info['declaringClass'];


        //--------------------------------------------
        // SEE ITEMS
        //--------------------------------------------
        $seeItems = [];
        if (array_key_exists("seeClass", $tags)) {
            foreach ($tags['seeClass'] as $seeClass) {
                $url = null;
                if (array_key_exists($seeClass, $this->generatedItems2Url)) {
                    $url = $this->generatedItems2Url[$seeClass];
                }
                else {
                    if (null !== $report) {
                        $report->addUnresolvedClassReference($seeClass, "seeClass from $declaringClass");
                    }
                }


                $seeItems[] = [
                    "type" => "class",
                    "declaringClass" => $declaringClass,
                    "value" => $seeClass,
                    "url" => $url,
                ];
            }
        }

        if (array_key_exists("seeMethod", $tags)) {
            foreach ($tags['seeMethod'] as $seeMethod) {

                $url = null;

                if (false === strpos($seeMethod, "::")) {
                    $seeMethod = $declaringClass . "::" . $seeMethod;
                }

                if (array_key_exists($seeMethod, $this->generatedItems2Url)) {
                    $url = $this->generatedItems2Url[$seeMethod];
                }
                else {
                    if (null !== $report) {
                        $report->addUnresolvedMethodReference($declaringClass, $seeMethod, "seeMethod from $declaringClass");
                    }
                }

                $seeItems[] = [
                    "type" => "method",
                    "declaringClass" => $declaringClass,
                    "value" => $seeMethod, // it's a non-expandable tag
                    "url" => $url,
                ];
            }
        }
        $comment->setSeeItems($seeItems);



    }


    /**
     * Sets the generatedItems2Url.
     *
     * @param array $generatedItems2Url
     */
    public function setGeneratedItemsToUrl(array $generatedItems2Url)
    {
        $this->generatedItems2Url = $generatedItems2Url;
    }


    /**
     * Sets the keyword2UrlMap.
     * @param array $keyword2UrlMap
     */
    public function setKeyword2UrlMap(array $keyword2UrlMap)
    {
        $this->keyword2UrlMap = $keyword2UrlMap;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Resolves an inline function and returns the result.
     *
     * False is returned if the inline function is not recognized.
     * Null is returned if the inline function is recognized but couldn't be resolved.
     *
     *
     *
     * Note: you can override this method to implement your own functions.
     * This method by default uses the @keyword(docTool markup language) @keyword(inline functions).
     *
     *
     * @param $functionName
     * @param array $argsList
     * @param ReportInterface $report
     * @return false|string
     * @throws DocToolsException
     */
    protected function resolveInlineFunction($functionName, array $argsList, ReportInterface $report = null)
    {
        switch ($functionName) {
            case "keyword":
            case "kw":
            case "doc":
            case "page":
            case "section":
            case "concept":
            case "object":
                $keyword = $argsList[0];
                if (array_key_exists($keyword, $this->keyword2UrlMap)) {
                    $url = $this->keyword2UrlMap[$keyword];
                    return '[' . $keyword . '](' . $url . ')';
                }
                else {
                    if (null !== $report) {
                        $report->addUndefinedInlineKeyword($keyword);
                    }
                }
                return $keyword;

                break;
            case "alias":
            case "url":
                $keyword = $argsList[0];
                if (array_key_exists($keyword, $this->keyword2UrlMap)) {
                    return $this->keyword2UrlMap[$keyword];
                }
                else {
                    if (null !== $report) {
                        $report->addUndefinedInlineKeyword($keyword);
                    }
                }
                return $keyword;

                break;
            case "class":
            case "method":
                $item = $argsList[0];
                if (array_key_exists($item, $this->generatedItems2Url)) {
                    $url = $this->generatedItems2Url[$item];
                    return '[' . $item . '](' . $url . ')';
                }
                else {
                    if (null !== $report) {
                        $report->addUndefinedInlineClass($item);
                    }
                }
                return $item;
                break;
        }
        return false;
    }


    /**
     * Returns an array representing the resolved $argsList string passed to the method.
     *
     * See @page(the inline functions page) for more info.
     *
     * @param string $argsList
     * @return array
     */
    protected static function resolveArgsList(string $argsList)
    {
        $ret = [];
        $p = explode(",", $argsList);
        foreach ($p as $arg) {
            $arg = trim($arg);
            $arg = str_replace([
                "__closing_parenthesis__",
                "__comma__",
            ], [
                ")",
                ",",
            ], $arg);
            $ret[] = $arg;
        }
        return $ret;
    }
}