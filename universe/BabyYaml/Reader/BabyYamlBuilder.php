<?php


namespace BabyYaml\Reader;


use BabyYaml\Reader\Exception\ParseErrorException;
use BabyYaml\Reader\KeyFinder\KeyFinder;
use BabyYaml\Reader\KeyFinder\KeyFinderInterface;
use BabyYaml\Reader\MultiLineCompiler\MultiLineCompilerInterface;
use BabyYaml\Reader\MultiLineCompiler\WithLeftMarginMultiLineCompiler;
use BabyYaml\Reader\MultiLineDelimiter\MultiLineDelimiterInterface;
use BabyYaml\Reader\MultiLineDelimiter\SingleCharMultiLineDelimiter;
use BabyYaml\Reader\Node\Node;
use BabyYaml\Reader\Node\NodeInterface;

class BabyYamlBuilder
{


    private $indentChar;
    private $nbIndentCharPerLevel;
    private $hasLeadingIndentChar;

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
    protected $options;


    // keep track of the file name to improve error messages
    private $file;
    private $_currentLineNb;

    //
    private $level2Node;
    private $lastNode;
    private $multiLineNode;
    private $multiLineLevel;
    private $indentCharLen;


    public function __construct(array $options = [])
    {
        $options = array_replace([
            'indentChar' => ' ',
            'nbIndentCharPerLevel' => 4,
            'hasLeadingIndentChar' => false,
        ], $options);

        $this->indentChar = $options['indentChar'];
        $this->nbIndentCharPerLevel = $options['nbIndentCharPerLevel'];
        $this->hasLeadingIndentChar = $options['hasLeadingIndentChar'];
        $this->indentCharLen = strlen($this->indentChar);

        $this->options = array_replace([
            /**
             * In this implementation, comments are stripped in the following cases:
             *      - it is the first symbol of the line
             *      - it is the first symbol of the value of the line (for lines that contain a key)
             *
             *
             */
            'commentSymbol' => '#',
            /**
             * keyMode: int
             *      0: no key
             *      1: mandatory keys
             *      2: optional keys
             */
            'keyMode' => 1,
            'useMultiline' => true,
        ], $options);
        $this->errors = [];
        $this->level2Node = [];


        //------------------------------------------------------------------------------/
        // BABYYAML BUILDER
        //------------------------------------------------------------------------------/
        $this->multiLineDelimiter = new SingleCharMultiLineDelimiter();
        $this->multiLineCompiler = new WithLeftMarginMultiLineCompiler();
        $this->keyFinder = new KeyFinder();
    }

    /**
     * @return int|false in case of failure,
     *                  in which case a codified error should be triggered.
     */
    protected function getLineLevel($line)
    {
        $len = strlen($line);
        $len2 = strlen(ltrim($line, $this->indentChar));
        $nbIndentChars = $len - $len2;

        if (true === $this->hasLeadingIndentChar) {
            if ($nbIndentChars > 0) {
                if (0 === ($nbIndentChars - 1) % $this->nbIndentCharPerLevel) {
                    return (int)(($nbIndentChars - 1) / $this->nbIndentCharPerLevel);
                } else {
                    $this->parseError('The number of dash starting a line must be equal to ' . $this->nbIndentCharPerLevel . 'n + 1, n being the level of the element');
                }
            } else {
                $this->parseError("A line must start with at least one indentChar (" . $this->indentChar . ")");
            }
        } else {
            if (0 !== $nbIndentChars % $this->nbIndentCharPerLevel) {
                $this->parseError('Number of indentChars (' . $this->indentChar . ') for indentation must be a multiple of ' . $this->nbIndentCharPerLevel . ', (' . $nbIndentChars . ' indentChars found)');
            }
            $level = ($nbIndentChars / $this->nbIndentCharPerLevel);
            return $level;
        }
        return 0;
    }


