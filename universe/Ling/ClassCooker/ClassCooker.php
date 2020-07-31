<?php


namespace Ling\ClassCooker;


use Ling\Bat\ClassTool;
use Ling\Bat\FileTool;
use Ling\ClassCooker\Exception\ClassCookerException;
use Ling\ClassCooker\Helper\ClassCookerHelper;
use Ling\TokenFun\TokenFinder\ClassNameTokenFinder;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The ClassCooker class.
 */
class ClassCooker
{

    /**
     * Path to the file containing the class.
     *
     * @var string
     */
    private $file;


    /**
     * Creates a new instance of this class, and returns it.
     *
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Sets the file to work with.
     *
     * @param $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds a string to the class.
     * The string can be any string that fits in a class: a method, multiple methods, a property, some comments, etc...
     *
     * By default, the string is appended at the end of the class.
     * You can define the location where you want to add the string with the options.
     *
     *
     * Available options are:
     * - firstMethod: bool=false, if true, the string will be appended as the first method
     * - beforeMethod: string, the method before which to append the string
     * - afterMethod: string, the method after which to append the string
     *
     * - beforeProperty: string, the property before which to append the string
     * - afterProperty: string, the property after which to append the string
     *
     * - classStart: bool=false, the string will be appended at the beginning of the class
     *
     *
     * Note: in most of the cases, you want the content to end up with the PHP_EOL char,
     * otherwise this might lead to unexpected/weird results.
     *
     *
     *
     * @param string $content
     * @param array $options
     */
    public function addContent(string $content, array $options = [])
    {

        $insertLine = null;


        if (array_key_exists("firstMethod", $options) && true === $options['firstMethod']) {

            $methods = $this->getMethodsBasicInfo();
            if ($methods) {
                $firstItem = array_shift($methods);
                $firstMethod = $firstItem['name'];
                $options['beforeMethod'] = $firstMethod;
            } else {
                $properties = TokenFinderTool::getClassPropertyBasicInfo($this->getClassName());
                if ($properties) {
                    $lastItem = array_pop($properties);
                    $lastProperty = $lastItem['varName'];
                    $options['afterProperty'] = $lastProperty;
                }
            }
        }


        if (array_key_exists("afterMethod", $options)) {
            $method = $options['afterMethod'];
            $methods = $this->getMethodsBasicInfo();
            if (false === array_key_exists($method, $methods)) {
                $this->error("The method \"$method\" was not found in this class.");
            }
            $methodInfo = $methods[$method];
            $insertLine = $methodInfo['endLine'] + 1;

        } elseif (array_key_exists("beforeMethod", $options)) {
            $method = $options['beforeMethod'];
            $methods = $this->getMethodsBasicInfo();
            if (false === array_key_exists($method, $methods)) {
                $this->error("The method \"$method\" was not found in this class.");
            }
            $methodInfo = $methods[$method];
            $insertLine = $methodInfo['startLine'];
        } elseif (array_key_exists("afterProperty", $options)) {
            $property = $options['afterProperty'];
            $properties = TokenFinderTool::getClassPropertyBasicInfo($this->getClassName());
            if (false === array_key_exists($property, $properties)) {
                $this->error("The property \"$property\" was not found in this class.");
            }
            $propertyInfo = $properties[$property];
            $insertLine = $propertyInfo['endLine'] + 1;

        } elseif (array_key_exists("beforeProperty", $options)) {
            $property = $options['beforeProperty'];
            $properties = TokenFinderTool::getClassPropertyBasicInfo($this->getClassName());
            if (false === array_key_exists($property, $properties)) {
                $this->error("The property \"$property\" was not found in this class.");
            }
            $propertyInfo = $properties[$property];
            $startLine = $propertyInfo['commentStartLine'];
            if (false === $startLine) {
                $startLine = $propertyInfo['startLine'];
            }
            $insertLine = $startLine;

        } elseif (array_key_exists("classStart", $options) && true === $options['classStart']) {
            $properties = TokenFinderTool::getClassPropertyBasicInfo($this->getClassName());

            if ($properties) { // insert before first property...

                $firstProperty = array_shift($properties);
                $startLine = $firstProperty['commentStartLine'];
                if (false === $startLine) {
                    $startLine = $firstProperty['startLine'];
                }
                $insertLine = $startLine;
            } else {
                $methods = $this->getMethodsBasicInfo();
                if ($methods) // ...or else insert before first method...
                {
                    $methodInfo = array_shift($methods);
                    $insertLine = $methodInfo['startLine'];
                } else { // ...or else insert before the class end
                    $lastInfo = $this->getClassLastLineInfo();
                    $insertLine = $lastInfo['endLine'];
                }
            }
        } else {
            $lastInfo = $this->getClassLastLineInfo();
            $insertLine = $lastInfo['endLine'];
        }


        FileTool::insert($insertLine, $content, $this->file);
    }

