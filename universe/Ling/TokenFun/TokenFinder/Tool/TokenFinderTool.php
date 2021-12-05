<?php


namespace Ling\TokenFun\TokenFinder\Tool;

use Ling\Bat\ClassTool;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\DirScanner;
use Ling\TokenFun\Exception\TokenFunException;
use Ling\TokenFun\Parser\UseStatementsParser;
use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\TokenFinder\ClassNameTokenFinder;
use Ling\TokenFun\TokenFinder\ClassPropertyTokenFinder;
use Ling\TokenFun\TokenFinder\ClassSignatureTokenFinder;
use Ling\TokenFun\TokenFinder\InterfaceTokenFinder;
use Ling\TokenFun\TokenFinder\MethodTokenFinder;
use Ling\TokenFun\TokenFinder\NamespaceTokenFinder;
use Ling\TokenFun\TokenFinder\ParentClassNameTokenFinder;
use Ling\TokenFun\Tool\TokenTool;


/**
 * The TokenFinderTool class.
 */
class TokenFinderTool
{


    /**
     *
     * Replace the matches with their actual content.
     *
     * The matches parameter is the array of matches as returned by a TokenFinder object.
     *
     * @param array $matches
     * @param array $tokens
     */
    public static function matchesToString(array &$matches, array $tokens)
    {
        foreach ($matches as $k => $v) {
            list($start, $end) = $v;
            $s = '';
            for ($i = $start; $i <= $end; $i++) {
                $tok = $tokens[$i];
                if (is_string($tok)) {
                    $s .= $tok;
                } elseif (is_array($tok)) {
                    $s .= $tok[1];
                }
            }
            $matches[$k] = $s;
        }
    }


    /**
     *
     * Returns the class names found in the given tokens, prefixed with namespace if $withNamespaces=true.
     *
     * Options:
     * - includeInterfaces: bool=false, whether to include interfaces
     *
     *
     * @param array $tokens
     * @param bool $withNamespaces
     * @param array $options
     * @return array
     *
     */
    public static function getClassNames(array $tokens, $withNamespaces = true, array $options = [])
    {
        $ret = [];
        $o = new ClassNameTokenFinder();
        $includeInterface = $options['includeInterfaces'] ?? false;
        $o->setIncludeInterface($includeInterface);

        $matches = $o->find($tokens);
        if ($matches) {
            $ret = $matches;
            TokenFinderTool::matchesToString($ret, $tokens);
            if (true === $withNamespaces && false !== $namespace = self::getNamespace($tokens)) {
                array_walk($ret, function (&$v) use ($namespace) {
                    $v = $namespace . '\\' . $v;
                });
            }
        }
        return $ret;
    }


