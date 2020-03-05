<?php


namespace Ling\Light_CsrfSimple\Chloroform\Field;


use Ling\Chloroform\Field\HiddenField;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSimple\Service\LightCsrfSimpleService;

/**
 * The LightCsrfSimpleField class.
 */
class LightCsrfSimpleField extends HiddenField
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
         * @var $csrfSimple LightCsrfSimpleService
         */
        $csrfSimple = $this->container->get("csrf_simple");
        return $csrfSimple->getToken();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return LightCsrfSimpleField
     */
    public function setContainer(LightServiceContainerInterface $container): LightCsrfSimpleField
    {
        $this->container = $container;
        return $this;
    }
}