<?php


namespace Ling\Light_TablePrefixInfo\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_TablePrefixInfo\Exception\LightTablePrefixInfoException;


/**
 * The LightTablePrefixInfoService class.
 */
class LightTablePrefixInfoService
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
     * See the @page(Light_TablePrefixInfo conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * This property holds the prefixInfo for this instance.
     * @var array
     */
    protected $prefixInfo;


    /**
     * Builds the LightTablePrefixInfoService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
        $this->prefixInfo = [];
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



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Registers the information for the $prefix.
     *
     * @param string $prefix
     * @param array $prefixInfo
     */
    public function registerPrefixInfo(string $prefix, array $prefixInfo)
    {
        $this->prefixInfo[$prefix] = $prefixInfo;
    }


    /**
     * Returns the prefix information attached to the given $prefix.
     * Null is returned if no info was found.
     *
     * @param string $prefix
     * @return array|null
     */
    public function getPrefixInfo(string $prefix)
    {
        if (array_key_exists($prefix, $this->prefixInfo)) {
            return $this->prefixInfo[$prefix];
        }
        return null;
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightTablePrefixInfoException($msg);
    }

}