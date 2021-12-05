<?php


namespace Ling\Light_Kit_Admin_Kit_Editor\Service;


use Ling\Light_Kit_Admin\Service\LightKitAdminService;
use Ling\Light_Kit_Admin\Service\LightKitAdminStandardServicePlugin;

/**
 * The LightKitAdminKitEditorService class.
 */
class LightKitAdminKitEditorService extends LightKitAdminStandardServicePlugin
{

    /**
     *
     */
    public const KIT_STORE_TOKEN_KEY = "kit_store_token";


    /**
     *
     * Returns the kit store token, if generated already, or null otherwise.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     * @return string|null
     */
    public function getKitStoreToken(): string|null
    {
        /**
         * @var $_ka LightKitAdminService
         */
        $_ka = $this->container->get("kit_admin");

        $user = $_ka->getValidLightKitAdminUser();
        if (false !== $user) {
            $extra = $user->getExtra();
            return $extra[self::KIT_STORE_TOKEN_KEY] ?? null;
        }
        return null;
    }
}