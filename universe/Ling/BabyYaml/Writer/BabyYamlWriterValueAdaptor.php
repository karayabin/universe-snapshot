<?php


namespace Ling\BabyYaml\Writer;


/**
 * BabyYamlWriterValueAdaptor.
 * @author Lingtalfi
 *
 */
class BabyYamlWriterValueAdaptor
{

    public function getValue($value, array $options = [])
    {

        if (null === $value) {
            return 'null';
        } elseif (false === $value) {
            return 'false';
        } elseif (true === $value) {
            return 'true';
        } elseif (array() === $value) {
            return '[]';
        } elseif ('false' === $value) {
            return '"false"';
        } elseif ('true' === $value) {
            return '"true"';
        } elseif ('null' === $value) {
            return '"null"';
        }

        if (is_numeric($value)) {
            return $value;
        }

        if (is_string($value)) {
            if ('' === $value) {
                return '""';
            }
            $trim = trim($value);
            $length = strlen($value);


            /**
             * Does the string need protective quotes around it?
             *
             * In this naive version, I will just say that if there is no double quote at all,
             * then it doesn't need protection.
             *
             */
            if (false === strpos($value, '"')) {
                return $value;
            }


            return $this->protect($value);

            // a string which trimmed value's length is different from it's value's length and which last char is not
            // a backslash,
            // or a numeric value
//            if (
//                ($length !== strlen($trim) && $length > 1 && '\\' !== substr($length, -1)) ||
//                is_numeric($value)
//            ) {
//                return $this->protect($value);
//            }
//
//            $protectScalar = (array_key_exists('protectScalar', $options)) ? (bool)$options['protectScalar'] : false;
//            if (true === $protectScalar) {
//                return $this->protect($value);
//            }
//            return $value;
        }

        return 'undefined';
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function protect($string)
    {
        return '"' . str_replace('"', '\"', $string) . '"';
    }
}
