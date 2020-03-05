<?php


namespace Ling\Light_Kit_Admin\LightKitAdminPlugin;


/**
 * The LightKitAdminPluginInterface interface.
 *
 * For more details, refer to the @page(Light kit admin plugins document).
 *
 */
interface LightKitAdminPluginInterface
{

    /**
     * Returns the options of this kit admin plugin.
     * @return array
     */
    public function getPluginOptions(): array;
}