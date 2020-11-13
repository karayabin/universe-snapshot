<?php


namespace Ling\ParenthesisMirrorParser;


/**
 * The ParenthesisMirrorParser class.
 */
class ParenthesisMirrorParser
{

    /**
     * This property holds the identifier for this instance.
     * @var string
     */
    protected $identifier;


    /**
     * This property holds the converter for this instance.
     * @var callable
     */
    protected $converter;


    /**
     * Builds the ParenthesisMirrorParser instance.
     */
    public function __construct()
    {
        $this->identifier = "pmp";
        $this->converter = function (string $content) {
            return $content;
        };
    }

    /**
     * Sets the identifier.
     *
     * @param string $identifier
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Sets the converter.
     *
     * @param callable $converter
     */
    public function setConverter(callable $converter)
    {
        $this->converter = $converter;
    }


    /**
     * Parses the given string, and replaces the parenthesis wrappers accordingly.
     * See the @page(ParenthesisMirrorParser conception notes) for more details.
     *
     *
     * @param string $s
     * @return string
     */
    public function parseString(string $s)
    {
        $regex = '!' . $this->identifier . '\((.*)\)' . strrev($this->identifier) . '!Ums';
        $length = mb_strlen($s);

        $isStandAlone = false;
        $nonScalarReplacement = null;
        $s = preg_replace_callback($regex, function ($match) use (&$isStandAlone, &$nonScalarReplacement, $length) {
            $captured = $match[1];


            $isStandAlone = ($length === 2 * mb_strlen($this->identifier) + 2 + mb_strlen($captured));
            $replacement = call_user_func($this->converter, $captured);

            if (true === $isStandAlone) {
                $nonScalarReplacement = $replacement;
                return $captured;
            } else {
                return $replacement;
            }
        }, $s);

        if (true === $isStandAlone) {
            return $nonScalarReplacement;
        }

        return $s;
    }

    /**
     * Parses the given array recursively, and replaces the parenthesis wrappers accordingly.
     * See the @page(ParenthesisMirrorParser conception notes) for more details.
     *
     * @param array $arr
     * @return array
     */
    public function parseArray(array $arr): array
    {
        array_walk_recursive($arr, function (&$v) {
            $v = $this->parseString($v);
        });
        return $arr;
    }
}