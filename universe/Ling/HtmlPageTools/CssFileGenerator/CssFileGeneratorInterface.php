<?php


namespace Ling\HtmlPageTools\CssFileGenerator;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;

/**
 * The CssFileGeneratorInterface interface.
 *
 * A css file generator is a class which generates a compiled css file containing all css blocks of code
 * of the given a copilot instance, and returns the url to that css file.
 *
 * The name of the css file depends on the given $identifier.
 *
 *
 */
interface CssFileGeneratorInterface
{


    /**
     * Creates a css file containing all css blocks of code of the given copilot instance,
     * and returns the url to this css file.
     * The css file name is based on the given $identifier.
     *
     *
     *
     * @param HtmlPageCopilot $copilot
     * @param string|null $identifier
     * @return string
     */
    public function generate(HtmlPageCopilot $copilot, string $identifier = null): string;
}