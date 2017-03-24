<?php


namespace MethodInjector;


use Bat\ClassTool;
use Bat\FileTool;
use MethodInjector\Method\Method;

class MethodInjector
{

    public function getMethodsList($className)
    {
        $ret = [];
        $r = new \ReflectionClass($className);
        $methods = $r->getMethods(\ReflectionMethod::IS_STATIC | \ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method) {
            $ret[] = $method->getName();
        }
        return $ret;
    }

    /**
     * @return Method
     */
    public function getMethodByName($className, $methodName)
    {
        $c = ClassTool::getMethodContent($className, $methodName);
        $o = new Method();
        $o->setContent($c);
        $o->setName($methodName);
        return $o;
    }


    /**
     *
     */
    public function hasMethod($method, $className)
    {
        if ($method instanceof Method) {
            $method = $method->getName();
        }
        try {
            new \ReflectionMethod($className, $method);
        } catch (\ReflectionException $e) {
            return false;
        }
        return true;
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


}