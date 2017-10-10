<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyXml\Reader;

use BeeFramework\Bat\StringTool;

/**
 * BabyXmlReader.
 * @pattern [babyxml-mee™]
 * @author Lingtalfi
 *
 *
 */
class BabyXmlReader
{



    /**
     * @return array|false, false in case of failure
     */
    public function readFile($file)
    {
        if (false !== $s = file_get_contents($file)) {
            if ('<?xml' !== substr($s, 0, 5)) {
                $s = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL . $s;
            }
            $ret = $this->readString($s);
        }
        else {
            throw new \RuntimeException(sprintf('File not found: %s', $file));

        }
        return $ret;
    }

    /**
     * @return array|false, false in case of failure
     */
    public function readString($string)
    {

        $adaptValue = function ($s) {
            return StringTool::autoCast($s);
        };
        libxml_clear_errors();
        libxml_use_internal_errors(true);
        $xml_data = simplexml_load_string($string);
        if ($xml_data instanceof \SimpleXMLElement) {
            // return the unique root node
            return current($this->createArray($xml_data, $adaptValue));
        }
        $msg = $this->getXmlErrorsFromString($string);
        throw new \RuntimeException(sprintf("Failed loading XML : %s", $msg));
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function createArray(\SimpleXMLElement $xml, $adaptValue)
    {
        $array = array();
        if ($xml instanceof \SimpleXMLElement) {
            $this->iterateSimpleXml($xml, $array, $adaptValue);
        }
        return $array;
    }

    private function iterateSimpleXml(\SimpleXMLElement $xml, array &$array, $adaptValue)
    {


        if ($xml->count()) {
            if (isset($array[$xml->getName()])) {
                $newArray = false;
                if (!is_array($array[$xml->getName()])) {
                    $array[$xml->getName()] = array($array[$xml->getName()]);
                    $newArray = true;
                }

                if (false === $newArray && array_key_exists($xml->getName(), $array)) {

                    $array[$xml->getName()] = array($array[$xml->getName()]);


                    $x = count($array[$xml->getName()]);
                    $array[$xml->getName()][$x] = array();

                    foreach ($xml->children() as $item) {
                        self::iterateSimpleXml($item, $array[$xml->getName()][$x], $adaptValue);
                    }
                }
                else {
                    $x = count($array[$xml->getName()]);
                    $array[$xml->getName()][$x] = array();

                    foreach ($xml->children() as $item) {
                        self::iterateSimpleXml($item, $array[$xml->getName()][$x], $adaptValue);
                    }
                }

            }
            else {
                $name = $xml->getName();
                if ('_' === $name) {
                    $array[] = array();
                    end($array);
                    $lastKey = key($array);
                    foreach ($xml->children() as $item) {
                        self::iterateSimpleXml($item, $array[$lastKey], $adaptValue);
                    }
                }
                else {
                    $array[$name] = array();
                    foreach ($xml->children() as $item) {
                        self::iterateSimpleXml($item, $array[$name], $adaptValue);
                    }
                }
            }
        }
        else {
            if (isset($array[$xml->getName()])) {
                if (!is_array($array[$xml->getName()])) {
                    $array[$xml->getName()] = array($array[$xml->getName()]);
                }
                $array[$xml->getName()][] = $adaptValue((string)$xml);
            }
            else {
                if ('_' === $xml->getName()) {
                    $array[] = $adaptValue((string)$xml);
                }
                else {
                    $array[$xml->getName()] = $adaptValue((string)$xml);
                }
            }
        }
    }



    /**
     * Returns a string of errors.
     *
     * @param string $xmlStr The raw xml error string
     * @param string $nr The return carriage char
     * @return string A formatted xml error string
     */
    private function getXmlErrorsFromString($xmlStr, $nr = PHP_EOL)
    {
        $xml = explode("\n", $xmlStr);
        $errors = libxml_get_errors();
        $s = '';
        foreach ($errors as $error) {
            $s .= $this->getXmlError($error, $xml, $nr) . $nr;
        }
        libxml_clear_errors();
        return $s;
    }


    private function getXmlError($error, $xml, $nr = PHP_EOL)
    {
        $return = $xml[$error->line - 1] . "$nr";
        $return .= str_repeat('-', $error->column) . "^$nr";

        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $return .= "Warning $error->code: ";
                break;
            case LIBXML_ERR_ERROR:
                $return .= "Error $error->code: ";
                break;
            case LIBXML_ERR_FATAL:
                $return .= "Fatal Error $error->code: ";
                break;
        }

        $return .= trim($error->message) .
            "$nr  Line: $error->line" .
            "$nr  Column: $error->column";

        if ($error->file) {
            $return .= "$nr  File: " . realpath($error->file);
        }

        return "$return$nr$nr--------------------------------------------$nr$nr";
    }
}