    /**
     * Returns an array of basic information for every class properties of the given class.
     * The variable names are used as indexes.
     *
     * Note: the given class must be reachable by the auto-loaders.
     *
     *
     *
     * Each basic info array contains the following:
     *
     * - varName: string, the variable name
     * - hasDocComment: bool, whether this property has a docblock comment attached to it (it's a comment that starts with slash double asterisk)
     * - doComment: string, the docblock comment if any (an empty string otherwise)
     * - isPublic: bool, whether the property's visibility is public
     * - isProtected: bool, whether the property's visibility is protected
     * - isPrivate: bool, whether the property's visibility is private
     * - isStatic: bool, whether the property is declared as static
     * - content: string, the whole property declaration, as written in the file, including the multi-line comments if any
     * - startLine: int, the line number at which the property "block" (i.e. including the doc block comment if any) starts
     * - endLine: int, the line number at which the property "block" ends
     * - commentStartLine: int, the line number at which the doc bloc comment starts, or false if there is no block comment
     * - commentEndLine: int, the line number at which the doc bloc comment ends, or false if there is no block comment
     *
     *
     * @param string $className
     * @return array
     */
    public static function getClassPropertyBasicInfo(string $className): array
    {
        $ret = [];
        $file = ClassTool::getFile($className);
        $tokens = token_get_all(file_get_contents($file));
        $o = new ClassPropertyTokenFinder();
        $matches = $o->find($tokens);

        foreach ($matches as $match) {
            list($startIndex, $endIndex) = $match;
            $slice = TokenTool::slice($tokens, $startIndex, $endIndex);



            $hasComment = TokenTool::matchAny([
                T_DOC_COMMENT,
            ], $slice);

            $isPublic = TokenTool::matchAny([
                T_PUBLIC,
            ], $slice);
            $isProtected = TokenTool::matchAny([
                T_PROTECTED,
            ], $slice);
            $isPrivate = TokenTool::matchAny([
                T_PRIVATE,
            ], $slice);
            $isStatic = TokenTool::matchAny([
                T_STATIC,
            ], $slice);

//            a(TokenTool::explicitTokenNames($slice));
            $varToken = TokenTool::fetch($slice, [T_VARIABLE]);
            $varName = substr($varToken[1], 1); // removing the dollar symbol

            $commentToken = TokenTool::fetch($slice, [T_DOC_COMMENT]);
            $docComment = '';
            $docCommentStartLine = false;
            $docCommentEndLine = false;
            if (false !== $commentToken) {
                $docComment = $commentToken[1];
                $docCommentStartLine = $commentToken[2];
                $p = explode(PHP_EOL, $docComment);
                $nbLines = count($p);
                $docCommentEndLine = $docCommentStartLine + $nbLines - 1;


            }


            list($startLine, $endLine) = TokenTool::getStartEndLineByTokens($slice);
            $content = TokenTool::tokensToString($slice);

            $ret[$varName] = [
                "varName" => $varName,
                "hasDocComment" => $hasComment,
                "docComment" => $docComment,
                "isPublic" => $isPublic,
                "isProtected" => $isProtected,
                "isPrivate" => $isPrivate,
                "isStatic" => $isStatic,
                "content" => $content,
                "startLine" => $startLine,
                "endLine" => $endLine,
                "commentStartLine" => $docCommentStartLine,
                "commentEndLine" => $docCommentEndLine,
            ];
        }
        return $ret;
    }


    /**
     * Returns the parent class name, or false if no parent was found.
     * If $fullName is set to true, the fullName of the parent is returned.
     *
     *
     * When fullName is true, it tries to see if there is a use statement matching
     * the parent class name, and returns it if it exists.
     * Otherwise, it just prepends the namespace (if no use statement matched the parent class name).
     *
     * Note: as for now it doesn't take into account the "as" alias (i.e. use My\Class as Something)
     *
     *
     * @param array $tokens
     * @param bool $fullName
     * @return string|false
     *
     *
     */
    public static function getParentClassName(array $tokens, $fullName = true)
    {
        $o = new ParentClassNameTokenFinder();
        $matches = $o->find($tokens);
        if ($matches) {
            $ret = $matches;
            TokenFinderTool::matchesToString($ret, $tokens);

            // there can only be one parent class in php
            $ret = array_shift($ret);

            if (true === $fullName) {

                $useStmts = self::getUseDependencies($tokens);
                foreach ($useStmts as $dep) {
                    $p = explode('\\', $dep);
                    $lastName = array_pop($p);
                    if ($lastName === $ret) {
                        return $dep;
                    }
                }


                if (false !== ($namespace = self::getNamespace($tokens))) {
                    $ret = $namespace . '\\' . ltrim($ret, '\\');
                }
            }

            return $ret;
        } else {
            return false;
        }
    }


