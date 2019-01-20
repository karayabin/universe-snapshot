<?php


namespace Umail\TemplateLoader;


interface TemplateLoaderInterface
{


    /**
     * Triggers the resolution of the given $templateName
     * to the template content, for both the html and/or the plain file versions.
     *
     * Then, to access the resolved contents, use the getHtmlContent and/or getPlainContent methods.
     */
    public function load($templateName);


    /**
     * Returns the html content, or null.
     * Be sure to call the load method first.
     */
    public function getHtmlContent();

    /**
     * Returns the plain/text content, or null.
     * Be sure to call the load method first.
     */
    public function getPlainContent();

}