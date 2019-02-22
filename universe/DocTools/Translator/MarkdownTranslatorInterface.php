<?php


namespace DocTools\Translator;


/**
 * The MarkdownTranslatorInterface interface.
 * Translates markdown code to another format (generally html).
 *
 */
interface MarkdownTranslatorInterface
{

    /**
     * Translates the given markdown code into another language (generally html)
     * and returns the result.
     *
     * @param string $string
     * @return string
     */
    public function translate(string $string);
}