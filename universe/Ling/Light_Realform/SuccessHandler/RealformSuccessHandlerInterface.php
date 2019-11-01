<?php


namespace Ling\Light_Realform\SuccessHandler;


/**
 * The RealformSuccessHandlerInterface interface.
 */
interface RealformSuccessHandlerInterface
{

    /**
     * Process the given data, and throws an exception if something unexpected happens.
     *
     *
     *
     * @param array $data
     * @param array $options
     * @return mixed
     */
    public function processData(array $data, array $options = []);
}