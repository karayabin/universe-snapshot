<?php


namespace Ling\Light_Kit_Admin_Generator\Generator;


use Ling\Light_RealGenerator\Generator\BaseConfigGenerator;

/**
 * The LkaGenBaseConfigGenerator class.
 */
class LkaGenBaseConfigGenerator extends BaseConfigGenerator
{


    /**
     * Returns the route name based on the given table.
     * By default, it returns the list route.
     * To return the form route, set isListRoute to false.
     *
     *
     *
     * @param string $table
     * @param array $config
     * @param bool=false $isListRoute
     * @return string
     * @throws \Exception
     */
    protected function getRouteNameByTable(string $table, array $config, bool $isListRoute = true): string
    {
        $type = "list";
        if (false === $isListRoute) {
            $type = 'form';
        }
        $prefix = $this->getKeyValue("route.route_prefix", false, "lkagen_route");
        return $prefix . '-' . $table . "-" . $type;
    }

}