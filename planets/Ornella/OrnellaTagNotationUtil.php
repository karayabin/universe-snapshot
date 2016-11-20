<?php

namespace Ornella;

/*
 * LingTalfi 2015-10-21
 * 
 * In this implementation, I use strictMode paradigm (https://github.com/lingtalfi/ConventionGuy/blob/master/paradigm/paradigm.strictMode.eng.md).
 *
 * 
 */
class OrnellaTagNotationUtil
{

    private $strictMode;
    private $errors;

    public static function create()
    {
        return new static();
    }

    public function __construct()
    {
        $this->strictMode = 0;
        $this->errors = [];
    }


    /**
     * Returns string|false.
     * False is returned when there is at least an error, and
     * the strictMode is 0.
     */
    public function parse($string, array $tagValues = [])
    {


        $this->flat($string);

        $string = preg_replace_callback('!\{([a-zA-Z0-9_]+)(:[^}]*)?\}!m', function ($m) use ($tagValues) {
            $identifier = $m[1];
            $functionDeclaration = null;
            if (array_key_exists(2, $m)) {
                $functionDeclaration = substr($m[2], 1);
                $this->deflat($functionDeclaration);
            }


            if (array_key_exists($identifier, $tagValues)) {
                $value = $tagValues[$identifier];
                if (null !== $functionDeclaration) {
                    $value = $this->applyFunctions($value, $functionDeclaration);
                }
                return $value;
            }
            else {
                $this->error("identifier not found: $identifier");
            }
            return $m[0];

        }, $string);


        //------------------------------------------------------------------------------/
        // HANDLING STRICT MODE ERRORS
        //------------------------------------------------------------------------------/
        $c = count($this->errors);
        if ($c) {
            if (1 === $this->strictMode) {
                $m = "Oops, the following errors occurred: ";
                $m .= implode(', ', $this->errors);
                throw new \Exception($m);
            }
            return false;
        }

        return $string;
    }


    public function setStrictMode($strictMode)
    {
        $this->strictMode = (int)$strictMode;
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * This function flattens backslash escaped end curly brackets,
     * because they get in the way of our regex.
     * Remember that the escaped closing curly bracket can only occur in the functionDeclaration part.
     */
    private function flat(&$string, $char = null)
    {
        switch ($char) {
            case ':':
                $string = str_replace('\:', '+-this_is_tmp_flattened_colon-+', $string);
                break;
            case '_':
                $string = str_replace('\_', '+-this+is+tmp+flattened+underscore-+', $string);
                break;
            default:
                $string = str_replace('\}', '+-this_is_tmp_flattened_closing_bracket-+', $string);
                break;
        }
    }

    private function deflat(&$string, $char = null)
    {
        switch ($char) {
            case ':':
                $string = str_replace('+-this_is_tmp_flattened_colon-+', ':', $string);
                break;
            case '_':
                $string = str_replace('+-this+is+tmp+flattened+underscore-+', '_', $string);
                break;
            default:
                $string = str_replace('+-this_is_tmp_flattened_closing_bracket-+', '}', $string);
                break;
        }
    }


    private function error($m)
    {
        $this->errors[] = $m;
    }


    private function applyFunctions($value, $sFunctionDeclarations)
    {
        $this->flat($sFunctionDeclarations, ':');
        $functionDeclarations = explode(':', $sFunctionDeclarations);
        foreach ($functionDeclarations as $fd) {
            $this->deflat($fd, ':');
            $p = explode('_', $fd, 2);
            $fpString = null;
            if (2 === count($p)) {
                $fpString = $p[1];
            }
            $this->applyFunction($p[0], $fpString, $value);
        }
        return $value;
    }


    private function applyFunction($funcName, $funcParamString, &$value)
    {
        switch ($funcName) {
            case 'upper':
                $value = strtoupper($value);
                break;
            case 'lower':
                $value = strtolower($value);
                break;
            case 'safe':
                $safeChar = '';
                if (is_string($funcParamString)) {
                    $safeChar = $funcParamString;
                }
                $value = preg_replace('![^a-zA-Z0-9_]!', $safeChar, $value);
                break;
            case 'cut':
                $params = $this->getFuncParams($funcParamString);
                if (null !== ($cutChar = array_shift($params))) {

                    if ('' !== $cutChar) {
                        if (null !== ($fieldSpec = array_shift($params))) {

                            if (null === ($sep = array_shift($params))) {
                                $sep = '';
                            }
                            $fields = explode($cutChar, $value);
                            $numFields = count($fields);

                            $renderedFields = [];
                            $rangeSpecs = explode(';', $fieldSpec);
                            foreach ($rangeSpecs as $rangeSpec) {
                                $boundaries = explode('-', $rangeSpec, 2);
                                if (2 === count($boundaries)) {
                                    $begin = (int)$boundaries[0];
                                    $end = (int)$boundaries[1];
                                    if ($begin < $end) {
                                        for ($i = $begin; $i <= $end; $i++) {
                                            $offset = $i;
                                            $this->adjustOffset($offset, $numFields);
                                            $renderedFields[] = $fields[$offset];
                                        }
                                    }
                                    else {
                                        $this->error("cut start boundary must be numerically less than its end boundary (you gave $begin and $end)");
                                    }
                                }
                                else {
                                    if ('+' === substr($rangeSpec, -1)) {
                                        $offset = (int)substr($rangeSpec, 0, -1);
                                        $this->adjustOffset($offset, $numFields);
                                        foreach (array_slice($fields, $offset) as $field) {
                                            $renderedFields[] = $field;
                                        }
                                    }
                                    else {
                                        $offset = (int)$rangeSpec;
                                        $this->adjustOffset($offset, $numFields);
                                        $renderedFields[] = $fields[$offset];
                                    }
                                }
                            }


                            $value = implode($sep, $renderedFields);
                        }
                        else {
                            $this->error("Invalid cut syntax: fieldSpec parameter not defined in $value");
                        }
                    }
                    else {
                        $this->error("Invalid cut syntax: cutChar must not be empty in $value");
                    }
                }
                else {
                    $this->error("Invalid cut syntax: cutChar parameter not defined in $value");
                }
                break;
            case 'substr':
                $params = $this->getFuncParams($funcParamString);
                if (null !== ($start = array_shift($params))) {
                    $end = array_shift($params);
                    $old = mb_internal_encoding();
                    mb_internal_encoding('UTF-8');
                    if (null === $end) {
                        $value = mb_substr($value, (int)$start);
                    }
                    else {
                        $value = mb_substr($value, (int)$start, (int)$end);
                    }
                    mb_internal_encoding($old);
                }
                else {
                    $this->error("Invalid substr syntax: start parameter not defined in $value");
                }
                break;
            default:
                $this->error("Unknown function $funcName");
                break;
        }
    }

    private function getFuncParams($funcParamString)
    {
        if (null === $funcParamString) {
            return [];
        }
        $this->flat($funcParamString, '_');
        $p = explode('_', $funcParamString);
        array_walk($p, function (&$v) {
            $this->deflat($v, '_');
        });
        return $p;
    }

    private function adjustOffset(&$offset, $numFields)
    {
        $offset--; // cut index start at 1, dixit the docs
        if ($offset < 0) {
            $offset = 0;
        }
        if ($offset > $numFields - 1) {
            $offset = $numFields - 1;
        }
    }
}
