<?php


namespace Ling\DocTools\Translator;


use Ling\ParseDown\Parsedown;

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