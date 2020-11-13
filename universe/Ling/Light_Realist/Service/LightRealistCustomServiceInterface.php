<?php


namespace Ling\Light_Realist\Service;


/**
 * The LightRealistCustomServiceInterface interface.
 */
interface LightRealistCustomServiceInterface
{

    /**
     * Registers the plugin to the realist service.
     *
     * This is part of our late registration system.
     * See the @page(late registration concept) for more details.
     *
     *
     * @param string $requestId
     * @return mixed
     */
    public function registerRealistByRequestId( string $requestId);
}