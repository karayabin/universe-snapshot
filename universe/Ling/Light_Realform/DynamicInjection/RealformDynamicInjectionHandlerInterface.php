<?php


namespace Ling\Light_Realform\DynamicInjection;

/**
 * The RealformDynamicInjectionHandlerInterface interface.
 */
interface RealformDynamicInjectionHandlerInterface
{

    /**
     * Returns a result depending on the given arguments.
     *
     * @param array $arguments
     * @return mixed
     */
    public function handle(array $arguments);
}