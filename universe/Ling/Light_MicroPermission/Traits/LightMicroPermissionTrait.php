<?php


namespace Ling\Light_MicroPermission\Traits;


use Ling\Light_MicroPermission\Service\LightMicroPermissionService;

/**
 * Trait LightMicroPermissionTrait
 */
trait LightMicroPermissionTrait
{

    /**
     * Proxy to the @page(micro-permission service) disableNamespace method.
     * @param string $namespace
     */
    public function disableMicroPermissions(string $namespace)
    {
        /**
         * @var $microService LightMicroPermissionService
         */
        $microService = $this->container->get('micro_permission');
        $microService->disableNamespace($namespace);
    }


    /**
     * Proxy to the @page(micro-permission service) restoreNamespaces method.
     * @param null|array|string $namespace
     */
    public function restoreMicroPermissions($namespace = null)
    {
        /**
         * @var $microService LightMicroPermissionService
         */
        $microService = $this->container->get('micro_permission');
        $microService->restoreNamespaces($namespace);
    }


}