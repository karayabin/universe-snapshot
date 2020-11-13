<?php


namespace Ling\Light_Realform\Feeder;

/**
 * The RealformFeederInterface interface.
 */
interface RealformFeederInterface
{


    /**
     * Returns the default values of the form.
     *
     * For more details about the params, see the @page(Light_Realform conception notes).
     *
     * @param array $params
     * @return array
     */
    public function getDefaultValues(array $params = []): array;
}