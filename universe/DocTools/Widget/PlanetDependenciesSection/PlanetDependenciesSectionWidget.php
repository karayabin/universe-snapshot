<?php


namespace DocTools\Widget\PlanetDependenciesSection;

use DocTools\Info\PlanetInfo;
use DocTools\Widget\Widget;
use UniverseTools\DependencyTool;


/**
 * The PlanetDependenciesSectionWidget class.
 * This widget displays the planet dependencies.
 */
class PlanetDependenciesSectionWidget extends Widget
{

    /**
     * This property holds a @doc(PlanetInfo) instance.
     * @var PlanetInfo
     */
    protected $planetInfo;


    /**
     * Builds the PlanetDependenciesSectionWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->planetInfo = null;
    }


    /**
     * Sets the planet info.
     *
     * @param PlanetInfo $planetInfo
     * @return $this
     */
    public function setPlanetInfo(PlanetInfo $planetInfo)
    {
        $this->planetInfo = $planetInfo;
        return $this;
    }


    /**
     * @implementation
     */
    public function render()
    {

        $s = '';

        $title = $this->options['title'] ?? "Dependencies"; // set an empty string or false to disable the title.
        $titleLevel = $this->options['title_level'] ?? 1; // 1,2,3,4,5,6 (for h1,h2,h3,...)
        $display_if_empty = $this->options['display_if_empty'] ?? false;


        $dependencies = $this->planetInfo->getDependencies();
        $nbDependencies = count($dependencies);


        if (0 === $nbDependencies && false === $display_if_empty) {
            return "";
        }


        //--------------------------------------------
        // TITLE
        //--------------------------------------------
        if ($title) {
            if ($titleLevel > 2) {
                $s .= str_repeat('#', $titleLevel) . " " . $title . PHP_EOL;
            }
            else {
                $s .= $title . PHP_EOL;
                if (1 === $titleLevel || 2 === $titleLevel) {
                    if (1 === $titleLevel) {
                        $char = "=";
                    }
                    else {
                        $char = "-";
                    }
                    $s .= str_repeat($char, mb_strlen($title));
                    $s .= PHP_EOL;
                }
            }
        }


        //--------------------------------------------
        // DEPENDENCIES
        //--------------------------------------------
        foreach ($dependencies as $dependencyItem) {
            $dependencySystem = $dependencyItem[0];
            $repoName = $dependencyItem[1];
            $url = DependencyTool::getDependencyHomeUrl($dependencyItem);


            if (0 === strpos($dependencySystem, 'universe.')) {
                $repoName = "Universe: " . $repoName;
            }

            $s .= '- [' . $repoName . '](' . $url . ')' . PHP_EOL;

        }
        return $s;
    }
}