    /**
     * Returns an array containing info about the first class signature found in the tokens, or false if no class signature was found.
     *
     * In case of success, the returned array structure is:
     *
     * - 0: the class signature, including comments if any
     * - 1: the start line of the signature
     * - 2: the end line of the signature
     *
     *
     *
     *
     * @param array $tokens
     * @return array
     * @throws \Exception
     */
    public static function getClassSignatureInfo(array $tokens)
    {
        $finder = new ClassSignatureTokenFinder();
        $matches = $finder->find($tokens);
        if ($matches) {
            $firstMatch = array_shift($matches);
            list($startIndex, $endIndex) = $firstMatch;

            $slice = array_slice($tokens, $startIndex, $endIndex - $startIndex + 1);
            $content = TokenTool::tokensToString($slice);
            $firstToken = array_shift($slice); // we know by definition that this must has a line info
            $startLine = $firstToken[2];

            $lastToken = array_pop($slice); // assuming this has a line info
            if (is_array($lastToken)) {
                $endLine = $lastToken[2];
                return [
                    $content,
                    $startLine,
                    $endLine,
                ];
            } else {
                throw new TokenFunException("Oops, the last token of the class signature was not an array, cannot get the end line info. The token was: $lastToken.");
            }
        }
        return false;
    }


    /**
     *
     * Returns the interfaces found in the given tokens.
     *
     * It returns the names of the implemented interfaces (search for the "CCC implements XXX" expression) if any,
     * and include the full name if $fullName is set to true.
     *
     * When fullName is true, it tries to see if there is a use statement matching
     * the interface class name, and returns it if it exists.
     * Otherwise, it just prepends the namespace (if no use statement matched the interface class name).
     *
     * Note: as for now it doesn't take into account the "as" alias (i.e. use My\Class as Something)
     *
     *
     *
     * @param array $tokens
     * @param bool $fullName
     * @return array
     *
     *
     *
     */
    public static function getInterfaces(array $tokens, $fullName = true): array
    {
        $o = new InterfaceTokenFinder();
        $matches = $o->find($tokens);
        $ret = [];
        if ($matches) {
            $string = $matches;
            TokenFinderTool::matchesToString($string, $tokens);

            // expect only one string to be returned
            $string = array_shift($string);

            $ret = explode(',', $string);
            $ret = array_map('trim', $ret);


            if (true === $fullName) {

                $useStmts = self::getUseDependencies($tokens);
                foreach ($ret as $k => $className) {
                    $found = false;
                    foreach ($useStmts as $dep) {
                        $p = explode('\\', $dep);
                        $lastName = array_pop($p);
                        if ($lastName === $className) {
                            $ret[$k] = $dep;
                            $found = true;
                        }
                    }

                    if (false === $found) {
                        if (false !== ($namespace = self::getNamespace($tokens))) {
                            $ret[$k] = $namespace . '\\' . $className;
                        }
                    }
                }
            }
        }
        return $ret;
    }


