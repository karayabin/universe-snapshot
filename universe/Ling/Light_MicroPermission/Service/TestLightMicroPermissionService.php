<?php


namespace Ling\Light_MicroPermission\Service;


/**
 * The LightMicroPermissionService class.
 */
class TestLightMicroPermissionService extends LightMicroPermissionService
{


    /**
     * Sets the micro permission map
     * @param array $map
     */
    public function setMicroPermissionMap(array $map)
    {
        $this->microPermissionsMap = $map;
    }
}