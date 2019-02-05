<?php


namespace ArrayRefResolver;


use ArrayRefResolver\Exception\ArrayTagDeepErrorException;
use ArrayToString\ArrayToStringTool;
use Bat\BDotTool;

/**
 * The ArrayTagResolver class provides a simple mechanism to resolve tags in an array recursively.
 *
 * https://github.com/lingtalfi/ArrayRefResolver/blob/master/ArrayTagResolver.md
 *
 *
 */
class ArrayTagResolver implements ArrayRefResolverInterface
{


    /**
     * This property holds the error mode, which defines the behaviour of the class when
     * a tag is unresolved, or something bad happens.
     * It can be one of the following:
     *
     * - ignore (default): the value is ignored silently, and the errors are available via the getErrors method.
     * - strict: a ArrayRefResolverException exception is thrown.
     *
     */
    private $errorMode;

    /**
     * This property holds an array of error messages.
     * @type array
     */
    private $errors;

    /**
     * This property holds the tag opening expression (see tag anatomy in the documentation for this class).
     * It cannot be empty.
     */
    private $openingExpression;

    /**
     * This property holds the tag closing expression (see tag anatomy in the documentation for this class).
     * It cannot be empty.
     */
    private $closingExpression;


    /**
     * This property holds the variables pool used by this instance.
     *
     *
     *
     * @var array
     */
    private $variables;


    /**
     * This property holds the regex used to extract the variable name from a tag.
     * It is reset every time the tag anatomy is updated (using the setOpeningExpression
     * and setClosingExpression methods).
     *
     */
    private $regex;


    /**
     * Whether to allow non-scalar injection.
     * See class documentation for more info.
     *
     * @var bool = true
     */
    private $allowNonScalarInjection;

    /**
     * This array is used internally to prevent circular references.
     * The basic idea is that we collect any variable name that is called to be resolved.
     *
     * If the same variable name occurs more than once in a resolving session, then
     * we trigger the circular reference error.
     *
     *
     * @var array
     */
    private $circularArray;


    /**
     * Builds the SimpleTagResolver instance.
     */
    public function __construct()
    {
        $this->errorMode = "ignore";
        $this->errors = [];
        $this->openingExpression = '${';
        $this->closingExpression = '}';
        $this->allowNonScalarInjection = true;
        $this->variables = [];
        $this->circularArray = [];

    }


    /**
     * @implementation
     *
     * @param array $conf
     * @param array $options , the possible options are:
     *
     *      - recursion: bool, if true the resolution of tags will be recursive.
     *              Meaning if a tag contains a reference to another, it's resolved recursively too.
     *              This also works at the array level.
     *              For instance if a tag resolves as an array, then all the elements of the array
     *              are resolved again recursively.
     *
     *
     */
    public function resolve(array &$conf, array $options = [])
    {
        $keyPaths = [];
        $useRecursion = $options['recursion'] ?? false;
        $this->prepareRegex();
        $this->resolveTags($conf, $keyPaths, $useRecursion);
    }

    /**
     * Sets the allowNonScalarInjection mode for this instance.
     *
     * @param bool $allowNonScalarInjection
     */
    public function setAllowNonScalarInjection(bool $allowNonScalarInjection)
    {
        $this->allowNonScalarInjection = $allowNonScalarInjection;
    }


    /**
     * Sets the variables pool for this instance.
     *
     * @param array $variables
     */
    public function setVariables(array $variables)
    {
        $this->variables = $variables;
    }

    /**
     * Sets the tag's opening expression.
     * See tag anatomy for more details.
     *
     * @param $openingExpression
     * @return $this
     */
    public function setOpeningExpression($openingExpression)
    {
        $this->openingExpression = $openingExpression;
        $this->resetRegex();
        return $this;
    }


    /**
     * Sets the tag's closing expression.
     * See tag anatomy for more details.
     *
     * @param $closingExpression
     * @return $this
     */
    public function setClosingExpression($closingExpression)
    {
        $this->closingExpression = $closingExpression;
        $this->resetRegex();
        return $this;
    }


