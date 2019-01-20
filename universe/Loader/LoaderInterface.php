<?php


namespace Loader;


interface LoaderInterface{


    /**
     * Returns an uninterpreted template content, or false in case of failure
     * See https://github.com/lingtalfi/loader-renderer-pattern/blob/master/loader-renderer.pattern.md
     * for more details.
     *
     * @return string|false
     */
    public function load($templateName);
}