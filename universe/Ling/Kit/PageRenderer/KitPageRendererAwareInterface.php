<?php


namespace Ling\Kit\PageRenderer;


/**
 * The KitPageRendererAwareInterface interface.
 */
interface KitPageRendererAwareInterface
{

    /**
     * Sets the KitPageRenderer instance.
     *
     *
     * @param KitPageRendererInterface $renderer
     * @return void
     */
    public function setKitPageRenderer(KitPageRendererInterface $renderer);
}