<?php


namespace IndentedLines\NodeTreeBuilder;

use IndentedLines\Exception\SyntaxErrorSignalException;
use IndentedLines\KeyFinder\KeyFinder;
use IndentedLines\KeyFinder\KeyFinderInterface;
use IndentedLines\MultiLineCompiler\MultiLineCompilerInterface;
use IndentedLines\MultiLineCompiler\WithLeftMarginMultiLineCompiler;
use IndentedLines\MultiLineDelimiter\MultiLineDelimiterInterface;
use IndentedLines\MultiLineDelimiter\SingleCharMultiLineDelimiter;
use IndentedLines\Node\Node;
use IndentedLines\Node\NodeInterface;


/**
 * BaseNodeTreeBuilder
 * @author Lingtalfi
 * 2015-11-19
 *
 */
abstract class BaseNodeTreeBuilder implements NodeTreeBuilderInterface
{


    /**
     * @var MultiLineDelimiterInterface
     */
    protected $multiLineDelimiter;
    /**
     * @var MultiLineCompilerInterface
     */
    protected $multiLineCompiler;
    /**
     * @var KeyFinderInterface
     */
    protected $keyFinder;

    /**
     * keyMode can be one of the following:
     * - 0: no key, all keys are implicit
     * - 1: mandatory keys, if the key is not explicit, this is considered a syntax error (warning generated, and parsing stops)
     * - 2: mixed: if the key is not explicit, it is implicit (uses php auto indexing capabilities)
     *
     */
    protected $keyMode;
    protected $useMultiLine;
    /**
     * In this implementation, comments are stripped in the following cases:
     *      - it is the first symbol of the line
     *      - it is the first symbol of the value of the line (for lines that contain a key)
     *
     */
    protected $useComment;
    protected $commentSymbol;


    // keep track of the file name to improve error messages
    private $file;
    private $level2Node;
    private $lastNode;
    private $multiLineNode;
    private $multiLineLevel;
    private $currentLineNb;


    /**
     * Return the lineContent (the line without its indentation and leading blank symbols),
     * and set the level to its appropriate value.
     *
     * @return string|false
     *
     *      Returns false in case of failure, in which case a warning should be triggered.
     * 
     * 
     * Note: 0 is the top level, where elements reside by default.
     */
    abstract protected function getLineWithoutIndent($line, &$level);


