<?php


namespace DocTools\Translator;


use ParseDown\Parsedown;

/**
 * The MarkdownTranslatorInterface interface.
 */
class ParseDownTranslator extends Parsedown implements MarkdownTranslatorInterface
{

    /**
     * @implementation
     */
    public function translate(string $string)
    {
        return $this->text($string);
    }
}