    /**
     * Adds the given method(s) to a class if it doesn't exist.
     *
     * By default, it's appended at the end of the class, but you can decide to put it after a given method, using
     * the afterMethod option.
     *
     * By default if the method already exists, an exception will be thrown.
     * You can change this behaviour using the throwEx option.
     *
     *
     * Available options are:
     * - afterMethod: string, the name of the method after which you wish to add the new method
     * - throwEx: bool=true, whether to throw an exception if the given methodName already exists in the class.
     *      If false and the method already exists, the method will return false.
     *
     *
     *
     *
     * @param $methodName
     * @param $content
     * @param array $options
     * @return false|void
     * @throws \Exception
     */
    public function addMethod($methodName, $content, array $options = [])
    {

        if (true === $this->hasMethod($methodName)) {
            $throwEx = $options['throwEx'] ?? true;
            if (true === $throwEx) {
                $this->error("The method \"$methodName\" already exists in the class.");
            }
            return false;
        }
        $this->addContent($content, $options);
    }


    /**
     *
     * Adds a property to the current class.
     *
     * If the property already exists, an exception will be thrown.
     * By default, the property is written below the last property if any.
     * If not, it's written before the first method of the class if any.
     * If not, it's added at the beginning of the class (just after the class declaration).
     *
     *
     * But you can use options to define the property position manually.
     *
     *
     * Available options are:
     * - afterProperty: string, the name of the property to use as a target (the new property will be written after it)
     * - beforeProperty: string, the name of the property to use as a target (the new property will be written before it)
     * - top: bool=false, if true, the property will be appended at the top of the class. This has higher precedence than the afterProperty option.
     *
     *
     *
     *
     * @param string $name
     * @param string $content
     * @param array $options
     * @throws \Exception
     */
    public function addProperty(string $name, string $content, array $options = [])
    {

        $className = $this->getClassName();
        $classProps = TokenFinderTool::getClassPropertyBasicInfo($className);
        if (array_key_exists($name, $classProps)) {
            $this->error("The property \"$name\" already exists in that class.");
        }


        $classMethods = $this->getMethodsBasicInfo();
        $classFirstEmptyLine = $this->getClassFirstEmptyLine();
        $afterProperty = $options['afterProperty'] ?? null;
        $beforeProperty = $options['beforeProperty'] ?? null;
        $top = $options['top'] ?? false;

        if (true === $top) {
            $line = $classFirstEmptyLine;
            if (false === $line) {
                $info = $this->getClassLastLineInfo();
                $line = $info['endLine'] - 1;
            }
            FileTool::insert($line, $content, $this->file);
        } else {


            if (null === $afterProperty && null === $beforeProperty) {
                if ($classProps) {
                    $lastProp = array_pop($classProps);
                    $number = $lastProp['endLine'] + 1;
                    FileTool::insert($number, $content, $this->file);
                } elseif ($classMethods) {
                    $firstMethod = array_shift($classMethods);
                    $line = $firstMethod['startLine'];
                    FileTool::insert($line, $content, $this->file);
                } else {
                    $line = $classFirstEmptyLine;
                    if (false === $line) {
                        $info = $this->getClassLastLineInfo();
                        $line = $info['endLine'] - 1;
                    }
                    FileTool::insert($line, $content, $this->file);
                }

            } else {
                if (null !== $afterProperty) {
                    if (array_key_exists($afterProperty, $classProps)) {
                        $prop = $classProps[$afterProperty];
                        $line = $prop['endLine'] + 1;
                        FileTool::insert($line, $content, $this->file);
                    } else {
                        $this->error("The property \"$afterProperty\" was not found in that class ($className).");
                    }
                } elseif (null !== $beforeProperty) {
                    if (array_key_exists($beforeProperty, $classProps)) {
                        $prop = $classProps[$beforeProperty];
                        $line = $prop['startLine'];
                        FileTool::insert($line, $content, $this->file);
                    } else {
                        $this->error("The property \"$beforeProperty\" was not found in that class ($className).");
                    }
                }
            }
        }
    }