    /**
     * @return string|false in case of failure,
     *                  in which case a codified error should be triggered.
     *                  A line content is the line once the indentation symbols and
     *                  starting blank chars have been stripped out.
     */
    protected function getLineWithoutIndent($line)
    {
        if (1 === $this->indentCharLen) {
            return ltrim(ltrim($line, $this->indentChar));
        } else {
            while (0 === strpos($line, $this->indentChar)) {
                $line = substr($line, $this->indentCharLen);
            }
            return ltrim($line);
        }
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS NodeTreeBuilderInterface
    //------------------------------------------------------------------------------/
    /**
     * @return NodeInterface|false
     *
     *          false is returned in case of failure, in which case the errors
     *          are available through getErrors.
     */
    public function buildByFile($file)
    {
        $ret = false;
        if (file_exists($file)) {
            if (false !== $handle = fopen($file, 'rb')) { // triggers E_WARNING in case of failure
                $this->file = $file;
                $ret = $this->buildFromHandle($handle);
            } else {
                throw new \RuntimeException(sprintf("Invalid file, cannot open it: %s", $file));
            }
        } else {
            throw new \RuntimeException(sprintf("File not found: %s", $file));
        }
        return $ret;
    }

    public function buildByString($string)
    {
        // the comment below might be deprecated
        // I use this technique instead of the explode or preg_split technique,
        // because it keeps the carriage returns in multi-line mode.
        $ret = false;
        if (is_string($string)) {
            if (false !== $handle = fopen('php://memory', 'w+')) { // triggers E_WARNING in case of failure
                fwrite($handle, $string);
                rewind($handle);
                $ret = $this->buildFromHandle($handle);
            } else {
                throw new \RuntimeException(sprintf("Couldn't open the given string: %s", $string));
            }
        } else {
            throw new \InvalidArgumentException(sprintf("The first argument must be of type string, %s given", gettype($string)));
        }
        return $ret;
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
    }

    public function getKeyFinder()
    {
        if (null === $this->keyFinder) {
            $this->keyFinder = new KeyFinder();
        }
        return $this->keyFinder;
    }

    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function buildFromHandle($handle)
    {
        $ret = false;

        $previousLevel = -1;
        $this->_currentLineNb = 0;
        $root = new Node();
        $useMultiline = $this->options['useMultiline'];
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
             * Also this implies that multilines cannot have extra right spaces.
             * Remember that this is specific to this implementation, and was not defined in the conception (interface).
             *
             */
            $line = rtrim($line);
            $this->_currentLineNb++;
            $trimmed = trim($line);


            //------------------------------------------------------------------------------/
            // MULTI LINE MODE
            //------------------------------------------------------------------------------/
            if (true === $muliLineMode) {
                // is it the end of multiLine mode ?
                if (true === $multiLineDelimiter->isEnd($line)) {
                    $this->processMultiLines($multiLines, $multiLineCompiler);

                    // reset multi line mode to start back in normal mode
                    $multiLines = [];
                    $muliLineMode = false;
                } else {
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
                if (false !== $level = $this->getLineLevel($line)) {
                    if (false !== $lineContent = $this->getLineWithoutIndent($line)) {
                        $valuePos = 0;
                        if (false !== $key = $this->getKey($lineContent, $valuePos)) {

                            $value = ltrim(substr($lineContent, $valuePos));
                            $value = $this->stripLeadingComment($value);


                            $currentNode = new Node($value, $key);


                            if (true === $useMultiline && true === $multiLineDelimiter->isBegin($lineContent)) {
                                // starting a new multiLine ? let's store the Node for later resolving
                                $this->multiLineNode = $currentNode;
                                $this->multiLineLevel = $level;
                                $muliLineMode = true;
                                // the script must goes on, so that the multi-line Node will be at the right place in the node tree
                            }


                            // going to a deeper level
                            if ($level > $previousLevel) {
                                if ($level - $previousLevel > 1) {
                                    $this->parseError("You cannot go down more than one level at the time");
                                }
                                $lastNode = $this->getNodeAtLevel($previousLevel);
                                /**
                                 * @var NodeInterface $lastNode
                                 */
                                $lastNode->addChild($currentNode);
                            } // staying at the same level, or going up in a lower level
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
                        } else {
                            $this->parseError("Couldn't find the key for line: " . $line);
                        }
                    }
                }
            }
        }

        $this->processMultiLines($multiLines, $multiLineCompiler);
        $ret = $root;
        return $ret;
    }


    protected function skipLine($trimmedLine)
    {
        if ('' === $trimmedLine || 0 === strpos($trimmedLine, $this->options['commentSymbol'])) {
            return true;
        }
        return false;
    }


    /**
     * Parses the value (which starts at a non blank char), and if the first thing found is a comment,
     * it is stripped out, and the stripped value is returned.
     */
    protected function stripLeadingComment($value)
    {
        if (0 === strpos($value, $this->options['commentSymbol'])) {
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
        $keyMode = $this->options['keyMode'];
        if (0 === $keyMode) { // no keys
            return null;
        } elseif (1 === $keyMode) { // mandatory keys
            return $this->getKeyFinder()->getKey($lineContent, $valuePos);
        } elseif (2 === $keyMode) {
            $pos = $valuePos;
            $ret = $this->getKeyFinder()->getKey($lineContent, $pos);
            /**
             * In keyMode 2, if the key is not found we suppose that it is the value
             */
            if (false === $ret) {
                $ret = null;
            } else {
                // key found ? let's update the pos
                $valuePos = $pos;
            }
            return $ret;
        } else {
            throw new \RuntimeException(sprintf("Unknown keyMode %s", $keyMode));
        }
    }



    /**
     * @return NodeInterface
     */
    private function getNodeAtLevel($level)
    {
        if (array_key_exists($level, $this->level2Node)) {
            return $this->level2Node[$level];
        }
        throw new \LogicException(sprintf("No node was stored at level: %d, on line %s of file: %s", $level, $this->_currentLineNb, $this->file));
    }

    private function processMultiLines(array $multiLines, MultiLineCompilerInterface $compiler)
    {
        $multiLineNode = $this->multiLineNode;
        if ($multiLines && $multiLineNode instanceof NodeInterface) {
            $value = $compiler->getValue($multiLines, $this->multiLineLevel);
            $multiLineNode->setValue($value);
        }
    }

    private function parseError($msg)
    {
        if (null !== $this->file) {
            $msg .= ' on file ' . $this->file . ', ';
        }
        $msg .= 'line ' . $this->_currentLineNb;
        throw new ParseErrorException($msg);
    }
}