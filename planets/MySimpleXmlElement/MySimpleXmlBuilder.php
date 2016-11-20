<?php

namespace MySimpleXmlElement;

/*
 * LingTalfi 2015-10-24
 * ref1=http://www.w3.org/TR/xml/
 * ref2=http://www.w3.org/TR/xml/#NT-AttValue
 * 
 * By default, all MySimpleXmlElements have a value of null.
 * The trick that we use to create empty elements (self closing elements like <img /> for instance)
 * is that we set the value to the empty string.
 * 
 * 
 */
class MySimpleXmlBuilder
{

    private $xmlDeclaration;
    private $indentChar;
    private $eol;

    public function __construct()
    {
        $this->xmlDeclaration = '<?xml version="1.0" encoding="utf-8"?>';
        $this->indentChar = '  '; // 2 spaces
        $this->eol = PHP_EOL;
    }


    public static function create()
    {
        return new static();
    }

    public function render(MySimpleXmlElement $x)
    {
        $s = $this->xmlDeclaration . $this->eol;
        $s .= $this->renderElement($x, 0);
        $s .= $this->eol;
        return $s;
    }

    public function setXmlDeclaration($xmlDeclaration)
    {
        $this->xmlDeclaration = $xmlDeclaration;
        return $this;
    }

    public function setIndentChar($indentChar)
    {
        $this->indentChar = $indentChar;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function renderElement(MySimpleXmlElement $x, $level)
    {
        /**
         * In this implementation, I will assume an element can have either elements, or have content,
         * but not both.
         * (I don't know if that's how the actual specification behaves though)
         */
        $s = '';
        $indent = str_repeat($this->indentChar, $level);
        $els = $x->getElements();
        $v = $x->getValue();
        if ($els || (null !== $v && '' !== $v)) {
            $s .= $indent . '<' . $x->getName() . $this->attrToString($x->getAttributes()) . '>';
            if ($els) {
                $s .= $this->eol;
                $nextLevel = $level + 1;
                foreach ($els as $el) {
                    $s .= $this->renderElement($el, $nextLevel) . $this->eol;
                }
            }
            else {
                if (false === $x->getUseCDATA()) {
                    $s .= $this->escape($v);
                }
                else {
                    $s .= '<![CDATA[' . $v . ']]>';
                }
                $indent = '';
            }
            $s .= $indent . '</' . $x->getName() . '>';
        }
        else {
            // empty element
            $s .= $indent . '<' . $x->getName() . $this->attrToString($x->getAttributes()) . ' />';
        }
        return $s;
    }


    /**
     *
     * @ref2: AttValue       ::=    '"' ([^<&"] | Reference)* '"'
     */
    private function attrToString(array $attr)
    {
        $s = '';
        if ($attr) {
            foreach ($attr as $k => $v) {
                $s .= ' ' . $k . '="' . $this->escape($v) . '"';
            }
        }
        return $s;
    }

    private function escape($s)
    {
        return str_replace([
            '&',
            '<',
            '>',
            '"',
            '\'',
        ], [
            '&amp;',
            '&lt;',
            '&gt;',
            '&quot;',
            '&apos;',
        ], $s);
    }
}
