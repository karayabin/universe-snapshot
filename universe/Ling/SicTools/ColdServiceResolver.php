<?php


namespace Ling\SicTools;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\SicTools\CodeBlock\CodeBlock;

/**
 * The ColdServiceResolver class helps creating a cold (aka static) service container: a service container
 * which contains methods based on the sic notation.
 *
 *
 *
 * Note: the callable feature of the sic notation is not used (because services are not callables but instances).
 *
 * @link https://github.com/lingtalfi/NotationFan/blob/master/sic.md
 *
 *
 */
class ColdServiceResolver
{


    /**
     * This property holds the pass key.
     * See sic notation for more info.
     *
     * @link https://github.com/lingtalfi/NotationFan/blob/master/sic.md#examples
     */
    private $passKey;

    /**
     * Sets the base variable name, which is used to create the service's references inside the code.
     */
    private $baseVariableName;

    /**
     * An auto-incremented number appended to the baseVariableName property to give the actual unique variable name
     * used in the code.
     */
    private $cpt;


    /**
     * The stack contains all the code blocks.
     * Each code block basically encapsulates the service code.
     *
     * Using a stack/code block system allows us to manage dependencies (service1 using service2) more easily.
     *
     *
     * @var array
     */
    private $stack;


    /**
     * Builds the ColdServiceResolver instance.
     */
    public function __construct()
    {
        $this->passKey = '__pass__';
        $this->baseVariableName = 's';
        $this->cpt = 0;
        $this->stack = [];
    }


    /**
     * Returns the php code (based on the given sic block) to put in the body of your service container's method.
     * When executed in this context, the code instantiates and returns the service.
     *
     *
     * Returns false in the following cases:
     *
     * - the given array is not a sic block (including if the sic block contains the pass key).
     *
     *
     * @link https://github.com/lingtalfi/NotationFan/blob/master/sic.md#examples
     *
     * @param array $sicBlock
     * @return false|string, false is returned when the given array IS NOT a sic block (or a sic block with the pass key defined)
     *
     *
     */
    public function getServicePhpCode(array $sicBlock)
    {
        if (true === SicTool::isSicBlock($sicBlock, $this->passKey)) {

            $this->cpt = 0;
            $this->stack = [];


            $varName = $this->addServiceCode($sicBlock);
            $s = '';
            foreach ($this->stack as $code) {
                /**
                 * @var CodeBlock $code
                 */
                $statements = $code->getStatements();
                $s .= implode(PHP_EOL, $statements);
                $s .= PHP_EOL;
            }
            $s .= PHP_EOL;
            $s .= 'return ' . $varName . ';';
            return $s;


        }
        return false;
    }


    /**
     * Creates a code block representing the service (defined by the given sic block),
     * and adds it to the stack.
     *
     *
     *
     * @param array $sicBlock
     * @return string
     */
    protected function addServiceCode(array $sicBlock)
    {


        $varName = $this->getUniqueVariableName();

        $code = new CodeBlock();
        $service = null;

        //--------------------------------------------
        // CONSTRUCTOR
        //--------------------------------------------
        $className = $sicBlock['instance'];
        $args = '';

        $constructorArgs = $sicBlock['constructor_args'] ?? null;
        if (is_array($constructorArgs) && $constructorArgs) {
            $realArgs = $this->resolveArgs(array_values($constructorArgs));
            $args = $this->argsToString($realArgs);

        }

        $s = '$' . $varName . " = new $className($args);";
        $code->addStatement($s);


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
                    $realArgs = $this->resolveArgs(array_values($args));
                    $args = $this->argsToString($realArgs);


                    $s = '$' . $varName . "->$methodName($args);";
                    $code->addStatement($s);
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

                        $realArgs = $this->resolveArgs(array_values($args));
                        $args = $this->argsToString($realArgs);

                        $s = '$' . $varName . "->$methodName($args);";
                        $code->addStatement($s);

                    }
                }
            }
        }


        //--------------------------------------------
        // CALLABLE
        //--------------------------------------------
        if (array_key_exists("callable_method", $sicBlock)) {
            $callableMethod = $sicBlock['callable_method'];
            $varName2 = $this->getUniqueVariableName();
            $s = '$' . $varName2 . ' = [$' . $varName . ', "' . $callableMethod . '"];';
            $code->addStatement($s);
            $this->addCodeBlock($code);
            return '$' . $varName2;
        }


        //--------------------------------------------
        // RETURN METHOD
        //--------------------------------------------
        /**
         * Stand by... too dangerous design wise.
         * There is probably a better way.
         * Remember eval in php? Well same here, this code is evil...
         */
