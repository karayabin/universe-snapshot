<?php


namespace Ling\Light_Realist\DynamicInjection;

/**
 * The RealistDynamicInjectionHandlerInterface interface.
 */
interface RealistDynamicInjectionHandlerInterface
{

    /**
     * Returns a result depending on the given arguments.
     *
     * @param array $arguments
     * @return mixed
     */
    public function handle(array $arguments);
}