    /**
     * Adds the given use statement(s) to the class, if it doesn't exist.
     *
     * The statement must look like this (including the semi-colon at the end, but not the PHP_EOL at the very end):
     *
     * - use Ling\Light_Logger\LightLoggerService;
     *
     *
     * @param string|array $useStatements
     */
    public function addUseStatements($useStatements)
    {
        if (false === is_array($useStatements)) {
            $useStatements = [$useStatements];
        }


        $useStatementsInfo = ClassTool::getUseStatementsInfoByFile($this->file);
        if ($useStatementsInfo) {
            $lastStatement = array_pop($useStatementsInfo);
            $lineNumber = $lastStatement[1];
            $newContent = $lastStatement[0];
            $newContent .= implode(PHP_EOL, $useStatements) . PHP_EOL;
            FileTool::replace($this->file, $lineNumber, $lineNumber, $newContent);


        } else {
            /**
             * If there is no useStatement, we want to use a free line, below the namespace if any,
             * or if there is no namespace, we use the line before the class definition.
             *
             * If there is no class definition, we throw an exception.
             *
             */
            $lineNumber = ClassTool::getNamespaceLineNumberByFile($this->file);
            if (false !== $lineNumber) {
                $newContent = FileTool::getContent($this->file, $lineNumber, $lineNumber);
                $newContent .= PHP_EOL . implode(PHP_EOL, $useStatements) . PHP_EOL;
                FileTool::replace($this->file, $lineNumber, $lineNumber, $newContent);
            } else {
                $lineNumber = ClassTool::getClassStartLineByFile($this->file);
                $newContent = FileTool::getContent($this->file, $lineNumber, $lineNumber);
                $newContent = PHP_EOL . implode(PHP_EOL, $useStatements) . PHP_EOL . $newContent;
                FileTool::replace($this->file, $lineNumber, $lineNumber, $newContent);
            }
        }
    }


    /**
     * Returns the method content, by default including the signature and the wrapping curly brackets.
     *
     *
     * @param $methodName
     * @param bool $includeWrap
     * @return bool|string
     * @throws ClassCookerException
     */
    public function getMethodContent($methodName, $includeWrap = true)
    {
        if (false !== ($boundaries = $this->getMethodBoundariesByName($methodName))) {
            list($startLine, $endLine) = $boundaries;
            $this->checkBoundaries($startLine, $endLine);

            $lines = $this->getLines();
            $slice = array_slice($lines, $startLine - 1, $endLine - $startLine + 1);
            if (false === $includeWrap) {
                return $this->getInnerContentByMethodSlice($slice);
            }
            return implode("", $slice);
        }
        return false;
    }


    /**
     * Returns the given method' signature, or false if the method doesn't exist.
     *
     * @param $methodName
     * @return bool|string
     * @throws \Exception
     */
    public function getMethodSignature($methodName)
    {
        if (false !== ($content = $this->getMethodContent($methodName, true))) {
            $pattern = '!^.*function\s+[a-zA-Z0-9_]+\s*\(.*\)\s*{!U';
            if (preg_match($pattern, $content, $match)) {
                $line = trim($match[0]);
                $line = rtrim($line, '{');
                return trim($line);
            }
        }
        return false;
    }


    /**
     * Returns the class name of the current class (i.e. the first class found in the file this class is working on).
     *
     * @return string
     */
    public function getClassName(): string
    {
        return ClassTool::getClassNameByFile($this->file);
    }