    public function __construct()
    {
        $this->useMultiLine = true;
        $this->useComment = true;
        $this->commentSymbol = '#';
        $this->keyMode = 2;
        $this->errors = [];
        $this->level2Node = [];
    }

    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS NodeTreeBuilderInterface
    //------------------------------------------------------------------------------/
    public function buildNode($string)
    {
        // I use this technique instead of the explode or preg_split technique,
        // because it keeps the carriage returns in multi-line mode.
        $ret = false;
        if (is_string($string)) {
            if (false !== $handle = fopen('php://memory', 'w+')) { // triggers E_WARNING in case of failure
                fwrite($handle, $string);
                rewind($handle);
                $ret = $this->buildFromHandle($handle);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("The first argument must be of type string, %s given", gettype($string)));
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return NodeInterface|false
     *          false is returned in case of failure
     */
    public function buildNodeByFile($file)
    {
        $ret = false;
        if (false !== $handle = fopen($file, 'rb')) { // triggers E_WARNING in case of failure
            $this->file = $file;
            $ret = $this->buildFromHandle($handle);
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function buildFromHandle($handle)
    {
        $ret = false;
        try {


            $previousLevel = -1;
            $this->currentLineNb = 0;
            $root = new Node();
            $muliLineMode = false;
            $multiLines = [];
            $multiLineDelimiter = $this->getMultiLineDelimiter();
            $multiLineCompiler = $this->getMultiLineCompiler();


            $this->lastNode = $root;
            $this->level2Node[-1] = $root;

            while ($line = fgets($handle)) {
                /**
                 * This line is quite important actually:
                 *      - it removes PHP_EOL at the end of the line
                 *      - it removes right blanks,
                 *
                 * In other words, if you want to make a line end with blank spaces, you need to quote it.
                 * Also this implies that multi-lines cannot have extra right spaces.
                 * Remember that this is specific to this implementation, and was not defined in the conception (interface).
                 *
                 */
                $line = rtrim($line);
                $this->currentLineNb++;
                $trimmed = trim($line);


                //------------------------------------------------------------------------------/
                // MULTI LINE MODE
                //------------------------------------------------------------------------------/
                if (true === $muliLineMode) {
                    // is it the end of multiLine mode ?
                    if (true === $this->multiLineDelimiter->isEnd($line)) {
                        $this->processMultiLines($multiLines, $multiLineCompiler);

                        // reset multi line mode to start back in normal mode
                        $multiLines = [];
                        $muliLineMode = false;
                    }
                    else {
                        $multiLines[] = $line;
                    }
                    // restart a new loop until multiLine is finished
                    continue;
                }


                //------------------------------------------------------------------------------/
                // ONE LINE MODE
                //------------------------------------------------------------------------------/
                if (false === $this->skipLine($trimmed)) {
                    $error = null;
                    $level = 0;
                    if (false !== $lineContent = $this->getLineWithoutIndent($line, $level)) {
                        $valuePos = 0;
                        if (false !== $key = $this->getKey($lineContent, $valuePos)) {


                            $value = $this->getValue($lineContent, $valuePos);


                            $currentNode = new Node($value, $key);


                            if (true === $this->useMultiLine && true === $multiLineDelimiter->isBegin($lineContent)) {
                                // starting a new multiLine ? let's store the Node for later resolving
                                $this->multiLineNode = $currentNode;
                                $this->multiLineLevel = $level;
                                $muliLineMode = true;
                                // the script must goes on, so that the multi-line Node will be at the right place in the node tree
                            }


                            // going to a deeper level
                            if ($level > $previousLevel) {
                                if ($level - $previousLevel > 1) {
                                    $this->syntaxError("You cannot go down more than one level at the time{location}");
                                }
                                $lastNode = $this->getNodeAtLevel($previousLevel);
                                /**
                                 * @var NodeInterface $lastNode
                                 */
                                $lastNode->addChild($currentNode);
                            }
                            // staying at the same level, or going up in a lower level
                            elseif ($level <= $previousLevel) {
                                $lastNode = $this->getNodeAtLevel($level - 1);
                                /**
                                 * @var NodeInterface $lastNode
                                 */
                                $lastNode->addChild($currentNode);
                            }
                            $this->lastNode = $currentNode;
                            $this->level2Node[$level] = $currentNode;
                            $previousLevel = $level;
                        }
                        else {
                            $this->syntaxError(sprintf("Couldn't find the key for line: %s{location}", $line));
                        }
                    }

                }
            }

            $this->processMultiLines($multiLines, $multiLineCompiler);
            $ret = $root;

        } catch (SyntaxErrorSignalException $e) {
            // shortcut to the end
        }
        return $ret;
    }


    protected function skipLine($trimmedLine)
    {
        if (true === $this->useComment && ('' === $trimmedLine || 0 === strpos($trimmedLine, $this->commentSymbol))) {
            return true;
        }
        return false;
    }

    /**
     * Returns a string.
     * An empty string is returned if the value doesn't exist
     */
    protected function getValue($lineContent, $valuePos)
    {
        $value = ltrim(mb_substr($lineContent, $valuePos));
        if (true === $this->useComment && 0 === strpos($value, $this->commentSymbol)) {
            return '';
        }
        return $value;
    }

    /**
     * @return null|string|false,
     *              false in case of failure
     *              null: means to use php's native indexation mechanism
     *              string: the key
     */
    protected function getKey($lineContent, &$valuePos)
    {
        if (0 === $this->keyMode) { // no keys
            return null;
        }
        elseif (1 === $this->keyMode) { // mandatory keys
            $ret = $this->getKeyFinder()->findKey($lineContent, $valuePos);
            if (false === $ret) {
                $this->syntaxError(sprintf("Mandatory key not found (keyMode=2) in %s{location}", $lineContent));
            }
        }
        else { // mixed keys
            $pos = $valuePos;
            $ret = $this->getKeyFinder()->findKey($lineContent, $pos);
            /**
             * In keyMode 2, if the key is not found we suppose that it is the value
             */
            if (false === $ret) {
                $ret = null;
            }
            else {
                // key found ? let's update the pos
                $valuePos = $pos;
            }
            return $ret;
        }
    }


    protected function syntaxError($fmtMsg)
    {
        $location = '';
        if (null !== $this->file) {
            $location .= ' in file ' . $this->file;
        }
        $location .= ', line ' . $this->currentLineNb;
        $fmtMsg = str_replace('{location}', $location, $fmtMsg);
        trigger_error($fmtMsg, E_USER_WARNING);
        throw new SyntaxErrorSignalException(""); // signal to go to the end
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return NodeInterface
     */
    private function getNodeAtLevel($level)
    {
        if (array_key_exists($level, $this->level2Node)) {
            return $this->level2Node[$level];
        }
        throw new \LogicException(sprintf("No node was stored at level: %d, on line %s of file: %s", $level, $this->currentLineNb, $this->file));
    }

    private function processMultiLines(array $multiLines, MultiLineCompilerInterface $compiler)
    {
        $multiLineNode = $this->multiLineNode;
        if ($multiLines && $multiLineNode instanceof NodeInterface) {
            $value = $compiler->getValue($multiLines, $this->multiLineLevel);
            $multiLineNode->setValue($value);
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setMultiLineDelimiter(MultiLineDelimiterInterface $multiLineDelimiter)
    {
        $this->multiLineDelimiter = $multiLineDelimiter;
    }

    public function getMultiLineDelimiter()
    {
        if (null === $this->multiLineDelimiter) {
            $this->multiLineDelimiter = new SingleCharMultiLineDelimiter();
        }
        return $this->multiLineDelimiter;
    }

    public function setMultiLineCompiler(MultiLineCompilerInterface $multiLineCompiler)
    {
        $this->multiLineCompiler = $multiLineCompiler;
    }

    public function getMultiLineCompiler()
    {
        if (null === $this->multiLineCompiler) {
            $this->multiLineCompiler = new WithLeftMarginMultiLineCompiler();
        }
        return $this->multiLineCompiler;
    }


    public function setKeyFinder(KeyFinderInterface $keyFinder)
    {
        $this->keyFinder = $keyFinder;
        return $this;
    }

    /**
     * @return KeyFinderInterface
     */
    public function getKeyFinder()
    {
        if (null === $this->keyFinder) {
            $this->keyFinder = new KeyFinder();
        }
        return $this->keyFinder;
    }

    public function setUseMultiLine($useMultiLine)
    {
        $this->useMultiLine = $useMultiLine;
        return $this;
    }

    public function setUseComment($useComment)
    {
        $this->useComment = $useComment;
        return $this;
    }

    public function setKeyMode($keyMode)
    {
        $keyMode = (int)$keyMode;
        if ($keyMode < 0 || $keyMode > 2) {
            throw new \InvalidArgumentException(sprintf("Invalid keyMode: %s", $keyMode));
        }
        $this->keyMode = $keyMode;
        return $this;
    }

    public function setCommentSymbol($commentSymbol)
    {
        $this->commentSymbol = $commentSymbol;
        return $this;
    }


}
