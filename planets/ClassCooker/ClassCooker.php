<?php


namespace ClassCooker;


use ClassCooker\Exception\ClassCookerException;

class ClassCooker
{

    private $file;

    public static function create()
    {
        return new static();
    }

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Remove the given method from the class,
     * or does nothing if the method was not found
     */
    public function removeMethod($methodName)
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
     * Get the method content, by default including the signature and the wrapping curly brackets
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
     * Adds a method to a class if it doesn't exist
     */
    public function addMethod($methodName, $content)
    {
        $methods = $this->getMethodsBoundaries();
        $nbMethod = count($methods);
        if (false === array_key_exists($methodName, $methods)) {

            $lines = $this->getLines();

            if ($nbMethod > 0) {

                $lastMethodInfo = array_pop($methods);
                list($startLine, $endLine) = $lastMethodInfo;
                $lineNumber = $endLine;

            } else {
                $nbLines = count($lines);
                $index = $nbLines - 1;

                while ($index >= 0) {
                    $line = $lines[$index];
                    if ('}' === trim($line)) {
                        break;
                    }
                    $index--;
                }
                $lineNumber = $index;
            }

            $sliceOne = array_slice($lines, 0, $lineNumber);
            $sliceTwo = array_slice($lines, $lineNumber);
            $sliceOneContent = implode("", $sliceOne);
            $sliceTwoContent = implode("", $sliceTwo);
            $c = $sliceOneContent . PHP_EOL . $content . $sliceTwoContent;
            return file_put_contents($this->file, $c);
        } else {
            return true;
        }
    }

    public function updateMethodContent($methodName, callable $updator)
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
     * Get the method names
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
     * See getMethodsBoundaries for more info.
     */
    public function getMethodBoundariesByName($methodName)
    {
        $boundaries = $this->getMethodsBoundaries();
        if (array_key_exists($methodName, $boundaries)) {
            return $boundaries[$methodName];
        }
        return false;
    }


    /**
     * This method will get the startLine and endLine number of every methods it finds.
     * However, in order for this method to work correctly, the class needs to be formatted in a certain way:
     *
     * - there must be only one class in the file
     * - the class ends with a proper } (end curly bracket) on its own line (possibly surrounded with whitespaces)
     * - the method signature is on its own line, and only one line (not split in multiple lines)
     * - a method ends with a proper } (end curly bracket) on its own line (possibly surrounded with whitespaces)
     *
     *
     * $signatureTags: array of desired tags, a tag can be one of the following:
     *                      - public
     *                      - protected
     *                      - private
     *                      - static
     *
     *
     *
     * @return array of method => [startLine, endLine]
     */
    public function getMethodsBoundaries(array $signatureTags = [])
    {
        $ret = [];
        $preret = [];

        $captureFunctionNamePattern = '!function\s+([a-zA-Z0-9_]+)\s*\(.*\)!';

        $lines = $this->getLines();
        $lineNumber = 1;
        $endBrackets = [];
        $methods = [];

        // first capture all method signatures, and all possible end brackets
        foreach ($lines as $line) {
            $line = trim($line);
            if (0 === strpos($line, '//')) {
                $lineNumber++;
                continue;
            }
            if (preg_match($captureFunctionNamePattern, $line, $match)) {
                $func = $match[1];
                $methods[] = [$func, $line, $lineNumber];
            }
            if ('}' === $line) {
                $endBrackets[] = $lineNumber;
            }
            $lineNumber++;
        }

        // now let's bind the end brackets back to the methods they belong to
        // the very last bracket must be the class' one, we don't need it
        array_pop($endBrackets);


        // then the last one in the current list must be the end line of the last method
        $nbMethods = count($methods);

        if (count($endBrackets) >= $nbMethods) {
            foreach ($methods as $k => $info) {
                $startLine = $info[2];


                $tags = $this->getTagsByLine($info[1]);

                if (array_key_exists($k + 1, $methods)) {
                    $nextInfo = $methods[$k + 1];
                    $nextStartLine = $nextInfo[2];
                    $lastEndLine = 0;
                    foreach ($endBrackets as $endLine) {
                        if ($endLine > $nextStartLine) {
                            $preret[$info[0]] = [$startLine, $lastEndLine, $tags];
                            break;
                        }
                        $lastEndLine = $endLine;
                    }
                } else {
                    $endLine = array_pop($endBrackets);
                    $preret[$info[0]] = [$startLine, $endLine, $tags];
                }
            }

            $n = count($signatureTags);
            foreach ($preret as $func => $v) {
                $tags = array_pop($v);
                if ($n > 0) {
                    foreach ($signatureTags as $tag) {
                        if (false === in_array($tag, $tags, true)) {
                            continue 2;
                        }
                    }
                }
                $ret[$func] = $v;
            }

            return $ret;
        } else {
            throw new ClassCookerException("Class not well formatted, please read the doc carefully");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        throw new ClassCookerException($msg);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getLines()
    {
        if (file_exists($this->file)) {
            return file($this->file);
        }
        throw new ClassCookerException("file not found: " . $this->file);
    }


    private function getTagsByLine($line)
    {
        $p = explode('function', $line, 2);
        $tags = explode(' ', $p[0]);
        $tags = array_filter(array_map(function ($v) {
            $v = trim(strtolower($v));
            return $v;
        }, $tags));
        return $tags;
    }

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
     * @param array $slice
     * @param array $originalWrappers , will contain three keys: first, next, and last
     * @return string
     */
    private function getInnerContentByMethodSlice(array $slice, array &$originalWrappers = [])
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