    /**
     * Returns errors that could occur.
     *
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Walks the given array and resolve its tags in place (i.e. directly on the passed reference).
     *
     * Will add all errors to the errors array.
     *
     *
     *
     * @param array $conf
     * @param array $keyPaths
     * @param bool $useRecursion
     */
    protected function resolveTags(array &$conf, array &$keyPaths = [], $useRecursion = false)
    {
        array_walk($conf, function (&$v, $k) use (&$keyPaths, $useRecursion) {

            if (is_array($v)) {
                $keyPaths[] = $k;
                $this->resolveTags($v, $keyPaths, $useRecursion);
                array_pop($keyPaths);
            } else {

                // note: the element has to be stringable otherwise I don't know how to handle it
                $value = (string)$v;

                if (
                    false !== strpos($value, $this->openingExpression) &&
                    preg_match($this->regex, $value, $match)
                ) {

                    $tagName = $match[1];
                    $found = false;
                    $replacement = BDotTool::getDotValue($tagName, $this->variables, null, $found);
                    $errMsg = null;
                    if (true === $found) {

                        // non-scalar replacement allowed?
                        if ($v === $match[0]) {
                            if (true === $this->allowNonScalarInjection) {
                                $v = $replacement;
                            } else {
                                if (is_scalar($replacement)) {
                                    $v = $replacement;
                                } else {
                                    $errMsg = "Non-scalar replacement forbidden by configuration. Variable: $tagName";
                                }
                            }

                        } // inline injection
                        else {
                            if (false === is_scalar($replacement)) {
                                $errMsg = "Cannot inject non-scalar value into a string. Variable: $tagName";
                            } else {
                                $v = str_replace($match[0], $replacement, $value);
                            }
                        }


                        if (null === $errMsg && true === $useRecursion) {
                            try {
                                $this->circularArray = []; // initialize circular references detection
                                $replacement2 = $this->resolveValueRecursively($v);
                                $v = $replacement2;
                            } catch (ArrayTagDeepErrorException $e) {
                                $errMsg = $e->getMessage() . " Variable: $tagName > " . $e->getVarName();
                            }
                        }


                    } else {
                        $errMsg = "Reference not found: $tagName.";
                    }


                    if ($errMsg) {
                        if ($keyPaths) {
                            $errKeyPaths = $keyPaths;
                            array_walk($errKeyPaths, function (&$v) {
                                $v = str_replace('.', '\.', $v);
                            });
                            $varPath = implode('.', $errKeyPaths) . ".$tagName";
                        } else {
                            $varPath = "(none)";
                        }
                        $this->addError("$errMsg (Breadcrumb: $varPath)");
                    }
                }
            }
        });
    }


    /**
     * Resolves a particular value.
     * This mechanism is called when a tag is found and we want to resolve its value recursively.
     * If recursion option is not used, this method is never called.
     *
     *
     * @param $value
     * @return mixed
     * @throws ArrayTagDeepErrorException, used as an internal signal (like goto-ish) to indicate an error occurring at a deep level.
     *              This exception never goes outside the scope of this instance.
     */
    protected function resolveValueRecursively($value)
    {
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->resolveValueRecursively($v);
            }
        } elseif (is_object($value)) {
            return $value;
        } else {
            if (
                false !== strpos($value, $this->openingExpression) &&
                preg_match($this->regex, $value, $match)
            ) {
                $tagName = $match[1];


                // circular reference detection
                if (in_array($tagName, $this->circularArray, true)) {

                    $e = new  ArrayTagDeepErrorException("Circular reference detected, with array: " . ArrayToStringTool::toInlinePhpArray($this->circularArray) . '.');
                    $e->setVarName($tagName);
                    throw $e;
                }
                $this->circularArray[] = $tagName;


                $found = false;
                $replacement = BDotTool::getDotValue($tagName, $this->variables, null, $found);
                if (true === $found) {


                    // non-scalar replacement allowed?
                    if ($value === $match[0]) {
                        if (true === $this->allowNonScalarInjection) {
                            $value = $replacement;
                        } else {
                            if (is_scalar($replacement)) {
                                $value = $replacement;
                            } else {
                                $e = new  ArrayTagDeepErrorException("Non-scalar replacement forbidden by configuration.");
                                $e->setVarName($tagName);
                                throw $e;
                            }
                        }

                    } // inline injection
                    else {
                        if (false === is_scalar($replacement)) {
                            $e = new  ArrayTagDeepErrorException("Cannot inject non-scalar value into a string.");
                            $e->setVarName($tagName);
                            throw $e;
                        } else {
                            $value = str_replace($match[0], $replacement, $value);
                        }
                    }

                    return $this->resolveValueRecursively($value);
                }
            }
        }
        return $value;
    }


    /**
     * Reset the regex.
     * This is called when the user changes the tag anatomy.
     * @seeProperty regex
     *
     */
    protected function resetRegex()
    {
        $this->regex = null; // reinitialize regex
    }


    /**
     * Prepares the regex.
     *
     * @seeProperty regex
     */
    protected function prepareRegex()
    {
        if (null === $this->regex) {
            $begin = preg_quote($this->openingExpression);
            $end = preg_quote($this->closingExpression);
            $firstEndChar = substr($end, 0, 1);
            if (']' === $firstEndChar) {
                $end = '\]';
            }
            $this->regex = '!' . $begin . '([^' . $end . ']*)' . $end . '!';
        }
    }


    /**
     * Adds an error message.
     *
     *
     * @param $errorMessage
     * @throws ArrayTagDeepErrorException
     */
    protected function addError($errorMessage)
    {
        $errorMessage = "ArrayTagResolver error: $errorMessage";
        $this->errors[] = $errorMessage;
        if ("strict" === $this->errorMode) {
            throw new ArrayTagDeepErrorException($errorMessage);
        }
    }
}