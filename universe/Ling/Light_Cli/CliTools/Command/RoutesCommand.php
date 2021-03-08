<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The RoutesCommand class.
 *
 *
 *
 */
class RoutesCommand extends LightCliDocCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $groupByPlanet = $input->hasFlag("p");


        $routes = $this->container->getLight()->getRoutes();
        $planet2routes = [];
        $nbRoutes = count($routes);


        $this->msg("<b>$nbRoutes</b> route(s) found:" . PHP_EOL);


        foreach ($routes as $route) {
            if (true === $groupByPlanet) {
                $p = explode('\\', $route['controller'], 3);
                $galaxy = array_shift($p);
                $planet = array_shift($p);
                $planetFull = $galaxy . '\\' . $planet;
                if (false === array_key_exists($planetFull, $planet2routes)) {
                    $planet2routes[$planetFull] = [];
                }
                $planet2routes[$planetFull][] = $route;

            } else {
                $this->msg("- " . $this->formatRoute($route) . PHP_EOL);
            }
        }

        foreach ($planet2routes as $planet => $routes) {
            $this->msg('<b>' . $planet . '</b>:' . PHP_EOL);
            foreach ($routes as $route) {
                $this->msg("-----  " . $this->formatRoute($route) . PHP_EOL);
            }
        }
    }

    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return " displays the routes available to the current app.";
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "p" => " planets, group the routes by planets.",
        ];
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Formats a route for display.
     *
     * @param array $route
     * @return string
     */
    private function formatRoute(array $route): string
    {
        return $route['name'] . ' (<b>' . $route['pattern'] . '</b>) --> ' . $route['controller'];
    }
}