    /**
     * Return an array of all the method signatures of the current class.
     *
     * @param array $signatureTags
     * @return array
     * @throws \Exception
     */
    public function getMethods(array $signatureTags = [])
    {
        $captureFunctionNamePattern = '!function\s+([a-zA-Z0-9_]+)\s*\(.*\)!';

        $lines = $this->getLines();
        $ret = [];
        $n = count($signatureTags);

        // first capture all method signatures, and all possible end brackets
        foreach ($lines as $line) {
            $line = trim($line);
            if (0 === strpos($line, '//')) {
                continue;
            }
            if (preg_match($captureFunctionNamePattern, $line, $match)) {
                $func = $match[1];
                $tags = $this->getTagsByLine($line);

                if ($n > 0) {
                    foreach ($signatureTags as $tag) {
                        if (false === in_array($tag, $tags, true)) {
                            continue 2;
                        }
                    }
                }
                $ret[] = $func;
            }
        }
        return $ret;
    }

    /**
     * Get the boundaries for a given method.
     *
     * See getMethodsBoundaries for more info.
     *
     * @param string $methodName
     * @return bool|mixed
     */
    public function getMethodBoundariesByName(string $methodName)
    {
        $boundaries = $this->getMethodsBoundaries();
        if (array_key_exists($methodName, $boundaries)) {
            return $boundaries[$methodName];
        }
        return false;
    }


    /**
     * Proxy to the @page(ClassCookerHelper::getMethodsBoundaries) method.
     * @param array $signatureTags
     * @return array
     * @throws \Exception
     */
    public function getMethodsBoundaries(array $signatureTags = [])
    {
        return ClassCookerHelper::getMethodsBoundaries($this->file, $signatureTags);
    }

    /**
     * Returns whether the class contains the given method.
     *
     *
     * @param string $method
     * @return bool
     */
    public function hasMethod(string $method): bool
    {
        $tokens = token_get_all(file_get_contents($this->file));
        $methods = TokenFinderTool::getMethodsInfo($tokens);
        return array_key_exists($method, $methods);
    }


    /**
     * Returns whether the current class has a parent.
     * @return bool
     */
    public function hasParent(): bool
    {
        $tokens = token_get_all(file_get_contents($this->file));
        $res = TokenFinderTool::getParentClassName($tokens, false);
        return (false !== $res);
    }


    /**
     * Returns the parent symbol if any, or false otherwise.
     *
     * The parent symbol is the word written after the "extends" keyword.
     *
     * @return false|string
     */
    public function getParentSymbol()
    {
        $tokens = token_get_all(file_get_contents($this->file));
        return TokenFinderTool::getParentClassName($tokens, false);
    }


    /**
     *
     * Returns an array of propertyName => informationItem about the class methods, in the order they appear in the class file.
     *
     * Each information item is an array with the following structure:
     *
     * - name: string, the method name
     * - isPublic: bool
     * - isProtected: bool
     * - isPrivate: bool
     * - isStatic: bool
     * - isFinal: bool
     * - isAbstract: bool
     * - docComment: string|false, the doc comment's content if any, or false otherwise
     * - startLine: int, the line where the method starts, this includes the docComment if any
     * - endLine: int, the line where the method ends
     *
     *
     *
     *
     * @return array
     * @throws \Exception
     */
    public function getMethodsBasicInfo(): array
    {

        $ret = [];
        /**
         * Note: using token based method, as reflection cannot handle dynamic changes in a file.
         * https://stackoverflow.com/questions/63016358/php-refreshing-reflectionclass-after-dynamic-change
         */


        $tokens = token_get_all(file_get_contents($this->file));
        $methods = TokenFinderTool::getMethodsInfo($tokens);

        foreach ($methods as $method) {


            $docComment = false;
            if ('docBlock' === $method['commentType']) {
                $docComment = $method['comment'];
            }
            $name = $method['name'];
            $visibility = $method['visibility'];
            $abstract = $method['abstract'];
            $final = $method['final'];
            $static = $method['static'];
            $startLine = $method['methodStartLine'];
            if (null !== $method['commentStartLine']) {
                $startLine = $method['commentStartLine'];
            }

            $ret[$name] = [
                "name" => $name,
                "isPublic" => ('public' === $visibility),
                "isProtected" => ('protected' === $visibility),
                "isPrivate" => ('private' === $visibility),
                "isStatic" => $static,
                "isFinal" => $final,
                "isAbstract" => $abstract,
                "docComment" => $docComment,
                "startLine" => $startLine,
                "endLine" => $method['methodEndLine'],
            ];
        }


        return $ret;
    }