//        if (array_key_exists("return_method", $sicBlock)) {
//            $methodName = $sicBlock["return_method"];
//            $args = $sicBlock['return_method_args'] ?? [];
//            if (empty($args)) { // same note as previous block
//                $args = [];
//            }
//            $realArgs = $this->resolveArgs($args);
//            $args = $this->argsToString($realArgs);
//
//
//            $varName2 = $this->getUniqueVariableName();
//            $s = '$' . $varName2 . ' = $' . $varName . '->' . $methodName . '(' . $args . ');';
//            $code->addStatement($s);
//            $this->addCodeBlock($code);
//            return '$' . $varName2;
//        }


        $this->addCodeBlock($code);

        return '$' . $varName;
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
     * Note: inside this method, you can create your own code blocks and add them to the stack.
     * See the examples in the documentation for more details.
     *
     *
     *
     * @param $value
     * @param bool $isCustomNotation
     * @return mixed
     */
    protected function resolveCustomNotation($value, &$isCustomNotation = false)
    {
        return null;
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Adds a code block to the stack.
     * @param CodeBlock $codeBlock
     */
    protected function addCodeBlock(CodeBlock $codeBlock)
    {
        $this->stack[] = $codeBlock;
    }

    /**
     * Encodes an expression to be interpreted as raw php.
     *
     * You can use to create:
     *
     * - variables ($s1, $myVar = 9;, ...)
     * - or even call methods ($this->getService("myService"), ...)
     *
     *
     *
     *
     * The encoding serves the purpose of solving internal problems that I had with this implementation.
     * Namely, the ArrayToStringTool::toInlinePhpArray method that I use in the argsToString method returns an
     * inline version of a php array, but the variable is interpreted as a string, whereas I need it to be interpreted
     * as a raw php variable:
     *
     * $inline_result_by_default = ['$s1'];
     *
     * $what_i_want = [$s1];
     *
     * So that it can be interpreted directly as php.
     * So, the encoding/decoding system allows me to "unquote" the variable name (and by extension any php expression
     * so that it gets interpreted as php code when the code is read.
     *
     *
     *
     *
     *
     *
     * @param $expression
     * @return string
     */
    protected function encode($expression)
    {
        return '__Sic_Cold_Eval_' . $expression . '__>E<nd';
    }


    /**
     * Returns a unique variable name, based on the baseVariableName.
     */
    protected function getUniqueVariableName()
    {
        return $this->baseVariableName . $this->cpt++;
    }


//--------------------------------------------
//
//--------------------------------------------
    /**
     * Returns the given $args array, but with services resolved recursively (based on the sic notation).
     *
     * When a service is encountered, it is resolved in the "background" (on another stack's location),
     * and a reference (unique variable name bound to that service) is used instead, so that the caller can use
     * that reference as a method's argument.
     *
     *
     *
     *
     * @param array $args
     * @return array
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
                        $v = $this->addServiceCode($v);
                        $v = $this->encode($v);
                    } else {
                        if (array_key_exists($this->passKey, $v)) {
                            unset($v[$this->passKey]);
                        }
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


    /**
     * Returns the "inline php code" version of the passed array of arguments.
     * All encoded variables (with the encode method) are also decoded (unquoted so that they get evaluated by php as variables and not strings).
     *
     *
     *
     * @param array $realArgs
     * @return string|string[]|null
     */
    private function argsToString(array $realArgs)
    {
        $args = substr(ArrayToStringTool::toInlinePhpArray($realArgs), 1, -1); // removing the wrapping []
        return preg_replace('!\'__Sic_Cold_Eval_(.*?)__>E<nd\'!', '\1', $args);
    }

}