<?php


namespace TokenFun\TokenFinder\Tool;

use Bat\FileSystemTool;
use DirScanner\DirScanner;
use TokenFun\TokenArrayIterator\TokenArrayIterator;
use TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use TokenFun\TokenFinder\ClassNameTokenFinder;
use TokenFun\TokenFinder\InterfaceTokenFinder;
use TokenFun\TokenFinder\MethodTokenFinder;
use TokenFun\TokenFinder\NamespaceTokenFinder;
use TokenFun\TokenFinder\ParentClassNameTokenFinder;
use TokenFun\TokenFinder\UseStatementsTokenFinder;
use TokenFun\Tool\TokenTool;


/**
 * TokenFinderTool
 * @author Lingtalfi
 * 2016-01-02
 *
 */
class TokenFinderTool
{


    /**
     * @param array $matches , an array of matches as returned by a TokenFinder object.
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
     * @return array of class names found, prefixed with namespace if $withNamespaces=true
     */
    public static function getClassNames(array $tokens, $withNamespaces = true)
    {
        $ret = [];
        $o = new ClassNameTokenFinder();
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
     * @return string|false, the classname of the parent class if any,
     * and include the full name if $fullName is set to true.
     *
     * When fullName is true, it tries to see if there is a use statement matching
     * the parent class name, and returns it if it exists.
     * Otherwise, it just prepends the namespace (if no use statement matched the parent class name).
     *
     * Note: as for now it doesn't take into account the "as" alias (i.e. use My\Class as Something)
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
     * @return array, the names of the interfaces if any,
     * and include the full name if $fullName is set to true.
     *
     * When fullName is true, it tries to see if there is a use statement matching
     * the interface class name, and returns it if it exists.
     * Otherwise, it just prepends the namespace (if no use statement matched the interface class name).
     *
     * Note: as for now it doesn't take into account the "as" alias (i.e. use My\Class as Something)
     *
     */
    public static function getInterfaces(array $tokens, $fullName = true)
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
     * @return array of <info>, each info is an array with the following properties:
     *      - startIndex: int, the index at which the pattern starts
     *      - comment: null|string
     *      - commentType: null|oneLine\multiLine
     *      - visibility: public (default)|private|protected
     *      - abstract: bool
     *      - name: string
     *      - args: string
     *      - content: string
     */
    public static function getMethodsInfo(array $tokens)
    {

        $ret = [];
        $o = new MethodTokenFinder();
        $matches = $o->find($tokens);
        if ($matches) {

            foreach ($matches as $match) {
                $length = $match[1] - $match[0];
                $tokens = array_slice($tokens, $match[0], $length);
                $comment = null;
                $commentType = null;
                $visibility = 'public';
                $abstract = false;
                $name = null;
                $args = '';
                $content = '';
                $argsStarted = false;
                $contentStarted = false;
                $nameFound = false;


                $tai = new TokenArrayIterator($tokens);

                while ($tai->valid()) {
                    $token = $tai->current();
                    if (false === $nameFound) {
                        if (true === TokenTool::match([T_COMMENT, T_DOC_COMMENT], $token)) {
                            if (true === TokenTool::match(T_COMMENT, $token)) {
                                $commentType = 'oneLine';
                            } else {
                                $commentType = 'multiLine';
                            }
                            $comment = $token[1];
                        }

                        if (true === TokenTool::match([T_PUBLIC, T_PROTECTED, T_PRIVATE], $token)) {
                            $visibility = $token[1];
                        }

                        if (true === TokenTool::match(T_ABSTRACT, $token)) {
                            $abstract = true;
                        }
                        if (true === TokenTool::match(T_FUNCTION, $token)) {
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


                $ret[] = [
                    'startIndex' => $match[0],
                    'comment' => $comment,
                    'commentType' => $commentType,
                    'visibility' => $visibility,
                    'abstract' => $abstract,
                    'name' => $name,
                    'args' => $args,
                    'content' => $content,
                ];
            }
        }
        return $ret;
    }

    /**
     * @param array $tokens
     * @return false|string, the first namespace found or false if there is no namespace
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
     * @return array of use statements' class names
     */
    public static function getUseDependencies(array $tokens, $sort = true)
    {
        $ret = [];
        $o = new UseStatementsTokenFinder();
        $matches = $o->find($tokens);
        if ($matches) {
            $ret = $matches;
            TokenFinderTool::matchesToString($ret, $tokens);
            array_walk($ret, function (&$v) {
                $p = explode(' ', $v);
                $v = rtrim($p[1], ';');
            });

        }
        if (true === $sort) {
            sort($ret);
        }
        return $ret;
    }

    /**
     * @return array of use statements' class names inside the given directory
     */
    public static function getUseDependenciesByFolder($dir)
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
}
