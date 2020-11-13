<?php


namespace Ling\Light_Database_QueryLog\Service;


use Ling\Light_Database_QueryLog\Exception\LightDatabaseQueryLogException;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


/**
 * The LightDatabaseQueryLogService class.
 */
class LightDatabaseQueryLogService
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
     * See the @page(Light_Database_QueryLog conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightDatabaseQueryLogService instance.
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


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightDatabaseQueryLogException($msg);
    }

}