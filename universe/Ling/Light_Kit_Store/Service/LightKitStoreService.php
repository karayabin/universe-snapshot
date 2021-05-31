<?php


namespace Ling\Light_Kit_Store\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;


/**
 * The LightKitStoreService class.
 */
class LightKitStoreService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightKitStoreService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    public function registerWebsiteFromDirectory()
    {
        /**
         * todo: here... is the method name correct?
         * todo: here... is the method name correct?
         * todo: here... is the method name correct?
         */
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitStoreException(static::class . ": " . $msg, $code);
    }
}