    /**
     *
     * Returns some info about the methods found in the given tokens.
     *
     * The returned array is an array of methodName => info, each info is an array with the following properties:
     *      - name: string
     *      - visibility: public (default)|private|protected
     *      - abstract: bool
     *      - final: bool
     *      - static: bool
     *      - methodStartLine: int
     *      - methodEndLine: int
     *      - content: string
     *      - args: string
     *      - commentType: null|regular\docBlock
     *      - commentStartLine: null|int
     *      - commentEndLine: null|int
     *      - comment: null|string
     *      - startIndex: int, the index at which the pattern starts
     *
     *
     * @param array $tokens
     * @return array
     * @throws \Exception
     */
    public static function getMethodsInfo(array $tokens): array
    {

        $ret = [];
        $o = new MethodTokenFinder();
        $matches = $o->find($tokens);


        if ($matches) {


            foreach ($matches as $match) {


                $length = $match[1] - $match[0];
                $matchTokens = array_slice($tokens, $match[0], $length);


                $comment = null;
                $commentType = null;
                $commentStartLine = null;
                $commentEndLine = null;
                $methodStartLine = null;
                $methodEndLine = null;
                $visibility = 'public';
                $abstract = false;
                $final = false;
                $static = false;
                $name = null;
                $args = '';
                $content = '';
                $argsStarted = false;
                $contentStarted = false;
                $nameFound = false;


                $tai = new TokenArrayIterator($matchTokens);

                while ($tai->valid()) {
                    $token = $tai->current();
                    if (false === $nameFound) {
                        if (true === TokenTool::match([T_COMMENT, T_DOC_COMMENT], $token)) {
                            if (true === TokenTool::match(T_COMMENT, $token)) {
                                $commentType = 'regular';
                            } else {
                                $commentType = 'docBlock';
                            }
                            $comment = $token[1];
                            $commentStartLine = $token[2];
                        }

                        if (true === TokenTool::match([T_PUBLIC, T_PROTECTED, T_PRIVATE], $token)) {
                            $visibility = $token[1];
                            $methodStartLine = $token[2];
                        }

                        if (true === TokenTool::match(T_ABSTRACT, $token)) {
                            $abstract = true;
                            if (null === $methodStartLine) {
                                $methodStartLine = $token[2];
                            }
                        }

                        if (true === TokenTool::match(T_STATIC, $token)) {
                            $static = true;
                            if (null === $methodStartLine) {
                                $methodStartLine = $token[2];
                            }
                        }

                        if (true === TokenTool::match(T_FINAL, $token)) {
                            $final = true;
                            if (null === $methodStartLine) {
                                $methodStartLine = $token[2];
                            }
                        }


                        if (true === TokenTool::match(T_FUNCTION, $token)) {

                            if (null === $methodStartLine) {
                                $methodStartLine = $token[2];
                            }

                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            $name = $tai->current()[1];
                            $nameFound = true;
                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        }
                    }

                    if (false === $argsStarted && true === TokenTool::match('(', $tai->current())) {
                        $argsTokens = [];
                        TokenArrayIteratorTool::moveToCorrespondingEnd($tai, null, $argsTokens);
                        $args = TokenTool::tokensToString($argsTokens);
                        $argsStarted = true;
                    }
                    if (false === $contentStarted && true === TokenTool::match('{', $tai->current())) {
                        $contentTokens = [];
                        TokenArrayIteratorTool::moveToCorrespondingEnd($tai, null, $contentTokens);

                        $content = TokenTool::tokensToString($contentTokens);
                        $contentStarted = true;
                    }
                    $tai->next();
                }


                $p = explode(PHP_EOL, $content);
                $methodEndLine = $methodStartLine + count($p);


                if (null !== $commentStartLine) {
                    if ('//' === substr(trim($comment), 0, 2)) {
                        $commentEndLine = $commentStartLine;
                    } else {
                        $p = explode(PHP_EOL, $comment);
                        $commentEndLine = $commentStartLine + count($p) - 1;
                    }


                }


                $ret[$name] = [
                    'name' => $name,
                    'visibility' => $visibility,
                    'abstract' => $abstract,
                    'final' => $final,
                    'static' => $static,
                    'methodStartLine' => $methodStartLine,
                    'methodEndLine' => $methodEndLine,
                    'content' => $content,
                    'args' => $args,

                    'commentType' => $commentType,
                    'commentStartLine' => $commentStartLine,
                    'commentEndLine' => $commentEndLine,
                    'comment' => $comment,
                    'startIndex' => $match[0],
                ];
            }
        }
        return $ret;
    }

    /**
     * Returns the first namespace found in the given tokens, or false otherwise.
     *
     * @param array $tokens
     * @return false|string
     */
    public static function getNamespace(array $tokens)
    {

        $ret = false;
        $o = new NamespaceTokenFinder();
        $matches = $o->find($tokens);
        if ($matches) {
            TokenFinderTool::matchesToString($matches, $tokens);
            $f = $matches[0];
            $ret = trim(substr($f, 10, -1));
        }

        return $ret;
    }


