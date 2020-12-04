<?php


namespace Ling\Light_SimpleHttpServer\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_SimpleHttpServer\Exception\LightSimpleHttpServerException;


/**
 * The LightSimpleHttpServerService class.
 *
 *
 * Note: this class is void for now, I just keep the service class and service config file so that
 * Light_SimpleHttpServer is listed as a service when some other plugins want to make the list of all available services
 * in your light app.
 *
 *
 *
 */
class LightSimpleHttpServerService
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
     * - do_not_log_codes: array of http status codes which should not be sent to the log.
     *
     *
     *
     * See the @page(Light_SimpleHttpServer conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightServerService instance.
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
     * Returns the list of https status codes for which we don't want to log.
     * @return array
     */
    public function getNotLoggedHttpStatusCodes(): array
    {
        return $this->options['do_not_log_codes'] ?? [];
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightSimpleHttpServerException($msg);
    }

}