    /**
     * Returns the number of the start line of the class.
     *
     * @return int
     * @throws \Exception
     */
    public function getClassStartLine(): int
    {
        $tokens = token_get_all(file_get_contents($this->file));
        $classNameFinder = new ClassNameTokenFinder();
        $matches = $classNameFinder->find($tokens);
        $firstMatch = array_shift($matches);
        if ($firstMatch) {
            $index = $firstMatch[0];
            $token = $tokens[$index];
            return $token[2];
        } else {
            $this->error("Unable to find the class' first character.");
        }
    }

    /**
     * Returns the number of the first empty line found after the class declaration, or false if there is no empty line.
     *
     * Note: a line containing only white-spaces is considered empty.
     *
     *
     *
     * @return int|false
     */
    public function getClassFirstEmptyLine()
    {
        $startLine = $this->getClassStartLine();
        $lines = file($this->file);
        $classLines = array_slice($lines, $startLine);
        foreach ($classLines as $index => $line) {
            $line = trim($line);
            if ('' === $line) {
                return $startLine + $index + 1;
            }
        }
        return false;
    }


    /**
     * Returns an array containing information related to the end of the class.
     *
     * Important note, this method assumes that:
     *
     * - the parsed php file contains valid php code
     * - the parsed php file contains only one class
     *
     * If either the above assumptions are not true, then this method won't work properly.
     *
     *
     *
     * The returned array has the following structure:
     *
     *
     * - endLine: int, the number of the line containing the class declaration's last char
     * - lastLineContent: string, the content of the last line being part of the class declaration
     *
     *
     * @return array
     */
    public function getClassLastLineInfo(): array
    {

        $lastLineNumber = null;
        $lastLineContent = null;


        $lines = file($this->file);
        $reversedLines = array_reverse($lines);
        foreach ($reversedLines as $k => $line) {
            if ('}' === trim($line)) {
                $n = count($lines);
                $lastLineNumber = $n - $k;
                $lastLineContent = $line;
                break;
            }
        }

        return [
            "endLine" => $lastLineNumber,
            "lastLineContent" => $lastLineContent,
        ];
    }


    /**
     * Returns whether the current class contains the given property.
     *
     * @param string $propertyName
     * @return bool
     */
    public function hasProperty(string $propertyName): bool
    {
        $props = TokenFinderTool::getClassPropertyBasicInfo($this->getClassName());
        return array_key_exists($propertyName, $props);
    }

    /**
     * Returns whether the current class contains an use statement which references the given useStatementClass.
     *
     * Note: use statement aliases are ignored.
     *
     *
     * @param string $useStatementClass
     * @return bool
     */
    public function hasUseStatement(string $useStatementClass): bool
    {
        return ClassTool::hasUseStatementByFile($this->file, $useStatementClass);
    }


    /**
     * Returns whether the given symbol is defined in the use statements.
     *
     * A symbol is either:
     * - the alias of an use statement
     * - the last component of the use statement
     *
     *
     * @param string $symbol
     * @return bool
     */
    public function hasUseStatementSymbol(string $symbol): bool
    {
        $useStatements = ClassTool::getUseStatements($this->getClassName(), true);
        foreach ($useStatements as $useStatement) {
            $p = explode('\\', $useStatement);
            $useStatementSymbol = array_pop($p);
            if ($symbol === $useStatementSymbol) {
                return true;
            }
        }
        return false;
    }

    /**
     * Remove the given method from the class,
     * or does nothing and returns false if the method was not found.
     *
     * @param string $methodName
     * @return false|int
     * @throws \Exception
     */
    public function removeMethod(string $methodName)
    {
        if (false !== ($boundaries = $this->getMethodBoundariesByName($methodName))) {
            list($startLine, $endLine) = $boundaries;
            $this->checkBoundaries($startLine, $endLine);

            $lines = $this->getLines();

            $sliceOne = array_slice($lines, 0, $startLine - 1);
            $sliceTwo = array_slice($lines, $endLine);

            $merge = array_merge($sliceOne, $sliceTwo);
            $newContent = implode("", $merge);
            return file_put_contents($this->file, $newContent);
        }
        return false;
    }


