<?php


namespace Ling\Light_Kit\PageConfigurationTransformer;


/**
 * The PageConfigurationTransformerInterface interface.
 */
interface PageConfigurationTransformerInterface
{

    /**
     * Transforms the given page configuration array in place.
     *
     *
     * @param array $pageConfiguration
     * @return void
     */
    public function transform(array &$pageConfiguration);
}