<?php


namespace Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_PlanetInstaller;


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Service\LightKitAdminService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller class.
 */
class LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {


        $planetDotName = "Ling.Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks";


        $output->write("You are installing the $planetDotName planet." . PHP_EOL);
        $project = QuestionHelper::ask($output, "What's the name of your jetbrains project? ");


        /**
         * @var $lka LightKitAdminService
         */
        $lka = $this->container->get("kit_admin");
        $lka->registerJimToolboxItem("phpstorm_links", [
            'label' => 'ide links',
            'icon' => 'fas fa-code',
            'acp_class' => 'Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_Kit_Admin\JimToolbox\PhpstormWidgetLinksToolbox',
            'get' => [
                "project" => $project,
            ],
        ]);

        $output->write("<success>The $planetDotName conf has been updated.</success>" . PHP_EOL);
    }


}