<?php


namespace Ling\TokenFun\Parser;


use Ling\TokenFun\Exception\TokenFunException;

/**
 * The UseStatementsParser class.
 */
class UseStatementsParser
{


    /**
     * Returns an array of useStatement items (from the given tokens), each of which:
     *
     * - 0: (class) string, the real class of the use statement
     * - 1: (alias) string, the alias used if any, or null otherwise
     * - 2: (type) string, the type of alias used: one of:
     *          - class         (for instance: use My\Full\NSname;)
     *          - function      (for instance: use function My\Full\functionName;)
     *          - const         (for instance: use const My\Full\CONSTANT;)
     *
     *
     * This method recognizes the following style of use statements:
     * (https://www.php.net/manual/en/language.namespaces.importing.php)
     *
     *
     * - use My\Full\Classname;                                 // standard use statement
     * - use CC;                                                // use statement with simple string as classname
     * - use My\Full\Classname as Another;                      // use of alias
     * - use function My\Full\functionName;                     // use of the function keyword
     * - use const My\Full\CONSTANT;                            // use of the const keyword
     * - use My\Full\Classname as Another, My\Full\NSname;      // multiple use statements combined
     * - use function some\namespace\{fn_a, fn_b, fn_c};        // group use declarations
     * - use some\namespace\{ClassA, ClassB, ClassC as C};      // group use declarations with alias
     * - use My\Test\{ClassA as P, ClassB, Exception\ClassC};   // group use declarations with relative namespaces
     * - use My\Test\{TeeParty, function fn_a, const EDM};      // group use declarations using function and const keywords
     *
     *
     * Apparently the following cases are not handled by php yet, so it's not handled in this method either:
     *
     *
     * - use My\Test\{ClassA as P, ClassB, Exception\ClassC}, some\namespace\ClassB;                                // group use declarations followed by multiple use statements
     * - use Ling\BabyYaml\BabyYamlUtil as M, Ling\UniverseTools\{PlanetTool as P2, LocalUniverseTool as P99};      // multiple use statement with a group use member
     *
     *
     *
     * The method will stop parsing tokens after it encounters the first "class" token, assuming the class is [bsr0 compatible](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md).
     *
     *
     *
     * @param array $tokens
     * @return array
     */
    public function parseTokens(array $tokens): array
    {
        try {


            $ret = [];

            // item init
            $parsingUse = false;
            $parsingAs = false;
            $parsingMultiple = false;
            $currentNamespace = "";
            $currentAs = "";
            $currentGroupItem = "";
            $nsSepFound = false;
            $groupStarted = false;
            $itemType = 'class';


            $tokensDebug = [];

            foreach ($tokens as $token) {
                $tokensDebug[] = $token;
//                echo "parsing " . $this->debugToken($token) . "<br>";


                // assertion
                if (true === $nsSepFound) {
                    if ('{' === $token) {
                        $groupStarted = true;
                        $nsSepFound = false;
                        continue;
                    } else {
                        throw new TokenFunException("UseStatementsParser: Invalid assertion, the T_NS_SEPARATOR was not immediately followed by an opening curly bracket. This code needs more love.");
                    }
                }

                $symbol = null;
                if (true === is_array($token)) {
                    $symbol = $token[0];
                }


                /**
                 * We stop parsing after the "class" keyword.
                 * This is because this method recognizes "use" keywords, and unfortunately the use keywords can be use also after functions (as in function() use($var)...).
                 * So stopping the parsing after the "class" keyword helps us filter out the "use" keywords we don't want.
                 *
                 */
                if (T_CLASS === $symbol) {
                    break;
                }


                if (false === $parsingUse) {
                    // use statement not started yet
                    if (T_USE === $symbol) {
                        $parsingUse = true;
                        continue;
                    }
                } else {


                    //--------------------------------------------
                    // ENDING THINGS
                    //--------------------------------------------
                    // use statement started, we parse it
                    if (';' === $token) {

                        item_end:

                        if (true === empty($currentAs)) {
                            $currentAs = null;
                        }

                        // end of token, registering useStatement item
                        $ret[] = [
                            $currentNamespace,
                            $currentAs,
                            $itemType,
                        ];


                        // item reinitialization
                        item_init:
                        $parsingUse = false;
                        $parsingAs = false;
                        $currentNamespace = "";
                        $currentAs = "";
                        $currentGroupItem = "";
                        $nsSepFound = false;
                        $groupStarted = false;

                        $itemType = 'class';


                        if (true === $parsingMultiple) {
                            if (';' === $token) {
                                $parsingMultiple = false;
                            } else {
                                $parsingUse = true; // keep parsing further multiples...
                            }
                        }


                    } elseif (
                        true === $groupStarted &&
                        (',' === $token || '}' === $token)
                    ) {


                        $computedGroupItemNamespace = $currentNamespace . "\\" . $currentGroupItem;

                        if (true === empty($currentAs)) {
                            $currentAs = null;
                        }

                        // end of token, registering useStatement item
                        $ret[] = [
                            $computedGroupItemNamespace,
                            $currentAs,
                            $itemType,
                        ];


                        // item partial reinitialization
                        $currentAs = "";
                        $parsingAs = false;
                        $currentGroupItem = "";

                        if ('}' === $token) {
                            goto item_init;
                        }

                    } else {


                        //--------------------------------------------
                        // PARSING AS
                        //--------------------------------------------
                        if (true === $parsingAs) {
                            switch ($symbol) {
                                case T_WHITESPACE:
                                    continue 2;
                                case T_STRING:
                                case T_NAME_QUALIFIED:
                                    $currentAs .= $token[1];
                                    break;
                                default:

                                    if (',' === $token) {
                                        // note that this cannot be a comma of a group, because the group comma is already handled in the ending things section
                                        // so this comma is a multiple statements comma, therefore we can just end the parsing of the statement and proceed to the next

                                        $parsingMultiple = true;
                                        goto item_end;

                                    } else {
                                        throw new TokenFunException("UseStatementsParser: Unknown case with token (1): " . $this->debugToken($token));
                                    }
                            }
                        }
                        //--------------------------------------------
                        // PARSING GROUPS
                        //--------------------------------------------
                        elseif (true === $groupStarted) {
                            switch ($symbol) {
                                case T_WHITESPACE:
                                    continue 2;
                                case T_STRING:
                                case T_NAME_QUALIFIED:
                                    $currentGroupItem .= $token[1];
                                    break;
                                case T_AS:
                                    $parsingAs = true;
                                    break;
                                case T_FUNCTION:
                                    $itemType = 'function';
                                    break;
                                case T_CONST:
                                    $itemType = 'const';
                                    break;
                                default:
                                    throw new TokenFunException("UseStatementsParser: Unknown case with token (2): " . $this->debugToken($token));
                            }
                        } else {
                            //--------------------------------------------
                            // PARSING STANDARD USE STATEMENTS
                            //--------------------------------------------
                            switch ($symbol) {
                                case T_WHITESPACE:
                                    continue 2;
                                case T_STRING:
                                case T_NAME_QUALIFIED:
                                    $currentNamespace .= $token[1];
                                    break;
                                case T_AS:
                                    $parsingAs = true;
                                    break;
                                case T_NS_SEPARATOR:
                                    $nsSepFound = true;
                                    break;
                                case T_FUNCTION:
                                    $itemType = 'function';
                                    break;
                                case T_CONST:
                                    $itemType = 'const';
                                    break;
                                default:
                                    throw new TokenFunException("UseStatementsParser: Unknown case with token (3): " . $this->debugToken($token));
                            }
                        }
                    }

                }
            }
        } catch
        (\Exception $e) {
//            a(TokenTool::explicitTokenNames($tokensDebug));
            throw $e;
        }

        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a string representation of the token, suitable for debugging purposes.
     * @param mixed $token
     * @return string
     */
    private function debugToken(array|string $token): string
    {
        if (true === is_string($token)) {
            return $token;
        }
        $ret = token_name($token[0]) . " ($token[0]): " . $token[1];
        if (array_key_exists(2, $token)) {
            $ret .= " line " . $token[2];
        }
        return $ret;
    }
}