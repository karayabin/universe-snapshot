<?php


namespace Ling\BabyYaml\Writer;


use Ling\BabyYaml\Exception\BabyYamlException;
use Ling\BabyYaml\Helper\BdotTool;
use Ling\Bat\FileSystemTool;
use Ling\CheapLogger\CheapLogger;

/**
 * BabyYamlWriter.
 * @author Lingtalfi
 *
 *
 */
class BabyYamlWriter
{

    private $valueAdaptor;
    private $eol = PHP_EOL;
    private $tab = "    ";
    private $formatCode = true;


    public function __construct()
    {
        $this->valueAdaptor = new BabyYamlWriterValueAdaptor();
    }


    /**
     * If file is null, will return the babyYaml dump.
     * If file is given, will write the babyYaml dump to the given file.
     *
     * Available options are the same as the BabyYamlUtil::writeFile method.
     *
     *
     *
     * @return bool|string,
     *                  bool is returned only if file is given.
     *                  It indicates whether or not the writing to the file has been successful.
     *
     *                  string is returned only if file is null.
     *
     */
    public function export(array $data, $file = null, array $options = [])
    {
        $content = $this->getBabyYamlFromArray($data, $options);
        if (null === $file) {
            return $content;
        }
        return (false !== FileSystemTool::mkfile($file, $content));
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     *
     * Returns the babyYaml string from the given array.
     * Available options are the same as the export method above.
     *
     *
     * @param array $array
     * @param array $options
     * @return string
     */
    private function getBabyYamlFromArray(array $array, array $options = []): string
    {
        $nodeInfoMap = $options['nodeInfoMap'] ?? null;
        $updatedSequencePaths = [];
        $updatedMappingPaths = [];
        if ($nodeInfoMap) {

            foreach ($nodeInfoMap as $key => $node) {
                if (array_key_exists("type", $node)) {
                    $type = $node['type'];
                    if ('sequence' === $type) {
                        $realValue = $node['realValue'];
                        $newVal = BdotTool::getDotValue($key, $array, []);
                        if ($newVal !== $realValue) {
                            $updatedSequencePaths[] = $key;
                        }
                    } elseif ('mapping' === $type) {
                        $realValue = $node['realValue'];
                        $newVal = BdotTool::getDotValue($key, $array, []);
                        if ($newVal !== $realValue) {
                            $updatedMappingPaths[] = $key;
                        }
                    }
                }
            }
        }


        $options['updatedSequencePaths'] = $updatedSequencePaths;
        $options['updatedMappingPaths'] = $updatedMappingPaths;


        $s = rtrim($this->getNodeContent($array, 0, 0, [], $options), PHP_EOL);
        return $s;
    }


    /**
     * Returns the BabyYaml string for the given node, recursively.
     *
     * Available options are the same as the export method above.
     *
     *
     * @param array $config
     * @param int $level
     * @param int $n
     * @param array $breadcrumbs
     * @param array $options
     * @return string
     */
    private function getNodeContent(array $config, $level = 0, $n = 0, array $breadcrumbs = [], array $options = []): string
    {


        $nodeInfoMap = $options['nodeInfoMap'] ?? null;
        $userComments = $options['comments'] ?? [];
        $updatedSequencePaths = $options['updatedSequencePaths'] ?? [];
        $updatedMappingPaths = $options['updatedMappingPaths'] ?? [];


        $s = '';
        foreach ($config as $k => $v) {

            $valueToProcess = $v;



            $breadcrumbs[] = str_replace('.', '\\.', $k);
            $currentPath = implode('.', $breadcrumbs);



            $nodeInfo = [];
            $valueType = null;
            $valueAlreadyProcessed = false;
            $literalOptions = [];


            // comments from the map
            //--------------------------------------------
            $commentItems = [];
            if (null !== $nodeInfoMap) {
                if (array_key_exists($currentPath, $nodeInfoMap)) {
                    $nodeInfo = $nodeInfoMap[$currentPath];
                    if (array_key_exists("comments", $nodeInfo)) {
                        $commentItems = $nodeInfo['comments'];
                    }
                    if (array_key_exists("type", $nodeInfo)) {
                        $valueType = $nodeInfo['type'];
                    }
                }
            }


            // user comment override
            //--------------------------------------------
            if (array_key_exists($currentPath, $userComments)) {


                CheapLogger::log("found comment");

                $userCommentInfo = $userComments[$currentPath];
                if (array_key_exists('inline', $userCommentInfo)) {
                    foreach ($commentItems as $k8 => $commentItem) {
                        if (
                            'inline-value' === $commentItem[0] ||
                            'inline' === $commentItem[0]
                        ) {
                            unset($commentItems[$k8]);
                        }
                    }

                    $this->checkUserComment($userCommentInfo['inline']);
                    $text = $userCommentInfo['inline'];
                    // don't forget the crucial prefix space for inline values, if the user didnt' set one
                    if (
                        ' ' !== substr($text, 0, 1) &&
                        "\t" !== substr($text, 0, 1)
                    ) {
                        $text = ' ' . $text;
                    }

                    $commentItems[] = [
                        'inline-value',

                        $text,
                    ];
                }
                if (array_key_exists('block', $userCommentInfo)) {

                    CheapLogger::log("found block");
                    foreach ($commentItems as $k8 => $commentItem) {
                        if ('block' === $commentItem[0]) {
                            unset($commentItems[$k8]);
                        }
                    }
                    foreach ($userCommentInfo['block'] as $text) {
                        $this->checkUserComment($text);
                        $commentItems[] = [
                            'block',
                            $text,
                        ];
                    }
                }
            }


            // special treatment if nodeInfoMap was provided
            //--------------------------------------------
            if ('multi' === $valueType) {
                $literalOptions['forceMulti'] = true;
                foreach ($commentItems as $commentItem) {
                    if ('multi-top' === $commentItem[0]) {
                        $literalOptions['multiTopComment'] = $commentItem[1];
                    } elseif ('multi-bottom' === $commentItem[0]) {
                        $literalOptions['multiBottomComment'] = $commentItem[1];
                    }
                }
            } elseif (in_array($valueType, [
                'hybrid',
                'quote',
                'mapping',
                'sequence',
            ])) {
                /**
                 * Note that the original value includes the inline comments...
                 */
                if (array_key_exists("value", $nodeInfo)) {

                    if (
                        ("sequence" === $valueType && in_array($currentPath, $updatedSequencePaths)) ||
                        ("mapping" === $valueType && in_array($currentPath, $updatedMappingPaths))
                    ) {
                        /**
                         * The inline sequence has been modified, we will now write it in its expanded form,
                         * which is the default
                         */
                    } else {
                        $valueToProcess = $nodeInfo['value'];
                        $valueAlreadyProcessed = true;
                    }
                } else {
                    throw new BabyYamlException("As for now, you're expected to provide the originalValue along with the type, see the node-info-parser.md documentation for more info.");
                }
            }


            //--------------------------------------------
            // REGULAR LOOP
            //--------------------------------------------
            $v = $valueToProcess;
            $this->appendComments($s, $commentItems, 'block');


            if (is_numeric($k)) {

                $prefix = $k . ': ';
                if ((int)$k === (int)$n) {
                    $prefix = "- ";
                } else {
                    $n = $k;
                }


                if (is_array($v)) {
                    $s .= $this->tab($level) . $prefix;
                    $this->appendComments($s, $commentItems, 'inline');


                    if ($v) {
                        $p = 0;
                        $s .= $this->eol();
                        foreach ($v as $k2 => $v2) {
                            $s .= $this->getNodeContent(array($k2 => $v2), ($level + 1), $p, $breadcrumbs, $options);
                            $p++;
                        }
                        $s .= $this->tab($level);
                    } else {
                        $s .= $this->toLiteral($valueToProcess, $level, $valueAlreadyProcessed, $literalOptions);

                    }

                    $s .= $this->eol();
                } else {
                    $s .= $this->tab($level) . $prefix . $this->toLiteral($valueToProcess, $level, $valueAlreadyProcessed, $literalOptions);
                    $this->appendComments($s, $commentItems, 'inline-value');
                    $s .= $this->eol();
                }
                $n++;
            } else {

                if (is_array($v)) {
                    $s .= $this->tab($level) . $k . ': ';
                    $this->appendComments($s, $commentItems, 'inline');


                    if ($v) {
                        $p = 0;
                        $s .= $this->eol();
                        foreach ($v as $k2 => $v2) {
                            $s .= $this->getNodeContent(array($k2 => $v2), ($level + 1), $p, $breadcrumbs, $options);
                            $p++;
                        }
                        $s .= $this->tab($level);
                    } else {
                        $s .= $this->toLiteral($valueToProcess, $level, $valueAlreadyProcessed, $literalOptions);
                    }
                    $s .= $this->eol();
                } else {
                    if (false !== strpos($k, ':')) {
                        $k = '"' . str_replace('"', '\"', $k) . '"';
                    }
                    $s .= $this->tab($level) . $k . ': ' . $this->toLiteral($valueToProcess, $level, $valueAlreadyProcessed, $literalOptions);
                    $this->appendComments($s, $commentItems, 'inline-value');
                    $s .= $this->eol();
                }
            }

            array_pop($breadcrumbs);

        }
        return $s;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     *
     * Available options are:
     * - forceMulti: bool=false, whether to force the writing of the value as a multi
     * - multiTopComment: string=null, the multi top comment
     * - multiBottomComment: string=null, the multi bottom comment
     *
     *
     *
     * @param $scalar
     * @param $level
     * @param bool $valueAlreadyProcessed
     * @param array $options
     * @return int|string
     */
    private function toLiteral($scalar, $level, bool $valueAlreadyProcessed = false, array $options = [])
    {
        if (true === $valueAlreadyProcessed) {
            return $scalar;
        }

        $forceMulti = $options["forceMulti"] ?? false;
        if (is_string($scalar) &&
            (
                true === $forceMulti ||
                false !== strpos($scalar, $this->eol())
            )
        ) {

            $multiTopComment = $options['multiTopComment'] ?? '';
            $multiBottomComment = $options['multiBottomComment'] ?? '';


            // adding 4 extra spaces (compared to the parent key's beginning) at the beginning of each line
            $nbSpaces = ($level * 4) + 4;
            $s = '<' . $multiTopComment;

            $s .= $this->eol();
            $p = explode($this->eol(), $scalar);
            foreach ($p as $v) {
                $t = trim($v);
                if (strlen($t) > 0) {
                    $v = str_repeat($this->tab, $nbSpaces / 4) . $v;
                }
                $s .= $v . $this->eol();
            }
            $s .= str_repeat(' ', $level * 4) . '>' . $multiBottomComment;
            $v = $s;
        } else {
            $v = $this->valueAdaptor->getValue($scalar);
        }
        return $v;
    }


    private function appendComments(string &$s, array $commentItems, string $kind)
    {
        foreach ($commentItems as $commentItem) {
            list($type, $comment) = $commentItem;

            switch ($kind) {
                case "block":
                    if ('block' === $type) {
                        $s .= $comment . PHP_EOL;
                    }
                    break;
                case "inline":
                case "inline-value":
                    if ($kind === $type) {
                        $s .= $comment;
                    }
                    break;
                default:
                    throw new BabyYamlException("Unknown kind $kind.");
                    break;
            }
        }
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function tab($level)
    {
        if (true === $this->formatCode) {
            return str_repeat($this->tab, $level);
        }
    }

    private function eol()
    {
        if (true === $this->formatCode) {
            return $this->eol;
        }
    }

    /**
     * Checks that the given user comment's first non-whitespace symbol is a hash symbol, or throws an exception if that's not the case.
     * @param string $comment
     * @throws \Exception
     */
    private function checkUserComment(string $comment)
    {
        if ('#' !== substr(ltrim($comment), 0, 1)) {
            throw new BabyYamlException("A comment must start with the hash symbol (#), \"$comment\" given.");
        }
    }
}
