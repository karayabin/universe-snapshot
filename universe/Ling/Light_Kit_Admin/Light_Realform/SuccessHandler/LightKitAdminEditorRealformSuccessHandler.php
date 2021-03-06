<?php


namespace Ling\Light_Kit_Admin\Light_Realform\SuccessHandler;

use Ling\Light_Kit_Editor\Light_Realform\SuccessHandler\LightKitEditorRealformSuccessHandler;

/**
 * The LightKitAdminEditorRealformSuccessHandler class.
 */
class LightKitAdminEditorRealformSuccessHandler extends LightKitEditorRealformSuccessHandler
{


    /**
     * Builds the LightKitAdminEditorRealformSuccessHandler instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @overrides
     */
    protected function getBabyYamlRootDir(): ?string
    {
        return $this->container->getApplicationDir() . "/config/open/Ling.Light_Kit_Admin/lke";
    }


}