    /**
     * Updates the inner content of a method, using a callable.
     *
     * The callable signature is:
     * - fn ( string innerContent ): string
     *
     * It returns the updated method content.
     *
     *
     *
     * @param string $methodName
     * @param callable $updator
     * @return false|int
     * @throws \Exception
     */
    public function updateMethodContent(string $methodName, callable $updator)
    {
        if (false !== ($boundaries = $this->getMethodBoundariesByName($methodName))) {
            list($startLine, $endLine) = $boundaries;
            $this->checkBoundaries($startLine, $endLine);

            $lines = $this->getLines();

            $sliceOne = array_slice($lines, 0, $startLine - 1);
            $sliceTwo = array_slice($lines, $endLine);


            $slice = array_slice($lines, $startLine - 1, $endLine - $startLine + 1);
            $wrappers = [];
            $innerContent = $this->getInnerContentByMethodSlice($slice, $wrappers);

            $originalFirstLine = $wrappers['first'];
            $originalNextLine = $wrappers['next'];
            $originalLastLine = $wrappers['last'];


            $newInnerContent = call_user_func($updator, $innerContent);

            $sliceOneContent = implode("", $sliceOne);
            $sliceTwoContent = implode("", $sliceTwo);
            $content = $sliceOneContent
                . $originalFirstLine
                . $originalNextLine
                . $newInnerContent
                . $originalLastLine
                . $sliceTwoContent;


            return file_put_contents($this->file, $content);


        }
        return false;
    }

    /**
     * Updates the class signature using the given callable.
     *
     * The given callable has the following signature:
     *
     * - fn ( string oldSignature ): string
     *
     *
     * It returns the new signature.
     *
     *
     * @param callable $fn
     */
    public function updateClassSignature(callable $fn)
    {

        /**
         * Note to myself: this method heuristic is not error proof:
         * it will fail if the class signature contains comment which contains some keywords like extends for instance.
         *
         * Alternatively, we could use a purely token based method, just
         * loop through the tokens directly, and insert your tokens directly into the tokens array, and use the
         * TokenTool::tokensToString to put it back to a string.
         * I didn't do it here because the current implementation below was faster, and I was a bit lazy, and I thought
         * that this would work in most cases, but if it fails, well, you have to implement a more robust heuristic.
         */
        $tokens = token_get_all(file_get_contents($this->file));
        $info = TokenFinderTool::getClassSignatureInfo($tokens);


        /**
         * Since we use line based replacement, we won't use the signature provided
         * by the TokenFinderTool, we will extract our own signature strings based
         * on line numbers instead.
         */
        list($signature, $startLine, $endLine) = $info;
        $signature = trim($signature);
        $newSignature = call_user_func($fn, $signature);

        $content = FileTool::getContent($this->file, $startLine, $endLine);
        $newContent = str_replace($signature, $newSignature, $content);
        FileTool::replace($this->file, $startLine, $endLine, $newContent);
    }


    /**
     * Adds a parent class to the current service class.
     * Throws an exception if the class already has a parent.
     *
     * @param string $parentName
     * @throws \Exception
     */
    public function addParentClass(string $parentName)
    {
        $this->updateClassSignature(function ($signatureContent) use ($parentName) {
            $phpSig = '<?php ' . PHP_EOL;
            $phpSig .= $signatureContent;
            $tokens = token_get_all($phpSig);
            if (true === TokenTool::matchAny(T_EXTENDS, $tokens)) {
                $className = $this->getClassName();
                $this->error("Will not add parent to class \"$className\" because it already has one.");
            }

            $part1 = null;
            $part2 = null; // implements part
            $part3 = null;

            $p = preg_split('!(\s+implements\s+)!im', $signatureContent, 2, \PREG_SPLIT_DELIM_CAPTURE);
            if (3 === count($p)) {
                list($part1, $part2, $part3) = $p;
            } else {
                $part1 = array_shift($p);
            }

            $signature = $part1 . " extends $parentName";
            if (null !== $part2) {
                $signature .= $part2 . $part3;
            }

            $signature = trim($signature); // not mandatory, but my personal preference
            return $signature;
        });
    }


