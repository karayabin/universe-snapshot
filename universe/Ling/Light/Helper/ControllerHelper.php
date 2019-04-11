<?php


namespace Ling\Light\Helper;


/**
 * The ControllerHelper class.
 */
class ControllerHelper
{


    /**
     * Returns an array of controller args corresponding to the given controller.
     *
     * The controller args is an array of parameterName => item,
     * each item having the following structure:
     *      - 0: hasDefaultValue, bool. Whether the argument has a default value (i.e. if there is an equal symbol in the parameter definition).
     *      - 1: defaultValue, mixed=null. If hasDefaultValue is true, the actual default value for this parameter.
     *      - 2: hint: mixed=null. The hint type if any (bool, string, int, an object, ...)
     *
     * @param callable $controller
     * @return array
     * @throws \ReflectionException
     */
    public static function getControllerArgsInfo(callable $controller)
    {
        $ret = [];
        // function
        $r = new \ReflectionFunction($controller);
        $params = $r->getParameters();
        foreach ($params as $param) {


            $hasDefaultValue = $param->isDefaultValueAvailable();
            $defaultValue = null;
            if (true === $hasDefaultValue) {
                $defaultValue = $param->getDefaultValue();
            }

            $type = null;
            if (true === $param->hasType()) {
                $type = $param->getType()->getName();
            }

            $ret[$param->getName()] = [
                $hasDefaultValue,
                $defaultValue,
                $type,
            ];
        }
        return $ret;
    }
}