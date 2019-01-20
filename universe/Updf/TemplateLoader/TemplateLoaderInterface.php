<?php


namespace Updf\TemplateLoader;


/**
 * A template loader is responsible for
 * resolving a template name into a template content.
 *
 *
 */
interface TemplateLoaderInterface
{


    /**
     * Returns the template content associated with the template name.
     *
     *
     * Note: the template content needs to be further interpreted in order to produce the final html
     * (i.e. the returned template content can contain variable references, or even uninterpreted php code...)
     *
     *
     *
     * @param $context , the context exists so that the user can override the default template.
     *                  The context is an object, probably a ComponentInterface.
     *                  Thanks to the context, the loader has the ability to search in the context of the given class.
     *                  For instance if you create a MyModule package, you can search in the MyModule/templates directory...
     *
     *
     * @return string|false, returns the uninterpreted content of the template, or false if the
     *                      template couldn't be found.
     *
     */
    public function load($templateName, $context = null);
}