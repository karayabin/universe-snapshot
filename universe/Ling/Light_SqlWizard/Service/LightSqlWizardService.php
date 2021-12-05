<?php


namespace Ling\Light_SqlWizard\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_SqlWizard\Exception\LightSqlWizardException;
use Ling\SqlWizard\MysqlWizard;


/**
 * The LightSqlWizardService class.
 */
class LightSqlWizardService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_SqlWizard conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightSqlWizardService instance.
     */
    public function __construct()
    {
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
     * Returns the option value corresponding to the given key.
     * If the option is not found, the return depends on the throwEx flag:
     *
     * - if set to true, an exception is thrown
     * - if set to false, the default value is returned
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @throws \Exception
     */
    public function getOption(string $key, $default = null, bool $throwEx = false)
    {
        if (true === array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }
        if (true === $throwEx) {
            $this->error("Undefined option: $key.");
        }
        return $default;
    }


    /**
     * Returns a configured MysqlWizard instance.
     * @return MysqlWizard
     */
    public function getMysqlWizard(): MysqlWizard
    {
        /**
         * @var $_db LightDatabaseService
         */
        $_db = $this->container->get("database");
        $w = new MysqlWizard();
        $w->setConnection($_db->getConnexion());
        return $w;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightSqlWizardException($msg);
    }

}