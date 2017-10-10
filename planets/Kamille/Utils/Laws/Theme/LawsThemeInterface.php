<?php


namespace Kamille\Utils\Laws\Theme;



use Kamille\Utils\Laws\Config\LawsConfig;

interface LawsThemeInterface
{

    public function configureView($viewId, LawsConfig $config);


}