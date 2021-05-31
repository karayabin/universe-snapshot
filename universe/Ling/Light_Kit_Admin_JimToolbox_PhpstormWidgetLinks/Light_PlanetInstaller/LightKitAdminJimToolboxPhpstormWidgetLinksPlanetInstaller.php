<?php


namespace Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_PlanetInstaller;


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Service\LightKitAdminService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller class.
 */
class LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output): void
    {


        $planetDotName = "Ling.Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks";


        $output->write("You are installing the <b>$planetDotName</b> planet." . PHP_EOL);
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

        $output->write("<success>The <b>$planetDotName</b> conf has been updated.</success>" . PHP_EOL);
    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output): void
    {


        $planetDotName = "Ling.Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks";

        /**
         * @var $lka LightKitAdminService
         */
        $lka = $this->container->get("kit_admin");
        $found = $lka->unregisterJimToolboxItem("phpstorm_links");
        if (true === $found) {
            $output->write("<success>The <b>$planetDotName</b> jim toolbox conf has been removed successfully.</success>" . PHP_EOL);
        } else {
            $output->write("The <b>$planetDotName</b> jim toolbox conf was not found, skipping." . PHP_EOL);
        }
    }


}