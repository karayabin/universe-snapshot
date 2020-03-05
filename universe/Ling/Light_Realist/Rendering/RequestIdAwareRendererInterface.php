<?php


namespace Ling\Light_Realist\Rendering;


/**
 * The RequestIdAwareRendererInterface interface.
 */
interface RequestIdAwareRendererInterface
{

    /**
     * Sets the request id for the current instance.
     *
     *
     *
     * @param string $requestId
     * @return mixed
     */
    public function setRequestId(string $requestId);
}