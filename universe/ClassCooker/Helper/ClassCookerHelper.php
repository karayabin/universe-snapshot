<?php


namespace ClassCooker\Helper;


use ClassCooker\Exception\ClassCookerException;

class ClassCookerHelper
{


    public static function createSectionComment($label, $tabIndent=1)
    {
        $sp = str_repeat("\t", $tabIndent);
        $s = <<<EEE
$sp//--------------------------------------------
$sp// $label
$sp//--------------------------------------------
EEE;


        return $s;
    }

    //--------------------------------------------
    // THIS IS A SECTION
    //--------------------------------------------
    /**
     *
     * A section is a special type of comment written on 3 lines, it looks like the one just above this comment.
     * It's easier to find a section if your section label contains only alpha-numeric chars (see the source code
     * of this method to understand why).
     *
     *
     *
     * @param $sectionLabel
     * @param $file
     * @return false|int, return the number of the line (in the file) of the beginning of the section comment,
     *          or false if the section wasn't found
     */
    public static function getSectionLineNumber($sectionLabel, $file)
    {
        $lines = file($file);


        $patternLine = '!//--------------------------------------------!';
        $pattern2 = '!//\s*' . $sectionLabel . '!'; // we want the user to have regex power if needed, so no escaping here
        $n = 1;
        $match1 = false;
        $match2 = false;
        foreach ($lines as $line) {
            if (false === $match1 && preg_match($patternLine, $line)) {
                $match1 = true;
            } elseif (true === $match1 && false === $match2 && preg_match($pattern2, $line)) {
                $match2 = true;
            } elseif (true === $match1 && true === $match2 && preg_match($patternLine, $line)) {
                return $n - 2;
            }
            $n++;
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
     * @throws ClassCookerException
     */
    public static function getMethodsBoundaries(string $file, array $signatureTags = []): array
    {
        $ret = [];
        $preret = [];

        $captureFunctionNamePattern = '!function\s+([a-zA-Z0-9_]+)\s*\(.*\)!';


        if (file_exists($file)) {
            $lines = file($file);


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


                    $tags = self::getTagsByLine($info[1]);

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

        } else {
            throw new ClassCookerException("File not found: $file");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getTagsByLine($line)
    {
        $p = explode('function', $line, 2);
        $tags = explode(' ', $p[0]);
        $tags = array_filter(array_map(function ($v) {
            $v = trim(strtolower($v));
            return $v;
        }, $tags));
        return $tags;
    }
}