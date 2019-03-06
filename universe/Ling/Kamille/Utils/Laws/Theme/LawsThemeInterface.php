<?php


namespace Ling\Kamille\Utils\Laws\Theme;



use Ling\Kamille\Utils\Laws\Config\LawsConfig;

interface LawsThemeInterface
{

    public function configureView($viewId, LawsConfig $config);


}