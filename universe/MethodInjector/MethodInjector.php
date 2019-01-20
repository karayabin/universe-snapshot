<?php


namespace MethodInjector;


use Bat\ClassTool;
use Bat\FileTool;
use MethodInjector\Method\Method;

class MethodInjector
{

    public static function create()
    {
        return new static();
    }


    /**
     * methodFilter: an array of OR items.
     *      An OR item is an array of reflection method flags.
     *      And each OR item is combined in an AND fashion.
     *
     * So for instance with the following methodFilter array:
     *
     * - 0: [\ReflectionMethod::IS_STATIC]
     * - 1: [\ReflectionMethod::IS_PROTECTED, \ReflectionMethod::IS_PUBLIC]
     *
     * we have two OR items (at index 0 and 1),
     * and it basically means: get the methods that are static and (protected or public).
     *
     *
     *
     *
     *
     */
    public function getMethodsList($className, array $methodFilter = null)
    {
        $ret = [];
        try {
            $r = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
            return $ret;
        }
        if (null === $methodFilter) {
            $methodFilter = [
                [\ReflectionMethod::IS_PUBLIC],
            ];
        }
        $methods = $r->getMethods();
        foreach ($methods as $method) {
            if (true === $this->matchFilter($method, $methodFilter)) {
                $ret[] = $method->getName();
            }
        }
        return $ret;
    }


    /**
     * @return Method|false
     */
    public function getMethodByName($className, $methodName)
    {
        if (false !== ($c = ClassTool::getMethodContent($className, $methodName))) {
            $o = new Method();
            $o->setContent($c);
            $o->setName($methodName);
            return $o;
        }
        return false;
    }


    /**
     * @return Method|false
     */
    public function replaceMethodByInnerContent($className, $methodName, $newContent)
    {
        $newContentAsLines = explode(PHP_EOL, $newContent);
        ClassTool::rewriteMethodContent($className, $methodName, function (array &$lines) use ($newContentAsLines) {
            $lines = $newContentAsLines;
        });
    }


    /**
     *
     */
    public function hasMethod($method, $className, $methodFilter = null)
    {
        if ($method instanceof Method) {
            $method = $method->getName();
        }
        $list = $this->getMethodsList($className, $methodFilter);
        foreach ($list as $methodName) {
            if ($method === $methodName) {
                return true;
            }
        }
        return false;
    }

    public function appendMethod(Method $method, $className)
    {
        $r = new \ReflectionClass($className);
        $file = $r->getFileName();
        list($a, $b) = FileTool::split($file, $r->getEndLine());

        $s = $a;
        $s .= PHP_EOL;
        $s .= "\t";
        $s .= $method->getContent();
        $s .= PHP_EOL;
        $s .= $b;
        file_put_contents($file, $s);
    }


    public function removeMethod(Method $method, $className)
    {
        try {

            $r = new \ReflectionMethod($className, $method->getName());
            $file = $r->getFileName();
            $start = $r->getStartLine();
            $end = $r->getEndLine();

            list($a, $b) = FileTool::cut($file, $start, $end);
            $s = trim($a);
            $s .= PHP_EOL;
            $s .= $b;
            file_put_contents($file, $s);
        } catch (\ReflectionException $e) {
            // method not found in container
        }
    }

    /**
     *
     *
     * @param Method[] $methods
     * http://stackoverflow.com/questions/6220154/php-object-definitions-cached-trouble-deleting-methods-with-reflection
     */
    public function removeMethods(array $methods, $className)
    {

        $slices = [];
        $file = null;
        foreach ($methods as $method) {
            try {
                $r = new \ReflectionMethod($className, $method->getName());
                $file = $r->getFileName();
                $slices[] = [$r->getStartLine(), $r->getEndLine()];
            } catch (\ReflectionException $e) {
                // method not found, ignore that slice
            }
        }


        if (null !== $file) {
            $s = FileTool::extract($file, $slices);
            file_put_contents($file, $s);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function matchFilter(\ReflectionMethod $method, $methodFilter)
    {
        $isSuccess = true;
        foreach ($methodFilter as $orItem) {
            $orItemMatched = false;
            foreach ($orItem as $flag) {
                if (true === $this->matchFlag($method, $flag)) {
                    $orItemMatched = true;
                    break;
                }
            }
            if (false === $orItemMatched) {
                $isSuccess = false;
                break;
            }
        }
        return $isSuccess;
    }

    private function matchFlag(\ReflectionMethod $method, $flag)
    {
        switch ($flag) {
            case \ReflectionMethod::IS_PUBLIC:
                return $method->isPublic();
                break;
            case \ReflectionMethod::IS_PROTECTED:
                return $method->isProtected();
                break;
            case \ReflectionMethod::IS_PRIVATE:
                return $method->isPrivate();
                break;
            case \ReflectionMethod::IS_ABSTRACT:
                return $method->isAbstract();
                break;
            case \ReflectionMethod::IS_FINAL:
                return $method->isFinal();
                break;
            case \ReflectionMethod::IS_STATIC:
                return $method->isStatic();
                break;
        }
    }
}