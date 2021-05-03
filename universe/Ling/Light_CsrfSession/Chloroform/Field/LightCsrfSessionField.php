<?php


namespace Ling\Light_CsrfSession\Chloroform\Field;


use Ling\Chloroform\Field\HiddenField;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;

/**
 * The LightCsrfSessionField class.
 */
class LightCsrfSessionField extends HiddenField
{
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * @overrides
     */
    public function __construct(array $properties = [])
    {
        parent::__construct($properties);
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function getValue()
    {
        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->container->get("csrf_session");
        return $csrfService->getToken();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return LightCsrfSessionField
     */
    public function setContainer(LightServiceContainerInterface $container): LightCsrfSessionField
    {
        $this->container = $container;
        return $this;
    }
}