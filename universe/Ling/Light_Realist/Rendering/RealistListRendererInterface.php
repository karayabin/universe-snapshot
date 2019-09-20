<?php


namespace Ling\Light_Realist\Rendering;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The RealistListRendererInterface interface.
 * This interface renders a list, including the gravitating widgets.
 *
 */
interface RealistListRendererInterface
{

    /**
     * Prepares the list renderer with the given request declaration.
     * See the @page(duelist page) for more details.
     *
     * @param string $requestId
     * @param array $requestDeclaration
     * @param LightServiceContainerInterface $container
     * @return void
     */
    public function prepareByRequestDeclaration(string $requestId, array $requestDeclaration, LightServiceContainerInterface $container);


    /**
     * Prints the list.
     *
     * @return void
     */
    public function render();
}