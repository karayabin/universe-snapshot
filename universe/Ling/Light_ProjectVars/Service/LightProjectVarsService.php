<?php


namespace Ling\Light_ProjectVars\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ProjectVars\Exception\LightProjectVarsException;


/**
 * The LightProjectVarsService class.
 */
class LightProjectVarsService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;


    /**
     * This property holds the variables for this instance.
     * @var array
     */
    private array $variables;

    /**
     * Builds the LightProjectVarsService instance.
     */
    public function __construct()
    {
        $this->variables = [];
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
     * Returns the variables of this instance.
     *
     * @return array
     */
    public function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * Sets the variables.
     *
     * @param array $variables
     */
    public function setVariables(array $variables)
    {
        $this->variables = $variables;
    }

    /**
     * Returns the value associated with the given key.
     *
     * If the key doesn't match and the throwEx flag is true, an exception is thrown,
     * otherwise the default value is returned.
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @return mixed
     */
    public function getVariable(string $key, $default = null, bool $throwEx = false): mixed
    {
        if (true === array_key_exists($key, $this->variables)) {
            return $this->variables[$key];
        }
        if (true === $throwEx) {
            throw new LightProjectVarsException("Key not found: $key.");
        }
        return $default;
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightProjectVarsException($msg);
    }

}