    /**
     * Updates the @page(docblock comment) of the given property (if there is one), using the given callable.
     *
     * The given callable takes the old comment as input, and must return the new comment.
     *
     * This method will return false if the property doesn't exist or if it doesn't have a block comment.
     *
     * Otherwise it returns true.
     *
     *
     * Available options are:
     * - guessExtraSpacing: bool=true, when the comment is extracted from its class, it's stripped.
     *      Therefore, when we paste it back in place, the whitespaces before and after the comment are removed and
     *      it results in an ugly file (although functional).
     *      To remedy this, this method makes a guess about what those whitespaces were, basically adding
     *      4 spaces before the comment, and a PHP_EOL after.
     *      You can disable this behaviour to have complete control over that extra-spacing.
     *
     *
     *
     *
     *
     * @param string $propertyName
     * @param array $options
     * @param callable $fn
     */
    public function updatePropertyComment(string $propertyName, callable $fn, array $options = [])
    {

        $guessExtraSpacing = $options['guessExtraSpacing'] ?? true;

        $className = $this->getClassName();
        $props = TokenFinderTool::getClassPropertyBasicInfo($className);
        if (array_key_exists($propertyName, $props)) {
            $prop = $props[$propertyName];
            if (true === $prop['hasDocComment']) {

                $oldComment = $prop['docComment'];
                $newComment = call_user_func($fn, $oldComment);


                if (true === $guessExtraSpacing) {
                    $newComment = '    ' . $newComment . PHP_EOL;
                }


                $commentStartLine = $prop['commentStartLine'];
                $commentEndLine = $prop['commentEndLine'];
                FileTool::replace($this->file, $commentStartLine, $commentEndLine, $newComment);
                return true;
            }
        }

        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param $msg
     * @throws ClassCookerException
     */
    protected function error($msg)
    {
        throw new ClassCookerException($msg);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array containing the lines of the class file.
     *
     * @return array|false
     * @throws ClassCookerException
     */
    private function getLines()
    {
        if (file_exists($this->file)) {
            return file($this->file);
        }
        throw new ClassCookerException("file not found: " . $this->file);
    }


    /**
     * Returns the tags found in the given line.
     *
     * @param string $line
     * @return array
     */
    private function getTagsByLine(string $line): array
    {
        $p = explode('function', $line, 2);
        $tags = explode(' ', $p[0]);
        $tags = array_filter(array_map(function ($v) {
            $v = trim(strtolower($v));
            return $v;
        }, $tags));
        return $tags;
    }


    /**
     * Checks that the boundaries are safe to work with, and throws an exception if that's not the case.
     *
     * @param $startLine
     * @param $endLine
     * @return bool
     * @throws \Exception
     */
    private function checkBoundaries($startLine, $endLine)
    {
        if ($startLine > 0) {
            $lines = $this->getLines();
            $nbLines = count($lines);
            if ($endLine <= $nbLines) {
                return true;

            } else {
                $this->error("End line cannot exceed the number of lines of the file ($nbLines lines in file " . $this->file . ")");
            }
        } else {
            $this->error("Start line cannot be less than zero");
        }
        return false;
    }


    /**
     * Returns the inner content of a method by using a slice.
     *
     * @param array $slice
     * @param array $originalWrappers , will contain three keys: first, next, and last
     * @return string
     */
    private function getInnerContentByMethodSlice(array $slice, array &$originalWrappers = []): string
    {
        $innerContent = "";
        $sliceCopy = $slice;
        $firstLine = array_shift($sliceCopy);
        $lastLine = array_pop($sliceCopy);
        $originalFirstLine = $firstLine;
        $originalLastLine = $lastLine;
        $originalNextLine = "";


        if ('}' === trim($lastLine)) {
            $firstLine = trim($firstLine);
            if ('{' !== substr($firstLine, -1)) {
                $nextLine = array_shift($sliceCopy);
                $originalNextLine = $nextLine;
                $nextLine = trim($nextLine);
                if ('{' !== $nextLine) {
                    /**
                     * A method opening bracket must be either at the end of the signature,
                     * or on the next line alone on its line.
                     */
                    $this->error("Invalid class method formatting");
                }
            }
            $innerContent = implode('', $sliceCopy);
        } else {
            $this->error("Invalid class formatting");
        }
        $originalWrappers["first"] = $originalFirstLine;
        $originalWrappers["next"] = $originalNextLine;
        $originalWrappers["last"] = $originalLastLine;

        return $innerContent;
    }
}