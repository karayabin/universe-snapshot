<?php


namespace Kamille\Mvc\Renderer;


/**
 * In this class, to interpret the uninterpreted php content,
 * I chose to create a tmp file first, because it's easier to debug (you get an actual file rather than
 * an eval error that you cannot open).
 *
 * Variables passed to the template are:
 *
 * - $v, an object containing all the variables
 * - $l, a layout proxy which allows a call to the widget(widgetName) method, which renders a given widget in place
 *
 * The template can also use a standard {tag} replacement mechanism, instead of/in addition to
 * the $v variable.
 *
 * Both methods ($v or {tag}) allow access to variables, but the variable form is more flexible since
 * it can be manipulated with php (the {tag} form is just part of the html).
 *
 *
 *
 */
class CacheablePhpLayoutRenderer extends PhpLayoutRenderer
{



    public function render($uninterpretedContent, array $variables)
    {

        return parent::render($uninterpretedContent, $variables);
    }

}