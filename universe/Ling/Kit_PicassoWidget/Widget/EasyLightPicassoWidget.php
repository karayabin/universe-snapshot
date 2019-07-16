<?php

namespace Ling\Kit_PicassoWidget\Widget;


use Ling\Kit\PageRenderer\KitPageRendererAwareInterface;
use Ling\Kit\PageRenderer\KitPageRendererInterface;
use Ling\Kit_PicassoWidget\Exception\PicassoWidgetException;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;

/**
 * The EasyLightPicassoWidget class.
 *
 * This class can help if you are working with the Light framework, using Light_Kit.
 *
 * The idea of this class is to provide all available syntactic sugar, so that the developer who extend this class
 * has all for free (at the cost of perhaps a small performance cost, if not all features are used).
 *
 * This includes:
 *
 * - access to the light service container (to all all services)
 * - access to the light kit page renderer (to call sub-zones for instance)
 *
 *
 *
 */
class EasyLightPicassoWidget extends WidgetConfAwarePicassoWidget implements KitPageRendererAwareInterface
{

    /**
     * This property holds the kitPageRenderer for this instance.
     * @var KitPageRendererInterface
     */
    protected $kitPageRenderer;


    /**
     * Builds the EasyPicassoWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->kitPageRenderer = null;
    }


    /**
     * @implementation
     */
    public function setKitPageRenderer(KitPageRendererInterface $renderer)
    {
        $this->kitPageRenderer = $renderer;
    }


    /**
     * Returns the kit page renderer
     * @return KitPageRendererInterface|null
     */
    public function getKitPageRenderer()
    {
        return $this->kitPageRenderer;
    }


    /**
     * Returns a light service container instance.
     * If no container is set, a dummy container is created on the fly and returned on subsequent calls.
     *
     * @return LightServiceContainerInterface
     * @throws PicassoWidgetException
     */
    protected function getContainer(): LightServiceContainerInterface
    {
        if ($this->kitPageRenderer instanceof LightKitPageRenderer) {
            return $this->kitPageRenderer->getContainer();
        }
        throw new PicassoWidgetException("The kit page renderer instance is not a LightKitPageRenderer.");
    }
}