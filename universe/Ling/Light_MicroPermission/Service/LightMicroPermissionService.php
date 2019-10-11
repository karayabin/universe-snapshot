<?php


namespace Ling\Light_MicroPermission\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;
use Ling\Light_MicroPermission\MicroPermissionResolver\LightMicroPermissionResolverInterface;
use Ling\Light_User\LightUserInterface;

/**
 * The LightMicroPermissionService class.
 */
class LightMicroPermissionService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the microPermissionResolvers for this instance.
     * It's an array of plugin name => LightMicroPermissionResolverInterface.
     * @var LightMicroPermissionResolverInterface[]
     */
    protected $microPermissionResolvers;


    /**
     * Builds the LightMicroPermissionService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->microPermissionResolvers = [];
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
     * Registers a micro permission resolver for a given plugin.
     *
     * @param string $pluginName
     * @param LightMicroPermissionResolverInterface $resolver
     */
    public function registerMicroPermissionResolver(string $pluginName, LightMicroPermissionResolverInterface $resolver)
    {
        $this->microPermissionResolvers[$pluginName] = $resolver;
    }


    /**
     * Returns whether the current user has the given micro-permission.
     *
     * @param string $microPermission
     * @return bool
     * @throws \Exception
     */
    public function hasMicroPermission(string $microPermission): bool
    {
        /**
         * @var $user LightUserInterface
         */
        $user = $this->container->get("user_manager")->getUser();
        if (true === $user->hasRight("*")) {
            return true;
        }

        $p = explode(".", $microPermission, 2);
        if (2 === count($p)) {
            list($pluginName, $microPermissionId) = $p;
            if (array_key_exists($pluginName, $this->microPermissionResolvers)) {
                $permission = $this->microPermissionResolvers[$pluginName]->resolve($microPermission);
                if (false !== $permission) {
                    return $user->hasRight($permission);
                }
            } else {
                /**
                 * In this case we return false, this allows developer to use micro-permission in their code that aren't
                 * yet created (optimistic pattern).
                 */
            }
        } else {
            throw new LightMicroPermissionException("Invalid permission notation: $microPermission. Two dot separated members were expected.");
        }


        return false;
    }
}