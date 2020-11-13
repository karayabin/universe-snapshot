<?php


namespace Ling\ArrayVariableResolver;


use Ling\ArrayVariableResolver\Exception\ArrayVariableResolverException;
use Ling\Bat\BDotTool;

/**
 * The ArrayVariableResolverUtil class.
 *
 * This is a simpler version of my previous [ArrayRefResolver](https://github.com/lingtalfi/ArrayRefResolver).
 * I basically dropped the circular references handling, and so variables here are resolved, but not recursively.
 *
 *
 *
 * This class resolves variables (for instance ${myVar}) in a given array.
 *
 * It parses all the values of the given array, and replaces the variables when it founds one.
 *
 *
 * The general notation for a variable "name" is the following:
 *
 * - key: This is my ${name}.
 *
 *
 * We distinguish between two types of variables:
 * - inline variables
 * - standalone variables
 *
 *
 * Inline variables can be written inline, like in the above example, whereas standalone variables must be written alone: they
 * can't be part of a bigger string.
 *
 * Example notation for a standalone variable myArray:
 *
 * - key: ${myArray}
 *
 * The following example won't work with standalone variable:
 *
 * - key: doesn't work ${myArray}
 *
 *
 * The type of variable (inline/standalone) depends of the php type of the value of the variable:
 *
 * If the php type is string, int or float, then the variable is inline.
 * Otherwise, the standalone notation should be used. This includes when the php type is null, boolean, array, object instance.
 *
 *
 *
 * The symbols used in the variable notation can be changed; by default it uses the dollar and curly brackets.
 *
 * You can change the symbols, but not the order of the symbols, which is:
 *
 * - firstSymbol - openingBracket - variableName - closingBracket
 *
 */
class ArrayVariableResolverUtil
{

    /**
     * This property holds the firstSymbol for this instance.
     * @var string = $
     */
    protected $firstSymbol;

    /**
     * This property holds the openingBracket for this instance.
     * @var string = {
     */
    protected $openingBracket;

    /**
     * This property holds the closingBracket for this instance.
     * @var string = }
     */
    protected $closingBracket;

    /**
     * This property holds the allowBdotResolution for this instance.
     * When true, you can use the @page(bdot notation) in the variable name.
     *
     * @var bool=true
     */
    protected $allowBdotResolution;


    /**
     * Builds the DynamicVariableTransformer instance.
     */
    public function __construct()
    {
        $this->firstSymbol = '$';
        $this->openingBracket = '{';
        $this->closingBracket = '}';
        $this->allowBdotResolution = true;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the firstSymbol.
     *
     * @param string $firstSymbol
     */
    public function setFirstSymbol(string $firstSymbol)
    {
        $this->firstSymbol = $firstSymbol;
    }

    /**
     * Sets the openingBracket.
     *
     * @param string $openingBracket
     */
    public function setOpeningBracket(string $openingBracket)
    {
        $this->openingBracket = $openingBracket;
    }

    /**
     * Sets the closingBracket.
     *
     * @param string $closingBracket
     */
    public function setClosingBracket(string $closingBracket)
    {
        $this->closingBracket = $closingBracket;
    }

    /**
     * Sets the allowBdotResolution.
     *
     * @param bool $allowBdotResolution
     */
    public function setAllowBdotResolution(bool $allowBdotResolution)
    {
        $this->allowBdotResolution = $allowBdotResolution;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Resolves the given array in place, by replacing the variable notation in the array values by the corresponding variables.
     *
     *
     * @param array $array
     * @param array $variables
     * @throws ArrayVariableResolverException
     */
    public function resolve(array &$array, array $variables = [])
    {
        $begin = preg_quote($this->firstSymbol . $this->openingBracket);
        $end = preg_quote($this->closingBracket);
        $regex = '!' . $begin . '([^' . $end . ']*)' . $end . '!';


        BDotTool::walk($array, function (&$v, $key, $dotPath) use (&$array, $variables, $regex) {
            if (is_string($v)) {
                if (false !== strpos($v, $this->firstSymbol . $this->openingBracket)) {


                    if (preg_match_all($regex, $v, $matches)) {

                        if ($matches) {
                            $varNames = $matches[1];
                            foreach ($varNames as $varName) {


                                $proceed = false;
                                if (array_key_exists($varName, $variables)) {
                                    $replace = $variables[$varName];
                                    $proceed = true;
                                } else {
                                    if (true === $this->allowBdotResolution && false !== strpos($varName, ".")) {
                                        $found = false;
                                        $replace = BDotTool::getDotValue($varName, $variables, null, $found);
                                        if (true === $found) {
                                            $proceed = true;
                                        }
                                    }
                                }


                                if (true === $proceed) {
                                    $variable = $this->firstSymbol . $this->openingBracket . $varName . $this->closingBracket;
                                    if ($variable === $v) {
                                        // standalone mode, we can replace with anything
                                        BDotTool::setDotValue($dotPath, $replace, $array);
                                    } else {


                                        // inline mode, only string and number will render correctly

                                        if (null === $replace) { // convert null to empty string
                                            $replace = "";
                                        }
                                        if (is_string($replace) || is_int($replace) || is_float($replace)) {
                                            $v = str_replace($this->firstSymbol . $this->openingBracket . $varName . $this->closingBracket, $replace, $v);
                                        } else {
                                            $type = gettype($replace);
                                            throw new ArrayVariableResolverException("The variable \"$varName\" at \"$dotPath\" is inline, and therefore should only be replaced by a string, an int or a float; $type given.");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
    }


}