    /**
     *
     * Returns an array of use statements' class names found in the given tokens.
     *
     * By default, it doesn't take into account the aliases part if any.
     *
     * Available options:
     * - sort: bool = true. If true, the returned array is sorted.
     * - alias: bool = false. If true, returns an array of items, each of which:
     *      - 0: class (or func or constant)
     *      - 1: alias
     *
     *
     *
     *
     * @param array $tokens
     * @param array $options
     * @return array
     */
    public static function getUseDependencies(array $tokens, array $options = []): array
    {

        $alias = $options['alias'] ?? false;
        $sort = $options['sort'] ?? true;

        $o = new UseStatementsParser();
        $arr = $o->parseTokens($tokens);
        $ret = [];
        foreach ($arr as $item) {
            if (false === $alias) {
                $ret[] = array_shift($item);
            } else {
                array_pop($item);
                $ret[] = $item;

            }
        }


        if (false === $alias) {
            $ret = array_unique($ret);
        }
        if (true === $sort) {
            if (true === $alias) {
                usort($ret, function ($item1, $item2) {
                    return (int)($item1[0] > $item2[0]);
                });
            } else {
                sort($ret);
            }
        }

        return $ret;
    }

    /**
     * Returns an array of use statements' class names inside the given directory.
     *
     * @param string $dir
     * @return array
     */
    public static function getUseDependenciesByFolder(string $dir): array
    {
        $ret = [];
        DirScanner::create()->scanDir($dir, function ($path, $rPath, $level) use (&$ret) {
            if (is_file($path) && 'php' === strtolower(FileSystemTool::getFileExtension($path))) {
                $tokens = token_get_all(file_get_contents($path));
                $ret = array_merge($ret, TokenFinderTool::getUseDependencies($tokens));
            }
        });
        $ret = array_unique($ret);
        sort($ret);
        return $ret;
    }


    /**
     * Returns an array of all the use statements used by the given reflection classes.
     *
     * @param \ReflectionClass[] $reflectionClasses
     * @return array
     */
    public static function getUseDependenciesByReflectionClasses(array $reflectionClasses)
    {
        $ret = [];
        foreach ($reflectionClasses as $class) {
            $tokens = token_get_all(file_get_contents($class->getFileName()));
            $ret = array_merge($ret, TokenFinderTool::getUseDependencies($tokens));
        }
        $ret = array_unique($ret);
        sort($ret);
        return $ret;
    }


    /**
     * Removes the php comments from the given valid php string, and returns the result.
     *
     * Note: a valid php string must start with <?php.
     *
     * If the preserveWhiteSpace option is true, it will replace the comments with some whitespaces, so that
     * the line numbers are preserved.
     *
     *
     * @param string $str
     * @param bool $preserveWhiteSpace
     * @return string
     */
    public static function removePhpComments(string $str, bool $preserveWhiteSpace = true): string
    {
        $commentTokens = [
            \T_COMMENT,
            \T_DOC_COMMENT,
        ];
        $tokens = token_get_all($str);


        if (true === $preserveWhiteSpace) {
            $lines = explode(PHP_EOL, $str);
        }


        $s = '';
        foreach ($tokens as $token) {
            if (is_array($token)) {
                if (in_array($token[0], $commentTokens)) {
                    if (true === $preserveWhiteSpace) {
                        $comment = $token[1];
                        $lineNb = $token[2];
                        $firstLine = $lines[$lineNb - 1];
                        $p = explode(PHP_EOL, $comment);
                        $nbLineComments = count($p);
                        if ($nbLineComments < 1) {
                            $nbLineComments = 1;
                        }
                        $firstCommentLine = array_shift($p);

                        $isStandAlone = (trim($firstLine) === trim($firstCommentLine));

                        if (false === $isStandAlone) {
                            if (2 === $nbLineComments) {
                                $s .= PHP_EOL;
                            }

                            continue; // just remove inline comments
                        }

                        // stand alone case
                        $s .= str_repeat(PHP_EOL, $nbLineComments - 1);
                    }
                    continue;
                }
                $token = $token[1];
            }

            $s .= $token;
        }
        return $s;
    }
}
