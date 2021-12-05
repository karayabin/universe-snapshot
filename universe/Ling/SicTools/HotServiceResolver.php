<?php


namespace Ling\SicTools;


use Ling\Bat\DebugTool;
use Ling\SicTools\Exception\SicBlockWillNotResolveException;
use Ling\SicTools\Exception\SicToolsException;

/**
 * The HotServiceResolver class helps creating a hot service container: a service container which resolves services
 * on the fly from a stored sic notation.
 *
 *
 *
 * Note: the callable feature of the sic notation is not used (because services are not callables but instances).
 *
 * @link https://github.com/lingtalfi/NotationFan/blob/master/sic.md
 *
 *
 */
class HotServiceResolver
{


    /**
     * This property holds the pass key.
     * See sic notation for more info.
     *
     * @link https://github.com/lingtalfi/NotationFan/blob/master/sic.md#examples
     * @var string
     */
    private $passKey;


    /**
     * This property holds the customResolveNotationCallback for this instance.
     * @var callable|null
     */
    private $customResolveNotationCallback;


    /**
     * Builds the HotServiceResolver instance.
     */
    public function __construct()
    {
        $this->passKey = '__pass__';
        $this->customResolveNotationCallback = null;
    }


    /**
     * Returns the service (an instance of a class) defined in the given sic block.
     * Or false in the following cases:
     *
     * - the given array is not a sic block.
     * - the sic block contains the pass key.
     *
     *
     * Note: when called internally, this method can also return a callable (i.e. an array of [$o, $methodName]).
     * That's because a callable can be an argument of a method.
     *
     *
     *
     * @param array $sicBlock
     * @return false|object|array
     * False is returned when the given array IS NOT a sic block (or a sic block with the pass key defined)
     * @throws \Exception
     * When the sic block will not resolve
     *
     *
     */
    public function getService(array $sicBlock)
    {
        if (true === SicTool::isSicBlock($sicBlock, $this->passKey)) {

            $service = null;

            //--------------------------------------------
            // INSTANTIATE SERVICE
            //--------------------------------------------
            $className = $sicBlock['instance'];
            $constructorArgs = $sicBlock['constructor_args'] ?? null;
            if (is_array($constructorArgs) && $constructorArgs) {
                try {

                    $r = new \ReflectionClass($className);
                    $realArgs = $this->resolveArgs($constructorArgs);
                    $service = $r->newInstanceArgs($realArgs);
                } catch (\ReflectionException $e) {
                    throw new SicBlockWillNotResolveException($e->getMessage());
                }
            } else {
                try {

                    $isCustomNotation = false;
                    $customNotation = $this->resolveCustomNotation($className, $isCustomNotation);
                    if (false === $customNotation || null === $customNotation) {
                        $service = new $className();
                    } else {
                        // assuming an object is returned
                        $service = $customNotation;
                    }


                } // php7 ?
                catch (\Error $e) {
                    throw new SicBlockWillNotResolveException($e->getMessage());
                }
            }


            //--------------------------------------------
            // CALL METHODS
            //--------------------------------------------
            if (array_key_exists("methods", $sicBlock)) {
                $methods = $sicBlock['methods'];
                if (is_array($methods)) {
                    foreach ($methods as $methodName => $args) {
                        if (empty($args)) {
                            $args = [];
                        }
                        $realArgs = $this->resolveArgs($args);
                        $callable = [$service, $methodName];
                        if (true === is_callable($callable)) {
                            call_user_func_array($callable, $realArgs);
                        } else {
                            throw new SicToolsException("Not a callable: " . DebugTool::toString($callable));
                        }
                    }
                }
            }


            //--------------------------------------------
            // CALL METHODS COLLECTION
            //--------------------------------------------
            if (array_key_exists("methods_collection", $sicBlock)) {
                $methods = $sicBlock['methods_collection'];
                if (is_array($methods)) {
                    foreach ($methods as $method) {
                        if (array_key_exists("method", $method)) {

                            $methodName = $method['method'];
                            $args = $method['args'] ?? null;

                            if (empty($args)) { // same note as previous block
                                $args = [];
                            }
                            $realArgs = $this->resolveArgs($args);
                            $callable = [$service, $methodName];
                            if (true === is_callable($callable)) {
                                call_user_func_array([$service, $methodName], $realArgs);
                            } else {
                                throw new SicToolsException("Not a callable: " . DebugTool::toString($callable));
                            }
                        }
                    }
                }
            }


            //--------------------------------------------
            // CALLABLE
            //--------------------------------------------
            /**
             * Note: the callable shouldn't be returned at the root level (the getService call made by the client),
             * but on nested levels it can (internal calls to the resolveArgs method which in turn calls the
             * getService method recursively...).
             */
            if (array_key_exists("callable_method", $sicBlock)) {
                $callableMethod = $sicBlock['callable_method'];
                return [$service, $callableMethod];
            }


            //--------------------------------------------
            // RETURN METHOD
            //--------------------------------------------
            /**
             * Stand by... too dangerous design wise.
             * There is probably a better way.
             * Remember eval in php? Well same here, this code is evil...
             */
//            if (array_key_exists("return_method", $sicBlock)) {
//                $methodName = $sicBlock["return_method"];
//                $args = $sicBlock['return_method_args'] ?? [];
//                if (empty($args)) { // same note as previous block
//                    $args = [];
//                }
//                $realArgs = $this->resolveArgs($args);
//                return call_user_func_array([$service, $methodName], $realArgs);
//            }


            return $service;
        }
        return false;
    }


    /**
     * Sets the customResolveNotationCallback.
     *
     * @param callable $customResolveNotationCallback
     */
    public function setCustomResolveNotationCallback(callable $customResolveNotationCallback)
    {
        $this->customResolveNotationCallback = $customResolveNotationCallback;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Parses the given value as a custom notation and returns the interpreted result.
     *
     * One of two cases happens:
     *
     * - the given value is recognized as a custom notation:
     *      - the isCustomNotation flag is set to true (by the implementor)
     *      - the method returns the interpreted custom value
     *
     * - the given value is NOT recognized as a custom notation:
     *      - the isCustomNotation flag is left to false (by default)
     *      - the method's return will be ignored
     *
     *
     * This mechanism allows us to create new notations based either on strings or arrays, for instance:
     *
     * - @service(my.service)           # would call a service
     *
     *
     *
     *
     * @param $value
     * @param bool $isCustomNotation
     * @return mixed
     */
    protected function resolveCustomNotation($value, &$isCustomNotation = false)
    {
        if (null !== $this->customResolveNotationCallback) {
            return call_user_func_array($this->customResolveNotationCallback, [$value, &$isCustomNotation]);
        } else {
            return null;
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the given $args array, but with services resolved (based on the sic notation).
     *
     *
     * @param array $args
     * @return array
     * @throws SicBlockWillNotResolveException
     */
    private function resolveArgs(array $args)
    {
        $realArgs = [];
        foreach ($args as $k => $v) {

            $isCustom = false;
            $customValue = $this->resolveCustomNotation($v, $isCustom);

            if (false === $isCustom) {

                if (is_array($v)) {
                    if (true === SicTool::isSicBlock($v, $this->passKey)) {
                        $v = $this->getService($v);
                    } else {
                        $v = $this->resolveArgs($v);
                    }
                }
            } else {
                $v = $customValue;
            }
            $realArgs[$k] = $v;
        }
        return $realArgs;
    }
}