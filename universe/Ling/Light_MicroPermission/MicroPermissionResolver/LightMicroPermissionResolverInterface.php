<?php


namespace Ling\Light_MicroPermission\MicroPermissionResolver;

/**
 * The LightMicroPermissionResolverInterface interface.
 */
interface LightMicroPermissionResolverInterface
{

    /**
     * Returns the permission corresponding to the given micro-permission.
     * Or false if the micro-permission has no permission assigned yet.
     *
     * @param string $microPermission
     * @return string|false
     */
    public function resolve(string $microPermission);
}